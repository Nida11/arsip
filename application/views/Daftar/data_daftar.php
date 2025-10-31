<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/triarsip.png') ?>">
  <title>
    TRIARSIP
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"> <!-- munculin icon icon yang smpet ga jalan -->


  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.1.0') ?>" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/custom-slot.css') ?>">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.legacy.min.js"></script>


  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>




  <style>
    /* Highlight nav-link aktif */
    .nav-link.active {
      background-color: #e0e0e0;
      /* ubah sesuai warna tema */
      color: #000 !important;
      /* teks lebih gelap */
      font-weight: 600;
      /* teks tebal */
      border-left: 4px solid #344767;
      /* garis kiri tebal untuk aktif */
    }

    /* Bungkus table wrapper agar tidak overflow keluar */
    #penomoranTable_wrapper {
      overflow-x: auto;
    }

    /* Atur table agar lebar tidak memaksa keluar kontainer */
    #penomoranTable {
      width: 100% !important;
      table-layout: auto;
      white-space: nowrap;
    }

    /* Pagination DataTables - versi minimalis */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      padding: 6px 10px;
      margin: 2px;
      border: none;
      background-color: transparent;
      color: #555 !important;
      font-size: 0.85rem;
      font-weight: 500;
    }

    /* Saat hover - warna lembut, tidak hitam */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background-color: #e0e0e0;
      color: #000 !important;
      border: 1px solid #ccc;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }


    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background-color: #e0e0e0 !important;
      color: #000 !important;
      border-radius: 4px;
    }

    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 4px 8px;
      font-size: 0.85rem;
      box-shadow: none;
    }

    .dataTables_wrapper .dataTables_info {
      font-size: 0.85rem;
      color: #666;
    }

    .btn-cari {
      background-color: #FFC107;
      border-color: #FFB300;
      color: #000;

    }

    .btn-cari:hover {
      background-color: #FFB300;
      border-color: #FFA000;
    }

    .btn-export {
      background-color: #46f371ff;
      border-color: #1cec84ff;
      color: #000;

    }

    .btn-export:hover {
      background-color: #44fa6cff;
      border-color: #12db3eff;
    }
  </style>


  <style>
    .custom-alert {
      background-color: #ffffff;
      border-left: 5px solid #28a745;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
      padding: 1rem 1.25rem;
      border-radius: 0.75rem;
      color: #333;
      font-size: 0.8rem;
      /* Ukuran default untuk tulisan biasa */
      margin-top: 1rem;
      line-height: 1.6;
    }

    .custom-alert.success {
      border-left-color: #28a745;
      color: rgb(1, 1, 1);
    }

    .custom-alert.warning {
      border-left-color: #ffc107;
      color: #856404;
    }

    .custom-alert.loading {
      border-left-color: #007bff;
      color: #004085;
    }

    .custom-alert.error {
      border-left-color: #dc3545;
      color: rgb(255, 0, 25);
    }

    .highlight-db {
      color: rgb(255, 0, 0);
      /* merah elegan */
      font-weight: 600;
      font-size: 1rem;
      /* Lebih besar dari teks biasa */
    }

    /* Responsive untuk mobile */
    @media (max-width: 576px) {
      .custom-alert {
        font-size: 0.95rem;
        padding: 0.75rem 1rem;
      }

      .highlight-db {
        font-size: 1rem;
      }

    }
  </style>

  <style>
    @media print {
      @page {
        size: A5 landscape;
        margin: 0;
      }

      #printArea {
        width: 210mm;
        height: 148mm;
      }

      * {
        box-sizing: border-box;
      }

      body {
        background: white;
        margin: 0;
        padding: 0;
      }

    }
  </style>

  <style>
    @media (max-width: 991.98px) {
      body.g-sidenav-hidden #sidenav-main {
        transform: translateX(-110%);
        /* lebih jauh agar benar-benar keluar */
        box-shadow: none !important;
        border: none !important;
      }

      body.g-sidenav-pinned #sidenav-main {
        transform: translateX(0);
        transition: all 0.3s ease-in-out;
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 250px;
        z-index: 1050;
        background-color: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        /* opsional */
      }

      /* Hilangkan margin-left konten utama agar full width di layar kecil */
      main.main-content {
        margin-left: 0 !important;
        transition: all 0.3s ease-in-out;
      }
    }

    /* Bungkus khusus bagian Pengisian Daftar Arsip */
    .daftar-arsip-section {
      background: #f8f9fa;
      /* abu2 tipis */
      padding: 1rem 1.5rem;
      /* jarak dalam */
      border-radius: 8px;
      /* sudut melengkung */
      margin-bottom: 1rem;
      /* jarak antar elemen bawah */
    }

    /* Judul biar lebih rapih */
    .daftar-arsip-section .section-title {
      font-size: 24px;
      font-weight: 700;
      margin-bottom: 0.5rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    /* Atur lebar modal tambah pengisian arsip */
    #addSlotModal .modal-dialog {
      max-width: 1000px;
      /* lebar modal */
      width: 55%;
      /* biar responsive */
      margin: auto;
      /* pastikan tetap center */
      display: flex;
      align-items: center;
      /* center vertical */
      justify-content: center;
      /* ✅ center horizontal */
      min-height: 100vh;
      /* biar modal ketengah vertical */

    }

    /* Atur tinggi/isi modal supaya lebih lega */
    #addSlotModal .modal-body {
      max-height: 80vh;
      /* biar gak terlalu panjang keluar layar */
      overflow-y: auto;
      /* kasih scroll kalau isinya kepanjangan */
      padding: 2rem;
      /* jarak dalam lebih rapi */
    }

    .filter-section {
      margin-bottom: 10px !important;
      /* jarak antara form filter dan tabel */
    }

    .filter-buttons {
      margin-top: 28px;
      /* agar tombol sejajar dengan input */
    }
  </style>

