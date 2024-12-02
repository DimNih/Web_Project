<?php
include '../php/user/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="../style/user/login.css">
</head>

<body>
    <div class="container">
        <div class="card-login">
            <div align="center">
                <img src="../Assets/logo/logo.png" alt="logo">
            </div>
            <div class="card-title">
                <h2>Masuk atau Daftar</h2>
                <p>Menyediakan Produk Berkualitas</p>
            </div>
            <div class="notification" id="notification">
                <p><?php echo $notification; ?></p>
            </div>
            <div class="card-body">
                <div class="card-body-form" id="login-form">
                    <form action="" method="POST">
                        <div class="display-form">
                            <i class="fa-solid fa-envelope input-icon"></i>
                            <input type="email" name="email" placeholder="Email" class="input-form" required>
                        </div>
                        <div class="display-form">
                            <i class="fa-solid fa-lock input-icon"></i>
                            <input type="password" name="sandi" id="password" placeholder="Password" class="input-form" required>
                            <i class="fa-solid fa-eye toggle-password" onclick="togglePassword()"></i>
                        </div>
                        <button type="submit" name="MASUK" class="button-form">Masuk</button>
                        <p class="text-signup">Belum punya akun? <a href="#" onclick="showRegister()">Daftar</a></p>
                    </form>
                </div>
                <div class="card-body-form hidden" id="register-form">
                    <form action="" method="POST"  enctype="multipart/form-data">
<div class="display-form">
        <i class="fa-solid fa-image input-icon"></i>
        <input type="file" name="profile_picture" class="input-form" accept="image/*" required>
    </div>

        <div class="display-form">
                            <i class="fa-solid fa-envelope input-icon"></i>
                            <input type="text" name="nama" placeholder="masukan nama" class="input-form" required>
                        </div>

                        <div class="display-form">
                            <i class="fa-solid fa-envelope input-icon"></i>
                            <input type="email" name="email" placeholder="Email" class="input-form" required>
                        </div>
                        <div class="display-form">
                            <i class="fa-solid fa-lock input-icon"></i>
                            <input type="password" name="sandi" id="register-password" placeholder="Password" class="input-form" required>
                            <i class="fa-solid fa-eye toggle-password" onclick="toggleRegisterPassword()"></i>
                        </div>
                        <div class="display-form">
                            <i class="fa-solid fa-lock input-icon"></i>
                            <input type="number" name="nomer" id="register-number" placeholder="Number" class="input-form" required>
                            <i class="fa-solid fa-eye toggle-password" onclick="toggleRegisterPassword()"></i>
                        </div>
                       
                        <div class="display-form">
                            <i class="fa-solid fa-home input-icon"></i>
                            <input type="text" name="alamat" placeholder="Alamat (Opsional)" class="input-form">
                        </div>
                        <button type="submit" name="REGISTER" class="button-form">Daftar Sekarang</button>
                        <p class="text-sign">Sudah punya akun? <a href="#" onclick="showLogin()">Login</a></p>
                    </form>
                </div>
            </div>

            <div class="card-footer">
                <p class="text-sign">Lihat Yang Lain</p>

                <div class="card-footer-with">
                    <button class="card-footer-logo">
                    <a href="../database/data.php" > 
                        <img src="../Assets/logo/database.png" alt="DataBaseLogo">
                       </button>
                    <button class="card-footer-logo">
                        <a href="../php/user/google.php" >

                        <img src="../Assets/logo/google.png" alt="googleLogo">
                        </a>
                    </button>
                    <button class="card-footer-logo">
                        <a href="https://github.com/logout">
                        <img src="../Assets/logo/github.png" alt="githubLogo">
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>

<script src="../js/login/login.js"></script>

</body>
</html> 