<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/bapenda.png') ?>">
  <title>
    Arsip Penomoran Surat Keluar
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



  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>




<style>
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
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
</style>




  <style>
    .custom-alert {
      background-color: #ffffff;
      border-left: 5px solid #28a745;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
      padding: 1rem 1.25rem;
      border-radius: 0.75rem;
      color: #333;
      font-size: 0.8rem; /* Ukuran default untuk tulisan biasa */
      margin-top: 1rem;
      line-height: 1.6;
    }

  .custom-alert.success {
    border-left-color: #28a745;
    color:rgb(1, 1, 1);
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
    color:rgb(255, 0, 25);
  }

    .highlight-db {
    color:rgb(255, 0, 0); /* merah elegan */
    font-weight: 600;
    font-size: 1rem; /* Lebih besar dari teks biasa */
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
          <a class="nav-link active" href="<?= base_url('/index.php/Guest/beranda_admin') ?>">
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
    <div class="container-fluid py-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Numbering Data's</h6>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addSlotModal">
                            Tambah Penomoran
                        </button>
                    </div>
        <div class="card-body px-0 pt-0 pb-2">
          <!-- Dropdown Filter Jenis Surat -->
<div class="px-3 mb-3">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-3">
                                <label for="searchInput" class="form-label">Cari</label>
                                <input type="text" id="searchInput" class="form-control" placeholder="Cari perihal, kepada, dll.">
                            </div>
                            <div class="col-md-3">
                                <label for="startDate" class="form-label">Tanggal Awal</label>
                                <input type="date" id="startDate" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="endDate" class="form-label">Tanggal Akhir</label>
                                <input type="date" id="endDate" class="form-control">
                            </div>
                            <!-- <div class="col-md-2">
                                <button id="exportBtn" class="btn btn-success w-100">Export Excel</button>
                            </div> -->
                        </div>
                    </div>

                    <div class="p-3">
                                        
<table id="penomoranTable" class="table table-sm table-bordered table-striped align-items-center mb-0 w-100">

                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Surat</th> 
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Surat</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengolah</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Klasifikasi</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nomor Surat</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Perihal</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kepada</th>
                                        <th class="no-export text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>                                      
                                    </tr>
                                </thead>
                                 <tbody>
                                <?php foreach ($data_penomoran as $row): ?>
                                <tr>
<td class="text-center tanggal-surat" data-value="<?= $row['tanggal'] ?>">
  <?= formatTanggalIndo($row['tanggal']) ?>
</td>
                              <td class="text-center"><?= htmlspecialchars($row['nama_jenis']); ?></td>
                              <td class="text-center"><?= htmlspecialchars($row['nama_bidang']); ?></td>
                              <td class="text-center"><?= htmlspecialchars($row['kode_surat']); ?></td>
                              <td class="text-center">
                              <?php
                                  $namaDepan = explode(' ', $row['nama'])[0];
                                  ?>

                                  <div class="fw-bold text-dark mb-1">
                                    <strong><?= htmlspecialchars($row['nomor_surat']) ?></strong>
                                  </div>
                                  <div class="d-flex justify-content-center gap-1 flex-wrap">
                                  <small class="badge bg-success text-white fw-semibold">
                                  <?= htmlspecialchars($namaDepan) ?>
                                    </small>
                                    <small class="badge bg-secondary text-white fw-semibold">
                                      <?= formatTanggalIndoJam($row['created_at']) ?>
                                    </small>
                                  </div>

                              </td>
                              <td class="text-center"><?= htmlspecialchars($row['perihal']); ?></td>
                              <td class="text-center"><?= htmlspecialchars($row['kepada']); ?></td>
                              <td class="text-center">
                              <button
                              type="button"
                              class="btn btn-sm btn-xs btn-primary"
                              data-bs-toggle="modal"
                              data-bs-target="#editSlotModal"
                              data-id="<?= $row['id']; ?>"
                              data-tanggal="<?= $row['tanggal']; ?>"
                              data-jenis="<?= $row['jenis_surat_id']; ?>"
                              data-pengolah="<?= $row['pengolah_id']; ?>"
                              data-klasifikasi="<?= $row['kode_klasifikasi_id']; ?>"
                              data-nomor_urut="<?= $row['nomor_urut']; ?>"
                              data-nomor_surat="<?= $row['nomor_surat']; ?>"
                              data-perihal="<?= $row['perihal']; ?>"
                              data-kepada="<?= $row['kepada']; ?>"
                              data-isi_ringkas="<?= $row['isi_ringkas']; ?>"
                              data-catatan="<?= $row['catatan']; ?>"
                              data-lampiran="<?= $row['lampiran']; ?>"
                              data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Surat Keluar"
                            >
                              <i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-xs btn-danger delete-penomoran"
                            data-id="<?= $row['id']; ?>"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Surat Keluar"
                            >
                            <i class="fa fa-trash"></i>
                          </button>

                            <!-- ✅ Tambah Tombol Print -->
  <button
    class="btn btn-sm btn-info btn-xs print-surat"
    data-id="<?= $row['id']; ?>"
    data-bs-toggle="tooltip"
    data-bs-placement="top"
    title="Print Surat Keluar"
  >
    <i class="fa fa-print"></i>
  </button>

                              </td>
                          </tr>

                      <?php endforeach; ?>
                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Modal Tambah Slot -->
<div class="modal fade" id="addSlotModal" tabindex="-1" aria-labelledby="addSlotModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="POST" action="<?= base_url("index.php/penomoran/Penomoran/do_input_penomoran") ?>">
    <div class="modal-body">
    <div class="row">

    <div class="form-group">
    <label for="tanggal">Tanggal</label>
    <input type="date" class="form-control" id="tanggal" name="tanggal">
</div>

<div id="info-nomor-surat" class="alert custom-alert d-none"></div>


      <?php 
     $nama_jenis = $this->db->get('jenis_surat')->result();
      ?>

      <div class="col-md-6 mb-3">
        <label class="form-control-label" for="jenis_surat">Jenis Surat</label>
        <select name="jenis_surat_id" id="jenis_surat_id" class="form-control select2" style="width: 100%;">
        <option></option> <!-- Kosongkan dulu untuk placeholder -->
        <?php foreach ($nama_jenis as $g): ?>
          <option value="<?= $g->id ?>"><?= $g->nama_jenis ?></option>
        <?php endforeach; ?>
      </select>
      </div>

      
      <?php 
      $bid = $this->db->get('bidang')->result();
      ?>

      <div class="col-md-6 mb-3">
        <label class="form-control-label" for="bidang">Bidang</label>
        <select name="pengolah_id" id="pengolah_id" class="form-control select2" style="width: 100%;">
        <option></option> <!-- Kosongkan dulu untuk placeholder -->
        <?php foreach ($bid as $b): ?>
          <option value="<?= $b->id ?>"><?= $b->kode_bidang ?> - <?= $b->nama_bidang ?></option>
        <?php endforeach; ?>
      </select>
      </div>

      <?php 
      $kode = $this->db->get('kode_klasifikasi')->result();
      ?>

      <div class="col-md-6 mb-3">
        <label class="form-control-label" for="kode_klasifikasi">Kode Klasifikasi</label>
        <select name="kode_klasifikasi_id" id="kode_klasifikasi_id" class="form-control select2" style="width: 100%;">
        <option></option> <!-- Kosongkan dulu untuk placeholder -->
        <?php foreach ($kode as $k): ?>
          <option value="<?= $k->id ?>"><?= $k->kode_surat ?> - <?= $k->ket ?></option>
        <?php endforeach; ?>
      </select>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-control-label" for="nomor_surat">Nomor Urut</label>
        <input type="text" class="form-control" id="nomor_urut" name="nomor_urut">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-control-label" for="nomor_surat">Nomor Surat</label>
        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
      </div>

    

      <div class="col-md-6 mb-3">
        <label class="form-control-label" for="perihal">Perihal</label>
        <input type="text" class="form-control" id="perihal" name="perihal">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-control-label" for="kepada">Kepada</label>
        <input type="text" class="form-control" id="kepada" name="kepada">
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-control-label" for="isi_ringkas">Isi Ringkas</label>
        <textarea class="form-control" id="isi_ringkas" name="isi_ringkas" rows="2"></textarea>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-control-label" for="catatan">Catatan</label>
        <textarea class="form-control" id="catatan" name="catatan" rows="2"></textarea>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-control-label" for="lampiran">Lampiran</label>
        <input type="text" class="form-control" id="lampiran" name="lampiran">
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

                    <!-- END Modal -->
      <!-- Modal Edit Penomoran -->
<div class="modal fade" id="editSlotModal" tabindex="-1" aria-labelledby="editSlotModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= base_url("index.php/penomoran/Penomoran/do_edit_penomoran") ?>">
        <div class="modal-body">
          <div class="row">

            <input type="hidden" id="edit_id" name="id">

            <!-- <div class="form-group">
              <label for="edit_tanggal">Tanggal</label>
              <input type="date" class="form-control" id="edit_tanggal" name="tanggal" readonly>
            </div>

            <div id="edit-info-nomor-surat" class="alert d-none mt-3" role="alert"></div>

            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="edit_jenis_surat_id">Jenis Surat</label>
              <select name="jenis_surat_id" id="edit_jenis_surat_id" class="form-control select2" style="width: 100%;" readonly>
                <option></option>
                <?php foreach ($nama_jenis as $g): ?>
                  <option value="<?= $g->id ?>"><?= $g->nama_jenis ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="edit_pengolah_id">Bidang</label>
              <select name="pengolah_id" id="edit_pengolah_id" class="form-control select2" style="width: 100%;" readonly>
                <option></option>
                <?php foreach ($bid as $b): ?>
                  <option value="<?= $b->id ?>"><?= $b->kode_bidang ?> - <?= $b->nama_bidang ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="edit_kode_klasifikasi_id">Kode Klasifikasi</label>
              <select name="kode_klasifikasi_id" id="edit_kode_klasifikasi_id" class="form-control select2" style="width: 100%;" readonly>
                <option></option>
                <?php foreach ($kode as $k): ?>
                  <option value="<?= $k->id ?>"><?= $k->kode_surat ?> - <?= $k->ket ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="edit_nomor_urut">Nomor Urut</label>
              <input type="text" class="form-control" id="edit_nomor_urut" name="nomor_urut" readonly>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="edit_nomor_surat">Nomor Surat</label>
              <input type="text" class="form-control" id="edit_nomor_surat" name="nomor_surat" readonly>
            </div> -->

            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="edit_perihal">Perihal</label>
              <input type="text" class="form-control" id="edit_perihal" name="perihal">
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="edit_kepada">Kepada</label>
              <input type="text" class="form-control" id="edit_kepada" name="kepada">
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="edit_isi_ringkas">Isi Ringkas</label>
              <textarea class="form-control" id="edit_isi_ringkas" name="isi_ringkas" rows="2"></textarea>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="edit_catatan">Catatan</label>
              <textarea class="form-control" id="edit_catatan" name="catatan" rows="2"></textarea>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-control-label" for="edit_lampiran">Lampiran</label>
              <input type="text" class="form-control" id="edit_lampiran" name="lampiran">
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
function generateNomorSurat() {
  const jenis_surat_id = $('#jenis_surat_id').val();
  const kode_klasifikasi_id = $('#kode_klasifikasi_id').val();
  const pengolah_id = $('#pengolah_id').val();
  const tanggal = $('#tanggal').val();

  // Cek input wajib sudah dipilih
  if (!jenis_surat_id || !kode_klasifikasi_id || !pengolah_id || !tanggal) {
    $('#info-nomor-surat')
      .removeClass()
      .addClass('custom-alert warning')
      .html('⚠️ Mohon lengkapi semua data untuk generate nomor surat.');
    return;
  }

  // Tampilkan loading
  $('#info-nomor-surat')
    .removeClass()
    .addClass('custom-alert loading')
    .html('⏳ Sedang memproses nomor surat...');

  $.ajax({
    type: 'POST',
    url: '<?= base_url('index.php/penomoran/Penomoran/generate_nomor') ?>',
    data: {
      jenis_surat_id,
      kode_klasifikasi_id,
      pengolah_id,
      tanggal
    },
    dataType: 'json',
    success: function(res) {
      if (res.error) {
        $('#info-nomor-surat')
          .removeClass()
          .addClass('custom-alert error fade-in')
          .html('❌ ' + res.error);
        return;
      }

       // Formatter tanggal Indonesia
  function formatTanggalIndo(tanggalStr) {
    const bulanIndo = [
      "Januari", "Februari", "Maret", "April", "Mei", "Juni",
      "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    
    if (!tanggalStr) return '-';

    const [tahun, bulan, hari] = tanggalStr.split("-");
    return `${parseInt(hari)} ${bulanIndo[parseInt(bulan) - 1]} ${tahun}`;
  }

  const tanggalFormatted = formatTanggalIndo(res.tanggal);


      // Jika berhasil, tampilkan datanya
      $('#nomor_urut').val(res.nomor_urut);
      $('#nomor_surat').val(res.nomor_surat);

      const infoTambahan =
  res.sisa_slot !== null
    ? `<br>Sisa Slot <code class="highlight-db">${tanggalFormatted}</code> yaitu <code class="highlight-db">${res.sisa_slot}</code>`
    : res.info_slot
    ? `<br><em>${res.info_slot}</em>`
    : '';


      $('#info-nomor-surat')
        .removeClass()
        .addClass('custom-alert success')
        .html(`
            <strong class="text-success font-weight-bold">
            ✅ Nomor surat berhasil dibuat!
            </strong>
        <br></br>
          Nomor Terakhir: <code class="highlight-db">${res.nomor_terakhir}</code><br>
          Dibuat pada: <code class="highlight-db">${res.created_at}</code><br>
          Pembuat Sebelumnya: <code class="highlight-db">${res.pembuat}</code><br>${infoTambahan}
        `);

    },
    error: function(xhr, status, error) {
      $('#info-nomor-surat')
        .removeClass('alert-warning alert-success')
        .addClass('alert-warning')
        .html('🚨 Gagal memproses data. Silakan coba lagi.');
    }
  });
}

// Trigger otomatis jika semua input sudah terisi
$('#jenis_surat_id, #kode_klasifikasi_id, #pengolah_id, #tanggal').on('change', function () {
  const allFilled =
    $('#jenis_surat_id').val() &&
    $('#kode_klasifikasi_id').val() &&
    $('#pengolah_id').val() &&
    $('#tanggal').val();

  if (allFilled) {
    generateNomorSurat();
  }
});

// Bersihkan info saat modal ditutup
$('#modalNomorSurat').on('hidden.bs.modal', function () {
  $('#info-nomor-surat')
    .removeClass('alert-info alert-warning alert-danger')
    .addClass('d-none')
    .html('');

  // Optional: reset isian form juga kalau mau
  $('#nomor_urut').val('');
  $('#nomor_surat').val('');
});


  </script>

<script>
function cekDuplikatNomor() {
  const nomor_urut = $('#nomor_urut').val();
  const jenis_surat_id = $('#jenis_surat_id').val();
  const tanggal = $('#tanggal').val(); // Tambahkan ini jika cek pakai tanggal

  // Jalankan hanya jika semua terisi
  if (nomor_urut && jenis_surat_id && tanggal) {
    $.ajax({
      url: '<?= base_url('index.php/penomoran/Penomoran/cek_duplikat_nomor') ?>',
      method: 'POST',
      data: {
        nomor_urut: nomor_urut,
        jenis_surat_id: jenis_surat_id,
        tanggal: tanggal
      },
      dataType: 'json',
      success: function(res) {
        if (res.exists) {
          Swal.fire({
            icon: 'warning',
            title: 'Nomor Duplikat',
            text: '⚠️ Nomor Urut ini sudah digunakan untuk jenis surat yang sama!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
          }).then(() => {
            $('#nomor_urut').focus();
          });

          $('#nomor_urut').addClass('is-invalid');
        } else {
          $('#nomor_urut').removeClass('is-invalid');
        }
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: 'Gagal Mengecek',
          text: 'Terjadi kesalahan saat mengecek nomor urut.'
        });
      }
    });
  }
}

