<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: \login_proj");
        exit;
    }
    include "partials/_dbconnect.php";
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
            <div class="container col-md-10 text-center">
                <p class="fs-1 fw-medium">Welcome to Note-mi,<strong>
                    <?php echo $_SESSION['name'] ?></strong>
                </p>
                <div class="recent">
                    <div class="fs-2 text-start py-2">Recent Notes</div>
                    <div class="d-flex align-items-center" id="rec-cards">
                        <?php
                            $id=$_SESSION['id'];
                            $sql="SELECT * FROM `notes` WHERE `id` = '$id' ORDER BY `updated_on` DESC";
                            $result=mysqli_query($conn, $sql);
                            $num=0;
                            while($row=mysqli_fetch_assoc($result)){
                                if($num<4){
                                    $date=date_create($row['updated_on']);
                                    echo '<div class="recent-card text-start">    
                                        <div class="recent-title fs-4 fw-medium"><i class="lni lni-write me-2"></i>'
                                        .$row['title'].'</div>
                                        <div class="recent-date text-end">'.date_format($date,"dS M Y").'</div>
                                        </div>';
                                }
                                $num+=1;
                            }
                        ?>
                        <button id="new-note" class="new-btn"><i class="lni lni-plus"></i></button>
                    </div>
                </div>
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

        function checkSize(){
            if (screen.availWidth < 768) {
                document.querySelector("#rec-cards").classList.remove("d-flex");
            }
            else{
                document.querySelector("#rec-cards").classList.add("d-flex");

            }
        }
        window.addEventListener("onload", checkSize);

        window.addEventListener("resize", checkSize);
    </script>
</body>

</html>