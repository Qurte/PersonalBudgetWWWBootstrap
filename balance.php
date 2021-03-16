<?php
	session_start();
	if(!isset($_SESSION['id_user']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		require_once "database.php";
		$sumIncome = 0;
		$sumExpanse = 0;
		$userId = $_SESSION["id_user"];
		
		if(isset($_POST['firstDate']))
		{
			$starting_date = $_POST['firstDate'];
			$end_date = $_POST['secendDate'];

			
			$incomeQuery = $db -> query("SELECT *  FROM income WHERE id_user= '$userId' AND date BETWEEN '$starting_date' AND '$end_date' ORDER BY date DESC");
			$incomes = $incomeQuery->fetchAll();
			
			$expanseQuery = $db -> query("SELECT category, date, amount FROM expanse WHERE id_user='$userId' AND date BETWEEN '$starting_date' AND '$end_date' ORDER BY date DESC");
			$expanses = $expanseQuery->fetchAll();
			
		}
		else
		{
			
			$incomeQuery = $db -> query("SELECT *  FROM income WHERE id_user= '$userId' ORDER BY date DESC");
			$incomes = $incomeQuery->fetchAll();
			
			$expanseQuery = $db -> query("SELECT category, date, amount FROM expanse WHERE id_user='$userId' ORDER BY date DESC");
			$expanses = $expanseQuery->fetchAll();
			
			
			
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
				
				<form method="post">
					<div class="modal fade" id="window" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="ModalLabel">Wybierz przedział czasowy</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									
								  <h5>Wybierz date początkową: </h5>
								  <input id="startDate" type="date" name="firstDate" class="form-control" required>
								  <hr>
								  <h5>Wybierz date Końcową: </h5>
								  <input id="endDate" type="date" name="secendDate" class="form-control" required>
									
								</div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
								<button type="submit" class="btn btn-success">Pokaż bilans</button>
							  </div>
							</div>
						</div>
					</div>
				</form>
				
				<table class="table">
					<tr >
					  <td> Przychody: </td>
					  <td></td>
					  <td></td>
					</tr>
				</table>
				<table class="table">
					
				  <thead>
					<tr>
					  <th scope="col">Kategoria</th>
					  <th scope="col">Data</th>
					  <th scope="col">Kwota</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
						foreach($incomes as $income)
						{
							echo "<tr class='table-success'> <td>{$income['category']}</td>
								<td>{$income['date']} </td>
								<td>{$income['amount']} </td> </tr>";
							$sumIncome += $income['amount'];
						}
					
					?>
					<tr >
					  <td> </td>
					  <td>Suma:</td>
					  <td><?php echo $sumIncome ?></td>
					</tr>
					<tr >
					  <td> Wydatki: </td>
					  <td></td>
					  <td></td>
					</tr>
					
				  </tbody>
				  
				
				
				
				  <thead>
					<tr>
					  <th scope="col" >Kategoria</th>
					  <th scope="col">Data</th>
					  <th scope="col">Kwota</th>
					</tr>
				  </thead>
				  <tbody>
					<?php
						foreach($expanses as $expanse)
						{
							echo "<tr class='table-danger'> <td>{$expanse['category']}</td>
								<td>{$expanse['date']} </td>
								<td>{$expanse['amount']} </td> </tr>";
							$sumExpanse += $expanse['amount'];
						}
					
					?>
					<tr >
					  <td> </td>
					  <td>Suma:</td>
					  <td><?php echo $sumExpanse ?></td>
					</tr>
					
					
				  </tbody>
				
					<thead> 
						<tr>
							<th scope="col"> Stan portfela: </th>
							<th scope="col"><?php 
							$sum = $sumIncome+$sumExpanse;
							echo $sum?> zł</th>
							
							
						</tr>
					</thead>
				</table>
			</div>
		</section> 
	</main>
	<script src="js/bootstrap.min.js"> </script>
</body>