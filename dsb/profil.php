<?php
    session_start();
    include'koneksi.php';
    if ($_SESSION['status_login'] != true ) {
        echo '<script>window.location="login.php"</script>';
    }

    $akun = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($akun);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
     <header>
        <div class="container">
        <h1><a href="">Bookstore</a></h1>
        <ul>
            <li><a href="dashboard.php">Beranda</a></li>
            <li><a href="profil.php">profil</a></li>
            <li><a href="buku.php">Nama Buku</a></li>
            <li><a href="genre-buku.php">genre buku</a></li>
            <li><a href="login .php">keluar</a></li>
            
        </ul>
        </div>
     </header>

        <!-- content -->
         <div class="section">
            <div class="container">
                <h3>Ubah Profil</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama_admin ?>" required>
                        <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                        <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->telepon_admin ?>" required>
                        <input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $d->email_admin ?>" required>
                        <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->alamat_admin ?>" required>
                        <input type="submit" name="submit" value="Ubah Profil" class="btn">
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        
                        $nama = ucwords($_POST['nama']);
                        $user = $_POST['user'];
                        $hp = $_POST['hp'];
                        $email = $_POST['email'];
                        $alamat = ucwords($_POST['alamat']);

                        $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                        nama_admin = '".$nama."',
                                        username = '".$user."',
                                        telepon_admin = '".$hp."',
                                        email_admin = '".$email."',
                                        alamat_admin = '".$alamat."'
                                        WHERE id_admin = '".$d["id_admin"]."' ");
                        if ($update) {
                            echo '<script>alert("Data Berhasil Diubah")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        } else {
                            echo 'Data Gagal Diubah' .mysqli_error($conn);
                        }

                    }
                    ?>
                </div>

                <h3>Ubah Password</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                        <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                        <input type="submit" name="ubah_password" value="Konfirmasi Password Baru" class="btn">
                    </form>
                    <?php
                    if (isset($_POST['ubah_password'])) {
                        
                        $pass1 = $_POST['pass1'];
                        $pass2 = $_POST['pass2'];

                        if ($pass2 != $pass1) {
                            echo '<script>alert("Password Baru Tidak Sesuai")</script>';
                        } else {
                            $u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
                                        pass1 = '".MD5($pass1)."',
                                        WHERE id_admin = '".$d->id_admin."'");
                            if ($u_pass) {
                                echo '<script>alert("Data Berhasil Diubah")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            } else {
                                echo 'Data Gagal Diubah' .mysqli_error($conn);
                            }

                        }

                        $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                        nama_admin = '".$nama."',
                                        username = '".$user."',
                                        telepon_admin = '".$hp."',
                                        email_admin = '".$email."',
                                        alamat_admin = '".$alamat."'
                                        WHERE id_admin = '".$d->id_admin."'");
                        if ($update) {
                            echo '<script>alert("Data Berhasil Diubah")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        } else {
                            echo 'Data Gagal Diubah' .mysqli_error($conn);
                        }

                    }
                    ?>
                </div>
            </div>
         </div>

         <!-- footer -->
          <footer>
            <div class="container">
                <small>Copyright &copy; 2024 - DS INC.</small>
            </div>
          </footer>
</body>
</html>