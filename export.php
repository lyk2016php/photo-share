<?php

require_once "include/init.php";
redirectIfNotLoggedIn();

//	dışa çıkarılacak görseller
$photos = $connection->query("SELECT * FROM medias ORDER BY id DESC")->fetchAll();

$zipname = 'photo-share-export.zip';
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
foreach ($photos as $photo) {
	$zip->addFile("photos/previews/".$photo['path'], $photo['path']);
}
$zip->close();
header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zipname);
header('Content-Length: ' . filesize($zipname));
readfile($zipname);