<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Argon Dashboard 3 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url('assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.1.0') ?>" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>
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
                    <a class="nav-link active" href="../pages/tables.html">
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


                            <!-- <div class="card p-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" id="nama">
                                                    <option>-- Pilih Nama --</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" id="jabatan">
                                                    <option>-- Pilih Jabatan --</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" id="pangkat">
                                                    <option>-- Pilih Pangkat --</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end justify-content-center">
                                            <div class="d-flex gap-1">
                                                <button type="button" class="btn btn-success btn-sm" style="width: 32px; height: 38px; padding: 0;">+</button>
                                                <button type="button" class="btn btn-danger btn-sm" style="width: 32px; height: 38px; padding: 0;">x</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mt-3">
                                        <a href="https://www.example.com">
                                            <button type="button" class="btn btn-primary btn-sm px-4">Simpan</button>
                                        </a>
                                    </div>
                                </div>
                            </div> -->
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
$(document).ready(function(){
    $('input[name="input_method"]').change(function(){
        if ($(this).val() == 'excel') {
            $('#form_excel').show();
            $('#form_manual').hide();
        } else {
            $('#form_excel').hide();
            $('#form_manual').show();
        }
    });
});
</script>


            <script>
                $('#uploadForm').on('submit', function(e) {
                    e.preventDefault();

                    var formData = new FormData(this);

                    $.ajax({
                    url: '<?= site_url("index.php/specimen/Specimen/process_excel") ?>',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#preview-container').html('<p>Sedang memproses file...</p>');
                    },
                    success: function(response) {
                        $('#preview-container').html(response);
                    },
                    error: function(xhr) {
                        $('#preview-container').html('<div class="alert alert-danger">Gagal memproses file: ' + xhr.responseText + '</div>');
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