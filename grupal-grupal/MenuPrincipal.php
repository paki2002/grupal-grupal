<?php

session_start();
if (!(isset($_SESSION['email']))) {
  header('Location: index.php');
    color: $gray-100;
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Menu principal</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/listatareas.png" />

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
      <form action="addTask.php" method="post">
        <input class="form-details" type="text" required maxlength="44" name="taskTitleInput" id="taskTitleInput" placeholder="Nombre de la tarea">
        <input class="form-details" type="date" required name="taskDueInput" id="taskDueInput" onfocus="this.showPicker()" onclick="this.showPicker()">
        <div class="btn-group">
          <input class="form-btn" type="reset" id="resetBtn" value="Borrar">
          <input class="form-btn" type="submit" id="submitBtn" value="Agregar">
        </div>
      </form>

      <div class="hrule"></div>

      <?php

      $email = $_SESSION['email'];

      require_once 'Conexion.php';

      $sql = "SELECT * FROM `tasks` WHERE `email` LIKE '$email'";
      $result = $mysqli->query($sql);

     // si no se encuentran resultados
      if ($result->num_rows == 0) {
        echo "
          
          <div class='task-item'>
            <div class='task-details'>
              <p class='task-title'>Tus tareas se mostrarán aquí.</p>
              <p class='task-due'>Con la fecha correspondiente</p>
            </div>
          </div>

          ";
      }

      // renderizar resultados
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
            <form action='deleteTask.php' method='post'>
              <input type='hidden' name='taskId' value='$taskId'>
              <button class='delete-btn' type='submit'>
                <i class='fa-solid fa-trash fa-lg' style='color: #555555;'></i>
              </button>
            </form>
          </div>

          ";
        }
      }

      $mysqli->close();

      ?>
    </div>
  </div>
  <script src="../Js/logout.js" defer></script>
  <script src="../Js/taskViews.js" defer></script>
  <script src="../Js/deleteTask.js" defer></script>
  <script>
    document.querySelector("#taskTitleInput").focus();
  </script>
</body>

</html>