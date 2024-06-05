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

<body class="container">
    <header>
        <nav class="navbar navbar-expand-lg">
            <header>
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">
                                <a class="nav-link" href="index.php"><img src="img/logo.png" style="width:75%"
                                        alt=""></a>
                            </div>
                            <div class="col">
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <div class="row">
                                            <div class="col-6 ms-4 mb-3 mt-2">
                                                <form class="d-flex" role="search">
                                                    <input class="form-control me-2" type="search" placeholder="Search"
                                                        aria-label="Search">
                                                    <button class="btn btn-outline-success"
                                                        type="submit">Search</button>
                                                </form>
                                            </div>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <a class="nav-link" href="index.php?p=home">Home</a>
                                                    </div>
                                                    <div class="col-2">
                                                        <a class="nav-link" href="index.php?p=jenis">Jenis Obat</a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a class="nav-link" href="index.php?p=kategori">Obat-Obat</a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a class="nav-link" href="index.php?p=contact">Contact Us</a>
                                                    </div>
                                                    <div class="col-2">
                                                        <a class="nav-link" href="index.php?p=tambahobat">Tambahkan Obat</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="row pt-4">
                                    <div class="col"><a class="nav-link" href="index.php?p=login">Login</a></div>
                                    <div class="col"><p>|</p></div>
                                    <div class="col"><a class="nav-link" href="index.php?p=register">Register</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        </nav>
    </header>

    <main class="container">
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