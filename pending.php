<?php
session_start();
include 'db_config.php';
include 'insert_pending.php';
include 'links.php';
include 'homepage.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Heading -->
    <h1 class="heading text-center">MY BOOKINGS</h1>

    <div class="container">
        <div class="card-body text-center">
            <?php
            // Check connection
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: ". $mysqli->connect_error;
                exit();
            }

            // First query
            $result1 = $mysqli->query("SELECT * FROM house_info");

            // Second query
            $result2 = $mysqli->query("SELECT * FROM tenants");
            ?>

            <div class="box" style="box-shadow: 0 5px 10px rgba(0,0,0,.2); border-radius: 10px; background: #fff; text-align: center; padding: 10px; margin-bottom: 20px; max-width: 400px; margin: 0 auto;">
                <h5>Booking Info:</h5>

                <h6>House Info:</h6>
                <?php
                while ($row = $result1->fetch_assoc()) {
                    echo $row["name"]. "<br>";
                }
                ?>

                <h6>Tenants Info:</h6>
                <?php
                    while ($row = $result2->fetch_assoc()) {
                        echo "Room No: " . $row["roomno"]. "<br>";
                        echo "Full Name: " . $row["fullname"]. "<br>";
                        echo "Email: " . $row["email"]. "<br>";
                        echo "Contact Number in Case of Emergency: " . $row["contactnumberincaseofemergency"]. "<br>";
                        echo "Status: " . $row["status"]. "<br><br>";
                        echo "<button type='button' class='buy-now-btn'><a href='payment.php'>payment</a></button>";
                    }
                ?>

                
               

            <?php
            // Close connection
            $mysqli->close();
            ?>
        </div>
    </div>
</body>
</html>
