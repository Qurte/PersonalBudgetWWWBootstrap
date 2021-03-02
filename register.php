<?php
	session_start();
	
	
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
			<a class="navbar-brand ms-3" href="index.html"> Budżet osobisty </a>
			
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="przełącznik nawigacji">
				<span class="navbar-toggler-icon"> </span>
			</button>
			
			<div class="collapse navbar-collapse" id="mainmenu" >
			
				<div class="navbar-nav me-auto">
					
					<a class="nav-item nav-link" href="index.html"> Start </a>
					<a class="nav-item nav-link" href="aboutUs.html"> O nas </a>
					<a class="nav-item nav-link" href="contact.html"> Kontakt </a>
					<a class="nav-item nav-link active" href="register.html"> Zarejestruj się </a>
					
				</div>
				<form >
					<div class="row g-2 align-items-center">
						<div class="col-auto">
							<input class="form-control " type="text" placeholder="Login" aria-label="wpisz login">
						</div>
						<div class="col-auto">
							<input class="form-control" type="password" placeholder="Hasło" aria-label="wpisz hasło">
						</div>
						<div class="col-auto me-2">
							<button class="btn btn-light" type="submit"> Zaloguj </button>
						</div>
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
				<form action="mainMenu.html">
					<div class="row ">
						<div class="col-12">
							<label for="firstName" class="form-label"> Imie: </label>
							<input id="firstName" type="text" class="form-control" placeholder="Jan" required>
							<div class="invalid-feedback">
								Wpisanie imienia jest wymagane.
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<label for="email" class="form-label"> Email: </label>
							<input id="email" type="email" class="form-control" placeholder="Jan.Kowalski@gmail.com" required>
							<div class="invalid-feedback">
								Wpisanie Emailu jest wymagane.
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<label for="password" class="form-label"> Hasło: </label>
							<input id="password" type="password" class="form-control" placeholder="******" required>
							<div class="invalid-feedback">
								Wpisanie Hasła jest wymagane.
							</div>
						</div>
					</div>
					
					<hr class="my-4">
						
					<button class="col-12 btn btn-success btn-lg btn-block mb-3" type="submit"> Zarejestruj </button>
				</form>
				
			</div>
		</section> 
	</main>
	<script src="js/bootstrap.min.js"> </script>
</body>