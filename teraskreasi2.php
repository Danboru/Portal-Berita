<?php
if (isset($_GET['judul'])){
   $sql = mysql_query("select judul from berita where judul_seo='$_GET[judul]'");
  $j   = mysql_fetch_array($sql);
	echo "$j[tag]";
}
else{
      $sql2 = mysql_query("select meta_keyword from identitas LIMIT 1");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[meta_keyword]";
}
?>
