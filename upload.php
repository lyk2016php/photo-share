<?php
require_once "include/init.php";
redirectIfNotLoggedIn();

//	formdan photo isimli alandan dosya geldi mi bakalım
if(isset($_FILES['photos'])){

// gelen dosyaları döngüye sokup işlem yapmaya çalışalım

	for ($i=0; $i < count($_FILES['photos']['name']); $i++) { 
		# code...
		//	dosya geldiyse bir fotoğraf olduğundan emin olalım
		if(isUploadedFileAnImage($_FILES['photos']['tmp_name'][$i])){
		//	fotoğraf ise, yeni bir isim verelim, "photos/" dizinimize kaydedelim
			$uploadPath = "photos";

			$extension = pathinfo($_FILES['photos']['name'][$i], PATHINFO_EXTENSION);
			$newName = uniqid() . $i . "." . $extension;

			$destination = $uploadPath . "/" . $newName;

			$isUploaded = move_uploaded_file($_FILES['photos']['tmp_name'][$i], $destination);
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
	}
}else{
	$_SESSION['message'] = "!!!HATA: upload.php sayfasına bir dosya göndermeniz gerekmektedir.";
}
header("Location: index.php");