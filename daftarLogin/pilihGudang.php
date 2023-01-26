<?php
    require_once '../koneksi.php';
    session_start();

    $id = $_GET['id'];
    $_SESSION['idGudang'] = $id;
    $result = mysqli_query($conn, "SELECT namaGudang FROM gudang WHERE id_gudang = '$id'");
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // membuat variabel global untuk menampung nama gudang
            $_SESSION['namaGudang'] = $row['namaGudang'];
            
        }
    header("Location: ../daftarProd/daftarProduk.php");
?>