<?php
session_start();
if (!(isset($_SESSION['email']))) {
    header('Location: index.php');
    exit();
}

$email = $_SESSION['email'];
$taskTitle = $_POST['taskTitleInput'];
$taskDue = $_POST['taskDueInput'];

require_once 'conexion.php';

$sql =  "INSERT INTO `tasks` (`email`, `taskTitle`, `taskDue`) 
        VALUES ('$email', '$taskTitle', '$taskDue');";
$result = $mysqli->query($sql);

if (!$result) {
    $error_message = "insert error";
    $mysqli->close();
    header("Location: MenuPrincipal.php?error=" . urlencode($error_message));
    exit();
} else {
    $mysqli->close();
    header("Location: MenuPrincipal.php?success=1");
    exit();
}
