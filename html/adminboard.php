<!DOCTYPE html>
<?php
include("../proses/koneksi.php");

$pin = '';
$name = '';
$phone = '';
$date = '';
$time = '';
$duration = '';
$status = '';
$jenis = '';

if (isset($_POST['cari']) && isset($_POST['pin'])) {
    $pin = $_POST['pin'];
    $pin = mysqli_real_escape_string($connection, $pin);

    $query = "SELECT * FROM billiard WHERE pin = '$pin'";
    $result = mysqli_query($connection, $query);
    $jenis = 'billiard';

    if (mysqli_num_rows($result) == 0) {
        $query = "SELECT * FROM bulutangkis WHERE pin = '$pin'";
        $result = mysqli_query($connection, $query);
        $jenis = 'bulutangkis';

        if (mysqli_num_rows($result) == 0) {
            $query = "SELECT * FROM futsal WHERE pin = '$pin'";
            $result = mysqli_query($connection, $query);
            $jenis = 'futsal';
        }
    }

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $phone = $row['phone'];
        $date = $row['date'];
        $time = $row['time'];
        $duration = $row['duration'];
        $status = $row['status'];
    } else {
        echo "No results found.";
    }
    $query = "UPDATE $jenis SET status = 'bermain' WHERE pin = '$pin'";
    $result = mysqli_query($connection, $query);
}




?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Board</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        input[type="radio"] {
            position: absolute;
            width: 1em;
            height: 1em;
            opacity: 0;
        }

        .custom-checkbox {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: #f0f0f0;
            border: 2px solid #cddc39;
            border-radius: 5px;
            position: relative;
        }

        input[type="radio"]:checked+.custom-radio {
            background-color: #cddc39;
        }

        input[type="radio"]:checked+.custom-radio::after {
            content: "";
            width: 10px;
            height: 10px;
            background-color: white;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .radio-btn-wrapper {
            margin-top: 20px;
        }

        .custom-form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .admin-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .admin-header .admin-info {
            display: flex;
            align-items: center;
        }

        .admin-header .admin-info img {
            border-radius: 50%;
            margin-right: 10px;
        }

        .card-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            flex-wrap: wrap;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
        }

        .action-buttons,
        .table-buttons,
        .field-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn-group-vertical .btn {
            margin-bottom: 10px;
        }

        .action-buttons button,
        .table-buttons button,
        .field-buttons button {
            flex: 1 1 calc(25% - 10px);
            max-width: calc(25% - 10px);
            margin-bottom: 10px;
        }

        .action-buttons {
            margin-bottom: 30px;
        }

        .btn-group-vertical .btn {
            width: 100%;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1 1 100%;
        }

        .img-fluid {
            margin-top: 20px;
            margin-bottom: 10px;
            max-width: 20%;
            height: auto;
        }

        .selected {
            background-color: #007bff;
            color: white;
            pointer-events: none;
        }

        .radio-btn-wrapper {
            display: inline-block;
            position: relative;
        }

        .radio-btn-wrapper input[type="radio"] {
            opacity: 0;
            position: absolute;
            z-index: -1;
        }

        .btn-outline-danger {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            font-weight: 400;
            color: #dc3545;
            background-color: transparent;
            background-image: none;
            border: 1px solid #dc3545;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-outline-danger:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .radio-btn-wrapper input[type="radio"]:checked+.btn-outline-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        /* Change color when radio button is selected */
        input[type="radio"]:checked+label {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="admin-header">
            <h1>ADMIN BOARD</h1>
            <div class="admin-info">
                <span>ADMIN</span>
            </div>
        </div>
        <div class="card-container">
            <div class="logo-container">
                <img src="../img/logoAdmin.png" alt="Sport Center Logo" class="img-fluid">
            </div>

            <div class="custom-form">
                <div class="custom-form">
                    <h3 class="text-center">PIN reservasi</h3>
                    <form method="POST" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukkan PIN" name="pin">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" name="cari">Cari</button>
                            </div>
                        </div>
                    </form>
            </div>

                <h3 class="text-center">DATA DITEMUKAN</h3>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="pin">KODE PIN :</label>
                        <input type="text" id="pin" name="pin" class="form-control"
                            value="<?php echo htmlspecialchars($pin); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Pemesan :</label>
                        <input type="text" id="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Aktif (whatsapp) :</label>
                        <input type="text" id="phone" class="form-control"
                            value="<?php echo htmlspecialchars($phone); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Pemesanan :</label>
                        <input type="text" id="date" class="form-control" value="<?php echo htmlspecialchars($date); ?>"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="date">Jenis Pemesanan :</label>
                        <input type="text" id="jenis" class="form-control"
                            value="<?php echo htmlspecialchars($jenis); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="time">Waktu Bermain :</label>
                        <input type="text" id="time" class="form-control" value="<?php echo htmlspecialchars($time); ?>"
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="duration">Durasi Digunakan :</label>
                        <select id="duration" class="form-control" disabled>
                            <option <?php echo ($duration=='1 jam' ) ? 'selected' : '' ; ?>>1 jam</option>
                            <option <?php echo ($duration=='2 jam' ) ? 'selected' : '' ; ?>>2 jam</option>
                            <option <?php echo ($duration=='3 jam' ) ? 'selected' : '' ; ?>>3 jam</option>
                            <option <?php echo ($duration=='4 jam' ) ? 'selected' : '' ; ?>>4 jam</option>
                            <option <?php echo ($duration=='Open Table' ) ? 'selected' : '' ; ?>>Open Table</option>
                        </select>
                    </div>
                    <div class="container mt-4">
                        <div class="col">
                        </div>
                </form>
            </div>

        </div>
    </div>
    </div>

    <script>
        function selectButton(button) {
            button.classList.add('selected');
            button.setAttribute('disabled', 'true');
        }
    </script>

</body>

</html>