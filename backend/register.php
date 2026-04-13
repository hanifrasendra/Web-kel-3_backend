<?php 
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }

    include 'conf.php';

    $input = json_decode(file_get_contents("php://input"), true);
    $nama = $input['nama'];
    $email = $input['email'];
    $password = $input['password'];

    $statement = "INSERT INTO register_user (nama, email, password) VALUES ('$nama', '$email', '$password')";

    if (mysqli_query($conn, $statement)) {
        echo json_encode([
            "status"  => "success",
            "message" => "Data berhasil ditambahkan"
        ]);
    } else {
        echo json_encode([
            "status"  => "gagal",
            "message" => mysqli_error($conn)
        ]);
    }


?>

