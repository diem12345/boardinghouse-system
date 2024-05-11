<?php
require('db_config.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Booking Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style1.css">  
    <?php require_once('homepage.php');?>
    

</head>
<body class="bg-light">
<style>
    .box{
        border-top-color: var(--teal) !important;
    }
</style>

  <div class="my-5 px-4 ">
    <div class="row">
      <div class="text-center" >
            <h2 class="fw-bold h-font text-center"> ABOUT US</h2>

            <?php
                $query_system_about = "SELECT * FROM system_about"; 
                $result_system_about = mysqli_query($mysqli, $query_system_about);
                while($row_system_about = mysqli_fetch_assoc($result_system_about)) {
            ?>
                <p text-center><?php echo $row_system_about['about_us'] ?></p>
            <?php   
            }
            ?>
        </div>
      </div>
  </div> 
  <h3 class="my-5 fw-bold h-font text-center">PATANGA TANGA INC.</h3>
    
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6 mb-6 =x-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="image/bas.jpg" width="80%">
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 =x-4">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
                <img src="image/dan.jpg" width="80%">
            </div>
        </div>
    </div>
 </div>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-2 mb-4 =x-3 ">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="image/ki.jpg" width="80%">
            </div>
        </div>
        <div class="col-lg-3 col-md-2 mb-4 =x-3 ">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="image/jef.jpg" width="80%">
            </div>
        </div>
        <div class="col-lg-3 col-md-2 mb-4 =x-3 ">
            <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
            <img src="image/james.jpg" width="80%">
            </div>
        </div>
    </div>
</div>

<?php require('footer.php'); ?>
</body>





