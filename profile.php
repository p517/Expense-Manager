<?php
    session_start();
    include 'dbconnect.php';
    // die('<div class="details jumbotron px-5">FirstName : '.$_SESSION["firstname"].'<br><br>LastName : '.$_SESSION["lastname"].'<br><br>Password : '.$_SESSION["password"].'<br><br>Email : '.$_SESSION["email"].'<br><br>Mobile No : '.$_SESSION["mobile_no"].'</div>');
            
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Login</title>
    </head>
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
            width:100% !important;
        }
        .profile{
            margin:20px auto;
            width:700px;
            height: 550px;
            border-radius: 10px;
            font-size: 30px;
            font-weight: 500;
            color: black !important;
        }
        .btn{
            text-align: center; 
            padding-top: 100px !important;
            padding: 14px 150px !important;
            background-color: rgb(156, 80, 226) !important;
            font-size: 20px !important;
            margin-top: 60px;
        }
        .editform{
            margin:20px auto;
            width:850px;
            height: 550px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 500;
            color: black !important;
        }
        input{
            background-color: white;
            border: 1.5px solid rgb(123, 124, 124);            
            padding: 9px 17px;
            margin: 6px;
            color: rgb(163, 155, 155);
        }
        input:hover,
        input:active,
        input:focus,
        input:visited{
            outline: none;
        }
        .col-md-12 input{
            width: 300px;
        }
        
        input:focus::placeholder {
            color: transparent;
        }
        ::placeholder{
            color: rgb(163, 155, 155);
        }
        .w-100{
            margin : 0px 233px;
        }
    </style>
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
            if(!isset($_POST['edit'])){
            ?>
                <div class="shadow-lg bg-light pt-4 profile">
                    <form method="post" action ="profile.php" class="profile ">
                        <div class="text-center text-secondary">
                            <?php
                                echo ' Users Details<hr><div class="h4 pt-2 align-center text-info">FirstName : '.$_SESSION['firstname'].'
                                <br><br><br>LastName : '.$_SESSION['lastname'].'<br><br><br>Mobile No : '.$_SESSION['mobile_no'].'</div>';
                            ?>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn text-center" name="edit">Edit</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST['edit'])){
                        ?>
                        <div class="shadow-lg bg-light px-5 pt-4 editform text-center">
                            <form action="" method="post" class="form"> 
                                <h1 class="text-info text-center py-3">Enter details</h1>
                                <hr>
                                <br>
                                <div class="">
                                    <div class="mx-5 px-5 m-3">
                                        <div class="m-4">
                                            <input class="form-control form-control-lg" type="text" name="fn" value="<?php echo $_SESSION['firstname'];?>">
                                        </div>
                                        <div  class="m-4">
                                            <input class="form-control form-control-lg" type="text" name="ln" value="<?php echo $_SESSION['lastname'];?>">
                                        </div> 
                                        <div class="m-4">
                                            <input class="form-control form-control-lg" type="text" name="mn" value="<?php echo $_SESSION['mobile_no'];?>">
                                        </div>
                                    </div>
                                    <!-- <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg"> -->
                                    <div class="submit pb-4">
                                        <button type="submit" class="btn text-white text-center px-3 py-3" name="done">DONE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                        // $uemail = $_SESSION['email'];
                        // $firstname = $_SESSION['firstname'];
                        // $lastname = $_SESSION['lastname'];
                        // $password = $_SESSION['password'];
                        // $mobile_no = $_SESSION['mobile_no'];
                        // $sql = "UPDATE `user_form` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$uemail', `password` = '$password', `mobile_no` = '$mobile_no' WHERE `user_form`.`email` = '$uemail';";
                        
                    }
                }
            ?>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['done'])){
                    // echo '<div class="text-dark">Hello</div>';
                    $email = $_SESSION['email'];
                    // die($_POST['em']);
                    $firstname = $_POST['fn'];
                    $lastname = $_POST['ln'];
                    $mobile_no = $_POST['mn'];
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                    $_SESSION['password'] = $password;
                    $_SESSION['mobile_no'] = $mobile_no;
                    $_SESSION['email'] = $email;
                    
                    $sql = "UPDATE `user_form` SET `firstname` = '$firstname', `lastname` = '$lastname', `mobile_no` = '$mobile_no' WHERE `user_form`.`email` = '$email'";
                    //  die($firstname.$lastname.$password.$mobile_no);
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        echo '<script>
                        swal({
                            title: "Details Edited Successfully",
                            text: "",
                            type: "success"
                        }).then(function() {
                            window.location.href = "profile.php";
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
                            window.location.href = "profile.php";
                        });
                        </script>';
                    }
                }
            }
            ?>    
                
        </div>
        <script>
        // $(document).ready(function(){
        //     $('.form').hide();

        //     $('.edit').click(function(){
        //         $('.form').show();
        //         $('.profile').hide();
        //     });
        // });
        </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/sweetalert.js"></script>
        
    </body>
</html>