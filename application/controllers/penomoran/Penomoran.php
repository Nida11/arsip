<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penomoran extends CI_Controller {


    public function data_slot() {
        $d['data_slot'] = $this->db->query("
            SELECT a.*, b.nama_jenis 
            FROM slot_number a 
            JOIN jenis_surat b ON a.jenis_surat_id = b.id
            ORDER BY a.tanggal DESC
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
      'updated_at' => date('Y-m-d H:i:s')
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



public function add_penomoran(){
		
    $this->load->view('Penomoran/add_penomoran',$d);
}
public function generate_nomor()
{
    $jenis_surat_id      = $this->input->post('jenis_surat_id');
    $kode_klasifikasi_id = $this->input->post('kode_klasifikasi_id');
    $pengolah_id         = $this->input->post('pengolah_id');
    $tanggal             = $this->input->post('tanggal');

    if (!$jenis_surat_id || !$kode_klasifikasi_id || !$pengolah_id || !$tanggal) {
        echo json_encode(['error' => 'Data tidak lengkap']);
        return;
    }

    // Apakah tanggal ini sudah pernah dipakai di request_number?
    $this->db->where('tanggal', $tanggal);
    $this->db->where('jenis_surat_id', $jenis_surat_id);
    $this->db->order_by('nomor_urut', 'DESC');
    $last_today = $this->db->get('request_number')->row();

    if ($last_today) {
        // Tanggal sudah pernah dipakai, tinggal lanjutkan nomor
        $nomor_urut_selanjutnya = $last_today->nomor_urut + 1;
    } else {
        // Tanggal belum pernah muncul di request_number
        $today = date('Y-m-d');

        if ($tanggal < $today) {
            // Cek apakah ada slot untuk tanggal yang diminta?
            $this->db->where('tanggal', $tanggal);
            $cek_slot = $this->db->get('slot_number')->row();

            if (!$cek_slot) {
                echo json_encode([
                    'error' => 'Tidak bisa menambahkan nomor karena hari terlewat, tidak ada slot, dan tidak ada nomor di tanggal itu.'
                ]);
                return;
            }
        }

        // Ambil nomor urut terakhir global
        $this->db->select_max('nomor_urut');
        $this->db->where('jenis_surat_id', $jenis_surat_id);
        $last_nomor = $this->db->get('request_number')->row();
        $nomor_urut_terakhir = $last_nomor ? (int)$last_nomor->nomor_urut : 0;

        // Ambil slot dari hari kemarin saja
        $tanggal_kemarin = date('Y-m-d', strtotime($tanggal . ' -1 day'));
        $this->db->where('tanggal', $tanggal_kemarin);
        $slot_kemarin = $this->db->get('slot_number')->row();
        $jumlah_slot_kemarin = $slot_kemarin ? (int)$slot_kemarin->slot : 0;

        $nomor_urut_selanjutnya = $nomor_urut_terakhir + $jumlah_slot_kemarin + 1;
    }

    // Format nomor urut 3 digit
    $nomor_urut_str = str_pad($nomor_urut_selanjutnya, 3, '0', STR_PAD_LEFT);

    // Ambil kode klasifikasi dan kode bidang
    $kode_klasifikasi = $this->db->get_where('kode_klasifikasi', ['id' => $kode_klasifikasi_id])->row()->kode_surat;
    $kode_bidang      = $this->db->get_where('bidang', ['id' => $pengolah_id])->row()->kode_bidang;
    $tahun            = date('Y', strtotime($tanggal));

    // Format nomor surat
    $nomor_surat = "{$nomor_urut_str}/{$kode_klasifikasi}/{$tahun}/{$kode_bidang}";

    // Cek duplikat
    $exists = $this->db->get_where('request_number', ['nomor_surat' => $nomor_surat])->row();
    while ($exists) {
        $nomor_urut_selanjutnya++;
        $nomor_urut_str = str_pad($nomor_urut_selanjutnya, 3, '0', STR_PAD_LEFT);
        $nomor_surat = "{$nomor_urut_str}/{$kode_klasifikasi}/{$tahun}/{$kode_bidang}";
        $exists = $this->db->get_where('request_number', ['nomor_surat' => $nomor_surat])->row();
    }

    // Ambil sisa slot tanggal itu (hanya informasi)
    $this->db->where('tanggal', $tanggal);
    $slot_data = $this->db->get('slot_number')->row();
    $sisa_slot = $slot_data ? (int)$slot_data->slot : 0;

    // Ambil nomor terakhir
    $this->db->where('jenis_surat_id', $jenis_surat_id);
    $this->db->order_by('created_at', 'DESC');
    $last_record = $this->db->get('request_number', 1)->row();
    $nomor_terakhir = $last_record ? $last_record->nomor_surat : '-';

    // Ambil nama pembuat
    $pembuat = '-';
    if ($last_record) {
        $user = $this->db->get_where('user', ['id' => $last_record->created_by])->row();
        if ($user) {
            $pembuat = $user->nama;
        }
    }

    echo json_encode([
        'nomor_surat'    => $nomor_surat,
        'nomor_terakhir' => $nomor_terakhir,
        'pembuat'        => $pembuat,
        'sisa_slot'      => $sisa_slot
    ]);
}




}

?>