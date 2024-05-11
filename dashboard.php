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
<div class="my-5 px-4 col-lg-9 bg-white shadow p-4 rounded " style="margin-left: 275px;">
    <h2 class="fw-bold h-font text-center">Boarding House Reservation System</h2>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-lg-11 col-md-6 mb-5 px-4" style="margin-left: 150px;">
            <div class="bg-white rounded shadow p-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7756.445866250379!2d124.20883729732768!3d13.583187404590577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sboarding%20house%20near%20catsu!5e0!3m2!1sen!2sph!4v1710422225238!5m2!1sen!2sph" width="1100" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div> 
       </div>
     </div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col-lg-4 bg-white shadow p-4 rounded  text-center" style="margin-left: 500px;">
        <h4 class="fw-bold h-font text-center">LIST OF BOARDINGHOUSES</h4>
        </div>
    </div>
  </div>
                    <?php require('room_card.php'); ?>
                            <div class="col-md-4 text-center" style=" margin-left: 700px;"><br><br>
                            <a href="room.php" class="btn btn-primary w-100 shadow-none text-white mb-2">View More Rooms>></a>
                            </div>
<br><br><br> 
<br><br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php require('footer.php'); ?>
</body>
</html>
