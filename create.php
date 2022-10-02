<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo"><a href="">Accelleron</a></div>
            <div class="menu">
                <a href="admin-product.php">Our Product</a>
                <a href="admin-event.php">Event</a>
            </div> 
        </div>
        <div class="for">
            <form action="" enctype="multipart/form-data">
                <div class="cont">
                    <label class="file" for="logo">
                        Logo Image
                        <input type="file" name="lgo_img" id="">
                    </label>
                    <label class="file" for="carimg">
                        Image
                        <input type="file" name="img">

                    </label>
                <div class="co">
                    <input type="text" placeholder="$XXX.XX" name="harga" id="">  
                    <input type="text" placeholder="Title..." name="judul">                  
                    <textarea placeholder="input here..." name="deskripsi" id=""></textarea>
                </div>
                <!-- button -->
                <input type="submit" name="kirim">
                <div class="fle">
                    <div class="infle">
                        <label for="power">Power</label>
                        <span>
                            <input type="text" placeholder="XXX" name="power" id="">
                            <label for="power">Hp</label>                       
                        </span>
                    </div>
                    <div class="infle">
                        <label for="power">Top Speed</label>
                        <span>
                            <input type="text" placeholder="XXX" name="top_speed" id="">
                            <label for="power">Mph</label>                       
                        </span>
                    </div>
                    <div class="infle">
                        <label for="power">Max Torque</label>
                        <span>
                            <input type="text" placeholder="XXX" name="torquee" id="">
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

                $query = mysqli_query($koneksi, " INSERT INTO product VALUES('', '$judul', '$lgo_img', '$img', '$harga', '$power', '$top_speed', '$torquee', '$deskripsi', 'up')");

                if($query){
                    header("Location: admin-product.php");
                }else{
                    header("Location: create.php?status='gagal'");
                }
            }
            ?>

        </div>   
    </div>
</body>
</html>