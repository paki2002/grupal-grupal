<?php


session_start();
if (!(isset($_SESSION['email']))) {
    header('Location: index.php');
    exit();
}


// envío del formulario recibido de MenuPrincipal.php
$taskId = $_POST['taskId'];

require_once 'Conexion.php';

// eliminar la tarea de la base de datos
$sql = "DELETE FROM tasks WHERE `tasks`.`taskId` = $taskId";
$result = $mysqli->query($sql);

// comprobar si la consulta fue exitosa
if (!$result) {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
header('Location: MenuPrincipal.php');
exit();
