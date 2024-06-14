<?php
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['address']) ? htmlspecialchars($_POST['password']) : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sport Center</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style/style.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 2rem;
        }
        .logo {
            width: 150px;
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="../img/logoAdmin.png" alt="Sport Center Logo" class="logo">
                        </div>
                        <h3 class="text-center">Login</h3>
                        <p class="text-center">Silahkan Login Sebelum Melakukan Reservasi</p>
                        <form method="POST" action="../proses/loginProses.php">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" value="<?php echo $email?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" value="<?php echo $password?>">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ingat Saya</label>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">Login</button>
                                <button type="button" class="btn btn-primary" onclick="window.location.href='register.php'">Registrasi</button>
                                <button type="button" class="btn btn-danger" onclick="window.location.href='home.php'">Batalkan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <footer class="text-center mt-4">
                    <small>2024 SPORT CENTER. All rights reserved.</small>
                    <div class="footer-links">
                        <a href="#">informasi</a> |
                        <a href="#">ketentuan</a> |
                        <a href="#">prosedur</a> |
                        <a href="#">jadwal</a>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
