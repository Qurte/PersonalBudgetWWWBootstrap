<?php
	session_start();
	if(isset($_SESSION['e_login'])) unset($_SESSION['e_login']);
	if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if(isset($_SESSION['e_password'])) unset($_SESSION['e_password']);
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
						Rejestracja udana!
					</h1> 
				</header>
				<p>Możesz już zalogować się na swoje konto </p>
			</div>
		</section> 
	</main>
	<script src="js/bootstrap.min.js"> </script>
</body>