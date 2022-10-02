<?php include "koneksi.php"; 

$query = mysqli_query($koneksi, "SELECT * FROM product WHERE status = 'up' GROUP BY id DESC LIMIT 2 ");

// var_dump($query);
// die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Accelleron</title>
    <!-- font quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>
<body>
    <nav>
        <div class="wrap">
            <div class="logo">
                <a href="">Accelleron</a>
            </div>
            <div class="lef">
                <a href="#model">Models</a>
                <a href="#news">News</a>
                <a href="">Contact</a>
                <a href="">FAQ</a>
            </div>            
        </div>
    </nav>

    <?php 
    $no = 1;

    while($data = mysqli_fetch_array($query)) :
    ?>
    <section>
        <!-- hero image -->
        <?php if($no % 2) :?>
        <div class="bigbox fir">
            <?php else :?>
                <div class="bigbox sec">
            <?php endif; ?>
            <div class="sidetxt">
                <img class="txt" src="img/<?=$data['lgo_img']?>" alt="">
                <h6><?=$data['deskripsi']?></h5>
            </div>
            <img class="hero" src="img/<?=$data['img']?>" alt="">
            </div>
        </div>
    </section>
    <?php $no++; endwhile ?>
 
    <div class="sli">
        <div class="whi">
            <h3>Update Info</h2>
        </div>
    </div>
    <?php 
    $w= 0;
    $ts = mysqli_query($koneksi,"SELECT * FROM info WHERE status = 'up' GROUP BY id DESC LIMIT 4");
    
    ?>
    <main class="layout4">
    <?php while($ulang = mysqli_fetch_array($ts)) :?>
        
        <div class="boxevent">
            <img src="img/<?=$ulang['img']?>" alt="">
            <div class="tex">
                <h2><?=$ulang['judul']?></h2>
                <h6><?=$ulang['deskripsi']?></h6>
                <a href="">More</a>
            </div>
        </div>
    <?php $w++; endwhile ?>
    </main>
    
    <br><br><br><br><br><br>
    <section>
        <div class="scroll" id="model">
            <?php 
            $i = 1;

            $result = mysqli_query($koneksi, "SELECT * FROM product WHERE status = 'up' GROUP BY id DESC");

            while($tampil = mysqli_fetch_array($result)) :
            ?>
            <div class="box">
                <div class="lifo">
                    <h2><?=$tampil['judul']?></h2>
                    <h6>Most people in Florida buy <?=$tampil['judul']?></h6>
                    <a href="detailprdc.php?id=<?=$tampil['id']?>">Learn More</a>
                </div>
                <div class="libo">
                    <img src="img/<?=$tampil['img']?>" alt="">
                </div>
            </div>

            <?php $i++; endwhile ?>
        </div>
    </section>
    <footer>
        <div class="wrf">
            <div class="logo"><a href="">Accelleron</a></div>
            <div class="linet">
                <a href="">Company</a>
                <a href="">Careers</a>
                <a href="">Contact us</a>
                <a href="">sustainbility</a>
                <a href="">media center</a>
            </div>
            <div class="linet">
                <a href="">privacy and legal</a>
                <a href="">cookie setting</a>
                <a href="">sitemap</a>
                <a href="">news letter</a>
            </div>
            <h6>Copyright © 2022 Automobili Accelleron S.p.A. a sole shareholder company part of Sians Group.
                All rights reserved. VAT no. IT 00591801204</h6>
        </div>
    </footer>
</body>
</html>