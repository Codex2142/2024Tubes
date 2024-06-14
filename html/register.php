<?php
  session_start();

  if (isset($_SESSION["login"])) {
    header("Location: home.php");
    exit();
  }

  $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
  $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
  $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
  $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Sport Center</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    .text-center {
      text-align: center;
    }
    .mb-4 {
      margin-bottom: 1.5rem;
    }
    .form-group {
      margin-bottom: 1rem;
    }
    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
    }
    .form-control {
      width: 100%;
      padding: 0.5rem;
      margin-bottom: 0.5rem;
      border: 1px solid #ced4da;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .form-check {
      display: flex;
      align-items: center;
    }
    .form-check-input {
      margin-right: 0.5rem;
    }
    .form-check-label {
      margin-bottom: 0;
    }
    .btn {
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 1rem;
    }
    .btn-primary {
      background-color: #007bff;
      color: #fff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .btn-danger {
      background-color: #dc3545;
      color: #fff;
    }
    .btn-danger:hover {
      background-color: #c82333;
    }
    footer {
      margin-top: 2rem;
    }
    .footer-links a {
      margin: 0 0.5rem;
      color: #007bff;
      text-decoration: none;
    }
    .footer-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="text-center mb-4">
      <img src="../img/logoAdmin.png" alt="Sport Center Logo" class="logo" style="width: 150px;">
    </div>
    <h3 class="text-center">Register Akun</h3>
    <p class="text-center">Silahkan Melakukan Registrasi</p>
    <form method="POST" action="../proses/upload.php">
      <div class="form-group">
        <label for="name">Nama :</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Pemesan" value="<?php echo $name; ?>" required>
        <span class="text-danger"></span>
      </div>
      <div class="form-group">
        <label for="phone">Nomor Aktif (Whatsapp) :</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukan Nomor Aktif" value="<?php echo $phone; ?>" required>
        <span class="text-danger"></span>
      </div>
      <div class="form-group">
        <label for="email">E-mail Aktif :</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email Aktif" value="<?php echo $email; ?>" required>
        <span class="text-danger"></span>
      </div>
      <div class="form-group">
        <label for="address">Alamat :</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Masukan Alamat Lengkap" value="<?php echo $address; ?>" required>
        <span class="text-danger"></span>
      </div>
      <div class="form-group">
        <label for="password">Password :</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
        <span class="text-danger"></span>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm Password :</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="agree" name="agree" required>
        <label class="form-check-label" for="agree">Saya Setuju</label>
      </div>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-success" onclick="window.location.href='index.php'">Login</button>
        <button type="submit" class="btn btn-primary">Registrasi</button>
        <button type="reset" class="btn btn-danger" onclick="window.location.href='home.php'">Batalkan</button>
      </div>
    </form>
    <footer class="text-center mt-4">
      <small>2024 SPORT CENTER. All rights reserved.</small>
      <div class="footer-links">
        <a href="#">Informasi</a> |
        <a href="#">Ketentuan</a> |
        <a href="#">Prosedur</a> |
        <a href="#">Jadwal</a>
      </div>
    </footer>
  </div>
</body>

</html>
