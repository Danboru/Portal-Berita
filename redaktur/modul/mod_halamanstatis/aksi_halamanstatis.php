<?php
session_start();
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

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus halamanstatis
if ($module=='halamanstatis' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM halamanstatis WHERE id_halaman='$_GET[id]'"));
  if ($data[gambar]!=''){
     mysql_query("DELETE FROM halamanstatis WHERE id_halaman='$_GET[id]'");
     unlink("../../../foto_statis/$_GET[namafile]");   
     unlink("../../../foto_statis/small_$_GET[namafile]");   
  }
  else{
     mysql_query("DELETE FROM halamanstatis WHERE id_halaman='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}


// Input halamanstatis
elseif ($module=='halamanstatis' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

  $judul_seo      = seo_title($_POST[judul]);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadStatis($nama_file_unik);

   mysql_query("INSERT INTO halamanstatis(judul,
	                                       judul_seo,
										   isi_halaman,
										   tgl_posting,
										   gambar,
										   username,
										     dibaca,
										      jam,
											  hari) 
									VALUES('$_POST[judul]',
										   '$judul_seo', 
										   '$_POST[isi_halaman]',
										   '$tgl_sekarang',
										   '$nama_file_unik',
										   '$_SESSION[namauser]',
										   '$_POST[dibaca]', 
										     '$jam_sekarang',
										    '$hari_ini')");
  header('location:../../media.php?module='.$module);
  }
  else{
   mysql_query("INSERT INTO halamanstatis(judul,
	                                       judul_seo,
										   isi_halaman,
										   tgl_posting,
										   username,
										     dibaca,
										      jam,
											  hari) 
									VALUES('$_POST[judul]',
										   '$judul_seo', 
										   '$_POST[isi_halaman]',
										   '$tgl_sekarang',
										   '$_SESSION[namauser]',
										   '$_POST[dibaca]', 
										     '$jam_sekarang',
										    '$hari_ini')");
  header('location:../../media.php?module='.$module);
  }
}
// Update halamanstatis
elseif ($module=='halamanstatis' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  
  $judul_seo      = seo_title($_POST['judul']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE halamanstatis SET judul        = '$_POST[judul]',
                                        judul_seo    = '$judul_seo',
                                        isi_halaman  = '$_POST[isi_halaman]'  
                                  WHERE id_halaman   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
   $data_gambar = mysql_query("SELECT gambar FROM halamanstatis WHERE id_halaman='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../foto_statis/'.$r['gambar']);
	@unlink('../../../foto_statis/'.'small_'.$r['gambar']);
    UploadStatis($nama_file_unik ,'../../../foto_statis/');
    mysql_query("UPDATE halamanstatis SET judul        = '$_POST[judul]',
                                          judul_seo    = '$judul_seo',
                                          isi_halaman  = '$_POST[isi_halaman]',
                                          gambar       = '$nama_file_unik'   
                                    WHERE id_halaman   = '$_POST[id]'");
    header('location:../../media.php?module='.$module);
  }
}
}
?>
