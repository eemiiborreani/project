<?php
session_start();


$username = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'project');


if (isset($_POST['reg_user'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

 
  if (empty($username)) { array_push($errors, "NombreDeUsuario requerido"); }
  if (empty($email)) { array_push($errors, "Email requerido"); }
  if (empty($password_1)) { array_push($errors, "Contraseña requerido"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Las dos contraseñas no coinciden");
  }

  
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Nombre de usuario ya existe");
    }

    if ($user['email'] === $email) {
      array_push($errors, "El Email ya existe");
    }
  }

  
  if (count($errors) == 0) {
  	$password = md5($password_1);
  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Se a registrado correctamente";
  	header('location: index1.php');
  }
}


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "NombreDeUsuario requerido");
  }
  if (empty($password)) {
  	array_push($errors, "Contraseña requerido");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Se a iniciado sesion correctamente";
      
  	  header('location: index1.php');
  	}else {
  		array_push($errors, "Tu nombre de usuario o contraseña son incorrectas. Inténtalo de nuevo.");
  	}
  }
}

?>