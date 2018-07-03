<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="icon/style.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/estilos.css">
	<title>login</title>
</head>
<body>
	<div class="container-form">
		<div class="header">
			<div class="logo-title">
                <img src="img/logocun.png" alt="logo cun">
                <h2>Biblioteca</h2>
            </div>
			<div class="menu">
                <a href="login.php"><li class="module-login active">Login</li></a>
                <a href="register.php"><li class="module-register">Register</li></a>
			</div>
		</div>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
			<div class="welcome-form"><h1>Registrate a tú</h1><h2>Biblioteca virtual</h2></div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="usuario">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Confirmar contraseña" name="clave2">
            </div>
           <button type="submit">Registrarte<label class="lnr lnr-chevron-right"></label></button>
		</form>
	</div>
	<script src="js/jquery-3.3.1.js"></script>
    <script src="js/script.js"></script>
</body>
</html>