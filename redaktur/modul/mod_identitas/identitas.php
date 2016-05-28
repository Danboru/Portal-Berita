 
  <?php
  $aksi="modul/mod_identitas/aksi_identitas.php";
  switch($_GET[act]){
  // Tampil identitas
  default:
    $sql  = mysql_query("SELECT * FROM identitas LIMIT 1");
    $r    = mysql_fetch_array($sql);

  
   echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class='grid_12'>
   </div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>IDENTITAS WEBSITE</h1>
   <span></span> 
   </div>
   <div class='block-content'>
  
    <form method=POST enctype='multipart/form-data' action=$aksi?module=identitas&act=update>
    <input type=hidden name=id value=$r[id_identitas]>
		  
    <p class=inline-small-label> 
    <label for=field4>Nama Website</label>
	<input type=text name='nama_website' size=50 value='$r[nama_website]'>
    </p> 
	 
    <p class=inline-small-label> 
    <label for=field4>URL</label>
    <input type=text name='url'size=50 value='$r[url]'><br/>
	- Apabila di-onlinekan di web hosting, ganti URL dengan URL website anda. <br/>
	contoh: <span class style=\"color:#EA1C1C;\">http://swarakalibata.com</span>
    </p> 
      
	  
	 <p class=inline-small-label> 
    <label for=field4>Facebook Fan Page</label>
    <input type=text name='facebook'size=50 value='$r[facebook]'><br/>
	- contoh: <span class style=\"color:#EA1C1C;\">https://www.facebook.com/pages/SwaraKalibata/239333572825492</span>
    </p> 
	  
	  
    <p class=inline-small-label> 
    <label for=field4>Meta Deskripsi</label>
	<input type=text name='meta_deskripsi' size=50 value='$r[meta_deskripsi]'>
    </p> 
	  
    <p class=inline-small-label> 
    <label for=field4>Meta Keyword</label>
	<input type=text name='meta_keyword' size=50 value='$r[meta_keyword]'>
    </p>
	
	<p class=inline-small-label> 
    <label for=field4>Email</label>
	<input type=text name='email' size=50 value='$r[email]'>
    </p>
 		  
	<p class=inline-small-label> 
    <label for=field4>No. Telp/HP</label>
	<input type=text name='no_telp' size=50 value='$r[no_telp]'>
    </p>
	
	
	<p class=inline-small-label> 
    <label for=field4>No. Rekening</label>
	<input type=text name='rekening' size=50 value='$r[rekening]'>
    </p>  
	
	
	<p class=inline-small-label> 
	<span class=label>Gambar Favicon</span>";
    if ($r[favicon]!=''){
    echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src=../$r[favicon] width=30><br/><br/>"; 
	

	
	echo "</p>
      <p class=inline-small-label> 
	  <span class=label>Ganti Favicon</span>
	  <input type='file' name='fupload' /><br/>
	  <span class style=\"font-size:11px;color:#666;\">&nbsp;&nbsp;&nbsp;&nbsp;
	  (nama file gambar favicon harus <b>favicon.png)</b></span></p><br/>";

    echo "<div class=block-actions> 
      <ul class=actions-right> 
      <li>
      <a class='button red' id=reset-validate-form href='?module=identitas'>Batal</a>
      </li> </ul>
      <ul class=actions-left> 
      <li>
      <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
	  </form>";
	
    break;  
   }

  }
  ?>


   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>