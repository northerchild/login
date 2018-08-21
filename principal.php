<?php session_start();

	if (isset($_SESSION['usuario'])) {
		require_once "views/principalView.php";
	}else{
		header('Location: login.php');
	}

?>