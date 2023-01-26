<?php
require_once '../koneksi.php';
session_start();

// Ambil data di url
$id = $_GET['id'];
$_SESSION['idProduk'] = $id;

// Query detail product berdasarkan id
$sql = "SELECT * FROM product WHERE product.id = '$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

# Query Daftar Gudang
$idUser = $_SESSION['idUser'];
$hasil = mysqli_query($conn, "SELECT * FROM gudang WHERE id_user = '$idUser'");

# Query untuk Riwayat
$tampungId = $_SESSION['idGudang'];
$sql2 = "SELECT * FROM product JOIN riwayat ON(product.id = riwayat.id_product) WHERE riwayat.id_gudang = '$tampungId' AND riwayat.id_product = $id ORDER BY tanggal DESC";
$result2 = mysqli_query($conn, $sql2);

# Ketika button hapus ditekan
if (isset($_POST["hapus"])) {
    //hapus data berdasarkan ID
    mysqli_query($conn, "DELETE FROM product WHERE id = '$id'");
    header("Location: daftarProduk.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="sidebar.css">

</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse"
            style="background-color: rgb(226, 232, 243);">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-5">
                    <div class="dropdown">
                        <a class="list-group-item list-group-item-action py-2 ripple dropdown-toggle text-center"
                            href="#" role="button" id="dropdownMenuLink" data-mdb-toggle="dropdown"
                            aria-expanded="false">
                            <strong style="font-size: 18px;">
                                <?php echo $_SESSION['namaGudang']; ?>
                            </strong>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php while ($row = mysqli_fetch_array($hasil)): ?>
                                <li>
                                    <a class="dropdown-item" href="../daftarLogin/pilihGudang.php?id=<?= $row['id_gudang']; ?>">
                                        <?= $row['namaGudang'] ?>
                                    </a>
                                </li>
                            <?php endwhile ?>
                        </ul>
                    </div>
                    <a href="../daftarProd/daftarProduk.php"
                        class="list-group-item list-group-item-action py-2 ripple active">
                        <i class="fa-solid fa-list fa-fw me-3"></i><span>Daftar Produk</span>
                    </a>
                    <a href="../stockIn/stokIn.php" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fa-solid fa-arrow-trend-down fa-fw me-3"></i><span>Stok In</span></a>
                    <a href="../StockOut/stokOut.php" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fa-solid fa-arrow-trend-up fa-fw me-3"></i></i><span>Stok Out</span></a>
                    <a href="../riwayat/riwayat.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fa-solid fa-clock-rotate-left fa-fw me-3"></i><span>Riwayat</span>
                    </a>
                    <a href="../hapusGudang.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fa-solid fa-trash-can fa-fw me-3"></i><span>Hapus Gudang</span>
                    </a>
                    <a href="../logout.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fa-solid fa-arrow-right-from-bracket fa-fw me-3"></i><span>Logout</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top" style="height: 80px;">
            <!-- Container wrapper -->
            <div class="container-fluid" style="justify-content: left;">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                <div class="navbar-brand mx-4">
                    <img src="../img/logo.png" height="35" alt="" loading="lazy" />
                    <h3 style="margin-bottom:0; margin-left:3px;">eBox</h3>
                </div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin: 80px 10px 0 10px; background-color: white;">
        <div class="container pt-4 mx-auto">
            <h3 class="mt-1">Detail Produk</h3>

            <div class="row">
                <div class="produk col-md-6">
                    <div class="input-group mt-2" style="margin-left: 2px;">
                        <h5>Informasi Produk</h5>
                    </div>

                    <!--Detail Produk-->
                    <div class="list-group list-group-flush mt-2">
                        <div class="row" style="font-size: 18px;">
                            <hr>
                            <div class="col-4 col-lg-3" style="margin-left: 5px;">
                                <p style="color: black; font-weight: normal;">Nama</p>
                                <p style="color: black; font-weight: normal;">Harga Beli</p>
                                <p style="color: black; font-weight: normal;">Harga Jual</p>
                            </div>
                            <div class="col-4 col-lg-6" style="margin-left: 20px;">
                                <p style="color: black; font-weight: normal;">
                                    <?= $data['nama'] ?>
                                </p>
                                <p style="color: black; font-weight: normal;">
                                    <?= $data['harga_beli'] ?>
                                </p>
                                <p style="color: black; font-weight: normal;">
                                    <?= $data['harga_jual'] ?>
                                </p>
                            </div>
                            <div class="col-2 col-lg-2 my-auto" style="float: right;">
                                <img src="image/produk/<?= $data['id'] ?>-<?= $data['photo'] ?>"
                                    style="width: 90px; height: 75px;">
                            </div>

                            <hr>
                            <div class="col-4 col-lg-3" style="margin-left: 5px;">
                                <p style="color: black; font-weight: normal;">Tipe</p>
                                <p style="color: black; font-weight: normal;">Merek</p>
                            </div>
                            <div class="col-4 col-lg-6" style="margin-left: 20px;">
                                <p style="color: black; font-weight: normal;">
                                    <?= $data['tipe'] ?>
                                </p>
                                <p style="color: black; font-weight: normal;">
                                    <?= $data['merk'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--Detail Produk-->

                </div>

                <div class="produk col-md-5  mt-4 text-center">

                    <a href="editProduk.php" class="btn btn-secondary mx-auto"> <strong> Edit. </strong> </a>
                    <button type="button" class="btn btn-secondary mx-auto" data-mdb-toggle="modal"
                        data-mdb-target="#exampleModal" value="Hapus"> <strong> Hapus </strong>
                    </button>

                    <!-- Alert Konfirmasi -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pesan Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">Apakah anda yakin ingin menghapus produk ini?</div>
                                <div class="modal-footer">
                                    <form action="" method="post">
                                        <button type="button" class="btn btn-secondary"
                                            data-mdb-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br><br>

                    <div class="card text-center" style="width: 75%; margin: auto; margin-bottom: 50px;">
                        <div class="card-header my-1">
                            <h5 class="card-title">Riwayat <br> dan <br> Total Produk</h5>
                            <p style="text-align: center; font-size: 26px; margin-bottom: 0;"><strong>
                                    <?= $data['jumlah'] ?>
                                </strong>
                            </p>
                        </div>
                        <div class="card-body">
                            <?php while ($data2 = mysqli_fetch_array($result2)): ?>
                                <div style="clear: both;">
                                    <div style="float: left;">
                                        <p style="font-size:16px;" class="m-0">
                                            <?= $data2['jenisStok'] ?>
                                        </p>
                                        <p style="font-size:12px;color:#6B7280" class="tgl" margin-top="10px">
                                            <?= $data2['tanggal'] ?>
                                        </p>
                                    </div>
                                    <div style="float: right;">
                                        <?php if ($data2['jenisStok'] === 'Stok Masuk'): ?>
                                            <p style="font-size:20px;color:#194FB1;" class="right"><b> +<?= $data2['jumlah'] ?>
                                                </b>
                                            </p>
                                        <?php else: ?>
                                            <p style="font-size:20px;color:red;" class="right"><b> -<?= $data2['jumlah'] ?> </b>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!--Main layout-->
    <script src="sidebar.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</body>

</html>