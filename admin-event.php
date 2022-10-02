<?php 
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM info WHERE status = 'up' GROUP BY id DESC LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Accelleron</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
    <div class="sidebar">
        <div class="logo"><a href="">Accelleron</a></div>
        <div class="menu">
            <a  href="admin-product.php">Our Product</a>
            <a class="activate" href="admin-event.html">News</a>
        </div>
    </div>
    <div class="min">
        <main class="layout4">
            <?php 
            $no = 0;
            
            while($data = mysqli_fetch_array($query)) :
            ?>
            <div class="boxevent">
                <img src="img/<?=$data['img']?>" alt="">
                <div class="tex">
                    <h2><?=$data['judul']?></h2>
                    <h6><?=$data['sub_judul']?></h6>
                    <a href="hapus_event.php?id=<?=$data['id']?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Delete</a>
                    <a href="edit_event.php?id=<?=$data['id']?>">Edit</a>
                </div>
            </div>
            <?php $no++; endwhile ?>
            
        </main>        
    </div>
    </div>
</body>
</html>