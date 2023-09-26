<?php
session_start();
require_once("./dbconn.php");

$request = json_decode(file_get_contents('php://input'), true);

$sql = "SELECT id, email, password FROM users WHERE email='" . $request["email"] . "' AND status='Active'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ((md5($request["password"])) == ($row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            echo json_encode(["code" => 200, "msg" => "User logged in successfully"]);
        } else {
            echo json_encode(["code" => 400, "msg" => "Invalid credentials"]);
        }
    }
} else {
    echo json_encode(["code" => 400, "msg" => "Invalid credentials"]);
}
