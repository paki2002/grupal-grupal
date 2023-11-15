<?php

session_start();

$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confPassword = $_POST['confPassword'];
$email = $_SESSION['email'];

require_once 'Conexion.php';

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();
$hashedPassword = $row['password'];

if (!password_verify($oldPassword, $hashedPassword)) {
  // old password incorrect
  $error_message = 'old password incorrect';
  $mysqli->close();
  header('Location: profile.php?error=' . urlencode($error_message));
  exit();
}

if ($newPassword != $confPassword) {
  // new password and confirm password do not match
  $error_message = 'new and confirm passwords do not match';
  $mysqli->close();
  header('Location: profile.php?error=' . urlencode($error_message));
  exit();
}

$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
$sql = "UPDATE `users` SET `password` = '$hashedPassword' WHERE `users`.`email` = '$email'";
$result = $mysqli->query($sql);

if (!$result) {
  // error updating database
  $error_message = "update error";
  $mysqli->close();
  header("Location: profile.php?error=" . urlencode($error_message));
  exit();
}

// close and redirect
$mysqli->close();
header("Location: profile.php?success=1");
exit();
