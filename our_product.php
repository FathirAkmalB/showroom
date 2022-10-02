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

        img{
            height: 20px;
            width: fit-content;
        }

        table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            width: 90%;
            margin: 10px auto 10px auto;
        }

        th {
            text-align: center;
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
            text-decoration: none;
        }
        
        td {
            text-align: center;
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }

        a {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            text-decoration: none;
            font-size: 12px;
        }
    </style>
    <title>Accelleron</title>
</head>

<body>
<center><h1>Data Produk</h1><center>
    <center><a href="tambah_product.php">+ &nbsp; Tambah Produk</a><center>
    <br/>
    <table>
    <tr>
        <th>No</th>
        <th>Logo Image</th>
        <th>Image</th>
        <th>Harga</th>
        <th>Power</th>
        <th>Top Speed</th>
        <th>Torque</th>
        <th>Deskripsi</th>
        <th>Action</th>
    </tr>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM product WHERE status = 'up' ORDER BY id DESC");
        $no = 1;

        while ($data = mysqli_fetch_array($query)) {
            echo "
            <tr>
                <td>$no</td>
                <td>$data[judul]</td>
                <td><img src='img/$data[lgo_img]'></td>
                <td><img src='img/$data[img]'></td>
                <td>$data[harga]</td>
                <td>$data[power]</td>
                <td>$data[top_speed]</td>
                <td>$data[torque]</td>
                <td>$data[deskripsi]</td>
                <td>
                <a href='edit_product.php?id=$data[id]'>Edit</a> |
                <a href='hapus_product.php?id=$data[id]' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Hapus</a>
                </td>
            </tr>
            ";

            $no++;
        }
        ?>
    </table>
</body>

</html>