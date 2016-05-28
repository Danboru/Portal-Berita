<?php
include "../config/koneksi.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else{
  
$login=mysql_query("SELECT * FROM users WHERE username='".$username."' AND password='".$pass."' AND blokir='N'");
$ketemu= mysql_num_rows($login);
$result= mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();

  $_SESSION['namauser']     = $result['username'];
  $_SESSION['namalengkap']  = $result['nama_lengkap'];
  $_SESSION['passuser']     = $result['password'];
  $_SESSION['sessid']       = $result['id_session'];
  $_SESSION['leveluser']    = $result['level'];

  header('location: ../redaktur/media.php?module=home');
}
else{

   echo "
  <link href='css/zalstyle.css' rel='stylesheet' type='text/css'>";

  echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>LOGIN GAGAL</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">Username atau Password anda tidak sesuai.<br>
  Atau akun anda sedang diblokir.</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";

}
}
?>