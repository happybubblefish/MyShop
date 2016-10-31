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
                        <div class="panel panel-primary">
                            <div class="panel-heading">Customer Signup Form</div>
                            <div class="panel-body">
                               <form method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="firstname">First name</label>
                                            <input type="text" class="form-control" name="firstname" id="firstname">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="lastname">Last name</label>
                                            <input type="text" class="form-control" name="lastname" id="lastname">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="confirmpassword">Re-enter password</label>
                                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-4">
                                            <label for="mobile">Mobile</label>
                                                <input type="text" class="form-control" name="mobile" id="mobile">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="address1">Address1</label>
                                            <input type="text" class="form-control" name="address1" id="address1">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="address2">Address2</label>
                                            <input type="text" class="form-control" name="address2" id="address2">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="button" id="signup_btn" value="Signup" name="signup_btn" class="btn btn-success btn-lg">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>