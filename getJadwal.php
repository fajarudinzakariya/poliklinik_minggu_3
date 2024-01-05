<?php
// Koneksi ke database
require 'config/koneksi.php';

// Ambil id poli dari AJAX
$poliId = $_POST['poliId'];

// Buat kueri SQL untuk mengambil jadwal berdasarkan poli
$query = "SELECT jadwal_periksa.id as idJadwal, dokter.nama, jadwal_periksa.hari, DATE_FORMAT(jadwal_periksa.jam_mulai, '%H:%i') as jamMulai, DATE_FORMAT(jadwal_periksa.jam_selesai, '%H:%i') as jamSelesai FROM jadwal_periksa INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE poli.id = '$poliId'";
$result = mysqli_query($mysqli, $query);

// Periksa apakah kueri berhasil dieksekusi
if ($result) {
    // Format data jadwal menjadi opsi select
    if (mysqli_num_rows($result)>0) {
        $jadwalOptions = "";
        while ($dataJadwal = mysqli_fetch_assoc($result)) {
            $jadwalOptions .= "<option value='" . $dataJadwal['idJadwal'] . "'>" . $dataJadwal['nama'] . ' - ' . $dataJadwal['hari'] . ' ' . $dataJadwal['jamMulai'] . ' - ' . $dataJadwal['jamSelesai'] . "</option>";
        }
        // Kirim data jadwal ke AJAX
        echo $jadwalOptions;
    }
    else{
        echo "<option value=''>Jadwal tidak ditemukan</option>";
    }

    // Bebaskan hasil kueri
    mysqli_free_result($result);
} else {
    // Tampilkan pesan kesalahan jika kueri gagal dieksekusi
    echo "Error: " . mysqli_error($mysqli);
}

// Tutup koneksi ke database
mysqli_close($mysqli);
?>