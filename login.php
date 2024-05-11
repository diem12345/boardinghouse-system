<?php
    session_start();

    include("db_config.php");

    if(isset($_POST['email']) && isset($_POST['password'])) // Check if email and password are set
    {
        $Email = $_POST['email'];
        $Password = $_POST['password'];

        if(!empty($Email) && !empty($Password) && filter_var($Email, FILTER_VALIDATE_EMAIL))
        {
            $query = "SELECT * FROM form WHERE email = '$Email' LIMIT 1";
            $result = mysqli_query($mysqli, $query);

            if ($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $Password)
                {
                    header("location: dashboard.php");
                    exit;
                }
                else {
                    echo "<script type='text/javascript'>alert('mali man password mo bosss');</script>";
                }
            }
            else {
                echo "<script type='text/javascript'>alert('User not found');</script>";
            }
        }
        else {
            echo "<script type='text/javascript'>alert('Please fill all fields correctly');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title> Login Page </title>
</head>

<body>
    

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Create Account</h1>
                <button> <a href="registration.php">Create an Account</a></button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="#" method="POST">
                <h1>Sign In</h1>
                <input type="email" placeholder="Email" required name="email">
                <input type="password" placeholder="Password"  name="password">
                <a href="#">Forget Your Password?</a>
                <button>LOGIN</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Create an Account</h1>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="css/script.js"></script>
</body>

</html>