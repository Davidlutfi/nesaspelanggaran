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
    <title>Data</title>
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
           <h3>Data Pelanggar</h3>
           <div class="box-input">
                <table border="2" cellspacing="0" class="table" width="400px">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>kelas</th>
                            <th>Jurusan</th>
                            <th>Kesalahan</th>
                            <th>Bukti Kesalahan</th>
                            <th>Alasann Kesalahan</th>
                            <th>Point Siswa</th>
                            <th>- Point</th>
                            <th>Sisa Point</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = "SELECT * FROM tb_data INNER JOIN tb_data_siswa ON tb_data.NIS_siswa = tb_data_siswa.NIS_siswa INNER JOIN tb_tipe_kesalahan ON tb_data.kesalahan = tb_tipe_kesalahan.kesalahan";
                        $sql_rm = mysqli_query($conn, $data) or die (mysqli_error($conn));                       
                        while ($row = mysqli_fetch_array($sql_rm)){

                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['NIS_siswa'] ?></td>
                            <td><?php echo $row['nama_lengkap'] ?></td>
                            <td><?php echo $row['kelas'] ?></td>
                            <td><?php echo $row['jurusan'] ?></td>
                            <td><?php echo $row['kesalahan'] ?></td>
                            <td><img src="data/<?php echo $row['foto_kesalahan'] ?>" width="50px"></td>
                            <td><?php echo $row['alasan'] ?></td>
                            <td><?php echo $row['point'] ?></td>
                            <td><?php echo $row['min_point'] ?></td>
                            <td><?php echo $row['point'] - $row['min_point'] ?></td>
                            <td>
                                <div class="edit">
                                    <a href="edit-data.php?id=<?php echo $row['id_data'] ?>">Edit</a>
                                </div>
                                <div class="hapus">
                                    <a href="proses-hapus.php?idp=<?php echo $row['id_data'] ?>" onclick="return confirm('Yakin Ingin Hapus')" >hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>    
                    </tbody>
                </table>
           </div> 
        </div>
    </div> 
</body>
</html>