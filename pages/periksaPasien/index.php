<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Daftar Periksa Pasien</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                    <li class="breadcrumb-item active">Daftar Periksa</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No Antrian</th>
                                    <th>Nama Pasien</th>
                                    <th>Keluhan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    require 'config/koneksi.php';
                                    $query = "SELECT pasien.nama, daftar_poli.keluhan, daftar_poli.status_periksa, daftar_poli.id, daftar_poli.no_antrian FROM daftar_poli INNER JOIN pasien ON daftar_poli.id_pasien = pasien.id INNER JOIN jadwal_periksa ON daftar_poli.id_jadwal = jadwal_periksa.id INNER JOIN dokter ON jadwal_periksa.id_dokter = dokter.id WHERE dokter.id = '$id_dokter' ORDER BY daftar_poli.no_antrian ASC";
                                    $result = mysqli_query($mysqli,$query);

                                    while ($data = mysqli_fetch_assoc($result)) {
                                        # code...
                                ?>
                                <tr>
                                    <td><?php echo $data['no_antrian']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['keluhan']; ?></td>
                                    <td>
                                        <?php if ($data['status_periksa']==1) {
                                        ?>
                                        <button type='button' class='btn btn-sm btn-warning edit-btn'
                                            data-toggle="modal"
                                            data-target="#editModal<?php echo $data['id'] ?>">Edit</button>
                                        <a href='invoice.php?id=<?php echo $data['id'] ?>'
                                            class='btn btn-sm btn-secondary edit-btn'>Cetak</a>
                                        <div class="modal fade" id="editModal<?php echo $data['id'] ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Edit Periksa Pasien
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form tambah data obat disini -->

                                                        <?php
                                                            $idDaftarPoli = $data['id'];
                                                            require 'config/koneksi.php';
                                                            $ambilDataPeriksa = mysqli_query($mysqli,"SELECT * FROM periksa INNER JOIN daftar_poli ON periksa.id_daftar_poli = daftar_poli.id WHERE daftar_poli.id = '$idDaftarPoli'");
                                                            $ambilData = mysqli_fetch_assoc($ambilDataPeriksa);
                                                        ?>
                                                        <form action="pages/periksaPasien/editPeriksa.php"
                                                            method="post">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $data['id'] ?>">
                                                            <div class="form-group">
                                                                <label for="nama">Nama Pasien</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" required
                                                                    value="<?php echo $data['nama'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tanggal_periksa">Tanggal Periksa</label>
                                                                <input type="datetime-local" class="form-control"
                                                                    id="tanggal_periksa" name="tanggal_periksa" required
                                                                    value="<?php echo $ambilData['tgl_periksa'] ?>">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label for="catatan">Catatan</label>
                                                                <textarea class="form-control" rows="3" id="catatan"
                                                                    name="catatan"
                                                                    required><?php echo $ambilData['catatan'] ?></textarea>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-success">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php  } else { ?>
                                        <button type='button' class='btn btn-sm btn-info edit-btn' data-toggle="modal"
                                            data-target="#periksaModal<?php echo $data['id'] ?>">Periksa</button>
                                        <div class="modal fade" id="periksaModal<?php echo $data['id'] ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Periksa Pasien</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form tambah data obat disini -->
                                                        <form action="pages/periksaPasien/periksaPasien.php"
                                                            method="post">
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $data['id'] ?>">
                                                            <div class="form-group">
                                                                <label for="nama">Nama Pasien</label>
                                                                <input type="text" class="form-control" id="nama"
                                                                    name="nama" required
                                                                    value="<?php echo $data['nama'] ?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tanggal_periksa">Tanggal Periksa</label>
                                                                <input type="datetime-local" class="form-control"
                                                                    id="tanggal_periksa" name="tanggal_periksa"
                                                                    required>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label for="catatan">Catatan</label>
                                                                <textarea class="form-control" rows="3" id="catatan"
                                                                    name="catatan" required></textarea>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label>Obat</label>
                                                                <select class="select2" multiple="multiple"
                                                                    data-placeholder="Pilih Obat" style="width: 100%;"
                                                                    name="obat[]">
                                                                    <?php 
                                                                        require 'config/koneksi.php';
                                                                        $getObat = "SELECT * FROM obat";
                                                                        $queryObat = mysqli_query($mysqli,$getObat);
                                                                        while ($datas = mysqli_fetch_assoc($queryObat)) {
                                                                    ?>
                                                                    <option value="<?php echo $datas['id'] ?>">
                                                                        <?php echo $datas['nama_obat'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-info">Periksa</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->