<?php

$email = $_POST['email'];
$password = $_POST['password'];

require_once 'Conexion.php';

// comprobar si el correo electrónico existe en la base de datos
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $mysqli->query($sql);

if ($result->num_rows == 0) {
   // El correo electrónico no encontrado
    $error_message = 'email does not exist';
    $mysqli->close();
    header('Location: index.php?error=' . urlencode($error_message));
    exit();
}


$row = $result->fetch_assoc();
$hashedPassword = $row['password'];

if (password_verify($password, $hashedPassword)) {
    //Contraseña correcta
    session_start();
    $_SESSION['email'] = $email;
    $mysqli->close();
    header('Location: MenuPrincipal.php');
    exit();
} else {
    // Contraseña incorrecta
    $error_message = 'contraseña incorrecta';
    $mysqli->close();
    header('Location: index.php?error=' . urlencode($error_message));
    exit();
}
