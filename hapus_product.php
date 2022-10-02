<?php 
include "koneksi.php"; 

if(isset($_GET['id'])){

    $query = mysqli_query($koneksi, "UPDATE product SET status = 'down' WHERE id = $_GET[id]");

    if($query){
        header("Location: admin-product.php");
    }else{
        header("Location: hapus-product.php?status='gagal'");
    }
}
?>