<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <title>Expense Manager</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
        }
        .header {
            display: flex;
        }
        .buttons {
            text-align: right;
        }
        .image img {
            height: 88vh;
            width: 100%;
        }
        .bottom-left {
            position: absolute;
            bottom: 8px;
            left: 16px;
        }
        .buttons a {
            text-decoration: none;
            color: white;
        }
        /* Herosection */
        .row {
            width: 100%;
            padding: 30px 100px;
            justify-content: center;
        }
        .col-md-4 img{
            width: 160px;
            justify-content: center;
        }
        .row> .col-md-3> .circle{
            border-radius: 50%;
            border: 5px solid rgb(197, 193, 193);
            font-size: 20px;
            margin: 20px;
            padding: 15px;
            width: 150px;
            height: 150px;
        }
        .circle1:hover {
            background-color: rgb(223, 226, 48);
            border: none;
        }
        .circle2:hover {
            background-color: seagreen;
            border: none;
        }
        .circle3:hover {
            background-color: royalblue;
            border: none;
        }
        /* About */
        .about {
            background-color: rgb(39, 39, 39);
            color: white;

            text-align: center;
        }
        .col {
            display: flex;
            padding: 20px 150px;
            /* margin: 100px; */
        }
        .w-40 {
            width: 550px;
            /* padding: 20px; */
            padding-right: 40px;
            margin-top: 0px;
        }
        .w-60 {
            width: 550px;
            padding: 20px 70px;
            padding-right: 40px;
        }
        .w-70 {
            display: flex;
        }
        .w-70> .w-25> .circle {
            border-radius: 50%;
            border: 5px solid;
            font-size: 20px;
            margin: 20px;
            padding: 14px;
            width: 70px;
            height: 70px;
        }
        /* Footer section */
        .icons{
            padding-top: 150px;
            text-align: center;
            /* transition: 1s; */
            /* transition: 0.5s; */

            /* position: fixed; */
        }
        .square{
            border: 1px solid black;
            color: black;
            margin: 20px;
            padding: 14px;
            /* width: ; */
            height: 50px;
            font-size: 20px;
        }
        .square:hover {
            background-color: dodgerblue;
            color: white;
            border: none;
        }
        .footer{
            background-color: whitesmoke;
        }
        .footer .icons span a i{
        }
        .nav-heading{
            width: 60% !important;
        }
        .nav-buttons{
            width: 30% !important;
        }
    </style>
</head>

