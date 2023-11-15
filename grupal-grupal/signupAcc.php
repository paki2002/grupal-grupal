<?php

$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];


if ($password != $confirmPassword) {
    $error_message = "password no match";
    header("Location: signup.php?error=" . urlencode($error_message));
    exit();
}

require_once 'Conexion.php';

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    
    $error_message = "Existe el email";
    $mysqli->close();
    header("Location: signup.php?error=" . urlencode($error_message));
    exit();
} else {
   
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";
    $result = $mysqli->query($sql);

    if (!$result) {
       
        $error_message = "error de inserción";
        $mysqli->close();
        header("Location: signup.php?error=" . urlencode($error_message));
        exit();
    }
    $mysqli->close();
    header("Location: index.php?success=1");
    exit();
}
