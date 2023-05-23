<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box-login">
        <div class="box">
            <h2>Login</h2>
            <form action="" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                    <input type="text" name="NIG" required>
                    <label>NIS</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="pass" required>
                    <label>Password</label>
                </div>
                <div class="ingat">
                    <a href="lupa.php">Lupa password?</a>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
            </form>
            <?php
                if(isset($_POST['login'])){
                session_start();
                include 'db.php';

                $NIG = $_POST['NIG'];
                $pass = $_POST['pass'];

                $cek = mysqli_query($conn,"SELECT * FROM tb_admin WHERE NIG='".$NIG."' and password='".MD5($pass)."' ");
                if (mysqli_num_rows($cek) > 0){

                    $_SESSION['status_login'] = true;
	                echo '<script>window.location="home.php"</script>';
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