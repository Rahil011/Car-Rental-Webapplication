<?php
session_start();
include '../Layout/Header.php';

?>
<div class="conatiner">

    <div class="row mt-5 mb-4 text-center">
        <h2>Booked cars </h2>
    </div>
    <div class="row d-flex  mb-2 py-2 mx-4 shadow-lg rounded">
        <div class="col-md-12 block-9 ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Car Name</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Total Days</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                include '../include/dbconnect.php';


                $sql = "SELECT * FROM booking ORDER BY 'start_date' desc";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                $sno = 0;

                if ($num > 0) {
                  while ($rows = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;

                    echo '
                          <tr>
                          <th scope="row">' . $sno . '</th>
                          <td>' . $rows['customer_name'] . '</td>
                          <td>' . $rows['customer_id'] . '</td>
                          <td>' . $rows['car_name'] . '</td>
                          <td>' . $rows['car_model'] . '</td>
                          <td>' . $rows['start_date	'] . '</td> 
                          <td>' . $rows['total_days	'] . '</td> 
                          </tr>';
                  }
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include '../Layout/Footer.php' ?>