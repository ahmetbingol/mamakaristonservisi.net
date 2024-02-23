<!DOCTYPE php>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>ANKARA BOSH SERVİSi - 0312 666 7066</title>
	<link rel="stylesheet" href="css/reset.css" />
	<link rel="stylesheet" href="css/style.css" />
	<meta name=viewport content="width=device-width, initial-scale=1">
</head>
<body>
	<header id="header">
		<div class="logo">
			<a href="/"><img width="300" height="90" src="images/logo.png" alt="logo" /></a>
		</div>
		<div class="header-contact">
			<img src="images/tel.png" alt="Bosch" />
		</div>
	</header>
	
	<nav id="nav">
		<ul>
			<li><a href="index.php">Anasayfa</a></li>
			<li><a href="hakkimizda.php">Hakkımızda</a></li>
			<li><a href="servis-talep.php">Servis Taleb</a></li>
			<li><a href="iletisim.php">İletişim</a></li>
		</ul>
	</nav>
	
	<div class="clear"></div>
	
	<div id="slider1_container">
			<!-- Slides Container -->
			<div u="slides" id="slider2_container" >
				<div><img  u="image" src="images/1.png" /></div>
				<div><img  u="image" src="images/2.png" /></div>
				<div><img  u="image" src="images/3.png" /></div>
				<div><img  u="image" src="images/4.png" /></div>
			</div>
				<style>
					/*
					.jssorb01 div           (normal)
					.jssorb01 div:hover     (normal mouseover)
					.jssorb01 .av           (active)
					.jssorb01 .av:hover     (active mouseover)
					.jssorb01 .dn           (mousedown)
					*/
					.jssorb01 div, .jssorb01 div:hover, .jssorb01 .av
					{
						filter: alpha(opacity=70);
						opacity: .7;
						overflow:hidden;
						cursor: pointer;
						border: #000 1px solid;
					}
					.jssorb01 div { background-color: gray; }
					.jssorb01 div:hover, .jssorb01 .av:hover { background-color:black; }
					.jssorb01 .av { background-color: #fff; }
					.jssorb01 .dn, .jssorb01 .dn:hover { background-color: #000; }
				</style>
				<!-- bullet navigator container -->
				<div u="navigator" class="jssorb01" style="position: absolute; top: 320px; right: 10px;">
					<!-- bullet navigator item prototype -->
					<div u="prototype" style="POSITION: absolute; WIDTH: 18px; HEIGHT: 18px;"></div>
				</div>
				<script>
					jssor_slider1_starter('slider1_container');
				</script> 
			</div> 
			<!-- Jssor Slider End -->
			<!-- Navigator Skin End -->
	
	<div class="clear"></div>
	
	<article id="article">
		<div class="article-baslik">
			<h1>Servis Taleb</h1>
		</div>

		<div class="servistalep">
			<?php
			if( @$_POST ){

				$adsoyad = strip_tags($_POST['adsoyad']);
				$cihaz = strip_tags($_POST['cihaz']);
				$model = strip_tags($_POST['model']);
				$telefon = strip_tags($_POST['tel']);
				$adres = strip_tags( $_POST['adres']);
				$aciklama = strip_tags($_POST['aciklama']);

				if( !$adsoyad || !$cihaz || !$model || !$telefon || !$adres){
					echo 'Boş alan bırakamazsınız!';
				}else{
					require_once  "class.phpmailer.php";
					$mail = new PHPMailer();
					$mail->IsSMTP();    
					$mail->Host     = "mx1.hostinger.web.tr";
					$mail->SMTPAuth = true; 
					$mail->Username = "info@keciorenaristonservisi.com";
					$mail->Password = "20068080";

					$mail->From     = "info@keciorenaristonservisi.com";
					$mail->Fromname = $adsoyad;
					$mail->AddAddress("info@keciorenaristonservisi.com", $cihaz);
					$mail->Subject  =  $adsoyad.' - '.$cihaz;
					$mail->CharSet = 'UTF-8';
					$mail->Body = "Ad-Soyad: $adsoyad\nCihaz: $cihaz\nModel: $model\nAdres: $adres\nAciklama : $aciklama";

					if(!$mail->Send()){
					   echo "Mesaj Gönderilemedi <p>";
					   echo "Mailer Error: " . $mail->ErrorInfo;
					}else{
					echo "Mesajınız başarıyla iletildi \n en kısa sürede dönüş yapılacaktır....";
					}
				}

			}

			
			?>

			<form action="" method="post">
				<fieldset>
				<legend>İletişim Formu</legend>
					<table>
						<tr>
							<td>Adınız Soyadınız*</td>
							<td>:</td>
							<td><input type="text" name="adsoyad"/></td>
						</tr>
						<tr>
							<td>Cihaz*</td>
							<td>:</td>
							<td>
								<select name="cihaz">
								<option value="0" disabled>Lütfen Seçiniz*</option>
									<option value="Çamaşır Makinası">Çamaşır Makinası</option>
									<option value="Buzdolabı">Buzdolabı</option>
									<option value="Bulaşık Makinası">Bulaşık Makinası</option>
									<option value="Kombi">Kombi</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Model</td>
							<td>:</td>
							<td><input type="text" name="model"/></td>
						</tr>
						<tr>
							<td>Telefon*</td>
							<td>:</td>
							<td><input type="text" name="tel"/></td>
						</tr>
						<tr>
							<td>Adres*</td>
							<td>:</td>
							<td><textarea name="adres" cols="30" rows="10" ></textarea></td>
						</tr>
						<tr>
							<td>Açıklama</td>
							<td>:</td>
							<td><textarea name="aciklama" cols="30" rows="10"></textarea></td>
						</tr>
						
						<tr>
							<td></td>
							<td></td>
							<td><button type="submit">Servis Talebinde Bulun</button></td>
						</tr>
					</table>
				</fieldset>
			</form>
		</div>
		<div class="sag">
			<img src="images/tel.png" alt="" />
			<a href="servis-talep.php"><button>Servis Talebi Oluştur</button></a>
		</div>
	</article>
	
	<div class="clear"></div>
	
	<footer id="footer">
		<ul>
			<li><a href="index.php">Anasayfa</a></li>
			<li><a href="hakkimizda.php">Hakkımızda</a></li>
			<li><a href="servis-talep.php">Servis Taleb</a></li>
			<li><a href="iletisim.php">İletişim</a></li>
		</ul>
		<p>&copy; Copyright 2014 Bosch Servis <span>|</span> <strong>Design by<a href="http://www.siyahok.com/" rel="publisher">Siyah Ok</a></strong></p>
	</footer>
	
</body>
</html>


<script src="js/jquery.min.js"></script>
<script src="js/jssor.slider.mini.js"></script>
<script>
    jQuery(document).ready(function ($) {
        var options = {
            $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $ChanceToShow: 2
            }
        };
        var jssor_slider1 = new $JssorSlider$('slider1_container', options);
    });
</script>

<script>
jssor_slider1_starter = function (containerId) {
    var jssor_slider1 = new $JssorSlider$(containerId, {
        ...
        $BulletNavigatorOptions: {
            ...
            //[Optional] Auto center navigator in parent container
            //, 0 None, 1 Horizontal, 2 Vertical, 3 Both
            $AutoCenter: 1,
            ...
        }
    });
};
</script>