<?php
require_once '../koneksi.php';
session_start();

// ambil data di url
$id = $_SESSION['idProduk'];
// query product berdasarkan id
$sql = "SELECT * FROM product WHERE product.id = '$id'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

if (isset($_POST["submit"])) {
    if ($_FILES['photo']['size'] == 0) {
        $nama = $_POST["nama"];
        $jual = $_POST['harga_jual'];
        $beli = $_POST['harga_beli'];
        $tipe = $_POST['tipe'];
        $merk = $_POST['merk'];
        $sql = "UPDATE product SET
						nama = '$nama',
						harga_beli = $beli,
						harga_jual = $jual,
						tipe =  '$tipe',
						merk =  '$merk'
						WHERE product.id = $id";
        if (mysqli_query($conn, $sql)) {
            header("Location: detailProduk.php?id=$id");
        }
    } else {
        $targetFile = strtotime(date("Y-m-d H:i:s")) . "-" . basename($_FILES["photo"]["name"]);
        $nama = $_POST["nama"];
        $jual = $_POST['harga_jual'];
        $beli = $_POST['harga_beli'];
        $tipe = $_POST['tipe'];
        $merk = $_POST['merk'];
        $sql = "UPDATE product SET
						nama = '$nama',
						harga_beli = $beli,
						harga_jual = $jual,
						tipe =  '$tipe',
						merk =  '$merk',
						photo = '$targetFile'
						WHERE product.id = $id";
        if (mysqli_query($conn, $sql)) {
            move_uploaded_file($_FILES["photo"]["tmp_name"], 'image/produk/' . $id . "-" . $targetFile);
            header("Location: detailProduk.php?id=$id");
        }
    }

}
if (isset($_POST["cancel"])) {
    header("Location: detailProd.php?id=$id");
}

# Query Daftar Gudang
$idUser = $_SESSION['idUser'];
$hasil = mysqli_query($conn, "SELECT * FROM gudang WHERE id_user = '$idUser'");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="sidebar.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
            <form method="POST" enctype="multipart/form-data">
                <h3 class="mt-1">Edit Produk</h3>

                <div class="row">
                    <div class="produk col-md-6">

                        <!--Detail Produk-->
                        <div class="list-group list-group-flush mt-2">
                            <div class="input-group mb-1" style="margin-left: 2px;">
                                <h5>Deskripsi Produk</h5>
                            </div>
                            <div class="row" style="font-size: 18px;">
                                <hr>
                                <div class="col-4 col-lg-3" style="margin-left: 5px;">
                                    <p style="color: black; font-weight: normal;">Nama</p>
                                </div>
                                <div class="col-6 col-lg-8" style="margin-left: 20px;">
                                    <input type="text" id="form6Example1" class="form-control"
                                        value="<?= $data['nama'] ?>" name="nama" />
                                </div>
                            </div>
                            <div class="row" style="font-size: 18px;">
                                <div class="col-4 col-lg-3" style="margin-left: 5px;">
                                    <p style="color: black; font-weight: normal;">Harga Beli</p>
                                </div>
                                <div class="col-6 col-lg-8" style="margin-left: 20px;">
                                    <input type="text" id="form6Example1" class="form-control"
                                        value="<?= $data['harga_beli'] ?>" name="harga_beli" />
                                </div>
                            </div>
                            <div class="row" style="font-size: 18px;">
                                <div class="col-4 col-lg-3" style="margin-left: 5px;">
                                    <p style="color: black; font-weight: normal;">Harga Jual</p>
                                </div>
                                <div class="col-6 col-lg-8" style="margin-left: 20px;">
                                    <input type="text" id="form6Example1" class="form-control"
                                        value="<?= $data['harga_jual'] ?>" name="harga_jual" />
                                </div>
                            </div>

                            <div class="input-group mt-4 mb-1" style="margin-left: 2px;">
                                <h5>Kategori Produk</h5>
                            </div>
                            <div class="row" style="font-size: 18px;">
                                <hr>
                                <div class="col-4 col-lg-3" style="margin-left: 5px;">
                                    <p style="color: black; font-weight: normal;">Tipe</p>
                                </div>
                                <div class="col-6 col-lg-8" style="margin-left: 20px;">
                                    <select class="form-select" aria-label="Default select example" name="tipe">
                                        <option value="Buku">Buku</option>
                                        <option value="Dapur">Dapur</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Clothing Brand">Clothing Brand</option>
                                        <option value="Film & Musik">Film & Musik</option>
                                        <option value="Kecantikan">Kecantikan</option>
                                        <option value="Kesehatan">Kesehatan</option>
                                        <option value="Komputer dan Laptop">Komputer dan Laptop</option>
                                        <option value="Olahraga">Olahraga</option>
                                        <option value="Rumah Tangga">Rumah Tangga</option>
                                        <option value="Wedding">Wedding</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="font-size: 18px; margin-top: 5px;">
                                <div class="col-4 col-lg-3" style="margin-left: 5px;">
                                    <p style="color: black; font-weight: normal;">Merek</p>
                                </div>
                                <div class="col-6 col-lg-8" style="margin-left: 20px;">
                                    <input type="text" id="form6Example1" class="form-control"
                                        value="<?= $data['merk'] ?>" name="merk" />
                                </div>
                            </div>
                        </div>
                        <!--Detail Produk-->

                    </div>

                    <div class="produk col-12 col-md-5 text-center" style="margin-top: -10px;">

                        <br><br>

                        <div class="card" style="width: 70%; margin: auto; margin-bottom: 20px;">
                            <div class="card-body">
                                <input type="file" id="photo" style="display:none;" onchange="readURL(this)"
                                    accept="image/*" name="photo">
                                <label for="photo"><img style="width: 150px; height: 150px;"
                                        src="image/produk/<?= $data['id'] ?>-<?= $data['photo'] ?>" id="image"></label>
                                <script>
                                    $(function () {
                                        $('#photo').change(function () {
                                            var input = this;
                                            var url = $(this).val();
                                            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                                            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                                                var reader = new FileReader();
                                                reader.onload = function (e) {
                                                    $('#image').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            } else {
                                                $('#image').attr('src', 'img/photo.png');
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary mx-auto mt-4"
                    style="font-size: 15px; margin-bottom: 50px;" name="submit"> Simpan </button>
                <a href="detailProduk.php" class="btn btn-secondary mt-4"
                    style="font-size: 15px; margin-bottom: 50px; margin-left: 10px;"> Batal </a>
                <br>
            </form>
        </div>
    </main>
    <!--Main layout-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="sidebar.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

    </script>
</body>

</html>