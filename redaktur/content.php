   
   <?php
   include "../config/koneksi.php";
   include "../config/library.php";
   include "../config/fungsi_indotgl.php";
   include "../config/fungsi_combobox.php";
   include "../config/class_paging.php";

   // Bagian Home
   if ($_GET['module']=='home'){
   if ($_SESSION['leveluser']=='admin'){
   echo "
  
   <div id='main-content'>
   <div class='container_12'>
   <div class='grid_12'>
                             
   <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda <br/>atau pilih ikon-ikon pada  
   Control Panel di bawah ini:</p>
   </div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>MODUL ADMINISTRATOR</h1>
   <span></span> 
   </div>
   <div class='block-content'>
 
   <ul class='shortcut-list'>
  
   <li><a href=media.php?module=menu><img src='img/modul.png'/>Menu</a></li>
   <li><a href=media.php?module=berita><img src='img/berita.png'/>Berita</a></li>
   <li><a href=media.php?module=templates><img src='img/template.png'/>Template</a></li>
   <li><a href=media.php?module=agenda><img src='img/agenda.png'/>Agenda</a></li>
   <li><a href=media.php?module=album><img src='img/album.png'/>Album Foto</a></li>
   <li><a href=media.php?module=galerifoto><img src='img/foto.png'/>Galeri Foto</a></li>
   <li><a href=media.php?module=poling><img src='img/poling.png'/>Jajak Pendapat</a></li>
   <li><a href=media.php?module=logo><img src='img/gantilogo.png'/>Logo Website</a></li>
   <li><a href=media.php?module=user><img src='img/user.png'/>User Admin</a></li>
   <li><a href=media.php?module=video><img src='img/video.png'/>Video</a></li>
   <li><a href=media.php?module=iklantengah><img src='img/iklan1.png'/>Iklan Home</a></li>
   <li><a href=media.php?module=pasangiklan><img src='img/iklan2.png'/>Iklan Sidebar</a></li>
   <li><a href=media.php?module=iklanatas><img src='img/iklan3.png'/>Iklan Layanan</a></li>
   <li><a href=media.php?module=hubungi><img src='img/kontak.png'/>Pesan Masuk</a></li>
   <li><a href=media.php?module=komentar><img src='img/komentar.png'/>Komentar</a></li>
   <li><a href=media.php?module=modul><img src='img/module.png'/>Modul Web</a></li>

   </ul>

  <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  
   // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik 
  WHERE tanggal='$tanggal' GROUP BY  tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "
 <p align=right><b>Pengunjung Website : $pengunjungonline </b><br />
 <b>Hits Hari Ini: $hits[hitstoday] </b></p><br />";
   echo " </div>";
  
  
 
  } else {
  
 echo "<div id='main-content'>
 <div class='container_12'>
 <div class='grid_12'>
                             
 <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda. <br/></p>
 </div>
 <div class='grid_12'>

 <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  
   // Statistik user
  $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
  $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
  $waktu   = time(); // 

  // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
  $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
  // Kalau belum ada, simpan data user tersebut ke database
  if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
  } 
  else{
    mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
  }

  $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
  $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
  $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
  $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
  $bataswaktu       = time() - 300;
  $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

  $path = "counter/";
  $ext = ".png";

  $tothitsgbr = sprintf("%06d", $tothitsgbr);
  for ( $i = 0; $i <= 9; $i++ ){
	   $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
  }

  echo "
 <p align=right><b>Pengunjung Website : $pengunjungonline </b><br />
 <b>Hits Hari Ini: $hits[hitstoday] </b></p><br />";
  echo " </div>";
 }
}


// Bagian Option
elseif ($_GET[module]=='option'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_option/option.php";
  }
}

// (BARU) Bagian Header
elseif ($_GET[module]=='header'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_header/header.php";
  }
}
// Bagian Pasang Iklan
elseif ($_GET['module']=='pasangiklan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_pasangiklan/pasangiklan.php";
  }
}

