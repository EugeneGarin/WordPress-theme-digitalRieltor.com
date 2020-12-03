jQuery(function ($) {
    //js script for checkout form, that deliver product name and code from $_REQUEST to hidden fiels
    $(document).ready(function(){
    	// console.log(_request);
    	$(".order-form .productName input").val(_request["product_name"]).attr("readonly", true);
    	$(".order-form .productId input").val(_request["product_id"]).attr("readonly", true);
    	$(".order-form input, textarea").css("max-width", "100%");
    	$(".order-form").wrapAll('<div class="row"><div class="order-form-left col-12 col-md-6 order-2 order-md-1"></div></div>');
    	$(".order-form-left").after(
    		'<div class="order-form-right col-12 col-md-6 order-1 order-md-2">'+
    		'<img class="rounded mx-auto d-block" src="'+_request["product_image_url"]+'" alt="product image">'+
    		'<h3 class="text-center">'+_request["product_name"].replace("\\", "")+'</h3>'+
    		'<div class="product-price text-center" style="color: #77a464; font-size: 1.25em; margin-bottom: 0.5rem;">$ '+_request["product_price"]+'</div>'+
    		'<div>'+_request["product_short_description"].replace("\\", "")+'</div>'+
    		'</div>');
    });
});