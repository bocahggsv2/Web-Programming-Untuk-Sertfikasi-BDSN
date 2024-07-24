<?php
    session_start();
    include'koneksi.php';
    if ($_SESSION['status_login'] != true ) {
        echo '<script>window.location="login.php"</script>';
    }

    $genre = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE id_kategori = '".$_GET['id']."' ");
    $k = mysqli_fetch_object($genre);
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
                <h3>Edit Genre Buku</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama Genre Buku" class="input-control" value="" required>
                        <input type="submit" name="submit" value="Edit Genre Buku" class="btn">
                    </form>
                    <?php
                        if(isset($_POST['submit'])) {
                            
                            $nama = ucwords($_POST['nama']);

                            $update = mysqli_query($conn, "UPDATE tb_kategori SET
                                                    nama_kategori = '".$nama."' 
                                                    WHERE id_kategori = '".$k->id_kategori."' ");
                            if ($update) {
                                echo '<script>alert("Berhasil Mengubah Genre Buku")</script>';
                            } else {
                                echo '<script>alert("Maaf! Gagal Mengubah Genre Buku")</script>'.mysqli_error($conn);   
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