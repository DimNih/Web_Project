<?php
include '../php/user/edit-profil.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="../style/user/login.css">

    <link rel="icon" type="image/x-icon" href="../Assets/logo/Logo-web/ambashop.png" sizes="16x16">
</head>
<body>
    <div class="container">
        <div class="card-login">
            <div align="center">
                <img src="../Assets/logo/logo.png" alt="logo">
            </div>
            <div class="card-title">
                <h2>Edit Profil</h2>
                <p>Mengubah Data Profil Anda</p>
            </div>
            <div class="notification" id="notification">
                <p><?php echo $notification; ?></p>
            </div>
            <div class="card-body">
                <div class="card-body-form">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="display-form">
                            <i class="fa-solid fa-image input-icon"></i>
                            <input type="file" name="profile_picture" class="input-form" accept="image/*">
                        </div>

                        <div class="display-form">
                            <i class="fa-solid fa-user input-icon"></i>
                            <input type="text" name="nama" value="<?php echo $user['nama']; ?>" class="input-form" required>
                        </div>

                        <div class="display-form">
                            <i class="fa-solid fa-user input-icon"></i>
                            <input type="text" name="sandi" value="<?php echo $user['sandi']; ?>" class="input-form" required>
                        </div>


                        <div class="display-form">
                            <i class="fa-solid fa-envelope input-icon"></i>
                            <input type="email" name="email" value="<?php echo $user['email']; ?>" class="input-form" required>
                        </div>

                        <div class="display-form">
                            <i class="fa-solid fa-phone input-icon"></i>
                            <input type="number" name="nomer" value="<?php echo $user['nomer']; ?>" class="input-form" required>
                        </div>

                        <div class="display-form">
                            <i class="fa-solid fa-home input-icon"></i>
                            <input type="text" name="alamat" value="<?php echo $user['alamat']; ?>" class="input-form">
                        </div>

                        <button type="submit" name="UPDATE" class="button-form">Perbarui Profil</button>
                    </form>
                </div>
            </div>

            <div class="card-footer">
                <div class="card-footer-with">
                    <button class="card-footer-logo">
                        <a href="contact.php"> 
                            <img src="../Assets/logo/back.png" alt="Logo">
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/login/login.js"></script>
</body>
</html>
