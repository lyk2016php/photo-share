<?php

//	fotoğraf paylaşım uygulaması
//	ön tanımlı üyeliklerle girilebilecek
//	her üye içeriye kendindeki fotoğrafları yükleyebilecek
//	yüklenen tüm fotoğrafları her üye görüntüleyebilecek

require_once "include/init.php";
redirectIfNotLoggedIn();

$photos = $connection->query("SELECT * FROM medias ORDER BY id DESC")->fetchAll();

include "views/home.php";

?>