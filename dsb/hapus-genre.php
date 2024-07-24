<?php

    include 'koneksi.php';

    if (isset($_GET['idk'])) {
        $delete = mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = '".$_GET['idk']."' ");
        echo '<script>windows.location="genre-buku.php"</script>';
    }

?>