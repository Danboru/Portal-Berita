<?php

// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

$host = "localhost";
$username = "u618656456_sujud";
$password = "yu2uk1";
$databasename = "u618656456_dbrt";
$connection = @mysql_connect($host, $username, $password) or die("Kesalahan Koneksi ... !!");

mysql_select_db($databasename, $connection) or die("Databasenya Error");

// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new validasi;

?>