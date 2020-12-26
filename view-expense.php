<?php
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">    
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        

        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <title>Expense</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                user-select: none;
                box-sizing: border-box;
                font-family: 'Ubuntu', sans-serif;;
            }      
            .page{
                display: flex;   
                width:100%;
            }
            /* View Expense */
            .viewexpense{
                margin:20px 50px;
                width:80%;
                border: 1px solid rgb(236, 124, 72);
            }
            table{
                color: black;
                border: none;
            }
            h1{
                background-color: rgb(236, 124, 72);
            }
            th{
                margin: -1px !important;
                color: white;
                background-color: rgb(236, 124, 72);
                border: none !important;
            }
            td{
                color: gray;
            }
            .expense_heading{
                background-color: rgb(236, 124, 72);
                color: white;
                font-size: 20px;
                font-weight: 550;
                margin: -1px !important;
            }
            hr{
                color: white;
            }

            /* Expensetable */
            .addexpense{
                margin:20px 50px;
                width:80%;
                height: 600px;
                border: 2px solid rgb(164, 209, 58);
            }
            .heading{
                background-color: rgb(164, 209, 58);
                padding: 10px 30px;
                color: white;
                font-size: 20px;
            }
            ::placeholder{
                color: rgb(163, 155, 155) !important;
                font-weight: 2em;
            }

            input:focus::placeholder {
                color: transparent !important;
            }
            label{
                color: #347897;
            }
            select{
                color: rgb(163, 155, 155) !important;
            }
            option{
                color: rgb(163, 155, 155) !important;
            }
            .a{
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <?php
            include 'nav.php';
        ?>
        <div class="page">
            <div class="sidebar">
                <?php
                    include 'sidebar.php';
                ?>
            </div>
            <div class="shadow-lg viewexpense">
                <div class="expense_heading py-2 px-2 row">
                    <h5 class="col-11 pt-3">View Expense</h5>
                    <button type="submit" class="btn btn-warning col-1 my-2"><a href="add-expense.php" class="text-dark">Add</a></button>
                </div>
                <!-- <div class="bg-light">hjk</div> -->
                <!-- <hr> -->
                <div class="table-responsive">
                    <div class="bg-white p-2"></div>

                    <table class="table mg-b-0">
                    <tr class="text-center">
                        <th>Srno</th>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Account</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    
                    <?php
                        $eemail = $_SESSION['email'];
                        $sql = "SELECT * FROM `expense` WHERE email='$eemail'";
                        $result = mysqli_query($conn, $sql);
                        $etotal=0;
                        $cnt = 1;

                        $firstname = $_SESSION['firstname'];
                        $lastname = $_SESSION['lastname'];
                        $password = $_SESSION['password'];
                        $mobile_no = $_SESSION['mobile_no'];
                        $email = $_SESSION['email'];
                        // echo $_SESSION['etotal'];
                        while($row = mysqli_fetch_array($result)){
                        ?>
                        <tbody>
                        <tr class="text-center">
                            <form action="manage-expense.php" method="post">
                                <td><?php echo $cnt; ?></td>
                                <td><?php echo $row['exp_id']; ?></td>
                                <td><?php echo $row['category'];?></td>
                                <td><?php echo $row['amount']; $amount = true;?></td>
                                <td><?php echo $row['account'];?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['description'];?></td>
                                <?php
                                    $addsql = "SELECT 'amount' FROM `expense`";
                                    // $result = mysqli_query($conn, $addsql);
                                    if($amount){
                                        $etotal = $etotal + $row['amount'];
                                    }
                                    
                                ?>
                                <input class="d-none" type="text" name="exp_id" value="<?php echo $row['exp_id'];?>">
                                <input class="d-none" type="text" name="category" value="<?php echo $row['category'];?>">
                                <input class="d-none" type="text" name="amount" value="<?php echo $row['amount'];?>">
                                <input class="d-none" type="text" name="account" value="<?php echo $row['account'];?>">
                                <input class="d-none" type="date" name="date" value="<?php echo $row['date'];?>">
                                <input class="d-none" type="text" name="description" value="<?php echo $row['description'];?>">
                                
                                <td class="text-center">
                                    <button type="submit" name="edit" class="btn btn-success px-3 edit">EDIT</button>
                                </td>
                                <td class="text-center">
                                    <button type="submit" name="delete" class="btn btn-info px-2 delete">DELETE</button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                    <?php
                            $cnt = $cnt+1;
                        }
                        // echo $etotal;
                        $_SESSION['etotal'] = $etotal;
                        // echo $_SESSION['etotal'];
                    ?>
                    </table>
                </div>
            </div>
            
        </div>
    
    <script>
        // $(document).ready(function(){
        //     $('.addexpense').hide();
        //     // $(".viewexpense").hide();

        //     $('.edit').click(function(){
        //         // document.getElementById("edit").style.display = "none";
        //         // $('.view-income').hide();
        //         // $(".addexpense").css("visibility", "flex");
                
        //         // $("#viewexpense").css({
        //         //     display: "none",
        //         //     visibility: "hidden"
        //         // });
        //         $('.addexpense').show();
        //         $('.viewexpense').hide();
        //     });
        // });
    </script>
        
    </body>
</html>
