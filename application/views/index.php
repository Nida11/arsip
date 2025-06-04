<!DOCTYPE html>
<html lang="en">

<head>
   

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SIMAK</title>

    <!-- Preconnect and Fonts from Google (jangan pakai base_url di sini) -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Stylesheets dari folder lokal -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/iconly/bold.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.svg'); ?>" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="Logo"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item active">
                            <a href="<?= base_url('index.php/Guest/login'); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Login</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Welcome To SIMAK</h3>
                <h5>Sistem Informasi Absensi dan Kompensasi</h5>
            </div>

            <div class="page-content">
                <img src="<?= base_url('assets/img/1_vhoE-Yw2HgrlScZmR_L1zA.gif'); ?>" width="1000">
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/apexcharts/apexcharts.js'); ?>"></script>
    <script src="<?= base_url('assets/js/pages/dashboard.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
</body>

</html>
