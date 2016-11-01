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
                        <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>';
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
        
        <div class="main-content">
            <aside>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                           <div id="get_category"></div>
                            <!--<div class="nav nav-pills nav-stacked">
                                <li class="active"><a href="#">Category</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Categories</a></li>
                            </div>-->
                            <div id="get_brand"></div>
                             <!--<div class="nav nav-pills nav-stacked">
                                <li class="active" id="brand-side"><a href="#">Brand</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Categories</a></li>
                            </div>-->
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-info">
                               <div id = "added-product-msg"></div>
                                <div class="panel-heading">Products</div>
                                <div class="panel-body">
                                   <div id="get_product"></div>
                                    <!--<div class="col-md-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">Samsung Galaxy</div>
                                            <div class="panel-body">
                                                <img class="images" src="custom/imgs/Electronics/S6.jpg" alt="S6">
                                            </div>
                                            <div class="panel-heading">$500.00
                                                <button class="btn btn-danger btn-add-to-cart btn-xs">Add to cart</button>
                                            </div>
                                            
                                        </div>
                                    </div>-->
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <center>
                                            <ul class="pagination" id="page-no">
                                                <li><a href="#">1</a></li>
                                            </ul>
                                        </center>
                                    </div>
                                </div>
                                <div class="panel-footer">&copy; 2016</div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <script src="custom/js/main.js"></script>
    </body>
</html>