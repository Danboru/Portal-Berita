<?php
  include "../config/koneksi.php";

  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));

  header("location: $iden[url]"); 
?>
