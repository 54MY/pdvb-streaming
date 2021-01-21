<?php
function popUpWarning($mensaje){
    echo '<script>
    swal({
            title: "Campos obligatorios vacios",
            text: "' .$mensaje. '",
            icon: "warning",
        })
        .then((willDelete) => {
                window.location.href = "index.php";
        });
    </script>';
    exit;
}

function popUpSuccess($title, $mensaje){
    echo '<script>
    swal({
            title: "' . $title. '",
            text: "' .$mensaje. '",
            icon: "success",
        })
        .then((willDelete) => {
                window.location.href = "index.php";
        });
    </script>';
    exit;
}

function popUpEnd($title, $mensaje){
    echo '<script>
    swal({
            title: "' . $title. '",
            text: "' .$mensaje. '",
            icon: "error",
        })
        .then((willDelete) => {
                window.location.href = "index.php";
        });
    </script>';
    exit;
}
?>