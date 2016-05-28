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

$aksi="modul/mod_tag/aksi_tag.php";
switch($_GET[act]){
//update/////////////////////////////////////

  // Tampil tag
  default:
echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <br/>
   <a href='?module=tag&act=tambahtag' class='button'>
   <span>Tambahkan Tag</span>
   </a></div>";

    if (empty($_GET['kata'])){
echo "   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>TAG BERITA</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>

   <thead><tr>
		  
   <th>No</th>
   <th>Nama Tag</th>
   <th>Aksi</th>
   
   </thead>
   <tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM tag ORDER BY id_tag DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM tag 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_tag DESC");
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
  <td width=50><center>$g</center></td>
  <td>$r[nama_tag]</td>
  
  <td width=80>
   
  <a href=?module=tag&act=edittag&id=$r[id_tag] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=tag&act=hapus&id=$r[id_tag]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
   
   </td></tr>";  
  
      $no++;
      }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM tag"));
      }
        else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM tag WHERE username='$_SESSION[namauser]'"));
      }  
      break;    
      }
      else{
echo "  <table id='table-example' class='table'>

   <thead><tr>
		  
   <th>No</th>
   <th>Nama Tag</th>
   <th>Aksi</th>
   
   </thead>
   <tbody>";
   

      if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM tag WHERE nama_tag LIKE '%$_GET[kata]%' ORDER BY id_tag DESC");
      }
      else{
      $tampil=mysql_query("SELECT * FROM tag 
                           WHERE username='$_SESSION[namauser]'
                           AND nama_tag LIKE '%$_GET[kata]%'       
                           ORDER BY id_tag DESC");
      }
  
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
  <td><center>$no</center></td>
  <td>$r[nama_tag]</td>
  
  <td width=80>
   
  <a href=?module=tag&act=edittag&id=$r[id_tag] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=tag&act=hapus&id=$r[id_tag]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
   
   </td></tr>";  
			 
  
      $no++;
     }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM tag WHERE nama_tag LIKE '%$_GET[kata]%'"));
      }
      else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM tag WHERE username='$_SESSION[namauser]' AND nama_tag LIKE '%$_GET[kata]%'"));
      }  
      break;    
      }
	  
//batas update/////////////////////////////////////////////////////////////////////////


   // Form Tambah Tag
   case "tambahtag":
  
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAH TAG BERITA</h1>
   </div>
   <div class='block-content'>
   
   <form method=POST action='$aksi?module=tag&act=input'>
   
   <p class=inline-small-label> 
   <label for=field4>Nama Tag</label>
   <input type=text name='nama_tag' SIZE=30>
   </p>    
   
		  
      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=tag'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
     </li> </ul>
	  </form>";
	  
		  
    break;
  
  // Form Edit tag  
  case "edittag":
    $edit=mysql_query("SELECT * FROM tag WHERE id_tag='$_GET[id]'");
    $r=mysql_fetch_array($edit);

 echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT TAG BERITA</h1>
   </div>
   <div class='block-content'>
     
   <form method=POST action=$aksi?module=tag&act=update>
   <input type=hidden name=id value='$r[id_tag]'>
		  
   <p class=inline-small-label> 
   <label for=field4>Nama Tag</label>
  <input type=text name='nama_tag' value='$r[nama_tag]' size=30>
   </p>    


     <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=tag'>Batal</a>
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