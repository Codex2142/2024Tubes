<?php 
session_start();
include("../proses/koneksi.php");
if (!isset($_SESSION["email"])) {
    header("Location: index.php");
    exit();
}
$emailmu = $_SESSION["email"];

// Function to generate random string
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Get and sanitize user inputs
$name = htmlspecialchars($_POST["nama"]);
$number = htmlspecialchars($_POST["nomor"]);
$tanggal = htmlspecialchars($_POST["tanggal"]);
$time = htmlspecialchars($_POST["time"]);
$durasi = intval(htmlspecialchars($_POST["durasi"])); // Convert duration to integer

// Calculate the alarm time by adding the duration to the time
$time_datetime = new DateTime($time);
$time_datetime->add(new DateInterval('PT' . $durasi . 'H'));
$alarm = $time_datetime->format('H:i:s');

// Generate random PIN
$pin = generateRandomString(10);

try {
    // Start transaction
    mysqli_begin_transaction($connection, MYSQLI_TRANS_START_READ_WRITE);
    
    // Insert data into the billiard table
    $query = "INSERT INTO bulutangkis (email, name, phone, date, time, duration, alarm, status, pin) VALUES (?, ?, ?, ?, ?, ?, ?, 'proses', ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssssssss", $emailmu, $name, $number, $tanggal, $time, $durasi, $alarm, $pin);

    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        throw new Exception("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
    }

    // Insert data into the history table
    $query = "INSERT INTO history (jenis, email, name, phone, date, time, duration, alarm) VALUES ('bulutangkis', ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssssss", $emailmu, $name, $number, $tanggal, $time, $durasi, $alarm);

    $result = mysqli_stmt_execute($stmt);
    if (!$result) {
        throw new Exception("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
    }
    
    // Commit transaction
    mysqli_commit($connection);
    echo "Data has been successfully inserted into the table.";
} catch (Exception $e) {
    // Rollback transaction on error
    mysqli_rollback($connection);
    die($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 20px;
            text-align: center;
        }

        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 100px;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 24px;
            margin: 0;
            color: black;
        }

        h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-back {
            background-color: #007bff;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #73c5eb;
        }

        .btn-back:hover {
            background-color: #73c5eb;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="../img/hero-img.png" alt="Sport Center Logo" class="logo">
            <h1>REGISTRASI BERHASIL</h1>
        </div>
        <div class="content">
            
        <button type="button" class="btn btn-primary" onclick="window.location.href='../html/home.php'">Kembali Ke Menu Awal</button>
        </div>
    </div>
</body>
</html>
