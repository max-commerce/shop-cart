var AddToCartSuccessCallback = function(data){
    maxCommAddToCartSuccess(data);
};
$(document).on('submit','.max-comm-add-to-cart-form',function(e){
    e.preventDefault();

    $.post($(this).attr('action'),$(this).serialize(),function(data){
            AddToCartSuccessCallback(data);
    });
});