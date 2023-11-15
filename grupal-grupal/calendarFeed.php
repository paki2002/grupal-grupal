<?php

session_start();
if (!(isset($_SESSION['email']))) {
  header('Location: index.php');
  exit();
}

$email = $_SESSION['email'];

require_once 'Conexion.php';

$sql = "SELECT * FROM `tasks` WHERE `email` LIKE '$email'";
$result = $mysqli->query($sql);

$tasksJSON = "";

while ($row = $result->fetch_assoc()) {

  $taskId = $row['taskId'];
  $taskTitle = $row['taskTitle'];
  $taskDue = $row['taskDue'];

  $task = new stdClass();
 
  $task->title = $taskTitle;
  $task->start = $taskDue;

  $taskItemObject = json_encode($task);

  $tasksJSON = $tasksJSON . $taskItemObject . ",";
}

echo $tasksJSON;

$mysqli->close();
