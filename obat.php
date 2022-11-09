<?php
    require('db-connect.php');
    if(!isset($_POST['Cari'])){
        $result = mysqli_query($db, "SELECT * FROM obat WHERE stok_obat > 0");
    }
    else{
        $cari = $_POST['Search'];
        $result = mysqli_query($db, "SELECT * FROM obat WHERE nama_obat LIKE'%$cari%' AND stok_obat > 0");
    }
    while($row = mysqli_fetch_assoc($result)){
        $obat[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicina</title>
    <link rel="browser tab icon" href="./image/heart-health-48.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php
    include 'navbar.php';
    ?>

    <!-- obat section starts  -->

    <section class="obat" id="obat">

        <h1 class="heading"> obat </h1>
        <?php 
            if(isset($obat) or isset($_POST['Cari'])){
        ?>
            <form id="searchObat" action="" method="POST">
                <input type="text" value="" name="Search" placeholder="Cari Nama Obat">
                <button type="submit" name="Cari"> O </button>
            </form>
        <?php
            }
        ?>
        <div class="box-container">
        <?php   
            if(isset($obat)){
                foreach($obat as $obt):
        ?>
            <div class="box">
                <span class="discount">-10%</span>
                <div class="image">
                    <img src="image/obat-1.jpg" alt="">
                    <div class="icons">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="cart-btn">add to cart</a>
                        <a href="#" class="fas fa-share"></a>
                    </div>
                </div>
                <div class="content">
                    <h3><?php echo $obt['nama_obat']; ?></h3>
                    <div class="price">Rp.<?php echo $obt['harga_obat']; ?><span>Rp.<?php echo $obt['harga_obat']; ?></span> </div>
                </div>
            </div>
        <?php
                endforeach;
            } else {
            if(!isset($_POST['Cari'])){
        ?>
        <div class="kosong">
            <h3>Mohon Maaf</h3>
            <p>
                Belum Ada Obat yang 
                tersedia di Farmanusa
            </p> 
        </div>
        <?php
            } else {
        ?>
        <div class="kosong">
            <h3>Mohon Maaf</h3>
            <p>
                Obat yang anda cari
                tidak ada di daftar obat
                kami atau stok kosong
            </p> 
        </div>
        <?php
            }
            }
        ?>
        </div>
    </section>

    <?php include 'footer.php' ?>

    <?php require 'login.php';?>

    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>