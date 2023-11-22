<!-- Pada file ini kalian membuat coding untuk logika delete / menghapus data mobil pada showroom sesuai id-->
<?php 
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
$host = "localhost";
$username = "root";
$password = "";
$database = "modul3_dio";
$koneksi = new mysqli($host, $username, $password, $database);
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
} else {
    echo "Koneksi Berhasil!";
}

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
if (isset($_GET['id'])) {
    $id_mobil = $_GET['id'];

    // (3) Buatkan perintah SQL DELETE untuk menghapus data dari tabel berdasarkan id mobil
    $sql = "DELETE FROM showroom_mobil WHERE id = $id_mobil";
    $result = mysqli_query($conn, $sql);

    // (4) Buatkan perkondisi jika eksekusi query berhasil
    if ($result) {
        echo "Data mobil dengan ID $id_mobil berhasil dihapus.";
    } else {
        // Tampilkan pesan error jika terdapat kesalahan
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
// Tutup koneksi ke database setelah selesai menggunakan database
$koneksi->close();
?>