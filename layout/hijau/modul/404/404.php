  
  <div class='main-column-wrapper'>
  <div class='main-column-left'>
  <?php
 
  
  echo "<br /><div class='post post-style-1'><img src=$f[folder]/images/peringatan_rzl.jpg><br />
  <div class='info'><span class style=\"font-size:12px;\">Maaf, halaman yang anda minta tidak ada. Atau halaman tersebut telah kami hapus.
  </span>
  </div>";
  
 
  
  ?>
 </div></div>
 
  <div class="sidebar">

  
  
  <!------------- TABS BERITA -------------------->
  <div class="sidebar-item">
  <div class="latest-activity">
								
  <!-- TAB JUDUL -->
  <div class="tabs-1">
  <table><tr>
  
  <td><a href="#" class="tab-1 kernel_triple_btn active" id="kernel_triple_popular_btn_kernel_3">
  <span>Video</span></a></td>
  
  <td><a href="#" class="tab-1 tab-1-disabled kernel_triple_btn" id="kernel_triple_recent_btn_kernel_3">
  <span>Terpopuler</span></a></td>
  
  <td><a href="#" class="tab-1 tab-1-disabled kernel_triple_btn" id="kernel_triple_comments_btn_kernel_3">
  <span>Komentar</span></a></td>
  
  </tr></table>
  </div>
  <!-- AKHIR TAB JUDUL -->	
									
   <!-- BAGIAN POPULER -->								
 
  <div id="kernel_triple_recent_kernel_3" style="display: none;">
  <div class="list">
  <?php    

  //Terpopuler berdasarkan seminggu 
  $hari_ini=date("Ymd");
  $sebelum=mktime(0, 0, 0, date("m"), date("d") - 7, date("Y"));    
  $tgl_sebelumnya=date("Ymd", $sebelum);
  $populer=mysql_query("SELECT * FROM berita WHERE tanggal BETWEEN '$tgl_sebelumnya' AND '$hari_ini' 
  ORDER BY dibaca DESC LIMIT 4"); 
 

   /*  Terpopuler harian
  $hari_ini=date("Ymd");
  $populer=mysql_query("SELECT * FROM berita WHERE tanggal='$hari_ini' ORDER BY dibaca DESC LIMIT 4");
  */ 
 
  while($p=mysql_fetch_array($populer)){
  $baca = $p[dibaca]+1;
  $isi_berita = strip_tags($p['isi_berita']); 
  $isi = substr($isi_berita,0,100); 
  $isi = substr($isi_berita,0,strrpos($isi," ")); 
  
  echo "
  <div class='item'>
  <div class='image'>
  <a href=berita-$p[judul_seo].html>
  <img src='foto_berita/small_$p[gambar]' width=60 height=50 border=0></a>
  </div>";
  echo "<div class='text'>
  <a href=berita-$p[judul_seo].html class='tooltip'  title='$isi ...'>
  <span class='judulberita1'>$p[judul]</span></a>
  <p><span class='tanggal01'><span>dibaca: $baca pembaca</span></p></div>
  </div>";}
  ?>
  </div>
  </div>	
  <!-- AKHIR BAGIAN POPULER -->								
								

  <!-- BAGIAN KOMENTAR -->	
  <div id="kernel_triple_comments_kernel_3" style="display: none;">
  <div class="list">
  <?php    
  $komentar=mysql_query("SELECT * FROM berita,komentar 
  WHERE komentar.id_berita=berita.id_berita  
  ORDER BY id_komentar DESC LIMIT 6");
  while($k=mysql_fetch_array($komentar)){
  $isi_komentar = strip_tags($k['isi_komentar']); 
  $isi = substr($isi_komentar,0,100); 
  $isi = substr($isi_komentar,0,strrpos($isi," ")); 
  echo "
  <div class='item'>
  <div class='image'>
  </div>";
  echo "<div class='text2'>
  <span class='judulberita1'><a href='http://$k[url]' target='_blank'>$k[nama_komentar]</span></a>
  <p><class style=\"color:#EA1C1C;font-size:12px\">pada 
  <a href='berita-$k[judul_seo].html#$k[id_komentar]' class='tooltip' title='$isi ...'><b>$k[judul]</b></a></div>
  </div>";}
  ?>
  </div>
  </div>	
  <!-- AKHIR BAGIAN KOMENTAR -->	

  <!-- BAGIAN VIDEO -->	
  <div id="kernel_triple_popular_kernel_3">
  <div class="list">
  
  
  <?php    
  
  //Terpopuler berdasarkan seminggu 
  $hari_ini=date("Ymd");
  $sebelum=mktime(0, 0, 0, date("m"), date("d") - 7, date("Y"));    
  $tgl_sebelumnya=date("Ymd", $sebelum);
  
  $terkini2=mysql_query("select youtube, dibaca, judul, judul_seo, jam, 
                       berita.id_berita, hari, tanggal, isi_berita    
                       from berita WHERE tanggal BETWEEN '$tgl_sebelumnya' AND '$hari_ini' 
                       group by youtube ORDER BY youtube DESC LIMIT 1"); 
  
  /*
  //Terpopuler berdasarkan harian
  $hari_ini=date("Ymd");
  $terkini2=mysql_query("select youtube, dibaca, judul, judul_seo, jam, 
                       berita.id_berita, hari, tanggal, gambar, isi_berita    
                       from berita WHERE tanggal='$hari_ini'
                       group by berita.youtube ORDER BY dibaca DESC LIMIT 1");  */   
					   
  while($d=mysql_fetch_array($terkini2)){
  $baca = $d[dibaca]+1;
  $tgl = tgl_indo($d['tanggal']);
  $isi_berita = strip_tags($d['isi_berita']); 
  $isi = substr($isi_berita,0,150); 
  $isi = substr($isi_berita,0,strrpos($isi," ")); 
  
  $judul = strip_tags($d['judul']); 
  $judul = substr($judul,0,40); 
  $judul = substr($judul,0,strrpos($judul," ")); 
  
  echo "
  <div class='item'>
  <iframe width='250' height='170' src='$d[youtube]' frameborder='0' allowfullscreen></iframe>
  <p><span class='tanggal01'><span> $d[hari], $tgl</span>
  <span class style=\"color:#EA1C1C;\"> | </span>dilihat: $baca pengunjung</span></p>
  <a href=berita-$d[judul_seo].html  class='tooltip' title='$d[judul]'>
  <b>$judul...</b></a>
  </div>";}
 
  ?>
  </div>
  </div>	
  <!-- AKHIR VIDEO-->	
  </div>
  </div>	
  <!------------- AKHIR TABS BERITA -------------------->
  
  <!----------- FACEBOOK LIKE------------------------>
  
  <div class="sidebar-item">
  <div class="latest-news ">
  <div class="sidebar-title"><b>FACEBOOK FAN PAGE</b></div>
  <div class="list">
  <div class="fbluar">
  <div class="fbdalam">
  <div class="fb-like-box"
  data-width="250" data-height="480"
  data-href="<?php include "fb.php";?>"
  data-border-color="#FFF" data-show-faces="true"
  data-stream="false" data-header="false">
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>

  <!----------- AKHIR FACEBOOK LIKE ------------------------>

  <!------------- JAKARTA TERKINI -------------------->
  
  <div class="sidebar-item">
  <div class="latest-news">
  <div class="sidebar-title"><b>JAKARTA TERKINI</b></div>
  <div class="list">
  <?php   
  
  $terkini=mysql_query("SELECT * FROM berita WHERE id_kategori ='41' ORDER BY id_berita DESC LIMIT 4");
  while($t=mysql_fetch_array($terkini)){
  $tgl = tgl_indo($t['tanggal']);
  echo "<div class='item'>
  <div class='image'>
  <a href=berita-$t[judul_seo].html>
  <img src='foto_berita/small_$t[gambar]' width=60 height=50 border='0'></a>
  </div>";
  echo "<div class='text'>
  <a href=berita-$t[judul_seo].html><span class='judulberita1'>$t[judul]</span></a>
  <p><span class='tanggal01'><span> $t[hari], $tgl</span></p></div>
  </div>";}
  ?>
  </div>
  </div>
  </div>
  <!------------- AKHIR JAKARTA TERKINI  -------------------->



  <!----------- PARIWARA ------------------------>
  <div class="sidebar-item">
  <div class="photo-gallery-widget">
  <div class="sidebar-title"><b>PARIWARA</b></div>
  <div class="photos">
  <?php
  $pasangiklan=mysql_query("SELECT * FROM pasangiklan WHERE id_pasangiklan ORDER BY rand() DESC LIMIT 2");

  while($b=mysql_fetch_array($pasangiklan)){
  echo "<a href='$b[url]' 'target='_blank' title='$b[judul]'>
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
  ORDER BY rand() DESC LIMIT 2");
  
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
  
  
  <!----------- POLING------------------------>
  
  <div class="sidebar-item last">
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
  </div><BR/>

  <!----------- AKHIR POLING ------------------------>
 
  
  
  </div>
  <div class="clear">&nbsp;</div>
  </div>
  </div><br/>
 