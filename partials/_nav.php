<?php
$url= substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  

echo '<nav class="navbar m-2">
        <div class="container-fluid ">
            <a class="navbar-brand fs-2 fw-semibold text-light" href="/login_proj">
                <img src="assets/notes.png" alt="Logo" width="" height="50"
                    class="d-inline-block align-text-center">
                Note-mi
            </a>';

if($url=='login.php'){
  echo '<button class="btn btn-outline-light py-2 px-3" onclick="signup()">Sign Up</button>';
}

elseif($url=='signup.php'){
  echo '<button class="btn btn-outline-light py-2 px-3" onclick="login()">Log In</button>';
}

else{
  echo '<button class="btn btn-outline-light py-2 px-3" onclick="logout()">Log Out</button>';
}

echo  '</div></nav>';
?>

