<?php
   echo "<link rel='stylesheet' type='text/css' href='styles.css' />";
   echo "<script type='text/javascript' src='script.js'></script>";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Note-mi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="container col-md-10">
    <div class="welcome-card d-flex flex-column align-items-center text-center px-3">
        <div class="welcome-text text-wrap">
            <p class="heading fw-medium"> Welcome to <span class="fw-semibold mx-2">Note-mi</span><img
                    src="assets\notes.png" alt="Notes"></p>
            <p class="fs-3">Your personal note taking app</p>
            <button type="button" class="btn btn-outline-light btn-lg m-2" onclick="login()">Log In</button>
            <button type="button" class="btn btn-outline-light btn-lg m-2" onclick="signup()">Sign Up</button>
        </div>
    </div>

    <div class="bubbles">

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>