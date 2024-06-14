<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // Replace with your MySQL password if any

// Step 1: Connect to MySQL server without specifying the database
$connection = mysqli_connect($host, $user, $pass);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Check and create the database if it doesn’t exist
$query = "CREATE DATABASE IF NOT EXISTS sc";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Database <b>'sc'</b> berhasil dibuat... <br>";
}

// Step 3: Reconnect to MySQL server with the database
mysqli_close($connection);
$connection = mysqli_connect($host, $user, $pass, 'sc');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Database <b>'sc'</b> berhasil dipilih... <br>";
}

// Step 4: Create user table
$query = "DROP TABLE IF EXISTS user";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Tabel <b>'user'</b> berhasil dihapus... <br>";
}

$query = "
    CREATE TABLE user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        address TEXT,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Tabel <b>'user'</b> berhasil dibuat... <br>";
}

// Step 5: Create futsal table
$query = "DROP TABLE IF EXISTS futsal";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Tabel <b>'futsal'</b> berhasil dihapus... <br>";
}

$query = "
    CREATE TABLE futsal (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        date DATE,
        time TIME,
        duration INT,
        alarm TIME,
        status VARCHAR(15),
        pin VARCHAR(10)
    )";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Tabel <b>'futsal'</b> berhasil dibuat... <br>";
}

// Step 6: Create billiard table
$query = "DROP TABLE IF EXISTS billiard";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Tabel <b>'billiard'</b> berhasil dihapus... <br>";
}

$query = "
    CREATE TABLE billiard (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        date DATE,
        time TIME,
        duration INT,
        alarm TIME,
        status VARCHAR(15),
        pin VARCHAR(10)
    )";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Tabel <b>'billiard'</b> berhasil dibuat... <br>";
}

// Step 7: Create bulutangkis table
$query = "DROP TABLE IF EXISTS bulutangkis";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Tabel <b>'bulutangkis'</b> berhasil dihapus... <br>";
}

$query = "
    CREATE TABLE bulutangkis (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        date DATE,
        time TIME,
        duration INT,
        alarm TIME,
        status VARCHAR(15),
        pin VARCHAR(10)
    )";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Tabel <b>'bulutangkis'</b> berhasil dibuat... <br>";
}

$query = "DROP TABLE IF EXISTS history";
$query_result = mysqli_query($connection, $query);
if (!$query_result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Tabel <b>'history'</b> berhasil dihapus... <br>";
}
$query = "
    CREATE TABLE history (
        id INT AUTO_INCREMENT PRIMARY KEY,
  		jenis VARCHAR(255),
        email VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        phone VARCHAR(15) NOT NULL,
        date DATE,
        time TIME,
        duration INT,
        alarm TIME
    )";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
} else {
    echo "Tabel <b>'history'</b> berhasil dibuat... <br>";
}

// Step 8: Create events to clean up expired records
$events = [
    "CREATE EVENT IF NOT EXISTS cleanup_futsal
    ON SCHEDULE EVERY 1 HOUR
    DO
    DELETE FROM futsal
    WHERE STR_TO_DATE(CONCAT(date, ' ', alarm), '%Y-%m-%d %H:%i:%s') < NOW();",

    "CREATE EVENT IF NOT EXISTS cleanup_bulutangkis
    ON SCHEDULE EVERY 1 HOUR
    DO
    DELETE FROM bulutangkis
    WHERE STR_TO_DATE(CONCAT(date, ' ', alarm), '%Y-%m-%d %H:%i:%s') < NOW();",

    "CREATE EVENT IF NOT EXISTS cleanup_billiard
    ON SCHEDULE EVERY 1 HOUR
    DO
    DELETE FROM billiard
    WHERE STR_TO_DATE(CONCAT(date, ' ', alarm), '%Y-%m-%d %H:%i:%s') < NOW();"
];

foreach ($events as $event) {
    $result = mysqli_query($connection, $event);
    if (!$result) {
        die("Query Error: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
    } else {
        echo "Event berhasil dibuat... <br>";
    }
}
?>
