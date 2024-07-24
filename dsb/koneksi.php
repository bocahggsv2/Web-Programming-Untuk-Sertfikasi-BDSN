<?php
    //membuat koneksi database
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$db = 'db_bookstore';  

$conn = mysqli_connect($host, $user, $pass, $db) or die ('Gagal Terhubung Ke Database');
?>