<?php
require_once("./redirect.php");
require_once("./backend/dbconn.php");
$sql = "SELECT id, userId, company, location FROM profiles";
$result = $conn->query($sql);
$profiles = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usql = "SELECT fullName FROM users WHERE id='" . $row["userId"] . "' AND status='Active'";
        $uresult = $conn->query($usql);
        if ($uresult->num_rows > 0) {
            while ($urow = $uresult->fetch_assoc()) {
                $row["fullName"] = $urow["fullName"];
            }
        }
        array_push($profiles, $row);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./assets/css/style.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./assets/js/jqBootstrapValidation.js"></script>
    <title>Devconnector: Profiles</title>
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
                        <a class="nav-link active" href="users.php">Users</a>
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
        <div class="row my-4 profile-list">
            <?php foreach ($profiles as $profile) {
                echo '<div class="col-md-3">';
                echo '<div class="card" onclick="redirect_user(\''.base64_encode($profile["id"]).'\')">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $profile["fullName"] . '</h5>';
                echo '<h6 class="card-subtitle mb-2 text-body-secondary"><b><i data-feather="briefcase"></i> : </b>' . $profile["company"] . '</h6>';
                echo '<p class="card-text"><b><i data-feather="map-pin"></i> Location : </b>' . $profile["location"] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } ?>
        </div>
    </div>
    <script src="./assets/js/master.js"></script>
    <script src="./assets/js/users.js"></script>
</body>

</html>