<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/bapenda.png') ?>">
  <title>Login - Sistem Penomoran Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: rgba(63, 157, 244, 0.33);
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .floating-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      overflow: hidden;
      z-index: -1;
    }

    .floating-bg img {
      position: absolute;
      width: 150px;
      opacity: 0.85;
      filter: drop-shadow(0 0 7px rgba(4, 131, 17, 0.81)) brightness(1.3) contrast(1.5);
    }

    @keyframes floatRotateRight {
      0% {
        transform: translateY(0) rotate(0deg);
      }

      50% {
        transform: translateY(-20px) rotate(180deg);
      }

      100% {
        transform: translateY(0) rotate(360deg);
      }
    }

    @keyframes floatRotateLeft {
      0% {
        transform: translateY(0) rotate(0deg);
      }

      50% {
        transform: translateY(-20px) rotate(-180deg);
      }

      100% {
        transform: translateY(0) rotate(-360deg);
      }
    }

    .rotate-right {
      animation: floatRotateRight 25s linear infinite;
    }

    .rotate-left {
      animation: floatRotateLeft 25s linear infinite;
    }

    .login-container {
      display: flex;
      width: 650px;
      max-width: 100%;
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(10px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      border-radius: 16px;
      overflow: hidden;
    }

    .login-left {
      background: transparent;
      color: white;
      padding: 40px;
      width: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-left img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .login-right {
      background: transparent;
      width: 50%;
      padding: 30px;
    }

    .login-right h3 {
      font-weight: 600;
      margin-bottom: 30px;
      color: black;
    }

    .form-group {
      position: relative;
      margin-bottom: 25px;
    }

    .input-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #999;
    }

    .form-control {
      border-radius: 8px;
      padding: 12px 40px 12px 40px;
    }

    .btn-login {
      background-color: rgb(16, 11, 145);
      color: white;
      padding: 12px;
      font-weight: 600;
      border-radius: 8px;
      width: 100%;
      transition: 0.3s;
    }

    .btn-login:hover {
      background-color: rgb(72, 122, 222);
    }

    .small-links {
      font-size: 14px;
      margin-top: 10px;
      text-align: center;
    }

    .small-links a {
      color: #7c4dff;
      text-decoration: none;
    }

    .small-links a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .login-container {
        flex-direction: column;
      }

      .login-left,
      .login-right {
        width: 100%;
      }

      .login-left {
        padding: 20px;
      }
    }
  </style>
</head>

<body>
  <div class="floating-bg">
    <?php
    $positions = [
      ['5%', '5%'],
      ['-5%', '30%'],
      ['10%', '80%'],
      ['20%', '50%'],
      ['45%', '-1%'],
      ['35%', '65%'],
      ['45%', '30%'],
      ['50%', '80%'],
      ['60%', '25%'],
      ['70%', '60%'],
      ['80%', '15%'],
      ['90%', '45%']
    ];
    foreach ($positions as $pos):
      $rotateClass = rand(0, 1) ? 'rotate-left' : 'rotate-right';
    ?>
      <img src="<?= base_url('assets/img/bapenda1.png') ?>" alt="floating-logo"
        class="<?= $rotateClass ?>" style="top: <?= $pos[0] ?>; left: <?= $pos[1] ?>;">
    <?php endforeach; ?>
  </div>

  <div class="login-container">
    <div class="login-left">
      <img src="<?= base_url('assets/img/ilustrasi.png') ?>" alt="Ilustrasi Login">
    </div>

    <div class="login-right">
      <h3 class="text-center">Login Akun</h3>
      <form method="POST" action="<?= base_url('index.php/Login/index'); ?>">
        <div class="form-group">
          <i class="fas fa-user input-icon"></i>
          <input type="text" name="username" class="form-control" placeholder="Nama Pengguna" required>
        </div>
        <div class="form-group">
          <i class="fas fa-lock input-icon"></i>
          <input type="password" id="password" name="password" class="form-control" placeholder="Kata Sandi" required>
          <i class="fas fa-eye toggle-password" id="togglePassword"></i>
        </div>
        <button type="submit" class="btn btn-login">Masuk</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function() {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>

</html>