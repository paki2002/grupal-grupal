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
  <title>Perfil</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/listatareas.png" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;800&family=Outfit:wght@200;400;600;800&display=swap" rel="stylesheet" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="styles/bootstrap.css">
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/profile.css" />
</head>

<body>
  <nav class="navbar fluid-container">
    <h1 class="nav-brand">Aplicación ToDoList</h1>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="MenuPrincipal.php">Tareas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link logout" href="logout.php">Cerrar Sesion</a>
      </li>
    </ul>
  </nav>
  <main>
    <div class="profile">
      <section class="details">
        <img src="assets/bienvenido.png" class="img-fluid">
        <h2>Bienvenido!!</h2>
        <p><?php echo $_SESSION["email"] ?>!</p>
      </section>
      <section class="reset">
        <h2>¿Restablecer la contraseña?</h2>
        <form action="resetPassword.php" method="post">
          <input required type="password" name="oldPassword" id="oldPassword" placeholder="Contraseña anterior">
          <input required type="password" name="newPassword" id="newPassword" placeholder="Nueva contraseña">
          <input required type="password" name="confPassword" id="confPassword" placeholder="confirmar Contraseña">
          <button type="submit" class="submit-btn">Reiniciar</button>
        </form>
        <!-- Error messages here -->
        <?php
        if (isset($_GET['success'])) {
          echo '<div class="alert-box alert alert-success" role="alert">';
          echo '¡Restablecimiento de contraseña exitoso!';
          echo '</div>';
        }

        // check for errors in GET vars
        if (isset($_GET['error'])) {
          $error = urldecode($_GET['error']);
          if ($error == 'Contraseña antigua incorrecta') {
            echo '<div class="alert-box alert alert-danger" role="alert">';
            echo 'Contraseña antigua incorrecta';
            echo '</div>';
          } else if ($error == 'las contraseñas nuevas y confirmadas no coinciden') {
            echo '<div class="alert-box alert alert-danger" role="alert">';
            echo 'Las contraseñas nueva y confirmada no coinciden';
            echo '</div>';
          } else if ($error == 'update error') {
            echo '<div class="alert-box alert alert-danger" role="alert">';
            echo 'Error al actualizar la base de datos, inténtalo de nuevo.';
            echo '</div>';
          }
        }
        ?>
      </section>
      <section class="delete">
        <h2>¿Borrar cuenta?</h2>
        <form action="deleteAccount.php" method="post">
          <button type="submit" class="submit-btn">Borrar</button>
        </form>
      </section>

      <?php
      if (isset($_GET['error'])) {
        $error = urldecode($_GET['error']);
        if ($error == 'borrar error') {
          echo '<div class="alert-box alert alert-danger" role="alert">';
          echo 'Se produjo un error al eliminar tu cuenta, inténtalo nuevamente más tarde.';
          echo '</div>';
        }
      }
      ?>
    </div>
  </main>

  <script src="../Js/profile.js" defer></script>
  <script src="../Js/logout.js" defer></script>
</body>

</html>