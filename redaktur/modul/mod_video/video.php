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
	function GetCheckboxes($table, $key, $Label, $Nilai='') {
  $s = "select * from $table order by nama_tag";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck>$w[$Label] ";
  }
  return $str;
}
	
//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_video/aksi_video.php";
switch($_GET[act]){

  // Tampil Video
  default:
       
   echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=video&act=tambahvideo' class='button'>
   <span>Tambahkan Video</span>
   </a></div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>VIDEO</h1>
   <span></span> 
   </div>
   <div class='block-content'>		
    		  
   <table id='table-example' class='table'>	  
	  
   <thead><tr>	
   	   
    <th>No</th>
	<th>Judul Video</th>
	<th>Tgl. Posting</th>
	<th>Playlist</th>
	<th>Aksi</th>
	
   </thead>
   <tbody>";
	
	
    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);
	if ($_SESSION[leveluser]=='admin'){
	$tampil = mysql_query("SELECT * FROM video,playlist WHERE video.id_playlist=playlist.id_playlist ORDER BY id_video DESC");}
	else{
    $tampil = mysql_query("SELECT * FROM video,playlist WHERE (video.id_playlist=playlist.id_playlist) 
	AND (username='$_SESSION[namauser]')  ORDER BY id_video DESC");}
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
    $tgl_posting=tgl_indo($r[tanggal]);
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
   <td>$r[jdl_video]</td>
   <td>$tgl_posting</td>
   <td>$r[jdl_playlist]</td>
				
   <td width=80>
   <a href=?module=video&act=editvideo&id=$r[id_video] title='Edit' class='with-tip'>
   <center><img src='img/edit.png'></a>
   
   <a href=javascript:confirmdelete('$aksi?module=video&act=hapus&id=$r[id_video]&namafile=$r[gbr_video]') 
   title='Hapus' class='with-tip'>
   &nbsp;&nbsp;&nbsp;&nbsp;<img src='img/hapus.png'></center></a> 
	   
   </td></tr>";
				
				
      $no++;
    }
    echo "</table>";
	if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM video"));
    }
	else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM video WHERE username='$_SESSION[namauser]'"));
    }  
    
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
 
    break;
	
   case "tambahvideo":
   
	
   echo "
  <div id='main-content'>
  <div class='container_12'>

  <div class='grid_12'>
  <div class='block-border'>
  <div class='block-header'>
   
  <h1>TAMBAHKAN VIDEO</h1>
  </div>
  <div class='block-content'>

   <form method=POST action='$aksi?module=video&act=input' enctype='multipart/form-data'>
      
  <p class=inline-small-label> 
   <label for=field4>Judul Video</label>
  <input type=text name='jdl_video' size=60>
   </p> 	  
          
   <p class=inline-small-label> 
   <label for=field4>Playlist</label>
   <select name='playlist'>
   <option value=0 selected>- Pilih Playlist -</option>";
   $tampil=mysql_query("SELECT * FROM playlist ORDER BY jdl_playlist");
   while($r=mysql_fetch_array($tampil)){
   echo "<option value=$r[id_playlist]>$r[jdl_playlist]</option></p>";}
			
   echo "</select>
	
   <p class=inline-small-label> 
   <label for=field4>Keterangan</label>
   <textarea name='keterangan' style='width: 720px; height: 250px;'></textarea>
   </p> 	
		  
   <p class=inline-small-label> 
   <label for=field4>Gambar</label>
   <input type=file name='fupload' size=40> 
   </p> 		  
   
   
   <p class=inline-small-label> 
   <label for=field4>Link Youtube</label>
   <input type=text name='youtube' size=60><br/>
   contoh link: <span class style=\"color:#EA1C1C;\">http://www.youtube.com/embed/xbuEmoRWQHU
   </p> 	   
						  			
   <p class=inline-small-label> 
   <label for=field4>Video File</label>
   <input type=file name='fupload2' size=40> <br/>
   <span class style=\"color:#EA1C1C;\">Tipe video harus MP4/FLV
   </p> ";
		  

	  
   $tagvid = mysql_query("SELECT * FROM tagvid ORDER BY tag_seo");
   echo "<tr><td valign=top>Tag (Label):&nbsp;&nbsp;&nbsp;&nbsp;</td><td> ";
   while ($t=mysql_fetch_array($tagvid)){
   echo "<input type=checkbox value='$t[tag_seo]' name=tag_seo[]>$t[nama_tag] ";}
   
	  
	  
   echo " <br/><br/><div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=video'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </li> </ul>
  </form>";
		  
		  
  break;
    
    case "editvideo":
    $edit = mysql_query("SELECT * FROM video WHERE id_video='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	
  
  
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT VIDEO</h1>
   </div>
   <div class='block-content'>
  
    <form method=POST enctype='multipart/form-data' action=$aksi?module=video&act=update>
     <input type=hidden name=id value=$r[id_video]>
	
   <p class=inline-small-label> 
   <label for=field4>Judul Video</label>
  <input type=text name='jdl_video' size=60 value='$r[jdl_video]'>
   </p> 		  
     
   <p class=inline-small-label> 
   <label for=field4>Playlist</label>
   
   <select name='playlist'>";
   $tampil=mysql_query("SELECT * FROM playlist ORDER BY jdl_playlist");
   if ($r[id_playlist]==0){
   echo "<option value=0 selected>- Pilih Playlist -</option>"; }   
   while($w=mysql_fetch_array($tampil)){
   
   if ($r[id_playlist]==$w[id_playlist]){
   echo "<option value=$w[id_playlist] selected>$w[jdl_playlist]</option>";}
   else{
   echo "<option value=$w[id_playlist]>$w[jdl_playlist]</option></p> ";} }
   		  
     		  
         
    echo "</select>
     
   <p class=inline-small-label> 
   <label for=field4>Keterangan</label>
   <textarea name='keterangan' style='width:720px; height: 250px;'>$r[keterangan]</textarea>
   </p> 	 
	 
    <p class=inline-small-label> 
    <label for=field4>Gambar</label> ";
    if ($r[gbr_video]!=''){
    echo "<img src='../img_video/kecil_$r[gbr_video]'> </p>"; }
  	 
    echo "
	
    <p class=inline-small-label> 
    <label for=field4>Ganti Gambar</label>
    <input type=file name='fupload' size=30>
    </p> 
   		  
    <p class=inline-small-label> 
    <label for=field4>Link Youtube</label>
    <input type=text name='youtube' size=60 value='$r[youtube]'> <br/>
   contoh link: <span class style=\"color:#EA1C1C;\">http://www.youtube.com/embed/xbuEmoRWQHU
   </p> 	
      		  
   <p class=inline-small-label> 
   <label for=field4>Video Terpasang: </label>";
   
    echo "<div style='background-image:url(../img_video/kecil_$r[gbr_video]); 
	width: 250px; height: 140px; no-repeat; margin-left:110px; margin-bottom:100px;'>
   
   
   <iframe width='250' height='170' src='$r[youtube]' frameborder='0' allowfullscreen></iframe>
   
   <br/><br/><a href='../play-$r[id_video]-$r[jdl_video].html' target='blank' class='button red'> Test Play on website </a></div>
   </p>   
		  
    <p class=inline-small-label> 
    <label for=field4>Ganti Video</label>
    <input type=file name='fupload2' size=30>
	 <br/>
   <span class style=\"color:#EA1C1C;\">Tipe video harus MP4/FLV
    </p>";
	
    $d = GetCheckboxes('tagvid', 'tag_seo', 'nama_tag', $r[tagvid]);
	
	 echo "
   <p class=inline-small-label> 
   <label for=field4>Tag (label)</label>
   $d 
   </p>";

     echo "<br/><br/>
      <div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=video'>Batal</a>
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