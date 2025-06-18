
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/bapenda.png') ?>">
  <title>Arsip Penomoran Surat Keluar</title>

  <!-- Fonts and Icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- CSS -->
  <link href="<?= base_url('assets/css/argon-dashboard.css?v=2.1.0') ?>" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('assets/css/custom-slot.css') ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<style>
  #slotTable {
    font-size: 13px; /* atau 12px kalau mau lebih kecil */
  }
  #slotTable th,
  #slotTable td {
    padding: 5px 5px !important; /* kecilkan padding */
    vertical-align: middle;
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
          <a class="nav-link" href="<?= base_url('/index.php/specimen/Specimen/data_specimen')?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Specimen</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/index.php/Guest/virtual/Virtual/data_barcode') ?>">
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
    <!-- <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tables</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">History Tables</h6>
        </nav>
      </div>
    </nav> -->
    <!-- End Navbar -->
<div class="container-fluid py-4">
  
  <?php if (isset($_GET['success'])): ?>
    <div id="successAlert" class="alert alert-success">
      Data slot berhasil ditambahkan!
    </div>
    <script>
      setTimeout(function () {
        const alert = document.getElementById('successAlert');
        if (alert) {
          alert.style.display = 'none';
        }
      }, 1000);

      if (window.location.search.includes('success=1')) {
        const url = new URL(window.location.href);
        url.searchParams.delete('success');
        window.history.replaceState({}, document.title, url.pathname);
      }
    </script>
  <?php endif; ?>

  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h6>History's Table of Slot</h6>
          <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addSlotModal">
            Tambah Slot
          </button>
        </div>

        <div class="card-body px-0 pt-0 pb-2">
          <!-- Dropdown Filter Jenis Surat -->
<div class="px-3 mb-3">
  <div class="row g-2 align-items-end">
    
    <!-- Filter Jenis Surat -->
    <div class="col-md-3 col-sm-12">
      <label for="jenisFilter" class="form-label">Filter Jenis Surat:</label>
      <select id="jenisFilter" class="form-select">
        <option value="">Semua Jenis Surat</option>
                                    <?php 
                   $jenisSurat1 = $this->db->get('jenis_surat')->result_array();
                   ?>
        <?php foreach ($jenisSurat1 as $jenis1): ?>
          <option value="<?= htmlspecialchars($jenis1['nama_jenis']); ?>"><?= htmlspecialchars($jenis1['nama_jenis']); ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Tanggal Mulai -->
    <div class="col-md-3 col-sm-6">
      <label for="startDate" class="form-label">Tanggal Mulai:</label>
      <input type="date" id="startDate" class="form-control">
    </div>

    <!-- Tanggal Selesai -->
    <div class="col-md-3 col-sm-6">
      <label for="endDate" class="form-label">Tanggal Selesai:</label>
      <input type="date" id="endDate" class="form-control">
    </div>

  </div> <!-- end .row -->
</div>

<div class="p-3">
<table id="slotTable" class="table table-sm table-bordered table-striped align-items-center mb-0 w-100">

              <thead class="thead-dark">
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Surat</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Booking Slot</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data_slot)): ?>
                  <?php foreach ($data_slot as $row): ?>
                    <tr>
<td data-tanggal="<?= $row['tanggal']; ?>">
  <?= date('d F Y', strtotime($row['tanggal'])); ?>
</td>
                      <td class="text-center"><?= htmlspecialchars($row['nama_jenis']); ?></td>
                      <td class="text-center"><?= htmlspecialchars($row['slot']); ?></td>
                      <td class="text-center"><?= $row['created_at']; ?></td>
                      <!-- Kolom updated_at yang disembunyikan -->
<td class="text-center">
  <?= $row['updated_at'] ? $row['updated_at'] : '<em>Belum diubah</em>'; ?>
</td>




                      <td class="text-center">
                        <button class="btn btn-sm btn-primary"
                          title="Edit Slot"
                          data-bs-toggle="modal"
                          data-bs-target="#editSlotModal"
                          data-id="<?= $row['id']; ?>"
                          data-jenis="<?= $row['jenis_surat_id']; ?>"
                          data-slot="<?= $row['slot']; ?>"
                          data-tanggal="<?= $row['tanggal']; ?>"
                          data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data Slot">
                        
                          
                          <i class="fas fa-edit"></i>
                        </button>

                          <button class="btn btn-sm btn-danger delete-slot"
                            title="Hapus Slot"
                            data-id="<?= $row['id']; ?>"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data Slot">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="4" class="text-center">Belum ada histori slot.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Slot -->
