<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("location: ../index.php"); 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="#" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw=="
        crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg=="
        crossorigin="anonymous">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
    body {
        background-color: #f5f5f5;
    }
    </style>

</head>

<body>
    <?php
        include("../config/db.php");
        include("../config/conexion.php");
        include("../config/alertas.php");
        if(isset($_POST['taler'])){
            $taller = addslashes ($_POST['nombreTaller']);
            if (empty($taller)){
                $mensaje='Campo taller requerido';
                popUpWarning($mensaje);
            }
            $edades = addslashes ($_POST['edades']);
            if (empty($edades)){
                $mensaje='Debe seleccionar las edades';
                popUpWarning($mensaje);
            } else if($edades == 'MENORES'){
                $edad_min = 11;
                $edad_max = 18;
            } else if($edades == 'MAYORES'){
                $edad_min = 19;
                $edad_max = 36;
            }
            $sql = "INSERT INTO pdvb.Talleres (Taller, Edad_Min, Edad_Max, Disponible, Link_Zoom, Fecha_Creacion)
                        VALUES('$taller', $edad_min, $edad_max, 1, '', CURRENT_TIMESTAMP);";
            $retval = mysqli_query($con,$sql);
            if($retval) {
                $mensaje = 'Registrado con exito';
                popUpSuccess('Taller creado', $mensaje);
            } else if(! $retval ) {
                $mensaje = 'Nose pudo registrar';
                popUpWarning($mensaje);
               die('Could not enter data: ' . mysqli_error());
            }
        }
        if(isset($_POST['insert_link'])){
            $link = addslashes ($_POST['link_sala']);
            if (empty($link)){
                $mensaje='Campo link requerido';
                popUpWarning($mensaje);
            }
            $id_taller = addslashes ($_POST['id_taller']);
            if (empty($id_taller)){
                $mensaje='Selecciones el taller';
                popUpWarning($mensaje);
            }
            $sql = "UPDATE pdvb.Talleres SET Link_Zoom='$link' WHERE id=" .$id_taller;
            $retval = mysqli_query($con,$sql);
            if($retval) {
                $mensaje = 'Registrado exitosamente \n '.$link;
                popUpSuccess('Link actualizado', $mensaje);
            } else if(! $retval ) {
                $mensaje = 'Nose pudo registrar';
                popUpWarning($mensaje);
               die('Could not enter data: ' . mysqli_error());
            }
        }
        if(isset($_POST['cambiar'])){
            $contrasena = addslashes ($_POST['userPassword']);
            if (empty($contrasena)){
                $mensaje='Campo contraseña requerido';
                popUpWarning($mensaje);
            }
            $contrasena =  sha1($contrasena);
            $id_user = addslashes ($_POST['id_user']);
            if (empty($id_user)){
                $mensaje='Usuario incorrecto';
                popUpWarning($mensaje);
            }
            $sql = "UPDATE pdvb.Acampante SET Contrasena='$contrasena' WHERE id=" .$id_user;
            $retval = mysqli_query($con,$sql);
            if($retval) {
                $mensaje = 'Cambio de contraseña exitoso';
                popUpSuccess('Contraseña actualizada', $mensaje);
            } else if(! $retval ) {
                $mensaje = 'Nose pudo registrar';
                popUpWarning($mensaje);
               die('Could not enter data: ' . mysqli_error());
            }
        }
    ?>
    </br>
    </br>
    <div class="container">
        <div class="row">
            <div class="col-md-2 ">
                <div class="text-center">
                    <img src="../images/logos/pv_blanco.png" alt="" style="border-radius: 100%;" width="150"
                        height="150">
                    </br>
                    </br>
                    <a href="../controler/logout.php" class="btn btn-info btn-sm" role="button"
                        aria-pressed="true">Cerrar
                        sesión</a>
                    </br>
                    </br>
                </div>
            </div>
            <div class="col-md-10">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#1" data-toggle="tab">Acampantes</a>
                    </li>
                    <li><a href="#2" data-toggle="tab">Talleres</a>
                    </li>
                    <li><a href="#3" data-toggle="tab">Cuenta</a>
                    </li>
                </ul>
                <div class="tab-content ">
                    <div class="tab-pane active" id="1">
                        </br>
                        <div class="col-md-4 col-md-offset-10">
                            <a href="../controler/export.php" class="btn btn-info btn-sm" role="button"
                                aria-pressed="true">Imprimir excel</a>
                        </div>
                        </br>
                        </br>
                        <div class="table-responsive">
                            <?php
                                include("../config/db.php");
                                include("../config/conexion.php");
                                $query = "SELECT a.id, Nombres, Apellidos, Edad, Sexo, Celular, Ciudad, Pais, Usuario, Correo, t.Taller
                                            FROM pdvb.Acampante a INNER JOIN pdvb.Talleres t ON Id_Taller = t.id";
                                $result = mysqli_query($con,$query); 
                                echo '<table class="table table-striped">';
                                echo '<thead>
                                        <tr>
                                            <th></th>
                                            <th>id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Edad</th>
                                            <th>Telefono</th>
                                            <th>Ciudad</th>
                                            <th>Contraseña</th>
                                        </tr>
                                    </thead>';
                                while($row = $result->fetch_assoc()){
                                    echo '<tr>';
                                        echo '<td><a><span class="detalles-cuenta fa fa-search"
                                                data-nombre="' . $row['Nombres'] . '"
                                                data-apellido="' . $row['Apellidos'] . '"
                                                data-edad="' . $row['Edad'] . '"
                                                data-sexo="' . $row['Sexo'] . '"
                                                data-celular="' . $row['Celular'] . '"
                                                data-ciudad="' . $row['Ciudad'] . '"
                                                data-pais="' . $row['Pais'] . '"
                                                data-usuario="' . $row['Usuario'] . '"
                                                data-correo="' . $row['Correo'] . '"
                                                data-taller="' . $row['Taller'] . '"
                                                data-toggle="modal" data-target="#detallesCuenta"></span></a></td>';
                                        echo '<td>' . $row['id'] . '</td>';
                                        echo '<td>' . $row['Nombres'] . '</td>';
                                        echo '<td>' . $row['Apellidos'] . '</td>';
                                        echo '<td>' . $row['Edad'] . '</td>';
                                        echo '<td>' . $row['Celular'] . '</td>';
                                        echo '<td>' . $row['Ciudad'] . '</td>';
                                        echo '<td><button type="button" class="cambiar-contrasena btn btn-default btn-sm"
                                                data-id="' . $row['id'] . '" data-toggle="modal" data-target="#cambiarContrasena">Cambiar</button><td>';
                                    echo '</tr>';
                                }
                                echo '</table>';
                                $result->close();
                                mysqli_close($con);
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="2">
                        </br>
                        <div class="col-md-4 col-md-offset-10">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#crearTaller">Crear Taller</button>
                        </div>
                        </br>
                        </br>
                        <div class="table-responsive">
                            <?php
                                include("../config/db.php");
                                include("../config/conexion.php");
                                $query = "SELECT id, Taller, Inscritos, Disponible, Link_Zoom FROM Talleres";
                                $result = mysqli_query($con,$query); 
                                echo '<table class="table table-striped">';
                                echo '<thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Taller</th>
                                            <th>Inscritos</th>
                                            <th>Disponible</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>';
                                while($row = $result->fetch_assoc()){
                                    echo '<tr>';
                                        echo '<td>' . $row['id'] . '</td>';
                                        echo '<td>' . $row['Taller'] . '</td>';
                                        echo '<td>' . $row['Inscritos'] . '</td>';
                                        if($row['Disponible']){
                                            echo '<td> Si </td>';
                                        } else  {
                                            echo '<td> No </td>';
                                        }
                                        if($row['Link_Zoom']){
                                            echo '<td><a href="' . $row['Link_Zoom'] . '" target="_blank">Ir a sala</td>';
                                        } else  {
                                            echo '<td><button type="button" class="link-taller btn btn-default btn-sm" data-id="' . $row['id'] . '" data-toggle="modal" data-target="#linkTaller">Insertar</button><td>';
                                        }
                                    echo '</tr>';
                                }
                                echo '</table>';
                                $result->close();
                                mysqli_close($con);
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="3">
                        </br>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="Correo electronico">Usuario</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <i>nada por ahora<?php echo $usuario; ?></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Acampante -->
        <div class="modal fade" id="cambiarContrasena" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title center" id="exampleModalLabel">Nueva contraseña</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input name="userPassword" type="text" id="userPassword"
                                class="form-control input-sm chat-input" placeholder="contraseña" minlength="8" />
                            <input style="display:none" name="id_user" id="id_user"
                                class="form-control input-sm chat-input" type="text" />
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">
                                    <button type="submit" name="cambiar" class="btn btn-info">Guardar</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Acampante -->
        <div class="modal fade" id="detallesCuenta" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title center" id="exampleModalLabel">Detalles Usuario</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nombres</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="nombre" id="nombre"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Apellidos</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="apellido" id="apellido"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Edad</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="edad" id="edad"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Sexo</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="sexo" id="sexo"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Celular</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="celular" id="celular"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Pais</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="pais" id="pais"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Ciudad</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="ciudad" id="ciudad"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Taller</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="taller" id="taller"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Usuario</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="usuario" id="usuario"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Correo</label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <i><span name="correo" id="correo"></span></i>
                                </div>
                            </div>
                        </div>
                        </br>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Link Taller -->
        <div class="modal fade" id="linkTaller" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title center" id="exampleModalLabel">Insertar Link de la sala</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input name="link_sala" type="text" id="link_sala" class="form-control input-sm chat-input"
                                placeholder="link de sala" />
                            <input style="display:none" name="id_taller" id="id_taller"
                                class="form-control input-sm chat-input" type="text" />
                            </br>
                            <div class="wrapper">
                                <span class="group-btn">
                                    <button type="submit" name="insert_link" class="btn btn-info">Guardar</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Crear Taller -->
        <div class="modal fade" id="crearTaller" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h5 class="modal-title center" id="exampleModalLabel">Detalles Taller</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="Nombre taller">Nombre taller</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <em class="fa fa-university"></em>
                                        </div>
                                        <input require="true" id="nombreTaller" name="nombreTaller" type="text"
                                            placeholder="Nombre taller" class="form-control input-md">
                                    </div>
                                </div>
                                </br>
                                </br>
                                <label class="col-md-3 control-label" for="Taller">Taller para</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <em class="fa fa-users"></em>
                                        </div>
                                        <select require="true" class="form-control" id="edades" name="edades">
                                            <option value="" selected>Selecciona la categoria</option>
                                            <option value="MAYORES">Mayores</option>
                                            <option value="MENORES">Menores</option>
                                        </select>
                                    </div>
                                </div>
                                </br>
                                </br>
                                <button type="submit" name="taler" class="btn btn-info">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
    $(document).on("click", ".link-taller", function() {
        var tallerId = $(this).data('id');
        $(".modal-body #id_taller").val(tallerId);
    });
    </script>

    <script type="text/javascript">
    $(document).on("click", ".cambiar-contrasena", function() {
        var userId = $(this).data('id');
        $(".modal-body #id_user").val(userId);
    });
    </script>

    <script type="text/javascript">
    $(document).on("click", ".detalles-cuenta", function() {
        var nombre = $(this).data('nombre');
        $(".modal-body #nombre").text(nombre);
        var apellido = $(this).data('apellido');
        $(".modal-body #apellido").text(apellido);
        var edad = $(this).data('edad');
        $(".modal-body #edad").text(edad);
        var sexo = $(this).data('sexo');
        $(".modal-body #sexo").text(sexo);
        var celular = $(this).data('celular');
        $(".modal-body #celular").text(celular);
        var pais = $(this).data('pais');
        $(".modal-body #pais").text(pais);
        var ciudad = $(this).data('ciudad');
        $(".modal-body #ciudad").text(ciudad);
        var taller = $(this).data('taller');
        $(".modal-body #taller").text(taller);
        var usuario = $(this).data('usuario');
        $(".modal-body #usuario").text(usuario);
        var correo = $(this).data('correo');
        $(".modal-body #correo").text(correo);
    });
    </script>

</body>

</html>