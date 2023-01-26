<?php
include_once '../koneksi.php';
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans&family=Poppins&display=swap"
        rel="stylesheet">

    <style>
        body,
        html {
            height: auto;
            min-height: 100vh;
        }

        .bg {
            height: auto;
            min-height: 100vh;
            background-image: linear-gradient(to top, #C3DDFD, #1A56DB);
            background-repeat: no-repeat;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="container">
            <h2 class="pt-5" style="color: white;"><strong>Pilih Gudang</strong></h2>
            <div class="row justify-content-center mt-4">
                <?php
                $idUser = $_SESSION['idUser'];
                $hasil = mysqli_query($conn, "SELECT * FROM gudang WHERE id_user = '$idUser'");
                while ($row = mysqli_fetch_array($hasil)):
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-9 text-center mb-4">
                        <a class="card" style="max-width: 95%; text-decoration: none; border-radius: 5%; background-color: #F7F7F7;"
                            href="pilihGudang.php?id=<?= $row['id_gudang']; ?>">
                            <div class="card-body" style="color: #1A56DB;">
                                <h5>
                                    <strong>
                                        <?= $row['namaGudang'] ?>
                                    </strong>
                                </h5>
                                <img src="box.png" alt="" width="110">
                                <p style="margin-top: 20px; margin-bottom: 0px; font-size: 18px;">
                                    <?php
                                    $idGudang = $row['id_gudang'];
                                    $hasil1 = mysqli_query($conn, "SELECT COUNT(*) FROM product WHERE id_gudang = '$idGudang'");
                                    $row1 = mysqli_fetch_array($hasil1);
                                    echo $row1[0];
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php endwhile ?>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

        <!-- Fontawesome JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>


</body>

</html>