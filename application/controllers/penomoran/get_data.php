<?php
header('Content-Type: application/json');
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'arsiparis'; // Ganti dengan nama database kamu

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

// Ambil parameter pencarian
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$start = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Query dasar
$sql = "
    SELECT 
        dn.tanggal,
        js.nama_jenis_surat AS jenis_surat,
        b.nama_bidang AS unit_pengolah,
        kk.kode AS kode_klasifikasi,
        dn.nomor_surat,
        dn.perihal,
        dn.kepada,
        dn.isi_ringkas,
        dn.catatan,
        dn.lampiran
    FROM digital_numbering dn
    JOIN jenis_surat js ON dn.id_jenis_surat = js.id
    JOIN bidang b ON dn.id_bidang = b.id
    JOIN kode_klasifikasi kk ON dn.id_kode_klasifikasi = kk.id
    WHERE 1
";

// Filter tanggal
if (!empty($start) && !empty($end)) {
    $sql .= " AND dn.tanggal BETWEEN '$start' AND '$end'";
}

// Filter pencarian (perihal, kepada, isi ringkas, dll)
if (!empty($search)) {
    $sql .= " AND (
        dn.perihal LIKE '%$search%' OR
        dn.kepada LIKE '%$search%' OR
        dn.isi_ringkas LIKE '%$search%' OR
        dn.catatan LIKE '%$search%' OR
        dn.nomor_surat LIKE '%$search%'
    )";
}

$sql .= " ORDER BY dn.tanggal DESC";

$result = $conn->query($sql);

$data = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);
$conn->close();
