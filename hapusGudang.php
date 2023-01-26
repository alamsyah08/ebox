<?php
    require_once 'koneksi.php';
    session_start();

    $idGudang =  $_SESSION['idGudang'];
    mysqli_query($conn, "DELETE FROM gudang WHERE id_gudang = '$idGudang'");
    header("Location: daftarLogin/indexPilihGudang.php");
    exit();
?>