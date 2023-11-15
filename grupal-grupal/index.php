<?php

session_start();
if (isset($_SESSION['email'])) {
  header('Location: MenuPrincipal.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

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
  <link rel="stylesheet" href="styles/login.css" />
</head>

<body>
  <main>
    <div class="blur"></div>
    <div class="main-container container-fluid">
      <div class="main-row row align-items-center">
        
        <div class="form-col col-lg-7 row align-items-center">
          <div class="form-wrapper col-lg-7 col-md-8 col-sm-9">

            <?php
            if (isset($_GET['success'])) {
              $message = urldecode($_GET['success']);
              if ($message == 'account deleted') {
                echo '<div class="alert-box alert alert-success" role="alert">';
                echo '¡Cuenta borrada! ¡Regístrate otro!';
                echo '</div>';
              } else {
                echo '<div class="alert-box alert alert-success" role="alert">';
                echo '¡Cuenta registrada satisfactoriamente!';
                echo '</div>';
              }
            }

            // check for errors in GET vars
            if (isset($_GET['error'])) {
              $error = urldecode($_GET['error']);
              if ($error == 'email does not exist') {
                echo '<div class="alert-box alert alert-danger" role="alert">';
                echo 'La cuenta no existe, créala ahora.';
                echo '</div>';
              } elseif ($error == 'password incorrect') {
                echo '<div class="alert-box alert alert-danger" role="alert">';
                echo 'Credenciales incorrectas, inténtalo de nuevo.';
                echo '</div>';
              }
            }
            ?>

            <h2>Iniciar Sesion</h2>
            <p>Inicie sesión en su cuenta existente</p>
            <form action="loginAcc.php" method="post">
              <input type="email" required class="form-component form-text" name="email" placeholder="Dirección de correo electrónico" />
              <input type="password" required class="form-component form-text" name="password" placeholder="Contraseña" />
              <input type="submit" class="form-component form-btn login-btn" value="Iniciar Sesion" />
            </form>

            <p class="signup-prompt">¿aún no tienes una cuenta?
            <a href="signup.php">Registrarse</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>