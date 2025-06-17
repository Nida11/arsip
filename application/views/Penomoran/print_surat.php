<!-- <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Print Surat Keluar</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      width: 14.8cm;
      height: 21cm;
      padding: 1cm;
    }

    .header {
      text-align: center;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .content {
      margin-top: 10px;
    }

    .field {
      margin-bottom: 8px;
    }

    .label {
      font-weight: bold;
    }

    @media print {
      @page {
        size: A5 portrait;
        margin: 1cm;
      }
    }
  </style>
</head>
<body onload="window.print()">
  <div class="header">Arsip Surat Keluar</div>
  <div class="content">
    <div class="field"><span class="label">Tanggal:</span> <?= formatTanggalIndo($data['tanggal']) ?></div>
    <div class="field"><span class="label">Nomor Surat:</span> <?= $data['nomor_surat'] ?></div>
    <div class="field"><span class="label">Jenis Surat:</span> <?= $data['nama_jenis'] ?></div>
    <div class="field"><span class="label">Pengolah:</span> <?= $data['nama_bidang'] ?></div>
    <div class="field"><span class="label">Kode Klasifikasi:</span> <?= $data['kode_surat'] ?></div>
    <div class="field"><span class="label">Perihal:</span> <?= $data['perihal'] ?></div>
    <div class="field"><span class="label">Kepada:</span> <?= $data['kepada'] ?></div>
    <div class="field"><span class="label">Isi Ringkas:</span><br> <?= nl2br($data['isi_ringkas']) ?></div>
    <div class="field"><span class="label">Catatan:</span><br> <?= nl2br($data['catatan']) ?></div>
    <div class="field"><span class="label">Lampiran:</span> <?= $data['lampiran'] ?></div>
  </div>
</body>
</html> -->
