<?php 
    session_start();

    include("koneksi.php");
    
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

    $query = "SELECT email, password FROM user WHERE email = ? AND password = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1) {
        $_SESSION["email"] = $_POST["email"];
        header("Location: succes.php");
        exit();
    } else {
        header("Location: failedLogin.php");
        exit();
    }
?>
