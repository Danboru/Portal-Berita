  
  <div class='main-column-wrapper'>
  <div class='main-column-left'>
  
  <?php
  
  echo "
  <div class='blog-style-1'>
  <div class='post-title'>
  <b>Hasil Pencarian Berita</b>
  </div>";            
  
  $kata = trim($_POST['kata']);
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM berita WHERE " ;
  for ($i=0; $i<=$jml_kata; $i++){
  $cari .= "isi_berita LIKE '%$pisah_kata[$i]%' or judul LIKE '%$pisah_kata[$i]%'";
  if ($i < $jml_kata ){
  $cari .= " OR "; } }
  
  $cari .= " ORDER BY id_berita DESC LIMIT 3";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

  if ($ketemu > 0){
  echo "<h5>Ditemukan <span class style=\"color:#EA1C1C;\">$ketemu berita teratas </span>dengan kata <font style='background-color:#EA1C1C'>
  <class style=\"color:#fff;\">$kata</font>:</h5><br/>"; 
	
  while($t=mysql_fetch_array($hasil)){
	
  echo "<div class='item'>
  <h2><a href=berita-$t[judul_seo].html>$t[judul]</a></h2>";
 	  
  $isi_berita = htmlentities(strip_tags($t['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
  $isi = substr($isi_berita,0,250); // ambil sebanyak 150 karakter
  $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

   echo "<p>$isi ... 
  <a href=berita-$t[judul_seo].html class='more-link'>[selengkapnya]</a></p>
  </div>";} }
  
  else{
  echo "<h5>Tidak ditemukan berita dengan kata <class style=\"color:#EA1C1C;\">$kata</h5>";}

  ?>
  </div>
  </div>
  <div class="sidebar">
  
  <!------------- BERITA SEBELUMNYA  -------------------->
  
  <div class="sidebar-item">
  <div class="latest-news">
  <div class="sidebar-title"><b>BERITA SEBELUMNYA </b></div>
  <div class="list">
  <?php    
  $terkini=mysql_query("SELECT * FROM berita 
  WHERE headline='N' ORDER BY id_berita DESC LIMIT 8,5");
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
  <!------------- AKHIR BERITA SEBELUMNYA  -------------------->


  
    
  </div>
  <div class="clear">&nbsp;</div>
  </div>
  </div><br />
 