// Bagian Pasang Iklan
elseif ($_GET['module']=='iklantengah'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_iklantengah/iklantengah.php";
  }
}


// Bagian Pasang Iklan
elseif ($_GET['module']=='iklanatas'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_iklanatas/iklanatas.php";
  }
}



// Bagian User
elseif ($_GET['module']=='profil'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_profil/profil.php";
  }
}

// Bagian Testimoni
elseif ($_GET[module]=='testimoni'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_testimoni/testimoni.php";
  }
}
// Bagian User
elseif ($_GET['module']=='user'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_users/users.php";
  }
}

// Bagian Modul
elseif ($_GET['module']=='modul'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_modul/modul.php";
  }
}
// Bagian Aktialita
elseif ($_GET['module']=='aktualita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_aktualita/aktualita.php";                            
  }
}
// Bagian Kategori
elseif ($_GET['module']=='kategori'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_kategori/kategori.php";
  }
}

// Bagian Berita
elseif ($_GET['module']=='berita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_berita/berita.php";                            
  }
}

// Bagian Komentar Berita
elseif ($_GET['module']=='komentar'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_komentar/komentar.php";
  }
}

// Bagian Tag
elseif ($_GET['module']=='tag'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_tag/tag.php";
  }
}

// Bagian Agenda
elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_agenda/agenda.php";
  }
}

// Bagian Banner
elseif ($_GET['module']=='banner'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_banner/banner.php";
  }
}

// Bagian Poling
elseif ($_GET['module']=='poling'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_poling/poling.php";
  }
}

// Bagian Alamat
elseif ($_GET['module']=='alamat'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_alamat/alamat.php";
  }
}

// Bagian Download
elseif ($_GET['module']=='download'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_download/download.php";
  }
}

// Bagian Hubungi Kami
elseif ($_GET['module']=='hubungi'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_hubungi/hubungi.php";
  }
}

// Bagian Templates
elseif ($_GET['module']=='templates'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_templates/templates.php";
  }
}

// Bagian Shoutbox
elseif ($_GET['module']=='shoutbox'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_shoutbox/shoutbox.php";
  }
}

// Bagian Album
elseif ($_GET['module']=='album'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_album/album.php";
  }
}

// Bagian Galeri Foto
elseif ($_GET['module']=='galerifoto'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_galerifoto/galerifoto.php";
  }
}

// Bagian Kata Jelek
elseif ($_GET['module']=='katajelek'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_katajelek/katajelek.php";
  }
}

// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Menu Utama
elseif ($_GET['module']=='menu'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_menu/menu.php";
  }
}


// Bagian Halaman Statis
elseif ($_GET['module']=='halamanstatis'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_halamanstatis/halamanstatis.php";
  }
}

// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}


// Bagian YM
elseif ($_GET[module]=='ym'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_ym/ym.php";
  }
}


// Bagian Logo
elseif ($_GET[module]=='logo'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_logo/logo.php";
  }
}



//----------------video------------------>
// Bagian Playlist
elseif ($_GET['module']=='playlist'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_playlist/playlist.php";
  }
}

// Bagian Video
elseif ($_GET['module']=='video'){
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_video/video.php";
  }
}

// Bagian KomentarVideo 
elseif ($_GET['module']=='komentarvid'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_komentarvid/komentarvid.php";
  }
}

// Bagian Tag Video
elseif ($_GET['module']=='tagvid'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_tagvid/tagvid.php";
  }
}

// Bagian Identitas Website
elseif ($_GET['module']=='identitas'){
   if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_identitas/identitas.php";
  }
}


// Bagian Daftar Member
elseif ($_GET['module']=='member'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_member/member.php";
  }
}

  
  // Bagian Background
  elseif ($_GET[module]=='background'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
  include "modul/mod_background/background.php";}}   


// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}


?>
