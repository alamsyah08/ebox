<?php
require_once '../koneksi.php';
session_start();

$tampungId = $_SESSION['idGudang'];

# Query Daftar Gudang
$idUser = $_SESSION['idUser'];
$hasil = mysqli_query($conn, "SELECT * FROM gudang WHERE id_user = '$idUser'");

# Query Stok In
if (isset($_POST['submit'])) {
    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM product WHERE id = '$id'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $jumlahProd = $row['jumlah'];
    }

    if ($_POST['jumlah'] > 0) {
        $stokIn = $_POST['jumlah'];
        $tanggal = $_POST['tanggal'];
        $jenis = "Stok Masuk";
        $idProduct = $_GET['id'];
        $idGudang = $_SESSION['idGudang'];

        $jumlahTerbaru = $stokIn + $jumlahProd;

        mysqli_query($conn, "INSERT INTO riwayat (jenisStok, jumlah,	tanggal, id_product, id_gudang) 
					VALUES ('$jenis', $stokIn, '$tanggal', $idProduct, $idGudang)");
        mysqli_query($conn, "UPDATE product SET product.jumlah = $jumlahTerbaru 
					WHERE product.id = $id");

        // header("Location: stokIn.php");
    }
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
                    <a href="../daftarProd/daftarProduk.php" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fa-solid fa-list fa-fw me-3"></i><span>Daftar Produk</span>
                    </a>
                    <a href="../stockIn/stokIn.php" class="list-group-item list-group-item-action py-2 ripple active"><i
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
            <h3 class="mt-1">Stok Masuk</h3>

            <div class="row">
                <div class="produk col-md-6">
                    <div class="input-group mt-3 mb-1" style="margin-left: 1px;">
                        <h5>Pilih Produk</h5>
                    </div>

                    <!--Detail Produk-->
                    <div class="list-group list-group-flush mt-1">
                        <!--Search-->
                        <div class="input-group mb-3">
                            <form class="form-outline">
                                <input type="search" id="form1" class="form-control" name="search" />
                                <label class="form-label" for="form1">Search</label>
                            </form>
                            <button type="button" class="btn btn-primary" name="buttonSearch">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <!--Search-->
                        <?php
                        # Query Daftar Produk
                        $sql = "SELECT * FROM product WHERE product.id_gudang = '$tampungId'";
                        if (isset($_GET['search']) or isset($_POST['buttonSearch'])) {
                            $sql = "SELECT * FROM product WHERE nama LIKE '%" . $_GET['search'] . "%' AND product.id_gudang = '$tampungId'";
                        }
                        $result = mysqli_query($conn, $sql);
                        while ($data = mysqli_fetch_array($result)):
                            ?>
                            <a href="stokIn.php?id=<?= $data['id']; ?>"
                                class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                <div class="row">
                                    <div class="col-3 col-lg-2">
                                        <img src="../daftarProd/image/produk/<?= $data['id'] ?>-<?= $data['photo'] ?>"
                                            style="width: 60px; height: 55px;">
                                    </div>
                                    <div class="col-7 col-lg-8">
                                        <?= $data['nama'] ?> <br>
                                        <?= $data['harga_beli'] ?> /
                                        <?= $data['harga_jual'] ?> / <?= $data['tipe'] ?> / <?= $data['merk'] ?>
                                    </div>
                                    <div class="col-2 col-lg-2 text-end">
                                        <p style="font-size:18px; margin-bottom: 0px; margin-top: 7px;">
                                            <?= $data['jumlah'] ?>
                                        </p>
                                        <p style="font-size:16px;color: #194FB1; margin-bottom: 0; margin-top: -4px;">
                                            <?php if (isset($_POST['submit']) && $data['id'] === $id && $_POST['jumlah'] > 0) {
                                                echo "+ " . $_POST['jumlah'];
                                            } ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile ?>
                    </div>
                    <!--Detail Produk-->

                </div>

                <div class="produk col-md-6  mt-5">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card" style="width: 80%; margin: auto;">
                            <div class="card-body">
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <input type="number" name="jumlah" class="form-control"
                                            placeholder="masukkan jumlah" required />
                                    </div>
                                    <div class="col-6">
                                        <input type="date" name="tanggal" id="typeNumber" class="form-control"
                                            required />
                                    </div>
                                </div>
                                <p class="mt-5" style="font-size: 18px;"><strong> Jumlah Masukkan :
                                        <span style="color:#194FB1;">
                                            <?php if (isset($_POST['submit']) && $_POST['jumlah'] > 0) {
                                                echo $_POST['jumlah'];
                                            } ?>
                                        </span></strong>
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <button class="btn btn-secondary" name="submit"> <strong> Masukkan </strong> </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
    <!--Main layout-->
    <script src="sidebar.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
</body>

</html>