<?php 

include "koneksi.php"; 

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM info WHERE id = '$id'");

$data = mysqli_fetch_array($query);

if(mysqli_num_rows($query)<1){
    die("Tidak ada data");
}
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
                <?=$data['img']?>
                <td><label for="">Image</label></td>
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td><label for="">judul</label></td>
                <td><input type="text" name="judul" value="<?=$data['judul']?>"></td>
            </tr>
            <tr>
                <td><label for="">sub judul</label></td>
                <td><input type="text" name="sub_judul" value="<?=$data['sub_judul']?>"></td>
            </tr>
            <tr>
                <td><label for="">deskripsi</label></td>
                <td><textarea name="deskripsi" cols="30" rows="10"><?=$data['deskripsi']?></textarea></td>
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

        if($img != ""){
            $result = mysqli_query($koneksi, "UPDATE info SET judul = '$judul', sub_judul='$sub_judul',deskripsi = '$deskripsi', img = '$img', status ='up' WHERE id = '$id'");
        }else{
            $result = mysqli_query($koneksi, "UPDATE info SET judul = '$judul', sub_judul='$sub_judul',deskripsi = '$deskripsi', status ='up' WHERE id = '$id'");
        }

        if($result){
            header("Location: admin-event.php");
        }else{
            header("Location: create-event.php?status='gagal'");
        }
    }
    ?>
</body>
</html>