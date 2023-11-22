<!-- File ini berisi koneksi dengan database MySQL -->
<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$host = "localhost";
$username = "root";
$password = "";
$database ="modul4_dio";

// 

// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
$db = mysqli_connect($host,$username,$password,$database);
if (!$db) {
    die("koneksi gagal: ".mysqli_connect_error());
}
// 
 
?>