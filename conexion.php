<?php

	try {
		$conexion = new PDO('mysql:localhost;dbname=login','root','')
	} catch (PDOException $e) {
		echo "Error". $e->getMessage();
	}

?>