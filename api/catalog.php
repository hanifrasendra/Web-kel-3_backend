<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$host = getenv('DATABASE_HOST');
$username = getenv('DATABASE_USER');
$pass = getenv('DATABASE_PASS');
$nama_db = getenv('DATABASE_DB');

// Tambah koneksi $conn yang sebelumnya tidak ada
$conn = mysqli_connect($host, $username, $pass, $nama_db);

$tipe_beasiswa = $_GET['filter'] ?? ''; // Tambah ?? '' supaya tidak error kalau filter kosong

if ($tipe_beasiswa == "Reguler" || $tipe_beasiswa == "Prestasi" || $tipe_beasiswa == "Leadership") {
    $result = mysqli_query($conn, "SELECT * FROM pengajuan WHERE tipe_beasiswa = '$tipe_beasiswa'");
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $result = mysqli_query($conn, "SELECT * FROM pengajuan");
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

echo json_encode([
    "status" => "success",
    "data" => $data
]);
?>