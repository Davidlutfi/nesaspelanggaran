<?php
    session_start();
    include 'db.php';

    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $produk = mysqli_query($conn, "SELECT * FROM tb_login WHERE id = '".$_GET['id']."' ");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="osis.php"</script>';
    }
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Osis</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section">
        <div class="container">
        <h3>Edit data osis</h3>
            <div class="box-input">
            <form action="" method="POST">
                <h5>NIS (Nomor Induk Siswa)</h5>
                <input type="text" name="NIS" class="input-control" value="<?php echo $p->NIS ?>" required>
                <h5>Nama Lengkap</h5>
                <input type="text" name="nama" class="input-control" value="<?php echo $p->nama_lengkap ?>" required>
                <h5>Kelas</h5>
                <select name="kelas" id="menu" class="col-1" required>
                        <option value="<?php echo $p->kelas ?>"><?php echo $p->kelas ?></option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                </select>
                <h5>Jurusan</h5>
                <select name="jurusan" id="menu" class="col-1" required>
                        <option value="<?php echo $p->jurusan ?>"><?php echo $p->jurusan ?></option>
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
                <select name="jabatan" id="menu" class="col-1">
                        <option value="<?php echo $p->jabatan ?>"><?php echo $p->jabatan ?></option>
                        <option value="OSIS">OSIS</option>
                        <option value="MPK">MPK</option>
                </select>
                <input type="submit" name="lapor" value="Edit" class="btnp">
                </from>
            <?php 
                if(isset($_POST['lapor'])){

                    $NIS       = $_POST['NIS'];
                    $nama      = $_POST['nama'];
                    $kelas     = $_POST['kelas'];
                    $jurusan   = $_POST['jurusan'];
                    $jabatan   = $_POST['jabatan'];

                    $update = mysqli_query($conn, "UPDATE tb_login SET 
                                            NIS = '".$NIS."',
                                            nama_lengkap = '".$nama."',
                                            kelas = '".$kelas."',
                                            jurusan = '".$jurusan."',
                                            jabatan = '".$jabatan."'
                                            WHERE id = '".$p->id."' ");
                    if($update){
                        echo '<script>alert("Ubah Data Berhasil")</script>';
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