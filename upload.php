<?php
require_once "init.php";
redirectIfNotLoggedIn();

//	formdan photo isimli alandan dosya geldi mi bakalım
if(isset($_FILES['photo'])){
	//	dosya geldiyse bir fotoğraf olduğundan emin olalım
	if(isUploadedFileAnImage($_FILES['photo'])){
		//	fotoğraf ise, yeni bir isim verelim, "photos/" dizinimize kaydedelim
		$uploadPath = "photos";

		$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
		$newName = uniqid() . "." . $extension;

		$destination = $uploadPath . "/" . $newName;

		$isUploaded = move_uploaded_file($_FILES['photo']['tmp_name'], $destination);
		//	eğer kendi dizinimize kaydetme başarılı olursa, yeni ismini ve bu ekleme işlemini yapan kullanıcının bilgilerini, eklenme tarihi ile birlikte veritabanına yazalım

		if($isUploaded){
			//	 ekleme sorgumuzu oluşturup parametrelerimizi gönderelim
			$add = $connection->prepare("INSERT INTO medias (user_id, path, uploaded_at) VALUES (?, ?, ?)");
			$isAdded = $add->execute([$_SESSION['user_id'], $newName, date("Y-m-d H:i:s")]);

			if($isAdded){
				$_SESSION['message'] = "BAŞARILI: Dosya yüklendi ve kaydedildi.";
			}else{
				$_SESSION['message'] = "!!!HATA: Dosya yüklendi ancak veritabanına kaydedilemedi.";
			}
		}else{
			$_SESSION['message'] = "!!!HATA: Dosya yüklenemedi.";
		}
	}else{
		$_SESSION['message'] = "!!!HATA: Dosya bir fotoğraf olmak zorundadır.";
	}
}else{
	$_SESSION['message'] = "!!!HATA: upload.php sayfasına bir dosya göndermeniz gerekmektedir.";
}
header("Location: index.php");