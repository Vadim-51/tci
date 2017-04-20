<?php
session_start();
$imageWidth = 110;
$imageHeight = 45;
$img = imagecreatetruecolor($imageWidth, $imageHeight);
$white = imagecolorallocate($img, 255, 255, 255);
$grey = imagecolorallocate($img, 210, 210, 210);
imagefill($img, 0, 0, $grey);
function random_string($length){
	$txt = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789';
	$str = '';
	$i = 0;
	while($i<$length){
		$StartPos = rand()%61;
		$nstr = substr($txt, $StartPos, 1);
		$str = $str.$nstr;
		$i++;
	}
	return $str;	
}


//$text = random_string(5);

$_SESSION['captcha'] = random_string(5);




$tb = imagettfbbox(18, 7, '.././font/Oswald-Bold.ttf',  $_SESSION['captcha']);
$x = ($imageWidth - $tb[2])/2;
imagettftext($img, 18, 7, $x, 32, $white, '.././font/Oswald-Bold.ttf', $_SESSION['captcha']);
for($i=0; $i<=rand(2,10); $i++){
	imageline($img, rand(0,$imageWidth), rand(0, $imageHeight), rand(0,$imageWidth)+5, rand(0, $imageHeight)+5, $white);
}



header('Content-type: image/png');
imagepng($img);
imagedestroy();

?>