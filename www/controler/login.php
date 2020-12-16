<?php
    $error='';
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "El nombre de usuario o la contraseña es inválida.";
        }
        else{
            $username=$_POST['username'];
            $password=$_POST['password'];
            include("config/db.php");
            include("config/conexion.php");
            // Para proteger de Inyecciones SQL 
            $username = mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
            $password =  sha1($password);
            
            $acampante = mysqli_query($con,"SELECT id, Correo, Nombres, Apellidos, Edad FROM pdvb.Acampante WHERE Usuario = '" . $username . "' and Contrasena='".$password."';");
            $admin = mysqli_query($con,"SELECT id, user, password FROM pdvb.Director WHERE user = '" . $username . "' and password='".$password."';");
            if(mysqli_num_rows($acampante) > 0) {
                session_start();
                $_SESSION['acampante']="$username";
                header("location: acampante/profile.php");
                exit();
            } else if(mysqli_num_rows($admin) > 0) {
                session_start();
                $_SESSION['admin']="$username";
                header("Location: pdv/index.php");
                echo "admin";
                exit();
            } else {
                $error = "El nombre de usuario o la contraseña es inválida.";	
            }
        }
    }
?>