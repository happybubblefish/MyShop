<?php
    include "db.php";
    
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
                                                <button class='btn btn-danger btn-add-to-cart btn-xs'>Add to cart</button>
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
?>