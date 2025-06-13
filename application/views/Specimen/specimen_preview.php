<!DOCTYPE html>
<html>
<head>
    <title>Preview Data</title>
</head>
<body>
    <h3>Data dari Excel:</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Instansi</th>
            <th>Pangkat</th>
        </tr>
        <?php foreach ($data_import as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['jabatan']) ?></td>
                <td><?= htmlspecialchars($row['instansi']) ?></td>
                <td><?= htmlspecialchars($row['pangkat']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="<?= site_url('index.php/specimen/Specimen/download_image/' . $index) ?>" class="btn btn-success" target="_blank">Download Gambar</a>

</body>
</html>
