<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Eliminar Usuario</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="Estilo.css">
</head>
<body>
<div class="container">
    <div class="navbar">
      <img src="img/logo.png" class="logo"><a id="femsa">Feemsa</a>
      <nav>
        <ul>
		<li><a href="index.php">Home</a></li>
          <li><a href="">Region</a></li>
		  <li><a href="index.php?logout='1'" style="color: white;">Cerrar sesión</a></li> 
        <li><a href="login.php"><img src="img/user.png" class="user"></a></li>
        </ul>
      </nav>
      <img src="img/menu.png" class="menu-icon">
    </div>
  
	<div class="header">
  	<h2>Eliminar Usuario</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>NombreDeUsuario</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Contraseña</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Eliminar</button>
  	</div>
  	<p id="texto">No tienes cuenta? <a href="register.php">Registrate</a>
  	</p>

  </form>
</body>
</html>