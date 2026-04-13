<?php 
   $conn = mysqli_init();
    mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
    mysqli_real_connect(
        $conn,
        $host,
        $username,
        $pass,
        $nama_db,
        3306,
        NULL,
        MYSQLI_CLIENT_SSL
    );

    if (mysqli_connect_error()) {
        die(json_encode(["status" => "gagal", "message" => "Koneksi DB gagal"]));
    }
?>