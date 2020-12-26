<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "expense_manager";
    // session_start();
    $conn = mysqli_connect($server, $username, $password, $database);
    if(!$conn)
    {
        die("Error".mysqli_connect());
        // echo "Success!";
    }
    // else {
        
    // }
?>