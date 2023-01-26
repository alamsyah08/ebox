<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Gudang</title>
</head>

<body>
  <div class="container-fluid"
    style="height: 100vh; background-image: linear-gradient(to top, #C3DDFD, #1A56DB); display: flex; align-items: center;">
    <div class="card mx-auto align-bottom" style="width: 25rem; height: 400px; max-width: 97%; border-radius: 2%;">
      <div class="card-body">
        <form action="gudang.php" method="post" class="form-container">
          <div class="text-center mt-3 mb-5">
            <h3>
              <strong>
              Buat Gudang
              </strong>
            </h3>
          </div>


          <div class="form-group ">
            <?php if (isset($_SESSION['errorG'])): ?>
              <div class="form-control alert alert-danger" role="alert">
                <span style="margin-left: -7px;"> <?php echo $_SESSION['errorG']; ?> </span>
              </div>
              <?php
              session_destroy();
            endif;
            ?>
          </div>
          <div class="form-group email">
            <label for="exampleInputEmail1">Nama Gudang</label>
            <input type="text" name="nama_gudang" class="form-control" id="email" aria-describedby="emailHelp"
              placeholder="Masukkan nama gudang">
          </div>

          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary mt-4 px-4 py-2" name="daftarGudang">Submit</button>
          </div>

        </form>

      </div>
    </div>
  </div>

</body>

</html>