<?php require('homepage.php'); ?>
<?php require('db_config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration form</title>
    <link rel="stylesheet" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Center the form horizontally and vertically */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh; /* Make the container fill the entire viewport height */
        }

        .form-box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            width: 100%;
        }

        /* Style for the button */
        .invoice-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            max-width: 150px;
        }

        /* Hover effect */
        .invoice-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-box"> <!-- Form box starts here -->
        <div class="title">Payment Method</div><br>
        <ul class="social-icons">
            <?php
            $query_payment_info = "SELECT * FROM payment_info"; 
            $result_payment_info = mysqli_query($mysqli, $query_payment_info);
            while($row_payment_info = mysqli_fetch_assoc($result_payment_info)) {
            ?>  
            <h4>For payment method, you can contact this owner</h4>
            <li><a href="<?php echo $row_payment_info['fb'] ?>"><i class="fab fa-facebook-f" style="font-size: 36px;"></i></a></li>
            <li><a href="tel:<?php echo $row_payment_info['con'] ?>"><i class="fas fa-phone-alt" style="font-size: 36px;"><?php echo $row_payment_info['con'] ?></i></a></li>
            <li><a href="mailto:<?php echo $row_payment_info['gmail'] ?>"><i class="far fa-envelope" style="font-size: 36px;"><?php echo $row_payment_info['gmail'] ?></i></a></li>
            <?php   
            }
            ?>
        </ul>
        <div onclick="goBack()" class="invoice-button">
            See Invoice
        </div>
    </div> <!-- Form box ends here -->
</div>

<script>
    function goBack() {
        window.location.href = "pending.php";
    }
</script>

</body>
</html>
