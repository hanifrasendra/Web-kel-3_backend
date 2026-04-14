<?php
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: GET, POST");
header("Content-Type: application/json");

include 'conf.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$input = json_decode(file_get_contents("php://input"), true);
$id = $input['id'];

if (!$id) {
    echo json_encode([
        "status" => "error",
        "message" => "ID tidak ditemukan"
    ]);
    exit();
}

$query = mysqli_query($conn, "DELETE FROM pengajuan where id = '$id'");
$result = mysqli_query($conn, $query);

if($result){
    echo json_encode([
        "status" => "success",
        "message" => "Data berhasil dihapus"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Gagal menghapus data"
    ]);
}
?>