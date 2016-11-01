<?php
    session_start();

    if(!isset($_SESSION["firstname"])){
        header("location:index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Lin's shop</title>
        <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
        <link rel="stylesheet" href="custom/css/style.css">
        <script src="vendor/js/jquery-1.12.4.min.js"></script>
        <script src="vendor/js/bootstrap.min.js"></script>
        <script src="custom/js/main.js"></script>
    </head>
    <body>
        <header>
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="#" class="navbar-brand">Lin's Shop</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
                        <li><input type="text" class="form-control" id="search"></li>
                        <li><button class="btn btn-primary" id="search_btn">Search</button></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                       <li id="cart-btn"><a href="shoppingcart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge">0</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="main-content">
            <div class="container-fluid">
               <div class="row">
                   <div class="col-md-4"></div>
                   <div class="col-md-4" id="signup_msg">
                       
                   </div>
               </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Thank you for your order</div>
                            <div class="panel-body">
                                <p>Hello <?php echo $_SESSION["firstname"] ?>,</p>
                                <p>Your order has been successfully placed and Transaction No. is . </p>
                                <a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>