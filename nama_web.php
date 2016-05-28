<?php
$sql2 = mysql_query("select nama_website from identitas LIMIT 1");
$j2   = mysql_fetch_array($sql2);
echo "$j2[nama_website]"; 
?>
