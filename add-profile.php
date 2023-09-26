<?php
require_once("./redirect.php");
require_once("./backend/dbconn.php");
$sql = "SELECT company, website, location, skills FROM profiles WHERE userId='" . $_SESSION["user_id"] . "'";
$result = $conn->query($sql);
$profile = [
    "company" => "",
    "website" => "",
    "location" => "",
    "skills" => "",
];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $profile = $row;
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
    <title>Devconnector: Add Profile</title>
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
                        <a class="nav-link active" href="add-profile.php">Your Profile</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav">
                <a class="nav-link cursor-pointer" onclick="logout();"><i data-feather="log-out"></i> <span>Logout</span></a>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h3 class="text-primary text-center pb-3 mt-5">Save Profile</h3>
        <form action="" method="post" class="mx-auto w-50" id="profile-form" novalidate>
            <div class="mb-3 control-group">
                <label for="company" class="form-label control-label">Company Name</label>
                <div class="control">
                    <input type="text" class="form-control" name="company" id="company" placeholder="Company" value="<?php echo $profile["company"] ?>" required data-validation-required-message="Company is required" />
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="mb-3 control-group">
                <label for="website" class="form-label control-label">Website</label>
                <div class="control">
                    <input type="text" class="form-control" name="website" id="website" placeholder="http://example.com" value="<?php echo $profile["website"] ?>" required data-validation-required-message="Website is required" />
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="mb-3 control-group">
                <label for="location" class="form-label control-label">Location</label>
                <div class="control">
                    <input type="text" class="form-control" name="location" id="location" placeholder="eg. New York" value="<?php echo $profile["location"] ?>" required data-validation-required-message="Location is required" />
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="mb-3 control-group">
                <label for="skills" class="form-label control-label">Skills</label>
                <div class="control">
                    <input type="text" class="form-control" name="skills" id="skills" placeholder="eg. HTML, CSS" value="<?php echo $profile["skills"] ?>" required  data-validation-required-message="Skill is required" />
                    <small>Please use comma separated values (eg. HTML,CSS,JavaScript,PHP)</small>
                    <div class="help-block"></div>
                </div>
            </div>
            <input type="hidden" name="userId" value="<?php echo $_SESSION["user_id"] ?>">
            <div class="mb-5 text-center">
                <button class="btn btn-primary" type="submit">Save Profile</button> <a class="btn btn-light" href="dashboard.php">Go Back</a>
            </div>
        </form>
    </div>
    <script src="./assets/js/master.js"></script>
    <script src="./assets/js/add-profile.js"></script>
</body>

</html>