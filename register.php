<?php session_start();
    
    if (isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        $error = '';

        if (empty($usuario) or empty($clave) or empty($clave2)) {
            $error .= '<li>Por favor rellena todos los campos</li>';
        }
        else{
            try {
                $conexion = new PDO('mysql:host=localhost;dbname=curso_login','root','');
            } catch (PDOException $e) {
                echo "ERROR:" . $e->getMessage;
            }
            $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuarios = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultados = $statement->fetch();

            if ($resultados != false) {
                $error .= "<li>El usuario ya existe</li>";
            }

            $clave = hash('sha512', $clave);
            $clave2 = hash('sha512', $clave2);
            if ($clave != $clave2) {
                $error .= '<li>Las contraseñas no son iguales</li>';
            }
        }
        if ($error == '') {
            $statement = $conexion->prepare('INSERT INTO usuarios (id, usuarios, pass) VALUES (null, :usuario, :pass)');
            $statement->execute(array(':usuario' => $usuario, ':pass' =>$clave));
            header('Location: login.php');
        }
    }

    require_once "views/registerView.php"

?>