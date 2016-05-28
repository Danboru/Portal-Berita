
<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>



<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){

  echo "
  <link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";
   }
  else{

//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_album/aksi_album.php";
switch($_GET[act]){

//update/////////////////////////////////////

  // Tampil album
  default:
echo "  <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=album&act=tambahalbum' class='button'>
   <span>Buat Album Berita Foto</span>
   </a></div>";

    if (empty($_GET['kata'])){
echo "
   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>BERITA FOTO</h1>
   <span></span> 
   </div>
   <div class='block-content'>		
		
    		  
   <table id='table-example' class='table'>	  
	  
   <thead><tr>	
  
   <th></center>Foto</center></th>
   <th>Judul Berita Foto</th>
   <th>Link</th>
   <th>Aksi</th>
   
    </thead>
    <tbody>";
  

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM album ORDER BY id_album DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM album 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_album DESC");
    }
  
    while($r=mysql_fetch_array($tampil)){
	
  echo "<tr class=gradeX> 
   <td width=50><center><img src='../img_album/kecil_$r[gbr_album]' width=50></center></td>
   <td>$r[jdl_album]</td>
   <td>album-$r[id_album]-$r[album_seo].html</td>
			 
  <td width=80>
   
  <a href=?module=album&act=editalbum&id=$r[id_album] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a></center>
   
  </td></tr>";  
      }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM album"));
      }
        else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM album WHERE username='$_SESSION[namauser]'"));
      }  
      break;    
      }
      else{
echo "   		  
   <table id='table-example' class='table'>	  
	  
   <thead><tr>	
  
   <th></center>Foto</center></th>
   <th>Judul Berita Foto</th>
   <th>Link</th>
   <th>Aksi</th>
   
   
    </thead>
    <tbody>";

      if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM album WHERE judul LIKE '%$_GET[kata]%' ORDER BY id_album DESC");
      }
      else{
      $tampil=mysql_query("SELECT * FROM album 
                           WHERE username='$_SESSION[namauser]'
                           AND judul LIKE '%$_GET[kata]%'       
                           ORDER BY id_album DESC");
      }
  
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
	  
  echo "<tr class=gradeX> 
   <td width=50><center><img src='../img_album/kecil_$r[gbr_album]' width=50></center></td>
   <td>$r[jdl_album]</td>
   <td>album-$r[id_album]-$r[album_seo].html</td>
			 
  <td width=80>
   
  <a href=?module=album&act=editalbum&id=$r[id_album] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a></center>
   
  </td></tr>";
  
      $no++;
     }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM album WHERE jdl_album LIKE '%$_GET[kata]%'"));
      }
      else{
     $jmldata = mysql_num_rows(mysql_query("SELECT * FROM album WHERE username='$_SESSION[namauser]' AND jdl_album LIKE '%$_GET[kata]%'"));
      }  
      break;    
      }
	  
//batas update/////////////////////////////////////////////////////////////////////////
	
  // Form Tambah Album
  case "tambahalbum":

   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>MEMBUAT ALBUM FOTO</h1>
   </div>
   <div class='block-content'>	
   
   <form method=POST action='$aksi?module=album&act=input' enctype='multipart/form-data'>
		  
   <p class=inline-small-label> 
   <label for=field4>Judul Album</label>
   <input type=text name='jdl_album' size=40>
   </p> 	
   
   <p class=inline-small-label> 
   <label for=field4>Keterangan</label>
   <textarea name='keterangan' style='width: 720px; height: 200px;'></textarea>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Gambar</label>
   <input type=file name='fupload' size=40>
   </p> 
   
      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=album'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
		  
  break;
  
  // Form Edit Album  
  case "editalbum":
    $edit = mysql_query("SELECT * FROM album WHERE id_album='$_GET[id]' AND username='$_SESSION[namauser]'");
    $r    = mysql_fetch_array($edit);

   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT ALBUM FOTO</h1>
   </div>
   <div class='block-content'>

    <form method=POST enctype='multipart/form-data' action=$aksi?module=album&act=update>
    <input type=hidden name=id value='$r[id_album]'>
		  		  
   <p class=inline-small-label> 
   <label for=field4>Judul Album</label>
   <input type=text name='jdl_album' value='$r[jdl_album]' size=40>
   </p> 
		  
		  
   <p class=inline-small-label> 
   <label for=field4>Keterangan</label>
   <textarea name='keterangan' style='width: 720px; height: 200px;'>$r[keterangan]</textarea>
   </p> 
	
		  
   <p class=inline-small-label> 
   <label for=field4>Gambar</label>
   <img src='../img_album/kecil_$r[gbr_album]'>
   </p> 
		  
   <p class=inline-small-label> 
   <label for=field4>Ganti Gambar</label>
  <input type=file name='fupload' size=40>
   </p> ";
				  
  if ($r[aktif]=='Y'){
   echo "
   <p class=inline-small-label> 
   <label for=field4>Aktif</label>
   <input type=radio name='aktif' value='Y' checked>Ya 
   <input type=radio name='aktif' value='N'>Tidak
   </p>";}
									  
   else{
   echo "
   <p class=inline-small-label> 
   <label for=field4>Aktif</label>
   <input type=radio name='aktif' value='Y'>Ya 
   <input type=radio name='aktif' value='N' checked>Tidak
   </p>";}
   
            
    echo "<div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=album'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
	  
	  
    break;  
   }
   //kurawal akhir hak akses module
   } else {
	echo akses_salah();
   }
   }
   ?>
