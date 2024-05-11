<?php
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $page = $components[2];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style1.css">
    <title>Online Booking Website</title>
</head>

<body>
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-code-alt'></i>
            <div class="logo-name"><span>BHSYSTEM</span></div>
        </a>
        <ul class="side-menu">
            <li class="<?php if($page == 'dashboard.php') echo 'active'; ?>"><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Homepage</a></li>
            <li class="<?php if($page == 'room.php') echo 'active'; ?>"><a href="room.php"><i class='bx bxs-bed'></i>Boarding Houses</a></li>
            <li class="<?php if($page == 'about.php') echo 'active'; ?>"><a href="about.php"><i class='bx bx-analyse'></i>About Us</a></li>
            <li class="<?php if($page == 'contact.php') echo 'active'; ?>"><a href="contact.php"><i class='bx bx-phone'></i>Contact Us</a></li>
        </ul>
        <ul class="side-menu">
        <li>
                <a href="pending.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    My Bookings
                </a>
            </li>
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>

        </ul>
       
    </div>
    <div class="content">
        <nav>
            <i class='bx bx-menu'></i>
            <form action="">
                <div class="form-input">
                    <input type="search" placeholder="Search.....">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <a href="#" class="profile">
                <img src="image/image2.png">
            </a>
        </nav>
    </div>

    <script src="css/index.js"></script>
</body>
</html>
