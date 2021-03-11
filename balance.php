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
						<a class="nav-link dropdown-toggle active" href="mainMenu.php" data-bs-toggle="dropdown" role="button" aria-expanded="false" id="submenu" aria-haspopup="true"> Menu Główne </a>
						
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
			<div class="container mt-5 bg-light col-lg-8 ">
				<header>
					<h1 class="h3 fw-bold">
						Bilans
					</h1> 
				</header>
				
				<button type="button" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#window">
				  Wybierz przedział czasowy
				</button>

				<div class="modal fade" id="window" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="ModalLabel">Wybierz przedział czasowy</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
					  <div class="modal-body">
						  <h5>Wybierz date początkową: </h5>
						  <input id="startDate" type="date" class="form-control" required>
						  <hr>
						  <h5>Wybierz date Końcową: </h5>
						  <input id="endDate" type="date" class="form-control" required>
						</div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
						<button type="button" class="btn btn-success">Pokaż bilans</button>
					  </div>
					</div>
				  </div>
				</div>


				<table class="table mt-3">
				  <thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Kategoria</th>
					  <th scope="col">Data</th>
					  <th scope="col">Kwota</th>
					</tr>
				  </thead>
				  <tbody>
					<tr class="table-success">
					  <th scope="row">1</th>
					  <td>Wynagrodzenie</td>
					  <td>18.01.2021</td>
					  <td>4500,00 zł</td>
					</tr>
					<tr class="table-danger">
					  <th scope="row">2</th>
					  <td>Mandat</td>
					  <td>01.01.2021</td>
					  <td>-400,00 zł</td>
					</tr>
					<tr class="table-danger">
					  <th scope="row">3</th>
					  <td>Zakupy</td>
					  <td>01.01.2021</td>
					  <td>-150,00 zł</td>
					</tr>
					<tr >
					  <th scope="row"></th>
					  <td></td>
					  <td>Suma</td>
					  <td>3900,00 zł</td>
					</tr>
				  </tbody>
				</table>
			</div>
		</section> 
	</main>
	<script src="js/bootstrap.min.js"> </script>
</body>