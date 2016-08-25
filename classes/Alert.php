<?php

//	sistemde olan olayların kullanıcıya bildirilmesine aracılık edecek bir sınıf

class Alert{
	//	 mesaj ekleme
	public static function add($message){
		$_SESSION['alerts'][] = $message;
	}

	//	herhangi bir mesaj var mı diye kontrol etmek
	public static function haveAny(){
		if( ! isset($_SESSION['alerts'])) return false;
		if( gettype($_SESSION['alerts'])!="array" ) return false;
		if( count($_SESSION['alerts']) < 1 ) return false;
		return true;
	}

	//	mesaj varsa bunları alıp döngüye sokabilmek, bir kere alınan mesajın temizlenmesi

	public static function getAlerts(){
		if(! self::haveAny()) return false;
		$messages = $_SESSION['alerts'];
		unset($_SESSION['alerts']);
		return $messages;
	}
}