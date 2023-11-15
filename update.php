<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->
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
    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter
    function updateMobil($id, $nama_mobil, $brand_mobil, $warna_mobil, $tipe_mobil, $harga_mobil) {
        global $conn;
        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        
        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
        $sql = "UPDATE showroom_mobil SET
        nama_mobil = '$nama_mobil',
        brand_mobil = '$brand_mobil',
        warna_mobil = '$warna_mobil',
        tipe_mobil = '$tipe_mobil',
        harga_mobil = $harga_mobil
        WHERE id = $id";

        // Eksekusi perintah SQL
        $result = mysqli_query($conn, $sql);
        // Buatkan kondisi jika eksekusi query berhasil
        if ($result) {
            echo "Data mobil dengan ID $id berhasil diperbarui.";
        } else {
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

    // Panggil fungsi update dengan data yang sesuai
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama_mobil = $_POST['nama_mobil'];
        $brand_mobil = $_POST['brand_mobil'];
        $warna_mobil = $_POST['warna_mobil'];
        $tipe_mobil = $_POST['tipe_mobil'];
        $harga_mobil = $_POST['harga_mobil'];

        updateMobil($id_mobil, $nama_mobil, $brand_mobil, $warna_mobil, $tipe_mobil, $harga_mobil);
    }
}
// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($conn);
?>