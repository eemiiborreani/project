

<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
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
      <img src="img/menu.png" class="menu-icon"><a id="femsa">Feemsa</a>
    </div>
  <div class="header">
  	<h2>Registrarse</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>NombreDeUsuario</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Gmail</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group1">
  	  <label>Contraseña</label>
  	  <input type="password" id="password1" name="password_1">
	  <p id="mensaje">La contraseña es <span id="fortaleza"></span></p>
  	</div>
	  <script>
	var contra = document.getElementById("password1");
	var msg = document.getElementById("mensaje");
	var for = document.getElementById("fortaleza");

	contra.addEventListener('input', () => { 
		if(contra.value.length < 0 ){ 
			msg.style.display = "block";
		}
		else{
			msg.style.display = "none";
		}	 
		if(contra.value.length >=4 ){
			for.innerHTML = "debil";
			contra.style.borderColor = "#ff5925";
			msg.style.color= "#ff5925"
		}
		if(contra.value.length >=4 && contra.value.length < 8 ){
			for.innerHTML = "medio";
			contra.style.borderColor = "yellow";
			msg.style.color= "yellow"
		}
			if(contra.value.length >=8 ){
			for.innerHTML = "fuerte";
			contra.style.borderColor = "#26d730";
			msg.style.color= "#26d730"
		}
	})

  </script>

  	<div class="input-group">
  	  <label>Confirmar Contraseña</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Registrar</button>
  	</div>
  	
	  <p id="texto">Eres cliente? <a href="login.php">Iniciar Sesion</a>
  	</p>
	
  </form>

</body>
</html>