<?php require('homepage.php'); ?>
<?php require('db_config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Image Change</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap');

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

html, body{
    font-family: 'Roboto', sans-serif;
}

img{
    width: 100%;
    display: block;
}
.main-wrapper{
    min-height: 100vh;
    background-color: #f1f1f1;
    display: flex;
    align-items: center;
    justify-content: center;
}
.container{
    max-width: 1200px;
    padding: 0 1rem;
    margin: 0 auto;
}
.product-div{
    margin: 1rem 0;
    padding: 2rem 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    background-color: #fff;
    border-radius: 3px;
    column-gap: 10px;
}
.product-div-left{
    padding: 20px;
}
.product-div-right{
    padding: 20px;
}
.img-container img{
    width: 200px;
    margin: 0 auto;
}
.hover-container{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    margin-top: 32px;
}
.hover-container div{
    border: 2px solid rgba(252, 160, 175, 0.7);
    padding: 1rem;
    border-radius: 3px;
    margin: 0 4px 8px 4px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.active{
    border-color: rgb(255, 145, 163)!important;
}
.hover-container div:hover{
    border-color: rgb(255, 145, 163);
}
.hover-container div img{
    width: 50px;
    cursor: pointer;
}
.product-div-right span{
    display: block;
}
.product-name{
    font-size: 26px;
    margin-bottom: 22px;
    font-weight: 700;
    letter-spacing: 1px;
    opacity: 0.9;
}
.product-price{
    font-weight: 700;
    font-size: 25px;
    opacity: 0.9;
    font-weight: 500;
}

.product-description{
    font-weight: 18px;
    line-height: 1.6;
    font-weight: 300;
    opacity: 0.9;
    margin-top: 22px;
}
.btn-groups{
    margin-top: 22px;
}
.btn-groups button{
    display: inline-block;
    font-size: 16px;
    font-family: inherit;
    text-transform: uppercase;
    padding: 15px 16px;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-groups button .fas{
    margin-right: 8px;
}
.add-cart-btn{
    background-color: #FF9F00;
    border: 2px solid #FF9F00;
    margin-right: 8px;
}
.add-cart-btn:hover{
    background-color: #fff;
    color: #FF9F00;
}
.buy-now-btn{
    background-color: #000;
    border: 2px solid #000;
}
.buy-now-btn:hover{
    background-color: #fff;
    color: #000;
}

@media screen and (max-width: 992px){
    .product-div{
        grid-template-columns: 100%;
    }
    .product-div-right{
        text-align: center;
    }
    
    .product-description{
        max-width: 400px;
        margin-right: auto;
        margin-left: auto;
    }
}

@media screen and (max-width: 400px){
    .btn-groups button{
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>
<body>
<?php
    $query_house_info = "SELECT * FROM house_info"; 
    $result_house_info = mysqli_query($mysqli, $query_house_info);
    while($row_house_info = mysqli_fetch_assoc($result_house_info)) {
?>
    <div class="main-wrapper">
        <div class="container">
            <div class="product-div">
                <div class="product-div-left">
                    <div class="img-container">
                        <img src="images/w1.png" alt="watch">
                    </div>
                </div>
                <div class="product-div-right">
                    <span class="product-name"><?php echo $row_house_info['name'] ?></span>
                    <h4>Address:<br></h4>
                    <span class="product-price"><?php echo $row_house_info['address'] ?></span>
                     <h4>Available Rooms:<br></h4>
                    <span class="product-price"><?php echo $row_house_info['avail_rooms'] ?></span>
                    <h4>Details:<br></h4>
                    <span class="product-price"><?php echo $row_house_info['policy'] ?></span>
                    <h4>Price Per Month:<br></h4>
                    <span class="product-price"><?php echo $row_house_info['price'] ?></span>
                    <div class="btn-groups">
                        <button type="button" class="add-cart-btn"><a href="room.php">Back</a></button>
                        <button type="button" class="buy-now-btn"><a href="avail_room.php">View Rooms</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php   
    }
?>

    <script>
                const allHoverImages = document.querySelectorAll('.hover-container div img');
                const imgContainer = document.querySelector('.img-container');

                window.addEventListener('DOMContentLoaded', () => {
                allHoverImages[0].parentElement.classList.add('active');
                });

                allHoverImages.forEach((image) => {
                image.addEventListener('mouseover', () =>{
                imgContainer.querySelector('img').src = image.src;
                resetActiveImg();
                image.parentElement.classList.add('active');
                    });
                });

                function resetActiveImg(){
                    allHoverImages.forEach((img) => {
                        img.parentElement.classList.remove('active');
                    });
                }
    </script>
</body>
</html>
