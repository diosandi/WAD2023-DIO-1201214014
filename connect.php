<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->
<?php
// Parameter koneksi database
$host = "localhost";
$username = "root";
$password = "";
$database = "modul3_dio";


// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$koneksi = new mysqli($host, $username, $password, $database);

// 
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
} else {
    echo "Koneksi Berhasil!";
    // Jika perlu melakukan operasi database lainnya, dapat dilakukan di sini
}

// Tutup koneksi setelah selesai menggunakan database
$koneksi->close();

// 
?>