<div class="modal fade" id="addSlotModal" tabindex="-1" aria-labelledby="addSlotModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= base_url("index.php/penomoran/Penomoran/do_input_slot") ?>">
        <div class="modal-header">
          <h5 class="modal-title" id="addSlotModalLabel">Tambah Slot</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Jenis Surat -->
          <div class="mb-3">
            <label class="form-label">Pilih Jenis Surat</label>
            <div id="jenisSuratContainer"></div>
          </div>

          <!-- Input jumlah slot per jenis -->
          <div id="slotInputsContainer"></div>

          <!-- Tanggal -->
          <div class="mb-3 mt-3">
            <label for="tanggalSlot" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggalSlot" name="tanggal" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="submitSlotBtn">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

                    <!-- END Modal -->
                    <div class="modal fade" id="editSlotModal" tabindex="-1" aria-labelledby="editSlotModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="POST" action="<?= base_url("index.php/penomoran/Penomoran/do_edit_slot") ?>">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editSlotModalLabel">Edit Slot</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                          </div>

                          <div class="modal-body">
                            <!-- Hidden ID -->
                            <input type="hidden" name="id_slot" id="editIdSlot">

                            <?php 
               $jenisSurat = $this->db->get('jenis_surat')->result_array();
               ?>

                            <!-- Jenis Surat -->
                            <div class="mb-3">
                              <label for="editJenisSurat" class="form-label">Jenis Surat</label>
                              <select class="form-select" name="jenis_surat_id" id="editJenisSurat" required>
                                <?php foreach ($jenisSurat as $jenis): ?>
                                  <option value="<?= $jenis['id'] ?>"><?= $jenis['nama_jenis'] ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>

                            <!-- Slot -->
                            <div class="mb-3">
                              <label for="editSlotJumlah" class="form-label">Jumlah Slot</label>
                              <input type="number" class="form-control" name="slot" id="editSlotJumlah" min="1" required>
                            </div>

                            <!-- Tanggal -->
                            <div class="mb-3">
                              <label for="editTanggalSlot" class="form-label">Tanggal</label>
                              <input type="date" class="form-control" name="tanggal" id="editTanggalSlot" required>
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
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>

  <?php if ($this->session->flashdata('success_slot')): ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Berhasil',
  text: '<?= $this->session->flashdata("success_slot") ?>',
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
  $(document).on('click', '.delete-slot', function () {
    const slotId = $(this).data('id');

    Swal.fire({
      title: 'Yakin ingin menghapus slot ini?',
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
          url: '<?= base_url("index.php/penomoran/Penomoran/delete_slot") ?>',
          method: 'POST',
          data: { id_slot: slotId },
          success: function (response) {
            // Tampilkan notifikasi sukses
            Swal.fire({
              title: 'Berhasil!',
              text: 'Slot berhasil dihapus.',
              icon: 'success',
              timer: 2000,
              showConfirmButton: false
            }).then(() => {
              location.reload(); // refresh halaman
            });
          },
          error: function () {
            Swal.fire('Gagal', 'Terjadi kesalahan saat menghapus slot.', 'error');
          }
        });
      }
    });
  });
</script>




  <script>
let jenisSuratLoaded = false;

$(document).ready(function () {
  const $modal = $('#addSlotModal');

  $modal.on('show.bs.modal', function () {
    console.trace("🔥 Modal show triggered");

    const jenisSuratContainer = document.getElementById('jenisSuratContainer');
    const slotInputsContainer = document.getElementById('slotInputsContainer');

    // Kosongkan container
    jenisSuratContainer.innerHTML = '';
    slotInputsContainer.innerHTML = '';

    if (jenisSuratLoaded) {
      console.log("⏩ Jenis surat sudah diload, skip fetch");
      return;
    }

    // Langsung set flag agar fetch tidak dobel jika event show dipicu 2x
    jenisSuratLoaded = true;

    console.trace("📡 Fetching jenis_surat...");

    fetch('<?= base_url("index.php/penomoran/Penomoran/get_jenis_surat") ?>')
      .then(response => response.json())
      .then(data => {
        console.log("✅ Data jenis_surat loaded:", data);

        data.forEach(jenis => {
          const { id, nama_jenis: nama } = jenis;

          const checkboxWrapper = document.createElement('div');
          checkboxWrapper.className = 'form-check';

          const input = document.createElement('input');
          input.className = 'form-check-input jenis-checkbox';
          input.type = 'checkbox';
          input.value = id;
          input.dataset.nama = nama;
          input.id = `jenisSurat${id}`;

          const label = document.createElement('label');
          label.className = 'form-check-label';
          label.htmlFor = `jenisSurat${id}`;
          label.innerText = nama;

          checkboxWrapper.appendChild(input);
          checkboxWrapper.appendChild(label);
          jenisSuratContainer.appendChild(checkboxWrapper);

          input.addEventListener('change', function () {
            const inputId = 'slotInput' + id;
            if (this.checked) {
              const div = document.createElement('div');
              div.className = 'mb-3';
              div.id = inputId;
              div.innerHTML = `
                <label class="form-label">Jumlah Slot untuk <strong>${nama}</strong></label>
                <input type="number" name="slot[${id}]" class="form-control" min="1" required>
                <input type="hidden" name="jenis_surat_id[]" value="${id}">
              `;
              slotInputsContainer.appendChild(div);
            } else {
              const inputDiv = document.getElementById(inputId);
              if (inputDiv) inputDiv.remove();
            }
          });
        });
      })
      .catch(error => {
        console.error("❌ AJAX Error:", error);
        jenisSuratContainer.innerHTML = "<div class='text-danger'>Gagal memuat data jenis surat</div>";
        jenisSuratLoaded = false; // reset flag supaya bisa coba lagi
      });
  });

  // Reset saat modal ditutup
  $modal.on('hidden.bs.modal', function () {
    console.log("🔁 Reset state modal");
    jenisSuratLoaded = false;
    document.getElementById('jenisSuratContainer').innerHTML = '';
    document.getElementById('slotInputsContainer').innerHTML = '';
  });
});
</script>

