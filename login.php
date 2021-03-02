<?php

session_start();

	if(!isset($_POST['login']))
	{
		header("Location: index.php");
		exit();
	}
	else
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		require_once ("database.php");
		
		$queryUser = $db->prepare('SELECT * FROM users WHERE login=:login');
		$queryUser->bindValue(':login',$login, PDO::PARAM_STR);
		$queryUser->execute();
	
		
		$queryForUser = $queryUser->fetch();
		
		if($queryForUser && password_verify($password, $queryForUser['password']))
		{
			$_SESSION['id_user'] = $queryForUser['id_user'];
			$_SESSION['login'] = $queryForUser['login'];
			$_SESSION['password'] = $queryForUser['password'];
			$_SESSION['email'] = $queryForUser['email'];
			header('Location: mainMenu.php');
		}
		else
		{
			$_SESSION['bad_attempt']=true;
			$_SESSION['given_login']=$_POST['login'];
			header('Location: index.php');
		}
		
	}