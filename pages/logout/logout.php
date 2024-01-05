<?php
    session_start();

    //menghapus semua session
    session_destroy();
    //pindah halaman login
    header("location:../../index.php");
?>