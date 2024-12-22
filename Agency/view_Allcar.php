<?php
session_start();
include '../Layout/Header.php';
$data_del = false;
?>
<div class="conatiner">
<?php
    if ($data_del) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success!</strong> You record has been deleted sucessfully.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }

    ?>
    <div class="row mt-5 mb-4 text-center">
        <h2>Available cars </h2>
    </div>
    <div class="row d-flex  mb-2 py-2 mx-4 shadow-lg rounded">
        <div class="col-md-12 block-9 ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Vehicle Name</th>
                        <th scope="col">Vehicle Model</th>
                        <th scope="col">Vehicle Number</th>
                        <th scope="col">Seating Capacity</th>
                        <th scope="col">Rent</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include '../include/dbconnect.php';

                if (isset($_POST['delbtn'])) {
                    $id_to_del = $_POST['idDelete'];
                    $query_to_del = "DELETE FROM `available_car` WHERE `available_car`.`V_Id` = $id_to_del";
          
                    $result_del = mysqli_query($conn, $query_to_del);
                    if ($result_del) {
                        $data_del = true;
                     
                    } else {
                      echo 'error';
                    }
                  }

                $sql = "SELECT * FROM available_car ORDER BY V_Rent desc";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                $sno = 0;

                if ($num > 0) {
                  while ($rows = mysqli_fetch_assoc($result)) {
                    $sno = $sno + 1;

                    echo '
                          <tr>
                          <th scope="row">' . $sno . '</th>
                          <td>' . $rows['V_Name'] . '</td>
                          <td>' . $rows['V_Model'] . '</td>
                          <td>' . $rows['V_Number'] . '</td>
                          <td>' . $rows['V_Seat_Cap'] . '</td>
                          <td>' . $rows['V_Rent'] . '</td> 
                          <td>
                          <form method="POST" class="mb-3">
                         <input type="hidden" name="idDelete" value="'.$rows['V_Id'] .' " />
                         <input type="submit" name="delbtn" value = "DELETE"  class="btn btn-danger" />
                         </form>
                          </td>
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