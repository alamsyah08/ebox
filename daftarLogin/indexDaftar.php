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


  <title>Daftar</title>
</head>

<body>

  <div class="container-fluid" style="height: 100vh; background-image: linear-gradient(to top, #C3DDFD, #1A56DB); display: flex; align-items: center;">
    <div class="card mx-auto align-bottom" style="width: 28rem; max-width: 97%; border-radius: 2%;">
      <div class="card-body">
        <form action="daftar.php" method="post" class="form-container">
          <div class="login text-center mt-2 mb-4">
            <h3>
              <strong>
              Sign Up
              </strong>
            </h3>
          </div>

          <div class="form-group ">
            <?php if (isset($_SESSION['error'])): ?>
              <div class="form-control alert alert-danger" role="alert">
                <span style="margin-left: -7px;"> <?php echo $_SESSION['error']; ?> </span>
              </div>
              <?php
              session_destroy();
            endif;
            ?>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="mt-2">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
              placeholder="Masukkan email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Konfirmasi Password</label>
            <input type="password" name="password2" class="form-control" id="password"
              placeholder="Konfirmasi Password">
          </div>

          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary mt-3 px-4 py-2" name="daftar">Daftar</button>
          </div>



          <div class="daftar text-center" style="font-size: 14px;">
            <p>
              Sudah punya akun? <a href="indexLogin.php"> <strong> Langsung login kuy </strong></a>
            </p>
          </div>

        </form>
      </div>
    </div>
  </div>

</body>

</html>