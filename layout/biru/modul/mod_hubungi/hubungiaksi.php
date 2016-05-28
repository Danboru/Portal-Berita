 
 
  <div class='main-column-wrapper'>
  <div class='main-column-left'>
 
  <?php
  
  echo "
  <div class='blog-style-1'>
  <div class='post-title'>
  <b>Hubungi Kami</b>
  </div>";       
  
  $nama=trim($_POST[nama]);
  $email=trim($_POST[email]);
  $subjek=trim($_POST[subjek]);
  $pesan=trim($_POST[pesan]);
  
  $iden=mysql_fetch_array(mysql_query("SELECT * FROM identitas"));

if(empty($nama)) {
			echo 'Anda belum mengisikan NAMA<br/>';
			$err = TRUE;
		}
		if(empty($email)) {
			echo 'Anda belum mengisikan EMAIL<br/>';
			$err = TRUE;
		}
		if(empty($subjek)) {
			echo 'Anda belum mengisikan SUBJEK<br/>';
			$err = TRUE;
		}
		if(empty($pesan)) {
			echo 'Anda belum mengisikan PESAN<br/>';
			$err = TRUE;
		}
		if($err) {
			echo'<a href="javascript:history.go(-1)"><b>Ulangi Lagi</b><br/>';
		} elseif(!$err) {
  if(!empty($_POST['kode'])){
  if($_POST['kode']==$_SESSION['captcha_session']){

  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
 
 
  echo "<p><img src=$f[folder]/images/terimakasih.jpg   border=0></p>";
  
   $kepada = "$iden[email]"; 
   $judul = "Ada Pesan di $iden[nama_website]";
   $pesan = "Baru saja ada yang kirim pesan di $iden[nama_website]\n"; 
   $pesan .= "kunjungi $iden[url]"; 
   mail($kepada,$judul,$pesan,"From: $iden[email]\n Content-type:text/html\r\n"); }
  
  else{
  echo "<span class='table8'>Kode yang Anda masukkan tidak cocok<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";}}
  else{
  echo "<span class='table8'>Anda belum memasukkan kode<br />
  <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";}}
      

	
   echo "</div>
    </div>";            
  ?>

  <div class="sidebar">
   
   
   <!----------- IKLAN LAYANAN MASYARAKAT ----------------------->
  <div class="sidebar-item ">
  <div class="photo-gallery-widget">
  <?php
  $iklanatas=mysql_query("SELECT * FROM iklanatas  ORDER BY rand() DESC LIMIT 1");
  while($b=mysql_fetch_array($iklanatas)){
  echo "<a href='$b[url]'' target='_blank' title='$b[judul]'>
  <img width=260 src='foto_iklanatas/$b[gambar]' border=0></a>";}?>
  </div>
  </div>
  <!----------- AKHIR IKLAN LAYANAN MASYARAKAT ----------------------->
   
   
  <!----------- POLING------------------------>
  
  <div class="sidebar-item">
  <div class="latest-news">
  <div class="sidebar-title"><b>JAJAK PENDAPAT</b></div>
  <div class="list">
  <?php
  $tanya=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Pertanyaan'");
  $t=mysql_fetch_array($tanya);
  echo " <div class='poling1'>$t[pilihan]</div>";
  echo "<form method=POST action='hasil-poling.html'>";
  $poling=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
  while ($p=mysql_fetch_array($poling)){
  echo "<input class=marginpoling type=radio name=pilihan value='$p[id_poling]'/>
  <class style=\"color:#666;font-size:12px;font-weight:700\">&nbsp;&nbsp;$p[pilihan]<br />";}
  echo "<input style='width: 50px; height: 20px;' type=submit class=simplebtn value=PILIH /></form>
  <a href=lihat-poling.html><input style='width: 50px; height: 20px;' type=button class=simplebtn  
  value=LIHAT HASIL /></a>";
  ?>
  </div>
  </div>
  </div>

  <!----------- AKHIR POLING ------------------------>
  
  
  <!----------- PARIWARA ------------------------>
  <div class="sidebar-item">
  <div class="photo-gallery-widget">
  <div class="sidebar-title"><b>PARIWARA</b></div>
  <div class="photos">
  <?php
  $pasangiklan=mysql_query("SELECT * FROM pasangiklan WHERE id_pasangiklan ORDER BY rand() DESC LIMIT 2");

  while($b=mysql_fetch_array($pasangiklan)){
  echo "<a href='$b[url]''target='_blank' title='$b[judul]'>
  <img width=250 src='foto_pasangiklan/$b[gambar]' border=0></a>";}
  ?>
  </div>
  </div>
  </div>
  <!----------- AKHIR PARIWARA ------------------------>
  
  
 
  <!------------- AGENDA HARI INI  -------------------->
  <div class="sidebar-item">
  <div class="latest-news">
  <div class="sidebar-title"><b>AGENDA JAKARTA</b></div>
  <div class="list">
  
  <div id="test-widget" class="widget">
  <div class="nav">
  <span id="prev_test"></span>
  <span id="next_test"></span></div>
  <ul>
						
  
  <?php    
  $agenda=mysql_query("SELECT * FROM agenda ORDER BY rand() DESC LIMIT 6");
  while($a=mysql_fetch_array($agenda)){
  $tgl_mulai = tgl_indo($a[tgl_mulai]);
  $tgl_selesai = tgl_indo($a[tgl_selesai]);
  $isi_agenda = strip_tags($a['isi_agenda']);
  $isi = substr($isi_agenda,0,120);
  $isi = substr($isi_agenda,0,strrpos($isi," ")); 
  
  echo "							  
  <li><p><span class='tanggal02'><span>$tgl_mulai - $tgl_selesai</span></p>
  <a href='agenda-$a[tema_seo].html'><b>$a[tema]</b></a>
  <p>'$isi ...'</p>
  </li>";}
  ?>
  
  </ul></div></div>
  </div></div>
  
  <!------------- AKHIR AGENDA HARI INI  -------------------->
  
   
   
  <!----------- BERITA FOTO ------------------------>
  <div class="sidebar-item">
  <div class="photo-gallery-widget">
  <div class="sidebar-title"><b>BERITA FOTO</b></div>
  <?php
  $album= mysql_query("SELECT jdl_album, album.id_album, gbr_album, album_seo,  
  COUNT(gallery.id_gallery) as jumlah 
  FROM album LEFT JOIN gallery 
  ON album.id_album=gallery.id_album 
  WHERE album.aktif='Y'  
  GROUP BY id_album
  ORDER BY rand() DESC LIMIT 4");
  
  echo "<div class='photos2'>";              
  while($w=mysql_fetch_array($album)){
  $jdl_album=($w[jdl_album]);
  
  echo "
  <a href=album-$w[id_album]-$w[album_seo].html>
  <img src='img_album/kecil_$w[gbr_album]' alt='<b>$w[jdl_album]</b>' width=115 height=90
  class='tooltip' title='<b>$w[jdl_album]</b> ($w[jumlah] foto)'> </a>";}
  echo "</div>";
  ?>

  </div>
  </div>
  <!----------- AKHIR BERITA FOTO ------------------------>
  
 
  
  
  
  </div>
  <div class="clear">&nbsp;</div>
  </div>
  </div><br/>
 