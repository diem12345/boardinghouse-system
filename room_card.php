<?php
    require_once('db_config.php');
?>
<Style>
        *{
            margin:0px;
            padding:0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        .card-container{
            display: flex;
            justify-content:center;
            flex-wrap: wrap;
            gap:25px;
            margin-top: 100px;
        }
        .card{
            width:325px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0px 2px 4px rgba(0,0,0,0.3);
            overflow: hidden;
            transform: transform 0.6s ease;
        }
        .card:hover{
            transform: translateY(-20px);
        }
        .card img{
            width:100%;
            height: auto;
            object-fit: cover;
        }
        .card-content{
            padding:20px;
        }
        .card-content h1{
            font-size: 24px;
            margin-bottom: 10px;
        }
        .card-content p{
            font-size: 15px;
            color:#666;
            margin-bottom: 20px;
        }
        .card-button{
            display: inline-block;
            background-color: #3498db;
            color:#fff;
            text-decoration: none;
            border-radius: 5px;
            padding: 8px 16px;
        }

    </Style>

<body>
                        <?php
                        $query_house_info = "SELECT * FROM house_info"; 
                        $result_house_info = mysqli_query($mysqli, $query_house_info);
                        while($row_house_info = mysqli_fetch_assoc($result_house_info)) {
                            ?>
                                 <div class=" card-container">
                                    <div class="card">
                                    <img src="image/boardinghouse.jpg">
                                        <div class="card-content">
                                            <h1><?php echo $row_house_info['name'] ?></h1>
                                            <a href="view.php" class="card-button">View Details</a>
                                            <a href="avail_room.php" class="card-button">View Rooms</a>
                                        </div>
                                    </div>
                                </div>
                            <?php   
                        }
                        ?>
                      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>