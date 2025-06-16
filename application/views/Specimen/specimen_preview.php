<!DOCTYPE html>
<html>
<head>
    <title>Preview Data Excel</title>

    <!-- Bootstrap (optional, agar tombol dan tabel bagus) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h4>Form Tambah Daftar Specimen</h4>

    <!-- Form Simpan -->
    <a href="<?= site_url('index.php/specimen/Specimen/download_all_images') ?>" class="btn btn-success mt-3" target="_blank">Download Semua Gambar</a>


    <?php if (!empty($data_import)) : ?>
        <div class="table-responsive">
            <table id="tablePreview" class="table table-bordered table-striped table-sm">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Instansi</th>
                        <th>Pangkat</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_import as $i => $row): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['jabatan']) ?></td>
                            <td><?= htmlspecialchars($row['instansi']) ?></td>
                            <td><?= htmlspecialchars($row['pangkat']) ?></td>
                           
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Download Semua -->
    <?php else: ?>
        <div class="alert alert-warning mt-3">Belum ada data dari Excel.</div>
    <?php endif; ?>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
       $('#tablePreview').DataTable({
    pageLength: 10, // Default tampil 10 baris per halaman
    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
    paging: true,
    pagingType: 'simple_numbers', // atau 'full_numbers' jika ingin << < 1 2 3 > >>
    order: [[0, 'asc']],
    language: {
        search: "Cari:",
        lengthMenu: "Tampilkan _MENU_ entri",
        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        infoEmpty: "Tidak ada data",
        zeroRecords: "Data tidak ditemukan",
        paginate: {
            first: "Pertama",
            last: "Terakhir",
            next: "Berikutnya",
            previous: "Sebelumnya"
        },
    }
});

    </script>

</body>
</html>
