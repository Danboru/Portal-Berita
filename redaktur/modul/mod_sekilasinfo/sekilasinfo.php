<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>






<?php

//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_sekilasinfo/aksi_sekilasinfo.php";
switch($_GET[act]){
  // Tampil Sekilas Info
  default:
    echo "<header><h3>SEKILAS INFO</h3></header>
        <div class='module_content'><input type=button class='button' value='Tambah Sekilas Info' onclick=location.href='?module=sekilasinfo&act=tambahsekilasinfo'>
         <div class='module_content'>
          <table id='rounded-corner'>
          <tr><th>No</th><th>Info</th><th>Posting</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM sekilasinfo ORDER BY id_sekilas DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td>$no</td>
                <td>$r[info]</td>
                <td>$tgl</td>
			
<td><a href=?module=sekilasinfo&act=editsekilasinfo&id=$r[id_sekilas]>
<img src='images/icn_edit.png' title='Edit'></a>

	  <a href=javascript:confirmdelete('$aksi?module=sekilasinfo&act=hapus&id=$r[id_sekilas]&namafile=$r[gambar]')>
	  <img src='images/icn_trash.png' title='Hapus'></a>			
		        </td></tr>";
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambahsekilasinfo":
    echo "<header><h3>TAMBAHKAN SEKILAS INFO</h3></header>
          <form method=POST action='$aksi?module=sekilasinfo&act=input' enctype='multipart/form-data'>
          <div class='module_content'>
          <table id='rounded-corner'>
        <tr><td valign=top>Info</td><td>  :<textarea name='info' style='width: 600px; height: 200px;'>$r[info]</textarea>
		</td></tr>
		
		  <tr><td colspan=2><input type=submit class='button' value=Simpan>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form><br><br><br>";
     break;
    
  case "editsekilasinfo":
    $edit = mysql_query("SELECT * FROM sekilasinfo WHERE id_sekilas='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<header><h3>EDIT SEKILAS INFO</h3></header>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=sekilasinfo&act=update>
          <input type=hidden name=id value=$r[id_sekilas]>
         <div class='module_content'>
          <table id='rounded-corner'>
        <tr><td valign=top><b>Info<b/></td><td>  :<textarea name='info' style='width: 600px; height: 200px;'>$r[info]</textarea>
		</td></tr>
		 <tr><td colspan=2><input type=submit class='button' value=Update>
                            <input type=button class='button' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
//kurawal akhir hak akses module
} else {
	echo akses_salah();
}

?>
