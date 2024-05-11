<?php
require('db_config.php'); 
?>
<div class="container-border-box bg-grey mt-4">
    <div class="row">
        <div class="col-lg-9 p-1 text-center" >
            <h3 class="h-font fw-bold fs-6 mb-1 text-center">Boarding House System</h3>
                        <?php
                        $query_system_foot = "SELECT * FROM system_foot"; 
                        $result_system_foot = mysqli_query($mysqli, $query_system_foot);
                        while($row_system_foot = mysqli_fetch_assoc($result_system_foot)) {
                            ?>
                                            <h10><?php echo $row_system_foot['footer'] ?></h10>
                            <?php   
                        }
                        ?>
        </div>
        <div class="col-lg-3 p-1">
              <h5 class="mb-8">Links</h5>
              <a href="dashboard.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a> <br>
              <a href="room.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a> <br>
              <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a> <br>
              <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a> <br>
          </div>

    </div>
</div>
<br><br><br> 
<br><br><br>