<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/styles.css">
</head>

<body class="container">

    <?php
    include "header.php";

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

        include ($pages_dir . '/home.php');
    }

    include "footer.php";
    ?>
</body>

</html>