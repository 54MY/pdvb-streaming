<?php
    include("../config/db.php");
    include("../config/conexion.php");
    
    session_start();
    $user_check=$_SESSION['acampante'];
    $ses_sql=mysqli_query($con, "SELECT a.Usuario, a.Correo, a.Nombres, a.Apellidos, a.Edad, a.Codigo_Pais, a.Celular, a.Pais, a.Ciudad, t.Taller, t.Link_Zoom, a.Color, a.Numero_cuarto
                                FROM pdvb.Acampante a INNER JOIN pdvb.Talleres t ON Id_Taller = t.id WHERE a.Usuario = '$user_check'");
    $row = mysqli_fetch_assoc($ses_sql);

    $usuario =$row["Usuario"];
    $correo =$row["Correo"];
    $nombres =$row["Nombres"];
    $apellidos =$row["Apellidos"];
    $edad =$row["Edad"];
    $codigo_Pais =$row["Codigo_Pais"];
    $celular =$row["Celular"];
    $pais =$row["Pais"];
    $ciudad =$row["Ciudad"];
    $taller =$row["Taller"];
    $link =$row["Link_Zoom"];
    $cuarto =$row["Numero_cuarto"];
    $equipo =$row["color"];

    if (!isset($_SESSION['acampante'])) {
        header("location: ../index.php"); 
    }
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Acampante</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="#" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw=="
        crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg=="
        crossorigin="anonymous">

    <style>
    body {
        background-color: #f5f5f5;
    }
    </style>
</head>

<body>
    </br>
    </br>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="text-center">
                    <img src="../images/logos/pv_blanco.png" alt="" style="border-radius: 100%;" width="150"
                        height="150">
                    </br>
                    </br>
                    <a href="../controler/logout.php" class="btn btn-info btn-sm" role="button"
                        aria-pressed="true">Cerrar sesión</a>
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <h2>Perfil de acampante</h2>
                </div>
                <div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#1" data-toggle="tab">Datos personales</a>
                        </li>
                        <li><a href="#2" data-toggle="tab">Talleres</a>
                        </li>
                        <li><a href="#3" data-toggle="tab">Equipo</a>
                        </li>
                        <li><a href="#4" data-toggle="tab">Cuenta</a>
                        </li>
                    </ul>
                    <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Nombres</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i><?php echo $nombres; ?></i>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Apellidos</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i><?php echo $apellidos; ?></i>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Edad</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i><?php echo $edad; ?></i>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Celular</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i><?php echo $celular; ?></i>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Pais</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i><?php echo $pais; ?></i>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Ciudad</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i><?php echo $ciudad; ?></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="2">
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Taller</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i><?php echo $taller; ?></i>
                                    </div>
                                </div>
                                </br>
                                </br>
                                <?php if(!empty($link)){ ?>
                                <label class="col-md-2 control-label" for="Correo electronico">Link de sala</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a>
                                    </div>
                                </div>
                                </br>
                                </br>
                                <p>si la sala esta llena por favor ingrese a la transmicion en vivo en nuestra pagina de
                                    facebook http://www.facebook.com</p>
                                <?php } else { ?>
                                </br>
                                <p>espere a la asingacion de sala</p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="3">
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Cuarto</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i> # <?php echo $cuarto; ?></i>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Equipo</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i><?php echo $equipo; ?></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="4">
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Usuario</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i><?php echo $usuario; ?></i>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Correo</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <i><?php echo $correo; ?></i>
                                    </div>
                                </div>
                            </div>
                            </br>
                            </br>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Correo electronico">Aplicación</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <a download="HORA_SILENCIOSA.apk" href="../vendor/apk/HORA_SILENCIOSA.apk" class="btn btn-default btn-sm">Descargar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    </hr>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>

</html>