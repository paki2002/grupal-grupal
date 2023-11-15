<?php

session_start();
if (!(isset($_SESSION['email']))) {
  header('Location: index.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu</title>

  <!-- Favicon -->
  <link rel="png" type="image/png" href="assets/listatareas.png" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;800&family=Outfit:wght@200;400;600;800&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/69269c1ba0.js" crossorigin="anonymous"></script>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/tasks.css" />
</head>

<body>
  <div class="grid-container">

    <?php
    require_once "userNavbar.php";
    require_once "taskViews.php";
    ?>

    <div class="tasks-container">
      <div class="today-heading">Hoy</div>
      <div class="hrule"></div>

     <!-- Renderizar tareas para el usuario actual
      FILTRO: HOY -->
      <?php

      $email = $_SESSION['email'];

      require_once 'conexion.php';

      $sql = "SELECT * FROM `tasks` WHERE `email` LIKE '$email' AND `taskDue` = CURDATE();";
      $result = $mysqli->query($sql);

      // si no se encuentran resultados
      if ($result->num_rows == 0) {
        echo "
        <div class='task-item'>
          <div class='task-details'>
            <p class='task-title'>Tus tareas se mostrarán aquí.</p>
            <p class='task-due'>con la fecha correspondiente</p>
          </div>
        </div>
        ";
      }

      // de lo contrario, renderizar resultados
      else {
        while ($row = $result->fetch_assoc()) {
          $taskId = $row['taskId'];
          $taskTitle = $row['taskTitle'];
          $taskDue = $row['taskDue'];
          echo "
          <div class='task-item'>
            <div class='task-details'>
              <p class='task-title'>$taskTitle</p>
              <p class='task-due'>$taskDue</p>
            </div>
          </div>
          ";
        }
      }
      $mysqli->close(); ?>
    </div>
  </div>

  <script src="../Js/logout.js" defer></script>
  <script src="../Js/taskViews.js" defer></script>
</body>

</html>