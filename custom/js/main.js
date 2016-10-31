

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
});