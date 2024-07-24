<?php
    session_start();
    if ($_SESSION['status_login'] != true ) {
        echo '<script>window.location="login.php"</script>';
    }
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
            <li><a href="semua-buku.php">Semua Buku</a></li>
            <li><a href="genre-buku.php">genre buku</a></li>
            <li><a href="keluar.php">keluar</a></li>
            
        </ul>
        </div>
     </header>

        <!-- content -->
         <div class="section">
            <div class="container">
                <h3>Dashboard</h3>
                <div class="box">
                    <h4>Selamat Datang</h4>
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