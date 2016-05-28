<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus sub menu
if ($module=='menu' AND $act=='hapus'){
  mysql_query("DELETE FROM menu WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input sub menu
elseif ($module=='menu' AND $act=='input'){
    mysql_query("INSERT INTO menu(id_parent,
                                    nama_menu,
                                    link)
                            VALUES('$_POST[id_parent]',
                                   '$_POST[nama_menu]',
                                   '$_POST[link]')");
  header('location:../../media.php?module='.$module);
}

// Update sub menu
elseif ($module=='menu' AND $act=='update'){
    mysql_query("UPDATE menu SET id_parent  = '$_POST[id_parent]',
                                   nama_menu = '$_POST[nama_menu]',
                                   link  = '$_POST[link]',
								   aktif = '$_POST[aktif]'
                             WHERE id_menu   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
