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
    <!-- <link rel="stylesheet" href="style/style.css"> -->
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="nav-link ms-4" href="index.php"><img src="img/logo.png" style="width:45%" alt=""></a>
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
                            <a class="nav-link" href="index.php?p=jenis" style="color:#000000">Kategori Obat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=kategori" style="color:#000000">Obat-Obat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=contact" style="color:#000000">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=tambahobat" style="color:#000000">Input Obat</a>
                        </li>
                    </ul>

                    <div class="d-flex me-3">
                        <div class="m-1"><a class="nav-link" href="index.php?p=login">Login</a></div>
                        <div class="m-1">|</div>
                        <div class="m-1"><a class="nav-link" href="index.php?p=register">Register</a></div>
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


    <!-- <footer class="fixed-bottom container-fluid text-center">
        <div class="container">
            <div class="logo">
                <img src="LogoP.png" alt="Logo">
            </div>
            <div class="contact-info">
                <p>Alamat: Menara 165 Jl.Tb.Simatupang, <br>Cilandak Barat, Pasar Minggu, Jakarta Selatan<br></p>
                <ul>
                    <li>Email: Medicalzeus@gmail.com</li>
                    <li>Telepon: +62891998768</li>
                    <li>WhatsApp: +62889123066</li>
                </ul>
            </div>
        </div>
    </footer> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>