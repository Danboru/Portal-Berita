<?php
/*
Ambil Nilai Valuta Kurs Dari BCA Versi 3.0

Versi 1: Tanggal: 2008-11-19 22:17
-Launching pertama script kurs bca

Versi 2: Tanggal: 2011-04-14 22:03
-Perubahan alamat URL kurs bca

Versi 3: Tanggal: 2012-06-16 01:33
-Perubahan alamat URL kurs bca
-Perubahan script pengaturan pengambilan data kurs.


Original dari azza (broadband.or.id/forum/)
dimodif oleh: jinbatsu (http://www.nusansifor.com) -  tanpa ijin dari azza
yg dimodif:
	- menggunakan CURL sebagai alternatif dari file_get_contents (hususnya buat yg gak bisa di hostingan2 tertentu)
	- penempatan output  titik koma dan tanda petik yg mengakibatkan fatal error dibeberapa hostingan
	- menambah number format, supaya terlihat ada titik pada ribuan nya
*/
//error_reporting (E_ALL);
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

// Perhatian PENTING untuk konfigurasi WAKTU dibawah.
// Ubah menjadi 3600 untuk cache 1 jam, ketika semuanya sudah berjalan normal.
// Menggunakan cache berarti tidak perlu membuka koneksi ke klikbca
// setiap kali halaman dibuka << ini PENTING! menghemat waktu, dan mengurangi proses server.
//
$nkurs['cachetime'] = 14400; /* ubah jadi 3600 atau lebih 14400 */
//$nkurs['cachetime'] = 0; /* ubah jadi 3600 atau lebih 14400 */
//
// Hilangkan mata uang yang tidak mau ditampilkan.
//
$nkurs['curr'] = array ('USD', 'SGD', 'HKD', 'CHF', 'GBP', 'AUD', 'JPY', 'SEK', 'DKK', 'CAD', 'EUR', 'SAR');
//
// Dari sini kebawah, ubah kalau mengerti aja.
// Atau tanya dulu di: broadband.or.id/forum/viewforum.php?f=7 (database forumnya sekarang udah gak ada, silahkan dicek  lagi)
// Atau kesini aja http://www.nusansifor.com/2008/11/script-php-mengambil-nilai-tukar-valuta-asing/
// menggunakan CURL, jika file_get_contents tidak bisa dihostingan Anda, baca manual PHP untuk selengkapnya
function curl_get_file_contents($URL) {
	$c = curl_init();
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_URL, $URL);
	$contents = curl_exec($c);
	curl_close($c);
	if ($contents) return $contents;
	else return FALSE;
}
$nkurs["remotelastupdate"] = array();

