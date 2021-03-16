<?php
	session_start();
	if(!isset($_SESSION['id_user']))
	{
		header('Location: index.php');
		exit();
	}
	else
	{
		if(isset($_POST['amount']))
		{
			$is_ok = true;
			
			$amount = $_POST['amount'];
			$date = $_POST['date'];
			$category = $_POST['category'];
			$comment = $_POST['comment'];
			$payment_method = $_POST['payment_method'];
			
			
			list($y, $m, $d) = explode('-', $date);
			
			if ($amount < 0)
			{
				$amount = $amount * (-1);
			}
			
			
			
			if(!checkdate($m, $d, $y))
			{
				$is_ok = false;
				$_SESSION['e_date'] = "podana data jest nie poprawna";
			}
			
			if($is_ok)
			{
				
				require_once 'database.php';
				$data = 
				[
					'id_user' => $_SESSION['id_user'],
					'date' => $date,
					'category' => $category,
					'comment' => $comment,
					'amount' => $amount,
					'payment_method' => $payment_method,
				];
				$queryIncome = $db->prepare('INSERT INTO expanse VALUES(NULL,:id_user, :date, :category, :payment_method, :comment, :amount)');
				$queryIncome->execute($data);
				
				$_SESSION['added_expanse']="Wydatek został dodany";
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
			<div class="container mt-5 bg-light col-lg-4 ">
				<header>
					<h1 class="h3 fw-bold text-center">
						Dodaj Wydatek
					</h1> 
				</header>
				<form method="post">
					<div class="row ">
						<div class="col-12">
							<label for="amount" class="form-label mb-0"> Kowota wydatku: </label>
							<input id="amount" type="number" step="0.01" class="form-control" placeholder="-25,00 zł"  name="amount" required>
							
						</div>
						<?php
							if(isset($_SESSION['e_amount']))
							{
								echo '<div class="error">'.$_SESSION['e_amount'].'</div>';
								unset($_SESSION['e_amount']);
							}
						?>
					</div>
					<div class="row">
						<div class="col-12">
							<label for="date" class="form-label mt-2 mb-0"> Data wydatku: </label>
							<input id="date" type="date" class="form-control" name="date" required>
							
						</div>
						<?php
							if(isset($_SESSION['e_date']))
							{
								echo '<div class="error">'.$_SESSION['e_date'].'</div>';
								unset($_SESSION['e_date']);
							}
						?>
					</div>
					<div class="row">
						<div class="col-12">
							<label for="category" class="form-label mt-2 mb-0">Katygoria wydatku:</label>
							<select class="form-select" id="category" name="category">
							  <option selected>Bez kategorii</option>
								<option value="food"> Jedzenie</option>
								<option value="flat" > Mieszkanie </option>
								<option value="transport"> Transport </option>
								<option value="telecommunication"> Telekomunikacja </option>
								<option value="healthcare"> Opieka zdrowotna </option>
								<option value="clothes"> Ubrania </option>
								<option value="hygene"> Higiena </option>
								<option value="kids"> Dzieci </option>
								<option value="entertainment"> Rozrywka </option>
								<option value="trip"> Wycieczka </option>
								<option value="training"> Szkolenia </option>
								<option value="books"> Książki </option>
								<option value="savings"> Oszczędności </option>
								<option value="pension"> Na złotą jesień, czyli emeryturę </option>
								<option value="debts"> Spłata długów </option>
								<option value="donation"> Darowizna </option>
								<option value="other">  Inne wydatki</option>
							</select>
						 </div>
					</div>
					
					<div class="row">
						<div class="col-12">
							<label for="payment_method" class="form-label mt-2 mb-0">Metoda płatności:</label>
							<select class="form-select" id="payment_method" name="payment_method">
							  <option value="cash" selected>Gotówka</option>
								<option value="creditCart"> Karta debetowa</option>
								<option value="debitCard" > Karta kredytowa </option>
							</select>
						</div>
					</div>
										
					<hr class="my-3">
					
					<div>
					  <label for="comment" class="form-label mb-0">Komentarz:</label>
					  <textarea class="form-control" id="comment" name="comment"rows="3"></textarea>
					</div>
					
					<hr class="my-4">
					<button class="col-12 btn btn-success btn-lg btn-block mb-3" type="submit"> Dodaj Wydatek </button>
				</form>
				<?php
					if(isset($_SESSION['added_expanse']))
					{
						echo '<p>'.$_SESSION['added_expanse'].'</p>';
						unset($_SESSION['added_expanse']);
					}
				?>
			</div>
		</section> 
	</main>
	<script src="js/bootstrap.min.js"> </script>
</body>