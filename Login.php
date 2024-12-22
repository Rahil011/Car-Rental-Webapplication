<?php
include './Layout/GuestHeader.php';
include './include/dbconnect.php';

$email_error = false;
$password_error = false;

if(isset($_POST['submit'])){
    $user_type = $_POST["user_type"];
    $email=$_POST["email"];
    $password=$_POST["password"]; 

    // Check for User Type 

    if ($user_type == "Customer") {
        $sql= "SELECT * FROM customer WHERE customer_Email='$email'";
    } else if ($user_type == "Agency") {
        $sql = "SELECT * FROM agency WHERE agency_Email='$email'";
    } else {
        $email_error = true;
    }

        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num==1){
            while($row=mysqli_fetch_assoc($result)){

                if ($user_type == "Customer") {
                    $password_column = $row['customer_Password'];
                } else if ($user_type == "Agency") {
                    $password_column = $row['agency_Password'];
                }
                if(password_verify($password, $password_column)){
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['email']=$email;
                    $_SESSION['user_type'] = $user_type;
                    header("location: index.php");
                }
                else{
                    $password_error=true;
                }
            }
           
        }
        else{
            $email_error=true;
        }
    
}


?>

<div class="container">
    <?php
    if ($password_error) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Password Does Not Match </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    if ($email_error) {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Email Does not Match </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    ?>
    <div class="main">
        <div class="left">
            <div class="row">
                <h1>Sign In</h1>
            </div>
            <div class="row mt-3  w-75">
                <form class="form-signin" method="POST" action="login.php">

                    <div class="form-floating">
                        <select class="form-select" id="floatingSelectGrid" name="user_type">
                            <option selected>Select User Type</option>
                            <option value="Customer">Customer</option>
                            <option value="Agency">Agency</option>
                        </select>
                        <label for="floatingSelectGrid">Works with selects</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="email">
                        <label for="floatingInput">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="form-floating mb-3 text-center">
                        <a href="#">Forgot your password?</a>
                    </div>

                    <input type="submit" value="Sign in" class="btn btn-primary w-100 py-2" name="submit">
                </form>
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
        </div>
        <div class="right">
            <div class="row">
                <h1>Welcome Back!</h1>
            </div>
            <div class="row">
                <p>To keep connected with us please login with your personal info.</p>
            </div>
        </div>
    </div>
</div>

<?php include './Layout/Footer.php' ?>