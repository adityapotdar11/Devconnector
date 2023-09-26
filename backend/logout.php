<?php
session_start();
unset($_SESSION["user_id"]);
session_destroy();
echo json_encode(["code" => 200, "msg" => "User logged out successfully"]);