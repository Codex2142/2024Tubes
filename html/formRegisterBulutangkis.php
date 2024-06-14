<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Registrasi Sport Center</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="../style/style.css" rel="stylesheet">
  <style>
    .form-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .form-box {
      max-width: 600px;
      width: 100%;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      background: #fff;
    }

    .form-box .section-title {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-box .section-title h2 {
      font-size: 28px;
      margin-bottom: 10px;
    }

    .form-box .section-title p {
      margin-bottom: 0;
    }

    .form-box .form-group label {
      font-weight: bold;
    }

    .form-box .btn-primary {
      width: 100%;
    }

    .form-box .btn-danger {
      width: 100%;
      margin-top: 5px;
    }

    .highlight {
      font-weight: bold;
      color: blue;
    }

    .img-fluid {
      margin-top: 20px;
      margin-bottom: 10px;
      max-width: 50%;
      height: auto;
    }
  </style>
  <script>
    function setFixedMinutes() {
      var timeInput = document.getElementById('time');
      timeInput.addEventListener('input', function() {
        var timeValue = timeInput.value;
        if (timeValue.length === 5) {
          timeInput.value = timeValue.substring(0, 3) + '00';
        }
      });
    }

    window.onload = setFixedMinutes;
  </script>
</head>

<body>

  <div class="container form-container">
    <div class="form-box">
      <div class="logo-container">
        <img src="../img/logoAdmin.png" alt="Sport Center Logo" class="img-fluid">
      </div>
      <div class="section-title">
        <h2>Registrasi</h2>
        <p>Form Registrasi <strong class="highlight">Bulutangkis</strong></p>
        <p>Pengisian Form hanya dapat dilakukan satu kali</p>
      </div>
      <form action="../proses/bulutangkis.php" method="post" role="form" class="php-email-form">
          <div class="form-group">
            <label for="nama">Nama Pemesan :</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Pemesan" required>
          </div>
          <div class="form-group">
            <label for="nomor">Nomor Aktif (Whatsapp) :</label>
            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukan Nomor Aktif" required>
          </div>
          <div class="form-group">
            <label for="tanggal">Tanggal Pemesanan :</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="hh/bb/tttt" required>
          </div>
          <div class="form-group">
            <label for="time">Jam Pemesanan :</label>
            <input type="time" class="form-control" id="time" name="time" placeholder="jj/mm AM/PM" required>
          </div>
          <div class="form-group">
            <label for="durasi">Durasi Digunakan :</label>
            <select class="form-control" id="durasi" name="durasi" required>
              <option value="1">1 jam</option>
              <option value="2">2 jam</option>
              <option value="3">3 jam</option>
              <option value="4">4 jam</option>
            </select>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="setuju" required>
            <label class="form-check-label" for="setuju">Saya Setuju :</label>
          </div>
          <button type="submit" class="btn btn-primary">Registrasi</button>
          <button type="reset" class="btn btn-danger" onclick="window.location.href='home.php'">Batalkan</button>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>