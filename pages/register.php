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
        <img src="./img/landingpage.png" class="img-fluid" alt="" style="width: 100%;">
        <div class="banner-text d-flex flex-column justify-content-center align-items-center"
            style="position:absolute; top:50%; left:50%; transform:translate(-50%, -40%)">
            <img src="./img/logo.png" class="mb-4" alt="" style="width: 40%;">
            <h1 class="text-center m-1"
                style="font-family: 'Istok Web', sans-serif; font-weight: 700; color:#FFFFFF; font-size: 60px; ">
                Registration</h1>
            <div class="mt-4" style="width:600px;">
                <input type="text" name="name" class="form-control w-100" id="name" placeholder="Nama Lengkap"
                    aria-label="name" required>
            </div>
            <div class=" mt-4 w-100">
                <input type="email" name="email" id="email" class="form-control w-100" placeholder="Alamat Email"
                    aria-label="email" required>
            </div>
            <div class="mt-4 w-100">
                <input type="password" name="password" id="password" class="form-control w-100" placeholder="Password"
                    aria-label="password" required>
            </div>
            <div class="mt-4 w-100">
                <p style="color:#FFFFFF;">Already have a Account? <a href="">Login</a></p>
            </div>
            <div class="mt-4 d-flex justify-content-center align-items-center">
                <input type="submit" class="btn btn-light" value="Register" name="btnSubmit">
            </div>
        </div>
    </div>
</form>