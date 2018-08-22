<?php session_start();

	if(isset($_SESSION['usuario'])){
        require 'views/principalView.php';
    }else{
        header ('location: login.php');
    }

?>