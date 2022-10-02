<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input,
    textarea {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
    <title>Document</title>
</head>
<body>
<center>
        <h1>Tambah Produk</h1>
      <center>
      <form method="POST" action="" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Logo Image</label>
          <input type="file" name="lgo_img" autofocus="" required="">
        </div>
        <div>
          <label>Image</label>
         <input type="file" name="img">
        </div>
        <div>
          <label>Harga</label>
         <input type="text" name="harga" required="">
        </div>
        <div>
          <label>Power</label>
         <input type="text" name="power" required="">
        </div>
        <div>
          <label>Top Speed</label>
         <input type="text" name="top_speed" required="">
        </div>
        <div>
          <label>Torque</label>
         <input type="text" name="torque" required="">
        </div>
        <div>
          <label>Deskripsi</label>
         <textarea type="text" name="deskripsi" required="" ></textarea>
        </div>
        <div>
         <button type="submit" name="kirim">Simpan Produk</button>
        </div>
        </section>
      </form>

      <?php 

      if(isset($_POST['kirim'])){
  
        $lgo_img = $_FILES['lgo_img']['name'];
        $img = $_FILES['img']['name'];
        $harga = $_POST['harga'];
        $power = $_POST['power'];
        $top_speed = $_POST['top_speed'];
        $torque = $_POST['torque'];
        $deskripsi = $_POST['deskripsi'];

        // $diperbolehkan = array('png', 'jpg'); //menentukna format yang di bolehkan

        // $x_lgo = explode('.', $lgo_img);  //untuk memisahkan format dan nama file
        // $x_img = explode('.', $img);

        // $extensi_lgo = strtolower(end($x_lgo));
        // $extensi_img = strtolower(end($x_img));

        // $tmp_lgo = $_FILES['lgo_img']['tmp_name'];// menampung bentuk dari file
        $tmp_img = $_FILES['img']['tmp_name'];

        // if(in_array($extensi_lgo, $diperbolehkan) || in_array($extensi_img, $diperbolehkan) === true){

          // move_uploaded_file($tmp_lgo, "asset/img/$lgo_img");// memindahkan file ke sebuah direktory yang di tentukan

          move_uploaded_file($tmp_img, "img/$img");// memindahkan file ke sebuah direktory yang di tentukan

          $query = mysqli_query($koneksi, "INSERT INTO product VALUES('', '$lgo_img', '$img', '$harga', '$power', '$top_speed', '$torque', '$deskripsi', 'up')");

          // var_dump($query);
          // die;

          if($query){
            header("Location: our_product.php");
          }else{
            header("Location: tambah_product.php?status='gagal'");
          }

        // }else{
        //   echo "
        //   <script>
        //   alert('Format yang boleh hanya jpg atau png');
        //   window.location='tambh_product.php';
        //   </script>
        //   ";
        // }
      }
      ?>
</body>
</html>