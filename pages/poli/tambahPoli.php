<?php
include '../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama_poli = $_POST["nama_poli"];
    $keterangan = $_POST["keterangan"];

    $check = "SELECT * FROM poli WHERE nama_poli = '$nama_poli'";
    $data = mysqli_query($mysqli,$check);

    if (mysqli_num_rows($data)>0) {
        echo '<script>alert("Poli sudah ada");window.location.href = "../../poli.php";</script>';
    }
    else {
         // Query untuk menambahkan data obat ke dalam tabel
            $query = "INSERT INTO poli (nama_poli, keterangan) VALUES ('$nama_poli', '$keterangan')";
            

            // if ($koneksi->query($query) === TRUE) {
            // Eksekusi query
            if (mysqli_query($mysqli, $query)) {
                // Jika berhasil, redirect kembali ke halaman utama atau sesuaikan dengan kebutuhan Anda
                // header("Location: ../../index.php");
                // exit();
                echo '<script>';
                echo 'alert("Data poli berhasil ditambahkan!");';
                echo 'window.location.href = "../../poli.php";';
                echo '</script>';
                exit();
            } else {
                // Jika terjadi kesalahan, tampilkan pesan error
                echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
            }
    }
}

// Tutup koneksi
mysqli_close($mysqli);
?>