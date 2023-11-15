<?php

session_start();
if (isset($_SESSION['email'])) {
  header('Location:MenuPrincipal.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>registro</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/listatareas.png" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600;800&family=Outfit:wght@200;400;600;800&display=swap" rel="stylesheet" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="styles/bootstrap.css" />
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/accounts.css" />
  <link rel="stylesheet" href="styles/signup.css" />
</head>

<body>
  <main>
    <div class="main-container container-fluid">
      <div class="main-row row align-items-center">
        <div class="title-col col-lg-5 order-lg-last">
          <div class="title-wrapper col-lg-12 col-md-8 col-sm-9">
            <h1 class="taskly-title" onclick="window.location.href = 'index.php';">Tareas</h1>
            <p></p>
          </div>
        </div>
        <div class="form-col col-lg-7 row align-items-center">
          <div class="form-wrapper col-lg-7 col-md-8 col-sm-9 order-lg-first">

            <?php
            if (isset($_GET['error'])) {
              $error = urldecode($_GET['error']);
              echo '<div class="alert-box alert alert-danger" role="alert">';
              if ($error == 'contraseña no coincide') {
                echo 'Passwords do not match, try again.';
              } elseif ($error == 'Existe el email') {
                echo 'El correo electrónico ya está en uso, prueba con otro.';
              } else {
                echo 'Algo salió mal, intenta de nuevo.';
              }
              echo '</div>';
            }
            ?>

            <h2>REGISTRATE</h2>
            <p>Rellena los datos del formulario</p>
            <form action="signupAcc.php" method="post">
              <input required type="email" class="form-component form-text" name="email" placeholder="Dirección de correo electrónico" />
              <input required type="password" class="form-component form-text" name="password" placeholder="Contraseña" />
              <input required type="password" class="form-component form-text" name="confirmPassword" placeholder="Confirmar Contraseña" />
              <input type="submit" class="form-component form-btn signup-btn" value="Registrarse" />
            </form>

            <p class="login-prompt">
            ¿Ya tienes una cuenta?
            <a href="index.php">Iniciar Sesion</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>