<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: \login_proj");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3aecdbe258.js" crossorigin="anonymous"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <?php
        echo "<link rel='stylesheet' type='text/css' href='styles.css' />";
        echo "<script type='text/javascript' src='script.js'></script>";
     ?>
</head>

<body>
    <div class="wrapper">
        <?php require 'partials\_sidebar.php'; ?>
        <div class="main">
            <div class="container col-md-10">
                <h1>Home Page</h1>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        const hamburger = document.querySelector('#toggle-btn');
        hamburger.addEventListener("click", function () {
            document.querySelector("#sidebar").classList.toggle("expand");
            document.querySelector("#new").classList.toggle("d-none");
            document.querySelector("#hide-btn").classList.toggle("d-none");
            document.querySelector("#show-btn").classList.toggle("d-none");
        })

        const dd = document.querySelector("#dd");
        const ddi = document.querySelector("#dd-icon");
        dd.addEventListener("click", function () {
            ddi.classList.toggle("lni-chevron-right");
            ddi.classList.toggle("lni-chevron-down");
        });
    </script>
</body>

</html>