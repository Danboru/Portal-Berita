<?php
include "../config/koneksi.php";
$a=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username='$_SESSION[namauser]'"));
echo "<div class='nama_user'>$a[nama_lengkap]</div>"; 

?>
