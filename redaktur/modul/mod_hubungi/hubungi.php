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

$base_url = $_SERVER['HTTP_HOST'];
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));

$aksi="modul/mod_hubungi/aksi_hubungi.php";
switch($_GET[act]){
  // Tampil Hubungi Kami
  default:
   
   echo "
   <div id='main-content'>
   <div class='container_12'>
   
   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>PESAN MASUK</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>
		
   <thead><tr>	
		
  <th>No</th>
  <th>Nama</th>
  <th>Email</th>
  <th>Subjek</th>
  <th>Tanggal</th>
  <th>Aksi</th>
  
   </thead>
   <tbody>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM hubungi ORDER BY id_hubungi DESC");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tanggal]);
    $lebar=strlen($no);
    switch($lebar){
      case 1:
      {
        $g="0".$no;
        break;     
      }
      case 2:
      {
        $g=$no;
        break;     
      }      
    } 

	  if($r[dibaca]=='N'){
	  
    echo "<tr class=gradeX> 
      <td width=50><center><b>$g</b></center></td>
	  <td><b>$r[nama]</b></td>
	  <td><b><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></b></td>
	  <td><b>$r[subjek]</b></td>
	  <td><b>$tgl</a></b></td>
	  
      <td width=80>
	 <a href=?module=hubungi&act=balasemail&id=$r[id_hubungi] title='Baca' class='with-tip'>
     <center><img src='img/edit.png'></a>
   
    <a href=javascript:confirmdelete('$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]') 
    title='Hapus' class='with-tip'>
    &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
	 </td></tr>";
	 
	  } 
	  else {
echo "<tr class=gradeX> 
      <td width=50><center>$g</center></td>
	  <td>$r[nama]</td>
	  <td><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>$r[email]</a></td>
	  <td>$r[subjek]</td>
	  <td>$tgl</a></td>
     <td width=80>
	 <a href=?module=hubungi&act=balasemail&id=$r[id_hubungi] title='Baca' class='with-tip'>
     <center><img src='img/edit.png'></a>
   
     <a href=javascript:confirmdelete('$aksi?module=hubungi&act=hapus&id=$r[id_hubungi]') 
     title='Hapus' class='with-tip'>&nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
	 
	  </td></tr>";
	  }
    $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM hubungi"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    break;

  case "balasemail":
    $tampil = mysql_query("SELECT * FROM hubungi WHERE id_hubungi='$_GET[id]'");
    $r      = mysql_fetch_array($tampil);
	mysql_query("UPDATE hubungi SET dibaca='Y' WHERE id_hubungi='$_GET[id]'");

    echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>BALAS PESAN</h1>
   </div>
   <div class='block-content'>
   
   <form method=POST action='?module=hubungi&act=kirimemail'>
         
		  
   <p class=inline-small-label> 
   <label for=field4>Kepada</label>
  <input type=text name='email' size=30 value='$r[email]'>
   </p> 
   		 
   <p class=inline-small-label> 
   <label for=field4>Subjek</label>
  <input type=text name='subjek' size=50 value='Re: $r[subjek]'>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Pesan</label>
   <textarea name='pesan' style='width: 720px; height: 350px;'><br><br><br><br>     
   <hr></hr>
  $r[pesan]</textarea>
   </p> 
   
	  
     <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=hubungi'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
     <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Kirim &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </form>";
	  		  
     break;
	 
 //HARUS DIRUBAH (setting email)
  case "kirimemail":
  $dari = "From: $iden[nama_website] <".$iden[email].">\n" . 
"MIME-Version: 1.0\n" . 
"Content-type: text/html; charset=iso-8859-1";

    mail($_POST[email],$_POST[subjek],$_POST[pesan],$dari);
	
    echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>STATUS EMAIL</h1>
   </div>
   <div class='block-content'>
   
   <p class=inline-small-label> 
    <h4>Email telah sukses terkirim ke tujuan.</h4>
   </p> 
   
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=hubungi'>Kembali</a>
   </li> </ul>
   </form>";
   
    break;  
   }
   }
  ?>

   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>