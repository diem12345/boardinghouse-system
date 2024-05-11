<?php
session_start();

include("db_config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $Fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $Email = isset($_POST['email']) ? $_POST['email'] : '';
    $Address = isset($_POST['address']) ? $_POST['address'] : '';
    $Contact_number = isset($_POST['contactnumber']) ? $_POST['contactnumber'] : '';
    $Password = isset($_POST['password']) ? $_POST['password'] : '';
    $Confirmpassword = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';
    $Gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $Student_Status = isset($_POST['studentstatus']) ? $_POST['studentstatus'] : '';

    if (!empty($Email) && !empty($Password) && filter_var($Email, FILTER_VALIDATE_EMAIL)) {

        if ($Password !== $Confirmpassword) {
            echo "<script type='text/javascript'>alert('Password and Confirm Password do not match');</script>";
            echo "<script>window.location.href='registration.php';</script>"; 
            exit;
        }

        $check_stmt = $mysqli->prepare("SELECT email FROM form WHERE email = ?");
        $check_stmt->bind_param("s", $Email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            
            echo "<script>alert('This account is already registered. Please choose a different email.');</script>";
        }
       
        else {
          
            $stmt = $mysqli->prepare("INSERT INTO form (fullname, email, address, contactnumber, password, confirmpassword, gender, studentstatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("ssssssss", $Fullname, $Email, $Address, $Contact_number, $Password, $Confirmpassword, $Gender, $Student_Status);
            if ($stmt->execute()) {

                header("Location: login.php");
                exit;
            } else {

                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }
            $stmt->close();
        }

        $check_stmt->close();
    } else {

        echo "<script>alert('Please Enter valid Email and Password');</script>";
    }
}

mysqli_close($mysqli);
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
                <label>Full Name</label>
                <input type="text" pattern="[a-zA-Z\s\-]+$" title="PLEASE ENTER LETTERS ONLY" name="fullname" id="fullname" placeholder="Last name - First name - M.I - Exts" required>
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
                <label>Contact number</label>
                <input type="number" name="contactnumber" id="contactnumber" placeholder="Enter your Contact number" required>
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="input-box">
                <label> Confirm Password</label>
                <input type="password" name="confirmpassword" id="confirmpassword" placeholder=" Confirm Password" required>
            </div>
            <div class="gender-details">
                <span class="gender-title">Gender</span>
                <div class="category">
                    <input type="radio" id="male" name="gender" value="male">
                        <label for="male">
                        <span class="dot one"></span>
                        <span class="Gender">Male</span>
                        </label>
                     <input type="radio" id="female" name="gender" value="female">
                    <label for="female">
                        <span class="dot one"></span>
                        <span class="Gender">Female</span>
                    </label>
                    <input type="radio" id="prefernottosay" name="gender" value="prefernottosay">
                    <label for="prefernottosay">
                        <span class="dot one"></span>
                        <span class="Gender">Prefer Not To Say</span>
                    </label>
                </div>
            </div>
            <div class="student-details">
                <span class="student-title">Student Status</span>
                <div class="category">
                    <input type="radio" id="studentstatus" name="studentstatus" value="student">
                    <label for="student">
                        <span class="dot one"></span>
                        <span class="Gender">Student</span>
                    </label>
                     <input type="radio" id="notstudent" name="studentstatus" value="notstudent">
                    <label for="notstudent">
                        <span class="dot one"></span>
                        <span class="Gender">Not a student</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="button">
            <input type="submit" value="Register">
        </div>
    </form>
</div>
</body>
</html>
