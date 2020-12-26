<?php
    // session_start();
    include 'dbconnect.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">    
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- Font awesome icons -->
        <!-- <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
        <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet"> -->

        <title>Expense Tracker</title>
    </head> 
    <style>
        *{
            margin: 0;
            padding: 0;
            user-select: none;
            box-sizing: border-box;
            font-family: 'Poppins' , sans-serif;
            color: white;
        }
        .navbar{
            height: 80px;
            width: 100%;
            margin: 0px !important;
            padding: 0px !important;
        }
        .navbar .left{
            background-color: dodgerblue;
            width: 90%;
            height: 80px;
            font-size: 25px;
            padding: 17px 35px;
        }
        .navbar .right{
            height: 80px;
            background-color: tomato;
            width: 10%;
            padding: 23px 21px;
            text-decoration: none;
            color: white;
        }
        .navbar .right:hover{
            background-color: rgb(241, 89, 62);
        }
        .navbar .right span{
            display:flex;
        }
        .navbar .right a:hover{
            text-decoration: none;
        }
        .help{
            font-size: 15px;
        }
        a{
            text-decoration:none !important;
        }
        .rate{
            padding-left:51px;
        }
    </style>
    <body>      
        <nav class="navbar">
            <div class="left text-dark">
                <div class="row">
                    <div class=" pr-3">
                        <img src="images/img5.png" width="50px" height="50px" alt="">
                    </div>
        
                    <div class="col-10 pt-1">
                        <p class="text-white">Expense Tracker</p>
                    </div>
                    <div class="pt-1 rate">
                        <a href="email.php" class="text-light help">Give Feedback</a>
                    </div>
                </div>
            </div>
            <div class="right">
                <span>
                    <i class="fas fa-sign-out-alt icons py-1 px-2"></i>
                    <a href="logout.php" class="text-white text-center px-1">Logout</a>
                </span>
            </div>
        </nav>
    </body>
</html>