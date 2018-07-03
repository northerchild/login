<?php session_start();

	if (isset($SESSION['usuario'])) {
		require_once 'views/principalView.php';
	}
	

?>