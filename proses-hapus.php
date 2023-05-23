<?php

include 'db.php';
    
if(isset($_GET['idk'])){
    $delete = mysqli_query($conn, "DELETE FROM tb_login WHERE id = '".$_GET['idk']."' ");
    echo '<script>window.location="osis.php"</script>';
}

if(isset($_GET['idp'])){
    $produk = mysqli_query($conn, "SELECT foto_kesalahan FROM tb_data WHERE id_data = '".$_GET['idp']."' ");
    $p = mysqli_fetch_object($produk);

    unlink('./data/'.$p->foto_kesalahan);

    $delete = mysqli_query($conn, "DELETE FROM tb_data WHERE id_data = '".$_GET['idp']."' ");
    echo '<script>window.location="data.php"</script>';
}

?>