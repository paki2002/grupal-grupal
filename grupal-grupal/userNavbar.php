<nav class="navbar">
  <h1 class="nav-brand">Aplicación ToDoList</h1>
  <ul class="navbar-nav">
    <ul>
        <p><?php echo $_SESSION["email"] ?></p>
    </ul>
    <li class="nav-item">
      <a class="nav-link" href="profile.php">Perfil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link logout" href="logout.php">Cerrar sesión</a>
    </li>
  </ul>
</nav>