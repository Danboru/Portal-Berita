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

$aksi="modul/mod_iklanatas/aksi_iklanatas.php";
switch($_GET[act]){
  // Tampil Banner
  default:
  
   echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=iklanatas&act=tambahiklanatas' class='button'>
   <span>Tambahkan Iklan</span>
   </a></div>
   
   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>IKLAN LAYANAN MASYARAKAT</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>	  
	         
   <thead><tr>	  	
		  
   <th>No</th>
   <th>Judul</th>
   <th>URL</th>
   <th>Tgl. Posting</th>
   <th>Aksi</th>
   
  </thead>
   <tbody>";
		  
	  if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM iklanatas ORDER BY id_iklanatas DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM iklanatas
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_iklanatas DESC");
    }
		
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
	  
	  
   echo "<tr class=gradeX>
   <td width=50><center>$no</center></td>
   <td>$r[judul]</td>
   <td><a href=$r[url] target=_blank>$r[url]</a></td>
   <td>$tgl</td>
				
   <td width=80>
   
   <a href=?module=iklanatas&act=editiklanatas&id=$r[id_iklanatas] title='Edit' class='with-tip'>
   <center><img src='img/edit.png'></a>
   
   <a href=javascript:confirmdelete('$aksi?module=iklanatas&act=hapus&id=$r[id_iklanatas]&namafile=$r[gambar]') 
   title='Hapus' class='with-tip'>
   &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
	   
   </td></tr>";

				
				
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambahiklanatas":

  echo "
  <div id='main-content'>
  <div class='container_12'>

  <div class='grid_12'>
  <div class='block-border'>
  <div class='block-header'>
   
  <h1>TAMBAHKAN IKLAN</h1>
  </div>
  <div class='block-content'>	
	
   <form method=POST action='$aksi?module=iklanatas&act=input' enctype='multipart/form-data'>
		  
   <p class=inline-small-label> 
   <label for=field4>Judul</label>
  <input type=text name='judul' size=30>
   </p>	  
   
   <p class=inline-small-label> 
   <label for=field4>URL</label>
   <input type=text name='url' size=50 value='http://'>
   </p>	  
		  
   <p class=inline-small-label> 
   <label for=field4>Gambar</label>
   <input type=file name='fupload' size=40>
   Ukuran gambar maksimal lebar 260px
   </p>	  
		  		  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=iklanatas'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
   </form>";
		  
		  
  break;
  case "editiklanatas":
    $edit = mysql_query("SELECT * FROM iklanatas WHERE id_iklanatas='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

  
    echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT IKLAN</h1>
   </div>
   <div class='block-content'>	

	
    <form method=POST enctype='multipart/form-data' action=$aksi?module=iklanatas&act=update>
    <input type=hidden name=id value=$r[id_iklanatas]>
		  
   <p class=inline-small-label> 
   <label for=field4>Judul</label>
   <input type=text name='judul' size=30 value='$r[judul]'>
   </p>
   
    <p class=inline-small-label> 
   <label for=field4>URL</label>
  <input type=text name='url' size=50 value='$r[url]'>
   </p>
   
   <p class=inline-small-label> 
   <label for=field4>Gambar</label>
   <img src='../foto_iklanatas/$r[gambar]'width=200 >
   </p>
   
   <p class=inline-small-label> 
   <label for=field4>Ganti Gambar</label>
   <input type=file name='fupload' size=30>
   </p>
		  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=iklanatas'>Batal</a>
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