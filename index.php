<?php
require_once "init.php";
redirectIfNotLoggedIn();

$photos = $connection->query("SELECT * FROM medias ORDER BY id DESC")->fetchAll();

//	fotoğraf paylaşım uygulaması
//	ön tanımlı üyeliklerle girilebilecek
//	her üye içeriye kendindeki fotoğrafları yükleyebilecek
//	yüklenen tüm fotoğrafları her üye görüntüleyebilecek
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fotoğraf Paylaşım Alanı</title>
	<style type="text/css">
		.photos>img{
			width: 19%;
		}
	</style>
</head>
<body>
	<a href="logout.php">Çıkış Yap</a>
	<hr>
	<? if(!is_null($message)): ?>
	<p><?=$message?></p>
	<hr>
	<? endif; ?>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="photos[]" accept=".png, .jpg, .jpeg, image/png, image/jpeg" multiple><button type="submit">Fotoğrafları Yükle</button>
	</form>
	<hr>
	<h1>Yüklenen Fotoğraflar</h1>
	<div class="photos">
		<? foreach($photos as $photo): ?>
		<img src="photos/<?=$photo['path']?>">
		<? endforeach; ?>
	</div>
</body>
</html>