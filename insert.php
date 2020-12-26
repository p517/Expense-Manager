    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <title>Insert</title>
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
        .hero-section{
            margin:20px 50px;
            width:100%;
            /* padding:40px; */
            height: 600px;
            border: 2px solid rgb(164, 209, 58);
        }
        table{
            color: black;
        }
        th{
            color: black;
        }
    </style>
</head>
<body>
    <?php
        include 'nav.html';
    ?>
    <div class="page">
        <div class="sidebar">
            <?php
                include 'sidebar.php';
            ?>
        </div>        
        
        <!-- <script>
            function myFunction() {
            document.getElementById("demo").innerHTML = "Paragraph changed.";
            }
        </script> -->

        <!-- <div class="hero-section shadow-lg">
            <table class="table" border="2px">
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Account</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </table>
        </div> -->

        <?php
            include 'dbconnect.php';
            $category = $_POST["category"];
            $amount = $_POST["amount"];
            $account = $_POST["account"];
            $date = $_POST["date"];
            $description = $_POST["description"];
            $sql = "INSERT INTO `income` (`category`, `amount`, `account`, `date`, `description`) VALUES ('$category', '$amount', '$account', '$date', '$description')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo '<script>
                swal({
                    title: "Income Added Successfully",
                    text: "",
                    type: "success"
                }).then(function() {
                    window.location.href = "income.php";
                });
                </script>';
            }
        ?>
        
    </div>
</body>
</html>