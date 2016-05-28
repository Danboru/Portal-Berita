<?php
session_start();
header("Content-type: image/png");

$captcha_image = imagecreatefrompng("captcha.png");
$captcha_font = imageloadfont("uksw.gdf");
$captcha_text = substr(md5(uniqid('')),-6,6);

$_SESSION['captcha_session'] = $captcha_text;

$captcha_color = imagecolorallocate($captcha_image,255,255,255);
imagestring($captcha_image,$captcha_font,5,5,$captcha_text,$captcha_color);
imagepng($captcha_image);
imagedestroy($captcha_image);
?>
