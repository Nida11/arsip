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
                    <h6 class="font-weight-bolder text-white mb-0">Tambah Daftar Specimen</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    </svg>
                </div>
            </div>
        </nav>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Form Tambah Daftar Specimen</p>
                            </div>
                            <?php if ($this->session->flashdata('msg')): ?>
        <p style="color: green;"><?= $this->session->flashdata('msg'); ?></p>
    <?php endif; ?>

    <form id="uploadForm" enctype="multipart/form-data">

    <div class="form-group">
    <label><strong>Metode Input:</strong></label><br>
    <div>
        <input type="radio" id="import_excel" name="input_method" value="excel" checked>
        <label for="import_excel">Impor dari Excel</label>
    </div>
    <div>
        <input type="radio" id="input_manual" name="input_method" value="manual">
        <label for="input_manual">Input Manual</label>
    </div>
</div>

<div id="form_excel">
    <label><strong>Pilih File Excel</strong> (.xlsx / .xls):</label>
    <input type="file" name="file" id="file_excel" class="form-control" required accept=".xlsx,.xls">
    <button  class="btn btn-success mt-3" type="submit">Upload & Proses</button>
    <div id="preview-container"></div>


</div>

<div id="form_manual" style="display:none;">
<div class="container">
    <div id="form_manual_group">
        <!-- Grup Inputan Pertama -->
        <div class="form-group row form-entry">
            <div class="col-md-6">
                <label>Nama Lengkap:</label>
                <input type="text" name="nama[]" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Jabatan:</label>
                <input type="text" name="jabatan[]" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Pangkat:</label>
                <input type="text" name="pangkat[]" class="form-control">
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <label>Instansi:</label>
                <div class="d-flex w-100">
                    <input type="text" name="instansi[]" class="form-control" value="Badan Pendapatan Daerah Provinsi Jawa Barat">
                    <button type="button" class="btn btn-danger btn-sm ms-2 remove-entry" style="display: none;">X</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Tambah -->
    <button type="button" class="btn btn-primary mt-2" id="add-entry">+ Tambah</button>
</div>


<div class="d-flex justify-content-end mt-3">
    <button type="submit" class="btn btn-success">Simpan</button>
</div>
       
</form>

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

                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script>
$(document).ready(function () {
    $('#add-entry').on('click', function () {
        let newEntry = `
        <div class="form-group row form-entry">
            <div class="col-md-6">
                <label>Nama Lengkap:</label>
                <input type="text" name="nama[]" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Jabatan:</label>
                <input type="text" name="jabatan[]" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Pangkat:</label>
                <input type="text" name="pangkat[]" class="form-control">
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <label>Instansi:</label>
                <div class="d-flex w-100">
                    <input type="text" name="instansi[]" class="form-control" value="Badan Pendapatan Daerah Provinsi Jawa Barat">
                    <button type="button" class="btn btn-danger btn-sm ms-2 remove-entry">X</button>
                </div>
            </div>
        </div>`;
        $('#form_manual_group').append(newEntry);
    });

    // Hapus grup inputan jika tombol X diklik
    $('#form_manual_group').on('click', '.remove-entry', function () {
        $(this).closest('.form-entry').remove();
    });
});
</script>


<script>
$(document).ready(function () {
    $('input[name="input_method"]').change(function () {
        if ($(this).val() == 'excel') {
            $('#form_excel').show();
            $('#form_manual').hide();
            $('#file_excel').attr('required', true);
        } else {
            $('#form_excel').hide();
            $('#form_manual').show();
            $('#file_excel').removeAttr('required');
        }
    });

    $('#uploadForm').on('submit', function (e) {
        e.preventDefault();

        var inputMethod = $('input[name="input_method"]:checked').val();

        if (inputMethod === 'excel') {
            var formData = new FormData(this);

            $.ajax({
                url: '<?= site_url("index.php/specimen/Specimen/process_excel") ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#preview-container').html('<p>Sedang memproses file...</p>');
                },
                success: function (response) {
                    $('#preview-container').html(response);
                },
                error: function (xhr) {
                    $('#preview-container').html('<div class="alert alert-danger">Gagal memproses file: ' + xhr.responseText + '</div>');
                }
            });

        } else {
            this.action = '<?= site_url("index.php/specimen/Specimen/proses_input_manual") ?>';
            this.method = 'POST';
            $(this).off('submit');
            this.submit();
        }
    });
});

</script>




            <script>
                $(document).ready(function() {
                    $.ajax({
                        url: "<?= base_url('specimen/get_nama') ?>", // ganti dengan URL controller yang benar
                        method: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#nama').append(`<option value="">-- Pilih Nama --</option>`);
                            $.each(data, function(index, item) {
                                $('#nama').append(`<option value="${item.id}">${item.nama}</option>`);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log("Gagal ambil data:", error);
                        }
                    });
                });
            </script>



</body>

</html>