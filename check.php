<?php 
    include "partials/_dbconnect.php";
    $sql="SELECT `sno` FROM `users` WHERE `username` LIKE 'arw'";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
        $id= $row['sno'];
        echo $id;
    }
    $sql="SELECT * FROM `notes` WHERE `id`=".$id;
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
        echo $row['title'];
    }
?>