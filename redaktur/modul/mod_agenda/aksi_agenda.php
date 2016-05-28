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

$module=$_GET[module];
$act=$_GET[act];

// Hapus agenda
if ($module=='agenda' AND $act=='hapus'){
  $data=mysql_fetch_array(mysql_query("SELECT gambar FROM agenda WHERE id_agenda='$_GET[id]'"));
  if ($data['gambar']!=''){
  mysql_query("DELETE FROM agenda WHERE id_agenda='$_GET[id]'");
     unlink("../../../foto_agenda/$_GET[namafile]");   
     unlink("../../../foto_agenda/small_$_GET[namafile]");   
  }
  else{
  mysql_query("DELETE FROM agenda WHERE id_agenda='$_GET[id]'");  
  }
  header('location:../../media.php?module='.$module);
}

// Input agenda
elseif ($module=='agenda' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file   = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  $mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
  $selesai=$_POST[thn_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[tgl_selesai];
  
  $tema_seo = seo_title($_POST['tema']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=agenda')</script>";
    }
    else{
    UploadAgenda($nama_file_unik);
    mysql_query("INSERT INTO agenda(tema,
                                  tema_seo, 
                                  isi_agenda,
                                  tempat,
                                  jam,
                                  tgl_mulai,
                                  tgl_selesai,
                                  tgl_posting,
                                  pengirim,
                                  gambar, 
                                  username) 
					                VALUES('$_POST[tema]',
					                       '$tema_seo', 
                                 '$_POST[isi_agenda]',
                                 '$_POST[tempat]',
                                 '$_POST[jam]',
                                 '$mulai',
                                 '$selesai',
                                 '$tgl_sekarang',
                                 '$_POST[pengirim]',
                                 '$nama_file_unik',
                                 '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module);
  }
  }
  else{
    mysql_query("INSERT INTO agenda(tema,
                                  tema_seo, 
                                  isi_agenda,
                                  tempat,
                                  jam,
                                  tgl_mulai,
                                  tgl_selesai,
                                  tgl_posting,
                                  pengirim,
                                  username) 
					                VALUES('$_POST[tema]',
					                       '$tema_seo', 
                                 '$_POST[isi_agenda]',
                                 '$_POST[tempat]',
                                 '$_POST[jam]',
                                 '$mulai',
                                 '$selesai',
                                 '$tgl_sekarang',
                                 '$_POST[pengirim]',
                                 '$_SESSION[namauser]')");
  header('location:../../media.php?module='.$module);
  }
}

// Update agenda
elseif ($module=='agenda' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  $mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
  $selesai=$_POST[thn_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[tgl_selesai];

  $tema_seo = seo_title($_POST['tema']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
  mysql_query("UPDATE agenda SET tema        = '$_POST[tema]',
                                 tema_seo    = '$tema_seo',
                                 isi_agenda  = '$_POST[isi_agenda]',
                                 tgl_mulai   = '$mulai',
                                 tgl_selesai = '$selesai',
                                 tempat      = '$_POST[tempat]',  
                                 jam         = '$_POST[jam]',  
                                 pengirim    = '$_POST[pengirim]'  
                           WHERE id_agenda   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  else{
    if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
    echo "<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
        window.location=('../../media.php?module=album')</script>";
    }
    else{
	
	$data_gambar = mysql_query("SELECT gambar FROM agenda WHERE id_agenda='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);
	@unlink('../../../foto_agenda/'.$r['gambar']);
	@unlink('../../../foto_agenda/'.'small_'.$r['gambar']);
    UploadAgenda($nama_file_unik,'../../../foto_agenda/',300,120);
	
  
    mysql_query("UPDATE agenda SET tema      = '$_POST[tema]',
                                 tema_seo    = '$tema_seo',
                                 isi_agenda  = '$_POST[isi_agenda]',
                                 tgl_mulai   = '$mulai',
                                 tgl_selesai = '$selesai',
                                 tempat      = '$_POST[tempat]',  
                                 jam         = '$_POST[jam]',  
                                 gambar      = '$nama_file_unik', 
                                 pengirim    = '$_POST[pengirim]'  
                           WHERE id_agenda   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
  }
  }
}
}
?>
