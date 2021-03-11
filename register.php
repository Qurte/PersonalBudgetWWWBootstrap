<?php
	session_start();
	if(isset($_POST['login']))
	{
		require_once 'database.php';
		$is_ok = true;
		
		$login = $_POST['login'];
		
		if((strlen($login)<3) || (strlen($login)>20))
		{
			$is_ok = false;
			$_SESSION['e_login'] = "Login musi posiadać od 3 do 20 znaków!";
		}
		if(ctype_alnum($login) == false)
		{
			$is_ok = false;
			$_SESSION['e_login']="Login musi składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		else
		{
			$queryLogin = $db->prepare('SELECT login FROM users WHERE login=:login');
			$queryLogin->bindValue(':login',$login,PDO::PARAM_STR);
			$queryLogin->execute();
			
			$queryForLogin = $queryLogin->fetch();
			
			if($queryForLogin)
			{
				$is_ok = false;
				$_SESSION['e_login'] = "Taki login już istnieje";
			}
		}
		
		$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	
		if(empty($email))
		{
			$is_ok = false;
			$_SESSION['e_email']="Wpisz poprawny adres email";
		}
		else
		{
			$queryEmail= $db->prepare('SELECT email FROM users WHERE email=:email');
			$queryEmail->bindValue(':email',$email,PDO::PARAM_STR);
			$queryEmail->execute();
			
			$queryForEmail = $queryEmail->fetch();
			
			if($queryForEmail)
			{
				$is_ok = false;
				$_SESSION['e_email']="taki email już istnieje";
			}
		}
		$password = $_POST['password'];
		
		if(strlen($password)<8)
		{
			$is_ok = false;
			$_SESSION['e_password']="Hasło musi składać się z conajmniej 8 znaków";
		}
		
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		
		if($is_ok==true)
		{
			if($db->query("INSERT INTO users VALUES(NULL,'$login','$password_hash','$email')"))
			{
				header('Location: welcome.php');
			}
			else
			{
				throw new Exception ($db->error);
			}
		}
	}
	
?>
<!DOCTYPE HTML>
<html lang="pl"> 
<head> 
	<meta charset="utf-8" />
	<meta http-equiv ="X-UA-Compatible" content="IE=edge" />
	
	<title> Budżet Osobisty </title>
	
	<meta name = "description" content="Zadbaj o swoje finanse" /> 
	<meta name = "keywords" content = "finanse, oszczędzanie, pieniądze, zadbaj o swoje finanse," />
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="style.css" rel="stylesheet" type="text/css" /> 
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
	
	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->

</head>
<body>
	
	<header>
		
		<nav class="navbar navbar-dark bg-success navbar-expand-lg">
			<a class="navbar-brand ms-3" href="index.php"> Budżet osobisty </a>
			
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="przełącznik nawigacji">
				<span class="navbar-toggler-icon"> </span>
			</button>
			
			<div class="collapse navbar-collapse" id="mainmenu" >
			
				<div class="navbar-nav me-auto">
					
					<a class="nav-item nav-link" href="index.php"> Start </a>
					<a class="nav-item nav-link" href="aboutUs.php"> O nas </a>
					<a class="nav-item nav-link" href="contact.php"> Kontakt </a>
					<a class="nav-item nav-link active" href="register.php"> Zarejestruj się </a>
					
				</div>
				<form method="post" action="login.php">
					<div class="row g-2 align-items-center">
						<div class="col-auto">
							<input class="form-control " type="text" placeholder="Login" aria-label="wpisz login" name="login" <?= isset($_SESSION['given_login'])? 'value="'.$_SESSION['given_login'].'"' : ''?>>
						</div>
						<div class="col-auto">
							<input class="form-control" type="password" placeholder="Hasło" aria-label="wpisz hasło" name="password">
						</div>
						<div class="col-auto me-2">
							<button class="btn btn-light" type="submit"> Zaloguj </button>
						</div>
						<?php
							if(isset($_SESSION['bad_attempt']))
								echo '<div class="col-auto me-2"> <p style="color:#c00005">Niepoprawny login lub hasło! </p> </div>';
							unset($_SESSION['bad_attempt']);
						?>
					</div>
				</form>
				
			</div>
			
		</nav>
	
	
	</header>
	<main> 
		<section> 
			<div class="container mt-5 bg-light col-md-4 ">
				<header>
					<h1 class="h3 fw-bold text-center text-lg-start">
						Zarejestruj się:
					</h1> 
				</header>
				
				<form method="post">
					<div class="row ">
						<div class="col-12">
							<label for="login" class="form-label"> Login: </label>
							<input id="login" type="text" class="form-control" placeholder="Jan123" name="login" required>
							<div class="invalid-feedback">
								Wpisanie imienia jest wymagane.
							</div>
						</div>
						<?php 
							if(isset($_SESSION['e_login']))
							{
								echo '<div class="error">'.$_SESSION["e_login"].' </div>';
								unset($_SESSION['e_login']);
							}
						?>
					</div>
					<div class="row">
						<div class="col-12">
							<label for="email" class="form-label"> Email: </label>
							<input id="email" type="email" class="form-control" placeholder="Jan.Kowalski@gmail.com" name="email" required>
							<div class="invalid-feedback">
								Wpisanie Emailu jest wymagane.
							</div>
						</div>
						<?php 
							if(isset($_SESSION['e_email']))
							{
								echo '<div class="error">'.$_SESSION["e_email"].' </div>';
								unset($_SESSION['e_email']);
							}
						?>
					</div>
					<div class="row">
						<div class="col-12">
							<label for="password" class="form-label"> Hasło: </label>
							<input id="password" type="password" class="form-control" placeholder="******" name="password" required>
							<div class="invalid-feedback">
								Wpisanie Hasła jest wymagane.
							</div>
						</div>
						<?php 
							if(isset($_SESSION['e_password']))
							{
								echo '<div class="error">'.$_SESSION["e_password"].' </div>';
								unset($_SESSION['e_password']);
							}
						?>
					</div>
					
					<hr class="my-4">
						
					<button class="col-12 btn btn-success btn-lg btn-block mb-3" type="submit"> Zarejestruj </button>
				</form>
				
			</div>
		</section> 
	</main>
	<script src="js/bootstrap.min.js"> </script>
</body>