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
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.1.0') ?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"> <!-- munculin icon icon yang smpet ga jalan -->

  <style>
    div.dataTables_filter {
      display: none;
    }
    
  </style>
<style>
/* Dropdown list (opsi) */
.select2-container .select2-results__option {
  font-weight: bold;
  font-size: 12px;
}

/* Selected item (tampilan awal sebelum dropdown dibuka) */
.select2-container--default .select2-selection--single .select2-selection__rendered {
  font-weight: bold;
  font-size: 12px;
}

</style>
<style>
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
  color:rgb(255, 255, 255) !important;
  border: 1px solidrgb(255, 3, 3);
  box-shadow: 0 2px 4px rgb(250, 244, 244);
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
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-dark position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://39ed-123-231-234-58.ngrok-free.app/arsip/index.php/Guest/beranda_admin " target="_blank">
        <img src="<?= base_url('assets/img/bapenda.png') ?>" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Bapenda Jabar</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
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
                <a class="nav-link" href="<?= base_url('/index.php//penomoran/Penomoran/data_penomoran') ?>">
                  <span class="sidenav-mini-icon">B</span>
                  <span class="sidenav-normal">Data Penomoran</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <!-- Billing -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/specimen/Specimen/data_specimen') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Specimen</span>
          </a>
        </li>

        <!-- Virtual Reality -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/Guest/') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Barcode</span>
          </a>
        </li>

        <!-- RTL -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/Guest/rtl') ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li> -->

        <!-- Account Pages -->
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
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="p-2 w-100 mx-auto" src="<?= base_url('assets/img/illustrations/logobapen.png') ?>" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <img class=" w-100 mx-auto" src="<?= base_url('assets/img/gemahripah.png') ?>" alt="sidebar_illustration">
          <!-- <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div> -->
        </div>
      </div>
      <!-- <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a> -->
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Specimen</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Daftar Specimen</h6>
        </nav>
        <div class="col-6 text-end">
          </svg>
        </div>
      </div>
      </a>
      </li>
      </ul>
      </li>
      </ul>
      </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
              <h6 class="mb-5">Daftar Specimen</h6>
              <a class="btn mb-0 text-white" style="background-color:rgb(42, 116, 201);"
                href="<?php echo base_url() . 'index.php/specimen/Specimen/add_specimen/'; ?>">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Specimen
              </a>
            </div>

            <div class="card-body px-4 pt-0 pb-4">
              <div class="table-responsive ">



                <table class="table align-items-center mb-0" id="specimenTable">
                  <thead class="text-center">
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Nama</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Jabatan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Pangkat</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Specimen</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>

                    <tr>
                      <th></th>

                      <?php
                      $specimen = $this->db->get('request_specimen')->result();
                      ?>

                      <!-- Filter Kolom Nama -->
                      <th>
                        <select name="filter_nama" id="filter_nama" class="form-control select2">
                          <option value="">Pilih Nama</option>
                          <?php foreach (array_unique(array_map(fn($r) => $r->nama, $specimen)) as $nama): ?>
                            <option value="<?= $nama ?>"><?= $nama ?></option>
                          <?php endforeach; ?>
                        </select>
                      </th>
                      <th>
                        <select name="filter_jabatan" id="filter_jabatan" class="form-control select2">
                          <option value="">Pilih Jabatan</option>
                          <?php foreach (array_unique(array_map(fn($r) => $r->jabatan, $specimen)) as $jabatan): ?>
                            <option value="<?= $jabatan ?>"><?= $jabatan ?></option>
                          <?php endforeach; ?>
                        </select>
                      </th>
                      <th>
                        <select name="filter_pangkat" id="filter_pangkat" class="form-control select2">
                          <option value="">Pilih Pangkat</option>
                          <?php foreach (array_unique(array_map(fn($r) => $r->pangkat, $specimen)) as $pangkat): ?>
                            <option value="<?= $pangkat ?>"><?= $pangkat ?></option>
                          <?php endforeach; ?>
                        </select>
                      </th>

                      <th></th>
                      <th></th>
                    </tr>


                  </thead>
                  <tbody  class="text-center" >

                    <?php $no = 1;
                    foreach ($data_specimen->result_array() as $d): ?>
                      <tr>
                        <td class="text-center align-middle" style="width: 50px; font-size: 14px; padding: 4px;">
                          <?php echo $no++; ?>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0"><?php echo $d['nama'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $d['jabatan'] ?></p>
                        </td>
                        <td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"><?php echo $d['pangkat'] ?></span></td>

                        <td class="align-middle text-center">
                          <a href="<?= base_url('index.php/specimen/Specimen/download_by_id/' . $d['id']) ?>">
                  <i class="fas fa-download"></i>
                          </a>
                        </td>


                        <td class="align-middle text-center">
