<?php
include 'db_config.php';

if(isset($_POST['email'])){
    $email = $_POST['email'];

    $stmt = mysqli_prepare($mysqli, "SELECT * FROM tenants WHERE email = ?");
    if ($stmt) {

    mysqli_stmt_bind_param($stmt, "s", $email);
    
    mysqli_stmt_execute($stmt);
 
    $result = mysqli_stmt_get_result($stmt);
   
    $row = mysqli_fetch_array($result);
   
    mysqli_stmt_close($stmt);


    if($row){
        $status = $row['status'];

        $_SESSION["status"] = $status;
        $_SESSION["$email"] = $row['email'];

        if($status =="approved"){
            echo '<script type="text/javascript">';
            echo 'alert("ROOM has been SUCCESSFULLY RESERVE!");';
            echo 'window.location.href = "dashboard.php";';
            echo '</script>';
        }elseif($status == "pending"){
            echo '<script type="text/javascript">';
            echo 'alert("Your account is still pending for approval!");';
            echo 'window.location.href = "pending.php";';
            echo '</script>';
        }else{
            echo "Your account has been denied!";
        }
    }
}
}
?>
