<?php
	session_start();
	if(isset($_SESSION['id_user']))
	{
		header('Location: mainMenu.php');
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
					
					<a class="nav-item nav-link active" href="index.php"> Start </a>
					<a class="nav-item nav-link" href="aboutUs.php"> O nas </a>
					<a class="nav-item nav-link" href="contact.php"> Kontakt </a>
					<a class="nav-item nav-link" href="register.php"> Zarejestruj się </a>
					
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
		<article> 
			<div class="container mt-5 bg-light col-12">
				<header>
					<h1 class="h3 fw-bold text-center text-lg-start">
						Tutaj bedzie napisane jak ta strona pomoże zaoszczędzić pieniądze 
					</h1> 
				</header>
				
				<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nisl sem, placerat molestie nisl in, sollicitudin volutpat lorem. Phasellus convallis tempus accumsan. Duis maximus, nisl at tristique maximus, metus ante pellentesque nunc, nec egestas odio felis porttitor metus. Cras ac imperdiet turpis. Vivamus cursus mattis ultricies. Donec at augue massa. Maecenas ornare, arcu ac dictum aliquam, est mauris consectetur sapien, eu eleifend velit elit id leo. Sed suscipit turpis nisi, id egestas odio pharetra vel. Phasellus a nunc dapibus, volutpat sapien nec, mattis magna. Sed sit amet pellentesque nunc, ut tincidunt justo. Phasellus nisi nisi, vestibulum sit amet lacinia ac, pellentesque eu nibh. Ut cursus tellus est, quis faucibus lacus tincidunt quis. Aenean non velit est.</p>

				<p> Maecenas erat sapien, egestas ut mi vitae, interdum posuere mauris. Curabitur rutrum a arcu eget faucibus. Sed eu risus luctus, euismod dui eu, lobortis nisi. Nullam vel turpis id augue varius imperdiet. Quisque consectetur consectetur vulputate. Mauris iaculis blandit dignissim. Nunc leo mi, interdum quis eros id, semper volutpat nibh. Praesent lacus nunc, auctor eu enim vel, imperdiet ullamcorper mauris. Proin id enim est.</p>

				<p> Curabitur id aliquet arcu, pulvinar eleifend tortor. Ut tempor, est quis facilisis imperdiet, arcu nunc scelerisque massa, ut consequat metus justo quis lacus. Duis eget risus ut mi sagittis sollicitudin. Nunc dolor velit, pellentesque pellentesque sapien non, mattis malesuada odio. Sed in leo vel ex eleifend egestas vitae in leo. Morbi pellentesque suscipit orci, vel rutrum velit condimentum vitae. Vivamus viverra turpis sed posuere cursus. Mauris viverra semper tincidunt. Integer viverra varius ex, a mollis diam. In commodo, justo quis faucibus venenatis, odio mauris lobortis nunc, a convallis sem risus at lorem. Nullam lobortis purus nec quam accumsan pharetra at vitae metus. Nunc non ex ac nunc aliquam porta. In quis aliquet felis. Mauris id purus id eros commodo vulputate. Donec purus massa, luctus et interdum nec, auctor a felis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

				<p> Donec semper turpis vitae erat blandit, id lobortis lacus mollis. Donec vel nulla elementum, suscipit mi non, tincidunt nibh. Cras sit amet dapibus magna. Aliquam gravida consectetur sem, non ornare massa faucibus a. Nam est mauris, pretium sit amet pulvinar vel, ornare in libero. Mauris at quam quis purus finibus condimentum eget nec sapien. Suspendisse pharetra turpis quis pulvinar bibendum. Curabitur laoreet tellus et risus laoreet vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum facilisis lorem massa, eget semper ex rhoncus eu. Mauris vitae dolor a neque scelerisque posuere. Phasellus ut ultrices mauris. Etiam tincidunt dui consequat congue sollicitudin. In pharetra ligula sit amet justo tincidunt, ut auctor dui tincidunt. Proin imperdiet ut diam id elementum. Praesent rhoncus faucibus dolor ac vehicula.</p>

				<p> Pellentesque venenatis accumsan urna. Suspendisse eu rhoncus augue, at ullamcorper lectus. Nullam mattis consectetur dolor vitae lacinia. Cras vehicula fermentum enim, eget posuere lacus pellentesque in. Sed urna sem, varius ut sodales quis, faucibus viverra nunc. Nullam commodo nunc a est auctor sodales. Morbi diam elit, gravida ut finibus sed, ultrices vitae felis.</p>
			</div>
		</article> 
	</main>
	<script src="js/bootstrap.min.js"> </script>
</body>