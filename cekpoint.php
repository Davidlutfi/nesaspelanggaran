<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cek point</title>
    <link rel="stylesheet" href="cek.css">
</head>
<body>
    <div class="box-login">
        <div class="box">
            <h2>Cek Point Sisa Point Anda</h2>
            <form action="" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                    <input type="text" name="NIS" required>
                    <label>NIS</label>
                <button type="submit" name="point" class="btn">Cek Point Anda</button>
            </form>
            <?php
                if(isset($_POST['point'])){
                include 'db.php';

                $NIS = $_POST['NIS'];

                $cek = mysqli_query($conn,"SELECT * FROM tb_data_siswa WHERE NIS='".$NIS."' ");
                if (mysqli_num_rows($cek) > 0){

	                echo '<script>window.location="tampilkanpoint.php"</script>';
                }else{
	                echo '<script>alert("Nomor Induk Siswa Anda Salah!")</script>';
                }
            }
            ?>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>