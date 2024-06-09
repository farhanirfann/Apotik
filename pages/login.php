<?php
require_once ('./class/class.User.php');

if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $objUser = new User();
    $objUser->hasil = true;
    $objUser->ValidateEmail($email);

    if ($objUser->hasil) {
        $ismatch = password_verify($password, $objUser->password);
        if ($ismatch) {
            if (!isset($_SESSION))
                session_start();
        }

        $_SESSION["userid"] = $objUser->userid;
        $_SESSION["role"] = $objUser->role;
        $_SESSION["name"] = $objUser->name;
        $_SESSION["email"] = $objUser->email;

        echo "<script>alert('Login sukses');</script>";

        if ($objUser->role == 'user')
            echo '<script>window.location = "dashboarduser.php";</script>';
        else if ($objUser->role == 'admin')
            echo '<script>window.location = "dashboardadmin.php";</script>';
        else {
            echo "<script>alert('Password tidak match');</script>";
        }
    } else {
        echo "<script>alert('Email tidak terdaftar');</script>";
    }
}
?>


<form action="" method="post">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-8">
                <div class="p-4" style="background-color: #FFFFFF; border-radius:25px; height: 450px;">
                    <div class="card-body">
                        <h1 class="text-center" style="margin-bottom: 20px; ">Log In</h1>
                        <form>
                            <div class="form-group p-3">
                                <input type="email" name="email" class="form-control form-control-lg" id="email"
                                    placeholder="Email" style="border: 2px solid #000000;">
                            </div>
                            <div class="form-group p-3">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    id="password" placeholder="Password" style="border: 2px solid #000000;">
                            </div>
                            <p class="p-3">Didn't have a Account? <a href="index.php?p=register">Register</a></p>

                            <div class="text-center">
                                <button type="submit" name="btnLogin" class="btn btn-light" style="border: 2px solid #000000; border-radius: 40px; border: 2px solid #000; color: #000; 
                                    padding: 10px 70px; font-size: 16px; background-color: #fff;">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="./img/landingpage.png" alt="Background Image" style=" position: absolute; top: 65%;  left: 50%; min-width: 100%; min-height: 100%; width: auto; 
        height: auto;  z-index: -1; transform: translate(-50%, -50%); filter: brightness(50%);">

</form>