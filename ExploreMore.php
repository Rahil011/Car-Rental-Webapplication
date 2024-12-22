<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include './Layout/Header.php';
} else {
    include './Layout/GuestHeader.php';
}

include './include/dbconnect.php';

// Query to fetch car details
$sql = "SELECT * FROM available_car ORDER BY V_Rent asc";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);


?>

<main>
    <section class="section featured-car" id="featured-car">
        <div class="container">
            <h2 class="text-center py-3">Cars On Rent</h2>
            <ul class="featured-car-list">
                <?php
                if ($num > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = strtoupper($row['V_Name']);
                        $model = strtoupper($row['V_Model']);
                        $number = strtoupper($row['V_Number']);
                        $rent = strtoupper($row['V_Rent']);
                        $capacity = strtoupper($row['V_Seat_Cap']);
                        $image = "#"; 
                        ?>
                        <li>
                            <div class="featured-car-card">
                                <div class="card-content ">
                                    <div class="card-title-wrapper ">
                                        <h3 class="h3 card-title"><?php echo $name; ?></h3>
                                    </div>
                                    <ul class="card-list">
                                        <li class="card-list-item">
                                        <span>People Capacity:</span>
                                            <span class="card-item-text"><?php echo $capacity; ?> </span>
                                        </li>
                                        <li class="card-list-item">
                                        <span>Model:</span>
                                            <span class="card-item-text"><?php echo $model; ?></span>
                                        </li>
                                        <li class="card-list-item">
                                            <span>Number:</span>
                                            <span class="card-item-text"><?php echo $number; ?></span>
                                        </li>
                                    </ul>
                                    <div class="card-price-wrapper mt-3">
                                        <p class="card-price">
                                            <strong>Rs.<?php echo $rent; ?></strong> / day
                                        </p>
                                        <a href="./Customer/Rent_car.php?id=<?php $id = $row['V_Id']; echo $id; ?>" class="btn btn-primary">Rent now</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                } else {
                    echo "<h2>No cars available for rent.</h2>";
                }
                ?>
            </ul>
        </div>
    </section>
</main>

<?php include './Layout/Footer.php' ?>