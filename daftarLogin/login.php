<?php
require_once '../koneksi.php';
session_start();

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $query_sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    
    $result = mysqli_query($conn, $query_sql);

    if (mysqli_num_rows($result) > 0) {
        $result1 = mysqli_query($conn, "SELECT * FROM users u JOIN gudang g ON(u.id = g.id_user)WHERE u.email = '$email'");
        if (mysqli_num_rows($result1) > 0) {
            $row = mysqli_fetch_assoc($result1);
            if ($row['email'] == $email) {
                // membuat variabel global untuk menampung id dan nama gudang dari user
                $_SESSION['idUser'] = $row['id'];
            }
        }
        header("Location: ../daftarLogin/indexPilihGudang.php");
        exit();
    }else{
        if (empty($email)){
            $_SESSION['error'] = "Email harus diisi";
            header("Location: indexLogin.php");
            exit();
        }else if(empty($password)){
            $_SESSION['error'] = "Password harus diisi";
            header("Location: indexLogin.php");
            exit();
        }else{
            $_SESSION['error'] = "Email atau Password salah";
            header("Location: indexLogin.php");
		    exit();
        }
    }
}else{
	header("Location: indexLogin.php");
	exit();
}

?>