<a href="#" 
   class="btn-edit text-info font-weight-bold text-xs me-3" 
   data-id="<?= $d['id'] ?>" 
   data-nama="<?= htmlspecialchars($d['nama']) ?>" 
   data-jabatan="<?= htmlspecialchars($d['jabatan']) ?>" 
   data-pangkat="<?= htmlspecialchars($d['pangkat']) ?>" 
   data-bs-toggle="modal" 
   data-bs-target="#editSpecimenModal">
   Edit
</a>

<a href="<?= base_url('index.php/specimen/Specimen/delete_specimen/' . $d['id']) ?>"
   class="text-danger font-weight-bold text-xs"
   onclick="return confirm('Apakah Anda yakin ingin menghapus specimen ini? Data yang dihapus tidak bisa dikembalikan.')">
   Hapus
</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <!-- Modal Edit Specimen -->
                <div class="modal fade" id="editSpecimenModal" tabindex="-1" aria-labelledby="editSpecimenModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form method="post" action="<?= base_url('index.php/specimen/Specimen/do_edit_specimen') ?>">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editSpecimenModalLabel">Edit Data Specimen</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="id" id="editId">

                          <div class="mb-3">
                            <label for="editNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="editNama" required>
                          </div>
                          <div class="mb-3">
                            <label for="editJabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="editJabatan" required>
                          </div>
                          <div class="mb-3">
                            <label for="editPangkat" class="form-label">Pangkat</label>
                            <input type="text" class="form-control" name="pangkat" id="editPangkat" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
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
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>

  <script>
    function filterByColumn() {
      let filterNama = document.getElementById("filter_nama").value.toUpperCase();
      let searchNama = document.getElementById("search_nama").value.toUpperCase();

      let filterJabatan = document.getElementById("filter_jabatan").value.toUpperCase();
      let searchJabatan = document.getElementById("search_jabatan").value.toUpperCase();

      let filterPangkat = document.getElementById("filter_pangkat").value.toUpperCase();
      let searchPangkat = document.getElementById("search_pangkat").value.toUpperCase();

      let table = document.getElementById("specimenTable");
      let tr = table.getElementsByTagName("tr");

      for (let i = 2; i < tr.length; i++) { // index ke-2 karena 0 = header, 1 = filter row
        let tdNama = tr[i].getElementsByTagName("td")[1];
        let tdJabatan = tr[i].getElementsByTagName("td")[2];
        let tdPangkat = tr[i].getElementsByTagName("td")[3];

        if (tdNama && tdJabatan && tdPangkat) {
          let nama = tdNama.textContent.toUpperCase();
          let jabatan = tdJabatan.textContent.toUpperCase();
          let pangkat = tdPangkat.textContent.toUpperCase();

          let cocokNama = nama.includes(filterNama) && nama.includes(searchNama);
          let cocokJabatan = jabatan.includes(filterJabatan) && jabatan.includes(searchJabatan);
          let cocokPangkat = pangkat.includes(filterPangkat) && pangkat.includes(searchPangkat);

          if (cocokNama && cocokJabatan && cocokPangkat) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <script>
    // $(document).ready(function() {
    //   $('#specimenTable').DataTable({
    //     "paging": true,
    //     "lengthChange": true,
    //     "searching": false, // karena kamu sudah punya filter manual
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false
    //   });
    // });
  </script>
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
      // Inisialisasi Select2
      $('.select2').select2({
        placeholder: "Pilih...",
        allowClear: true,
        width: '100%'
      });

      if ($.fn.DataTable.isDataTable('#specimenTable')) {
        $('#specimenTable').DataTable().clear().destroy();
      }

      let table = $('#specimenTable').DataTable({
        ordering: true,
        paging: true,
        searching: true,
        autoWidth: false,
        orderCellsTop: true // ini penting untuk mendukung filter di baris ke-2

      });


      // Filter berdasarkan dropdown
      $('#filter_nama').on('change', function() {
        table.column(1).search(this.value).draw();
      });

      $('#filter_jabatan').on('change', function() {
        table.column(2).search(this.value).draw();
      });

      $('#filter_pangkat').on('change', function() {
        table.column(3).search(this.value).draw();
      });
    });
  </script>


  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const editButtons = document.querySelectorAll(".btn-edit");
      editButtons.forEach(button => {
        button.addEventListener("click", function() {
          document.getElementById("editId").value = this.dataset.id;
          document.getElementById("editNama").value = this.dataset.nama;
          document.getElementById("editJabatan").value = this.dataset.jabatan;
          document.getElementById("editPangkat").value = this.dataset.pangkat;
        });
      });
    });
  </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>