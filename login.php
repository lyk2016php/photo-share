<?php
require_once "include/init.php";

//	kullanıcı zaten giriş yaptıysa ana sayfaya yönlendirelim
redirectIfLoggedIn();


//	post ile eposta ve parola geldiyse yakalayalım

if(isset($_POST['email']) && isset($_POST['password'])){
	//	bu eposta ve parolayla eşleşen bir kullanıcı varsa, girişi geçerli sayıp oturum açalım
	$checkUserQuery = $connection->prepare("SELECT * FROM users WHERE email = :inputEmail AND password = MD5(:inputPassword)");

	$checkUserQuery->execute(
		array(
			'inputEmail' => $_POST['email'], 
			'inputPassword' => $_POST['password']
			)
		);

	$user = $checkUserQuery->fetch(MYSQL_ASSOC);

	if($user){
		$_SESSION['user_id'] = $user->id;
		$_SESSION['message'][] = "1BAŞARILI: Sisteme giriş yaptınız.";
		$_SESSION['message'][] = "2BAŞARILI: Sisteme giriş yaptınız.";
		$_SESSION['message'][] = "3BAŞARILI: Sisteme giriş yaptınız.";
		redirectIfLoggedIn();
	}else{
		$_SESSION['message'][] = "!!!HATA: Sisteme giriş yapılamadı.";
		redirectIfNotLoggedIn();
	}

	//	oturum açılırsa index.php'ye yönlendirelim
}


include "views/login.php";

?>