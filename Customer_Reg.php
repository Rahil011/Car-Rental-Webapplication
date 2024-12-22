<?php
include './Layout/Header.php';
// include database file
include './include/dbconnect.php';

$password_match = false;
$data_success = false;
$email_error = false;

// check if form is submitted or not
if (isset($_POST['submit'])) {

    $email = $_POST["email"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $nameErr = $emailErr = "";

    if (empty($_POST["email"]) && empty($_POST["password"]) && empty($_POST["name"])) {
        $nameErr = $emailErr = "REQUIRED";
    } else {

        $exists = "SELECT * FROM `customer` WHERE customer_Email='$email'";
        $resultesists = mysqli_query($conn, $exists);
        $exnum = mysqli_num_rows($resultesists);

        if ($exnum > 0) {
            $email_error = true;
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT  INTO `customer` (`customer_Email`, `customer_Name`, `customer_Password`,`customer_Phone` ) VALUES ('$email', '$name', '$hash','$phone')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $data_success = true;
            } else {
                $password_match = true;
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
            <strong> Registration Done Successfully </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    if ($password_match) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Password Does not match </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    if ($email_error) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Email Already Exists </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }

    ?>
    <div class="main">
        <div class="left-reg">
            <div class="row">
                <h1>Hello!</h1>
            </div>
            <div class="row">
                <p>Enter your personal details and start journey with us.</p>
            </div>
        </div>
        <div class="right-reg">
            <div class="row">
                <h2>Customer Registration</h2>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="social-container">
                        <a href="#" class="social"><ion-icon name="logo-google"></ion-icon></a>
                        <a href="#" class="social"><ion-icon name="logo-linkedin"></ion-icon></a>
                        <a href="#" class="social"><ion-icon name="logo-facebook"></ion-icon></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <p>or sign up using your email</p>
            </div>
            <div class="row mt-1 w-75">
                <form method="POST">
                    <div class="form-group mb-2">
                        <label for="name"> Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your full name"
                            name="name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number"
                            name="phone">
                    </div>
                    <div class="form-group mb-2">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password"
                            name="password">
                    </div>
                    <div class="form-group mb-2">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword"
                            placeholder="Confirm your password" name="confirmpass">
                    </div>
                    <input type="submit" value="Sign Up" class="btn btn-primary btn-block text-center" name="submit">
                </form>
            </div>

        </div>
    </div>
</div>


<?php include './Layout/Footer.php' ?>