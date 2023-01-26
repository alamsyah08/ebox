<?php
require_once '../koneksi.php';
session_start();

if (isset($_POST["daftarGudang"])) {

    $gudang = $_POST["nama_gudang"];

    //cek form nama Gudang jika kosong
    if (empty($gudang)){
        $_SESSION['errorG'] = "Nama Gudang harus diisi";
        header("Location: indexGudang.php");
        exit();
    }
    //cek jika nama gudang sudah digunakan
    $cek = mysqli_query($conn, "SELECT namaGudang FROM gudang WHERE namaGudang = '$gudang'");
    if (mysqli_fetch_assoc($cek)){
        $_SESSION['errorG'] = "Nama Gudang sudah digunakan";
        header("Location: indexGudang.php");
        exit();
    }

    //menambahkan gudang baru ke dalam database
    $id = $_SESSION['idUser'];
    mysqli_query($conn, "INSERT INTO gudang (namaGudang, id_user)
                 VALUES('$gudang', '$id')");

    // membuat variabel global untuk menampung id dari user yang daftar
    $result = mysqli_query($conn, "SELECT * FROM gudang WHERE namaGudang = '$gudang'");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['namaGudang'] == $gudang) {
            // membuat variabel global untuk menampung id dan nama gudang dari user
            $_SESSION['namaGudang'] = $row['namaGudang'];
        }
    }


    header("Location: indexPilihGudang.php");
    exit();
    

} 
?>