<body>
    <div class="header bg-dark">
        <img src="images/img5.png" width="70px" height="70px" alt="" class="p-3">
        <h1 class="text-white p-1 nav-heading">Expense Management System</h1>
        <div class="buttons nav-buttons">
            <button type="button" class="btn btn-primary m-3 text-center py-2" name="login"><a
                    href="login.php">Login</a></button>
            <button type="button" class="btn btn-primary m-3 text-center py-2" name="signup"><a
                    href="signup.php">Signup</a></button>
        </div>
    </div>
    <script>
        var i = 0;
        var images = []; //Start point
        var time = 3000;

        //Image List
        images[0] = 'images/img1.jpg';
        images[1] = 'images/img2.jpg';
        images[2] = 'images/img4.jpg';

        //Change Image
        function changeImg() {
            document.slide.src = images[i];
            if (i < images.length - 1) {
                i++;
            } else {
                i = 0;
            }
            setTimeout("changeImg()", time);
        }
        window.onload = changeImg;

    </script>
    <img name="slide" width="100%" height="500" />
    <div class="hero-section">
        <div class="row">
            <div class="col-md-3 shadow-lg bg-light mx-4 p-4">
                <h1 class="text-center pb-2">FEATURES</h1>
                <p>Organize your incomes, manage your family budget, keep track of expenses while traveling and
                    understand where all your money are with some great, yet simple features.</p>
            </div>
            <div class="col-md-3 shadow-lg bg-light mx-4 p-4">
                <h1 class="text-center pb-2">Best For</h1>
                <span>Designed for the mid to bigger businesse looking for smart automation, highly configurable options
                    and workflows and full implementation and support.</span>
            </div>
            <div class="col-md-3 shadow-lg bg-light mx-4 p-4">
                <h1 class="text-center pb-2">Product Info</h1>
                <span>Expensemanager is smart automation for all spend. One platform to manage expenses, supplier
                    invoices, purchase orders and travel spend .</p></span>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-md-3 text-center shadow-lg bg-light mx-4">
                <img src="images/img10.png" class="circle circle1 border-light" alt="">
                <div><h1>INTUITIVE & CLEAN</h1></div>
                <div><p>Intuitive, clean and simple way of adding daily expenses and incomes. main screen calendar that gives a quick monthly overview over all transactions</p></div>                
            </div>
            <div class="col-md-3 text-center shadow-lg bg-light mx-4" >
                <img src="images/img7.png" class="circle circle2 border-light" alt="">
                <div><h1>SECURE</h1></div>
                <br>
                <br>
                <div><p>Your data is always safe wherever your are and what ever device you are using.</p></div>               
            </div>
            <div class="col-md-3 text-center shadow-lg bg-light mx-4">
                <img src="images/img5.png" class="circle circle3 border-light" alt="">
                <h1>RELIABLE</h1>
                <br><br>
                <p>Set reminders for future inflow or outflow transactions and recurrent payments – never miss another deadline</p> 
            </div>

        </div>
        <div class="about p-5">
            <h1>ABOUT</h1>
            <p class="text-light display-5">This expense tracker application is dedicated in helping you manage your
                financial life.</p>
            <div class="col w-100">
                <div class="w-40 text-right display-3">
                    <p>Very simple, intuitive and straight forward</p>
                </div>
                <div class="w-60 text-center text-muted">
                    <p>If you are looking for a complicated money management application that promises you to do
                        everything you ever wanted, then you have to keep looking because this app is not for you.
                        This expense tracker & manager promises to be a very simple, intuitive and straight forward
                        mobile application that helps and assists you to track all your expenses, manage your
                        budgets/costs and organize your spending, enabling you to make savings and order in your
                        financial life.
                        The solution is modular, so you can start with expenses,
                    then invoice automation, add purchase orders later, or all at once. It's your choice.
                        Dedicated in helping you manage your financial life, easily, efficiently and with no
                        complications
                    </p>
                </div>
            </div>
            <div class="w-70">
                <div class="w-25  ">
                    <div class="circle text-white border-danger mx-auto d-block">100</div>
                    <div>
                        <h3>EASY-TO-USE</h1>
                            <span class="text-muted">Simple yet efficient</span>
                    </div>
                </div>
                <div class="w-25">
                    <div class="circle text-white border-primary mx-auto d-block">100</div>
                    <div>
                        <h3>COMPREHENSIVE</h3>
                    </div>
                </div>
                <div class="w-25">
                    <div class="circle text-white border-warning mx-auto d-block">100</div>
                    <div>
                        <h3>SAFE AND SECURE</h3>
                        <span class="text-muted">Your data is always protected</span>
                    </div>
                </div>
                <div class="w-25">
                    <div class="circle text-white border-success mx-auto d-block">100</div>
                    <div>
                        <h3>YOUR BEST FRIENT</h3>
                        <span class="text-muted">Use it to never miss another payment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="icons">
            <span><a href=""><i class="fab fa-google square"></i></a></span>
            <span><a href=""><i class="fab fa-facebook-f square px-3"></i></a></span>
            <span><a href=""><i class="fab fa-linkedin-in square"></i></a></span>
            <span><a href=""><i class="fab fa-instagram square"></i></a></span>
            <span><a href=""><i class="fab fa-twitter square"></i></a></span>
        </div>
        <div>
            <p class="text-muted text-center">&#169; copyright all right reserved.</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

</body>

</html>