<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function data_daftar()
    {
        // 🟢 Hapus flash message lama supaya tidak muncul saat refresh
        $this->session->unset_userdata(['success_msg']);

        // Ambil semua parameter pencarian dari GET
        $search = $this->input->get();
        $where = [];

        // Filter pencarian umum
        if (!empty($search['pencipta_arsip'])) {
            $where[] = "a.pencipta_arsip LIKE '%" . $this->db->escape_like_str($search['pencipta_arsip']) . "%'";
        }
        if (!empty($search['asal_arsip'])) {
            $where[] = "a.asal_arsip LIKE '%" . $this->db->escape_like_str($search['asal_arsip']) . "%'";
        }
        if (!empty($search['nomor_arsip'])) {
            $where[] = "a.nomor_arsip LIKE '%" . $this->db->escape_like_str($search['nomor_arsip']) . "%'";
        }
        if (!empty($search['retensi_arsip'])) {
            $where[] = "a.retensi_arsip LIKE '%" . $this->db->escape_like_str($search['retensi_arsip']) . "%'";
        }

        // 🟡 Tambahkan filter Jenis Arsip (dari tabel daftar_arsip_detail)
        if (!empty($search['jenis_arsip'])) {
            $where[] = "a.id IN (
            SELECT daftar_arsip_id 
            FROM daftar_arsip_detail 
            WHERE jenis_arsip LIKE '%" . $this->db->escape_like_str($search['jenis_arsip']) . "%'
        )";
        }

        // Gabungkan semua kondisi WHERE
        $where_sql = !empty($where) ? "WHERE " . implode(" AND ", $where) : "";

        // Data arsip utama
        $sql = "
        SELECT 
            a.id, 
            a.tgl_isi, 
            a.pencipta_arsip, 
            e.id as idkode, 
            a.asal_arsip, 
            e.kode_surat, 
            e.ket, 
            a.nomor_arsip, 
            a.retensi_arsip, 
            a.lokasi_simpan, 
            a.metode_perlindungan
        FROM daftar_arsip a
        LEFT JOIN kode_klasifikasi e ON e.id = a.kode_arsip_id
        $where_sql
        ORDER BY a.tgl_isi DESC
    ";

        $d['data_arsip'] = $this->db->query($sql)->result_array();

        // Ambil semua detail arsip (termasuk jenis)
        $details = $this->db->get('daftar_arsip_detail')->result_array();

        // Kelompokkan detail berdasarkan arsip_id
        $detail_map = [];
        foreach ($details as $drow) {
            $detail_map[$drow['daftar_arsip_id']][] = $drow;
        }
        $d['detail_map'] = $detail_map;

        // Kirim data ke view
        $this->load->view('Daftar/data_daftar', $d);
    }

    public function export_excel_vital()
    {
        $search = $this->input->get();
        $where = [];

        // === Filter pencarian utama ===
        if (!empty($search['pencipta_arsip'])) {
            $where[] = "a.pencipta_arsip LIKE '%" . $this->db->escape_like_str($search['pencipta_arsip']) . "%'";
        }
        if (!empty($search['asal_arsip'])) {
            $where[] = "a.asal_arsip LIKE '%" . $this->db->escape_like_str($search['asal_arsip']) . "%'";
        }
        if (!empty($search['nomor_arsip'])) {
            $where[] = "a.nomor_arsip LIKE '%" . $this->db->escape_like_str($search['nomor_arsip']) . "%'";
        }
        if (!empty($search['retensi_arsip'])) {
            $where[] = "a.retensi_arsip LIKE '%" . $this->db->escape_like_str($search['retensi_arsip']) . "%'";
        }

        // === Tambahkan filter jenis arsip ===
        if (!empty($search['jenis_arsip'])) {
            // Cari ID daftar_arsip yang punya jenis arsip sesuai keyword
            $subquery = $this->db->select('DISTINCT(daftar_arsip_id)')
                ->from('daftar_arsip_detail')
                ->like('jenis_arsip', $search['jenis_arsip'])
                ->get_compiled_select();
            $where[] = "a.id IN ($subquery)";
        }

        $where_sql = !empty($where) ? "WHERE " . implode(" AND ", $where) : "";

        // === Ambil data arsip utama ===
        $sql = "
        SELECT 
            a.id, 
            a.tgl_isi, 
            a.pencipta_arsip, 
            a.asal_arsip,
            e.kode_surat, 
            e.ket, 
            a.nomor_arsip, 
            a.retensi_arsip, 
            a.lokasi_simpan, 
            a.metode_perlindungan
        FROM daftar_arsip a
        LEFT JOIN kode_klasifikasi e ON e.id = a.kode_arsip_id
        $where_sql
        ORDER BY a.tgl_isi DESC
    ";
        $arsip = $this->db->query($sql)->result_array();

        // === Buat file Excel ===
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // === Header Excel ===
        $headers = [
            'No',
            'ID',
            'Tanggal Isi',
            'Pencipta Arsip',
            'Asal Arsip',
            'Kode Klasifikasi',
            'Keterangan',
            'Jenis Arsip',
            'Nomor Arsip',
            'Retensi Arsip',
            'Lokasi Simpan',
            'Metode Perlindungan'
        ];

        // Tulis header
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // === Isi data ===
        $rowNum = 2;
        $no = 1;

        foreach ($arsip as $a) {
            // Ambil semua jenis arsip terkait
            $detail = $this->db->get_where('daftar_arsip_detail', ['daftar_arsip_id' => $a['id']])->result_array();

            if (empty($detail)) {
                // Jika tidak ada jenis arsip
                $sheet->fromArray([
                    $no,
                    $a['id'],
                    $a['tgl_isi'],
                    $a['pencipta_arsip'],
                    $a['asal_arsip'],
                    $a['kode_surat'],
                    $a['ket'],
                    '-', // tidak ada jenis arsip
                    $a['nomor_arsip'],
                    $a['retensi_arsip'],
                    $a['lokasi_simpan'],
                    $a['metode_perlindungan']
                ], null, 'A' . $rowNum);
                $rowNum++;
            } else {
                $first = true;
                foreach ($detail as $d) {
                    if ($first) {
                        $sheet->fromArray([
                            $no,
                            $a['id'],
                            $a['tgl_isi'],
                            $a['pencipta_arsip'],
                            $a['asal_arsip'],
                            $a['kode_surat'],
                            $a['ket'],
                            $d['jenis_arsip'],
                            $a['nomor_arsip'],
                            $a['retensi_arsip'],
                            $a['lokasi_simpan'],
                            $a['metode_perlindungan']
                        ], null, 'A' . $rowNum);
                        $first = false;
                    } else {
                        $sheet->fromArray([
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            '',
                            $d['jenis_arsip'],
                            '',
                            '',
                            '',
                            ''
                        ], null, 'A' . $rowNum);
                    }
                    $rowNum++;
                }
            }
            $no++;
        }

        // === Styling header ===
        $sheet->getStyle('A1:L1')->getFont()->setBold(true);
        foreach (range('A', 'L') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // === Output Excel ===
        $writer = new Xlsx($spreadsheet);
        $filename = 'Daftar_Arsip_Vital_' . date('Ymd_His') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }



    public function do_input_arsip()
    {
        // Ambil data dari form utama
        $data_arsip = [
            'tgl_isi'             => $this->input->post('tgl_isi'),
            'pencipta_arsip'      => $this->input->post('pencipta_arsip'),
            'asal_arsip'          => $this->input->post('asal_arsip'),
            'kode_arsip_id'       => $this->input->post('kode_arsip_id'),
            'nomor_arsip'         => $this->input->post('nomor_arsip'),
            'retensi_arsip'       => $this->input->post('retensi_arsip'),
            'lokasi_simpan'       => $this->input->post('lokasi_simpan'),
            'metode_perlindungan' => $this->input->post('metode_perlindungan'),
        ];

        // Insert ke tabel daftar_arsip
        $this->db->insert('daftar_arsip', $data_arsip);
        $arsip_id = $this->db->insert_id();

        if ($arsip_id) {
            // Ambil data detail dari form
            $jenis_arsip_list = $this->input->post('jenis_arsip');

            // pastikan folder upload ada
            $upload_path = './uploads/arsip/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            // Loop setiap jenis arsip dan file
            if (!empty($jenis_arsip_list)) {
                $count = count($jenis_arsip_list);

                // Load library upload sekali saja
                $this->load->library('upload');

                for ($i = 0; $i < $count; $i++) {
                    $uploaded_file_name = null;

                    // cek apakah ada file di index ini
                    if (!empty($_FILES['file_arsip']['name'][$i])) {
                        $_FILES['file_temp']['name']     = $_FILES['file_arsip']['name'][$i];
                        $_FILES['file_temp']['type']     = $_FILES['file_arsip']['type'][$i];
                        $_FILES['file_temp']['tmp_name'] = $_FILES['file_arsip']['tmp_name'][$i];
                        $_FILES['file_temp']['error']    = $_FILES['file_arsip']['error'][$i];
                        $_FILES['file_temp']['size']     = $_FILES['file_arsip']['size'][$i];

                        $config['upload_path']   = $upload_path;
                        $config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
                        $config['max_size']      = 5120; // 5MB
                        $config['file_name']     = time() . '_' . $i . '_' . $_FILES['file_temp']['name'];

                        $this->upload->initialize($config); // reinit setiap iterasi

                        if ($this->upload->do_upload('file_temp')) {
                            $uploaded_data = $this->upload->data();
                            $uploaded_file_name = $uploaded_data['file_name'];
                        }
                    }

                    // Simpan ke tabel detail
                    $data_detail = [
                        'daftar_arsip_id' => $arsip_id,
                        'jenis_arsip'     => $jenis_arsip_list[$i],
                        'file_arsip'      => $uploaded_file_name // kolom baru
                    ];

                    $this->db->insert('daftar_arsip_detail', $data_detail);
                }
            }

            $this->session->set_flashdata('success_message', 'Daftar arsip berhasil ditambahkan!');
            redirect('index.php/daftar/Daftar/data_daftar');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menambahkan daftar arsip.');
            redirect('index.php/daftar/Daftar/data_daftar');
        }
    }


    public function delete_arsip($id)
    {
        // Hapus data utama
        $this->db->where('id', $id);
        $this->db->delete('daftar_arsip');

        // Tambahkan pesan berhasil hapus
        $this->session->set_flashdata('success_message', 'Data arsip berhasil dihapus!');

        // Redirect kembali ke halaman daftar
        redirect('index.php/daftar/Daftar/data_daftar');
    }

    public function get_detail_arsip($id)
    {
        $this->db->where('daftar_arsip_id', $id);
        $query = $this->db->get('daftar_arsip_detail')->result_array();
        echo json_encode($query);
    }


    public function do_update_arsip()
    {
        $id = $this->input->post('id');

        // === 1️⃣ Update tabel utama daftar_arsip ===
        $data = [
            'tgl_isi'             => $this->input->post('tgl_isi'),
            'pencipta_arsip'      => $this->input->post('pencipta_arsip'),
            'asal_arsip'          => $this->input->post('asal_arsip'),
            'kode_arsip_id'       => $this->input->post('kode_arsip_id'),
            'nomor_arsip'         => $this->input->post('nomor_arsip'),
            'retensi_arsip'       => $this->input->post('retensi_arsip'),
            'lokasi_simpan'       => $this->input->post('lokasi_simpan'),
            'metode_perlindungan' => $this->input->post('metode_perlindungan'),
        ];

        $this->db->where('id', $id);
        $this->db->update('daftar_arsip', $data);

        // === 2️⃣ Hapus data detail lama dulu ===
        $this->db->where('daftar_arsip_id', $id);
        $this->db->delete('daftar_arsip_detail');

        // === 3️⃣ Tambah ulang detail baru ===
        $jenis_arsip = $this->input->post('jenis_arsip');
        $files = $_FILES['file_arsip'];

        if (!empty($jenis_arsip)) {

            // folder upload
            $upload_path = FCPATH . 'uploads/arsip/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            $this->load->library('upload');

            foreach ($jenis_arsip as $i => $jenis) {
                $file_name = null;

                // cek apakah ada file baru di indeks ini
                if (!empty($files['name'][$i])) {
                    $_FILES['single_file']['name']     = $files['name'][$i];
                    $_FILES['single_file']['type']     = $files['type'][$i];
                    $_FILES['single_file']['tmp_name'] = $files['tmp_name'][$i];
                    $_FILES['single_file']['error']    = $files['error'][$i];
                    $_FILES['single_file']['size']     = $files['size'][$i];

                    $config['upload_path']   = $upload_path;
                    $config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
                    $config['max_size']      = 10000; // 10MB
                    $config['file_name']     = time() . '_' . $files['name'][$i];

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('single_file')) {
                        $uploadData = $this->upload->data();
                        $file_name = $uploadData['file_name'];
                    } else {
                        // kalau gagal upload, bisa di-log tapi tetap lanjut
                        log_message('error', 'Upload gagal: ' . $this->upload->display_errors());
                    }
                }

                // simpan ke tabel detail arsip
                $detailData = [
                    'daftar_arsip_id' => $id,
                    'jenis_arsip'     => $jenis,
                    'file_arsip'      => $file_name
                ];
                $this->db->insert('daftar_arsip_detail', $detailData);
            }
        }

        $this->session->set_flashdata('success_message', 'Data arsip berhasil diperbarui');
        redirect('index.php/daftar/Daftar/data_daftar');
    }
}
