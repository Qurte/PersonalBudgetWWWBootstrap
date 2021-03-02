<?php
	session_start();
	if(!isset($_SESSION['id_user']))
	{
		header('Location: index.php');
		exit();
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
					<div class="nav-item dropdown">
						<a class="nav-link dropdown-toggle active" href="mainMenu.html" data-bs-toggle="dropdown" role="button" aria-expanded="false" id="submenu" aria-haspopup="true"> Menu Główne </a>
						
							<div class="dropdown-menu mt-2" aria-labelledby="submenu">
								
								<a class="dropdown-item" href="addIncome.php"> Dodaj przychód </a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="addExpense.php"> Dodaj wydatek </a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="balance.php"> Pokaż bilans </a>
								
							</div>
					</div>
					<a class="nav-item nav-link" href="aboutUs.php"> O nas </a>
					<a class="nav-item nav-link" href="contact.php"> Kontakt </a>
					<a class="nav-item nav-link" href="logout.php"> Wyloguj </a>
					
				</div>
				
			</div>
			
		</nav>
	
	
	</header>
	<main> 
		<section> 
			<div class="container mt-5 bg-light col-lg-4 ">
				<header>
					<h1 class="h3 fw-bold text-center">
						Dodaj Przychód
					</h1> 
				</header>
				<form action="mainMenu.html">
					<div class="row ">
						<div class="col-12">
							<label for="amount" class="form-label mb-0"> Kowota przychodu: </label>
							<input id="amount" type="number" step="0.01" class="form-control" placeholder="25,00 zł" required>
							<div class="invalid-feedback">
								Kwota jest wymagane.
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<label for="date" class="form-label mt-2 mb-0"> Data przychodu: </label>
							<input id="date" type="date" class="form-control" required>
							<div class="invalid-feedback">
								Wpisanie daty jest wymagane.
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<label for="category" class="form-label mt-2 mb-0">Katygoria przychodu:</label>
							<select class="form-select" id="category">
							  <option selected>Bez kategorii</option>
							  <option value="salary">Wynagrodzenie</option>
							  <option value="bankInterest">Odsteki Bankowe</option>
							  <option value="allegro">Sprzedaż na allegro</option>
							  <option value="other">inne</option>
							</select>
						 </div>
					</div>
					
					<hr class="my-3">
					
					<div>
					  <label for="comment" class="form-label mb-0">Komentarz:</label>
					  <textarea class="form-control" id="comment" rows="3"></textarea>
					</div>
					
					<hr class="my-4">
					<button class="col-12 btn btn-success btn-lg btn-block mb-3" type="submit"> Dodaj Przychód </button>
				</form>
				
			</div>
		</section> 
	</main>
	<script src="js/bootstrap.min.js"> </script>
</body>