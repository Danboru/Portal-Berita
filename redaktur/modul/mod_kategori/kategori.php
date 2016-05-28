<script>
function confirmdelete(delUrl) {
   if (confirm("Anda yakin ingin menghapus?")) {
      document.location = delUrl;
   }
}
</script>


<?php

//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_kategori/aksi_kategori.php";
switch($_GET[act]){
//update/////////////////////////////////////

  // Tampil kategori
  default:
echo "<div id=main-content> 
      <div class=container_12> 
      <div class=grid_12> 
      <br/>
	  <a href='?module=kategori&act=tambahkategori' class='button'>
     <span>Tambah Kategori Berita</span>
     </a></div>";

    if (empty($_GET['kata'])){
echo "<div class=grid_12> 
      <div class=block-border> 
      <div class=block-header> 
      <h1>KATEGORI BERITA</h1>
      <span></span> 
      </div> 
       <div class='block-content'>
		  
     <table id='table-example' class='table'>	  
  	  
    <thead><tr>
    <th>No</th>
    <th>Nama Kategori</th>
    <th>Link</th>
	<th>Aktif</th>
    <th>Aksi</th>
  
    </thead>
    <tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
    }
    else{
      $tampil=mysql_query("SELECT * FROM kategori 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_kategori DESC");
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
  <td>$r[nama_kategori]</td>
  <td>kategori-$r[id_kategori]-$r[kategori_seo].html</td>
  <td width=50><center>$r[aktif]</center></td>
  <td width=80>
   
  <a href=?module=kategori&act=editkategori&id=$r[id_kategori] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=kategori&act=hapus&id=$r[id_kategori]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
   
  </td></tr>";
  
      $no++;
      }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM kategori"));
      }
        else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM kategori WHERE username='$_SESSION[namauser]'"));
      }  
      break;    
      }
      else{
echo " <table id='table-example' class='table'>	  
	  
     <thead><tr>
     <th>No</th>
     <th>Nama Kategori</th>
     <th>Link</th>
     <th>Aksi</th>
  
     </thead>
     <tbody>";

      if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM kategori WHERE nama_kategori LIKE '%$_GET[kata]%' ORDER BY id_kategori DESC");
      }
      else{
      $tampil=mysql_query("SELECT * FROM kategori 
                           WHERE username='$_SESSION[namauser]'
                           AND nama_kategori LIKE '%$_GET[kata]%'       
                           ORDER BY id_kategori DESC");
      }
  
      $no = $posisi+1;
      while($r=mysql_fetch_array($tampil)){
echo "<tr class=gradeX> 
  <td><center>$no</center></td>
  <td>$r[nama_kategori]</td>
  <td>kategori-$r[id_kategori]-$r[kategori_seo].html</td>
  
  <td width=80>
   
  <a href=?module=kategori&act=editkategori&id=$r[id_kategori] title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></a>
   
  <a href=javascript:confirmdelete('$aksi?module=kategori&act=hapus&id=$r[id_kategori]') title='Hapus' class='with-tip'>
  &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
   
  </td></tr>";
			 
  
      $no++;
     }
echo "</tbody></table> ";

      if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM kategori WHERE nama_kategori LIKE '%$_GET[kata]%'"));
      }
      else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM kategori WHERE username='$_SESSION[namauser]' AND nama_kategori LIKE '%$_GET[kata]%'"));
      }  
      break;    
      }
	  
//batas update/////////////////////////////////////////////////////////////////////////
  
  // Form Tambah Kategori
  case "tambahkategori":
  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAH KATEGORI BERITA</h1>
   </div>
   <div class='block-content'>	
   
   <form method=POST action='$aksi?module=kategori&act=input'>
		  
   <p class=inline-small-label> 
   <label for=field4>Nama Kategori</label>
   <input type=text name='nama_kategori' size=40>
   </p> 
   
  	  
      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=kategori'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </li> </ul>
	  </form>";
	  
     break;
  
  // Form Edit Kategori  
  case "editkategori":
  $edit=mysql_query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
  $r=mysql_fetch_array($edit);

  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT KATEGORI BERITA</h1>
   </div>
   <div class='block-content'>	
	
   <form method=POST action=$aksi?module=kategori&act=update>
   <input type=hidden name=id value='$r[id_kategori]'>
		  
   <p class=inline-small-label> 
   <label for=field4>Nama Kategori</label>
   <input type=text name='nama_kategori' value='$r[nama_kategori]' size=40>
   </p>";
   
    if ($r[aktif]=='Y'){
      echo "<tr><td>Aktifkan di Homepage</td> <td> 
	  :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=radio name='aktif' value='Y' checked>Ya  
      <input type=radio name='aktif' value='N'>Tidak</td></tr>";}
									  
    else{
      echo "<tr><td>Aktifkan di Homepage</td> <td> 
	  :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=radio name='aktif' value='Y'>Ya 
      <input type=radio name='aktif' value='N' checked> Tidak</td></tr>";}

	 
	  echo " <br/><br/><div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=kategori'>Batal</a>
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
   ?>




   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>