
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
  </div>";}
  
   else{

//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_katajelek/aksi_katajelek.php";
switch($_GET[act]){

  // Tampil Kata Jelek
  default:
 
  echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=katajelek&act=tambahkatajelek' class='button'>
   <span>Tambah Sensor Kata Jelek</span>
   </a></div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>SENSOR KATA JELEK</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>	  
	  
  <thead><tr>	 
  <th>No</th>
  <th>Kata Jelek</th>
  <th>Ganti</th>
  <th>Aksi</th>
  
  </thead>
  <tbody>";
    
   if ($_SESSION[leveluser]=='admin'){
    $tampil = mysql_query("SELECT * FROM katajelek ORDER BY id_jelek DESC");
	}
    else{
    $tampil=mysql_query("SELECT * FROM katajelek
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_jelek DESC");}
	 
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
  <td>$r[kata]</td>
  <td>$r[ganti]</td>
  
  <td width=80>
   
  <a href=?module=katajelek&act=editkatajelek&id=$r[id_jelek] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=katajelek&act=hapus&id=$r[id_jelek]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
   
  </td></tr>";
			 
  $no++;}
   
  echo "</table>";
  
  break;
  
  // Form Tambah Kata Jelek
  
  case "tambahkatajelek":
  
	 
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAHKAN KATA JELEK</h1>
   </div>
   <div class='block-content'>		 
	 
   <form method=POST action='$aksi?module=katajelek&act=input'>
     
   <p class=inline-small-label> 
   <label for=field4>Kata Jelek</label>
   <input type=text name='kata' size=40>
   </p> 	 
   
   <p class=inline-small-label> 
   <label for=field4>Ganti</label>
   <input type=text name='ganti' size=40>
   </p> 
   
      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=katajelek'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
		  
   break;
  
  // Form Edit Kata Jelek 
  case "editkatajelek":
    $edit=mysql_query("SELECT * FROM katajelek WHERE id_jelek='$_GET[id]'");
    $r=mysql_fetch_array($edit);

 echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT KATA JELEK</h1>
   </div>
   <div class='block-content'>	
   	
    <form method=POST action=$aksi?module=katajelek&act=update>
    <input type=hidden name=id value='$r[id_jelek]'>
	
   <p class=inline-small-label> 
   <label for=field4>Kata Jelek</label>
   <input type=text name='kata' value='$r[kata]' size=40>
   </p> 

   <p class=inline-small-label> 
   <label for=field4>Ganti</label>
   <input type=text name='ganti' value='$r[ganti]' size=40>
   </p> 
	

     <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=katajelek'>Batal</a>
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