<?php
    session_start();
    include 'db.php';

    if($_SESSION['status_login_user'] != true){
        echo '<script>window.location="index.php"</script>';
    }

    $query = mysqli_query($conn, "SELECT * FROM tb_login WHERE id");
    $d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <a href="lapor.php"><img src="smea.png" alt=""></a>
    <h2 class="logo">Pencatatan pelanggaran siswa SMKN 1 SUBANG</h2>
    <nav class="navigation">
        <a href="lapor.php">Laporkan</a>
        <a href="profil.php">Profil</a>
        <a href="index.php">Keluar</a>
    </nav>
</header>
    <div class="section">
        <div class="container">
           <h3>Profil</h3>
           <div class="box-input">
            <form action="" method="POST">
                <h5>NIS (Nomor Induk Siswa)</h5>
                <input type="text" name="NIS" placeholder="NIS" class="input-control" value="<?php echo $d->NIS ?>" require>
                <h5>Nama Lengkap</h5>
                <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama_lengkap ?>" required>
                <h5>Kelas</h5>
                <input type="text" name="class" placeholder="Kelas" class="input-control" value="<?php echo $d->kelas ?>" required>
                <h5>Jurusan</h5>
                <input type="text" name="jurusan" placeholder="Jurusan" class="input-control" value="<?php echo $d->jurusan ?>" required>
                <h5>Jabatan</h5>
                <input type="text" name="jabatan" placeholder="Jabatan" class="input-control" value="<?php echo $d->jabatan ?>" required>
            </form>
            <?php
                if(isset($_POST['submit'])){

                    $NIS         = ucwords($_POST['NIS']);
                    $nama        = $_POST['nama'];
                    $class       = $_POST['class'];
                    $jurusan     = $_POST['jurusan'];
                    $jabatan     = ucwords($_POST['jabatan']);

                    $update   = mysqli_query($conn, "UPDATE tb_login SET 
                                        NIS = '".$NIS."',
                                        nama_lengkap = '".$nama."',
                                        kelas = '".$class."',
                                        jurusan = '".$jurusan."',
                                        jabatan = '".$jabatan."' ");
                    if($update){
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    }else{
                        echo 'gagal' .mysqli_error($conn);
                    }

                }          
            ?>
           </div> 

           <h3>Ubah Password</h3>
           <div class="box-input">
            <form method="POST">
                <br>
                <h5>Ubah Password</h5>
                <input type="password" name="pass1" class="input-control" required>
                <h5>konfirmasi Password Anda</h5>
                <input type="password" name="pass2" class="input-control" required>
                <input type="submit" name="ubah_password" value="Ubah Password" class="btnp">
            </form>
            <?php
                if(isset($_POST['ubah_password'])){

                    $pass1     = $_POST['pass1'];
                    $pass2     = $_POST['pass2'];

                    if($pass2 != $pass1){
                        echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                    }else{

                        $u_pass   = mysqli_query($conn, "UPDATE tb_login SET password = '".MD5($pass1)."' ");
                        if($u_pass){
                            echo '<script>alert("Ubah data berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }

                    }
                    
                }          
            ?>
           </div>
        </div>
    </div> 
</body>
</html>