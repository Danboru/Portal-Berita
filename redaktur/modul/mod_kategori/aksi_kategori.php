<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){

  echo "<link href='../../css/zalstyle.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../../favicon.png' />
  
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  <img src='../../img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  </section>
  <section id='error-text'>
  <p><a class='button' href='../../index.php'> <b>LOGIN DI SINI</b> </a></p>
  </section>
  </div>";}
  
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Kategori
if ($module=='kategori' AND $act=='hapus'){
  mysql_query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input kategori
elseif ($module=='kategori' AND $act=='input'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  
  mysql_query("INSERT INTO kategori
  (nama_kategori,
  username,
  kategori_seo) 
  
  VALUES(
  '$_POST[nama_kategori]',
  '$_SESSION[namauser]',
  '$kategori_seo')");
   
  header('location:../../media.php?module='.$module);
}

// Update kategori
elseif ($module=='kategori' AND $act=='update'){
  $kategori_seo = seo_title($_POST['nama_kategori']);
  mysql_query("UPDATE kategori SET nama_kategori='$_POST[nama_kategori]', kategori_seo='$kategori_seo', aktif='$_POST[aktif]' 
               WHERE id_kategori = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
