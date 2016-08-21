<?php
require_once "init.php";

redirectIfNotLoggedIn();

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
			height: 200px;
		}
	</style>
</head>
<body>
	<a href="logout.php">Çıkış Yap</a>
	<hr>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="photo"><button type="submit">Fotoğrafı Yükle</button>
	</form>
	<hr>
	<h1>Yüklenen Fotoğraflar</h1>
	<div class="photos">
		<img src="photos/IMG_0989.JPG">
		<img src="photos/IMG_0989.JPG">
		<img src="photos/IMG_0989.JPG">
		<img src="photos/IMG_0989.JPG">
		<img src="photos/IMG_0989.JPG">
	</div>
</body>
</html>