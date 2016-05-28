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
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus banner
if ($module=='banner' AND $act=='hapus'){
  mysql_query("DELETE FROM banner WHERE id_banner='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input banner
elseif ($module=='banner' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    mysql_query("INSERT INTO banner(judul,
                                    url,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
                                   '$_POST[url]',
                                   '$tgl_sekarang',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO banner(judul,
                                    tgl_posting,
                                    url) 
                            VALUES('$_POST[judul]',
                                   '$tgl_sekarang',
                                   '$_POST[url]')");
  }
  header('location:../../media.php?module='.$module);
}

// Update banner
elseif ($module=='banner' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE banner SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]'
                             WHERE id_banner = '$_POST[id]'");
  }
  else{
    UploadBanner($nama_file);
    mysql_query("UPDATE banner SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]',
                                   gambar    = '$nama_file'   
                             WHERE id_banner = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
}
?>