// Trigger saat input berubah
$('#nomor_urut, #tanggal, #jenis_surat_id').on('change keyup', cekDuplikatNomor);

</script>


  <script>
  $('#jenis_surat_id, #kode_klasifikasi_id, #unit_pengolah_id, #tanggal').on('change', function () {
  // Kirim AJAX ke endpoint
  $.post('<?= base_url("index.php/penomoran/Penomoran/generate_nomor") ?>', {
    jenis_surat_id: $('#jenis_surat_id').val(),
    kode_klasifikasi_id: $('#kode_klasifikasi_id').val(),
    pengolah_id: $('#pengolah_id').val(),
    tanggal: $('#tanggal').val()
  }, function (data) {
    $('#nomor_urut').val(data.nomor_urut);
    $('#nomor_surat').val(data.nomor_surat);
    $('#info_terakhir').html("Terakhir: " + data.nomor_terakhir + " oleh " + data.pembuat);
    $('#sisa_slot').html("Sisa slot: " + data.sisa_slot);
  }, 'json');
});

  </script>

<script>
$(document).ready(function () {
    $('.btn-edit').on('click', function () {
        // Ambil modal
        const modal = $('#editSlotModal');

        // Ambil data dari tombol
        const id = $(this).data('id');
        const tanggal = $(this).data('tanggal');
        const jenis = $(this).data('jenis');
        const pengolah = $(this).data('pengolah');
        const klasifikasi = $(this).data('klasifikasi');
        const nomorUrut = $(this).data('nomor_urut');
        const nomorSurat = $(this).data('nomor_surat');
        const perihal = $(this).data('perihal');
        const kepada = $(this).data('kepada');
        const isiRingkas = $(this).data('isi_ringkas');
        const catatan = $(this).data('catatan');
        const lampiran = $(this).data('lampiran');

        // Set ke input form di modal edit
        modal.find('#edit_id').val(id);
        modal.find('#edit_tanggal').val(tanggal);
        modal.find('#edit_jenis_surat_id').val(jenis).trigger('change');
        modal.find('#edit_pengolah_id').val(pengolah).trigger('change');
        modal.find('#edit_kode_klasifikasi_id').val(klasifikasi).trigger('change');
        modal.find('#edit_nomor_urut').val(nomorUrut);
        modal.find('#edit_nomor_surat').val(nomorSurat);
        modal.find('#edit_perihal').val(perihal);
        modal.find('#edit_kepada').val(kepada);
        modal.find('#edit_isi_ringkas').val(isiRingkas);
        modal.find('#edit_catatan').val(catatan);
        modal.find('#edit_lampiran').val(lampiran);
    });
});
</script>


