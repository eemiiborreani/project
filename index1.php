


<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Debes iniciar sesión primero";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
	<h2>Home</h2>
</div>
<div class="content">
  	
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p id="texto">Bienvenido <strong><?php echo $_SESSION['username']; ?></strong></a></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">Cerrar sesión</a> </p>
    <?php endif ?>
	<a href="index.php"><button type="submit" class="btn" name="reg_user">volver al inicio</button></a>
</div>

</body>
</html>