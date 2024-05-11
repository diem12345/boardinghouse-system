<?php

// Database connection parameters
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'bhwebsites';

// Create a new MySQLi object for database connection
$mysqli = new mysqli($hname, $uname, $pass, $db);

// Check if connection failed
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to filter data
function filteration($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = htmlspecialchars(strip_tags(stripslashes(trim($value))));
    }
    return $data;
}

// Check if registration form is submitted
if (isset($_POST['register'])) {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $roomno = $_POST['roomno'];
    $contactnumberincaseofemergency = $_POST['contactnumberincaseofemergency'];

    // Check if email already exists in the database
    $select = "SELECT * FROM `tenants` WHERE email = ?";
    $stmt = $mysqli->prepare($select);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // If email already exists, show alert
    if ($result->num_rows > 0) {  
        echo '<script type="text/javascript">';
        echo 'alert("Email already Taken!");';
        echo 'window.location.href = "exam.php";';
        echo '</script>';
    } else {
        // Insert new tenant into the database
        $insert = "INSERT INTO `tenants` (fullname, email, roomno, contactnumberincaseofemergency, status) VALUES (?, ?, ?, ?, 'pending')";
        $stmt = $mysqli->prepare($insert);
        $stmt->bind_param("ssss", $fullname, $email, $roomno, $contactnumberincaseofemergency);
        
        // If insertion is successful, show success alert
        if ($stmt->execute()) {
            echo '<script type="text/javascript">';
            echo 'alert("Your account is now pending for approval!");';
            echo 'window.location.href = "payment.php";';
            echo '</script>';
        } else {
            // If an error occurs during insertion, display the error
            echo "Error: " . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php require_once('homepage.php');?>
</head>
<body>
<div class="container">
    <!-- Heading -->
    <h1 class="heading" style="text-align: center;">ROOMS</h1>
        
    <?php
        // Query database for available rooms
        $query_avail_rooms = "SELECT * FROM avail_rooms"; 
        $result_avail_rooms = $mysqli->query($query_avail_rooms);
        
        // Loop through available rooms
        while($row_avail_rooms = $result_avail_rooms->fetch_assoc()) {
    ?>
    <div class="box-container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        <!-- Room details -->
        <div class="box" style="box-shadow: 0 5px 10px rgba(0,0,0,.2); border-radius: 10px; background: #fff; text-align: center; padding: 20px; max-width: 300px;">
            <img src="img\<?php echo $row_avail_rooms['image']; ?>" alt="Boardinghouse images" style="width: 200px;">
            <h3>ROOM <?php echo $row_avail_rooms['room_number'] ?></h3>
            <p><?php echo $row_avail_rooms['detail'] ?></p>
            <p><?php echo $row_avail_rooms['price'] ?></p>
            
            <!-- Check if room is occupied -->
            <?php
                // Query database for tenants in the current room
                $query_tenants = "SELECT * FROM tenants WHERE roomno = ?";
                $stmt = $mysqli->prepare($query_tenants);
                $stmt->bind_param("s", $row_avail_rooms['room_number']);
                $stmt->execute();
                $result_tenants = $stmt->get_result();

                // Display tenant's status
                while ($row_tenants = $result_tenants->fetch_assoc()) {
                    echo "<p>Status: " . $row_tenants['status'] . "</p>";
                }
            ?>
            
            <!-- Contact button -->
            <div id="contact">
                <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#contact-modal-<?php echo $row_avail_rooms['room_number'] ?>" style="background-color: #17a2b8; color: #fff; border: none; border-radius: 5px; padding: 10px 20px; cursor: pointer;">Show Contact Form</button>
            </div>
        </div>

        <!-- Contact modal -->
        <div id="contact-modal-<?php echo $row_avail_rooms['room_number'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Contact Form</h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="container">
                        <!-- Contact form -->
                        <form action="#" method="POST" style="max-width: 400px; margin: auto; padding: 20px; background-color: #f9f9f9; border-radius: 10px;">
                            <div style="margin-bottom: 20px;">
                                <!-- Form fields -->
                                <div style="margin-bottom: 15px;">
                                    <label for="fullname" style="display: block; margin-bottom: 5px;">Fullname</label>
                                    <input type="text" name="fullname" id="fullname" pattern="[a-zA-Z]+$" title="PLEASE ENTER LETTERS ONLY" placeholder="Enter your Full Name" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Enter your Email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label for="roomno" style="display: block; margin-bottom: 5px;">Room no.</label>
                                    <input type="text" name="roomno" id="roomno" placeholder="Room number" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label for="contactnumberincaseofemergency" style="display: block; margin-bottom: 5px;">Contact number incase of emergency</label>
                                    <input type="text" name="contactnumberincaseofemergency" id="contactnumberincaseofemergency" placeholder="Enter your Contact number" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                                </div>
                            </div>
                            <div>
                                <!-- Submit button -->
                                <input type="submit" name="register" value="Submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>

<!-- JavaScript libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Custom JavaScript for form submission -->
<script>
    $(document).ready(function(){
        $('.submit-form').click(function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            var formData = form.serialize();
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                success: function(response){
                    // Handle success response here
                    alert('Form submitted successfully!');
                    form[0].reset(); // Reset form fields
                    form.closest('.modal').modal('hide'); // Hide modal
                },
                error: function(xhr, status, error){
                    // Handle error response here
                    alert('Error occurred while submitting form.');
                }
            });
        });
    });
</script>
</body>
</html>