</head>


<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://9a06-114-10-45-240.ngrok-free.app/arsip/index.php/Guest/beranda_admin" target="_blank">
        <img src="<?= base_url('assets/img/bapenda.png') ?>" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Bapenda Jabar</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/Guest/beranda_admin') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <!-- Digital Numbering (Dropdown) -->
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#submenu-digital-numbering" role="button" aria-expanded="false" aria-controls="submenu-digital-numbering">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Digital Numbering</span>
          </a>
          <div class="collapse" id="submenu-digital-numbering">
            <ul class="nav ms-4 ps-3">
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/index.php/penomoran/Penomoran/data_slot') ?>">
                  <span class="sidenav-mini-icon">A</span>
                  <span class="sidenav-normal">Data Slot Nomor</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/index.php/penomoran/Penomoran/data_penomoran') ?>">
                  <span class="sidenav-mini-icon">B</span>
                  <span class="sidenav-normal">Data Penomoran</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('/index.php/daftar/Daftar/data_daftar') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-folder-17 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Daftar Arsip Vital</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/cdaftar_inaktif/Daftar/daftar_inaktif') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-archive-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Daftar Arsip Inaktif</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/specimen/Specimen/data_specimen') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Specimen</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/Guest/') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Barcode</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/Guest/login') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="p-2 w-100 mx-auto" src="<?= base_url('assets/img/illustrations/logobapen.png') ?>" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <img class=" w-100 mx-auto" src="<?= base_url('assets/img/gemahripah1.png') ?>" alt="sidebar_illustration">
        </div>
      </div>
    </div>
  </aside>


  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarMain">
      <div class="container-fluid py-1 px-3 d-flex align-items-center">
        <!-- Tombol hamburger -->
        <button class="navbar-toggler d-lg-none me-3" type="button" id="toggleSidebar" aria-label="Toggle sidebar">
          <i class="fas fa-bars text-white"></i>
        </button>
      </div>
    </nav>


    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h6>Daftar Arsip Vital </h6>
          <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addSlotModal">
            Tambah Daftar Arsip </button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <!-- Dropdown Filter Jenis Surat -->
          <div class="px-4">
            <!-- Filter Form -->
            <form method="get" class="mb-3">
              <div class="row g-3">
                <div class="col-md-3">
                  <label class="form-label mb-1 text-sm">Pencipta Arsip</label>
                  <input type="text" name="pencipta_arsip" class="form-control form-control-sm"
                    value="<?= $this->input->get('pencipta_arsip') ?>" placeholder="Masukkan Unit Kerja">
                </div>
                <div class="col-md-3">
                  <label class="form-label mb-1 text-sm">Asal Arsip / Unit Kerja</label>
                  <input type="text" name="asal_arsip" class="form-control form-control-sm"
                    value="<?= $this->input->get('asal_arsip') ?>" placeholder="Masukkan Uraian Masalah">
                </div>
                <div class="col-md-3">
                  <label class="form-label mb-1 text-sm">Nomor Arsip</label>
                  <input type="text" name="nomor_arsip" class="form-control form-control-sm"
                    value="<?= $this->input->get('nomor_arsip') ?>" placeholder="Nomor Arsip">
                </div>
                <div class="col-md-3">
                  <label class="form-label mb-1 text-sm">Jenis Arsip</label>
                  <input type="text" name="jenis_arsip" class="form-control form-control-sm"
                    value="<?= $this->input->get('jenis_arsip') ?>" placeholder="Jenis Arsip">
                </div>


                <!-- Tombol Cari & Export -->
                <div class="d-flex justify-content-center gap-2 my-2">
                  <button type="submit" class="btn btn-cari">
                    <i class="fa fa-search"></i> Cari
                  </button>
                  <a href="<?= base_url('index.php/daftar/Daftar/export_excel_vital?' . http_build_query($_GET)) ?>"
                    class="btn btn-export">
                    <i class="fa fa-file-excel"></i> Export
                  </a>
                </div>
            </form>
          </div>


          <div class="p-3">

            <table id="penomoranTable" class="table table-sm table-bordered table-striped align-items-center mb-0 w-100">

              <thead class="thead-dark">
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pengisian</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pencipta Arsip</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asal Arsip / unit kerja</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Klasifikasi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis / Series Arsip</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Arsip</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Retensi Arsip</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokasi Simpan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metode perlindungan</th>
                  <th class="no-export text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($data_arsip as $row): ?>
                  <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center tanggal-isi" data-value="<?= $row['tgl_isi'] ?>">
                      <?= formatTanggalIndo($row['tgl_isi']) ?>
                    </td>
                    <td class="text-center"><?= htmlspecialchars($row['pencipta_arsip']); ?></td>
                    <td class="text-center"><?= htmlspecialchars($row['asal_arsip']); ?></td>

                    <!-- 🔹 Kolom baru: Kode Klasifikasi -->
                    <td class="text-center">
                      <?= htmlspecialchars($row['kode_surat']) ?> - <?= htmlspecialchars($row['ket']) ?>
                    </td>

                    <td>
                      <?php
                      if (!empty($detail_map[$row['id']])): ?>
                        <ul class="mb-0">
                          <?php foreach ($detail_map[$row['id']] as $detail): ?>
                            <li>
                              <?= htmlspecialchars($detail['jenis_arsip']) ?><br>
                              <?php if (!empty($detail['file_arsip'])): ?>
                                <a href="<?= base_url('uploads/arsip/' . $detail['file_arsip']) ?>"
                                  target="_blank">
                                  <?= htmlspecialchars($detail['file_arsip']) ?>
                                </a>
                              <?php else: ?>
                                <em>Tidak ada file</em>
                              <?php endif; ?>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      <?php else: ?>
                        <em>-</em>
                      <?php endif; ?>
                    </td>

                    <td class="text-center">
                      <div class="text-dark mb-1" style="font-weight: normal;">
                        <?= htmlspecialchars($row['nomor_arsip']) ?>
                      </div>
                    </td>

                    <td class="text-center"><?= htmlspecialchars($row['retensi_arsip']); ?></td>
                    <td class="text-center"><?= htmlspecialchars($row['lokasi_simpan']); ?></td>
                    <td class="text-center"><?= htmlspecialchars($row['metode_perlindungan']); ?></td>
                    <td class="text-center">




                      <button class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#editArsipModal"
                        data-id="<?= $row['id']; ?>"
                        data-tgl="<?= $row['tgl_isi']; ?>"
                        data-pencipta="<?= htmlspecialchars($row['pencipta_arsip']); ?>"
                        data-asal="<?= htmlspecialchars($row['asal_arsip']); ?>"
                        data-kodeid="<?= $row['idkode']; ?>"
                        data-nomor="<?= htmlspecialchars($row['nomor_arsip']); ?>"
                        data-retensi="<?= htmlspecialchars($row['retensi_arsip']); ?>"
                        data-lokasi="<?= htmlspecialchars($row['lokasi_simpan']); ?>"
                        data-metode="<?= htmlspecialchars($row['metode_perlindungan']); ?>"
                        title="Edit Arsip">

                        <i class="fas fa-edit"></i>
                      </button>





                      <a href="<?= base_url('index.php/daftar/Daftar/delete_arsip/' . $row['id']); ?>"
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('Yakin ingin menghapus arsip ini? Data yang dihapus tidak bisa dikembalikan.');">
                        <i class="fa fa-trash"></i>
                      </a>

                    </td>
                  </tr>

                <?php endforeach; ?>

              </tbody>
            </table>

            <div class="modal fade" id="editArsipModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <form action="<?= base_url('index.php/daftar/Daftar/do_update_arsip'); ?>"
                  method="post" enctype="multipart/form-data">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Data Arsip</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                      <input type="hidden" name="id" id="edit-id">

                      <div class="mb-2">
                        <label>Tanggal Isi Arsip</label>
                        <input type="date" name="tgl_isi" id="edit-tgl" class="form-control">
                      </div>

                      <div class="mb-2">
                        <label>Pencipta Arsip</label>
                        <input type="text" name="pencipta_arsip" id="edit-pencipta" class="form-control">
                      </div>

                      <div class="mb-2">
                        <label>Asal Arsip</label>
                        <input type="text" name="asal_arsip" id="edit-asal" class="form-control">
                      </div>
                      <?php
                      $kode = $this->db->get('kode_klasifikasi')->result();
                      ?>

                      <div class="col-md-16 mb-3">
                        <label class="form-control-label" for="edit_kode_arsip_id">Kode Arsip</label>
                        <select name="kode_arsip_id" id="edit_kode_arsip_id" class="form-control select2" style="width: 100%;">
                          <option></option>
                          <?php foreach ($kode as $k): ?>
                            <option value="<?= $k->id ?>"><?= $k->kode_surat ?> - <?= $k->ket ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>


                      <div class="mb-2">
                        <label>Nomor Arsip</label>
                        <input type="text" name="nomor_arsip" id="edit-nomor" class="form-control">
                      </div>

                      <div class="mb-2">
                        <label>Retensi Arsip</label>
                        <input type="text" name="retensi_arsip" id="edit-retensi" class="form-control">
                      </div>

                      <div class="mb-2">
                        <label>Lokasi Simpan</label>
                        <input type="text" name="lokasi_simpan" id="edit-lokasi" class="form-control">
                      </div>

                      <div class="mb-2">
                        <label>Metode Perlindungan</label>
                        <input type="text" name="metode_perlindungan" id="edit-metode" class="form-control">
                      </div>

                      <!-- Tambahan bagian detail jenis arsip -->
                      <div class="col-md-12 mb-3">
                        <label class="form-control-label d-block fw-bold">Jenis / Series Arsip</label>

                        <!-- container untuk dynamic field -->
                        <div id="edit-series-container">
                          <!-- Diisi secara dinamis via JS saat klik tombol edit -->
                        </div>

                        <!-- tombol tambah -->
                        <button type="button" id="edit-add-series" class="btn btn-primary btn-sm mt-2">
                          + Add
                        </button>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                      <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>



            <!-- Modal Tambah Arsip -->
            <div class="modal fade" id="addSlotModal" tabindex="-1" aria-labelledby="addSlotModalLabel" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <form method="POST" enctype="multipart/form-data" action="<?= base_url("index.php/daftar/Daftar/do_input_arsip") ?>">
                    <div class="modal-body">
                      <div class="row">

                        <div class="col-md-12 mb-3 daftar-arsip-section">
                          <label class="form-control-label fw-bold fs-3">
                            <i class="fa fa-folder-open text-primary me-2"></i> Daftar Arsip
                          </label><br>
                          <!-- Instruksi -->
                          <div class="mb-2">

                          </div>

                          <div class="form-group">
                            <label for="tanggal" name="tgl_isi">Tanggal & Waktu Pengisian</label>
                            <?php
                            date_default_timezone_set('Asia/Jakarta'); // pastikan ini sesuai
                            $now = date('Y-m-d\TH:i'); // tanpa detik -> paling kompatibel
                            ?>
                            <input
                              type="datetime-local"
                              class="form-control"
                              id="tanggal"
                              name="tanggal"
                              value="<?= date('Y-m-d\TH:i:s') ?>"
                              min="<?= date('Y-m-d\TH:i:s') ?>"
                              max="<?= date('Y-m-d\TH:i:s') ?>"
                              readonly>
                          </div>

                          <div id="info-nomor-surat" class="alert custom-alert d-none"></div>

                          <div class="col-md-16 mb-3">
                            <label class="form-control-label" for="pencipta_arsip">Pencipta Arsip</label>
                            <input type="text" class="form-control" id="pencipta_arsip" name="pencipta_arsip">
                          </div>

                          <div class="col-md-16 mb-3">
                            <label class="form-control-label" for="asal_arsip">Asal Arsip / Unit Kerja</label>
                            <input type="text" class="form-control" id="asal_arsip" name="asal_arsip">
                          </div>

                          <?php
                          $kode = $this->db->get('kode_klasifikasi')->result();
                          ?>

                          <div class="col-md-16 mb-3">
                            <label class="form-control-label" for="kode_arsip_id">Kode Arsip</label>
                            <select name="kode_arsip_id" id="kode_arsip_id" class="form-control select2" style="width: 100%;">
                              <option></option> <!-- Kosongkan dulu untuk placeholder -->
                              <?php foreach ($kode as $k): ?>
                                <option value="<?= $k->id ?>"><?= $k->kode_surat ?> - <?= $k->ket ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>

                          <div class="col-md-16 mb-3">
                            <label class="form-control-label" for="nomor_arsip">Nomor Arsip</label>
                            <input type="text" class="form-control" name="nomor_arsip">
                          </div>

                          <div class="col-md-16 mb-3">
                            <label class="form-control-label" for="retensi_arsip">Retensi Arsip</label>
                            <input type="text" class="form-control" id="" name="retensi_arsip">
                          </div>

                          <div class="col-md-16 mb-3">
                            <label class="form-control-label" for="lokasi_simpan">Lokasi Simpan</label>
                            <input type="text" class="form-control" id="lokasi_simpan" name="lokasi_simpan">
                          </div>
                          <div class="col-md-16 mb-3">
                            <label class="form-control-label" for="metode_perlindungan">Metode Perlindungan</label>
                            <input type="text" class="form-control" id="metode_perlindungan" name="metode_perlindungan">
                          </div>
                          <div class="col-md-12 mb-3">
                            <label class="form-control-label d-block">Jenis / Series Arsip</label>

                            <!-- container untuk dynamic field -->
                            <div id="series-container">
                              <div class="card mb-2 shadow-sm position-relative">
                                <div class="card-body p-2">
                                  <textarea
                                    class="form-control border-0 series-textarea mb-2"
                                    name="jenis_arsip[]"
                                    rows="3"
                                    placeholder="Tulis jenis atau series arsip di sini..."></textarea>
                                  <input type="file" class="form-control border-0" name="file_arsip[]" />
                                  <!-- tombol hapus -->
                                  <button type="button"
                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-series">
                                    ✕
                                  </button>
                                </div>
                              </div>
                            </div>

                            <!-- tombol tambah -->
                            <button type="button" id="add-series" class="btn btn-primary btn-sm mt-2">
                              + Add
                            </button>
                          </div>

                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- FOOTER -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>

            </form>
          </div>
        </div>
      </div>



      </tbody>
      </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>
              <!-- made with <i class="fa fa-heart"></i> by -->
              <!-- <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a> -->
              Arsiparis Badan Pendapatan Daerah.by RND
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://twitter.com/bapenda_jabar" class="fab fa-twitter-square me-2" target="_blank" style="font-size: 24px; color: #1da1f2;"></a>
              </li>
              <li class="nav-item">
                <a href="https://www.facebook.com/bapenda.jabar/?locale=id_ID" class="fab fa-facebook-square me-2" target="_blank" style="font-size: 24px; color: #3b5998;"></a>
              </li>
              <li class="nav-item">
                <a href="https://www.instagram.com/bapenda.jabar" class="fab fa-instagram-square me-2" target="_blank" style="font-size: 24px; color: #c13584;"></a>
              </li>
              <li class="nav-item">
                <a href="https://bapenda.jabarprov.go.id/" class="fas fa-globe me-2" target="_blank" style="font-size: 24px; color: #4CAF50;" title="Website Bapenda Jabar"></a>
              </li>
              <li class="nav-item">
                <a href="https://www.youtube.com/channel/@BapendaJabar" class="fab fa-youtube-square me-2" target="_blank" style="font-size: 24px; color: #ff0000;"></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Setting</h5>
          <!-- <p>See our dashboard options.</p> -->
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="d-flex my-3">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <!-- <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div> -->
      </div>
    </div>
  </div>


  <!--   Core JS Files   -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>





  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const today = new Date().toISOString().split('T')[0];

      // Untuk form tambah
      const tanggal = document.getElementById("tanggal");
      if (tanggal) {
        tanggal.setAttribute("max", today);
      }


    });
  </script>


  <?php if ($this->session->flashdata('success_message')): ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?= $this->session->flashdata("success_message") ?>',
        timer: 2000,
        showConfirmButton: false
      });
    </script>
  <?php endif; ?>





  <?php if ($this->session->flashdata('success_message')): ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '<?= $this->session->flashdata("success_message") ?>',
        timer: 2000,
        showConfirmButton: false
      });
    </script>
  <?php endif; ?>


  <script>
    $(document).on('click', '.delete-daftar', function() {
      const slotId = $(this).data('id');

      Swal.fire({
        title: 'Yakin ingin menghapus daftar arsip ini?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          // Kirim ke backend
          $.ajax({
            url: '<?= base_url("index.php/daftar/Daftar/delete_arsip") ?>',
            method: 'POST',
            data: {
              edit_id: slotId
            },
            success: function(response) {
              // Tampilkan notifikasi sukses
              Swal.fire({
                title: 'Berhasil!',
                text: 'Nomor berhasil dihapus.',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
              }).then(() => {
                location.reload(); // refresh halaman
              });
            },
            error: function() {
              Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus nomor.', 'error');
            }
          });
        }
      });
    });
  </script>




  <script>
    $(document).ready(function() {


      $('#kode_arsip_id').select2({
        placeholder: "Pilih Kode Arsip",
        allowClear: true,
        dropdownParent: $('#addSlotModal') // Ganti juga di sini
      });


    });
  </script>


  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.1.0') ?>"></script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.getElementById("searchInput");
      const startDateInput = document.getElementById("startDate");
      const endDateInput = document.getElementById("endDate");
      const table = document.getElementById("penomoranTable");
      const rows = table.querySelectorAll("tbody tr");

      function filterTable() {
        const searchValue = searchInput.value.toLowerCase();
        const startDate = startDateInput.value;
        const endDate = endDateInput.value;

        rows.forEach(row => {
          const text = row.textContent.toLowerCase();
          const tanggalCell = row.querySelector(".tanggal-surat");
          const tanggalSurat = tanggalCell.getAttribute("data-value");

          let matchText = text.includes(searchValue);
          let matchDate = true;

          if (startDate && tanggalSurat < startDate) matchDate = false;
          if (endDate && tanggalSurat > endDate) matchDate = false;

          if (matchText && matchDate) {
            row.style.display = "";
          } else {
            row.style.display = "none";
          }
        });
      }

      searchInput.addEventListener("input", filterTable);
      startDateInput.addEventListener("change", filterTable);
      endDateInput.addEventListener("change", filterTable);
    });
  </script>



  <script>
    $(document).ready(function() {
      const table = $('#penomoranTable').DataTable({
        responsive: true,
        autoWidth: true,
        pageLength: 10,
        dom: '<"row mb-3"<"col-sm-12 col-md-6"l>>t<"row mt-3"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7 text-end"p>>',
        language: {
          lengthMenu: "Tampilkan _MENU_ entri",
          info: "Menampilkan _START_ sampai _END_ dari total _TOTAL_ data",
          zeroRecords: "⚠️ Tidak ada data ditemukan",
          paginate: {
            previous: "⭠ Prev",
            next: "Next ⭢"
          }
        },
      });

      // Search manual
      $('#searchInput').on('keyup', function() {
        table.search(this.value).draw();
      });

      // Filter tanggal
      $('#startDate, #endDate').on('change', function() {
        const start = $('#startDate').val();
        const end = $('#endDate').val();

        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
          const tanggal = $('#penomoranTable tbody tr').eq(dataIndex).find('.tanggal-surat').data('value');
          if (!tanggal) return false;

          if ((start === "" || tanggal >= start) && (end === "" || tanggal <= end)) {
            return true;
          }
          return false;
        });

        table.draw();
        $.fn.dataTable.ext.search.pop();
      });
    });
  </script>





  <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  </script>



  <!-- JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>



  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const btn = document.getElementById('toggleSidebar');
      const sidebar = document.getElementById('sidenav-main');

      btn.addEventListener('click', function(e) {
        e.stopPropagation(); // cegah event merembet
        document.body.classList.toggle('g-sidenav-pinned');
        document.body.classList.toggle('g-sidenav-hidden');
      });

      // Klik di luar sidebar akan menutupnya
      document.addEventListener('click', function(e) {
        const isMobile = window.innerWidth < 992;
        if (isMobile && document.body.classList.contains('g-sidenav-pinned')) {
          // Jika klik bukan di sidebar dan bukan di hamburger
          if (!sidebar.contains(e.target) && e.target !== btn) {
            document.body.classList.remove('g-sidenav-pinned');
            document.body.classList.add('g-sidenav-hidden');
          }
        }
      });

      // Jika layar di-resize ke desktop, pastikan sidebar tampil default
      window.addEventListener('resize', function() {
        if (window.innerWidth >= 992) {
          document.body.classList.remove('g-sidenav-hidden', 'g-sidenav-pinned');
        }
      });
    });
  </script>
  <script>
    // event tambah form baru
    document.getElementById("add-series").addEventListener("click", function() {
      const container = document.getElementById("series-container");
      const newCard = document.createElement("div");
      newCard.classList.add("card", "mb-2", "shadow-sm", "position-relative");
      newCard.innerHTML = `
    <div class="card-body p-2">
      <textarea
        class="form-control border-0 series-textarea mb-2"
        name="jenis_arsip[]"
        rows="3"
        placeholder="Tulis jenis atau series arsip di sini..."></textarea>
      <input type="file" class="form-control border-0" name="file_arsip[]" />
      <button type="button"
        class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-series">
        ✕
      </button>
    </div>
  `;
      container.appendChild(newCard);
    });

    // event hapus form
    document.addEventListener("click", function(e) {
      if (e.target.classList.contains("remove-series")) {
        e.target.closest(".card").remove();
      }
    });
  </script>


  ...
  <!-- Modal Edit Arsip ada di sini -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      console.log("Script edit modal aktif");

      const modal = document.getElementById('editArsipModal');
      const container = document.getElementById('edit-series-container');
      const addBtn = document.getElementById('edit-add-series');

      if (!modal || !container) {
        console.warn("Modal atau container tidak ditemukan!");
        return;
      }

      // Fungsi nambah field
      function addSeriesFieldEdit(jenis = '', file_name = '') {
        const card = document.createElement('div');
        card.className = 'card mb-2 shadow-sm position-relative';
        card.innerHTML = `
        <div class="card-body p-2">
          <textarea class="form-control border-0 series-textarea mb-2"
            name="jenis_arsip[]"
            rows="3"
            placeholder="Tulis jenis atau series arsip di sini...">${jenis}</textarea>
          <input type="file" class="form-control border-0" name="file_arsip[]" />
          ${file_name ? `<small class="text-muted">File lama: ${file_name}</small>` : ''}
          <button type="button"
            class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-series">✕</button>
        </div>
      `;
        container.appendChild(card);
        card.querySelector('.remove-series').addEventListener('click', () => card.remove());
      }

      // Tombol tambah field manual
      if (addBtn) addBtn.addEventListener('click', () => addSeriesFieldEdit());

      // Pastikan tidak ada event lama
      $(modal).off('show.bs.modal').on('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        console.log('Modal dibuka untuk ID:', id);

        // Hindari fetch dobel → tandai ID yang sedang di-fetch
        if (modal.dataset.fetchingId === id) {
          console.log('⛔ Sudah fetch untuk ID ini, lewati.');
          return;
        }
        modal.dataset.fetchingId = id; // tandai supaya ga fetch lagi

        // isi form utama
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-tgl').value = button.getAttribute('data-tgl');
        document.getElementById('edit-pencipta').value = button.getAttribute('data-pencipta');
        document.getElementById('edit-asal').value = button.getAttribute('data-asal');
        document.getElementById('edit-nomor').value = button.getAttribute('data-nomor');
        document.getElementById('edit-retensi').value = button.getAttribute('data-retensi');
        document.getElementById('edit-lokasi').value = button.getAttribute('data-lokasi');
        document.getElementById('edit-metode').value = button.getAttribute('data-metode');
        const kode_id = button.getAttribute('data-kodeid');
        $('#edit_kode_arsip_id').val(kode_id).trigger('change.select2');

        // Bersihkan container lama
        container.innerHTML = '';

        // Fetch data detail
        fetch("<?= base_url('index.php/daftar/Daftar/get_detail_arsip/') ?>" + id)
          .then(response => response.json())
          .then(data => {
            console.log("✅ Data detail:", data);
            if (data.length > 0) {
              data.forEach(detail => addSeriesFieldEdit(detail.jenis_arsip, detail.file_arsip));
            } else {
              addSeriesFieldEdit();
            }
          })
          .catch(error => {
            console.error('Gagal ambil detail arsip:', error);
            addSeriesFieldEdit();
          })
          .finally(() => {
            // hapus tanda fetching supaya bisa buka ID lain nanti
            setTimeout(() => delete modal.dataset.fetchingId, 500);
          });
      });
    });
  </script>

  <script>
    $('#edit_kode_arsip_id').select2({
      dropdownParent: $('#editArsipModal'),
      placeholder: "Pilih kode arsip...",
      allowClear: true
    });
  </script>



</body>

</html>