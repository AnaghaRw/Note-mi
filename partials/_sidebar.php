<?php
    $id=$_SESSION['id'];
    $sql="SELECT * FROM `notes` WHERE `id` = '$id'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);


echo '<aside id="sidebar">
            <div class="logo d-flex">
                <div class="sidebar-logo"><a class="navbar-brand fs-3 fw-semibold text-light" href="/login_proj">
                        <img src="assets/notes.png" alt="Logo" width="" height="40"
                            class="d-inline-block align-text-center">
                        Note-mi
                    </a>
                </div>
                <button id="toggle-btn" type="button">
                    <div class="d-flex"><i class="lni lni-pencil-alt d-none px-2" id="new"></i><i class="lni lni-angle-double-left d-none" id="hide-btn"></i></div>
                    <i class="lni lni-menu" id="show-btn"></i></button>
            </div>
            <li class="sidebar-item mt-5">
                <a href="#" class="sidebar-link"><i class="lni lni-user"></i><span>'.
                        ucfirst($_SESSION['name']).'
                    </span></a>
            </li>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="welcome.php" class="sidebar-link"><i class="lni lni-home"></i><span>&nbspHome</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth" id="dd"><i
                            class="lni lni-chevron-right" id="dd-icon"></i><span>&nbspNotes</span></a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">';
            if($num>0){
                while($row=mysqli_fetch_assoc($result)){
                            echo '<li class="sidebar-item">
                            <a href="" class="sidebar-link"><i class="lni lni-notepad"></i>'.$row['title'].'</a></li> ';
                        }
            }
                        
                        // <li class="sidebar-item">
                        //     <a href="" class="sidebar-link"><i class="lni lni-notepad"></i>Note 2</a>
                        // </li>
                        // <li class="sidebar-item">
                        //     <a href="" class="sidebar-link"><i class="lni lni-notepad"></i>Note 3</a>
                        // </li>
        echo    '</ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link"><i class="lni lni-calendar"></i><span>&nbspCalender</span></a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link"><i class="lni lni-cog"></i><span>&nbspSettings</span></a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="logout.php" class="sidebar-link"><i class="lni lni-exit"></i><span>&nbspLog Out</span></a>
            </div>
        </aside>';

        // $sql="SELECT `sno` FROM `users` WHERE `username` LIKE".$username;
                    // $result=mysqli_query($conn, $sql);
                    // while($row=mysqli_fetch_assoc($result)){
                    //     $id= $row['sno'];
                    //     echo $id;
                    // }
                    // $sql="SELECT * FROM `notes` WHERE `id`=".$id;
                    // $result=mysqli_query($conn, $sql);
                    // while($row=mysqli_fetch_assoc($result)){
                    //     echo '<li class="sidebar-item">
                    //          <a href="" class="sidebar-link"><i class="lni lni-notepad"></i>'.$row['title'].'</a>
                    //     </li>';
                    // }
?>