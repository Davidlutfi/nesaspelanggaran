<?php
    session_start();
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="cek.css">
</head>
<body>
<div class="section">
        <div class="container">
           <h3>Data Pelanggar</h3>
           <div class="box-input">
                <table border="2" cellspacing="0" class="table" width="400px">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>kelas</th>
                            <th>Jurusan</th>
                            <th>Sisa Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                            $data = mysqli_query($conn, "SELECT * FROM tb_data_siswa ORDER BY id DESC");
                            if(mysqli_num_rows($data) > 0){
                            while ($row = mysqli_fetch_array($data))
                            {
                        ?>
                        <tr>
                            <td><?php echo $row['NIS'] ?></td>
                            <td><?php echo $row['nama_lengkap'] ?></td>
                            <td><?php echo $row['kelas'] ?></td>
                            <td><?php echo $row['jurusan'] ?></td>
                            <td><?php echo $row['point'] ?></td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="5">Tidak ada data</td>
                            </tr>
                        <?php } ?>    
                    </tbody>
                </table>
           </div> 
        </div>
    </div> 
</body>
</html>