<?php

$conn=mysqli_connect("localhost","root","","car_rental_db");
if(!$conn){
    die("Not connect to database".mysqli_connect_error());
}

?>