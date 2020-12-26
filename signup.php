<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Signup</title>
        <style>
        
            .hero-section{
                margin: 55px 100px ;
                display: flex;
            }
            .left{
                background-color: dodgerblue;
                width: 700px;
                padding: 100px 175px;
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
                width: 462px;
            }
            
            input:focus::placeholder {
                color: transparent;
            }
            ::placeholder{
                color: rgb(163, 155, 155);
                font-weight: 2em;
            }
            span i{
                color: white;
                font-size: 9em;
                position: relative;
                top: 0px;
                left: 100px;
            }
            p{
                color: white;
                text-align: center;
            }
            .buttons{
                display: flex;
                width: 100%;           
            }
            .buttons a{
                text-decoration:none;
            }
        </style>
    
    </head>
    <body>
    <div class="hero-section shadow-lg mb-5 bg-light rounded">        
        <div class="left">
            <span><i class="fas fa-user center"></i></span>
            <h1 class="text-white text-center pt-3 pb-4">Register Now</h1>
            <p>Join thousands of  users and create an account.</p>
            <p>Save and share your favorites</p>
            <p class="text-dark">If already a user then login.</p>
            <span></span>
            <span></span>
        </div>
        <div class="right">
            <form action="signup.php" method="post"> 
                        <!-- <h1 class="text-center text-primary pb-2">Signup</h1>  -->
                <div class="buttons mb-3">
                            <div class="signup text-center bg-primary w-50 py-3"><a href="signup.php" class="text-white">Signup</a></div>
                            <div class="login text-center bg-secondary w-50 py-3"><a href="login.php" class="text-white">Login</a></div>
                </div>
                        
                <div class="form-group row">
                    <div class="col-md-6">
                        <input   type="text" placeholder="First Name*" name="firstname" required>                        
                    </div>
                    <div  class="col-md-6">
                        <input type="text" placeholder="Last Name*" name="lastname" required>                        
                    </div>                        
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="email" placeholder="Email*" name="email" required>
                        <div class="pl-2"><small class="text-muted">We will never share your email address with anyone.</small></div>
                    </div>               
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="password" placeholder="Password*" name="password" required>
                    </div>   
                    
                </div>
                <div class="form-group row">      
                    <div class="col-md-12">
                        <input type="password" placeholder="Confirm Password*"  name="cpassword" required>
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="number" placeholder="Mobile No.*"  name="mobile_no" required>
                    </div>
                </div>
                <div class="submit pb-4" style="text-align: center;">
                    <button name="signup" id="signup" type="submit" class="btn btn-primary text-center px-2 py-3">Sign Up</button>
                </div>
            </form>
                <!-- </div> -->
                
        </div>
            <?php

                if(isset($_POST["signup"])){
                    // if(!isset($_SESSION)){
                    //     session_start();
                    // }
                    // $showError = false;
                    // $showAlert = false;
                    if($_SERVER["REQUEST_METHOD"] == "POST"){                        
                        include 'dbconnect.php';
                        $firstname = $_POST["firstname"];
                        $lastname = $_POST["lastname"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $cpassword = $_POST["cpassword"];
                        $mobile_no = $_POST["mobile_no"];
                        

                        $_SESSION['firstname'] = $_POST['firstname'];
                        $_SESSION['lastname'] = $_POST['lastname'];
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['password'] = $_POST['password'];
                        $_SESSION['mobile_no'] = $_POST['mobile_no'];
                        // echo '<div class="details jumbotron px-5">FirstName : '.$firstname.'<br><br>LastName : '.$lastname.'<br><br>Password : '.$password.'<br><br>Email : '.$email.'<br><br>Mobile No : '.$mobile_no.'</div>';
            
                        $unsql = "SELECT * FROM `user_form` WHERE email = '$email'";
                        $result = mysqli_query($conn, $unsql);
                        $numExistRows = mysqli_num_rows($result);
                        if($numExistRows > 0){
                            echo '<script>
                            swal({
                                title: "Email Already exists!",
                                text: "TRY AGAIN.",
                                type: "error"
                              }).then(function() {
                                  window.location.href = "signup.php";
                              });
                            </script>';
                        }
                        else{
                            if(($password == $cpassword)){
                                // $sql = "INSERT INTO `expense_manager` (`firstname`,`lastname`, `email`, `password`, `mobile_no`, `dt`) VALUES ('$firstname','$lastname', '$email', '$password', '$mobile_no')";
                                $sql = "INSERT INTO `user_form` (`firstname`, `lastname`, `email`, `password`, `mobile_no`) VALUES ('$firstname', '$lastname', '$email', '$password', '$mobile_no')";
                                $result = mysqli_query($conn, $sql); 
                                
                                if($result){
                                    echo '<script>
                                    swal({
                                        title: "Sign Up Successfully!",
                                        text: "You can login now.",
                                        type: "success"
                                    }).then(function() {
                                        window.location.href = "login.php";
                                    });
                                    </script>';
                                }        
                            }
                            else{
                                echo '<script>
                                    swal({
                                        title: "Passwords do not match",
                                        text: "TRY AGAIN.",
                                        type: "error"
                                    }).then(function() {
                                        window.location.href = "signup.php";
                                    });
                                    </script>';
                                
                            }
                        }
                    }
                    
                }
                
                // if(isset($_SESSION)){
                    // $_SESSION['firstname'] = $firstname;
                    // $_SESSION['lastname'] = $lastname;
                    // $_SESSION['email'] = $email;
                    // $_SESSION['password'] = $password;
                    // $_SESSION['mobile_no'] = $mobile_no;
                //     echo $_SESSION['firstname'];
                // }


            ?>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            
            <script>
                $(document).ready(function(event){
                    $('#signup_form').submit(function(event){
                        event.preventDefault();
                        var datatopost = $(this).SerializeArray();
                        $ajax({
                            url: "signup.php",
                            data: datatopost,
                            success: function(){
                                alert(data);
                            } 
                            error: function(){
                                alert("ERROR: Running the AJAX query");
                                // $().html("ERROR: Running the AJAX query");
                            }
                        })
                    })
                });
                </script>
    </body>
</html>