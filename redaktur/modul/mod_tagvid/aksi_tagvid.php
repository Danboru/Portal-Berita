<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus tagvid
if ($module=='tagvid' AND $act=='hapus'){
  mysql_query("DELETE FROM tagvid WHERE id_tag='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input tagvid
elseif ($module=='tagvid' AND $act=='input'){
  $tag_seo = seo_title($_POST['nama_tag']);
  mysql_query("INSERT INTO tagvid(nama_tag,username,tag_seo) VALUES('$_POST[nama_tag]','$_SESSION[namauser]',
'$tag_seo')");
  header('location:../../media.php?module='.$module);
}

// Update tagvid
elseif ($module=='tagvid' AND $act=='update'){
  $tag_seo = seo_title($_POST['nama_tag']);
  mysql_query("UPDATE tagvid SET nama_tag = '$_POST[nama_tag]', tag_seo='$tag_seo' WHERE id_tag = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
