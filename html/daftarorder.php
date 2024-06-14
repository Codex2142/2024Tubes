<?php 
session_start();
include("../proses/koneksi.php");

if (!isset($_SESSION["email"])) {
    header("Location: index.php");
    exit();
}

$emailmu = $_SESSION["email"];

$queries = [
    "SELECT * FROM bulutangkis WHERE email = ?",
    "SELECT * FROM billiard WHERE email = ?",
    "SELECT * FROM futsal WHERE email = ?"
];

$results = [];
foreach ($queries as $query) {
    $stmt = mysqli_prepare($connection, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $emailmu);
        mysqli_stmt_execute($stmt);
        $results[] = mysqli_stmt_get_result($stmt);
    } else {
        die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Center Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        header {
            background-color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .logo img {
            height: 50px;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }
        nav ul li {
            display: inline;
        }
        nav ul li a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
        .btn-dark:hover {
            color: black;
            background-color: white;
        }
        .reservasi-btn {
            background-color: #cddc39;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        main {
            padding: 20px;
        }
        .order-list {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
        }
        .order-list h1,
        .order-list h2 {
            margin: 0;
            text-align: center;
        }
        .order-list h2 {
            color: red;
            margin-bottom: 10px;
        }
        .order-list p {
            text-align: center;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table th {
            background-color: #f4f4f4;
        }
        .proses {
            color: green;
        }
        .verifikasi {
            color: blue;
        }
        .dibatalkan {
            color: orange;
        }
        .btn-download {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #2196F3;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-download:hover {
            background-color: #1e88e5;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 600px;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="../img/logoAdmin.png" alt="Sport Center Logo">
        </div>
        <nav>
            <ul>
                <li><a class="nav-link scrollto" href="home.php">Home</a></li>
                <li><a class="nav-link scrollto" href="../proses/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="order-list">
            <h1>DAFTAR ORDER</h1>
            <h2>RESERVASI</h2>
            <p>* HARAP DATANG 15 MENIT SEBELUM ANDA BERMAIN UNTUK MELAKUKAN VERIFIKASI *</p>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Order</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>PIN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $orderTypes = ["Bulutangkis", "Billiard", "Futsal"];
                    
                    foreach ($results as $index => $result) {
                        while($row = mysqli_fetch_assoc($result)){
                            $name = htmlspecialchars($row['name']);
                            $phone = htmlspecialchars($row['phone']);
                            $date = date("d-m-Y", strtotime($row['date']));
                            $awal = htmlspecialchars($row['time']);
                            $akhir = htmlspecialchars($row['alarm']);
                            $status = htmlspecialchars($row['status']);
                            $pin = htmlspecialchars($row['pin']);
                            echo "
                                <tr>
                                    <td>{$no}</td>
                                    <td>{$orderTypes[$index]}</td>
                                    <td>$date | $awal - $akhir</td>
                                    <td class='$status'>$status</td>
                                    <td>$pin</td>
                                </tr>
                            ";
                            $no++;
                        }
                    }
                    ?>
                </tbody>
            </table>
            <p class="btn-download" style="color: white !important;">RIWAYAT RESERVASI</p>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Durasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1; 
                    $historyQuery = "SELECT * FROM history WHERE email = ? ORDER BY date";
                    $stmt = mysqli_prepare($connection, $historyQuery);
                    mysqli_stmt_bind_param($stmt, "s", $emailmu);
                    mysqli_stmt_execute($stmt);
                    $historyResult = mysqli_stmt_get_result($stmt);
                    
                    while ($row = mysqli_fetch_assoc($historyResult)) {
                        $jenis = htmlspecialchars($row['jenis']);
                        $name = htmlspecialchars($row['name']);
                        $date = date("d-m-Y", strtotime($row['date']));
                        $durasi = htmlspecialchars($row['duration']);
                        echo "
                            <tr>
                                <td>$no</td>
                                <td>{$jenis}</td>
                                <td>{$name}</td>
                                <td>{$date}</td>
                                <td>{$durasi} Jam</td>
                            </tr>
                        ";
                    $no++;
                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($connection);
                    ?>
                </tbody>
            </table>
            
        </section>
    </main>

    <script>
        function showModal() {
            document.getElementById('myModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        window.onclick = function(event) {
            const modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>

</html>
