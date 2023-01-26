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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- My CSS -->
    <!-- <link rel="stylesheet" href="login.css"> -->

    <title>Login</title>
  </head>
  <body>

  <div class="container-fluid" style="height: 100vh; background-image: linear-gradient(to top, #C3DDFD, #1A56DB); display: flex; align-items: center;">
    <div class="card mx-auto align-bottom" style="width: 25rem; max-width: 97%; border-radius: 2%;">
      <div class="card-body">
        <form action="login.php" method="post" class="form-container">
          <div class="login text-center mt-3 mb-5">
            <h3>
              <strong>
              Login
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

          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary mt-3 px-4 py-2" name="login">Login</button>
          </div>

          <div class="daftar text-center" style="font-size: 14px;">
            <p>
              Belum punya akun? <a href="indexDaftar.php"> <strong> Daftar kuy </strong></a>
            </p>
          </div>

        </form>
      </div>
    </div>
  </div>

    
</body>
</html>