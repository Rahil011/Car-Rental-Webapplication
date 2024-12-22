<?php
session_start();

// Check if user is logged in and is a customer

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['user_type'] === 'Customer')) {

    header('Location: ../Login.php');
    exit;
}

include '../Layout/Header.php';
include '../include/dbconnect.php';

$book = false;
$err = false;

// Get User detail 
$email = $_SESSION['email'];

$id = $_GET['id'];

$sql = "SELECT * FROM available_car WHERE V_Id = '$id'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);



if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $vehicle_model = $_POST['vehicle_model'];
    $start_date = $_POST['start_date'];
    $total_days = $_POST['total_days'];

    $sql_cust = "SELECT * FROM customer WHERE customer_Email='$email'";
    $result_cust = mysqli_query($conn, $sql_cust);
    
    if ($result_cust && mysqli_num_rows($result_cust) > 0) {
        $row_cust = mysqli_fetch_assoc($result_cust);
        $cust_name = $row_cust['customer_Name'];
        $cust_id = $row_cust['customer_ID'];
    } else {
        // Handle error or redirect
        echo "Error fetching customer details.";
        exit;
    }

    $sql = "INSERT INTO booking (`customer_name`, `customer_id`, `car_name`, `car_model`, `start_date`, `total_days`) 
        VALUES ('$cust_name', '$cust_id', '$name', '$vehicle_model', '$start_date', '$total_days')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $book = true;
    } else {
        $err = true;
    }



}


?>

<div class="container">
    <?php
    if ($book) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Booking Done Successfully </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    if ($err) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Not Booked </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }


    ?>
    <div class="row mt-5 mb-4 text-center">
        <h2>Booking Confirmation</h2>
    </div>
    <div class="row d-flex  mb-2 py-4 shadow-lg rounded">
        <div class="col-md-12 block-9 ">
            <form method="post">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value=<?php echo $row['V_Name']; ?> readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="vehicle_model" class="form-label">Model Number</label>
                        <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" value=<?php echo $row['V_Model']; ?> readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vehicle_number" class="form-label">Car Number</label>
                        <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" value=<?php echo $row['V_Number']; ?> readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="rent_per_day" class="form-label">Rent Per Day</label>
                        <input type="number" class="form-control" id="rent_per_day" name="rent_per_day" value=<?php echo $row['V_Rent']; ?> readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="start_date" required>
                    </div>
                    <div class="col-md-6">
                        <label for="totaldays" class="form-label">Total Number of Days:</label>
                        <select class="form-select" name="total_days" required>
                            <?php for ($i = 1; $i <= 30; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                <input type="submit" value="Book Now" class="btn btn-primary" name="submit">
            </form>
        </div>
    </div>
</div>


<?php include '../Layout/Footer.php' ?>