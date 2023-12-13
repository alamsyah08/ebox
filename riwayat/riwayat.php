<?php
require_once '../koneksi.php';
session_start();

$tampungId = $_SESSION['idGudang'];

# Query Daftar Gudang
$idUser = $_SESSION['idUser'];
$hasil = mysqli_query($conn, "SELECT * FROM gudang WHERE id_user = '$idUser'");


$tampungId = $_SESSION['idGudang'];
$sql = "SELECT * FROM product JOIN riwayat ON(product.id = riwayat.id_product) WHERE product.id_gudang = '$tampungId' ORDER BY tanggal DESC";
if (isset($_GET['search'])) {
    $sql = "SELECT * FROM product JOIN riwayat ON(product.id = riwayat.id_product) WHERE nama LIKE '%" . $_GET['search'] . "%' AND product.id_gudang = '$tampungId' ORDER BY tanggal DESC";
}
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat</title>
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
                            <?php
                            while ($row = mysqli_fetch_array($hasil)):
                                ?>
                                <li><a class="dropdown-item" href="../daftarLogin/pilihGudang.php?id=<?= $row['id_gudang']; ?>">
                                        <?= $row['namaGudang'] ?>
                                    </a></li>
                            <?php endwhile ?>
                            <li><a class="dropdown-item text-center" href="../daftarLogin/indexGudang.php">
                                <strong> --- Tambah Gudang Baru --- </strong>
                            </a></li>
                        </ul>
                    </div>
                    <a href="../daftarProd/daftarProduk.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fa-solid fa-list fa-fw me-3"></i><span>Daftar Produk</span>
                    </a>
                    <a href="../stockIn/stokIn.php" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fa-solid fa-arrow-trend-down fa-fw me-3"></i><span>Stok In</span></a>
                    <a href="../StockOut/stokOut.php" class="list-group-item list-group-item-action py-2 ripple"><i
                            class="fa-solid fa-arrow-trend-up fa-fw me-3"></i></i><span>Stok Out</span></a>
                    <a href="../riwayat/riwayat.php" class="list-group-item list-group-item-action py-2 ripple active">
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
            <h3 class="mt-1">Riwayat</h3>

            <div class="row">
                <div class="produk col-md-8">
                    <!--Search-->
                    <div class="input-group mt-4">
                        <form class="form-outline">
                            <input type="search" id="form1" class="form-control" name="search" />
                            <label class="form-label" for="form1">Search</label>
                        </form>
                        <button type="button" class="btn btn-primary" name="buttonSearch">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <!--Search-->

                    <!--Daftar Produk-->
                    <div class="list-group list-group-flush mt-4">
                        <?php
                        while ($data = mysqli_fetch_array($result)):
                            ?>
                            <a href="../daftarProd/detailProduk.php?id=<?= $data['id']; ?>"
                                class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                <div class="row">
                                    <div class="col-8">
                                        <Strong style="font-size: 18px;">
                                            <?= $data['jenisStok'] ?>
                                        </Strong> <br>
                                        <?= $data['nama'] ?>
                                    </div>
                                    <div class="col-4" style="float: right; text-align: right;">
                                        <?php if ($data['jenisStok'] === 'Stok Masuk'): ?>
                                            <p style="font-size:20px; color:#194FB1; margin-bottom: 0;"><b>
                                                    +<?= $data['jumlah'] ?>
                                                </b></p>
                                        <?php else: ?>
                                            <p style="font-size:20px; color:red; margin-bottom: 0;"><b>
                                                    -<?= $data['jumlah'] ?>
                                                </b>
                                            </p>
                                        <?php endif; ?>
                                        <p style="font-size:12px; color:#6B7280; margin-bottom: 0;">
                                            <?= $data['tanggal'] ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile ?>
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