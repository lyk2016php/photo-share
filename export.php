<?php

//	tüm fotoğrafların .zip şeklinde indirilmesini istiyoruz

//	öncelikle kullanıcı girişi var mı bakalım
require_once "include/init.php";
redirectIfNotLoggedIn();

//	hangi dosyaları zipleyip indireceğimizi belirleyelim
$photos = $connection->query("SELECT * FROM medias ORDER BY id DESC")->fetchAll();

//	zip dosyasını oluşturalım

$zipname = 'exports/photoshareexport.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
foreach ($photos as $photo) {
  $zip->addFile("photos/previews/".$photo['path'], $photo['path']);
}
$zip->close();

//	bu talebe oluşturduğumuz zip dosyasının indirilmesi için yanıt verelim
header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zipname);
header('Content-Length: ' . filesize($zipname));
readfile($zipname);


