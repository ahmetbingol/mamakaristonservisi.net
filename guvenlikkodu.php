<?php
	session_start();
	$parola = substr(md5(rand(0,999999999999)), -6);
	if($parola){
		$_SESSION["guvenlikkodu"] = $parola;
		$uzunluk = 100;
		$yukseklik = 30;
		$gorsel = ImageCreate($uzunluk, $yukseklik);
		$renk = ImageColorAllocate($gorsel, 255, 255, 255);
		$rand = ImageColorAllocate($gorsel, rand(0,255), rand(0,255), rand(0,255));
		ImageFill($gorsel, 0, 0, $rand);
		ImageString($gorsel, 5, 24, 7, $_SESSION["guvenlikkodu"], $renk);
		ImageLine($gorsel, 100, 19, 0, 19, $renk);
		header("Content,type:image/png");
		ImagePng($gorsel);
		ImageDestroy($gorsel);
	}
?>