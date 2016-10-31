<?php 
    session_start();
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
                        <li><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
                        <li><input type="text" class="form-control" id="search"></li>
                        <li><button class="btn btn-primary" id="search_btn">Search</button></li>
                    </ul>  
                    <ul class="nav navbar-nav navbar-right">
                       <li id="cart-btn"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge"></span></a>
                       <!-- <li id="cart-btn"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge"></span></a>
                            <div class="dropdown-menu" style="width:800px;">
                                <div class="panel panel-success">
                                    <div class="panel panel-heading">
                                        <div class="row">
                                            <div class="col-md-2">Serial No.</div>
                                            <div class="col-md-2">Product Id</div>
                                            <div class="col-md-2">Product Image</div>
                                            <div class="col-md-2">Product Name</div>
                                            <div class="col-md-2">Count</div>
                                            <div class="col-md-2">Unit Price($)</div>
                                        </div>
                                    </div>
                                    <div class="panel panel-body">
                                        <div id="panel-cart">
                                           
                                       </div> 
                                    </div>
                                    <div class="panel panel-footer">
                                        Total: 
                                    </div>
                                </div>
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
        
        
        
        
    </body>
</html>