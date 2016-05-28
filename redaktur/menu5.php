<?php
include "../config/koneksi.php";

$cek=umenu_akses("?module=logo",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){ 
echo "<li><a href='?module=logo'><b>Logo Website</b></a></li>";
}

$cek=umenu_akses("?module=templates",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=templates'><b>Template Website</b></a></li>";
}

$cek=umenu_akses("?module=background",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=background'><b>Background Website</b></a></li>";}

$cek=umenu_akses("?module=agenda",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=agenda'><b>Agenda</b></a></li>";
}

$cek=umenu_akses("?module=poling",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=poling'><b>Jajak Pendapat</b></a></li>";
}

$cek=umenu_akses("?module=hubungi",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=hubungi'><b>Pesan Masuk</b></a></li>";
}

?>
