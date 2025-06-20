<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penomoran extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta'); // ✅ Set timezone ke WIB
    
    }

    public function data_slot() {
        $d['data_slot'] = $this->db->query("
            SELECT a.*, b.nama_jenis 
            FROM slot_number a 
            JOIN jenis_surat b ON a.jenis_surat_id = b.id
            ORDER BY GREATEST(IFNULL(a.updated_at, a.created_at), a.created_at) DESC
        ")->result_array();
        $d['jenis_surat'] = $this->db->get("jenis_surat")->result_array();

    
        $this->load->view('Penomoran/data_slot', $d);
    }
    

public function get_jenis_surat()
{
    $this->load->database();
    $query = $this->db->get('jenis_surat');
    echo json_encode($query->result());
}



public function do_input_slot()
{
    // Ambil data dari form POST
    $tanggal = $this->input->post('tanggal');
    $jenis_ids = $this->input->post('jenis_surat_id'); // array
    $slots = $this->input->post('slot'); // associative array: slot[ID_SURAT]

    // Cek data valid
    if (!$tanggal || empty($jenis_ids) || empty($slots)) {
        $this->session->set_flashdata('error', 'Data tidak lengkap. Silakan isi semua input.');
        redirect('penomoran/data_slot');
        return;
    }

    // Load database (optional jika belum autoload)
    $this->load->database();

    // Loop dan insert ke DB
    foreach ($jenis_ids as $id) {
        if (isset($slots[$id]) && intval($slots[$id]) > 0) {
            $data = [
                'jenis_surat_id' => $id,
                'tanggal'        => $tanggal,
                'slot'           => intval($slots[$id]),
                'created_at'     => date('Y-m-d H:i:s')
            ];
            $this->db->insert('slot_number', $data);
        }
    }

    $this->session->set_flashdata('success_slot', 'Slot berhasil ditambahkan!');
    redirect('index.php/penomoran/Penomoran/data_slot');
}

public function do_edit_slot() {
    $id = $this->input->post('id_slot');
    $data = [
      'jenis_surat_id' => $this->input->post('jenis_surat_id'),
      'slot' => $this->input->post('slot'),
      'tanggal' => $this->input->post('tanggal'),
    //   'updated_at' => date('Y-m-d H:i:s')
    ];
  
    $this->db->where('id', $id);
    $this->db->update('slot_number', $data);
  
    // Kirim flashdata untuk sweetalert
    $this->session->set_flashdata('success_edit', 'Slot berhasil diubah!');
    redirect('index.php/penomoran/Penomoran/data_slot');
  }
  
  public function delete_slot()
{
    $id = $this->input->post('id_slot');
    $this->db->where('id', $id);
    $this->db->delete('slot_number');

    echo json_encode(['status' => 'success']);
}

public function data_penomoran(){
		
    $d['data_penomoran'] = $this->db->query("select a.*,b.kode_surat,c.nama_bidang,d.nama_jenis,e.nama from request_number a 
    join kode_klasifikasi b on a.kode_klasifikasi_id = b.id
    join bidang c on a.pengolah_id = c.id
    join jenis_surat d on d.id = a.jenis_surat_id
    join user e on e.id = a.created_by
    order by a.created_at desc")->result_array();
    $this->load->view('Penomoran/data_penomoran',$d);
}

public function add_penomoran(){
		
    $this->load->view('Penomoran/add_penomoran',$d);
}
public function generate_nomor()
{
    $is_multiple = $this->input->post('is_multiple') == '1';
    $nomor_akhir_input = (int) $this->input->post('nomor_akhir_input');
    $jenis_surat_id      = $this->input->post('jenis_surat_id');
    $kode_klasifikasi_id = $this->input->post('kode_klasifikasi_id');
    $pengolah_id         = $this->input->post('pengolah_id');
    $tanggal             = $this->input->post('tanggal');
    $today = date('Y-m-d');

    if (!$jenis_surat_id || !$kode_klasifikasi_id || !$pengolah_id || !$tanggal) {
        echo json_encode(['error' => 'Data tidak lengkap']);
        return;
    }

    // Cek apakah tanggal sudah pernah dipakai
    $existing = $this->db->get_where('request_number', ['tanggal' => $tanggal, 'jenis_surat_id' => $jenis_surat_id])->row();

    if ($existing) {
        $this->db->where('tanggal', $tanggal);
        $this->db->where('jenis_surat_id', $jenis_surat_id);
        $this->db->order_by('CAST(COALESCE(nomor_akhir, nomor_urut) AS UNSIGNED)', 'DESC', false);
        $this->db->order_by('created_at', 'DESC');
        $last_record = $this->db->get('request_number', 1)->row();

        $nomor_sebelumnya = $last_record ? ($last_record->is_multiple ? (int)$last_record->nomor_akhir : (int)$last_record->nomor_urut) : 0;
    } else {
        // Ambil nomor terakhir dari tanggal sebelumnya
        $tanggal_kemarin = date('Y-m-d', strtotime($tanggal . ' -1 day'));

        $this->db->where('jenis_surat_id', $jenis_surat_id);
        $this->db->where('tanggal <=', $tanggal_kemarin);
        $this->db->order_by('CAST(COALESCE(nomor_akhir, nomor_urut) AS UNSIGNED)', 'DESC', false);
        $this->db->order_by('tanggal', 'DESC');
        $last_record = $this->db->get('request_number', 1)->row();

        $nomor_terakhir = $last_record ? ($last_record->is_multiple ? (int)$last_record->nomor_akhir : (int)$last_record->nomor_urut) : 0;

        // Ambil slot dari tanggal kemarin
        $slot_kemarin = $this->db->get_where('slot_number', ['tanggal' => $tanggal_kemarin, 'jenis_surat_id' => $jenis_surat_id])->row();
        $jumlah_slot = $slot_kemarin ? (int)$slot_kemarin->slot : 0;

        $nomor_sebelumnya = $nomor_terakhir + $jumlah_slot;
    }

    if ($is_multiple) {
        $nomor_awal = $nomor_sebelumnya + 1;
        $nomor_akhir = $nomor_awal + $nomor_akhir_input + 1;
        $nomor_awal_str = str_pad($nomor_awal, 3, '0', STR_PAD_LEFT);
        $nomor_akhir_str = str_pad($nomor_akhir, 3, '0', STR_PAD_LEFT);
    } else {
        $nomor_urut_selanjutnya = $nomor_sebelumnya + 1;
        $nomor_urut_str = str_pad($nomor_urut_selanjutnya, 3, '0', STR_PAD_LEFT);
    }

    $kode_klasifikasi = $this->db->get_where('kode_klasifikasi', ['id' => $kode_klasifikasi_id])->row()->kode_surat;
    $kode_bidang      = $this->db->get_where('bidang', ['id' => $pengolah_id])->row()->kode_bidang;
    $tahun            = date('Y', strtotime($tanggal));

    if ($is_multiple) {
        $nomor_surat = "$nomor_awal_str - $nomor_akhir_str/$kode_klasifikasi/$kode_bidang";
    } else {
        $nomor_surat = "$nomor_urut_str/$kode_klasifikasi/$kode_bidang";
    }

    $info_slot = '';
    $sisa_slot = 0;
    $slot_data = $this->db->get_where('slot_number', ['tanggal' => $tanggal, 'jenis_surat_id' => $jenis_surat_id])->row();

    if ($tanggal < $today) {
        $this->db->where('jenis_surat_id', $jenis_surat_id);
        $this->db->where('tanggal', $tanggal);
        $this->db->where('DATE(created_at) >', $tanggal);
        $jumlah_dipakai = $this->db->count_all_results('request_number');

        $sisa_slot = ($slot_data ? (int)$slot_data->slot : 0) - $jumlah_dipakai;
        if ($sisa_slot < 0) $sisa_slot = 0;
        $info_slot = "Sisa Slot $tanggal yaitu $sisa_slot";
    } elseif ($tanggal == $today) {
        $slot_today = $slot_data ? (int)$slot_data->slot : 0;
        $info_slot = "$slot_today nomor disiapkan untuk permintaan susulan.";
    }

    $nomor_terakhir = $last_record ? $last_record->nomor_surat : '-';

    $created_at_terakhir = '-';
    if ($last_record && $last_record->created_at) {
        $timestamp = strtotime($last_record->created_at);
        $bulanIndo = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $created_at_terakhir = date('j', $timestamp) . ' ' . $bulanIndo[date('n', $timestamp) - 1] . ' ' . date('Y H:i', $timestamp);
    }

    $pembuat = '-';
    if ($last_record) {
        $user = $this->db->get_where('user', ['id' => $last_record->created_by])->row();
        if ($user) {
            $pembuat = $user->nama;
        }
    }

    echo json_encode([
        'nomor_urut'    => $is_multiple ? null : $nomor_urut_str,
        'nomor_awal'    => $is_multiple ? $nomor_awal_str : null,
        'nomor_akhir'   => $is_multiple ? $nomor_akhir_str : null,
        'nomor_surat'   => $nomor_surat,
        'nomor_terakhir' => $nomor_terakhir,
        'created_at'    => $created_at_terakhir,
        'pembuat'       => $pembuat,
        'tanggal'       => $tanggal,
        'sisa_slot'     => $tanggal < $today ? $sisa_slot : null,
        'info_slot'     => $tanggal == $today ? $info_slot : null
    ]);
}


public function cek_duplikat_nomor()
{
    $nomor_urut = $this->input->post('nomor_urut');
    $jenis_surat_id = $this->input->post('jenis_surat_id');

    $this->db->where('nomor_urut', $nomor_urut);
    $this->db->where('jenis_surat_id', $jenis_surat_id);
    $cek = $this->db->get('request_number')->num_rows(); // atau nama tabel kamu

    echo json_encode(['exists' => $cek > 0]);
}

public function do_input_penomoran()
{
    $jenis_surat_id      = $this->input->post('jenis_surat_id');
    $kode_klasifikasi_id = $this->input->post('kode_klasifikasi_id');
    $pengolah_id         = $this->input->post('pengolah_id');
    $tanggal             = $this->input->post('tanggal');
    $nomor_surat         = $this->input->post('nomor_surat');

    $is_multiple         = $this->input->post('is_multiple') == '1';
    $nomor_urut          = $this->input->post('nomor_urut');
    $nomor_awal          = $this->input->post('nomor_awal');
    $nomor_akhir         = $this->input->post('nomor_akhir');

    $perihal             = $this->input->post('perihal');
    $isi_ringkas         = $this->input->post('isi_ringkas');
    $catatan             = $this->input->post('catatan');
    $lampiran            = $this->input->post('lampiran');
    $kepada              = $this->input->post('kepada');

    // Validasi dasar
    if (!$jenis_surat_id || !$kode_klasifikasi_id || !$pengolah_id || !$tanggal || !$nomor_surat) {
        $this->session->set_flashdata('error', 'Data tidak lengkap. Harap isi semua kolom.');
        redirect('index.php/penomoran/Penomoran/data_penomoran');
        return;
    }

    // Validasi nomor
    if ($is_multiple) {
        if (!$nomor_awal || !$nomor_akhir) {
            $this->session->set_flashdata('error', 'Nomor awal dan akhir harus diisi.');
            redirect('index.php/penomoran/Penomoran/data_penomoran');
            return;
        }
    } else {
        if (!$nomor_urut) {
            $this->session->set_flashdata('error', 'Nomor urut harus diisi.');
            redirect('index.php/penomoran/Penomoran/data_penomoran');
            return;
        }

        // Cek duplikat nomor urut
        $exists = $this->db->get_where('request_number', [
            'jenis_surat_id' => $jenis_surat_id,
            'nomor_urut'     => $nomor_urut
        ])->row();

        if ($exists) {
            $this->session->set_flashdata('error', 'Nomor urut sudah pernah digunakan.');
            redirect('index.php/penomoran/Penomoran/data_penomoran');
            return;
        }
    }

    // Data yang akan disimpan
    $data = [
        'jenis_surat_id'      => $jenis_surat_id,
        'kode_klasifikasi_id' => $kode_klasifikasi_id,
        'pengolah_id'         => $pengolah_id,
        'tanggal'             => $tanggal,
        'nomor_surat'         => $nomor_surat,
        'lampiran'            => $lampiran,
        'kepada'              => $kepada,
        'catatan'             => $catatan,
        'isi_ringkas'         => $isi_ringkas,
        'perihal'             => $perihal,
        'created_by'          => $this->session->userdata('id'),
        'created_at'          => date('Y-m-d H:i:s'),
        'is_multiple'         => $is_multiple ? 1 : 0
    ];

    if ($is_multiple) {
        $data['nomor_awal']  = (int)$nomor_awal;
        $data['nomor_akhir'] = (int)$nomor_akhir;
        $data['nomor_urut']  = null; // untuk consistency
    } else {
        $data['nomor_urut'] = (int)$nomor_urut;
        $data['nomor_awal'] = null;
        $data['nomor_akhir'] = null;
    }

    // Simpan ke database
    $this->db->insert('request_number', $data);

    $this->session->set_flashdata('success_penomoran', 'Nomor berhasil ditambahkan!');
    redirect('index.php/penomoran/Penomoran/data_penomoran');
}


public function do_edit_penomoran()
{
    $id = $this->input->post('id');
    $data = [

        'perihal'              => $this->input->post('perihal'),
        'kepada'               => $this->input->post('kepada'),
        'isi_ringkas'          => $this->input->post('isi_ringkas'),
        'catatan'              => $this->input->post('catatan'),
        'lampiran'             => $this->input->post('lampiran'),
    ];

    $this->db->where('id', $id);
    $this->db->update('request_number', $data); // Ganti dengan nama tabelmu

    $this->session->set_flashdata('success_edit', 'Data berhasil diperbarui.');
    redirect('index.php/penomoran/Penomoran/data_penomoran'); // arahkan ke mana pun kamu mau
}

public function delete_penomoran()
{
    $id = $this->input->post('edit_id');
    $this->db->where('id', $id);
    $this->db->delete('request_number');

    echo json_encode(['status' => 'success']);
}





// public function print_surat($id)
// {
//     $data = $this->Penomoran_model->get_by_id($id); // sesuaikan method model
//     if (!$data) show_404();
//     $this->load->view('penomoran/print_surat', ['data' => $data]);
// }

public function dashboard()
{
  $this->load->model('Slot_model');
  $total_slot = $this->Slot_model->get_total_slot();
  $growth_percent = $this->Slot_model->get_growth_percentage();
  
  $data['total_slot'] = $total_slot;
  $data['growth_slot'] = $growth_percent;

  $this->load->view('dashboard', $data);
}

}

?>