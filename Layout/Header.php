<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 2001 05:00:00 GMT"); 

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: index.php");
  exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <base href="/CarRental/">
    <link rel="stylesheet" href="Assets/css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
        rel="stylesheet">
</head>

<body>

    <header>
        <div class="container-fluid ">
            <nav  class="navbar navbar-expand-lg py-3  shadow-lg rounded bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./index.php">Car Rental</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">

                            <li class="nav-item ms-2">
                                <a class="nav-link " aria-current="page" href="./index.php">Home</a>
                            </li>
                            <li class="nav-item ms-2">
                                <a class="nav-link " aria-current="page" href="./ExploreMore.php">Explore Car</a>
                            </li>

                            <li class="nav-item ms-2">
                                <a class="nav-link " aria-current="page" href="./Contact.php">Contact Us</a>
                            </li>

                            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                                if ($_SESSION['user_type'] == 'Agency') {
                                    echo '
                                    <li class="nav-item ms-2">
                                    <a class="nav-link" aria-current="page" href="./Agency/Add_car.php">Add Car</a>
                                    </li>
                                    <li class="nav-item ms-2">
                                    <a class="nav-link" aria-current="page" href="./Agency/view_Allcar.php">View Cars</a>
                                    </li>
                                    <li class="nav-item ms-2">
                                    <a class="nav-link" aria-current="page" href="./Agency/view_bookedcar.php">View Booked Car</a>
                                    </li>
                                    
                                    ';

                                }
                            } 
                            ?>
                        </ul>

                        <div class="col-md-3 text-end">
                            <a href="./include/Logout.php" class="btn shadow-sm bg-body-tertiary rounded fs-7">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>