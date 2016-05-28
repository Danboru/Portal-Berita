
<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>

<?php
session_start();
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}

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
$aksi="modul/mod_halamanstatis/aksi_halamanstatis.php";
switch($_GET[act]){

//update/////////////////////////////////////

  // Tampil halamanstatis
  default:
echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <br/>
	  <a href='?module=halamanstatis&act=tambahhalamanstatis' class='button'>
	  <span>Tambah Halaman Baru<img src='images/plus-small.gif' width='12' height='9'/></span>
      </a></div>";

    if (empty($_GET['kata'])){
echo "<div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>Halaman Baru</h1>
      <span></span> 
      </div> 
      <div class=block-content> 
      <table id=table-example class=table>
      <thead> 
      <tr> 
      <th>No.</th> 
      <th>Judul</th> 
	  <th>Link</th>
      <th>Tanggal Posting</th>  
	  <th>Aksi</th>
      </tr> 
      </thead>
	  <tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM halamanstatis ORDER BY id_halaman DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM halamanstatis 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_halaman DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
    $tgl_posting=tgl_indo($r[tgl_posting]);

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
      <td width=50>$g</td> 
      <td>$r[judul]</td> 
      <td>hal-$r[judul_seo].html</td>
      <td>$tgl_posting</td>
	  
 <td width=80>
   
  <a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]&namafile=$r[gambar]') 
  title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
	   
  </td></tr>";
  
      $no++;
      }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM halamanstatis"));
      }
        else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM halamanstatis WHERE username='$_SESSION[namauser]'"));
      }  
      break;    
      }
      else{
echo "<table id=table-example class=table>
      <thead> 
      <tr> 
      <th>No.</th> 
      <th>Judul</th> 
	  <th>Link</th>
      <th>Gambar</th> 
	  <th>Aksi</th>
      </tr> 
      </thead>
	  <tbody> ";

      if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM halamanstatis WHERE judul LIKE '%$_GET[kata]%' ORDER BY id_halaman DESC LIMIT $posisi,$batas");
      }
      else{
      $tampil=mysql_query("SELECT * FROM halamanstatis 
                           WHERE username='$_SESSION[namauser]'
                           AND judul LIKE '%$_GET[kata]%'       
                           ORDER BY id_halaman DESC LIMIT $posisi,$batas");
      }
  
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
      <td>$no</td> 
      <td>$r[judul]</td> 
	      <td>hal-$r[judul_seo].html</td>
      <td><img src='../foto_statis/small_$r[gambar]'></td>
	  
 <td width=80>
   
  <a href=?module=halamanstatis&act=edithalamanstatis&id=$r[id_halaman] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=halamanstatis&act=hapus&id=$r[id_halaman]&namafile=$r[gambar]') 
  title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
	   
  </td></tr>";
  
      $no++;
     }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM halamanstatis WHERE judul LIKE '%$_GET[kata]%'"));
      }
      else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM halamanstatis WHERE username='$_SESSION[namauser]' AND judul LIKE '%$_GET[kata]%'"));
      }  
      break;    
      }
	  
//batas update/////////////////////////////////////////////////////////////////////////

  case "tambahhalamanstatis":
  
  echo "
  <div id='main-content'>
  <div class='container_12'>

  <div class='grid_12'>
  <div class='block-border'>
  <div class='block-header'>
   
  <h1>TAMBAH HALAMAN BARU</h1>
  </div>
  <div class='block-content'>
	
  <form method=POST action='$aksi?module=halamanstatis&act=input' enctype='multipart/form-data'>
		  
   <p class=inline-small-label> 
   <label for=field4>Judul</label>
   <input type=text name='judul' size=50>
   </p> 
		  
   <p class=inline-small-label> 
   <label for=field4>Isi Halaman</label>
   <textarea name='isi_halaman'  style='width: 720px; height: 350px;'></textarea>
   </p> 

   <p class=inline-small-label> 
   <span class=label>Gambar</span>
   <input type='file' name='fupload'/><br/>
   </p><br/>
   		  
   	  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=halamanstatis'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </form>";
	  
   break;
    
   case "edithalamanstatis":
   $edit = mysql_query("SELECT * FROM halamanstatis WHERE id_halaman='$_GET[id]' AND username='$_SESSION[namauser]'");
    $r    = mysql_fetch_array($edit);
   
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT HALAMAN</h1>
   </div>
   <div class='block-content'>
	
   <form method=POST enctype='multipart/form-data' action=$aksi?module=halamanstatis&act=update>
   <input type=hidden name=id value=$r[id_halaman]>
		 
		  
   <p class=inline-small-label> 
   <label for=field4>Judul</label>
  <input type=text name='judul' size=60 value='$r[judul]'>
   </p> 
 		  
   <p class=inline-small-label> 
   <label for=field4>Isi Halaman</label>
   <textarea name='isi_halaman' style='width: 550px; height: 500px;'>$r[isi_halaman]</textarea></td>
   </p> 
	
	<p class=inline-small-label> 
	<span class=label>Gambar</span>";
    if ($r[gambar]!=''){
    echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src='../foto_statis/$r[gambar]' width=200><br/><br/>"; }

	echo "</p>
    <p class=inline-small-label> 
	<span class=label>Ganti Gambar</span>
	<input type='file' name='fupload' /></p><br/>";
	  


  echo "<div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=halamanstatis'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </form>";
	  
	  
	      break;  
   }

   }
   ?>
   
   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>