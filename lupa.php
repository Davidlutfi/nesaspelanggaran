<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box-login">
        <div class="box">
            <h2>Lupa Password</h2>
            <form action="" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                    <input type="text" name="NIG" required>
                    <label>Masukan NIS</label>
                </div>
                <div class="ingat">
                    <a href="login.php">Kembali</a>
                </div>
                <button type="submit" name="login" class="btn">Konfir</button>
            </form>
            <?php
                if(isset($_POST['login'])){
                    include 'db.php';

                    $NIG = $_POST['NIG'];

                    $cek = mysqli_query($conn,"SELECT * FROM tb_admin WHERE NIG='".$NIG."' ");
                    if (mysqli_num_rows($cek) > 0){

	                    echo '<script>window.location="ganti.php"</script>';
                    }else{
	                    echo '<script>alert("Nomor Induk atau Password Salah!")</script>';
                    }
                }
            ?>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>