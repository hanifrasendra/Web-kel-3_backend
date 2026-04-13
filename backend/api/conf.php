<?php 
    $host = getenv('DATABASE_HOST');
    $username = getenv('DATABASE_USER');
    $pass = getenv('DATABASE_PASS');
    $nama_db = getenv('DATABASE_DB');

    try {
        // Buat koneksi PDO ke MySQL
        $pdo = new PDO("mysql:host=$host;dbname=$nama_db;charset=utf8mb4", $username, $pass);
        
        // Set mode error PDO ke exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // echo "Koneksi berhasil!"; // Hanya untuk testing
        
    } catch (PDOException $e) {
        // Hentikan proses jika koneksi gagal, tampilkan pesan error
        die("Koneksi database gagal: " . $e->getMessage());
    }
?>