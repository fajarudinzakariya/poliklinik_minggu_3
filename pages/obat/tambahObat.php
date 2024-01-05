<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama_obat = $_POST["nama_obat"];
    $kemasan = $_POST["kemasan"];
    $harga = $_POST["harga"];

    // Query untuk menambahkan data obat ke dalam tabel
    $query = "INSERT INTO obat (nama_obat, kemasan, harga) VALUES ('$nama_obat', '$kemasan', '$harga')";
    

    // if ($koneksi->query($query) === TRUE) {
    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, redirect kembali ke halaman utama atau sesuaikan dengan kebutuhan Anda
        // header("Location: ../../index.php");
        // exit();
        echo '<script>';
        echo 'alert("Data obat berhasil ditambahkan!");';
        echo 'window.location.href = "../../obat.php";';
        echo '</script>';
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}

// Tutup koneksi
mysqli_close($mysqli);
?>