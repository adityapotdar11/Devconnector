<?php
session_start();
if (!empty($_SESSION["user_id"])) {
    header("Location: http://localhost/xeni-learning/second/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <title>Devconnector: Register</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Devconnector</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="login.php">Login</a>
                    <a class="nav-link active" href="register.php">Register</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container text-center my-4">
        <main class="form-signin w-50 m-auto">
            <form method="post" id="register-form">
                <h1 class="h3 mb-3 fw-normal">Please Register</h1>
                <div class="form-floating">
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full name" required>
                    <label for="fullName">Full Name</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="8" required>
                    <label for="password">Password</label>
                </div>
                <div class="mt-4">
                    <button class="w-100 btn btn-lg btn-primary" type="submit" onclick="">Register</button>
                </div>
                <p class="mt-5 mb-3 text-muted">© 2023–2024</p>
            </form>
        </main>
    </div>
    <script src="./assets/js/register.js"></script>
</body>
</html>