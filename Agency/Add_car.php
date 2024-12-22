<?php
session_start();
include '../Layout/Header.php';

include '../include/dbconnect.php';

$data_success = false;
$number_exists = false;
$data_error = false;

if (isset($_POST['submit'])) {

    $name = strtoupper($_POST["name"]);
    $model = strtoupper($_POST["vehicle_model"]);
    $number = strtoupper($_POST["vehicle_number"]);
    $rent = $_POST["rent_per_day"];
    $capacity = $_POST["seating_capacity"];


    if (empty($_POST["name"]) && empty($_POST["vehicle_model"]) && empty($_POST["vehicle_number"]) && empty($_POST["rent_per_day"])) {

    } else {

        $exists = "SELECT * FROM `available_car` WHERE V_Number='$number'";
        $resultesists = mysqli_query($conn, $exists);
        $exnum = mysqli_num_rows($resultesists);

        if ($exnum > 0) {
            $number_exists = true;
        } else {
            $sql = "INSERT  INTO `available_car` (`V_Model`, `V_Name`, `V_Number`,`V_Seat_Cap` , `V_Rent` ) VALUES ('$model', '$name', '$number','$capacity' , '$rent')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $data_success = true;
            } else {
                $data_error = true;
            }
        }
    }
}
?>
<div class="container">
<?php
    if ($data_success) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Car Added Successfully </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    if ($number_exists) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Car Already Exists </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    if ($data_error) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Error!! </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }

    ?>
    <div class="row mt-5 mb-4">
        <h2>ADD CAR FOR RENT </h2>
    </div>
    <div class="row d-flex  mb-2 py-4 shadow-lg rounded">
        <div class="col-md-12 block-9 ">

            <form method="post">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="vehicle_model" class="form-label">Model Number</label>
                        <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vehicle_number" class="form-label">Car Number</label>
                        <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="rent_per_day" class="form-label">Rent Per Day</label>
                        <input type="number" class="form-control" id="rent_per_day" name="rent_per_day" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="seating_capacity" class="form-label">Seating Capacity</label>
                        <input type="number" class="form-control" id="seating_capacity" name="seating_capacity"
                            required>
                    </div>
                </div>
                <input type="submit" value="ADD" class="btn btn-primary" name="submit">
            </form>
        </div>
    </div>
</div>
<?php include '../Layout/Footer.php' ?>