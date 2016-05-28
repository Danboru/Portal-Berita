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

$aksi="modul/mod_templates/aksi_templates.php";
switch($_GET[act]){
  // Tampil Templates
  default:
	
 echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=templates&act=tambahtemplates' class='button'>
   <span>Tambah Template Web</span>
   </a></div>
   
   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>GANTI TEMPLATE WEB</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>	  
	         
   <thead><tr>
   
   <th>No</th>
   <th>Nama Template</th>
   <th>Pembuat</th>
   <th>Folder</th>
   <th>Aktif</th>
   <th>Aksi</th>
   
   </thead>
   <tbody>";

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM templates ORDER BY id_templates DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM templates 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_templates DESC");
    }
  
    $no = $posisi+1;
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
      echo "
      <tr class=gradeX>
      <td width=50><center>$g</center></td>	  
     <td>$r[judul]</td>
     <td>$r[pembuat]</td>
     <td>$r[folder]</td>
     <td><center>$r[aktif]</center></td>
	 
   <td width=80>
   
   <a href=?module=templates&act=edittemplates&id=$r[id_templates] title='Edit' class='with-tip'>
   <center><img src='img/edit.png'></a>
   
   <a href=$aksi?module=templates&act=aktifkan&id=$r[id_templates]
   title='Aktifkan' class='with-tip'>
   &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/ya_rzl.png'></center></a> 
	   
   </td></tr>";

				
				
      $no++;
    }
    echo "</table>";
  

    break;
  
  
  // Form Tambah Templates
  case "tambahtemplates":
  
  echo "
  <div id='main-content'>
  <div class='container_12'>

  <div class='grid_12'>
  <div class='block-border'>
  <div class='block-header'>
   
  <h1>TAMBAH TEMPLATE WEB</h1>
  </div>
  <div class='block-content'>	
	
   <form method=POST action='$aksi?module=templates&act=input'>

   <p class=inline-small-label> 
   <label for=field4>Nama Templates</label>
   <input type=text name='judul'>
   </p> 	
   
    <p class=inline-small-label> 
   <label for=field4>Pembuat</label>
  <input type=text name='pembuat'>
   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Folder</label>
   <input type=text name='folder' value='layout/'>
   </p> 

		  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=templates'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
   </form>";
   
		  
     break;
  
  // Form Edit Templates 
  case "edittemplates":
    $edit=mysql_query("SELECT * FROM templates WHERE id_templates='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT TEMPLATE WEB</h1>
   </div>
   <div class='block-content'>	
	
   <form method=POST action=$aksi?module=templates&act=update>
   <input type=hidden name=id value='$r[id_templates]'>
		  
   <p class=inline-small-label> 
   <label for=field4>Nama Template</label>
   <input type=text name='judul' value='$r[judul]'>
   </p> 	
	  
   <p class=inline-small-label> 
   <label for=field4>Pembuat</label>
    <input type=text name='pembuat' value='$r[pembuat]' disabled>
    </p> 	
	  
   <p class=inline-small-label> 
   <label for=field4>Folder</label>
    <input type=text name='folder' value='$r[folder]'>
    </p> 
		  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=templates'>Batal</a>
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