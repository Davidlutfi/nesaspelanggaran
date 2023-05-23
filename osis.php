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
    <title>Data Osis</title>
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
           <h3>Data OSIS</h3>
           <div class="box-input">
                <table border="2" cellspacing="0" class="table1" border-radius="15px">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Jabatan</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                            $login = mysqli_query($conn, "SELECT * FROM tb_login ORDER BY id DESC");
                            if(mysqli_num_rows($login) > 0){
                            while ($row = mysqli_fetch_array($login))
                            {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['NIS'] ?></td>
                            <td><?php echo $row['nama_lengkap'] ?></td>
                            <td><?php echo $row['kelas'] ?></td>
                            <td><?php echo $row['jurusan'] ?></td>
                            <td><?php echo $row['jabatan'] ?></td>
                            <td>
                                <div class="edit">
                                <a href="edit-osis.php?id=<?php echo $row['id'] ?>">Edit</a>
                                </div>
                                <div class="hapus">
                                <a href="proses-hapus.php?idk=<?php echo $row['id'] ?>" onclick="return confirm('Yakin Ingin Hapus')" >hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="7">Tidak ada data</td>
                            </tr>    
                        <?php } ?>    
                    </tbody>
                </table>
           </div> 
        </div>
    </div> 
</body>
</html>