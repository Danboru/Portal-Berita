<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){

  echo "<link href='../../css/zalstyle.css' rel='stylesheet' type='text/css'>
  <link rel='shortcut icon' href='../../favicon.png' />
  
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  <img src='../../img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  </section>
  <section id='error-text'>
  <p><a class='button' href='../../index.php'> <b>LOGIN DI SINI</b> </a></p>
  </section>
  </div>";}
  
else{
$image_path = "../../../logo/zal_marking.png";
$font_path = "RIZAL.TTF";
$font_size = 14;       // in pixcels
//$water_mark_text_1 = "9";
$water_mark_text_2 = "SwaraKalibata";

function watermark_image($oldimage_name){
    global $image_path;
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = $owidth;
	$height = $oheight;    
    $im = imagecreatetruecolor($width, $height);
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width -10; 
    $pos_y = $height - $w_height - 10;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $oldimage_name, 100);
    imagedestroy($im);
	return true;
}

//fungsi thumb logo
function thumb_logo($nama_file){
//identitas file asli  
  $im_src = imagecreatefrompng($nama_file);
  
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 150;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  imagepng($im,"logo.png");
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus gallery
if ($module=='galerifoto' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gbr_gallery FROM gallery WHERE id_gallery='$_GET[id]'"));
  if ($data['gbr_gallery']!=''){
     mysql_query("DELETE FROM gallery WHERE id_gallery='$_GET[id]'");
     unlink("../../../img_galeri/$_GET[namafile]");   
     unlink("../../../img_galeri/kecil_$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM gallery WHERE id_gallery='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);


  mysql_query("DELETE FROM gallery WHERE id_gallery='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input gallery
elseif ($module=='galerifoto' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

 $gallery_seo = seo_title($_POST['jdl_gallery']);

  // Apabila ada gbr_gallery yang diupload
  if (!empty($lokasi_file)){
   // UploadGallerY($nama_file_unik);
	UploadGallerY($nama_file_unik,'../../../img_galeri/',300,120);
	watermark_image('../../../img_galeri/'.$nama_file_unik);
	watermark_image('../../../img_galeri/kecil_'.$nama_file_unik);

   mysql_query("INSERT INTO gallery(jdl_gallery,
                                    gallery_seo,
                                    id_album,
									username,
                                    keterangan,
                                    gbr_gallery) 
                            VALUES('$_POST[jdl_gallery]',
                                   '$gallery_seo',
                                   '$_POST[album]',
								   '$_SESSION[namauser]',
                                   '$_POST[keterangan]',
                                   '$nama_file_unik')");
								   
								   
  header('location:../../media.php?module='.$module);
  }
  else{
     mysql_query("INSERT INTO gallery(jdl_gallery,
                                    gallery_seo,
                                    id_album,
									username,
                                    keterangan) 
                            VALUES('$_POST[jdl_gallery]',
                                   '$gallery_seo',
                                   '$_POST[album]', 
								   '$_SESSION[namauser]',
                                   '$_POST[keterangan]')");
								   
								   
								   
  header('location:../../media.php?module='.$module);
  }
}

// Update gallery
elseif ($module=='galerifoto' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $gallery_seo = seo_title($_POST['jdl_gallery']);

  // Apabila gbr_gallery tidak diganti
  if (empty($lokasi_file)){
     mysql_query("UPDATE gallery SET jdl_gallery  = '$_POST[jdl_gallery]',
                                   gallery_seo   = '$gallery_seo', 
                                   id_album = '$_POST[album]',
                                   keterangan  = '$_POST[keterangan]'  
                             WHERE id_gallery   = '$_POST[id]'");
							 
  header('location:../../media.php?module='.$module);
  }
  else{    
    //UploadGallerY($nama_file_unik);
	// Penambahan fitur unlink utk menghapus file yg lama biar gak ngebek-ngebeki server ^_^
	$data_gbr_gallery= mysql_query("SELECT gbr_gallery FROM gallery WHERE id_gallery='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gbr_gallery);
	@unlink('../../../img_galeri/'.$r['gbr_gallery']);
	@unlink('../../../img_galeri/'.'kecil_'.$r['gbr_gallery']);
    UploadGallerY($nama_file_unik,'../../../img_galeri/',300,120);
	watermark_image('../../../img_galeri/'.$nama_file_unik);
	watermark_image('../../../img_galeri/kecil_'.$nama_file_unik);
	
	 mysql_query("UPDATE gallery SET jdl_gallery  = '$_POST[jdl_gallery]',
                                   gallery_seo   = '$gallery_seo', 
                                   id_album = '$_POST[album]',
                                   keterangan  = '$_POST[keterangan]',  
                                   gbr_gallery      = '$nama_file_unik'   
                             WHERE id_gallery   = '$_POST[id]'");
							 
							 
							 
    header('location:../../media.php?module='.$module);
	}
    
  }
}
}
?>
