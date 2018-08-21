<?php session_start();

   if (isset($_SESSION['usuarios'])) {
        header("Location: index.php");
    }

    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        
        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);
        
        $error = '';
        
        if (empty($usuario) or empty($clave) or empty($clave2)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=login_cun', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
            
            $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
            
                        
            if ($resultado){
                $error .= '<i>Este usuario ya existe</i>';
            }
            
            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden</i>';
            }
            
            
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO usuarios (id,usuario, pass) VALUES (null, :usuario, :clave)');
            $statement->execute(array(':usuario' => $usuario,':clave' => $clave));  
            header('location: login.php');
        }
    }


    require 'views/registerView.php';

?>