<?php
    include 'dbconnect.php';
    // session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Font awesome icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">    
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
        <title>Sidebar</title>
    </head> 
    <style>
        *{
            margin: 0;
            padding: 0;
            user-select: none;
            box-sizing: border-box;
            font-family: 'Ubuntu', sans-serif;;
            /* color:  rgb(63, 63, 63); */
        }      
        .sidebar{
            /* position: absolute; */
            width: 250px;
            height: 800px;
            left: -250px;
            background-color: rgb(238, 236, 237);         
            /* background-color: black;   */
            transition: left 0.4 ease;
        }
        .sidebar.show{
            left: 0px;
        }
        .sidebar .text{
            font-size: 25px;
            font-weight: 600;
            line-height: 65px;
            text-align: center;
            background-color:  rgb(238, 236, 237);
            letter-spacing: 1px;
        }
        
        nav ul li div{
            position: relative;
            padding-left: 20px;
            text-decoration: none;
            list-style: none;
            line-height: 70px;
            font-weight: 550;
            display: block;
            border-left: 3px solid transparent;
        }
        nav ul li div a {
            color: #347897;
        }
        nav ul li div a span{
            color:  #347897;
        }
        nav ul li div i{
            padding: 10px 20px;
            color: #347897;
        }
        .avatar {

            /* vertical-align: middle; */
            width: 50px;
            height: 60px;
            border-radius: 50%;
            padding-left: 1px;
            /* padding-top:10px; */
        }
        nav ul li #item {
            display: flex;
            background-color:  rgb(224, 220, 220);
            padding: 10px 10px;
        }
        nav ul li #item:hover{
            /* position: absolute; */
            border-left: none;
        }
        nav ul li #item img{
            margin-left: 6px;
            margin-right: 26px;
        }
        nav ul li #item h3{
            color: #347897;
            padding-top: 10px;
        }
        nav ul li a:hover{
            color: #347897;
            text-decoration: none;
            border-left-color: #347897;
        }
        nav ul li:hover div{
            background-color: rgb(224, 220, 220);
            text-decoration: none;
            list-style: none;
            border-left-color: #347897;   
        }
        nav ul li ul{
            /* position: static; */
            display:  none;
            padding-left: 40px;
            text-decoration: none;
            list-style: none;
            color: #347897;
        }
        nav ul li ul i{
            color: #347897;
        }
        nav ul li ul a:visited{
            color: #347897;
        }
        nav ul li ul div{
            display: block;
            padding: 10px;
        }
        nav ul .cate-show.show {
            display: block;
        }
        nav ul .inc-show.show1 {
            display: block;
        }
        nav ul .exp-show.show2 {
            display: block;
        }
        nav ul ul li{
            position: relative;
            border-bottom: none;
            padding: 2px 30px 2px 30px;
            color:  #347897;
        }
        nav ul ul li a{
            line-height: 40px !important;
            padding-left: 10px;
        }
        nav ul li:hover ul li a{
            color:  #347897;
            border-left-color: transparent ;
        }
        
        nav ul li ul li a:hover{
            color:  #347897;
            text-decoration: none;
            list-style: none;
        }
        nav ul li div a span{
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 22px;
            transition: left 0.4 ease;
        }
        nav ul li a span.rotate{
            transform: translateY(-50%) rotate(-180deg);
        }
        .email{
            border-left:none;
        }
        h4{
            color:#347897;
            padding-top:5px;
        }
    </style>
    <body>      
        <nav class="sidebar bg-text">
            <!-- <div class="text">Side Menu</div> -->
            <ul>
                <li>
                    <div id="item">
                        <img src="images/user.svg" alt="Avatar" class="avatar">
                        <h5 class="text-secondary pt-2">
                        <?php 
                            echo $_SESSION['firstname'].'&nbsp;'.$_SESSION['lastname'];
                            
                            echo '<div class="h4 email py-1" style="color:grey;font-weight:100; font-size:10px;padding:0;">'.$_SESSION['email'].'</div>';
                        ?>
                        </h5>
                    </div>
                </li>
                <li>
                    <div>
                        <i class="fas fa-user"></i>
                        <a href="profile.php" class="dash-btn">Profile</a>
                    </div>
                </li>
                <li>
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                        <a href="dashboard.php" class="dash-btn">Dashboard</a>
                    </div>
                </li>
                <!-- <li>
                    <div>
                        <i class="fas fa-bars"></i>
                        <a href="#" class="cate-btn">Category
                            <span class="fas fa-caret-down first"></span>
                        </a>
                    </div>  
                    <ul class="cate-show">
                        <li>
                            <i class="fab fa-buffer"></i>
                            <a href="#">Add Category</a>
                        </li>
                        <li>
                            <i class="far fa-copyright"></i>
                            <a href="#">View Category</a>
                        </li>
                    </ul>                 
                </li> -->
                <li>
                    <div>
                        <i class="fas fa-bowling-ball"></i>
                        <a href="#" class="inc-btn">Income
                            <span class="fas fa-caret-down second"></span>
                        </a>
                    </div>
                    <ul class="inc-show">
                        <li>
                            <i class="fas fa-equals"></i>   
                            <a href="add-income.php">Add Income</a>
                        </li>
                        <li>
                            <i class="fas fa-eye show_income"></i>
                            <a href="view-income.php">View Income</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <div>
                        <i class="fas fa-reply"></i>
                        <a href="#" class="exp-btn">Expenses
                            <span class="fas fa-caret-down third"></span>
                        </a>
                    </div>
                    <ul class="exp-show">
                        <li>
                            <i class="fas fa-equals"></i> 
                            <a href="add-expense.php">Add Expenses</a>
                        </li>
                        <li>
                            <i class="fas fa-eye show_income"></i>
                            <a href="view-expense.php">View Expense</a>
                        </li>
                        
                    </ul>
                </li>

                <li>
                    <div>
                        <i class="fas fa-sign-out-alt icons"></i>
                        <a href="logout.php" class="log-btn">Logout</a>
                    </div>
                </li>
                <li>
                    <div>
                        <i class="far fa-trash-alt"></i>
                        <a href="delete.php" class="del-btn">Delete Account</a>
                    </div>
                </li>
            </ul>
        </nav>
        
        <script>
            $('.cate-btn').click(function(){
                $(this).toggleClass("click");
                $('nav ul  .cate-show').toggleClass("show");
                $('nav ul .first').toggleClass("rotate");
            });
            $('.inc-btn').click(function(){
                $('nav ul .inc-show').toggleClass("show1");
                $('nav ul .second').toggleClass("rotate");
            });
            $('.exp-btn').click(function(){
                $('nav ul .exp-show').toggleClass("show2");
                $('nav ul .third').toggleClass("rotate");
            });
            $('.nav ul li').click(function(){
                $(this).addClass("active").siblings.removeClass("active");
            });
            $('.nav ul li').click(function(){
                $(this).addClass("active").siblings.removeClass("active");
            });
        </script>
        
    </body>
</html>