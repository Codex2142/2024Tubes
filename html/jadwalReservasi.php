<?php
  include("../proses/koneksi.php");

  $query1 = "SELECT * FROM billiard";
  $query2 = "SELECT * FROM bulutangkis";
  $query3 = "SELECT * FROM futsal";

  $result1 = mysqli_query($connection, $query1);
  $result2 = mysqli_query($connection, $query2);
  $result3 = mysqli_query($connection, $query3);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Sport Center</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="../vendor/aos/aos.css" rel="stylesheet">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../style/home.css" rel="stylesheet">

  <style>
    .section-spacing {
      margin-top: 2rem;
    }
    .center-align {
      text-align: center;
    }
    .table-container {
      margin-bottom: 20rem;
    }
  </style>
</head>

<body>

  <section id="heroTo" class="d-flex align-items-center">
    <div class="container text-center">
      <h1 id="jadwalH1">Reservasi Table </h1>
    </div>
  </section>

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container mt-5" data-aos="fade-up">

      <div class="section-title">
        <h2>Daftar List Reservasi</h2>
        <p>Daftar Reservasi Billiard Ditampilkan Secara Live Server</p>
      </div>
      <div class="table-container">
        <table class="table table-hover center-align">
          <thead>
            <tr>
              <th scope="col" width="5%">No</th>
              <th scope="col" width="20%">Nama</th>
              <th scope="col" width="25%">Jenis Order</th>
              <th scope="col" width="15%">Durasi</th>
              <th scope="col" width="15%">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              while ($row1 = mysqli_fetch_assoc($result1)) {
                $date = date("d-m-Y", strtotime($row1['date']));
                $awal = $row1['time'];
                $akhir = $row1['alarm'];
                $status = $row1['status'];
                $durasi = $row1['duration'];
                echo "<tr>
                <th scope='row'>$no</th>
                <td>{$row1['name']}</td>
                <td>$date | $awal - $akhir</td>
                <td>$durasi jam</td>
                <td>$status</td>
                </tr>";
                $no++;
              }
            ?>
          </tbody>
        </table>
      </div>

      <div class="section-title section-spacing">
        <p>Daftar Reservasi Bulutangkis Ditampilkan Secara Live Server</p>
      </div>
      <div class="table-container">
        <table class="table table-hover center-align">
          <thead>
            <tr>
              <th scope="col" width="5%">No</th>
              <th scope="col" width="20%">Nama</th>
              <th scope="col" width="25%">Jenis Order</th>
              <th scope="col" width="15%">Durasi</th>
              <th scope="col" width="15%">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              while ($row2 = mysqli_fetch_assoc($result2)) {
                $date = date("d-m-Y", strtotime($row2['date']));
                $awal = $row2['time'];
                $akhir = $row2['alarm'];
                $status = $row2['status'];
                $durasi = $row2['duration'];
                echo "<tr>
                <th scope='row'>$no</th>
                <td>{$row2['name']}</td>
                <td>$date | $awal - $akhir</td>
                <td>$durasi jam</td>
                <td>$status</td>
                </tr>";
                $no++;
              }
            ?>
          </tbody>
        </table>
      </div>

      <div class="section-title section-spacing">
        <p>Daftar Reservasi Futsal Ditampilkan Secara Live Server</p>
      </div>
      <div class="table-container">
        <table class="table table-hover center-align">
          <thead>
            <tr>
              <th scope="col" width="5%">No</th>
              <th scope="col" width="20%">Nama</th>
              <th scope="col" width="25%">Jenis Order</th>
              <th scope="col" width="15%">Durasi</th>
              <th scope="col" width="15%">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              while ($row3 = mysqli_fetch_assoc($result3)) {
                $date = date("d-m-Y", strtotime($row3['date']));
                $awal = $row3['time'];
                $akhir = $row3['alarm'];
                $status = $row3['status'];
                $durasi = $row3['duration'];
                echo "<tr>
                <th scope='row'>$no</th>
                <td>{$row3['name']}</td>
                <td>$date | $awal - $akhir</td>
                <td>$durasi jam</td>
                <td>$status</td>
                </tr>";
                $no++;
              }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </section><!-- End Contact Section -->

  <!-- Vendor JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDzwrnQq4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
