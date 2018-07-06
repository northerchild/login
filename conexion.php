<?php

	try {
		$conexion = new PDO('mysql:host=localhost;dbname=login_cun','root','');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}

?>