<?php


// Include database connection
$hname = 'localhost';
$uname = 'root';
$pass = '';
$db = 'bhwebsites';

$mysqli = new mysqli($hname, $uname, $pass, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

function filteration($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = htmlspecialchars(strip_tags(stripcslashes(trim($value))));
    }
    return $data;
}

function select($sql, $values, $datatypes)
{
    global $mysqli;
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param($datatypes, ...$values);
        if ($stmt->execute()) {
            $res = $stmt->get_result();
            $stmt->close();
            return $res;
        } else {
            $stmt->close();
            die("Query cannot be executed - select");
        }
    } else {
        die("Query cannot be prepared - select");
    }
}

if (isset($_POST ['register'])){
    // Retrieve form data
    $First_Name = $_POST['firstname'];
    $Last_Name = $_POST['lastname'];
    $MI = $_POST['MI']; // changed from 'MI' to 'MI' to match the form field name
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $Contact = $_POST['contact'];

    $select = "SELECT * FROM `tenant` where email = '$email'";
    $result = mysqli_query($mysqli, $select);

    if( mysqli_num_rows($result) > 0){  
        echo '<script type="text/javascript">';
        echo 'alert("Email already Taken!");';
        echo 'window.location.href = "room_register.php";';
        echo '</script>';
    }else{
        $register = "INSERT INTO `tenant` (lastname, firstname, MI, email, address, contact, status) VALUES ('$Last_Name', '$First_Name', '$MI', '$Email', '$Address', '$Contact', 'pending')";
        mysqli_query($mysqli, $register);
        echo '<script type="text/javascript">';
        echo 'alert("Your account is now pending for approval!");';
        echo 'window.location.href = "pending.php";';
        echo '</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration form</title>
    <link rel="stylesheet" href="css/registration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="title">Registration</div>
    <form action="#" method="POST">
        <div class="user-details">
            <div class="input-box">
                <label>Last Name</label>
                <input type="text" pattern="[a-zA-Z]+$" title="PLEASE ENTER LETTERS ONLY" name="lastname" id="lastname" placeholder="Enter your Last Name" required>
            </div>
            <div class="input-box">
                <label>First Name</label> 
                <input type="text" pattern="[a-zA-Z]+$" title="PLEASE ENTER LETTERS ONLY" name="firstname" id="firstname" placeholder="Enter your First Name" required>
            </div>
            <div class="input-box">
                <label>Middle Name</label>
                <input type="text" pattern="[a-zA-Z]+$" title="PLEASE ENTER LETTERS ONLY" name="MI" id="MI" placeholder="Enter your M.I" required>
            </div>
            <div class="input-box">
                <label>Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your Email" required>
            </div>
            <div class="input-box">
                <label>Address</label>
                <input type="text" name="address" id="address" placeholder="Enter your Address" required> 
            </div>
            <div class="input-box">
                <label>Contact number incase of emergency</label>
                <input type="text" name="contact" id="contact" placeholder="Enter your contact number" required>
            </div>
        </div>
        <div class="button">
            <input type="submit" name="register" value="Submit">
        </div>
    </form>
</div>
</body>
</html>
