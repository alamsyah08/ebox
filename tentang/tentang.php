<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="tentang.css">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>tentang</title>
</head>

<body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: white;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" width="35" height="100%" class="d-inline-block align-top" alt="">
                eBox</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link" href="../beranda/beranda.php">Beranda</a>
                    <a class="nav-item nav-link active" href="#">Tentang</a>
                    <a class="nav-item btn btn-primary tombol" href="../daftarLogin/indexLogin.php">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container" data-aos="fade-up">
            <div class="row atas justify-content-center">
                <div class="col-lg-6">
                    <h1 class="display-4">Mengapa <span>eBox</span> adalah
                        <br>
                        yang Terbaik?
                    </h1>
                </div>
                <div class="col-lg-6 col-md-9">
                    <img src="img/gambar1.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- tengah -->
    <div class="bawahnya" data-aos="fade-up">
        <div class="row tengah justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-6 ml-1">
                <img src="img/gambar2.png" class="img-fluid" width="600px">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 kolomteks my-auto mx-auto">
                <h3><strong>eBox</strong>
                    <br>
                    Sederhana dan Mudah
                </h3>
                <p>
                    Fitur dan tampilan eBox didesain dengan
                    <br>
                    sederhana dan sebaik mungkin agar
                    <br>
                    memudahkan pengguna.
                </p>
            </div>
        </div>

        <div class="row bawah" data-aos="fade-up">
            <div class="col-lg-4 col-md-4 col-sm-5 kolomteks2 my-auto mx-auto" data-aos="fade-up">
                <h3>Prioritas<b> eBox </b> adalah
                    <br>
                    Manajemen Inventaris
                </h3>
                <p>
                    eBox fokus dalam mengontrol stok, memulai manajemen
                    <br>
                    inventaris tanpa kesalahan dengan berbagai fitur pintar eBox.

                </p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 ml-1" data-aos="fade-up">
                <img src="img/gambar3.png" class="img-fluid" width="600px">
            </div>
        </div>

        <div class="row bawahBanget" data-aos="fade-up">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="img/gambar4.png" class="img-fluid" width="600px">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 kolomteks my-auto mx-auto">
                <h3><strong>eBox</strong>
                    <br>
                    Berkapasitas besar
                </h3>
                <p>
                    eBox tidak hanya mampu menampung
                    <br>
                    data gudang kecil tetapi juga mampu
                    <br>
                    menampung data gudang besar.
                </p>
            </div>
        </div>
    </div>
    <div class="berubah">
        <div class="fiturApa row text-center mb-4" data-aos="fade-up">
            <div class="col">
                <h2>Fitur apa saja yang ada dalam eBox?</h2>
                <p>Dibagi menjadi Registrasi Produk, Stok Masuk & Stok Keluar,
                    <br>
                    juga Kontrol Stok. Fitur-fitur utama untuk manajemen
                    <br>
                    yang efisien telah disediakan
                </p>
            </div>
        </div>

        <section class="fiturRegis" data-aos="fade-up">
            <div class="container">
                <h4 class="judul">
                    Registrasi Produk
                </h4>
                <div class="row justify-content-center text-left" id="fitur">
                    <div class="col-md-2">
                        <img src="img/deskripsi.png" alt="" width="210">
                        <h6>Deskripsi</h6>
                    </div>
                    <div class="col-md-2">
                        <img src="img/kategori.png" alt="" width="110">
                        <h6>Kategori</h6>
                    </div>
                    <div class="col-md-2">
                        <img src="img/foto.png" alt="" width="110">
                        <h6>Foto Produk</h6>
                    </div>
                </div>
            </div>
        </section>
        <section class="fitur" data-aos="fade-up">
            <div class="container">
                <div class="row text-left mb-4">
                    <div class="col judul">
                        <h4>Stok Masuk & Stok Keluar</h4>
                    </div>
                </div>
                <div class="row justify-content-center text-left" id="fitur">
                    <div class="col-md-2">
                        <img src="img/mitra.png" alt="" width="110">
                        <h6>Mitra</h6>
                    </div>
                    <div class="col-md-2">
                        <img src="img/riwayat.png" alt="" width="110">
                        <h6>Riwayat</h6>
                    </div>
                    <div class="col-md-2">
                        <img src="img/excel.png" alt="" width="110">
                        <h6>Integrasi Excel</h6>
                    </div>
                </div>
            </div>
        </section>
        <section class="fitur" data-aos="fade-up">
            <div class="container">
                <div class="row text-left mb-4">
                    <div class="col judul">
                        <h4>Pengatur Persediaan</h4>
                    </div>
                </div>
                <div class="row justify-content-center text-left" id="fitur">
                    <div class="col-md-2">
                        <img src="img/total.png" alt="" width="110">
                        <h6>Total Persediaan</h6>
                    </div>
                    <div class="col-md-2">
                        <img src="img/analisis.png" alt="" width="110">
                        <h6>Analisis</h6>
                    </div>
                    <div class="col-md-2">
                        <img src="img/daftarProduk.png" alt="" width="110">
                        <h6>Daftar produk</h6>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="footer">
        <div class="textFooter" data-aos="fade-up">
            <h4>
                Layanan Pengaduan Konsumen

            </h4>
            <hr>
            <p>PT. Valyou Barokah</p>
            <p>
                email : valyoubarokah@gmail.com
            </p>
            <h6>
                Direktorat Jenderal Perlindungan Konsumen dan Tertib Niaga
                <br>
                Kementerian Perdagangan Republik Indonesia
                <br>
            </h6>
            <p>
                Whatsapp Pengaduan Konsumen Ditjen PKTN: 0853-1111-1010
            </p>
        </div>
    </div>
    </div>
    </div>





</body>

</html>