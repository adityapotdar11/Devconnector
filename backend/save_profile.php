<?php
session_start();
require_once("./dbconn.php");

$request = json_decode(file_get_contents('php://input'), true);

$sql = "SELECT company, website, location, skills FROM profiles WHERE userId='" . $_SESSION["user_id"] . "'";
$result = $conn->query($sql);
$skills_arr = [];
if(!empty($request["skills"])){
    $skills_arr = explode(",", $request["skills"]);
    $skills_arr = array_map('trim', $skills_arr);
}
$skills = implode(",", $skills_arr);
if ($result->num_rows > 0) {
    $sql = "UPDATE profiles SET company='".$request["company"]."', website='" . $request["website"]. "', location='" . $request["location"]. "', skills='".$skills."', updatedAt='" . date("Y-m-d H:i:s") . "' WHERE userId='" . $_SESSION["user_id"] . "'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["code" => 200, "msg" => "Profile saved successfully"]);
    } else {
        echo json_encode(["code" => 500, "msg" => "Something went wrong"]);
    }
}else{
    $sql = "INSERT INTO profiles (userId, company, website, location, skills, createdAt, updatedAt) VALUES ('" . $_SESSION["user_id"] . "', '" . $request["company"] . "', '" . $request["website"]. "', '" . $request["location"]. "', '" . $skills. "', '" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["code" => 200, "msg" => "Profile saved successfully"]);
    } else {
        echo json_encode(["code" => 500, "msg" => "Something went wrong"]);
    }
}