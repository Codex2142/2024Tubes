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
            
        <button type="button" class="btn btn-primary" onclick="window.location.href='home.php'">Kembali Ke Menu Awal</button>
        </div>
    </div>
</body>
</html>