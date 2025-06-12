<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png') ?>">
  <title>
    Arsip
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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" width="26px" height="26px" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Creative Tim</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="../pages/dashboard.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/tables.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tables</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/billing.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/virtual-reality.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/rtl.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../pages/profile.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-in.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-up.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
      </ul>
    </div>
    
  </aside>
  <div class="main-content position-relative max-height-vh-100 h-100">
   
    <div class="container-fluid py-4">
    <div class="row justify-content-center"> <!-- Centering the row -->
        <div class="col-md-12  mx-auto">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0"><b>Tambah Penomoran</b></p>
              </div>
            </div>
            <div class="card-body">

            <div class="row">

            <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Tanggal Nomor</label>
                    <input class="form-control" type="date" name="tanggal" id="tanggal">
                  </div>
                </div>

               

                 <?php 
               $bid = $this->db->get('bidang')->result();
               ?>

<div class="col-md-6">
    <div class="form-group">
      <label for="pengolah_id" class="form-control-label">Unit Pengolah</label>
      <select name="pengolah_id" id="pengolah_id" class="form-control select2" style="width: 100%;">
        <option></option> <!-- Kosongkan dulu untuk placeholder -->
        <?php foreach ($bid as $b): ?>
          <option value="<?= $b->id ?>"><?= $b->kode_bidang ?> - <?= $b->nama_bidang ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

        </div>


              <div class="row">

              <?php 
               $nama_jenis = $this->db->get('jenis_surat')->result();
               ?>
                <div class="col-md-6">
    <div class="form-group">
      <label for="jenis_surat" class="form-control-label">Jenis Surat</label>
      <select name="jenis_surat_id" id="jenis_surat_id" class="form-control select2" style="width: 100%;">
        <option></option> <!-- Kosongkan dulu untuk placeholder -->
        <?php foreach ($nama_jenis as $g): ?>
          <option value="<?= $g->id ?>"><?= $g->nama_jenis ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

              <?php 
               $kode = $this->db->get('kode_klasifikasi')->result();
               ?>

<div class="col-md-6">
    <div class="form-group">
      <label for="kode_klasifikasi_id" class="form-control-label">Kode Klasifikasi</label>
      <select name="kode_klasifikasi_id" id="kode_klasifikasi_id" class="form-control select2" style="width: 100%;">
        <option></option> <!-- Kosongkan dulu untuk placeholder -->
        <?php foreach ($kode as $k): ?>
          <option value="<?= $k->id ?>"><?= $k->kode_surat ?> - <?= $k->ket ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>


              <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nomor Surat</label>
                    <input class="form-control" type="text" name="nomor_surat" id="nomor_surat">
                  </div>
                </div>

                <br>

<div class="row">

<div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Perihal</label>
                    <input class="form-control" name="perihal" type="text">
                  </div>
                </div>
             <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Kepada</label>
                    <textarea class="form-control" name="kepada" type="text"></textarea>
                  </div>
                </div>
                  
        </div>

        <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Isi Ringkas</label>
                    <textarea class="form-control" name="isi_ringkas" type="text"></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Catatan</label>
                    <textarea class="form-control" name="isi_ringkas" type="text"></textarea>
                  </div>
                </div>
        </div>

        <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Lampiran</label>
                    <textarea class="form-control" name="lampiran" type="text"></textarea>
                  </div>
                </div>

  
    <button type="button" class="btn btn-primary w-100 mt-4">Submit</button>





  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
  $('#jenis_surat_id, #kode_klasifikasi_id, #unit_pengolah_id, #tanggal').on('change', function () {
  // Kirim AJAX ke endpoint
  $.post('<?= base_url("index.php/penomoran/Penomoran/generate_nomor") ?>', {
    jenis_surat_id: $('#jenis_surat_id').val(),
    kode_klasifikasi_id: $('#kode_klasifikasi_id').val(),
    pengolah_id: $('#pengolah_id').val(),
    tanggal: $('#tanggal').val()
  }, function (data) {
    $('#nomor_surat').val(data.nomor_surat);
    $('#info_terakhir').html("Terakhir: " + data.nomor_terakhir + " oleh " + data.pembuat);
    $('#sisa_slot').html("Sisa slot: " + data.sisa_slot);
  }, 'json');
});

  </script>





<!-- 
  <script>
document.getElementById('btnTambah').addEventListener('click', function () {
  const jumlah = parseInt(document.getElementById('jumlahSurat').value);
  const tbody = document.querySelector('#tabelDetail tbody');
  tbody.innerHTML = ''; // Kosongkan dulu

  for (let i = 0; i < jumlah; i++) {
    const row = `
      <tr>
        <td>${i + 1}</td>
        <td><input type="text" name="lampiran[]" value="${i + 1}" class="form-control"></td>
        <td><input type="text" name="catatan[]" class="form-control"></td>
        <td><input type="text" name="kepada[]" class="form-control"></td>
      </tr>
    `;
    tbody.insertAdjacentHTML('beforeend', row);
  }
});
</script> -->

<!-- 
  <script>
  // 🔁 Variabel global
  let nomorSuratPreview = [];

  function previewNomor() {
      $.ajax({
          url: '<?= base_url("index.php/penomoran/Penomoran/preview_nomor_surat") ?>',
          method: 'POST',
          data: {
              jenis_surat_id: $('#jenis_surat_id').val(),
              tanggal: $('#tanggal').val(),
              kode_klasifikasi_id: $('#kode_klasifikasi_id').val(),
              pengolah_id: $('#pengolah_id').val(),
              jumlah: $('#jumlah').val()
          },
          success: function(res) {
              nomorSuratPreview = JSON.parse(res); // ✅ Simpan hasil preview
              renderTableRows(); // ✅ Tampilkan di tabel
          }
      });
  }

  function renderTableRows() {
      const tbody = document.querySelector('#tabelDetail tbody');
      tbody.innerHTML = '';

      nomorSuratPreview.forEach((nomor, index) => {
          const row = `
            <tr>
              <td>${index + 1}</td>
              <td><input type="text" name="nomor_surat[]" class="form-control" value="${nomor}" readonly></td>
              <td><input type="text" name="lampiran[]" class="form-control"></td>
              <td><input type="text" name="catatan[]" class="form-control"></td>
              <td><input type="text" name="kepada[]" class="form-control"></td>
            </tr>
          `;
          tbody.insertAdjacentHTML('beforeend', row);
      });
  }
</script>

 -->





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

<script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
<script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>

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
</body>

</html>