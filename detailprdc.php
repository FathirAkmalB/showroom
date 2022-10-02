<?php 
include "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM product WHERE id = '$id'");

$data = mysqli_fetch_assoc($query);

if(mysqli_num_rows($query)<1){
    die("data tidak ditemukan pada database");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product - Accelleron</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main class="dp">
        <a href="index.php#model"><- Back</a>
        <div class="con">

            <img class="txt" src="img/<?=$data['lgo_img']?>" alt="">
            <div class="div">
                <h6><?=$data['deskripsi']?></h6>
                <span>FROM</span>
                <h2>$ <?=$data['harga']?></h2>
                <div class="fleri">
                    <div class="boxte">
                        <h3>Power</h3>
                        <h2><?=$data['power']?></h2>
                        <span>HP</span>
                    </div>
                    <div class="boxte">
                        <h3>Top Speed</h3>
                        <h2><?=$data['top_speed']?></h2>
                        <span>Mph</span>
                    </div>
                    <div class="boxte">
                        <h3>Torque</h3>
                        <h2><?=$data['torque']?></h2>
                        <span>lb-ft</span>
                    </div>                
                </div>
            </div>
            <a href=""><O>ORDER NOW</O></a>
        </div>
    </main>
    <div class="ri">
        <img src="img/<?=$data['img']?>" alt="">

    </div>
</body>
</html>