<?php 
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Delete</title>
</head>
<body>
    <?php
        $em = $_SESSION['email'];
        // die($em);
        $sql = "DELETE FROM `user_form` WHERE `user_form`.`email` = '$em'";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<script>
            swal({
                title: "Success!",
                text: "Account Deleted Successfully!",
                type: "success"
              }).then(function() {
                  window.location.href = "signup.php";
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
                window.location.href = "dashboard.php";
            });
            </script>';
        }
    ?>
</body>
</html>