

$(function () {
   'use strict';
    
   showCategory();
    
   function showCategory(){
       $.ajax({
           url: "action.php",
           method: "POST",
           data: {category: 2},
           success: function(data){
               $("#get_category").html(data);
           }
       });
   }
    
    showBrand();
    
    function showBrand(){
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {brand: 1},
            success: function(data){
                $("#get_brand").html(data);
            }
        });
    }
    
    showProducts();
    
    function showProducts(){
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {product: 1},
            success: function(data){
                $("#get_product").html(data);
            }
        });
    }
    
    $("body").delegate(".category", "click", function(event){
        event.preventDefault();
        var cid = $(this).attr('ca_id');
        
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                selected_category: 1,
                ca_id: cid
            },
            success: function(data){
                $("#get_product").html(data);
            }
        });
    });
    
    $("body").on("click", ".brand", function(event){
        event.preventDefault();
        var bid = $(this).attr("brand_id");
    
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                selected_brand: 1,
                brand_id: bid
            },
            success: function(data){
                $("#get_product").html(data);
            }
        });
    });
    
    $("#search_btn").click(function(){
        var keyword = $("#search").val();
        
        if(keyword !== ""){
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    search: 1,
                    keyword: keyword
                },
                success: function(data){
                    $("#get_product").html(data);
                }
            });
        }
    });
    
    $("#signup_btn").click(function(event){
        event.preventDefault();
        $.ajax({
            url: "action_registration.php",
            method: "POST",
            data: $("form").serialize(),
            success: function(data){
                $("#signup_msg").html(data);
            }
        });
    });
    
    $("#login").click(function(event){
        event.preventDefault();
        
        var email = $("#email").val();
        var password = $("#password").val();
        
        $.ajax({
            url: "account.php",
            method: "POST",
            data: { 
                login: 1,
                email: email,
                password: password
            },
            success: function(data){
                if(data === "success"){
                    window.location.href = "index.php";
                }
            }
        });
    });
    
    $("#logout").click(function(event){
        event.preventDefault();
        
        $.ajax({
            url: "account.php",
            method: "GET",
            data: { 
                logout: 1
            },
            success: function(data){
                if(data === "destroyed"){
                    window.location.href = "index.php";
                }
            }
        });
    });
    
    $("body").on("click", ".btn-add-to-cart", function(event){
        event.preventDefault();
        var pid = $(this).attr("product_id");
        
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                addToCart: 1,
                pid: pid
            },
            success: function(data){
                if(data > 0){
                    
                var content = "<div class='alert alert-success'> " +
                                "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + 
                                "<b>Product added successfully." + " Your cart has " + data + " item(s)." + "</b>" +  
                              "</div>";
                }
                
                $("#added-product-msg").html(content);
                $(".badge").html(data);
            }
        });
    });
    
    $("#cart-btn").click(function(event){
        event.preventDefault();
        
        $.ajax({
            url: "action.php",
            method: "GET",
            data: { getCart: 1},
            success: function(data){
                $("#panel-cart").html(data);
            }
        });
    });
});