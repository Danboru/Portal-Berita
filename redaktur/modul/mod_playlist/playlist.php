
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

$aksi="modul/mod_playlist/aksi_playlist.php";
switch($_GET[act]){

  // Tampil Playlist
  default:
  
   echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=playlist&act=tambahplaylist' class='button'>
   <span>Tambah Playlist Video</span>
   </a></div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>PLAYLIST VIDEO</h1>
   <span></span> 
   </div>
   <div class='block-content'>		
    		  
   <table id='table-example' class='table'>	  
	  
   <thead><tr>		
	
	<th><center>No</center></th>
	<th><center>Gambar</center></th>
	<th><center>Judul Playlist</center></th>
	<th>Aksi</th>
	
   </thead>
   <tbody>";
	
	
	  if ($_SESSION[leveluser]=='admin'){
    $tampil = mysql_query("SELECT * FROM playlist ORDER BY id_playlist DESC");
	}
    else{
    $tampil=mysql_query("SELECT * FROM playlist 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_playlist  DESC");}
	
	
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
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
	
   echo "<tr class=gradeX>
   <td width=50><center>$g</center></td>
   <td><center><img width=50 src='../img_playlist/kecil_$r[gbr_playlist]'></center></td>
    <td><center>$r[jdl_playlist]</center></td>
	
   <td width=80>
   <a href=?module=playlist&act=editplaylist&id=$r[id_playlist] title='Edit' class='with-tip'>
   <center><img src='img/edit.png'></center></a> 
	   
   </td></tr>";	
   		 
   $no++;}
	  
	  
    echo "</table>";
	
    break;
  
  // Form Tambah Playlist
  case "tambahplaylist":
  

    echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAHKAN PLAYLIST VIDEO</h1>
   </div>
   <div class='block-content'>

   <form method=POST action='$aksi?module=playlist&act=input' enctype='multipart/form-data'>
		  
   <p class=inline-small-label> 
   <label for=field4>Judul Playlist</label>
   <input type=text name='jdl_playlist'>
   </p> 	  

	<p class=inline-small-label> 
   <label for=field4>Gambar</label>
   <input type=file name='fupload' size=40>
   </p> 		
   
   
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=playlist'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
  </form>";
			
     break;
  
  // Form Edit Playlist  
  case "editplaylist":
    $edit=mysql_query("SELECT * FROM playlist WHERE id_playlist='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT PLAYLIST VIDEO</h1>
   </div>
   <div class='block-content'>	
   
   <form method=POST enctype='multipart/form-data' action=$aksi?module=playlist&act=update>
   <input type=hidden name=id value='$r[id_playlist]'>
		  
   <p class=inline-small-label> 
   <label for=field4>Judul Playlist</label>
   <input type=text name='jdl_playlist' value='$r[jdl_playlist]'>
   </p> 
   
	
   <p class=inline-small-label> 
   <label for=field4>Gambar</label>
   <img src='../img_playlist/kecil_$r[gbr_playlist]'>
   </p> 		  
     		
	
   <p class=inline-small-label> 
   <label for=field4>Ganti Gambar</label>
   <input type=file name='fupload' size=30>
   </p>";
		  
   if ($r[aktif]=='Y'){
   echo "
   <p class=inline-small-label> 
   <label for=field4>Tampilkan</label>
   <input type=radio name='aktif' value='Y' checked>Ya 
   <input type=radio name='aktif' value='N'>Tidak
   </p>";}
									  
   else{
   echo "
   <p class=inline-small-label> 
   <label for=field4>Tampilkan</label>
   <input type=radio name='aktif' value='Y'>Ya 
   <input type=radio name='aktif' value='N' checked>Tidak
   </p>";}
	
	       
    echo " <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=playlist'>Batal</a>
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
  
   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>