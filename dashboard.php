<?php
require_once("./redirect.php");
require_once("./backend/dbconn.php");
$sql = "SELECT company, website, location, skills FROM profiles WHERE userId='" . $_SESSION["user_id"] . "'";
$result = $conn->query($sql);
$profile = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $profile = $row;
    }
}
$sql = "SELECT fullName, email FROM users WHERE id='" . $_SESSION["user_id"] . "'";
$result = $conn->query($sql);
$user = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <title>Devconnector: Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">Devconnector</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-profile.php">Your Profile</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav">
                <a class="nav-link cursor-pointer" onclick="logout();"><i data-feather="log-out"></i> <span>Logout</span></a>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2>Welcome <?php echo $user["fullName"]; ?></h2>
        <?php
        if(count($profile) > 0){
            ?><a class="btn btn-primary" href="add-profile.php"><i data-feather="edit-2"></i> Edit Profile</a><?php
        }else{
            ?><a class="btn btn-primary" href="add-profile.php"><i data-feather="plus"></i> Add Profile</a><?php
        }
        ?>
    </div>
    <script src="./assets/js/master.js"></script>
</body>

</html>