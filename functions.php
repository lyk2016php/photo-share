<?php

// giriş yapmadıysa girişe yönlendir
function redirectIfNotLoggedIn(){
	if( ! isset($_SESSION['user_id'])) header("Location: login.php");
}


// giriş yaptıysa ana sayfaya yönlendir
function redirectIfLoggedIn(){
	if(isset($_SESSION['user_id'])) header("Location: index.php");
}