$nkurs['scriptpath'] = dirname (__FILE__);
$nkurs['cachefile'] = $nkurs['scriptpath'] . '/cache.txt';
if (!file_exists ($nkurs['cachefile']) || !is_writable ($nkurs['cachefile'])){ die ('File cache.txt belum ada atau belum writable.<br />Buat file: <code>' . $nkurs['cachefile'] . '</code><br />Lalu CHMOD ke 666'); }
if (filemtime ($nkurs['cachefile']) <= ( time () - $nkurs['cachetime'] ) && $handle = file_get_contents("http://www.bca.co.id/id/biaya-limit/kurs_counter_bca/kurs_counter_bca_landing.jsp"))  {
	$handle = explode ('<table style="width:300px;float:left;" border="1">', $handle);
	//echo '<textarea style="width:800px; height: 400px;">'; print_r($handle[1]); echo '</textarea>';
	$handle = explode ('</tbody>', $handle[1]);
	//echo '<textarea style="width:800px; height: 400px;">'; print_r($handle[0]); echo '</textarea>';

	//if (!isset ($nkurs['remotelastupdate'])) {
		$handle_remote = extract_unit ($handle[0], '<div align="center">', '</div>');
		//echo '<textarea style="width:800px; height: 400px;">'; print_r($handle_remote); echo '</textarea>';
		$nkurs['remotelastupdate'] = trim($handle_remote);
	//}

	$handle_kurs = explode('<td><strong>Beli</strong></td>', $handle[0]);
	//echo '<textarea style="width:800px; height: 400px;">'; print_r($handle_kurs[1]); echo '</textarea>';
	
	$handle_kurs_arr = explode('<tr>', $handle_kurs[1]);
	//echo '<textarea style="width:800px; height: 400px;">'; print_r($handle_kurs_arr); echo '</textarea>';
	
	$nkurs['data'] = array ();
	foreach ($handle_kurs_arr as $key => $val) {
		if($key == 0) continue;
		$val = str_replace ("\n\r", "\n", $val);
		$val = explode ("\n", $val);
		//echo '<textarea style="width:800px; height: 400px;">'; print_r($val); echo '</textarea>';
		$curr = str_replace ('<td style="text-align:center;">', '', $val[1]);
		$curr = trim (str_replace ('</td>', '', $curr) );
		//$curr = trim (str_replace ('&nbsp;', '', $val[0]));
		$sell = str_replace ('<td style="text-align:right;">', '', $val[2]);
		$sell = trim (str_replace ('</td>', '', $sell) );
		$buy = str_replace ('<td style="text-align:right;">', '', $val[3]);
		$buy = trim (str_replace ('</td>', '', $buy) );
		$nkurs['data'][$curr] = array ($sell, $buy);
	}
	$tocache = array ();
	foreach ($nkurs['data'] as $key => $val) {
		$tocache[] = $key . '|' . $val[0] . '|' . $val[1];
	}
	$tocache[] = 'remotelastupdate|' . $nkurs['remotelastupdate'];
	$tocache = implode ("\n", $tocache);
	$handle = fopen ($nkurs['cachefile'], 'w');
	fwrite ($handle, $tocache);
	fclose ($handle);
} else {
	$handle = file ($nkurs['cachefile']);
	$nkurs['data'] = array ();
	foreach ($handle as $val) {
		$val = explode ('|', $val);
		if ($val[0] != 'remotelastupdate') {
			$nkurs['data'][$val[0]] = array ($val[1], trim ($val[2]));
		}
		else
		{
			$nkurs['remotelastupdate'] = $val[1];
		}
	}
}
//
// Output
//
$output = "\n";
$margin = '';
$output .= $margin . '<div id="nKurs">' . "\n";
$output .= $margin . '	<table width="100%" border="0" cellspacing="1" cellpadding="0">' . "\n";
$output .= $margin . '		<tr><th>Mata Uang</th><th>Jual</th><th>Beli</th></tr>' . "\n";
$rowclass = 'row1';
foreach ($nkurs['data'] as $key => $val) {
	if (in_array ($key, $nkurs['curr'])) {
		if ($rowclass == 'row1'){ $rowclass = 'row2'; }else{ $rowclass = 'row1'; }
		$output .= $margin . '		<tr><td align="center" class="curr ' .$rowclass . '">' . $key . '</td><td align="right" class="' . $rowclass . '">' . number_format($val[0], 2) . '</td><td align="right" class="' . $rowclass . '">' . number_format($val[1], 2) . '</td></tr>' . "\n";
	}
}
$output .= $margin . '	</table>' . "\n";
$output .= $margin . '	<cite><a href="http://www.klikbca.com/" rel="external" title="Source: KlikBCA">' . $nkurs["remotelastupdate"] . '</a></cite>' . "\n";
$output .= $margin . '</div>' . "\n";
echo $output;


// tambahan fungsi
function extract_unit($string, $start, $end) {
	$pos = stripos($string, $start);
	$str = substr($string, $pos);
	$str_two = substr($str, strlen($start));
	$second_pos = stripos($str_two, $end);
	$str_three = substr($str_two, 0, $second_pos);
	$unit = trim($str_three);
	return $unit;
}
?>