<?php
    header("Access-Control-Allow-Origin: * ");

    $host = getenv('DATABASE_HOST');
    $username = getenv('DATABASE_USER');
    $pass = getenv('DATABASE_PASS');
    $nama_db = getenv('DATABASE_DB');

    $conn = new mysqli($host, $username, $pass, $nama_db);

    if ($conn->connect_error) {
        die(json_encode(["status" => "gagal", "message" => "Koneksi DB gagal"]));
    }

    $result = $conn->query("SELECT * FROM register_user");


    $users = [];
    while ($row = mysqli_fetch_array($result)) {
        $users[] = $row;
    }

    echo json_encode([
        "status" => "success",
        "data" => $users
    ]);

?>