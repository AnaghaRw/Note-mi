<?php
   echo "<link rel='stylesheet' type='text/css' href='styles.css' />";
   echo "<script type='text/javascript' src='script.js'></script>";
?>
<?php
$showError=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include "partials/_dbconnect.php";
        $username=$_POST['username'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];

        //Checking if username exists
        $existSql = "SELECT * FROM `users` WHERE `username` = '$username'";
        $result=mysqli_query($conn, $existSql);
        $num=mysqli_num_rows($result);
        if($num==0){
            $exist=false;
        }
        else{
            $exist=true;
        }

        if($password==$cpassword && $exist==false){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql="INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$hash')";
            $result=mysqli_query($conn, $sql);
            if($result){
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$username;
                header("location: welcome.php");
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
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php require "partials/_nav.php"; ?>

    <div class="entry-card container col-md-8 mt-3">
        <h1 class="text-center">Sign Up</h1>

        <form action="/login_proj/signup.php" method="post" class="d-flex flex-column align-items-center my-3">
            <div class="mb-3 col-md-6">
                <label for="username" class="form-label">Username</label>
                <?php 
                    if($showError && $exist){
                        echo '<p class="text-danger form-text">Username already exists. Try something else.</p>';
                    }
                ?>
                <input type="text" maxlength="11" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="23" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 col-md-6">
                <label for="cpasword" class="form-label">Confirm Password</label>
                <?php
                    if($showError && !$exist){
                        echo '<p class="text-danger form-text">Passwords do not match</p>';
                    }
                ?>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <div id="confirmHelp" class="form-text">Make sure you enter the same password.</div>
                
            </div>
            
            <button type="submit" class="btn btn-primary col-md-5">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>