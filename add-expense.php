<?php
    session_start();
    include 'dbconnect.php';
    // die('<div class="details jumbotron px-5">FirstName : '.$_SESSION["firstname"].'<br><br>LastName : '.$_SESSION["lastname"].'<br><br>Password : '.$_SESSION["password"].'<br><br>Email : '.$_SESSION["email"].'<br><br>Mobile No : '.$_SESSION["mobile_no"].'</div>');
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Expense</title>
    <style>
        .page{
            display: flex;
            width:100%;
        }
        .sidebar{
            width: 250px !important;
            margin-right:10px;
        }
        h2{
            color:black;
        }
        .expense-table{
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
        <div class="expense-table shadow-lg bg-light">
            <div class="heading">
                <i class="fas fa-minus pr-4"></i>
                <text>Expenses</text>
            </div>
            <form action="" method="post">
                <div class="row form-group py-3">
                    <div class="col-md-5">
                        <label for="category">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category" placeholder="Category">
                            <option>Food</option>
                            <option>Transportation</option>
                            <option>Social-Life</option>
                            <option>Self-Development</option>
                            <option>Culture</option>
                            <option>Household</option>
                            <option>Beauty</option>
                            <option>Health</option>
                            <option>Gift</option>
                        </select>                        
                    </div>
                    <div class="col-md-5">
                        <label for="amount">Amount</label>
                        <input type="text" placeholder="Amount" class="form-control" name="amount">
                    </div>
                </div>
                <div class="row form-group py-3">
                    <div class="col-md-5">
                        <label for="category">Account</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="account">
                            <option>Cash</option>
                            <option>Card</option>
                        </select>                        
                    </div>
                    <div class="col-md-5">
                        <label for="date">Date</label>
                        <input type="date" placeholder="Date" class="form-control" name="date">
                    </div>
                </div>
                <div class="row form-group py-3">
                    <div class="col-md-10">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" rows="3" class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="text-center button pt-2">
                    <button type="submit" class="btn text-white" name="save-expense">Save Expense</button>
                </div>
            </form>
        </div> 
    </div>
    
    <?php
        if(isset($_POST["save-expense"])){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                include 'dbconnect.php';
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $password = $_SESSION['password'];
                $mobile_no = $_SESSION['mobile_no'];
                $email = $_SESSION['email'];

                $category = $_POST["category"];
                $amount = $_POST["amount"];
                $account = $_POST["account"];
                $date = $_POST["date"];
                $description = $_POST["description"];
                $email = $_SESSION["email"];
                $sql1 = "INSERT INTO `expense` (`category`, `amount`, `account`, `date`, `description`, `email`) VALUES ('$category', '$amount', '$account', '$date', '$description', '$email')";
                
                $result1 = mysqli_query($conn, $sql1);
                if($result1){
                    echo '<script>
                    swal({
                        title: "Success",
                        text: "Expense Added Successfully",
                        type: "success"
                    }).then(function() {
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
                        window.location.href = "add-expense.php";
                    });
                    </script>';
                }
            }
        }
    ?>
</body>
</html>