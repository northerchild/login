<?php session_start();

    if(isset($_SESSION['usuarios'])) {
        header('location: principal.php');
    }else{
        header('location: login.php');
    }


?>