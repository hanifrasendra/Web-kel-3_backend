<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");

    include 'conf.php';

    $result = mysqli_query($conn, "SELECT * FROM register_user");

    $users = [];
    while ($row = mysqli_fetch_array($result)) {
        $users[] = $row;
    }

    echo json_encode([
        "status" => "success",
        "data" => $users
    ]);

?>