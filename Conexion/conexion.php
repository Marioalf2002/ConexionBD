<?php
    include "config.php";

    $sql = mysqli_connect(SERVIDOR, USUARIO, PASSWORD, BD);

    if (!$sql) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    echo "Éxito: Se realizó una conexión apropiada a MySQL! con base de datos ".BD." " . PHP_EOL . "<br/>";
    echo "Información del host: " . mysqli_get_host_info($sql) . PHP_EOL;

    //mysqli_close($sql);
?>