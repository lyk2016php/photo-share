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
		Alert::add("BAŞARILI: Sisteme giriş yaptınız.");
		redirectIfLoggedIn();
		die();
	}else{
		Alert::add("!!!HATA: Sisteme giriş yapılamadı.");
		redirectIfNotLoggedIn();
		die();
	}

	//	oturum açılırsa index.php'ye yönlendirelim
}


include "views/login.php";

?>