<?php if ($this->session->flashdata('success_penomoran')): ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: '<?= $this->session->flashdata("success_penomoran") ?>',
  timer: 2000,
  showConfirmButton: false
});
</script>
<?php endif; ?>


<?php if ($this->session->flashdata('success_edit')): ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: '<?= $this->session->flashdata('success_edit'); ?>',
      showConfirmButton: false,
      timer: 2000
    });
  </script>
<?php endif; ?>
<script>
  $(document).on('click', '.delete-penomoran', function () {
    const slotId = $(this).data('id');

    Swal.fire({
      title: 'Yakin ingin menghapus nomor ini?',
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
          url: '<?= base_url("index.php/penomoran/Penomoran/delete_penomoran") ?>',
          method: 'POST',
          data: { edit_id: slotId },
          success: function (response) {
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
          error: function () {
            Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus nomor.', 'error');
          }
        });
      }
    });
  });
</script>




  <script>
  $(document).ready(function() {
    $('#jenis_surat_id').select2({
      placeholder: "Pilih jenis surat",
      allowClear: true
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#kode_klasifikasi_id').select2({
      placeholder: "Pilih Kode Klasifikasi",
      allowClear: true
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#pengolah_id').select2({
      placeholder: "Pilih Unit Pengolah",
      allowClear: true
    });
  });
</script>


  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.1.0') ?>"></script>
<!-- 
DataTables + Export Script
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script> -->
<!-- SCRIPT FILTER -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
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
$(document).ready(function () {
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
    $('#searchInput').on('keyup', function () {
        table.search(this.value).draw();
    });

    // Filter tanggal
    $('#startDate, #endDate').on('change', function () {
        const start = $('#startDate').val();
        const end = $('#endDate').val();

        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
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
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>

<script>
$(document).on('click', '.print-surat', function () {
  const id = $(this).data('id');
  const url = `<?= base_url("index.php/penomoran/Penomoran/print_surat/") ?>${id}`;
  window.open(url, '_blank');
});
</script>


</body>

</html>