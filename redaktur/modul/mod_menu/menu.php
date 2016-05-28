<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 echo "
  </head>
  <body class='special-page'>
  <div id='container'>
  <section id='error-number'>
  
  <img src='img/lock.png'>
  <h1>MODUL TIDAK DAPAT DIAKSES</h1>
  
  <p><span class style=\"font-size:14px; color:#ccc;\">Untuk mengakses modul, Anda harus login dahulu!</p></span><br/>
  
  </section>
  
  <section id='error-text'>
  <p><a class='button' href='index.php'>&nbsp;&nbsp; <b>ULANGI LAGI</b> &nbsp;&nbsp;</a></p>
  </section>
  </div>";}
  
  else{

  //cek hak akses user
  $cek=user_akses($_GET[module],$_SESSION[sessid]);
  if($cek==1 OR $_SESSION[leveluser]=='admin'){


  $aksi="modul/mod_menu/aksi_menu.php";
  switch($_GET[act]){
  // Tampil Menu Utama
  default:
  
		  
   echo "
   <div id='main-content'>
   <div class='container_12'>
   <div class=grid_12> 
   <br/>
   <a href='?module=menu&act=tambahmenu' class='button'>
   <span>Tambah Menu</span>
   </a></div>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   <h1>MENU WEBSITE (MULTILEVEL)</h1>
   <span></span> 
   </div>
   <div class='block-content'>
		  
   <table id='table-example' class='table'>
		
   <thead><tr>
  
   <th>Menu</th>
   <th>Level Menu</th>
   <th>Link</th>
   <th>Aktif</th>
   <th>Aksi</th>
		  
   </thead>
   <tbody>";
		  
   $tampil=mysql_query("SELECT * FROM menu");
   $no=1;
   while ($r=mysql_fetch_array($tampil)){
	
   echo "<tr class=gradeX> 
   <td>$r[nama_menu]</td>";
            
  $parent=mysql_query("SELECT * FROM menu WHERE id_menu=$r[id_parent]");
  $jml=mysql_num_rows($parent);
  if ($jml > 0){
  while($s=mysql_fetch_array($parent)){
  
  echo"<td>$s[nama_menu]</td>"; }}
  
  else {
  echo"<td>Menu Utama</td>";}
  
  echo"<td>$r[link]</td>
  <td><center>$r[aktif]</center></td>
  
  <td width=50><a href=?module=menu&act=editmenu&id=$r[id_menu] rel=tooltip-top title='Edit' class='with-tip'>
  <center><img src='img/edit.png'></center></a> 
   
  </td></tr>";
  $no++;}
 
  echo "</table>";
  break;

  // Form Tambah Menu Utama
  case "tambahmenu":
  
  echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>TAMBAH MENU WEBSITE (MULTILEVEL)</h1>
   </div>
   <div class='block-content'>
   <form method=POST action='$aksi?module=menu&act=input'>
   
   <p class=inline-small-label> 
   <label for=field4>Nama Menu</label>
    <input type=text name='nama_menu'>
   </p> 
	 
   <p class=inline-small-label> 
   <label for=field4>Level Menu</label>
   <select name='id_parent'>
   <option value=0 selected>Menu Utama</option>";
   $tampil=mysql_query("SELECT * FROM menu ORDER BY id_menu");
   while($r=mysql_fetch_array($tampil)){
   echo "<option value=$r[id_menu]>$r[nama_menu]</option>
   </p>";}
   
   echo "</select>  
		
   <p class=inline-small-label> 
   <label for=field4>Link Menu</label>
   <input type=text name='link'>
   </p>
   		     
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=menu'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
  <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </form>";
	 
   break;

    case "editmenu":
    $edit = mysql_query("SELECT * FROM menu WHERE id_menu='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

		  
   echo "
   <div id='main-content'>
   <div class='container_12'>

   <div class='grid_12'>
   <div class='block-border'>
   <div class='block-header'>
   
   <h1>EDIT MENU WEBSITE (MULTILEVEL)</h1>
   </div>
   <div class='block-content'>
   
   <form method=POST action=$aksi?module=menu&act=update>
   <input type=hidden name=id value=$r[id_menu]>
		  
   <p class=inline-small-label> 
   <label for=field4>Nama Menu</label>
   <input type=text name='nama_menu' size=50 value='$r[nama_menu]'>

   </p> 
   
   <p class=inline-small-label> 
   <label for=field4>Level Menu</label>
   <select name='id_parent'>";
   $tampil=mysql_query("SELECT * FROM menu ORDER BY id_menu");
   if ($r[parent_id]==0){
   echo "<option value=0 selected>Menu Utama</option>";}
   else {
   echo "<option value=0>Menu Utama</option>";}

   while($w=mysql_fetch_array($tampil)){
   if ($r[id_parent]==$w[id_menu]){
   echo "<option value=$w[id_menu] selected>$w[nama_menu]</option>";}
   else{
   if ($w[id_menu]==$r[id_menu]){
   echo "<option value=0>Tanpa Level</option>";}
   else{
   echo "<option value=$w[id_menu]>$w[nama_menu]</option> </p>";}}}
           
   echo "</select>";
	
   if ($r[aktif]=='Ya'){
   echo "
   <p class=inline-small-label> 
   <label for=field4>Aktif</label>
   <input type=radio name='aktif' value='Ya' checked>Ya 
   <input type=radio name='aktif' value='Tidak'>Tidak
   </p>";}
									  
   else{
   echo "
   <p class=inline-small-label> 
   <label for=field4>Aktif</label>
   <input type=radio name='aktif' value='Ya'>Ya 
   <input type=radio name='aktif' value='Tidak' checked>Tidak
   </p>";}
							
	
	
   echo"
   <p class=inline-small-label> 
   <label for=field4>Link Menu</label>
    <input type=text name='link' value='$r[link]'>
   </p>		
		  
   <div class=block-actions> 
   <ul class=actions-right> 
   <li>
   <a class='button red' id=reset-validate-form href='?module=menu'>Batal</a>
   </li> </ul>
   <ul class=actions-left> 
   <li>
   <input type='submit' name='upload' class='button' value=' &nbsp;&nbsp;&nbsp;&nbsp; Simpan &nbsp;&nbsp;&nbsp;&nbsp;'>
   </form>";
  
  
    break;  
   }
  //kurawal akhir hak akses module
   } else {
	echo akses_salah();
  }
  }
  ?>


   </div> 
   </div>
   </div>
   <div class='clear height-fix'></div> 
   </div></div>