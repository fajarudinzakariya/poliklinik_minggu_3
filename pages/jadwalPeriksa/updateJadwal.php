<?php
include '../../config/koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $id = $_POST['id'];
    $idPoli = $_SESSION['id_poli'];
    $idDokter = $_SESSION['id'];
    $hari = $_POST["hari"];
    $jamMulai = $_POST["jamMulai"];
    $jamSelesai = $_POST["jamSelesai"];

    $queryOverlap = "SELECT jadwal_periksa.id, jadwal_periksa.id_dokter, jadwal_periksa.hari, jadwal_periksa.jam_mulai, jadwal_periksa.jam_selesai, dokter.id AS idDokter, dokter.nama, dokter.alamat, dokter.no_hp, dokter.id_poli, poli.id AS idPoli, poli.nama_poli, poli.keterangan FROM jadwal_periksa INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id 
    INNER JOIN poli ON dokter.id_poli = poli.id WHERE id_poli = '$idPoli' 
    AND id_dokter = '$idDokter' AND hari = '$hari' 
    AND ((jam_mulai < '$jamSelesai' AND jam_selesai > '$jamMulai') OR (jam_mulai < '$jamMulai' AND jam_selesai > '$jamMulai'))";

    $resultOverlap = mysqli_query($mysqli,$queryOverlap);
    
    if (mysqli_num_rows($resultOverlap)>0) {
        echo '<script>alert("Dokter lain telah mengambil jadwal ini");window.location.href="../../jadwalPeriksa.php";</script>';
    }
    else{
        // Query untuk menambahkan data obat ke dalam tabel
        $query = "UPDATE jadwal_periksa SET hari = '$hari', jam_mulai = '$jamMulai', jam_selesai = '$jamSelesai' WHERE id = '$id'";
        

        // if ($koneksi->query($query) === TRUE) {
        // Eksekusi query
        if (mysqli_query($mysqli, $query)) {
            // Jika berhasil, redirect kembali ke halaman utama atau sesuaikan dengan kebutuhan Anda
            // header("Location: ../../index.php");
            // exit();
            echo '<script>';
            echo 'alert("Jadwal berhasil diubah!");';
            echo 'window.location.href = "../../jadwalPeriksa.php";';
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