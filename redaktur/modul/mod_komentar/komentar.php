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

$aksi="modul/mod_komentar/aksi_komentar.php";
switch($_GET[act]){


  // Tampil Komentar
  default:
  
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>KOMENTAR BERITA</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>	  
	         
  <thead><tr>
  
  <th>No</th>
  <th>Nama</th>
  <th>Komentar</th>
  <th>Aktif</th>
  <th>Aksi</th>
  
  </thead>
  <tbody>";

    $p      = new Paging;
    $batas  = 20;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM berita,komentar 
  WHERE komentar.id_berita=berita.id_berita  
  ORDER BY id_komentar DESC");

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
	
  echo "<tr class=gradeX> 
  <td width=50><center>$g</center></td>
  <td>$r[nama_komentar]</td>
  <td><a href='../berita-$r[judul_seo].html#$r[id_komentar]' target='blank'>$r[isi_komentar]</a></td>
  <td><center>$r[aktif]</center></td>
  
  <td width=80>
   
  <a href=?module=komentar&act=editkomentar&id=$r[id_komentar] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=komentar&act=hapus&id=$r[id_komentar]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
   
  </td></tr>";

  $no++;}
  
  echo "</table>";
	
	
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM komentar"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

   
    break;
  
  case "editkomentar":
  $edit = mysql_query("SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");
  $r    = mysql_fetch_array($edit);

  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT KOMENTAR</h1>
   </div>
   <div class='block-content'>	 
	 
   <form method=POST action=$aksi?module=komentar&act=update>
   <input type=hidden name=id value=$r[id_komentar]>
    
   <p class=inline-small-label> 
   <label for=field4>Nama</label>
  <input type=text name='nama_komentar' size=30 value='$r[nama_komentar]'>
   </p> 	
		 
   <p class=inline-small-label> 
   <label for=field4>Website</label>
  <input type=text name='url' size=30 value='$r[url]'>
   </p> 	
		 		  
   <p class=inline-small-label> 
   <label for=field4>Komentar</label>
   <textarea name=isi_komentar style='width: 550px; height: 150px;'>$r[isi_komentar]</textarea>
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
									  

   echo  "<div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=komentar'>Batal</a>
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