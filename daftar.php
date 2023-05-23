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
    <title>Daftar</title>
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
        <a href="login.php">Keluar</a>
    </nav>
</header>
<div class="section">
        <div class="container">
        <h3>Datarkan Siswa</h3>
            <div class="box-input">
            <form action="" method="POST">
                <h5>NIS(Nomor Induk Siswa)</h5>
                <input type="text" name="NIS" class="input-control" required>
                <h5>Nama Lengkap</h5>
                <input type="text" name="nama" class="input-control" required>
                <h5>Kelas</h5>
                <select name="kelas" id="menu"class="col-1" required>
                        <option value=""></option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                </select>
                <h5>Jurusan</h5>
                <select name="jurusan" id="menu" class="col-1" required>
                        <option value=""></option>
                        <option value="AKL 1">AKL 1</option>
                        <option value="AKL 2">AKL 2</option>
                        <option value="AKL 3">AKL 3</option>
                        <option value="BDP 1">BDP 1</option>
                        <option value="BDP 2">BDP 2</option>
                        <option value="BDP 3">BDP 3</option>
                        <option value="BDP 4">BDP 4</option>
                        <option value="BDP 5">BDP 5</option>
                        <option value="DG 1">DG 1</option>
                        <option value="DG 2">DG 2</option>
                        <option value="OTKP 1">OTKP 1</option>
                        <option value="OTKP 2">OTKP 2</option>
                        <option value="OTKP 3">OTKP 3</option>
                        <option value="OTKP 4">OTKP 4</option>
                        <option value="RPL 1">RPL 1</option>
                        <option value="RPL 2">RPL 2</option>
                        <option value="TATABOGA">TATABOGA</option>
                        <option value="KULINER">KULINER</option>
                        <option value="TBSM 1">TBSM 1</option>
                        <option value="TBSM 2">TBSM 2</option>
                        <option value="TPM 1">TPM 1</option>
                        <option value="TPM 2">TPM 2</option>
                        <option value="TKJ 1">TKJ 1</option>
                        <option value="TKJ 2">TKJ 2</option>
                </select>
                <h5>Jabatan</h5>
                <select name="jabatan" id="menu" class="col-1" required>
                        <option value=""></option>
                        <option value="OSIS">OSIS</option>
                        <option value="MPK">MPK</option>
                </select>
                <h5>Password</h5>
                <input type="password" name="pass" class="input-control" required>
                <input type="submit" name="daftar" value="Daftarkan" class="btnp">
            </from>
            <?php 
                if(isset($_POST['daftar'])){
                
                    $NIS       = $_POST['NIS'];
                    $nama      = $_POST['nama'];
                    $kelas     = $_POST['kelas'];
                    $jurusan   = $_POST['jurusan'];
                    $jabatan   = $_POST['jabatan'];
                    $pass      = $_POST['pass'];

                        $insert = mysqli_query($conn, "INSERT INTO tb_login VALUES ( null, '".$NIS."', '".$nama."', '".$kelas."', '".$jurusan."', '".$jabatan."', '".MD5($pass)."') ");

                        if($insert){
                            echo '<script>alert("Berhasil di Daftarkan")</script>';
                            echo '<script>window.location="osis.php"</script>';
                        }else{
                            echo 'gagal'.mysqli_error($conn);
                        }
                    }
            ?>
            </div>
        </div>
    </div>
</body>
</html>