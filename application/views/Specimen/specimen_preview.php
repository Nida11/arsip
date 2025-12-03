<!DOCTYPE html>
<html>
<head>
    <title>Preview Data Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        .row-duplicate { background:#ffe6e6; } /* merah muda untuk duplicate */
        .badge-dup { background:#e74c3c; color:#fff; padding:3px 6px; border-radius:4px; }
        .badge-ok  { background:#2ecc71; color:#fff; padding:3px 6px; border-radius:4px; }
    </style>
</head>
<body class="container py-4">
    <h4>Form Tambah Daftar Specimen</h4>

    <?php
    // Hitung berapa duplicate / new
    $total = count($data_import ?? []);
    $dup_count = 0;
    foreach ($data_import as $r) if (!empty($r['is_duplicate'])) $dup_count++;
    $new_count = $total - $dup_count;
    ?>

    <div class="mb-2">
        <span class="badge badge-secondary">Total baris: <?= $total ?></span>
        <span class="badge badge-danger">Duplicate: <?= $dup_count ?></span>
        <span class="badge badge-success">Siap dibuat: <?= $new_count ?></span>
    </div>

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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_import as $i => $row): 
                        $is_dup = !empty($row['is_duplicate']);
                    ?>
                        <tr class="<?= $is_dup ? 'row-duplicate' : '' ?>">
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['jabatan']) ?></td>
                            <td><?= htmlspecialchars($row['instansi']) ?></td>
                            <td><?= htmlspecialchars($row['pangkat']) ?></td>
                            <td>
                                <?php if ($is_dup): ?>
                                    <span class="badge-dup">Sudah ada</span>
                                <?php else: ?>
                                    <span class="badge-ok">Baru</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Tombol hanya memproses baris yang "Baru" karena session berisi semua baris dengan flag -->
        <a href="<?= site_url('index.php/specimen/Specimen/download_all_images') ?>" class="btn btn-success mt-3" target="_blank">Download & Buat Specimen (Hanya yg Baru)</a>
        <form method="post" action="<?= site_url('index.php/specimen/Specimen/simpan_dari_excel') ?>" class="d-inline">
            <button type="submit" class="btn btn-primary mt-3">Simpan ke Database (Hanya yg Baru)</button>
        </form>

    <?php else: ?>
        <div class="alert alert-warning mt-3">Belum ada data dari Excel.</div>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
       $('#tablePreview').DataTable({
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
            paging: true,
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
