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

$aksi="modul/mod_logo/aksi_logo.php";
switch($_GET[act]){
  // Tampil logo
  default:
      
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>GANTI LOGO WEBSITE</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>	  
	         
  <thead><tr>	  
	  
   <th>Logo Terpasang</th>
   <th>Aksi</th>
   
   </thead>
   <tbody>";
   
   
   
    $tampil=mysql_query("SELECT * FROM logo ORDER BY id_logo DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
	  
	  
    echo "<tr class=gradeX> 
    <td align=left><img width='300' src='../logo/$r[gambar]'></td>
		
   <td width=80>
   
  <a href=?module=logo&act=editlogo&id=$r[id_logo] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></center></a> 
   </td></tr>";
 
 
    $no++;
    }
    echo "</table>";
    break;
  

  case "editlogo":
    $edit = mysql_query("SELECT * FROM logo WHERE id_logo='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>GANTI LOGO WEBSITE</h1>
   </div>
   <div class='block-content'>	   	
	
   <form method=POST enctype='multipart/form-data' action=$aksi?module=logo&act=update>
   <input type=hidden name=id value=$r[id_logo]>

   <p class=inline-small-label> 
   <label for=field4>Logo Terpasang</label>
   <img src='../logo/$r[gambar]' width='300'>
   </p>         
   
   <p class=inline-small-label> 
   <label for=field4>Ganti Logo</label>
   <input type=file name='fupload' size=30>   
   </p>
   
   
   <div class=block-actions> 
   <ul class=actions-right> 
   
   <li>
   <a class='button red' id=reset-validate-form href='?module=logo'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
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