<?php
session_start();
include 'db.php';

if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <a href="home.php"><img src="smea.png" alt=""></a>
        <h2 class="logo">Pencatatan pelanggaran siswa SMKN 1 SUBANG</h2>
        <nav class="navigation">
            <a href="home.php">Home</a>
            <a href="data.php">Data</a>
            <a href="daftar.php">Daftar</a>
            <a href="osis.php">OSIS</a>
            <a href="login.php">Logout</a>
        </nav>
    </header>
        <div class="box">
            <h4>Selamat Datang di Admin Pencatatan Pelanggaran Siswa <br>SMKN 1 SUBANG</h4>
        </div> 
</body>
</html>