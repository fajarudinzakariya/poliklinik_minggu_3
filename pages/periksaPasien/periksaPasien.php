<?php
    require '../../config/koneksi.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id = $_POST['id'];
        $tanggalPeriksa = $_POST['tanggal_periksa'];
        $catatan = $_POST['catatan'];
        $arrayObat = $_POST['obat'];

        $updateStatus = "UPDATE daftar_poli SET status_periksa = '1' WHERE id = '$id'";
        $query = mysqli_query($mysqli,$updateStatus);

        if ($query) {
          $insertPeriksa = "INSERT INTO periksa (id_daftar_poli, tgl_periksa, catatan, biaya_periksa) VALUES ('$id', '$tanggalPeriksa', '$catatan', 150000)";
          $queryInsertPeriksa = mysqli_query($mysqli,$insertPeriksa);
          if ($queryInsertPeriksa) {
            $getLastData = "SELECT * FROM periksa ORDER BY id DESC LIMIT 1";
            $queryGetLastData = mysqli_query($mysqli,$getLastData);
            $getIdPeriksa = mysqli_fetch_assoc($queryGetLastData);

            $idPeriksa = $getIdPeriksa['id'];

            foreach ($arrayObat as $obat) {
                $inserDetailPeriksa = "INSERT INTO detail_periksa (id_periksa, id_obat) VALUES ('$idPeriksa', '$obat')";
                $queryDetailPeriksa = mysqli_query($mysqli,$inserDetailPeriksa);

                if ($queryDetailPeriksa) {
                    echo '<script>alert("Pasien telah diperiksa");window.location.href="../../periksaPasien.php"</script>';
                }
                else{
                    echo '<script>alert("Error");window.location.href="../../periksaPasien.php"</script>';
                }
            }
          }
        }

    }
?>