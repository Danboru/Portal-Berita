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

$module=$_GET[module];
$act=$_GET[act];

// Input templates
if ($module=='templates' AND $act=='input'){
  mysql_query("INSERT INTO templates(judul,username,pembuat,folder) VALUES('$_POST[judul]', '$_SESSION[namauser]','$_POST[pembuat]','$_POST[folder]')");
  header('location:../../media.php?module='.$module);
}

// Update templates
elseif ($module=='templates' AND $act=='update'){
  mysql_query("UPDATE templates SET judul  = '$_POST[judul]',
                                    pembuat= '$_POST[pembuat]',
                                    folder = '$_POST[folder]'
                              WHERE id_templates = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}

// Aktifkan templates
elseif ($module=='templates' AND $act=='aktifkan'){
  $query1=mysql_query("UPDATE templates SET aktif='Y' WHERE id_templates='$_GET[id]'");
  $query2=mysql_query("UPDATE templates SET aktif='N' WHERE id_templates!='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
