<?php 

include "koneksi.php"; 

$query = mysqli_query($koneksi, "SELECT * FROM info WHERE status = 'up' GROUP BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <table cellpadding="10">
            <tr>
                <td><label for="">Image</label></td>
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td><label for="">judul</label></td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td><label for="">sub judul</label></td>
                <td><input type="text" name="sub_judul"></td>
            </tr>
            <tr>
                <td><label for="">deskripsi</label></td>
                <td><textarea name="deskripsi" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="kirim" value="+ kirim"></td>
            </tr>
        </table>
        
        
    </form>

    <?php 
    if(isset($_POST['kirim'])){
        $img = $_FILES['img']['name'];
        $judul = $_POST['judul'];
        $sub_judul = $_POST['sub_judul'];
        $deskripsi = $_POST['deskripsi'];

        $img_tmp = $_FILES['img']['tmp_name'];

        move_uploaded_file($img_tmp, "img/$img");

        $result = mysqli_query($koneksi, "INSERT INTO info VALUES('', '$judul', '$sub_judul', '$deskripsi', '$img', 'up')");

        if($result){
            // header("Location: admin-event.php");
        }else{
            header("Location: create-event.php?status='gagal'");
        }
    }
    ?>
</body>
</html>