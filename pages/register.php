<?php
require_once ('./class/class.User.php');

if (isset($_POST['btnSubmit'])) {
    $inputemail = $_POST["email"];
    $objUser = new User();
    $objUser->ValidateEmail($inputemail);

    if ($objUser->hasil) {
        echo "<script>alert('Email Sudah Terdaftar'); </script>";
    } else {
        $objUser->email = $_POST["email"];
        $password = $_POST['password'];
        $objUser->password = password_hash($password, PASSWORD_DEFAULT);
        $objUser->name = $_POST["name"];
        $objUser->role = 'employee';
        $objUser->AddUser();

        if ($objUser->hasil) {
            echo "<script> alert('Registrasi berhasil'); </script>";
            echo '<script> window.location="index.php?p=home"; </script>'
            ;
        }
    }
}
?>

<form action="" method="post">
    <div class="banner-card">
        <img src="./img/landingpage.png" class="img-fluid" alt="" style="width: 1441px;">
        <div class="banner-text d-flex flex-column justify-content-center align-items-center">
            <img src="./img/logo.png" class="" alt="" style="width: 200px;">
            <h1 class="text-center" style="font-family: 'Istok Web', sans-serif; font-weight: 700">Registration</h1>
            <div class="mt-4  w-100">
                <div class="">
                    <input type="text" name="name" class="form-control w-100" id="name" placeholder="Nama Lengkap"
                        aria-label="name" required>
                </div>
            </div>
            <div class=" mt-4   w-100">
                <div class="">
                    <input type="email" name="email" id="email" class="form-control w-100" placeholder="Alamat Email"
                        aria-label="email" required>
                </div>
            </div>
            <div class="mt-4   w-100">
                <div class="">
                    <input type="password" name="password" id="password" class="form-control w-100"
                        placeholder="Password" aria-label="password" required>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-center align-items-center">
                <input type="submit" class="btn btn-outline-secondary" value="Register" name="btnSubmit">
            </div>
        </div>
    </div>
</form>