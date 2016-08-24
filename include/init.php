<?php
require_once "connection.php";
require_once "functions.php";
require_once "./vendor/autoload.php";
session_start();
$message = null;
if(isset($_SESSION['message'])){
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}