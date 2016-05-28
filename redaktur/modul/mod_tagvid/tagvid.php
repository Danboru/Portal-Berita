
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

$aksi="modul/mod_tagvid/aksi_tagvid.php";
switch($_GET[act]){

  // Tampil Tag Video
  default:
  
  

	  
   echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=tagvid&act=tambahtag' class='button'>
   <span>Tambahkan Tag</span>
   </a></div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>TAG VIDEO</h1>
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
		  
		  
	
	if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM tagvid  ORDER BY id_tag DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM tagvid 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_tag DESC");
    }
	
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
  <td>$r[nama_tag]</td>
  
  <td width=80>
   
  <a href=?module=tagvid&act=edittag&id=$r[id_tag] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=tagvid&act=hapus&id=$r[id_tag]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
   
   </td></tr>";  

    $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah tagvid
  case "tambahtag":
  
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAHKAN TAG VIDEO<h1>
   </div>
   <div class='block-content'>

   <form method=POST action='$aksi?module=tagvid&act=input'>
	
   <p class=inline-small-label> 
   <label for=field4>Nama Tag</label>
   <input type=text name='nama_tag'   
    </p>    
		  
      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=tagvid'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
     </li> </ul>
	  </form>";		
	  
	    
   break;
  
  // Form Edit Kategori  
  case "edittag":
    $edit=mysql_query("SELECT * FROM tagvid WHERE id_tag='$_GET[id]'");
    $r=mysql_fetch_array($edit);

   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT  TAG VIDEO<h1>
   </div>
   <div class='block-content'>  
  
   <form method=POST action=$aksi?module=tagvid&act=update>
   <input type=hidden name=id value='$r[id_tag]'>
   
	  
   <p class=inline-small-label> 
   <label for=field4>Nama Tag</label>
   <input type=text name='nama_tag' value='$r[nama_tag]'>
   </p>    
		  
     <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=tagvid'>Batal</a>
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