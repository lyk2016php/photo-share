<?php

// giriş yapmadıysa girişe yönlendir
function redirectIfNotLoggedIn(){
	if( ! isset($_SESSION['user_id'])) header("Location: login.php");
}


// giriş yaptıysa ana sayfaya yönlendir
function redirectIfLoggedIn(){
	if(isset($_SESSION['user_id'])) header("Location: index.php");
}

// yüklenen dosya bir fotoğraf mı diye bakalım
function isUploadedFileAnImage($uploadedFile, $approvedMimeTypes = ["image/png", "image/jpeg"]){
	if( ! $size = getimagesize($uploadedFile['tmp_name'])) return false;
	if( $size['mime'] !== $uploadedFile['type'] ) return false;
	if( ! in_array($size['mime'], $approvedMimeTypes) ) return false;
	return true;
}


// dd
function dd($any){
	echo "<pre>";
	var_dump($any);
	echo "</pre>";
	die();
}