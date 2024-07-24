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
            <li><a href="buku.php">Buku</a></li>
            <li><a href="genre-buku.php">genre buku</a></li>
            <li><a href="login.php">keluar</a></li>
            
        </ul>
        </div>
     </header>

        <!-- content -->
         <div class="section">
            <div class="container">
                <h3>List Nama Buku</h3>
                <div class="box">
                    <p><a href="tambah-data-genre.php">Tambah Judul Buku</a></p>
                    <table border="1" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Ketersediaan</th>
                                <th>ditambah pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $buku = mysqli_query($conn, "SELECT * FROM tb_buku ORDER BY id_buku DESC");
                                if(mysqli_num_rows($buku) > 0){
                                while($row = mysqli_fetch_array($buku)) {
                                ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['nama_kategori'] ?></td>
                                <td><?php echo $row['nama_buku'] ?></td>
                                <td><?php echo $row['harga_buku'] ?></td>
                                <td><?php echo $row['deskripsi_buku'] ?></td>
                                <td><img src="produk/<?php echo $row['gambar_buku'] ?>"></td>
                                <td><?php echo $row['ketersediaan'] ?></td>
                                <td><?php echo $row['tanggal_ditambahkan'] ?></td>
                                <td>
                                    <a href="edit-data-buku.php?id=<?php echo $row['id_buku']?>">Edit</a> || <a href=
                                    "hapus-buku.php?idk=<?php echo $row['id_buku']?>" 
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Ini? Data Akan Dihapus Selamanya')">Hapus</a>
                                </td>
                            </tr>
                            <?php }}else{ ?>
                                <tr>
                                    <td colespan="">Belum Ada Buku Saat Ini</td>
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