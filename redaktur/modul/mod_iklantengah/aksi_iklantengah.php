<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

include "../../../config/koneksi.php";
include "../../../config/fungsi_seo.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus iklantengah
if ($module=='iklantengah' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM iklantengah WHERE id_iklantengah='$_GET[id]'"));
  if ($data['gambar']!=''){
  mysql_query("DELETE FROM iklantengah WHERE id_iklantengah='$_GET[id]'");
     unlink("../../../foto_iklantengah/$_GET[namafile]");
     unlink("../../../foto_iklantengah/small_$_GET[namafile]");
  }
  else{
  mysql_query("DELETE FROM iklantengah WHERE id_iklantengah='$_GET[id]'");
  }
  header('location:../../media.php?module='.$module);
}

// Input iklantengah
elseif ($module=='iklantengah' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file   = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  $mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
  $selesai=$_POST[thn_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[tgl_selesai];
  

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=iklantengah')</script>";
    }
    else{
    Uploadiklantengah($nama_file_unik);
   mysql_query("INSERT INTO iklantengah(judul,
                                      username,
                                    url,
                                    tgl_posting,
                                    gambar) 
                            VALUES('$_POST[judul]',
							      '$_SESSION[namauser]',
                                   '$_POST[url]',
                                   '$tgl_sekarang',
                                   '$nama_file_unik')");
  header('location:../../media.php?module='.$module);
  }
  }
  else{
     mysql_query("INSERT INTO iklantengah(judul,
                                  	 username,
                                    tgl_posting,
                                    url) 
                            VALUES('$_POST[judul]',
							      '$_SESSION[namauser]',
                                   '$tgl_sekarang',
                                   '$_POST[url]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update iklantengah
elseif ($module=='iklantengah' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  $mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
  $selesai=$_POST[thn_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[tgl_selesai];


  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
 mysql_query("UPDATE iklantengah SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]'
                             WHERE id_iklantengah = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=album')</script>";
    }
    else{
	
	$data_gambar = mysql_query("SELECT gambar FROM iklantengah WHERE id_iklantengah='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../foto_iklantengah/'.$r['gambar']);
	@unlink('../../../foto_iklantengah/'.'small_'.$r['gambar']);
    Uploadiklantengah($nama_file_unik,'../../../foto_iklantengah/',300,120);
	
    mysql_query("UPDATE iklantengah SET judul     = '$_POST[judul]',
                                   url       = '$_POST[url]',
                                   gambar    = '$nama_file_unik'   
                             WHERE id_iklantengah = '$_POST[id]'");

  header('location:../../media.php?module='.$module);
  }
  }
}
}
?>
