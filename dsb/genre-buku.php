<?php
    session_start();
    include 'koneksi.php';
    if ($_SESSION['status_login'] != true ) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre Buku</title>
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
            <li><a href="login.php">keluar</a></li>
            
        </ul>
        </div>
     </header>

        <!-- content -->
         <div class="section">
            <div class="container">
                <h3>List Genre Buku</h3>
                <div class="box">
                    <p><a href="tambah-data-genre.php">Tambah Genre Buku</a></p>
                    <table border="1" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th width="60px">No</th>
                                <th>Genre</th>
                                <th width="160px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $kategori = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY id_kategori DESC");
                                while($row = mysqli_fetch_array($kategori)) {
                                ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nama_kategori'] ?></td>
                                <td>
                                    <a href="edit-data-genre.php?id=<?php echo $row['id_kategori']?>">Edit</a> || <a href=
                                    "hapus-genre.php?idk=<?php echo $row['id_kategori']?>" 
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Ini? Data Akan Dihapus Selamanya')">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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