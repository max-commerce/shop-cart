var AddToCartSuccessCallback = function(data){
    maxCommAddToCartSuccess(data);
};
var cartLinkReload = function(data){
    $('.maxcom-cart-link-total').each(function(){
            $(this).html(data.total);
    });
    $('.maxcom-cart-link-count').each(function(){
        $(this).html(data.products_count);
    });

};

$(document).on('submit','.max-comm-add-to-cart-form',function(e){
    e.preventDefault();

    $.post($(this).attr('action'),$(this).serialize(),function(data){
            AddToCartSuccessCallback(data);
            cartLinkReload(data);
    });
});
