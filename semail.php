<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EMAIL</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       
    </head>
    <style>
            .success{
                background-color: beige;
                margin: 183px 283px;
                padding: 47px 47px 68px;
            }
            .error{
                background-color: beige;
                margin: 183px 283px;
                padding: 47px 47px 68px;
            }
    </style>
    <?php
        if(isset($_POST['submit'])){
            require_once('C:\xampp\htdocs\PHPMailer\PHPMailer-5.2-stable\PHPMailerAutoload.php');
                
            $_POST['send'] = $_SESSION['email'];
            $_POST['body'] = $_POST['rate'];
            $from = $_POST['send'];
            $to = 'parikhbhoomi32349@gmail.com';
            $password = 'pbhoomi@12';               
            // $cc = $_POST['cc'];
            // $bcc = $_POST['bcc'];
            $sub = 'Customers review';
            $body = 'Review : '.$_POST['sub'].'<br>
            Ratings : '.$_POST['body'];
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = '465';
            $mail->isHTML();
            $mail->Username = $from;
            $mail->Password = $password;
            $mail->Subject = $sub;
            $mail->Body = $body;
            $mail->AddAddress($to);
            // $mail->AddBCC($bcc);
            // $mail->AddCC($cc);  
        }
    ?>
    <body>
        <?php
        if($mail->Send()){
            header('Location: dashboard.php');
            
        }
       
        
        ?>
    </body>
    
</html>