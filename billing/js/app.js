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
