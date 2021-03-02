<?php
session_start();

unset($_SESSION['id_user']);
unset($_SESSION['login']);
unset($_SESSION['password']);
unset($_SESSION['email']);

header('Location: index.php');