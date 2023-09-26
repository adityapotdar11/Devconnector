<?php
session_start();
require_once("./dbconn.php");

$request = json_decode(file_get_contents('php://input'), true);

$sql = "SELECT id FROM users WHERE email='" . $request["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo json_encode(["code" => 400, "msg" => "User already exists"]);
} else {
    $sql = "INSERT INTO users (fullName, email, password, createdAt, status) VALUES ('" . $request["fullName"] . "', '" . $request["email"] . "', '" . md5($request["password"]) . "', '" . date("Y-m-d H:i:s") . "', 'Active')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION["user_id"] = mysqli_insert_id($conn);
        echo json_encode(["code" => 200, "msg" => "User registered successfully"]);
    } else {
        echo json_encode(["code" => 500, "msg" => "Something went wrong"]);
    }
}

mysqli_close($conn);
