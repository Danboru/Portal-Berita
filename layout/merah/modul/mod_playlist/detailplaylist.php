 
  <div class='main-column-wrapper'>
  <div class='main-column-left'>

  <?php
  
  $g2 = mysql_query("SELECT * FROM playlist WHERE id_playlist='$_GET[id]'");
  $w2 = mysql_fetch_array($g2);
		  
  echo " <div class='blog-style-1'>
  <div class='post-title'>
  <b><a href=semua-playlist.html>Playlist Video:</a>
  <span class style=\"color:#EA1C1C;\">$w2[jdl_playlist]</span> </b>
  </div>";
  
  $p      = new Paging11;
  $batas  = 20;
  $posisi = $p->cariPosisi($batas);

  // Tentukan kolom
  $col = 4;

  $g = mysql_query("SELECT * FROM video WHERE id_playlist='$_GET[id]' ORDER BY rand() DESC LIMIT $posisi,$batas");
  $ada = mysql_num_rows($g);
  if ($ada > 0) {
  echo "<table><tr>";
  $cnt = 0;

  while ($w = mysql_fetch_array($g)) {
  if ($cnt >= $col) {
  echo "</tr><tr>";
  $cnt = 0;}
  $cnt++;
	
  echo "<div class='photo-gallery'>
  <div class='row2'>
  <div class='index-item'>
  <a href='play-$w[id_video]-$w[video_seo].html'>
  <img src='img_video/kecil_$w[gbr_video]' alt='$w[jdl_video]'  width=125 height=105
  class='tooltip'  title='PLAY (klik di sini)'/></a>
  <p align='center'> <a href='play-$w[id_video]-$w[video_seo].html'><b>$w[jdl_video]</b></a></p>
  </div>";}
  echo "</tr></table></div>";
	
  
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM video WHERE id_playlist='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halvideo], $jmlhalaman);


   
  echo "<div class='pages'> $linkHalaman</div><br/><br/>";

  }else{
  echo "<h5>Belum ada video pada halaman ini. </h5></div><br/><br/>"; }
  
  /// VIDEO POPULER ////////////////////////////////////////////////////////////////////////
  
  echo "
  <div class='blog-style-1'>
  <div class='post-title'>
  <b>Video<span class style=\"color:#EA1C1C;\">  Terpopuler</span></b>
  </div>";      
  
  $detail2=mysql_query("SELECT * FROM video,users WHERE users.username=video.username ORDER BY dilihat DESC limit 4");
  while ($d2   = mysql_fetch_array($detail2)){
  $tgl = tgl_indo($d2[tanggal]);
  $lihat = $d2[dilihat]+1;
  
  $komentar = "SELECT * FROM komentarvid WHERE id_video = '".$d2['id_video']."'";
  $zalkomentar = mysql_query($komentar);
  $total_komentar = mysql_num_rows($zalkomentar);
  
  echo "<div class='item'>
  <h2><a href='play-$d2[id_video]-$d2[video_seo].html'>$d2[jdl_video]</a></h2>
  <div class='info'> <span class='date'>$d2[hari], $tgl - $d2[jam] WIB <span class style=\"color:#EA1C1C;\">|</span> 
  dilihat: $lihat pengunjung
  <span class style=\"color:#EA1C1C;\">|</span> komentar: $total_komentar</span> </div>

  <a href='play-$d2[id_video]-$d2[video_seo].html'>
  <img src='img_video/kecil_$d2[gbr_video]' width=75 height=65 class='image' /></a>";
		
  $isi_berita = (strip_tags($d2[keterangan]));
  $isi = substr($isi_berita,0,350);
  $isi = substr($isi_berita,0,strrpos($isi," ")); 

   echo "<p>$isi ... 
  <a href=play-$d2[id_video]-$d2[video_seo].html class='more-link'>[play]</a></p>
  </div>";}

  echo "</div>"; 
  ?>
  
  </div>


  <div class="sidebar">
  
 <!------------- TABS BERITA -------------------->
  <div class="sidebar-item">
  <div class="latest-activity">
								
  <!-- TAB JUDUL -->
  <div class="tabs-1">
  <table><tr>
  
  <td><a href="#" class="tab-1 kernel_triple_btn active" id="kernel_triple_popular_btn_kernel_3">
  <span>Terpopuler</span></a></td>
  
  <td><a href="#" class="tab-1 tab-1-disabled kernel_triple_btn" id="kernel_triple_recent_btn_kernel_3">
  <span>Terkini</span></a></td>
  
  <td><a href="#" class="tab-1 tab-1-disabled kernel_triple_btn" id="kernel_triple_comments_btn_kernel_3">
  <span>Komentar</span></a></td>
  
  </tr></table>
  </div>
  <!-- AKHIR TAB JUDUL -->	
									
   <!-- BAGIAN POPULER -->								
 
  <div id="kernel_triple_popular_kernel_3">
  <div class="list">
  <?php    

  $sql=mysql_query("SELECT * FROM berita ORDER BY dibaca DESC LIMIT 5"); 
  
  while($p=mysql_fetch_array($sql)){
  
  echo "
  <div class='item'>
  <div class='image'>
  <a href=berita-$t[judul_seo].html>
  <img src='foto_berita/small_$p[gambar]' width=60 height=50 border=0></a>
  </div>";
  
  echo "<div class='text'>
  <a href=berita-$p[judul_seo].html><span class='judulberita1'>$p[judul]</span></a>
  <p><span class='tanggal01'><span> dibaca : $p[dibaca] pembaca</span></p></div>
  </div>";
  }
  ?>
  </div>
  </div>	
  <!-- AKHIR BAGIAN POPULER -->								
								

  <!-- BAGIAN TERKINI -->	
   <div id="kernel_triple_recent_kernel_3" style="display: none;">
  <div class="list">
  <?php    
  $terkini=mysql_query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT 5");
  while($t=mysql_fetch_array($terkini)){
  $tgl = tgl_indo($t['tanggal']);
  $isi_berita = strip_tags($t['isi_berita']); 
  $isi = substr($isi_berita,0,150); 
  $isi = substr($isi_berita,0,strrpos($isi," ")); 
  
  echo "
  <div class='item'>
  <div class='image'>
  <a href=berita-$t[judul_seo].html>
  <img src='foto_berita/small_$t[gambar]' width=60 height=50 border=0></a>
  </div>";
  
  echo "<div class='text'>
  <a href=berita-$t[judul_seo].html><span class='judulberita1'>$t[judul]</span></a>
  <p><span class='tanggal01'><span> $t[hari], $tgl</span></p></div>
  </div>";
  }
  ?>
  </div>
  </div>	
  <!-- AKHIR BAGIAN TERKINI -->	

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
  </div>
  </div>	
  <!------------- AKHIR TABS BERITA -------------------->


  <!------------- AGENDA HARI INI  -------------------->
  <div class="sidebar-item">
  <div class="latest-news">
  <div class="sidebar-title"><b>AGENDA</b></div>
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


  <!--================== KURS ==================--->
  <div class="sidebar-item">
  <div class="latest-news">
  <div class="sidebar-title"><b>KURS VALUTA</b></div>
  <div class="list">

  <?php
    include_once("fungsi_kurs_bca.php");
  ?> 
   </div></div></div>
  
  <!--=========== AKHIR KURS ==============--->
  
  
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
    
        
  <!----------- PARIWARA ------------------------>
  <div class="sidebar-item">
  <div class="photo-gallery-widget">
  <div class="sidebar-title"><b>PARIWARA</b></div>
  <div class="photos">
  <?php
  $pasangiklan=mysql_query("SELECT * FROM pasangiklan ORDER BY rand() LIMIT 2");

  while($b=mysql_fetch_array($pasangiklan)){
  echo "<a href='$b[url]' 'target='_blank' title='$b[judul]'>
  <img width=250 src='foto_pasangiklan/$b[gambar]' border=0></a>";}
  ?>
  </div>
  </div>
  </div>
  <!----------- AKHIR PARIWARA ------------------------>    
  

  </div>
  <div class="clear">&nbsp;</div>
  </div>
  </div><br />
 