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
    

</head>
<body class="bg-light">

<?php require('homepage.php'); ?>
  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center"> CONTACT US</h2>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-4" style="margin-left: 150px;">
            <div class="bg-white rounded shadow p-4">
  <?php
                $query_system_contact = "SELECT * FROM system_contact"; 
                $result_system_contact = mysqli_query($mysqli, $query_system_contact);
                while($row_system_contact = mysqli_fetch_assoc($result_system_contact)) {
            ?>
            
            <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3878.2357319839884!2d124.2019706748527!3d13.582404786792038!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a017885c45f033%3A0x45e2876bfeed6965!2sCavinitan!5e0!3m2!1sen!2sph!4v1708448629633!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h5>Address</h5>
            <a href="https://maps.app.goo.gl/tAf6NYJKer9MnRJz8" target="_blank" class="d-inline-block text-decoration-none text-dark">
             <i class="bi bi-geo-alt-fill"></i> <?php echo $row_system_contact['address'] ?>
            </a><br>
            <h5="mt-4">Call us:</h5><br>
            <a href="tel: +639859728896" class="d-inline-block mb-2 text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i> <?php echo $row_system_contact['con1'] ?>
            </a>
            <br>
            <a href="tel: +639859728896" class="d-inline-block mb-2 text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i> <?php echo $row_system_contact['con2'] ?>
            </a>
            <h5 class="mt-4">Email:</h5>
            <a href="mailto: ask.Patangatanga@gmail.com" class="d-inline-block mb-2 text-decoration-none text-dark">
            <?php echo $row_system_contact['email'] ?>
            </a>
            <?php   
            }
            ?>
            <h5 class="mt-4"> Follow us</h5>
            <a href="#" class="d-inline-block text-dark fs-5 me-2">
                <i class="bi bi-twitter me-1"></i> 
            </a>
            <a href="#" class="d-inline-block text-dark fs-5 me-2">
                <i class="bi bi-facebook me-1"></i> 
            </a>
            <a href="#" class="d-inline-block text-dark fs-5">
                <i class="bi bi-instagram me-1"></i>
            </a>
         </div> 
       </div>
     </div>
  </div>            
       



<br><br><br> 
<br><br><br>
<br><br><br> 
<br><br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php require('footer.php'); ?>
</body>
</html>
