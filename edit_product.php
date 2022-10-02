<?php 
include "koneksi.php";

$id = $_GET['id'];
// var_dump($id);
$tampil = mysqli_query($koneksi, "SELECT * FROM product WHERE id = '$id'");

$data = mysqli_fetch_assoc($tampil);

if(mysqli_num_rows($tampil)<1){
    die("data gagal ditmemukan");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo"><a href="">Accelleron</a></div>
            <div class="menu">
                <a href="">Our Product</a>
                <a href="">Event</a>
            </div> 
        </div>
        <div class="for">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="cont">
                    <label class="file" for="logo">
                        Logo Image
                        <input type="file" name="lgo_img" id=""> 
                        Sebelumnya : <?= $data['lgo_img']?>
                    </label>
                    <label class="file" for="carimg">
                        Image
                        <input type="file" name="img">
                        Sebelumnya : <?= $data['img']?>
                    </label>
                <div class="co">
                    <input type="text" placeholder="$ XXX.XX" name="harga" value=" <?= $data['harga']?>" id="">  
                    <input type="text" placeholder="Title..." name="judul"  value="<?= $data['judul']?>">                  
                    <textarea placeholder="input here..." name="deskripsi" id=""><?= $data['deskripsi']?></textarea>
                </div>
                <!-- button -->
                <input type="submit" name="kirim">
                <div class="fle">
                    <div class="infle">
                        <label for="power">Power</label>
                        <span>
                            <input type="text" placeholder="XXX" name="power" value="<?= $data['power']?>" id="">
                            <label for="power">Hp</label>                       
                        </span>
                    </div>
                    <div class="infle">
                        <label for="power">Top Speed</label>
                        <span>
                            <input type="text" placeholder="XXX" name="top_speed" value="<?= $data['top_speed']?>" id="">
                            <label for="power">Mph</label>                       
                        </span>
                    </div>
                    <div class="infle">
                        <label for="power">Max Torque</label>
                        <span>
                            <input type="text" placeholder="XXX" name="torque" value="<?= $data['torque']?>" id="">
                            <label for="power">lb-ft</label>                       
                        </span>
                    </div>
                </div>                  
                </div>
            </form>

            <?php 
            if(isset($_POST['kirim'])){
                $judul = $_POST['judul'];
                $lgo_img = $_FILES['lgo_img']['name'];
                $img = $_FILES['img']['name'];
                $harga = $_POST['harga'];
                $power = $_POST['power'];
                $top_speed = $_POST['top_speed'];
                $torquee = $_POST['torque'];
                $deskripsi = $_POST['deskripsi'];

                $lgo_tmp = $_FILES['lgo_img']['tmp_name'];
                $img_tmp = $_FILES['img']['tmp_name'];

                move_uploaded_file($lgo_tmp, "img/$lgo_img");
                move_uploaded_file($img_tmp, "img/$img");

                if($lgo_img != "" && $img != ""){

                    $query = mysqli_query($koneksi, " UPDATE product SET judul = '$judul', lgo_img = '$lgo_img', img = '$img', harga = '$harga', power = '$power', top_speed = '$top_speed', torque = '$torquee', deskripsi = '$deskripsi', status = 'up' WHERE id = '$id'");
                    
                }else if($lgo_img != ""){
                    
                    $query = mysqli_query($koneksi, " UPDATE product SET judul = '$judul', lgo_img = '$lgo_img', harga = '$harga', power = '$power', top_speed = '$top_speed', torque = '$torquee', deskripsi = '$deskripsi', status = 'up' WHERE id = '$id'");
                    
                }else if($img != ""){
                    
                    $query = mysqli_query($koneksi, " UPDATE product SET judul = '$judul', img = '$img', harga = '$harga', power = '$power', top_speed = '$top_speed', torque = '$torquee', deskripsi = '$deskripsi', status = 'up' WHERE id = '$id'");
                    
                }else{

                    $query = mysqli_query($koneksi, " UPDATE product SET judul = '$judul', harga = '$harga', power = '$power', top_speed = '$top_speed', torque = '$torquee', deskripsi = '$deskripsi', status = 'up' WHERE id = '$id'");
                    
                }
                
                
                if($query){
                    header("Location: admin-product.php");
                }else{
                    // header("Location: edit_product.php?status='gagal'");
                }
                var_dump($query);
                die;
            }
            ?>

        </div>   
    </div>
</body>
</html>