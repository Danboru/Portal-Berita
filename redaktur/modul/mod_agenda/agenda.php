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

$aksi="modul/mod_agenda/aksi_agenda.php";
switch($_GET[act]){
  // Tampil Agenda
  default:
  
   echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=agenda&act=tambahagenda' class='button'>
   <span>Tambah Agenda</span>
   </a></div>
   
   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>AGENDA</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>	  
	         
   <thead><tr>	  
		  
    <th>No</th>
	<th>Tema</th>
	<th>Tgl. Mulai</th>
	<th>Tgl. Selesai</th>
	<th>Aksi</th>
	
   </thead>
   <tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil=mysql_query("SELECT * FROM agenda ORDER BY id_agenda DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM agenda 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_agenda DESC LIMIT $posisi,$batas");
    }

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl_mulai   = tgl_indo($r[tgl_mulai]);
      $tgl_selesai = tgl_indo($r[tgl_selesai]);

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
    <td width=220>$r[tema]</td>
    <td>$tgl_mulai</td>
    <td>$tgl_selesai</td>

				
    <td width=80>
   
   <a href=?module=agenda&act=editagenda&id=$r[id_agenda] title='Edit' class='with-tip'>
   <center><img src='img/edit.png'></a>
   
   <a href=javascript:confirmdelete('$aksi?module=agenda&act=hapus&id=$r[id_agenda]&namafile=$r[gambar]') 
   title='Hapus' class='with-tip'>
   &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
	   
   </td></tr>";		
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM agenda WHERE username='$_SESSION[namauser]'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);


    break;

  
  case "tambahagenda":
  
   echo "
  <div id='main-content'>
  <div class='container_12'>

  <div class='grid_12'>
  <div class='block-border'>
  <div class='block-header'>
   
  <h1>TAMBAHKAN AGENDA</h1>
  </div>
  <div class='block-content'>	
	
  <form method=POST action='$aksi?module=agenda&act=input' enctype='multipart/form-data'>
     
   <p class=inline-small-label> 
   <label for=field4>Tema</label>
  <input type=text name='tema' size=60>
   </p> 		 
   
   <p class=inline-small-label> 
   <label for=field4>Isi Agenda</label>
  <textarea name='isi_agenda' style='width: 720px; height: 350px;'></textarea>
   </p> 		 
   
   <p class=inline-small-label> 
   <label for=field4>Gambar</label>
   <input type=file name='fupload'>
   </p> 		 
   		  	
   <p class=inline-small-label> 
   <label for=field4>Tempat</label>
  <input type=text name='tempat' size=40>
   </p> 			
					 
   <p class=inline-small-label> 
   <label for=field4>Jam</label>
  <input type=text name='jam' size=40
   </p> 			
			
			
  <p class=inline-small-label> 
  <label for=field4>Tgl Mulai</label> : ";        
  combotgl(1,31,'tgl_mulai',$tgl_skrg);
  combonamabln(1,12,'bln_mulai',$bln_sekarang);
  combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);

  echo "</p> <p class=inline-small-label> 
          <label for=field4>Tgl Selesai</label> : ";        
          combotgl(1,31,'tgl_selesai',$tgl_skrg);
          combonamabln(1,12,'bln_selesai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);

    echo "</p> 
     		  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=agenda'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
   </form>";
   
    break;
  

  case "editagenda":
    $edit = mysql_query("SELECT * FROM agenda WHERE id_agenda='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT AGENDA</h1>
   </div>
   <div class='block-content'>	
	
   <form method=POST action='$aksi?module=agenda&act=update' enctype='multipart/form-data'>
   <input type=hidden name=id value=$r[id_agenda]>
		  
   <p class=inline-small-label> 
   <label for=field4>Tema</label>
   <input type=text name='tema' size=60 value='$r[tema]'>
   </p> 	
   
   		  
   <p class=inline-small-label> 
   <label for=field4>Isi Agenda</label>
  <textarea name='isi_agenda' style='width: 720px; height: 350px;'>$r[isi_agenda]</textarea>
   </p> 	
   
     <p class=inline-small-label> 
   <label for=field4>Gambar</label>
  <img src='../foto_agenda/$r[gambar]'><br/>
   </p> 	
   
   <p class=inline-small-label> 
   <label for=field4>Ganti Gambar</label>
  <input type=file name='fupload' size=30>
   </p> 
		  
   
   <p class=inline-small-label> 
   <label for=field4>Tempat</label>
  <input type=text name='tempat' size=40 value='$r[tempat]'>
   </p> 
   
      
   <p class=inline-small-label> 
   <label for=field4>Jam</label>
  <input type=text name='jam' size=40 value='$r[jam]'>
   </p> 
     	
   <p class=inline-small-label> 
   <label for=field4>Tgl Mulai</label> ";  
          $get_tgl=substr("$r[tgl_mulai]",8,2);
          combotgl(1,31,'tgl_mulai',$get_tgl);
          $get_bln=substr("$r[tgl_mulai]",5,2);
          combonamabln(1,12,'bln_mulai',$get_bln);
          $get_thn=substr("$r[tgl_mulai]",0,4);
          $thn_skrg=date("Y");
          combothn($thn_sekarang-2,$thn_sekarang+2,'thn_mulai',$get_thn);

   		 
		 
    echo "</p> <p class=inline-small-label> 
          <label for=field4>Tgl Selesai</label>";   
          $get_tgl2=substr("$r[tgl_selesai]",8,2);
          combotgl(1,31,'tgl_selesai',$get_tgl2);
          $get_bln2=substr("$r[tgl_selesai]",5,2);
          combonamabln(1,12,'bln_selesai',$get_bln2);
          $get_thn2=substr("$r[tgl_selesai]",0,4);
          combothn($thn_sekarang-2,$thn_sekarang+2,'thn_selesai',$get_thn2);

    echo "</p>
    
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=agenda'>Batal</a>
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