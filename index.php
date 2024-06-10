<?php
require "inc.connection.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- <link rel="stylesheet" href="style/style.css"> -->
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="nav-link ms-4 me-5" href="index.php"><img src="img/logo.png" style="width:20vh" alt=""></a>
                <div style="display: flex; align-items: center; background-color: #0B9C4E; border-radius: 25px; 
                        overflow: hidden;">
                    <input type="text" placeholder="Search Here" style="border: 2px solid #0B9C4E; padding: 10px 15px; border-radius: 25px 0 0 25px; outline: none; 
                            width: 200px;">
                    <button
                        style=" background-color: #00a94f; border: none; color: white; padding: 10px 15px; 
                            border-radius: 0 25px 25px 0; cursor: pointer; transition: background-color 0.3s;">Search</button>
                </div>
                <div class="collapse navbar-collapse ms-4" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=home" style="color:#000000">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=home#kategori" style="color:#000000">Kategori Obat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=home#obat" style="color:#000000">Obat-Obat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#footer" style="color:#000000">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=tambahobat" style="color:#000000">Input Obat</a>
                        </li>
                    </ul>
                    <a href=""><img src="./img/keranjang.png" style="width:35px;" class="me-4" alt=""></a>
                    <div class="d-flex">
                        <div class=""><a class="nav-link" href="index.php?p=login">Login</a></div>
                        <div class="mt-2"><h6>|</h6></div>
                        <div class=""><a class="nav-link" href="index.php?p=register">Register</a></div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php
        $pages_dir = 'pages';
        if (!empty($_GET['p'])) {

            $pages = scandir($pages_dir, 0);
            unset($pages[0], $pages[1]);

            $p = $_GET['p'];
            if (in_array($p . '.php', $pages)) {

                include ($pages_dir . '/' . $p . '.php');

            } else {

                echo 'Halaman tidak ditemukan! :(';

            }
        } else {
            include "pages/home.php";
        }
        ?>

    </main>



    <section id="footer">
        <footer class="text-center"
            style="background-color: #00a651; color: white; margin-top: 70px; padding-top: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h4 style="margin-bottom: 20px; color: #000000">Hubungi Kami</h4>
                        <a href="https://www.instagram.com/" style="margin: 0 10px; color: white;"><img
                                src="./img/ig.png" style="width: 50px;" /></a>
                        <a href="https://www.facebook.com/" style="margin: 0 10px; color: white;"><img
                                src="./img/fb.png" style="width: 50px;" /></a>
                        <a href="https://x.com/" style="margin: 0 10px; color: white;"><img src="./img/x.png"
                                style="width: 50px;" /></a>
                        <a href="https://api.whatsapp.com/send?phone=6282112307927&text=Halo%20saya%20ingin%20berkonsultasi%20tentang%20obat%20apotik"
                            style="margin: 0 10px; color: white;"><img src="./img/wa.png" style="width: 50px;" /></a>
                    </div>
                    <div class="col-12 mb-3">
                        <h5 class="pt-3" style="margin-bottom: 20px; color:#000000">Download Aplikasi Kami</h5>
                        <a href="https://www.apple.com/app-store/"><img src="./img/appstore.png"
                                style="width: 165px; margin: 0 10px;" /></a>
                        <a href="https://play.google.com/store/"><img src="./img/playstore.png"
                                style="width: 150px; margin: 0 10px;" /></a>
                    </div>
                </div>
            </div>
            <div class="col-12" style="background-color:#FFFFFF">
                <p style="margin-top: 20px; color:#000000">© Copyright Zeuss and Co</p>
            </div>
        </footer>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>