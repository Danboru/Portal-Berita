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
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];

// Input playlist
if ($module=='playlist' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  $playlist_seo = seo_title($_POST['jdl_playlist']);

  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadPlaylist($nama_file_unik);
    mysql_query("INSERT INTO playlist(jdl_playlist,
	                                    username,
                                    playlist_seo,
                                    gbr_playlist) 
                            VALUES('$_POST[jdl_playlist]',
							       '$_SESSION[namauser]',
                                   '$playlist_seo',
                                   '$nama_file_unik')");
  }
  else{
    mysql_query("INSERT INTO playlist(jdl_playlist,
	                                        username,
                                    playlist_seo) 
                            VALUES('$_POST[jdl_playlist]',
							    '$_SESSION[namauser]',
                                   '$playlist_seo')");
  }
  header('location:../../media.php?module='.$module);
}

// Update playlist
elseif ($module=='playlist' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file; 

  $playlist_seo = seo_title($_POST['jdl_playlist']);

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE playlist SET jdl_playlist     = '$_POST[jdl_playlist]',
                                  playlist_seo     = '$playlist_seo', 
                                  aktif='$_POST[aktif]' 
                             WHERE id_playlist = '$_POST[id]'");
  }
  else{
    UploadPlaylist($nama_file_unik);
	
	
    $data_gambar = mysql_query("SELECT gbr_playlist FROM playlist WHERE id_playlist='$_POST[id]'");
	$r    	= mysql_fetch_array($data_gambar);	
	@unlink('../../../img_playlist/'.'kecil_'.$r['gbr_playlist']);
	@unlink('../../../img_playlist/'.$r['gbr_playlist']);
	
    mysql_query("UPDATE playlist SET jdl_playlist  = '$_POST[jdl_playlist]',
                                   playlist_seo = '$playlist_seo',
                                   gbr_playlist    = '$nama_file_unik', 
                                   aktif='$_POST[aktif]'    
                             WHERE id_playlist = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
}
?>
