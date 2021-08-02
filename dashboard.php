<?php
    include 'dbconnect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Font awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Dashboard</title>
    <style>
        html,body {
            height: 100%;
            min-height: 100% !important;
        }
        .page{
            display: flex;
            width:100%;
        }
        .sidebar{
            width: 250px !important;
            margin-right:10px;
        }
        h1{
            color: #347897;
            margin: 15px;
        }
        .dashboard{
            display:flex;
            flex-direction:column;
        }
        .dashboard .w-100{
            display:flex;
        }
        .w-100 .w-25{
            height:200px;
            width:240px !important;
            background-color:black;  
            margin: 25px;
            margin-top: 30px;
            color: white;
            padding: 20px;
        }
        .w-100 .w-25 i{
            font-size: 50px;
        }
        .w-100 .w-25 .current{
            display: block;
            padding-top: 30px;
            font-size: 20px;
        }
        .w-100 .w-25 .current i{
            font-size: 20px;
        }
        .w-100 .w-25:nth-child(odd){
            background-color: rgb(235, 114, 114);
            border: 1px solid rgb(235, 114, 114);
        }
        .w-100 .w-25:nth-child(even){
            background-color: rgb(57, 185, 89);
        }
        .balancebtn{
            width: 180px;
            margin-top: 30px;
            margin-left: 52px;
        }
        .header{
            position: relative;
        }
        .alert{
            width:350px;
            position: fixed !important;
            top: 107px;
            left: 849px;
        }
        .close{
            color:black !important;
        }

        /* table-1 */
        .dashboard .table-1{
            color: black;
            border: 1px solid rgb(235, 114, 114);
            height: 300px;
            width: 531px;
            margin: 40px !important;
            table-layout: auto;
            /* width: auto; */
            height: auto;
        }
        .dashboard .table-header1{
            background-color:  rgb(235, 114, 114);
        }
        .dashboard .table-1 .table tr{
            background-color: rgb(235, 114, 114);
        }
        /* table-2 */
        .dashboard .table-2{
            color: black;
            color: black;
            border: 1px solid rgb(57, 185, 89);
            height: 300px;
            width: 531px;
            margin: 41px !important;
            margin-left: 8px !important;
            table-layout: auto;
            /* width: auto; */
            height: auto;

        }
        .dashboard .table-header2{
            background-color: rgb(57, 185, 89);
        }
        .dashboard .table-2 .table tr{
            background-color: rgb(57, 185, 89);
        }

         .dashboard .th{
            color: black;
            background-color: rgb(212, 78, 156);
            border: none !important;
        }
        .dashboard .td{
            color: gray;
        }
    </style>
