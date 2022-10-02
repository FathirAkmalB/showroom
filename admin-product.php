
<?php include "koneksi.php"; 

$query = mysqli_query($koneksi, "SELECT * FROM product WHERE status = 'up' GROUP BY id DESC");

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Accelleron</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <div class="sidebar">
        <div class="logo"><a href="">Accelleron</a></div>
        <div class="menu">
            <a class="activate" href="admin-product.php">Our Product</a>

            <a href="admin-event.php">News</a>

        </div>
    </div>
    <div class="for">
        <section>
            <div class="scroll">

                <a href="create.php">Create New</a>
                <div class="gridco">
                    <?php 
                    $no = 1;

                    while($data = mysqli_fetch_array($query)) :
                    ?>
                    <div class="box">
                        <div class="lifo">
                            <h2><?=$data['judul']?></h2>
                            <h6><?=$data['deskripsi']?></h6>
                            <a href="edit_product.php?id=<?=$data['id'] ?>">Edit</a>
                            <a href="hapus_product.php?id=<?=$data['id'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Delete</a>
                        </div>
                        <div class="libo">
                            <img src="img/<?=$data['img']?>" alt="">
                        </div>
                    </div>
                    <?php $no++; endwhile ?>
                </div>
            </div>
        </section>
    </div>
</div>

    <script src="assets/JS/main.js"></script>
</body>
</html>