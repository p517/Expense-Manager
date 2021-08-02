
<html>
    <head>
    <title>EMAIL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
    <link rel="stylesheet" href="style.css">
    <style>

        .container1{
            margin: 77px 257px;
            padding-left:40px;
        }
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
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .center1{
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .stars{
            height: 130px;
            width: 264px;
            /* text-align: center; */
        }
        .stars input{
            display: none;
        }
        .stars label{
            float: right;
            font-size:50px;
            color: lightgrey;
            margin: 0 5px;
            text-shadow: 1px 1px #bbb;
        }
        .stars label:before{
            content: '★';
        }
        .stars input:checked ~ label{
            color: gold;
            text-shadow: 1px 1px #c60;
        }
        .stars:not(:checked) > label:hover,
        .stars:not(:checked) > label:hover ~ label{
            color: gold;
        }
        .stars input:checked > label:hover,
        .stars input:checked > label:hover ~ label{
            color: gold;
            text-shadow: 1px 1px goldenrod;
        }
        .stars .result:before{
            position: absolute;
            content: "";
            width: 100%;
            left: 50%;
            transform: translateX(-47%);
            bottom: -30px;
            font-size: 30px;
            font-weight: 500;
            color: gold;
            font-family: 'Poppins', sans-serif;
            display: none;
        }
        .stars input:checked ~ .result:before{
            display: block;
            padding-left:70px;
        }
        .stars #five:checked ~ .result:before{
            content: "I love it 😍";
        }
        .stars #four:checked ~ .result:before{
            content: "I like it 😎";
        }
        .stars #three:checked ~ .result:before{
            content: "It's good 😄";
        }
        .stars #two:checked ~ .result:before{
            content: "I don't like it 😒";
        }
        .stars #one:checked ~ .result:before{
            content: "I hate it 😠";
        }
    </style>
    </head>
    <body>
        <div class="text-center mt-5 display-4 text-primary">Feedback</div>
        <div class="container1 shadow-lg p-5 mb-5 bg-light rounded">
            <form action="semail.php" method = "post">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="cc">Add a review</label>
                    </div>
                    <div class="col-md-7">
                        <textarea class="form-control" aria-label="With textarea" name="sub"></textarea>
                    </div>    
                    <div class="col-md-4">
                        <br><br><br><br>
                        <label for="rat">Add ratings</label>
                    </div>
                    <div class="col-md-7">
                        <div class="stars">
                            <br><br><br>
                            <input type="radio" id="five"  name="rate" value="1">
                            <label for="five"></label>
                            <input type="radio" id="four" name="rate" value="2">
                            <label for="four"></label>
                            <input type="radio" id="three" name="rate" value="3">
                            <label for="three"></label>
                            <input type="radio" id="two" name="rate" value="4">
                            <label for="two"></label>
                            <input type="radio" id="one" name="rate" value="5">
                            <label for="one"></label>
                            <span class="result"></span>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4 p-5">
                    <button name="submit" type="submit" class="btn btn-primary text-center px-3 py-2">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>
