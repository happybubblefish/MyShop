<?php
    include "db.php";
    session_start();

    if(isset($_POST["category"])){
        $category_query = "SELECT * from category";
        $run_query = mysqli_query($conn, $category_query);
        
        echo "
            <div class='nav nav-pills nav-stacked'>
                <li class='active'><a href='#'><h4>Categories</h4></a></li>
        ";
        
        if(mysqli_num_rows($run_query) > 0){
            while($row = mysqli_fetch_array($run_query)){
                $ca_id = $row["ca_id"];
                $ca_title = $row["ca_title"];
                
                echo "
                    <li><a href='#' class='category' ca_id='$ca_id'>$ca_title</a></li>
                ";
            }
            
            echo "</div>";
        }
    }


    if(isset($_POST["brand"])){
        $brand_query = "SELECT * from brand";
        $run_query = mysqli_query($conn, $brand_query);
        
        echo "
             <div class='nav nav-pills nav-stacked'>
                <li class='active'><a href='#'><h4>Brand</h4></a></li>
        ";
        
        if(mysqli_num_rows($run_query) > 0){
            while($row = mysqli_fetch_array($run_query)){
                $brand_id = $row["brand_id"];
                $brand_title = $row["brand_title"];
                
                echo "
                    <li><a href='#' class='brand' brand_id='$brand_id'>$brand_title</a></li>
                ";
            }
            
            echo "</div>";
        }
    }

    if(isset($_POST["product"])){
        $product_query = "SELECT * from product order by RAND() limit 0, 9";
        $run_query = mysqli_query($conn, $product_query);
        
        if(mysqli_num_rows($run_query) > 0){
            while($row = mysqli_fetch_array($run_query)){
                $product_id = $row["product_id"];
                $product_cat = $row["product_cat"];
                $product_brand = $row["product_brand"];
                $product_title = $row["product_title"];
                $product_price = $row["product_price"];
                $product_desc = $row["product_desc"];
                $product_image = $row["product_image"];
                
                echo "
                    <div class='col-md-4'>
                                        <div class='panel panel-info'>
                                            <div class='panel-heading>$product_title</div>
                                            <div class='panel-body'>
                                                <img class='images' src='custom/imgs/$product_image' alt='$product_image'>
                                            </div>
                                            <div class='panel-heading'>$$product_price
                                                <button product_id='$product_id' class='btn btn-danger btn-add-to-cart btn-xs'>Add to cart</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                ";
            }
        }
    }

    if(isset($_POST["selected_category"])){
        $cid = $_POST["ca_id"];
        $product_query = "SELECT * from product where product_cat=$cid";
        $run_query = mysqli_query($conn, $product_query);
        
        while($row = mysqli_fetch_array($run_query)){
             $product_id = $row["product_id"];
                $product_cat = $row["product_cat"];
                $product_brand = $row["product_brand"];
                $product_title = $row["product_title"];
                $product_price = $row["product_price"];
                $product_desc = $row["product_desc"];
                $product_image = $row["product_image"];
                
                echo "
                    <div class='col-md-4'>
                                        <div class='panel panel-info'>
                                            <div class='panel-heading>$product_title</div>
                                            <div class='panel-body'>
                                                <img class='images' src='custom/imgs/$product_image' alt='$product_image'>
                                            </div>
                                            <div class='panel-heading'>$$product_price
                                                <button class='btn btn-danger btn-add-to-cart btn-xs'>Add to cart</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                ";
        }
    }

    if(isset($_POST["selected_brand"])){
        $bid = $_POST["brand_id"];
        $brand_query = "SELECT * from product where product_brand=$bid";
        $run_query = mysqli_query($conn, $brand_query);
        
        while($row = mysqli_fetch_array($run_query)){
                $product_id = $row["product_id"];
                $product_cat = $row["product_cat"];
                $product_brand = $row["product_brand"];
                $product_title = $row["product_title"];
                $product_price = $row["product_price"];
                $product_desc = $row["product_desc"];
                $product_image = $row["product_image"];
                
                echo "
                    <div class='col-md-4'>
                                        <div class='panel panel-info'>
                                            <div class='panel-heading>$product_title</div>
                                            <div class='panel-body'>
                                                <img class='images' src='custom/imgs/$product_image' alt='$product_image'>
                                            </div>
                                            <div class='panel-heading'>$$product_price
                                                <button class='btn btn-danger btn-add-to-cart btn-xs'>Add to cart</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                ";
        }
    }

    if(isset($_POST["search"])){
        $keyword = $_POST["keyword"];
        $search_query = "SELECT * from product where product_keyword LIKE '%$keyword%'";
        $run_query = mysqli_query($conn, $search_query);
        
        while($row = mysqli_fetch_array($run_query)){
                $product_id = $row["product_id"];
                $product_cat = $row["product_cat"];
                $product_brand = $row["product_brand"];
                $product_title = $row["product_title"];
                $product_price = $row["product_price"];
                $product_desc = $row["product_desc"];
                $product_image = $row["product_image"];
                
                echo "
                    <div class='col-md-4'>
                                        <div class='panel panel-info'>
                                            <div class='panel-heading>$product_title</div>
                                            <div class='panel-body'>
                                                <img class='images' src='custom/imgs/$product_image' alt='$product_image'>
                                            </div>
                                            <div class='panel-heading'>$$product_price
                                                <button class='btn btn-danger btn-add-to-cart btn-xs'>Add to cart</button>
                                            </div>
                                            
                                        </div>
                                    </div>
                ";
        }
    }

    if(isset($_POST["addToCart"])){
        $pid = $_POST["pid"];      
        
        if(!isset($_SESSION["cart"])){
            $_SESSION["cart"] = array();
        }
        
        if(!isset($_SESSION["total_count"])){
            $_SESSION["total_count"] = 0;
        }
        
        $total_count = $_SESSION["total_count"];
        $cart = $_SESSION["cart"];
        $count = 0;
                
        if(!empty($cart[$pid])){
            $count = $cart[$pid];
            $count = $count + 1;
        }else{
            $count = 1;
        }
        
        $total_count++;
        $_SESSION["total_count"] = $total_count;
        
        $cart[$pid] = $count;
        $_SESSION["cart"] = $cart;
           
        echo 
            $total_count;
    }

    /* Show cart */
    if(isset($_GET["getCart"])){
        if(isset($_SESSION["cart"])){        
            $cart = $_SESSION["cart"];
            
            $total_price = 0.00;
        
            $keys = array_keys($cart);
            foreach($keys as $pid){
                $query = "SELECT * from product where product_id = '$pid'";
                $run_query = mysqli_query($conn, $query);

                if($row = mysqli_fetch_array($run_query)){
                    $product_id = $row["product_id"];
                    $product_title = $row["product_title"];
                    $product_image = $row["product_image"];
                    $product_price = $row["product_price"];
                    $product_count = $cart[$pid];
                    $total_price = $total_price + $product_price * $product_count;
                    
                    $_SESSION["total_price"] = $total_price;
                    echo "
                        <div class='row product-row'>
                            <div class='col-md-2 no-center'>$product_id</div>
                            <div class='col-md-2'><img style='height:50px;' class='images' src='custom/imgs/$product_image'></div>
                            <div class='col-md-2 no-center'>$product_title</div>
                            <div class='col-md-2'><input type='number' min='0' class='product-qty' pid='$product_id' id='count-$product_id' name='count' value='$product_count'/></div>
                            <div class='col-md-2 no-center product-price' pid='$product_id' id='price-$product_id'>$product_price</div>
                            <div class='col-md-2 product-delete' pid='$product_id'>
                                <a href='#'><span class='glyphicon glyphicon-trash'></span></a>
                        </div>
                       </div>
                    ";
                }
            }
        }else{
            echo "<div class='alert alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Your cart is empty.</b>
                </div>";
        }
    }

    /* Get initialized cart */
    if(isset($_GET["getTotal"])){
        $total = isset($_SESSION["total_price"]) ? $_SESSION["total_price"] : 0;
        echo "Total: $".$total;
    }

    /* Real time change total. */
    if(isset($_GET["getRealTimeTotal"])){
        $pid = $_GET["pid"];
        $count = $_GET["count"];
        
        if(isset($_SESSION["cart"])){        
            $cart = $_SESSION["cart"];
            
            $cart[$pid] = $count;
            $_SESSION["cart"] = $cart;
            
            $total_price = 0.00;
            $keys = array_keys($cart);
            foreach($keys as $pid){
                $query = "SELECT * from product where product_id = '$pid'";
                $run_query = mysqli_query($conn, $query);

                if($row = mysqli_fetch_array($run_query)){
                    $product_id = $row["product_id"];
                    $product_price = $row["product_price"];
                    $product_count = $cart[$pid];
                    $total_price = $total_price + $product_price * $product_count;
                }
            }
        }
        
        echo "Total: $".$total_price;
    }

    if(isset($_POST["deleteProduct"])){
        $pid = $_POST["pid"];
        if(isset($_SESSION["cart"])){    
            $cart = $_SESSION["cart"];
            
            unset($cart[$pid]);
            
            $_SESSION["cart"] = $cart;
            
            $total_price = 0.00;
        
            $keys = array_keys($cart);
            
            if(sizeof($keys) == 0){
                $_SESSION["total_price"] = 0;
                exit();
            }
            
            foreach($keys as $pid){
                $query = "SELECT * from product where product_id = '$pid'";
                $run_query = mysqli_query($conn, $query);

                if($row = mysqli_fetch_array($run_query)){
                    $product_id = $row["product_id"];
                    $product_title = $row["product_title"];
                    $product_image = $row["product_image"];
                    $product_price = $row["product_price"];
                    $product_count = $cart[$pid];
                    $total_price = $total_price + $product_price * $product_count;
                    
                    $_SESSION["total_price"] = $total_price;
                    echo "
                        <div class='row product-row'>
                            <div class='col-md-2 no-center'>$product_id</div>
                            <div class='col-md-2'><img style='height:50px;' class='images' src='custom/imgs/$product_image'></div>
                            <div class='col-md-2 no-center'>$product_title</div>
                            <div class='col-md-2'><input type='number' min='0' class='product-qty' pid='$product_id' id='count-$product_id' name='count' value='$product_count'/></div>
                            <div class='col-md-2 no-center product-price' pid='$product_id' id='price-$product_id'>$product_price</div>
                            <div class='col-md-2 product-delete' pid='$product_id'>
                                <a href='#'><span class='glyphicon glyphicon-trash'></span></a>
                        </div>
                       </div>
                    ";
                }
            }
        }
    }
?>