<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mt-4">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="assets/dist/img/avatar5.png"
                                alt="User profile picture">
                        </div>
                        <?php 
                            require 'config/koneksi.php';
                            $dataDokter = mysqli_query($mysqli, "SELECT dokter.nama, poli.nama_poli, dokter.alamat, dokter.no_hp FROM dokter INNER JOIN poli ON dokter.id_poli = poli.id WHERE dokter.id = '$idDokter'");
                            $getData = mysqli_fetch_assoc($dataDokter);
                        ?>

                        <h3 class="profile-username text-center"><?php echo $username ?></h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Poli</b> <a class="float-right"><?php echo $getData['nama_poli'] ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                        <p class="text-muted"><?php echo $getData['alamat'] ?></p>

                        <hr>


                        <hr>

                        <strong><i class="fas fa-phone mr-1"></i> No Telpon</strong>

                        <p class="text-muted"><?php echo $getData['no_hp'] ?></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9 mt-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="pages/profileDokter/editProfile.php" method="post">
                            <input type="hidden" value="<?php echo $idDokter ?>" name="idDokter">
                            <div class="form-group mb-3">
                                <label for="nama font-weight-bold">Nama</label>
                                <input type="text" class="form-control" name="nama"
                                    value="<?php echo $getData['nama'] ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_hp font-weight-bold">No Telpon</label>
                                <input type="text" class="form-control" name="no_hp"
                                    value="<?php echo $getData['no_hp'] ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" font-weight-bold">Password Lama</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="newPassword" font-weight-bold">Password Baru</label>
                                <input type="password" class="form-control" name="newPassword" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" rows="3" id="alamat" name="alamat"
                                    required><?php echo $getData['alamat'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">
                                Simpan
                            </button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>