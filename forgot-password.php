<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Login</title>
    </head>
    <style>
        body{
            /* color: black; */
            background-color: #1e90ff1a;
        }
        .hero-section{
            margin: 105px 400px ;
        }
        h1{
            color: dodgerblue   ;
        }
        form {
            background-color: white;
            padding: 31px 54px;
            
        }
        input{
            background-color: white;
            border: 1.5px solid rgb(123, 124, 124);            
            padding: 9px 17px;
            margin: 6px;
        }
        input:hover,
        input:active,
        input:focus,
        input:visited{
            outline: none;
        }
        .col-md-12 input{
            width: 437px;
        }
        .row{
            padding: 10px;
        }
        input:focus::placeholder {
            color: transparent;
        }
        ::placeholder{
            color: rgb(163, 155, 155);
            font-weight: 2em;
        }
        a{
            text-decoration: none !important;
        }
    </style>
    <body>
        <div class="hero-section">        
            <form action="" method="post" class="shadow-lg"> 
                <h1 class="text-center p-3">Change your Password</h1>  
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="email" placeholder="Email*" name="email" aria-describedby="emailHelp">
                    </div>               
                </div>  
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="password" placeholder="Enter new password*" name="password">
                    </div>               
                </div>             
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="password" placeholder="Confirm new password*" name="cpassword">
                    </div>   
                </div>
                <div class="submit pb-4" style="text-align: center;">
                    <button name="fpass" type="submit" class="btn btn-primary text-center">Continue</button>
                </div>
            </form>
        </div>
        <?php
            $fpass = false;
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                include 'dbconnect.php';
                if(isset($_POST["fpass"])){
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    // UPDATE `user_form` SET `password` = 'Vrunda@29' WHERE `user_form`.`email` = 'vrudapatel816@gmail.com';

                    $sql = "UPDATE `user_form` SET `password` = '$password' WHERE `user_form`.`email` = '$email'";
                    $result = mysqli_query($conn, $sql);
                    // $num = mysqli_num_rows($result);
                    // if($num == 1){
                    //     $login = true;
                    //     if($row = mysqli_fetch_assoc($result)){
                    //         $_SESSION['password'] = $row['password'];
                    //     }
                    //     $_SESSION['password'] = $password;
                    // }
                    // else{
                    //     $fpass = false;
                    // }
                    if($result){
                        if($_POST['password'] == $_POST['cpassword']){
                            echo '<script>
                            swal({
                                title: "Password Changed Successfully!",
                                text: "You can login now.",
                                type: "success"
                            }).then(function() {
                                window.location.href = "login.php";
                            });
                            </script>';
                        }
                        else{
                            echo '<script>
                            swal({
                                title: "Passwords not matched!",
                                text: "TRY AGAIN.",
                                type: "error"
                            }).then(function() {
                                window.location.href = "login.php";
                            });
                            </script>';
                        }
                    }
                    else{
                        echo '<script>
                        swal({
                            title: "Something went wrong!",
                            text: "TRY AGAIN.",
                            type: "error"
                        }).then(function() {
                            window.location.href = "http://localhost:7882/PROJECT/dahboard.php";
                        });
                        </script>';
                    }
                }   
            }
            
        ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/sweetalert.js"></script>
            
        
    </body>
</html>