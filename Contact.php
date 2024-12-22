<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include './Layout/Header.php';
} else {
    include './Layout/GuestHeader.php';
}
?>

<div class="container">
    <div class="row mt-5 mb-4">
        <h2>Contact Us</h2>
    </div>
    <div class="row d-flex  mb-2 py-4 shadow-lg rounded">
        <div class="col-md-4">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="border w-100 p-4 rounded mb-2 d-flex">
                        <p><span>Address:</span> </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border w-100 p-4 rounded mb-2 d-flex">
                        <p><span>Phone:</span></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border w-100 p-4 rounded mb-2 d-flex">
                        <p><span>Email:</span> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 block-9 ">
            <form action="#">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" placeholder="Your Name">
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" placeholder="Your Email">
                </div>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group mb-3">
                    <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Send Message" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>


<?php include './Layout/Footer.php' ?>