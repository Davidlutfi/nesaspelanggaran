<?php
    session_start();
    include 'db.php';

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
<div class="box-login">
        <div class="box">
            <h2>Ubah Password</h2>
            <form action="" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="pass1" required>
                    <label>Password Baru</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="pass2" required>
                    <label>konfirmasi Password</label>
                </div>
                <div class="ingat">
                    <a href="lupa.php">Kembali</a>
                </div>
                <button type="submit" name="login" class="btn">Ubah Password</button>
            </form>
            <?php
                if(isset($_POST['login'])){

                    $pass1     = $_POST['pass1'];
                    $pass2     = $_POST['pass2'];

                    if($pass2 != $pass1){
                        echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                    }else{

                        $u_pass   = mysqli_query($conn, "UPDATE tb_admin SET 
                                        password = '".MD5($pass1)."' ");
                        if($u_pass){
                            echo '<script>alert("Ubah password berhasil")</script>';
                            echo '<script>window.location="home.php"</script>';
                        }else{
                            echo 'gagal' .mysqli_error($conn);
                        }

                    }
                    
                }          
            ?>
        </div>
    </div> 
</body>
</html>