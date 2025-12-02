<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Arsip</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Arsip — ID: <?= $main->id ?></h4>
        </div>

        <div class="card-body">

            <!-- DATA UTAMA -->
            <h5>Informasi Utama</h5>
            <table class="table table-bordered">
                <tr><th width="35%">Tanggal Isi</th><td><?= $main->tgl_isi ?></td></tr>
                <tr><th>Unit Kerja</th><td><?= $main->unit_kerja ?></td></tr>
                <tr><th>Kode Arsip</th><td><?= $main->kode_arsip_id ?></td></tr>
                <tr><th>Tahun</th><td><?= $main->tahun ?></td></tr>
                <tr><th>Jumlah</th><td><?= $main->jumlah ?></td></tr>
                <tr><th>Nomor Sampul</th><td><?= $main->nomor_sampul ?></td></tr>
                <tr><th>Nomor Box</th><td><?= $main->nomor_box ?></td></tr>
                <tr><th>Nomor Rak</th><td><?= $main->nomor_rak ?></td></tr>
                <tr><th>Keterangan</th><td><?= $main->keterangan ?></td></tr>
                <tr><th>TK</th><td><?= $main->tk ?></td></tr>
            </table>

            <!-- JENIS ARSIP -->
            <h5 class="mt-4">Daftar Arsip</h5>

            <?php if (!empty($detail)) : ?>
                <ul class="list-group">
                    <?php foreach ($detail as $d) : ?>
                        <li class="list-group-item"><?= $d->arsip ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p class="text-muted">Tidak ada arsip detail.</p>
            <?php endif; ?>

            <!-- QR PREVIEW -->
          

            <!-- BUTTON -->
          

                <a href="<?= base_url() ?>" class="btn btn-secondary">Kembali</a>
            </div>

        </div>
    </div>

</div>

</body>
</html>
