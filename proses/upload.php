<?php 
    include("koneksi.php");


    $name = htmlspecialchars($_POST["name"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $address = htmlspecialchars($_POST["address"]);
    $password = htmlspecialchars($_POST["password"]);


    $query = "INSERT INTO user (name, phone, email, address, password, created_at) VALUES ('$name', '$phone', '$email', '$address', '$password', CURRENT_TIMESTAMP())";


    $result = mysqli_query($connection, $query);


    if($result){
        echo "Registration successful!";
        header("Location: successRegister.php");
    } else {
        echo "Error: " . mysqli_error($connection);
    }
?>
