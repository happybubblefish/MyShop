<?php 
    session_start();

    if(!isset($_SESSION["user_id"])){
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
                       <li><a href="shoppingcart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge">
                           <?php $response = isset($_SESSION["total_count"]) ? $_SESSION["total_count"] : 0; echo $response; ?>
                       </span></a>
                       <!-- <li id="cart-btn"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge"></span></a>
                            <div class="dropdown-menu" style="width:800px;">
                                
                            </div>
                        
                        </li>-->
                        <?php if(!isset($_SESSION["firstname"])) {
                                echo '
                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
                            <ul class="dropdown-menu">
                               <div style="width: 300px">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Login</div>
                                        <div class="panel-heading">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" required/>
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" required/>
                                            <br>
                                            <a href="#" style="color:white; list-style:none">Forgotten Passowrd</a>
                                            <input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login">
                                        </div>
                                        <div class="panel-footer" id="message"></div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>';
                            }else{
    
            
                 echo '<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>';
                     echo "Hi, ".$_SESSION["firstname"];
                     
                    echo '</a>
                            <ul class="dropdown-menu">
                               <li><a href="#">Change password</a></li>
                               <li class="divider"></li>
                               <li><a href="#" id="logout">Logout</a></li>
                            </ul>';
            ;
}
                        ?>
                        
                    </ul>     
                </div>
            </div>
        </header>
        <br>
        <br>
        <br>
        
        <div class="container">
            <div id="cart-info">
            <div class="panel panel-success">
                <div class="panel panel-heading">
                    <div class="row">Your cart</div>
                </div>
                <div class="panel panel-body">
                    <div class="row shopping-cart-title">
                        <div class="col-md-2">Product Id</div>
                        <div class="col-md-2">Product Image</div>
                        <div class="col-md-2">Product Name</div>
                        <div class="col-md-2">Count</div>
                        <div class="col-md-2">Unit Price($)</div>
                        <div class="col-md-2">Operations</div>
                    </div>
                    <div class="row shopping-cart-body">
<!--
                        <div class="col-md-2">Product Id</div>
                        <div class="col-md-2">Product Image</div>
                        <div class="col-md-2">Product Name</div>
                        <div class="col-md-2"><input type="number" min="0" id="count" name="count"/></div>
                        <div class="col-md-2">Unit Price($)</div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="#"><span class="glyphicon glyphicon-plus"></span></a>&nbsp;
                                <a href="#"><span class="glyphicon glyphicon-minus"></span></a>&nbsp;
                                <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                            </div>
                        </div>
-->
                       <div id="panel-cart">
                       </div>
                    </div>
                </div>
                
                <div class="panel panel-footer">
                    <div id="total-price"></div>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                          <input type="hidden" name="cmd" value="_cart">
                          <input type="hidden" name="business" value="shoppingcart_linshop@gmail.com">
                          <input type="hidden" name="upload" id="paypal" value="1">
                          <!--<input type="hidden" name="item_name" value="hat">
                          <input type="hidden" name="item_number" value="123">
                          <input type="hidden" name="amount" value="15.00">-->
                          <!--<input type="hidden" name="first_name" value="John">
                          <input type="hidden" name="last_name" value="Doe">
                          <input type="hidden" name="address1" value="9 Elm Street">
                          <input type="hidden" name="address2" value="Apt 5">
                          <input type="hidden" name="city" value="Berwyn">
                          <input type="hidden" name="state" value="PA">
                          <input type="hidden" name="zip" value="19312">
                          <input type="hidden" name="night_phone_a" value="610">
                          <input type="hidden" name="night_phone_b" value="555">
                          <input type="hidden" name="night_phone_c" value="1234">
                          <input type="hidden" name="email" value="jdoe@zyzzyu.com">-->
                          <input type="image" name="submit"
                            src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="PayPal - The safer, easier way to pay online">
                            
                            
                    </form>
                </div>
            </div>
            </div>
        </div>
        <script>
            
        </script>
    </body>
</html>