<script>
  $('#editSlotModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);

    // Ambil data dari button
    var id = button.data('id');
    var jenis = button.data('jenis'); // contoh: 2
    var slot = button.data('slot');
    var tanggal = button.data('tanggal'); // format: yyyy-mm-dd

    // Referensi ke modal
    var modal = $(this);
    modal.find('#editIdSlot').val(id);

    // Atur value select (pastikan valuenya sesuai dengan <option>)
    modal.find('#editJenisSurat').val(jenis).trigger('change');

    // Isi input slot & tanggal
    modal.find('#editSlotJumlah').val(slot);
    modal.find('#editTanggalSlot').val(tanggal);
  });
</script>






  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.1.0') ?>"></script>



<!-- Script Modal (jQuery) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const editModal = document.getElementById('editSlotModal');
  editModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const slot = button.getAttribute('data-slot');
    const tanggal = button.getAttribute('data-tanggal');
    const jenisId = button.getAttribute('data-jenis');

    document.getElementById('editId').value = id;
    document.getElementById('prevJumlahSlot').value = slot;
    document.getElementById('editJumlahSlot').value = slot;
    document.getElementById('editTanggalSlot').value = tanggal;
    document.getElementById('editJenisSurat').value = jenisId;
    
  });
});

</script>


<script>
$(document).ready(function () {
  $('.table').DataTable({
    pageLength: 10,
    ordering: true,
    
    lengthChange: false,
    language: {
      search: "Cari:",
      emptyTable: "Tidak ada data tersedia",
      paginate: {
        previous: "Sebelumnya",
        next: "Berikutnya"
      }
    }
  });
});
</script>
<!-- DataTables JS dan jQuery (pastikan ini hanya satu kali dipanggil di layout) -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --Klau di hapus editnya jalan , tapi fiturnya ngga -->
<!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script>
  $(document).ready(function () {
    
      // Hancurkan DataTable jika sudah ada
  if ($.fn.DataTable.isDataTable('#slotTable')) {
    $('#slotTable').DataTable().destroy();
  }

    // Fungsi konversi nama bulan ke angka
    function convertBulan(bulan) {
      const map = {
        Januari: '01', Februari: '02', Maret: '03', April: '04',
        Mei: '05', Juni: '06', Juli: '07', Agustus: '08',
        September: '09', Oktober: '10', November: '11', Desember: '12'
      };
      return map[bulan] || '01';
    }

$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
  const startDate = $('#startDate').val();
  const endDate = $('#endDate').val();

  const tanggalElement = settings.aoData[dataIndex].anCells[0];
  const dataTanggal = tanggalElement.getAttribute('data-tanggal');

  if (!dataTanggal) return false;

  const tglParsed = new Date(dataTanggal);
  const start = startDate ? new Date(startDate) : null;
  const end = endDate ? new Date(endDate) : null;

  return (!start || tglParsed >= start) && (!end || tglParsed <= end);
});


     // Inisialisasi DataTable
    var table = $('#slotTable').DataTable({
      responsive: true,
      autoWidth: true,
      pageLength: 10,
      order: [[5, 'desc']], // updated_at index ke-5
      language: {
        search: "Search:",
        lengthMenu: "Tampilkan _MENU_ entri",
        info: "Menampilkan _START_ sampai _END_ dari total _TOTAL_ data",
        zeroRecords: "⚠️ Tidak ada data ditemukan",
        paginate: {
           previous: "⭠ Prev",
           next: "Next ⭢"
        }
      }

    });

    $('#jenisFilter').on('change', function () {
      var selected = $(this).val();
      if (selected) {
        table.column(1).search('^' + selected + '$', true, false).draw();
      } else {
        table.column(1).search('').draw();
      }
    });

    // Filter tanggal mulai dan selesai
    $('#startDate, #endDate').on('change', function () {
      table.draw();
    });

  });
</script>


 <script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
</script>

</body>

</html>