</head>
<body>
    <?php
        include 'nav.php';
    ?>
    <div class="page bg-light">
        <div class="sidebar">
            <?php
                include 'sidebar.php';
            ?>
        </div>
        <?php
            $em = $_SESSION['email'];
            $GetIncome 	 = "SELECT SUM(amount) FROM `income` WHERE MONTH(date) = MONTH(CURRENT_DATE) AND email='$em'";    
            $result = mysqli_query($conn, $GetIncome);
            if($row = mysqli_fetch_array($result)){
                $cmi = $row['SUM(amount)'];
            }

            $GetExpense 	 = "SELECT SUM(amount) FROM `expense` WHERE MONTH(date) = MONTH(CURRENT_DATE) AND email='$em'";    
            $result = mysqli_query($conn, $GetExpense);
            if($row = mysqli_fetch_array($result)){
                $cme = $row['SUM(amount)'];
            }

            $GetAllExpense 	 = "SELECT SUM(amount) FROM `expense` WHERE email='$em'";    
            $result = mysqli_query($conn, $GetAllExpense);
            if($row = mysqli_fetch_array($result)){
                $getallexp = $row['SUM(amount)'];
            }

            $GetAllIncome 	 = "SELECT SUM(amount) FROM `income` WHERE email='$em'";    
            $result = mysqli_query($conn, $GetAllIncome);
            if($row = mysqli_fetch_array($result)){
                $getallinc = $row['SUM(amount)'];
            }
        ?>
        <div class="dashboard">
            <div class="pl-2 header w-100">
                <h1 class="mt-3 w-75">Dashboard</h1>
                <form action="dashboard.php" method="post">
                    <button type="submit" class="btn btn-warning balancebtn" name="balancebtn">View total balance</button>
                </form>
                
            </div>
            <?php
                if(isset($_POST['balancebtn'])){
                    $value = $cmi - $cme;
                    echo '<div class="alert alert-warning alert-dismissible fade show text-dark" role="alert">
                    <text class="text-dark">Your budget now &nbsp;&nbsp;:&nbsp;&nbsp;'.$value.'</text>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span class="text-dark" aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }
            ?>
            <div class="w-100">
                <div class="w-25  shadow-lg rounded">
                    <i class="fas fa-calculator"></i>
                    <div class="current">     
                        <i class="fas fa-rupee-sign"></i>
                        <text id="current-expense-label"><?php echo $cme;?></text>
                    </div>
                    <h4 class="text-white">Current Expense This Month</h4>
                </div>
                <div class="w-25  shadow-lg rounded">
                    <i class="fas fa-calculator"></i>
                    <div class="current">
                        <i class="fas fa-rupee-sign"></i> 
                        <text class="current-income-label"><?php echo $cmi;?></text>
                    </div>
                    <h4 class="text-white">Current Income This Month</h4>
                </div>
                <div class="w-25  shadow-lg rounded">
                    <i class="fas fa-compress-alt"></i>
                    <div class="current">
                        <i class="fas fa-rupee-sign"></i> 
                        <text class="total-expense-label"><?php echo $getallexp;?></text>
                    </div>
                    <h4 class="text-white">Your Total Expense</h4>
                </div>
                <div class="w-25  shadow-lg rounded">
                    <i class="fas fa-expand-alt"></i>
                    <div class="current">
                        <i class="fas fa-rupee-sign"></i> 
                        <text class="total-balance-label"><?php echo $getallinc;?></text>
                    </div>
                    <h4 class="text-white">Your Total Income</h4>
                </div>
            </div>
            <div class="row">
                <div class="table-1">
                    <div class="table-header1 h3 p-3">
                        Latest Income
                    </div>
                    <table class="table">
                        <div class="table-resposnive">
                            <div class="bg-white"></div>
                            <tr class="text-center">
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                            <?php 
                            $GetIncomeHistory = "SELECT * FROM `income` WHERE email='$em'";
                            $result = mysqli_query($conn, $GetIncomeHistory);
                            while($row = mysqli_fetch_array($result)){ ?>
                                <tr class="text-center bg-white">
                                    <td class="text-secondary"><?php echo $row['category'];?></td>
                                    <td class="text-secondary"><?php echo $row['amount'];?></td>
                                    <td class="text-secondary"><?php echo $row['date'];?></td>
                                </tr>
                            <?php } ?>
                        </div>
                    </table>
                </div>
                <div class="table-2">
                    <div class="table-header2 h3 p-3">
                        Latest Expense
                    </div>
                    <table class="table">
                        <div class="">
                            <div class="bg-white"></div>
                            <tr class="text-center">
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                            <?php 
                            $GetExpenseHistory = "SELECT * FROM `expense` WHERE email='$em'";
                            $result = mysqli_query($conn, $GetExpenseHistory);
                            while($row = mysqli_fetch_array($result)){ ?>
                                <tr class="text-center bg-white">
                                    <td class="text-secondary"><?php echo $row['category'];?></td>
                                    <td class="text-secondary"><?php echo $row['amount'];?></td>
                                    <td class="text-secondary"><?php echo $row['date'];?></td>
                                </tr>
                            <?php } ?>
                        </div>
                    </table>
                </div>
            </div>
            
            
        </div>
    </div>
    <?php
    // $value = $cmi -$cme;
    // if(isset($_POST['balancebtn'])){
    //     echo '<div class="alert alert-primary" role="alert">
    //              A simple primary alert—check it out!'. $value.'
    //             </div>';
    //     echo '<script>
    //             swal({
    //                 title: "Your Current Balance",
    //                     text: </script>' .$value.'<script>,
    //                     type: "success"
    //                 }).then(function() {
    //                     window.location.href = "dashboard.php";
    //             });
    //         </script>';
    // }
    ?>
     
</body>
</html>