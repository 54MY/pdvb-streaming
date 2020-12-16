<?php
    session_start();
    if(session_destroy()) {
        header("Location: ../index.php"); // Redireccionando a la pagina index.php
    }
?>
