<?php
include "../config/koneksi.php";

$cek=umenu_akses("?module=identitas",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=identitas'><b>Identitas Website</b></a></li>"; 
}

$cek=umenu_akses("?module=menu",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=menu'><b>Menu Website</b></a></li>";
}


$cek=umenu_akses("?module=halamanstatis",$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){
echo "<li><a href='?module=halamanstatis'><b>Halaman Baru</b></a></li>";
}

?>
