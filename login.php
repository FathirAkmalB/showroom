<?php 
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <style>
    </style>
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
        <!-- bacground img -->
        <div class="bg">
            <img class="green-car" src="asset/car/green_car.png" alt="">
            <img class="grey-car" src="asset/car/Aventador_ultimae_model_mobile.png" alt="">
        </div>
        <!-- card -->
        <div class="card">
                <table>
                <tr >
                    <td><p>Login</p> <img src="" alt=""></td>
                </tr>
                    <tr>
                        <td>Masukan Username</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="text-box" name="username" placeholder="Username.."></td>
                    </tr>
                    <tr>
                        <td>Masukan Password</td>
                    </tr>
                    <tr>
                        <td><input type="password" class="text-box" name="pass" placeholder="Password.."></td>
                    </tr>
                    <tr>
                        <td><a href="#" class="btn-back">back</a><button type="submit" class="btn-login" name="login">Login</button></td>
                    </tr>
                </table>
            
        </div>
    </form>

    <?php 
    if(isset($_POST["login"])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        if($username == "admin" && $pass == "1234"){
            header("Location: our_product.php");
        }else{
            echo "<script>
            alert('Username atau Password anda salah');
            </script>";
        }
    }
    ?>
</body>
</html>