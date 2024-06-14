<?php
    Session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("location: successRegister.php");
    exit();
?>