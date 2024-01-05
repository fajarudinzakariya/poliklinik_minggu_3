<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $poli = $_POST["poli"];
    $password = md5($nama);

    // Query untuk menambahkan data obat ke dalam tabel
    $query = "INSERT INTO dokter (nama, password, alamat, no_hp, id_poli) VALUES ('$nama', '$password', '$alamat', '$no_hp', '$poli')";
    

    // if ($koneksi->query($query) === TRUE) {
    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, redirect kembali ke halaman utama atau sesuaikan dengan kebutuhan Anda
        // header("Location: ../../index.php");
        // exit();
        echo '<script>';
        echo 'alert("Data dokter berhasil ditambahkan!");';
        echo 'window.location.href = "../../dokter.php";';
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