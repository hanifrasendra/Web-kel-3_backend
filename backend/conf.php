<?php 
    $host = "localhost";
    $username = "root";
    $pass = "";
    $nama_db = "portal_beasiswa";

    

    //koneksi dengan database
    $conn = mysqli_connect($host, $username, $pass, $nama_db);

    if(!$conn) {
        echo json_encode(["status" => "gagal", "message" => "Koneksi database gagal!"]);
        exit();
    }

    
?>