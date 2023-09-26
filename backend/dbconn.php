<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "xenilearningsecond";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    echo json_encode(["code" => 500, "msg" => "Something went wrong", "data" => mysqli_connect_error()]);
    exit();
}
