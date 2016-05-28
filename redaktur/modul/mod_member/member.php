<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

//cek hak akses user
$cek=user_akses($_GET[module],$_SESSION[sessid]);
if($cek==1 OR $_SESSION[leveluser]=='admin'){

$aksi="modul/mod_member/aksi_member.php";
switch($_GET[act]){
  // Tampil Agenda
  default:
    echo "<h2>Member</h2>
          <table>
          <tr><th>no</th><th>nama</th><th>email</th><th>aksi</th></tr>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);
	
    $tampil=mysql_query("SELECT * FROM member ORDER BY id_member DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$no</td>
                <td width=220>$r[nama]</td>
                <td>$r[email]</td>
				<td><a href=$aksi?module=member&act=hapus&id=$r[id_member]>Hapus</a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM member"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div id=paging>$linkHalaman</div><br>";

    break;
	}
//kurawal akhir hak akses module
} else {
	echo akses_salah();
}
}
?>
