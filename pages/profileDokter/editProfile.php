<?php
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idDokter = $_POST['idDokter'];
    // Ambil nilai dari form
    $nama = $_POST["nama"];
    $no_hp = $_POST["no_hp"];
    $password = md5($_POST["password"]);
    $newPassword = md5($_POST["newPassword"]);
    $alamat = $_POST['alamat'];

    $dataDokter = mysqli_query($mysqli, "SELECT * FROM dokter WHERE id = '$idDokter'");
    $getDataDokter = mysqli_fetch_assoc($dataDokter);

    if ($password != $getDataDokter['password']) {
        echo '<script>alert("Password tidak sesuai");window.location.href="../../profileDokter.php"</script>';
    }
    else {
        $query = "UPDATE dokter SET 
        nama = '$nama', 
        no_hp = '$no_hp',
        password = '$newPassword',
        alamat = '$alamat'
        WHERE id = '$idDokter'";

    // Eksekusi query
    if (mysqli_query($mysqli, $query)) {
        // Jika berhasil, redirect kembali ke halaman index atau sesuaikan dengan kebutuhan Anda
        echo '<script>';
        echo 'alert("Data dokter berhasil diubah!, Setelah ini user akan diarahkan pada halaman login kembali");';
        echo 'window.location.href = "../../login.php";';
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