<?php
include "../config/koneksi.php";

$cek=umenu_akses("?module=iklanatas",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=iklanatas'><b>Iklan Layanan</b></a></li>";
}

$cek=umenu_akses("?module=iklantengah",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=iklantengah'><b>Iklan Home</b></a></li>";
}

$cek=umenu_akses("?module=pasangiklan",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=pasangiklan'><b>Iklan SideBar</b></a></li>";
}

?>
