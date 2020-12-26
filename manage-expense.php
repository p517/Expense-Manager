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
            /* padding:40px; */
            /* height: 600px; */
            border: 2px solid rgb(212, 78, 156);
        }
        table{
            color: black;
            border: none;
        }
        h1{
            background-color: rgb(212, 78, 156);
        }
        th{
            margin: 0 0;
            color: white;
            background-color: rgb(212, 78, 156);
            border: none !important;
            /* border: 1px solid white; */
        }
        td{
            color: gray;
        }
        .expense_heading{
            background-color: rgb(212, 78, 156);
            /* margin: -60px; */
            /* padding:10px; */
            color: white;
            font-size: 20px;
            font-weight: 550;
        }
        hr{
            color: white;
        }

        /* Expensetable */
        .addexpense{
            margin:20px 50px;
            width:100%;
            /* padding:40px; */
            height: 600px;
            border: 2px solid rgb(58, 106, 209);
        }
        .heading{
            background-color: rgb(58, 106, 209);
            padding: 10px 30px;
            color: white;
            font-size: 20px;
            margin: -1px !important;
        }
        form{
            padding:20px 30px;
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
        .btn{
            text-align: center; 
            padding-top: 100px !important;
            padding: 14px 150px !important;
            background-color: rgb(156, 80, 226) !important;
            font-size: 20px !important;
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
        <?php
            if(isset($_POST["edit"])){
            ?>
                <div class="shadow-lg bg-light addexpense">
                    <div class="heading">
                        <i class="fas fa-plus pr-4"></i>
                        <text> Edit Expense</text>
                    </div>
                    <form action="" method="post">
                        <div class="row form-group py-3">
                            <div class="col-md-5">
                                <label for="category">Category</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="categ" placeholder="Category" value="<?php echo $_POST['category'];?>">
                                    <option>Salary</option>
                                    <option>Pretty Cash</option>
                                    <option>Allowances</option>
                                    <option>Bonus</option>
                                </select>                        
                            </div>
                            
                            <div class="col-md-5">
                                <label for="amount">Amount</label>
                                <input type="text" placeholder="Amount" class="form-control" name="amou" value="<?php echo $_POST['amount'];?>">
                            </div>
                        </div>
                        <div class="row form-group py-3">
                            <div class="col-md-5">
                                <label for="category">Account</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="acc" value="<?php echo $_POST['account'];?>">
                                    <option>Cash</option>
                                    <option>Card</option>
                                </select>                        
                            </div>
                            <div class="col-md-5">
                                <label for="date">Date</label>
                                <input type="date" placeholder="Date" class="form-control" name="date" value="<?php echo $_POST['date'];?>">
                            </div>
                        </div>
                        <div class="row form-group py-3">
                            <div class="col-md-10">
                                <label for="description">Description</label>
                                <textarea placeholder="Description" rows="3" class="form-control" name="descrip"><?php echo $_POST['description'];?></textarea>
                            </div>
                        </div>
                        <div class="text-center button pt-2">
                            <button type="submit" class="btn" name="editexpense">Edit Expense</button>
                        </div>
                        <div class="row form-group py-3">
                            <div class="col-md-5">
                                    <!-- <label for="amount">Amount</label> -->
                                    <input type="text" placeholder="Amount" class="form-control d-none" name="exp_id" value="<?php echo $_POST['exp_id'];?>">
                            </div>
                        </div>
                    </form>
                </div>
        <?php
            }
        ?>
    </div>
            
    <?php
        if(isset($_POST["editexpense"])){
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $password = $_SESSION['password'];
            $mobile_no = $_SESSION['mobile_no'];
            $email = $_SESSION['email'];

            $exp_id = $_POST["exp_id"];
            $category = $_POST["categ"];
            $amount = $_POST["amou"];
            $account = $_POST["acc"];
            $date = $_POST["date"];
            $description = $_POST["descrip"];
            $sql ="UPDATE `expense` SET `category` = '$category', `amount` = '$amount', `account` = '$account', `date` = '$date', `description` = '$description' WHERE `expense`.`exp_id` ='$exp_id';";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>
                        swal({
                            title: "Expense Edited Successfully",
                            text: "",
                            type: "success"
                        }).then(function(){
                            window.location.href = "view-expense.php";
                        });
                    </script>';
            }
            else{
                echo '<script>
                    swal({
                        title: "Something went wrong!",
                        text: "TRY AGAIN.",
                        type: "error"
                    }).then(function() {
                        window.location.href = "view-expense.php";
                    });
                </script>';
            }
        }
    ?>
    <?php
        if(isset($_POST['delete'])){
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $password = $_SESSION['password'];
            $mobile_no = $_SESSION['mobile_no'];
            $email = $_SESSION['email'];
                $exp_id = $_POST["exp_id"];
                $dsql = "DELETE FROM `expense` WHERE `expense`.`exp_id` = $exp_id";
                $result = mysqli_query($conn,$dsql);
                if($result){
                    echo '<script>
                            swal({
                                title: "Expense Deleted Successfully",
                                text: "",
                                type: "success"
                            }).then(function(){
                                window.location.href = "view-expense.php";
                            });
                        </script>';
                }
                else{
                    echo '<script>
                        swal({
                            title: "Something went wrong!",
                            text: "TRY AGAIN.",
                            type: "error"
                        }).then(function() {
                            window.location.href = "view-expense.php";
                        });
                    </script>';
                }
        }
    ?>
    <script> 
        // $(document).ready(function() { 
        //     // $("#viewexpense").hide();
        //     $("#incometable").hide();
        //     $('.showincome').click(function(){
        //         $('#incometable').hide();
        //         $("#viewexpense").show();
        //     });
        // }); 
        
    </script>
</body>
</html>
