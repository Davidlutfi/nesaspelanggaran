<?php
    session_start();
    include 'db.php';

    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $produk = mysqli_query($conn, "SELECT * FROM tb_data WHERE id_data = '".$_GET['id']."' ");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="data.php"</script>';
    }
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section">
        <div class="container">
        <h3>Edit data</h3>
            <div class="box-input">
            <form action="" method="POST" enctype="multipart/form-data">
                <h5>NIS (Nomor Induk Siswa)</h5>
                <input type="text" name="NIS" class="input-control" value="<?php echo $p->NIS_siswa ?>" required>
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
                <h5>Kesalahan</h5>
                <select name="kesalahan" id="menu" class="col-1" required>
                <option value="<?php echo $p->kesalahan ?>"><?php echo $p->kesalahan ?></option>
                    <?php
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_tipe_kesalahan ORDER BY id DESC");
                        while($r = mysqli_fetch_array($kategori)){
                    ?>
                    <option value="<?php echo $r['id'] ?>"><?php echo $r['nama_pelanggaran'] ?></option>
                    <?php } ?>
                </select>

                <img src="data/<?php echo $p->foto_kesalahan ?>" width="150px">
                <input type="hidden" name="foto" value="<?php echo $p->foto_kesalahan ?>">
                <input type="file" name="gambar" class="input">
                <h5>Rincian Kesalahan</h5>
                <textarea class="input-control" name="rinci" required><?php echo $p->alasan ?></textarea>
                <input type="submit" name="lapor" value="Edit" class="btnp">
                </from>
            <?php 
                if(isset($_POST['lapor'])){

                    $NIS       = $_POST['NIS'];
                    $nama      = $_POST['nama'];
                    $kelas     = $_POST['kelas'];
                    $jurusan   = $_POST['jurusan'];
                    $kesalahan = $_POST['kesalahan'];
                    $foto      = $_POST['foto'];
                    $rinci     = $_POST['rinci'];

                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.',  $filename);
                    $type2 = $type1[1];

                    $newname = 'produk'.time().'.'.$type2;

                     $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    if($filename != ''){

                    if(!in_array($type2, $tipe_diizinkan)){
                        echo '<script>alert("Format file tidak diiizinkan")</script>';

                    }else{
                        unlink('./produk/'.$foto);
                        move_uploaded_file($tmp_name, './data/'.$newname);
                        $namagambar = $newname;

                    }

                    }else{
                        $namagambar = $foto;

                    }

                    $update = mysqli_query($conn, "UPDATE tb_data SET 
                                            NIS_siswa = '".$NIS."',
                                            nama_lengkap = '".$nama."',
                                            kelas = '".$kelas."',
                                            jurusan = '".$jurusan."',
                                            kesalahan = '".$kesalahan."',
                                            foto_kesalahan = '".$namagambar."',
                                            alasan = '".$rinci."'
                                            WHERE id_data = '".$p->id_data."' ");
                    if($update){
                        echo '<script>alert("Ubah Data Berhasil")</script>';
                        echo '<script>window.location="data.php"</script>';
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