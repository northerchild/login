<?php session_start();

    if (isset($_SESSION['usuarios'])) {
        header("Location: index.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave);
        $error = '';
        try {
                $conexion = new PDO('mysql:host=localhost;dbname=curso_login','root','');
            } catch (PDOException $e) {
                echo "Error:" . $e->getMessage();
            }
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuarios = :usuario ');
        $statement->execute(array(':usuario'=> $usuario));
        $resultado = $statement->fetch();
        if ($resultado != false) {
            $_SESSION['usuario'] = $usuario;
            header("Location: principal.php");
        }
        else{
            $error .= '<li>Datos Incorrectos</li>';
        }
    }

    require_once "views/loginView.php";

?>