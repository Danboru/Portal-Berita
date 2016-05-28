<?php 
  if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
        ob_start("ob_gzhandler");
    else
        ob_start();
  session_start();
  // Panggil semua fungsi yang dibutuhkan (semuanya ada di folder config)

  include "config/koneksi.php";
	include "config/fungsi_indotgl.php";
	include "config/class_paging.php";
	include "config/fungsi_combobox.php";
	include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_badword.php";
  include "config/fungsi_kalender.php";
  include "config/option.php";

  // Memilih template yang aktif saat ini
  $pilih_template=mysql_query("SELECT folder FROM templates WHERE aktif='Y'");
  $f=mysql_fetch_array($pilih_template);
  include "$f[folder]/template.php"; 
?>
