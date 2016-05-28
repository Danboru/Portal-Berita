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

$aksi="modul/mod_poling/aksi_poling.php";
switch($_GET[act]){

//update/////////////////////////////////////

  // Tampil poling
  default:
 echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=poling&act=tambahpoling' class='button'>
   <span>Tambahkan Jajak Pendapat</span>
   </a></div>";

    if (empty($_GET['kata'])){
echo " 
   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>JAJAK PENDAPAT</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>	  
	         
   <thead><tr>	  
		 
    <th>No</th>
	<th>Pilihan</th>
	<th>Status</th>
	<th>Rating</th>
	<th>Aktif</th>
	<th>Aksi</th>
	
	</thead>
   <tbody>";

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM poling ORDER BY id_poling DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM poling 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_poling DESC");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
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
   <td><center>$g</center></td>
   <td>$r[pilihan]</td>
   <td>$r[status]</td>
   <td align=center><center>$r[rating]</center></td>
   <td align=center><center>$r[aktif]</center></td>
   
    <td width=80>
   
   <a href=?module=poling&act=editpoling&id=$r[id_poling] title='Edit' class='with-tip'>
   <center><img src='img/edit.png'></center></a> 
	   
   </td></tr>";		
     
      $no++;
      }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM poling"));
      }
        else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM poling WHERE username='$_SESSION[namauser]'"));
      }  
      break;    
      }
      else{
echo "<table id='table-example' class='table'>	  
	         
    <thead><tr>	  
		 
    <th>No</th>
	<th>Pilihan</th>
	<th>Status</th>
	<th>Rating</th>
	<th>Aktif</th>
	<th>Aksi</th>
	
	</thead>
    <tbody>";

      if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM poling WHERE pilihan LIKE '%$_GET[kata]%' ORDER BY id_poling DESC");
      }
      else{
      $tampil=mysql_query("SELECT * FROM poling 
                           WHERE username='$_SESSION[namauser]'
                           AND pilihan LIKE '%$_GET[kata]%'       
                           ORDER BY id_poling DESC");
      }
  
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
	  
  echo "<tr class=gradeX>
   <td><center>$no</center></td>
   <td>$r[pilihan]</td>
   <td>$r[status]</td>
   <td align=center><center>$r[rating]</center></td>
   <td align=center><center>$r[aktif]</center></td>
   
    <td width=80>
   
   <a href=?module=poling&act=editpoling&id=$r[id_poling] title='Edit' class='with-tip'>
   <center><img src='img/edit.png'></center></a> 
	   
   </td></tr>";	
  
      $no++;
     }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM poling WHERE pilihan LIKE '%$_GET[kata]%'"));
      }
      else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM poling WHERE username='$_SESSION[namauser]' AND pilihan LIKE '%$_GET[kata]%'"));
      }  
      break;    
      }
	  
//batas update/////////////////////////////////////////////////////////////////////////


  case "tambahpoling":
  echo "
  <div id='main-content'>
  <div class='container_12'>

  <div class='grid_12'>
  <div class='block-border'>
  <div class='block-header'>
   
  <h1>TAMBAHKAN JAJAK PENDAPAT</h1>
  </div>
  <div class='block-content'>	
  
     <form method=POST action='$aksi?module=poling&act=input'>
		  
    <p class=inline-small-label> 
   <label for=field4>Pilihan</label>
  <input type=text name='pilihan' size=50>
   </p> 		   
	   
    <p class=inline-small-label> 
   <label for=field4>Status</label>
   <input type=radio name='status' value='Jawaban' checked>Jawaban 
   <input type=radio name='status' value='Pertanyaan'>Pertanyaan  
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Aktif</label>
   <input type=radio name='aktif' value='Y' checked>Ya 
   <input type=radio name='aktif' value='N'>Tidak 
   </p> 
   
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=poling'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
   </form>";
		  
  break;
  case "editpoling":
    $edit = mysql_query("SELECT * FROM poling WHERE id_poling='$_GET[id]' AND username='$_SESSION[namauser]'");
    $r    = mysql_fetch_array($edit);

    echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT JAJAK PENDAPAT</h1>
   
   </div>
   <div class='block-content'>	
	
    <form method=POST action=$aksi?module=poling&act=update>
    <input type=hidden name=id value='$r[id_poling]'>
		  
		  
   <p class=inline-small-label> 
   <label for=field4>Pilihan</label>
  <input type=text name='pilihan' value='$r[pilihan]'>
   </p>";
     

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


   if ($r[status]=='Jawaban'){
   echo "
   <p class=inline-small-label> 
   <label for=field4>Status</label>
   <input type=radio name='status' value='Jawaban' checked>Jawaban  
   <input type=radio name='status' value='Pertanyaan'> Pertanyaan
   </p>";}
									  
   else{
   echo "
   <p class=inline-small-label> 
   <label for=field4>Status</label>
    <input type=radio name='status' value='Jawaban' checked>Jawaban  
   <input type=radio name='status' value='Pertanyaan'> Pertanyaan
   </p>";}	
	

    echo "  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=poling'>Batal</a>
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