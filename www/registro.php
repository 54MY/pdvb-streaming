<?php
    if(isset($_SESSION['acampante'])){
        header("location: acampante/profile.php");
    } else if(isset($_SESSION['admin'])){
        header("location: pdv/index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro de acampantes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="#" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw=="
        crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg=="
        crossorigin="anonymous">


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
    body {
        padding-top: 70px;
    }

    .othertop {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <?php
        include("config/db.php");
        include("config/conexion.php");
        include("config/alertas.php");

        if(isset($_POST['registrar'])){
            /* $mensaje;
            $correo = addslashes ($_POST['correo']);
            if (empty($correo)){
                $mensaje='Campo correo requerido';
                popUpWarning($mensaje);
            }
            $nombres = addslashes ($_POST['nombres']);
            if (empty($nombres)){
                $mensaje='Campo nombres requerido';
                popUpWarning($mensaje);
            } else {$nombres = strtoupper($nombres);}
            $apellidos = addslashes ($_POST['apellidos']);
            if (empty($apellidos)){
                $mensaje='Campo apellidos requerido';
                popUpWarning($mensaje);
            } else {$apellidos = strtoupper($apellidos);}
            $edad = addslashes ($_POST['edad']);
            if (empty($edad)){
                $mensaje='Campo edad requerido';
                popUpWarning($mensaje);
            }
            $sexo = addslashes ($_POST['sexo']);
            if (empty($sexo)){
                $mensaje='Campo sexo requerido';
                popUpWarning($mensaje);
            }
            $celular = addslashes ($_POST['celular1']);
            $celular2 = addslashes ($_POST['celular2']);
            $existe_celular = mysqli_query($con,"SELECT id FROM pdvb.Acampante WHERE Celular = '" . $celular . "';");
            if ($celular!=$celular2){
                $mensaje='Los campos celular deben cohincidir';
                popUpWarning($mensaje);
            } else if (empty($celular) || empty($celular2)){
                $mensaje='Campo celular requerido';
                popUpWarning($mensaje);
            }  else if(mysqli_num_rows($existe_celular) > 0) {
                $mensaje='El numero de celular ' . $celular . ' ya fue registrado';
                popUpWarning($mensaje);
            }
            $pais = addslashes ($_POST['pais']);
            if (empty($pais)){
                $mensaje='Campo pais requerido';
                popUpWarning($mensaje);
            } else if ($pais == 'BOLIVIA') {
                $ciudad = addslashes ($_POST['ciudad']);
                if (empty($ciudad)){
                    $mensaje='Campo ciudad requerido';
                    popUpWarning($mensaje);
                }
            } else {
                $ciudad = addslashes ($_POST['ciudadOtro2']);
                if (empty($ciudad)){
                    $mensaje='Campo ciudad requerido';
                    popUpWarning($mensaje);
                }
            }
            switch ($pais) {
                case 'BOLIVIA':
                    $cod_pais = '+591';
                    break;
                case 'ARGENTINA':
                    $cod_pais = '+54';
                    break;
                case 'CHILE':
                    $cod_pais = '+56';
                    break;
                case 'COLOMBIA':
                    $cod_pais = '+57';
                    break;
                case 'PERU':
                    $cod_pais = '+51';
                    break;
                case 'MEXICO':
                    $cod_pais = '+52';
                    break;
                case 'PARAGUAY':
                    $cod_pais = '+595';
                    break;
                case 'ECUADOR':
                    $cod_pais = '+593';
                    break;
                case 'URUGUAY':
                    $cod_pais = '+598';
                    break;
                case 'PANAMA':
                    $cod_pais = '+507';
                    break;
                case 'VENEZUELA':
                    $cod_pais = '+58';
                    break;
                default:
                    $cod_pais = '000';
                    break;
            }
            $asiste_iglesia = addslashes ($_POST['asiste']);
            $nombre_iglesia = addslashes ($_POST['iglesia']);
            if (empty($asiste_iglesia)) {
                $asiste_iglesia = 0;
                $nombre_iglesia = '';
            } else if (empty($nombre_iglesia)){
                $mensaje='Campo nombre de la Iglesia requerido';
                popUpWarning($mensaje);
            } else {$nombre_iglesia = strtoupper($nombre_iglesia);}
            if ($edad <= 18 && $edad >=11) {
                $taller = addslashes ($_POST['menoresTaller']);
                if (empty($taller)){
                    $mensaje='Campo taller requerido';
                    popUpWarning($mensaje);
                }
            } else if ($edad <= 35 && $edad >=19){
                $taller = addslashes ($_POST['mayoresTaller']);
                if (empty($taller)){
                    $mensaje='Campo taller requerido';
                    popUpWarning($mensaje);
                }
            } else {
                $mensaje='Rango de edad no permitido';
                popUpWarning($mensaje);
            }
            $usuario = addslashes ($_POST['usuario']);
            $existe_usuario = mysqli_query($con,"SELECT id FROM pdvb.Acampante WHERE Usuario = '" . $usuario . "';");
            if (empty($usuario)){
                $mensaje='Campo usuario requerido';
                popUpWarning($mensaje);
            } else if(mysqli_num_rows($existe_usuario) > 0) {
                $mensaje='El usuario ' . $usuario . ' ya fue registrado';
                popUpWarning($mensaje);
            }
            $contrasena = addslashes ($_POST['contrasena']);
            if (empty($contrasena)){
                $mensaje='Campo contraseña requerido';
                popUpWarning($mensaje);
            }
            $contrasena =  sha1($contrasena);

            $sql = "INSERT INTO Acampante (Correo, Nombres, Apellidos, Edad, Sexo, Codigo_Pais, Celular, Pais, Ciudad, Asiste_Iglesia, Nombre_Iglesia, Id_Taller, Usuario, Contrasena)
                    VALUES ('$correo','$nombres','$apellidos',$edad,'$sexo','$cod_pais',$celular,'$pais','$ciudad',$asiste_iglesia,'$nombre_iglesia',$taller,'$usuario','$contrasena')";
            
            $retval_inscritos = mysqli_query($con,"SELECT Inscritos FROM pdvb.Talleres WHERE id='$taller';");
            $row = mysqli_fetch_assoc($retval_inscritos);
            $inscritos = $row["Inscritos"];
            $inscritos = $inscritos + 1;
            $update_inscritos = mysqli_query($con,"UPDATE pdvb.Talleres SET Inscritos=$inscritos WHERE id='$taller';");

            $retval = mysqli_query($con,$sql);
            if($retval) {
                $mensaje = 'Ahora puedes iniciar session en tu perfil';
                popUpSuccess('Registrado con exito', $mensaje);
            } else if(! $retval ) {
                $mensaje = 'Nose pudo registrar ';
                popUpWarning($mensaje);
               die('Could not enter data: ' . mysqli_error());
            } */

            popUpEnd('Inscripciones cerradas','El proceso de inscripcion a terminado');
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend>Por favor ingresa correctamente tus datos</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Correo electronico">Correo electronico</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <em class="fa fa-envelope-o"></em>
                                    </div>
                                    <input require="true" id="correo" name="correo" type="email"
                                        placeholder="Correo electronico" class="form-control input-md">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Nombres">Nombres</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <em class="fa fa-user"></em>
                                    </div>
                                    <input require="true" id="nombres" name="nombres" type="text" placeholder="Nombres"
                                        class="form-control input-md">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input require="true" id="apellidos" name="apellidos" type="text"
                                    placeholder="Apellidos" class="form-control input-md ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="edad">Edad</label>
                            <div class="col-sm-8">
                                <div class="input-group othertop">
                                    <div class="input-group-addon">
                                        <em class="fa fa-birthday-cake"></em>
                                    </div>
                                    <select require="true" class="form-control" id="edad" name="edad"
                                        onclick="calculateAge()">
                                        <option selected>Que edad tienes?</option>
                                        <?php
                                            for ($i = 12; $i <= 35; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="sexo">Sexo</label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input class="col-sm-1 form-check-input" type="radio" name="sexo" id="sexo"
                                        value="Masculino">
                                    <label class="col-sm-2 form-check-label" for="sexo">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="col-sm-1 form-check-input" type="radio" name="sexo" id="sexo"
                                        value="Femenino">
                                    <label class="col-sm-2 form-check-label" for="sexo">Femenino</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="pais">Pais</label>
                            <div class="col-sm-8">
                                <div class="input-group othertop">
                                    <div class="input-group-addon">
                                        <em class="fa fa-globe"></em>
                                    </div>
                                    <select require="true" class="form-control" id="pais" name="pais"
                                        onclick="selectCountry()">
                                        <option value="" selected>Selecciona una pais</option>
                                        <option value="BOLIVIA">Bolivia</option>
                                        <option value="ARGENTINA">Argentina</option>
                                        <option value="CHILE">Chile</option>
                                        <option value="COLOMBIA">Colombia</option>
                                        <option value="PERU">Peru</option>
                                        <option value="MEXICO">Mexico</option>
                                        <option value="PARAGUAY">Paraguay</option>
                                        <option value="ECUADOR">Ecuador</option>
                                        <option value="URUGUAY">Uruguay</option>
                                        <option value="PANAMA">Panama</option>
                                        <option value="VENEZUELA">Venezuela</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="ciudadOtr2" style="display:none">
                            <label class="col-sm-4 control-label" for="ciudadOtro">Escriba su ciudad</label>
                            <div class="col-sm-8">
                                <div class="input-group othertop">
                                    <div class="input-group-addon">
                                        <em class="fa fa-globe"></em>
                                    </div>
                                    <input class="form-control" id="ciudadOtro2" type="text" name="ciudadOtro2"
                                        placeholder="Escriba el nombre de su ciudad" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="ciudad2" style="display:none">
                            <label class="col-sm-4 control-label" for="ciudad">Ciudad</label>
                            <div class="col-sm-8">
                                <div class="input-group othertop">
                                    <div class="input-group-addon">
                                        <em class="fa fa-globe"></em>
                                    </div>
                                    <select class="form-control" id="ciudad" name="ciudad">
                                        <option value="" selected>Selecciona una ciudad</option>
                                        <option value="COCHABAMBA">Cochabamba</option>
                                        <option value="SANTA CRUZ">Santa Cruz</option>
                                        <option value="LA PAZ">La Paz</option>
                                        <option value="ORURO">Oruro</option>
                                        <option value="SUCRE">Sucre</option>
                                        <option value="POTOSI">Potosi</option>
                                        <option value="PANDO">Pando</option>
                                        <option value="BENI">Beni</option>
                                        <option value="TARIJA">Tarija</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Celular">Celular</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <em class="fa fa-mobile fa-1x" style="font-size: 20px;"></em>
                                        <input class="code" type="text" style="width: 40px;height: 16px" disabled />
                                    </div>
                                    <input id="celular1" name="celular1" type="number" placeholder="Celular"
                                        class="form-control input-md">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <em class="fa fa-mobile fa-1x" style="font-size: 20px;"></em>
                                        <input class="code" type="text" style="width: 40px;height: 16px" disabled />
                                    </div>
                                    <input id="celular2" name="celular2" type="number" placeholder="Confirmar celular"
                                        class="form-control input-md">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="Languages Known">Asistes a una Iglesia?</label>
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="1" id="asiste" name="asiste"
                                            onclick="assistChurch()">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="iglesia2" style="display:none">
                            <label class="col-sm-4 control-label" for="iglesia">Nombre de la Iglesia</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <em class="fa fa-church"></em>
                                    </div>
                                    <input id="iglesia" name="iglesia" type="text" placeholder="Nombre de Iglesia"
                                        class="form-control input-md">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="tallerMayores" style="display:none">
                            <label class="col-sm-4 control-label" for="taller">Taller</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <em class="fa fa-church"></em>
                                    </div>
                                    <select class="form-control" id="mayoresTaller" name="mayoresTaller">
                                        <option value="" selected>Selecciona un taller</option>
                                        <?php
                                            include("../config/db.php");
                                            include("../config/conexion.php");
                                            $query = "SELECT id, Taller FROM Talleres WHERE 23 BETWEEN Edad_Min AND Edad_Max";
                                            $result = mysqli_query($con,$query);
                                            while($value = $result->fetch_array(MYSQLI_ASSOC)){
                                                echo '<option value="' . $value['id'] . '">' . $value['Taller'] . '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="tallerMenores" style="display:none">
                            <label class="col-sm-4 control-label" for="taller">Taller</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <em class="fa fa-church"></em>
                                    </div>
                                    <select class="form-control" id="menoresTaller" name="menoresTaller">
                                        <option value="" selected>Selecciona un taller</option>
                                        <?php
                                            $query = "SELECT id, Taller FROM Talleres WHERE 13 BETWEEN Edad_Min AND Edad_Max";
                                            $result = mysqli_query($con,$query);
                                            while($value = $result->fetch_array(MYSQLI_ASSOC)){
                                                echo '<option value="' . $value['id'] . '">' . $value['Taller'] . '</option>';
                                            }
                                            $result->close();
                                            mysqli_close($con);
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="usuario">usuario</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <em class="fa fa-user"></em>
                                    </div>
                                    <input class="form-control input-md" id="usuario" require="true" type="text"
                                        placeholder="Nombre de usuario" name="usuario" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="contrasena">contraseña</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <em class="fa fa-lock"></em>
                                    </div>
                                    <input class="form-control" type="password" id="contrasena" require="true"
                                        type="text" name="contrasena" minlength="8" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" name="registrar" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <br />
                <br />
                <hr>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
    function assistChurch() {
        var checkBox = document.getElementById("asiste");
        var iglesia2 = document.getElementById("iglesia2");
        if (checkBox.checked == true) {
            iglesia2.style.display = "block";
        } else {
            iglesia2.style.display = "none";
        }
    }
    </script>

    <script>
    $('#pais').on('change', function() {
        var ciudad2 = document.getElementById("ciudad2");
        var ciudadOtro2 = document.getElementById("ciudadOtr2");
        var selectedValue = this.value;
        if (selectedValue == "BOLIVIA") {
            ciudad2.style.display = "block";
            ciudadOtro2.style.display = "none";
        } else if (selectedValue != "BOLIVIA" && selectedValue != "") {
            ciudadOtro2.style.display = "block";
            ciudad2.style.display = "none";
        } else {
            ciudad2.style.display = "none";
            ciudadOtro2.style.display = "none";
        }
    });
    </script>
    <script>
    $('#edad').on('change', function() {
        var tallerMenores = document.getElementById("tallerMenores");
        var tallerMayores = document.getElementById("tallerMayores");
        var selectedValue = this.value;
        if (selectedValue > 10 && selectedValue < 19) {
            tallerMenores.style.display = "block";
            tallerMayores.style.display = "none";
        } else if (selectedValue > 18 && selectedValue < 36) {
            tallerMayores.style.display = "block";
            tallerMenores.style.display = "none";
        } else {
            tallerMenores.style.display = "none";
            tallerMayores.style.display = "none";
        }
    });
    </script>
    <script>
    $('#pais').on('change', function() {
        switch (this.value) {
            case 'BOLIVIA':
                $('.code').val('+591');
                break;
            case 'ARGENTINA':
                $('.code').val('+54');
                break;
            case 'CHILE':
                $('.code').val('+56');
                break;
            case 'COLOMBIA':
                $('.code').val('+57');
                break;
            case 'PERU':
                $('.code').val('+51');
                break;
            case 'MEXICO':
                $('.code').val('+52');
                break;
            case 'PARAGUAY':
                $('.code').val('+595');
                break;
            case 'ECUADOR':
                $('.code').val('+593');
                break;
            case 'URUGUAY':
                $('.code').val('+598');
                break;
            case 'PANAMA':
                $('.code').val('+507');
                break;
            case 'VENEZUELA':
                $('.code').val('+58');
                break;
            default:
                $('.code').val('000');
                break;
        }
    });
    </script>
</body>

</html>