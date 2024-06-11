<?php
   echo "<link rel='stylesheet' type='text/css' href='styles.css' />";
   echo "<script type='text/javascript' src='script.js'></script>";
?>
<?php
$login=false;
$showError=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include "partials/_dbconnect.php";
        $username=$_POST['username'];
        $password=$_POST['password'];
 
        $sql="SELECT * FROM `users` WHERE `username` = '$username'";
        $result=mysqli_query($conn, $sql);
        $num=mysqli_num_rows($result);
        if($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                if (password_verify($password, $row['password'])){
                    $login=true;
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['username']=$username;
                    header("location: welcome.php");
                }
                else{
                    $showError=true;
                }
            }
        }
        else{
            $showError=true; 
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Note-mi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
</head>
<style>

</style>

<body>
    <?php require "partials\_nav.php"; ?>
    <?php
        if($login){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You have been logged in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    ?>
    <?php
        if($showError){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> Invalid Credentials.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    ?>
    <!-- <nav class="navbar m-2">
        <div class="container-fluid ">
            <a class="navbar-brand fs-2 fw-semibold text-light" href="/login_proj">
                <img src="assets/notes.png" alt="Logo" width="" height="50"
                    class="d-inline-block align-text-center">
                Note-mi
            </a> -->
            <!-- <button class="btn btn-outline-light py-2 px-3" onclick="signup()">Sign Up</button>

        </div>
    </nav> -->

    <div class="entry-card container col-md-8 mt-3">
        <h1 class="text-center fs-2">Login in to your account</h1>

        <form action="/login_proj/login.php" method="post" class="d-flex flex-column align-items-center my-3">
            <div class="mb-3 col-md-6">
                <label for="username" class="form-label ms-2">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label ms-2">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary col-md-5">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>