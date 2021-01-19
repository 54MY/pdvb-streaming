<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("location: ../index.php"); 
    }
    include("../config/db.php");
    include("../config/conexion.php");
    function filterData(&$str){
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
    $fileName = "acampantes-" . date('Ymd') . ".xlsx";
    $fields = array('Fecha', 'Nombre de usuario', 'Contraseña', 'Nombres', 'Apellidos', 'Edad', 'Sexo', 'Pais', 'Ciudad', 
                    'Celular', 'Taller', 'Iglesia', 'Color', 'Numero de cuarto');
    $excelData = implode("\t", array_values($fields)) . "\n";
    $result = mysqli_query($con,"SELECT a.Fecha_Registro, a.Usuario, a.Contrasena, a.Nombres, a.Apellidos, a.Edad, a.Sexo, 
                    a.Pais, a.Ciudad, a.Codigo_Pais, a.Celular, t.Taller, a.Nombre_Iglesia, a.Color, a.Numero_Cuarto FROM pdvb.Acampante a INNER JOIN pdvb.Talleres t ON Id_Taller = t.id");
    if($result->num_rows > 0){
        $i=0;
        while($row = $result->fetch_assoc()){ $i++;
            $rowData = array($row['Fecha_Registro'], $row['Usuario'], $row['Contrasena'], $row['Nombres'], $row['Apellidos'], $row['Edad'], 
                        $row['Sexo'], $row['Pais'], $row['Ciudad'], $row['Codigo_Pais'] . $row['Celular'], $row['Taller'], $row['Nombre_Iglesia'], $row['Color'], $row['Numero_Cuarto']);
            array_walk($rowData, 'filterData');
            $excelData .= implode("\t", array_values($rowData)) . "\n";
        }
    }else{
        $excelData .= 'No hay datos...'. "\n";
    }
    header("Content-Disposition: attachment; filename=\"$fileName\""); 
    header("Content-Type: application/vnd.ms-excel"); 
    echo $excelData; 
    exit;
?>