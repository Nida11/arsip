<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png') ?>">
  <title>Arsiparis</title>

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= base_url('assets/css/argon-dashboard.css?v=2.1.0') ?>" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">

      </div>
    </div>
  </div>

  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">LOGIN AKUN</h4>
                  <p class="mb-0">Masukan Nama Pengguna dan Kata Sandi</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="<?php echo base_url() . "index.php/Login/index"; ?>" accept-charset="UTF-8">
                    <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" name="username" placeholder="Nama Pengguna" aria-label="Username">
                    </div>
                    <div class="mb-3 position-relative">
                      <input type="password" class="form-control form-control-lg" name="password" id="passwordInput" placeholder="Kata Sandi" aria-label="Password">
                      <i class="bi bi-eye-slash position-absolute top-50 end-0 translate-middle-y me-3" id="togglePassword" style="cursor: pointer;"></i>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                    </div>
                  </form>
                </div>
                <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div> -->
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 justify-content-center align-items-center">
              <div class="position-relative border-radius-lg d-flex flex-column justify-content-start align-items-center p-5"
                style="background-color: rgba(255, 255, 255, 0.9); width: 100%; max-width: 600px; min-height: 500px; box-shadow: 0 0 20px rgba(0,0,0,0.1); text-align: center;">

                <!-- Gambar Logo -->
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Bapenda"
                  style="width: 500px; height: auto; margin-bottom: 20px; z-index: 2;" />

                <!-- Teks -->
                <div style="z-index: 2; max-width: 90%;">
                  <h4 class="text-dark font-weight-bolder">"Sistem Penomoran Digital"</h4>
                  <p class="text-dark" style="word-wrap: break-word;">
                    Sistem penomoran digital adalah sistem yang digunakan untuk memudahkan pengelolaan dan pencatatan nomor secara elektronik. Semua proses menjadi lebih efisien dan terorganisir.
                  </p>
                </div>

              </div>
            </div>




          </div>
        </div>


      </div>
      </div>
      </div>
    </section>
  </main>


  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('passwordInput');

    togglePassword.addEventListener('click', function() {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.classList.toggle('bi-eye');
      this.classList.toggle('bi-eye-slash');
    });
  </script>

  <!-- Core JS Files -->
  <script src="<?= base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      };
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center -->
  <script src="<?= base_url('assets/js/argon-dashboard.min.js?v=2.1.0') ?>"></script>
</body>

</html>