<?php
    session_start();
    include 'db.php';
    
    if($_SESSION['status_login_user'] != true){
        echo '<script>window.location="index.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor</title>
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
            <h3>Laporkan</h3>
                <div class="box-input">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <h5>NIS (Nomor Induk Siswa)</h5>
                    <input type="text" name="NIS" class="input-control" required>
                    <h5>Kesalahan</h5>
                    <select name="kesalahan" id="menu" class="col-1" required>
                    <option value=""></option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_tipe_kesalahan ORDER BY kesalahan DESC");
                            while($r = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $r['kesalahan'] ?>"><?php echo $r['kesalahan'] ?></option>
                        <?php } ?>
                    </select>
                    <h5>Gambar</h5>
                    <input type="file" name="gambar" class="input" required>
                    <h5>Rincian Kesalahan</h5>
                    <textarea class="input-control" name="rinci" required></textarea>
                    <input type="submit" name="lapor" value="Laporkan" class="btnp">
                    </from>
                    <?php 
                        if(isset($_POST['lapor'])){
                
                            $NIS       = $_POST['NIS'];
                            $kesalahan = $_POST['kesalahan'];
                            $rinci     = $_POST['rinci'];

                            $filename  = $_FILES['gambar']['name'];
                            $tmp_name  = $_FILES['gambar']['tmp_name'];

                            $type1 = explode('.',  $filename);
                            $type2 = $type1[1];

                            $newname = 'bukti'.time().'.'.$type2;

                            $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                            if(!in_array($type2, $tipe_diizinkan)){
                                echo '<script>alert("Format file tidak diiizinkan")</script>';

                            }else{
                                move_uploaded_file($tmp_name, './data/'.$newname);

                                $insert = mysqli_query($conn, "INSERT INTO tb_data VALUES ( null, '".$NIS."', '".$kesalahan."', '".$newname."', '".$rinci."' ) ");

                                if($insert){
                                    echo '<script>alert("Laporan Berhasil Terkirim")</script>';
                                    echo '<script>window.location="lapor.php"</script>';
                                }else{
                                    echo 'gagal'.mysqli_error($conn);
                                }
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
</body>
</html>