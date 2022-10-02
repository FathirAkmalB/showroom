<?php 
include "koneksi.php";

if(isset($_GET['id'])){
    $query = mysqli_query($koneksi, "UPDATE info SET status = 'down' WHERE id = '$_GET[id]'");

    if($query){
        header("Location: admin-event.php");
    }else{
        header("Location: hapus-event.php?status = 'gagal'");
    }
}

?>