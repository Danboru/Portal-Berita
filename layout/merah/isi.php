 
  <?php
  if ($_GET['module']=='home'){?>

  <!------------------ MULAI HALAMAN HOME -------------------->
  <div class="main-column-wrapper">
  <div class="main-column-left">

  <div class="tanggal"><script src="<?php echo "$f[folder]/js/almanak.js" ?>" type="text/javascript"></script>
   &nbsp;&nbsp;<span class="style2">I</span>&nbsp;&nbsp;
  <script src="<?php echo "$f[folder]/js/selamat.js" ?>" type="text/javascript"></script>
   </div>
  <!------------------  HEADLINE -------------------->
  <div id="lofslidecontent45" class="lof-slidecontent lof-snleft">
  <div class="preload"><div></div></div>
  
  <div class="lof-main-outer">
  <ul class="lof-main-wapper">
  
  <?php
  $terkini=mysql_query("SELECT * FROM berita WHERE headline='Y' ORDER BY id_berita DESC LIMIT 5");
  $no=1;
  while($t=mysql_fetch_array($terkini)){      
                
  $isi_berita = strip_tags($t['isi_berita']); 
  $isi = substr($isi_berita,0,150); 
  $isi = substr($isi_berita,0,strrpos($isi," ")); 
       	    
  echo "<li><img src=foto_berita/$t[gambar] height='300' width='357'/>

  <div class='lof-main-item-desc2'><img src=$f[folder]/images/bg_headline.png width='360' height='300'>

  <div class='lof-main-item-desc'>
  <h3><a href='berita-$t[judul_seo].html'>$t[judul]</a></h3>
  <p>$isi ...<a href=berita-$t[judul_seo].html>
  <span class=lengkap>[selengkapnya]</span></a></p>
  </div>
  </li>"; 
  
  $no++;} 
  ?>
  
  </ul>
  </div>          
          
  <div class="lof-navigator-outer">
  <ul class="lof-navigator">
            
  <?php
  $terkini2=mysql_query("SELECT * FROM berita WHERE headline='Y' ORDER BY id_berita DESC LIMIT 5");
  $no=1;
  while($t=mysql_fetch_array($terkini2)){      
  $tgl = tgl_indo($t[tanggal]);

  $isi_berita = strip_tags($t['isi_berita']); 
  $isi = substr($isi_berita,0,120); 
  $isi = substr($isi_berita,0,strrpos($isi," ")); 

  echo "<li><div><h3>$t[judul]</h3><p>$t[hari], $tgl</p></div></li>";
  $no++;} 
  ?>
  </ul>
  </div></div>
  <img src=<?php echo "$f[folder]/images/shadow.jpg" ?> width="557" />
  <!---------------------- AKHIR HEADLINE -------------------------->		
  

  <!---------------- BERITA UTAMA ------------------------>
  <div class="blog-style-1">
  <div class="post-title">
  <b>BERITA UTAMA </b>
  </div>
  
  <?php    
  $terkini=mysql_query("SELECT * FROM berita WHERE utama='Y' ORDER BY id_berita DESC LIMIT 2");
  while($t=mysql_fetch_array($terkini)){
  $tgl = tgl_indo($t['tanggal']);
  $baca = $t[dibaca]+1;		
  
  $komentar = "SELECT * FROM komentar WHERE id_berita = '".$t['id_berita']."'";
  $zalkomentar = mysql_query($komentar);
  $total_komentar = mysql_num_rows($zalkomentar);
  
  echo "<div class='item'>
  <div class='sub_judul1'>$t[sub_judul]</div>
  <h2><a href=berita-$t[judul_seo].html>$t[judul]</a></h2>
  <div class='info'> <span class='date'>$t[hari], $tgl - $t[jam] WIB <span class style=\"color:#EA1C1C;\">|</span> 
  dibaca: $baca pembaca <span class style=\"color:#EA1C1C;\">|</span> komentar: $total_komentar</span></div>";
  
  if ($t['gambar']!=''){
  
  echo " <a href=berita-$t[judul_seo].html>
  <div class='crop'><p><img src='foto_berita/small_$t[gambar]' ></p></div></a>";}
  
  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,300); 
  $isi = substr($isi_berita,0,strrpos($isi," ")); 
  
  echo "<p>$isi ... 
  <a href=berita-$t[judul_seo].html class='more-link'>[selengkapnya]</a></p>
  </div>";}
  ?>
  </div><br />
  <!---------------- AKHIR BERITA UTAMA ------------------------>
 
 
  <!------------------------ PILIHAN REDAKSI ------------------------------>
  <div class="post-title"><b>PILIHAN REDAKSI</b></div>
  <div class="photo-gallery">
  <div class="row">
  <div class="infiniteCarousel">
  <div class="wrapper">
  <ul>
  <?php            
  $terkini=mysql_query("SELECT * FROM berita 
  WHERE aktif='Y' ORDER BY id_berita DESC LIMIT 8");
  while($t=mysql_fetch_array($terkini)){
  $tgl = tgl_indo($t['tanggal']);
					
  if ($t['gambar']!=''){
					
  echo "<li><div class='index-item'>
  <a href=berita-$t[judul_seo].html>
  <img src='foto_berita/small_$t[gambar]' width=119 height=100 border=0 >
  </a>";}
 
  $isi_berita =(strip_tags($t['isi_berita'])); 
  $isi = substr($isi_berita,0,200); 
  $isi = substr($isi_berita,0,strrpos($isi," ")); 

  echo "<a href=berita-$t[judul_seo].html class='tooltip' title='$isi...<br/> 
  <span class=tanggal03>$t[hari], $tgl</span>'><span class=judultopik>$t[judul]</span></a>
  </div></li>";} 
  ?>
				
  </ul>        
  </div>
  </div>	
  </div></div>
  <!------------------------ AKHIR PILIHAN REDAKSI ------------------------------>
				
 
  <div class="archive">
  <div class="row">

  <!------------------------ KOLOM BERITA ------------------------------>
  <?php
  
  //id kategori dan jumlah kolom
  $main=mysql_query("SELECT * FROM kategori WHERE aktif='Y' order by id_kategori limit 2");
  
  while($r=mysql_fetch_array($main)){
  
  echo "<div class='category'>
  <div class='sidebar-title5'>
  <b><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>
  $r[nama_kategori]</a></b></div>
  <ul>";

  //jumlah dalam kategori
  $sub=mysql_query("SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysql_query("SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysql_fetch_array($sub2);
  if ($t['gambar']!=''){
				
  echo "<div class='layout-4'>
  <a href=berita-$t[judul_seo].html class='image'> 
  <img src='foto_berita/small_$t[gambar]' width=100 height=70 border='0'  class='tooltip' title='$t[judul]'>
  </div>";}
                
  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,95); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	
  $judul = substr($t['judul'],0,23); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 
	
  echo "
  <a href=berita-$t[judul_seo].html  class='tooltip' title='$t[judul]'>
  <span class='judulberita1'>$judul ...</span></a>
  <div class='teksbox'><p>$isi ...
  <span class='teksbox2'><a href=berita-$t[judul_seo].html >
  <class style=\"color:#666666;\"> [selengkapnya]</a></span></p></div>";
		              	        
  while($w=mysql_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,40); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 
  
  echo "<li><a href=berita-$w[judul_seo].html  class='tooltip' title='$w[judul]'>
  $judul ...</a></li>";}
  
  echo "</ul>
  </tbody>
  </table>
  </div>
  </li>"; }   
     
  echo "</ul>";        
  ?>       
  
  </div>  
  <!------------------------ AKHIR KOLOM BERITA ------------------------------>
	
	

  <!------------------------ IKLAN TENGAH #1 ------------------------------>
  <?php
  $iklantengah=mysql_query("SELECT * FROM iklantengah  WHERE id_iklantengah ='26' ORDER BY id_iklantengah DESC LIMIT 1");
  while($b=mysql_fetch_array($iklantengah)){
  echo "<div class='iklantengah'>
  <a href='$b[url]'' target='_blank' title='$b[judul]'>
  <img src='foto_iklantengah/$b[gambar]' border=0 width=580></a>
  </div>";}?>
  <!------------------------ AKHIR IKLAN TENGAH #1 ------------------------------>

 
  <div class="archive">
  <div class="row">

	
  <!------------------------ KOLOM BERITA ------------------------------>
  <?php 
  
  //id kategori dan jumlah kolom
  $main=mysql_query("SELECT * FROM kategori WHERE aktif='Y' order by id_kategori limit 2,2");
  
  while($r=mysql_fetch_array($main)){
  echo "<div class='category'>
  <div class='sidebar-title5'>
  <b><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>
  $r[nama_kategori]</a></b></div>
  <ul>";

  //jumlah dalam kategori
  $sub=mysql_query("SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysql_query("SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysql_fetch_array($sub2);
  if ($t['gambar']!=''){
				
  echo "<div class='layout-4'>
  <a href=berita-$t[judul_seo].html class='image'> 
  <img src='foto_berita/small_$t[gambar]' width=100 height=70 border='0'  class='tooltip' title='$t[judul]'>
  </div>";}
                
  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,95); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	
  $judul = substr($t['judul'],0,23); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 
	
  echo "
  <a href=berita-$t[judul_seo].html  class='tooltip' title='$t[judul]'>
  <span class='judulberita1'>$judul ...</span></a>
  <div class='teksbox'><p>$isi ...
  <span class='teksbox2'><a href=berita-$t[judul_seo].html >
  <class style=\"color:#666666;\"> [selengkapnya]</a></span></p></div>";
                      	        
  while($w=mysql_fetch_array($sub)){
  
  $judul = substr($w['judul'],0,40); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 
  
  echo "<li><a href=berita-$w[judul_seo].html  class='tooltip' title='$w[judul]'>
  $judul ... </a></li>";}
  
  echo "</ul>
  </tbody>
  </table>
  </div>
  </li>"; }   
     
  echo "</ul>";        
  ?>       
   </div>
  <!------------------------ AKHIR KOLOM BERITA ------------------------------>
	
	
  <!------------------------ IKLAN TENGAH #2 ------------------------------>
  <?php
  $iklantengah=mysql_query("SELECT * FROM iklantengah  WHERE id_iklantengah ='30' ORDER BY id_iklantengah DESC LIMIT 1");
  while($b=mysql_fetch_array($iklantengah)){
  echo "<div class='iklantengah'>
  <a href='$b[url]'' title='$b[judul]'>
  <img src='foto_iklantengah/$b[gambar]' border=0 width=580  ></a>
  </div>";}?>
  <!------------------------ AKHIR IKLAN TENGAH #2 ------------------------------>
  
  <div class="archive">
  <div class="row">

	
  <!------------------------ KOLOM BERITA ------------------------------>
  <?php 
  
  //id kategori dan jumlah kolom
  $main=mysql_query("SELECT * FROM kategori WHERE aktif='Y' order by id_kategori limit 4,2");
  
  while($r=mysql_fetch_array($main)){
  echo "<div class='category'>
  <div class='sidebar-title5'>
  <b><a href='kategori-$r[id_kategori]-$r[kategori_seo].html'>
  $r[nama_kategori]</a></b></div>
  <ul>";

  //jumlah dalam kategori
  $sub=mysql_query("SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1,5");
							
							
  $sub2=mysql_query("SELECT * FROM kategori, berita  
                            WHERE kategori.id_kategori=berita.id_kategori 
                            AND berita.id_kategori=$r[id_kategori] order by id_berita desc limit 1");
							
							
 					
  $t=mysql_fetch_array($sub2);
  if ($t['gambar']!=''){
				
   echo "<div class='layout-4'>
  <a href=berita-$t[judul_seo].html class='image'> 
  <img src='foto_berita/small_$t[gambar]' width=100 height=70 border='0' class='tooltip' title='$t[judul]'>
  </div>";}
                
  $isi_berita =(strip_tags($t['isi_berita']));
  $isi = substr($isi_berita,0,95); 
  $isi = substr($isi_berita,0,strrpos($isi," "));
	
  $judul = substr($t['judul'],0,23); 
  $judul = substr($t['judul'],0,strrpos($judul," ")); 

	
  echo "
  <a href=berita-$t[judul_seo].html  class='tooltip' title='$t[judul]'>
  <span class='judulberita1'>$judul ...</span></a>
  <div class='teksbox'><p>$isi ...
  <span class='teksbox2'><a href=berita-$t[judul_seo].html >
  <class style=\"color:#666666;\"> [selengkapnya]</a></span></p></div>";
                      	        
  while($w=mysql_fetch_array($sub)){
	
  $judul = substr($w['judul'],0,40); 
  $judul = substr($w['judul'],0,strrpos($judul," ")); 
  
  echo "<li><a href=berita-$w[judul_seo].html  class='tooltip' title='$w[judul]'>
  $judul ... </a></li>";}
  
  echo "</ul>
  </tbody>
  </table>
  </div>
  </li>"; }   
     
  echo "</ul>";        
  ?>
  </div>
  <!------------------------ AKHIR KOLOM BERITA ------------------------------>
	
  </div>
  </div>
  </div>
  </div>
	

  <!--============================= BAGIAN KANAN ==================================--->
 
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
  /* Berita Terpopuler dalam Seminggu     
  $hari_ini=date("Ymd");
  $sebelum=mktime(0, 0, 0, date("m"), date("d") - 7, date("Y"));    
  $tgl_sebelumnya=date("Ymd", $sebelum);

  $sql=mysql_query("SELECT * FROM berita WHERE tanggal BETWEEN '$tgl_sebelumnya' AND '$hari_ini' 
  ORDER BY dibaca DESC LIMIT 5"); 
  */
  
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
  </div>";}
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


  <!------------- VIDEO TERBARU -------------------->
  
  <div class="sidebar-item">
  <div class="latest-news">
  <div class="sidebar-title"><b>VIDEO TERBARU</b></div>
  <div class="list">
  <?php   
  
  //Terpopuler berdasarkan seminggu 
  $hari_ini=date("Ymd");
  $sebelum=mktime(0, 0, 0, date("m"), date("d") - 7, date("Y"));    
  $tgl_sebelumnya=date("Ymd", $sebelum);
  
  $detail888=mysql_query("select * from video ORDER BY id_video DESC LIMIT 1"); 
  $d888   = mysql_fetch_array($detail888);

  $baca = $d888[dilihat]+1;
  $tgl = tgl_indo($d888['tanggal']);

  if($d888[video]==''){
  $teraskreasi="1";
  echo "<div class='item'>";
  echo "<iframe width='250' height='170' src='$d888[youtube]' frameborder='0' allowfullscreen></iframe>
  <p><span class='tanggal01'><span> $d888[hari], $tgl</span>
  <span class style=\"color:#EA1C1C;\"> | </span>dilihat: $baca pengunjung</span></p>
  <a href=play-$d888[id_video]-$d888[video_seo].html class='tooltip' title='$d888[jdl_video]'>
  <b>$d888[jdl_video]</b></a>
  </div>";
  }
  else {  
  $teraskreasi="2";			  
  echo "<div class='item'>";
  echo "<a title='$d888[keterangan]' href='img_video/$d888[video]' style='display:block;width:250px;height:170px' id='player'></a>
  <p><span class='tanggal01'><span> $d888[hari], $tgl</span>
  <span class style=\"color:#EA1C1C;\"> | </span>dilihat: $baca pengunjung</span></p>
  <a href=play-$d888[id_video]-$d888[video_seo].html class='tooltip' title='$d888[jdl_video]'>
  <b>$d888[jdl_video]</b></a>
  </div>";
  }
 	?>
  </div>
  </div>
  </div>
  <!------------- AKHIR VIDEO TERBARU  -------------------->


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
  
    
 <!----------- FACEBOOK LIKE------------------------>
  
  <div class="sidebar-item">
  <div class="latest-news">
  <div class="sidebar-title"><b>FACEBOOK FAN PAGE</b></div>
  <div class="list">
  <div class="fbluar3">
  <div class="fbdalam3">
  <div class="fb-like-box"
  data-width="250" data-height="330"
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
  $isi = substr($isi_agenda,0,150);
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


  <!----------- PARIWARA ------------------------>
  <div class="sidebar-item">
  <div class="photo-gallery-widget">
  <div class="sidebar-title"><b>PARIWARA</b></div>
  <div class="photos">
  <?php
  $pasangiklan=mysql_query("SELECT * FROM pasangiklan ORDER BY rand() LIMIT 1");

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
  </div>
  
  <!------------------ TUTUP HALAMAN HOME -------------------->


  <?php 
  }
  // DETAIL BERITA////////////////////////////////////////////
  elseif ($_GET['module']=='detailberita'){
  include "$f[folder]/modul/mod_berita/detailberita.php";}
  ////////////////////////////////////////////////////////////

  // KATEGORI BERITA ////////////////////////////////////////////
  elseif ($_GET['module']=='detailkategori'){
  include "$f[folder]/modul/mod_berita/detailkategori.php";}
  ////////////////////////////////////////////////////////////
  
  // CARI BERITA ////////////////////////////////////////////
  elseif ($_GET['module']=='hasilcari'){
  include "$f[folder]/modul/mod_berita/hasilcari.php";}
  ////////////////////////////////////////////////////////////

  // SEMUA BERITA ////////////////////////////////////////////
  elseif ($_GET['module']=='semuaberita'){
  include "$f[folder]/modul/mod_berita/semuaberita.php";}
  ////////////////////////////////////////////////////////////


  // DETAIL AGENDA ////////////////////////////////////////////
  elseif ($_GET['module']=='detailagenda'){
  include "$f[folder]/modul/mod_agenda/detailagenda.php";}
  /////////////////////////////////////////////////////////////
  
  // SEMUA AGENDA ////////////////////////////////////////////
  elseif ($_GET['module']=='semuaagenda'){
  include "$f[folder]/modul/mod_agenda/semuaagenda.php";}
  /////////////////////////////////////////////////////////////
  
  // LIHAT POLING ////////////////////////////////////////////
  elseif ($_GET['module']=='lihatpoling'){
  include "$f[folder]/modul/mod_poling/lihatpoling.php";}
  /////////////////////////////////////////////////////////////
  
  // HASIL POLING ////////////////////////////////////////////
  elseif ($_GET['module']=='hasilpoling'){
  include "$f[folder]/modul/mod_poling/hasilpoling.php"; }  
  /////////////////////////////////////////////////////////////
  

  // BERITA FOTO ////////////////////////////////////////////
  elseif ($_GET['module']=='detailalbum'){
  include "$f[folder]/modul/mod_album/detailalbum.php"; }
  /////////////////////////////////////////////////////////////
  
  
  // VIDEO ////////////////////////////////////////////
  elseif ($_GET['module']=='play'){
  include "$f[folder]/modul/mod_video/play.php";}
  /////////////////////////////////////////////////////////////

  // PLAYLIST VIDEO ////////////////////////////////////////////
  elseif ($_GET['module']=='semuaplaylist'){
  include "$f[folder]/modul/mod_playlist/semuaplaylist.php";}
  /////////////////////////////////////////////////////////////

  // DEATAIL PLAYLIST VIDEO ////////////////////////////////////////////
  elseif ($_GET['module']=='detailplaylist'){
  include "$f[folder]/modul/mod_playlist/detailplaylist.php";}
  /////////////////////////////////////////////////////////////


   // DEATAIL HALAMAN STATIS ////////////////////////////////////////////
  elseif ($_GET['module']=='halamanstatis'){
  include "$f[folder]/modul/mod_halaman/halaman.php";}
  /////////////////////////////////////////////////////////////
 

 // HUBUNGI KAMI////////////////////////////////////////////
  elseif ($_GET['module']=='hubungikami'){
  include "$f[folder]/modul/mod_hubungi/hubungi.php";}
 /////////////////////////////////////////////////////////////

 // HUBUNGI AKSI ////////////////////////////////////////////
  elseif ($_GET['module']=='hubungiaksi'){
	include "$f[folder]/modul/mod_hubungi/hubungiaksi.php";}
 /////////////////////////////////////////////////////////////


  // DEATAIL HALAMAN ERROR ////////////////////////////////////////////
 elseif ($_GET['module']=='notfound'){
  include "$f[folder]/modul/404/404.php";}
  /////////////////////////////////////////////////////////////
 
  //========= Copyright © 2012. Developed by: Rizal Faizal  =======

  ?>      
