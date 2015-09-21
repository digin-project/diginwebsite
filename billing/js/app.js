$('input[name="paymentCard"]').on("keyup change", function(e){
    $input = $(this);
    if($input.val().length === 19) { return false; }
    $input.val(cc_format($input.val()));
});

// $('input[name="stripeAmount"]').on("keyup change", function(e){
//     var n = parseInt($(this).val().replace(/\D/g,''),10);
//     $(this).val(n.toLocaleString());
//     // //do something else as per updated question
//     // myFunc(); //call another function too
// });

function cc_format(value) {
    var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '')
    var matches = v.match(/\d{4,16}/g);
    var match = matches && matches[0] || ''
    var parts = []
    for (i = 0, len = match.length; i < len; i += 4) {
        parts.push(match.substring(i, i + 4))
    }
    if (parts.length) {
        return parts.join(' ')
    } else {
        return value
    }
}

$('#payment-form').submit(function(event) {
    event.preventDefault();
    var $form = $(this);
    $form.find('button').prop('disabled', true);
    $form.css('display','none');
    $('.spinner-container').css('display','block');
    Stripe.card.createToken($form, stripeResponseHandler);
    return false;
});

function stripeResponseHandler(status, response) {
    var $form = $('#payment-form');
    if (response.error) {
        $form.find('.payment-errors').text(response.error.message);
        $form.find('button').prop('disabled', false);
        $form.css('display','block');
        $('.spinner-container').css('display','none');
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        $form.get(0).submit();
    }
};
