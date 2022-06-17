
<?php
require_once './config/pdbc.php';
session_start();
?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecDon</title>

    <!-- BOOTSTRAP CSS LINKS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- OWN CSS FILE -->
    <link rel="stylesheet" href="./styles/index.css">

    <!-- FONT AWESOME JS LINK -->
    <script src="https://kit.fontawesome.com/3f2072db5d.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- NAVBAR  -->
    <nav class="navbar navbar-expand-md" role="navigation">
        <div class="container-fluid">

            <!-- navbar brand logo -->
            <a href="index.php" class="navbar-brand text-light ">SecDon</a>            


            <!-- search icon container  -->
            <div class="search-icon-container"> 
            <a href="#" class="search-icon">
                <i class="fa-solid fa-magnifying-glass fa-xl"></i>
            </a>
            </div>

            <div class="collapse navbar-collapse" id="search-bar-container">
                <!-- search bar  -->
                <form class="d-flex search-form" action="./find_company.php" method="POST" id="752">
                    <input class="form-control me-2" type="search" placeholder="Kurum adı giriniz" aria-label="Search" name="searched_company">
                    <button class="btn btn-outline-light" type="submit" name="getCompanyRequest" value="1" form="752">Ara</button>
                </form>
            </div>


            <div class="d-flex">

                <?php if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) { ?>

                    <!-- login button -->
                    <button class="btn btn-light ">
                        <a href="./login.php" style="color: black; text-decoration: none">
                            Giriş Yap
                        </a>
                    </button>

                <?php } ?>
                
                <?php if(isset($_SESSION['username']) && isset($_SESSION['password'])) { ?>

                    <!-- profile icon -->
                    <div class="icon-container">
                        <a href="./profile.php" class="profile-link">
                            <i class="fa-solid fa-circle-user fa-2x"></i>
                        </a>
                    </div>

                <?php } ?>


            </div>

        </div>
    </nav>
