<?php
require_once "init.php";

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
		$_SESSION['message'] = "BAŞARILI: Sisteme giriş yaptınız.";
		redirectIfLoggedIn();
	}else{
		$_SESSION['message'] = "!!!HATA: Sisteme giriş yapılamadı.";
		redirectIfNotLoggedIn();
	}

	//	oturum açılırsa index.php'ye yönlendirelim
}




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Giriş Yap</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<? if(!is_null($message)): ?>
	<p><?=$message?></p>
	<hr>
	<? endif; ?>
	<form action="login.php" method="post">
		<input type="email" name="email" placeholder="E-Posta Adresiniz">
		<br>
		<input type="password" name="password" placeholder="Parolanız">
		<br>
		<button type="submit">Giriş Yap</button>
	</form>
</body>
</html>