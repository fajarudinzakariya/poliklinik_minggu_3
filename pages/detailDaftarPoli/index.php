<?php
    require 'config/koneksi.php';
    $id = $_GET['id'];
    $ambilDetail = mysqli_query($mysqli, "SELECT daftar_poli.id as idDaftarPoli, poli.nama_poli, dokter.nama, jadwal_periksa.hari, DATE_FORMAT(jadwal_periksa.jam_mulai, '%H:%i') as jamMulai, DATE_FORMAT(jadwal_periksa.jam_selesai, '%H:%i') as jamSelesai, daftar_poli.no_antrian FROM daftar_poli INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id INNER JOIN poli ON dokter.id_poli = poli.id WHERE daftar_poli.id = '$id'");
    $data = mysqli_fetch_assoc($ambilDetail);
?>

<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-12 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Detail Periksa
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b><?php echo $data['nama'] ?></b></h2>
                                <h6 class="text-muted text-lg">Poli <?php echo $data['nama_poli'] ?></h6>
                                <h6 class="text-muted text-lg"><?php echo $data['hari'] ?></h6>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="large"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                                        <?php echo $data['jamMulai'] ?> - <?php echo $data['jamSelesai'] ?></li>
                                </ul>
                            </div>
                            <div class="col-5 flex justify-center items-center flex-col">
                                <h2 class="lead"><b>No Antrian</b></h2>
                                <div class="rounded-lg flex justify-center items-center"
                                    style="height: 60px; width: 60px; background-color: #0284c7; color: white; padding-top: 6px;">
                                    <h1><?php echo $data['no_antrian'] ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-left">
                            <a href="daftarPoliklinik.php" class="btn btn-md btn-secondary">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer -->
</div>