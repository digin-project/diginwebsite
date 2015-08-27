<?php
    require_once "../vendor/stripe/stripe-php/init.php";
    require_once "stripe_config.php";

    $payment_secret = "732a06cb5b6776c385a89c24d3b1ab81319af09c9a412ab9";
    $success = false;
    \Stripe\Stripe::setApiKey(API_SECRET);

    if(isset($_POST) && !empty($_POST)) {
        $token = $_POST['stripeToken'];
        // Create the charge on Stripe's servers - this will charge the user's card
        try {
        $charge = \Stripe\Charge::create(array(
            "amount" => $_POST['stripeAmount'] * 100, // amount in cents, again
            "currency" => "eur",
            "source" => $token,
            "description" => "Example charge")
        );

        $success = true;
        } catch(\Stripe\Error\Card $e) {
          // The card has been declined
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Digin - Reglements</title>
        <style media="screen">
            * {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
            }
            html, body {
                width: 100%;
                height: 100%;
                position: relative;
                margin: 0;
                font-family: "Roboto", arial, sans-serif;
                background-color: #fafafa;
            }
            #form-container {
                width: 100%;
                max-width: 420px;
                height: 300px;
                position: absolute;
                top: 0; left: 0; right: 0; bottom: 0;
                margin: auto;
            }
            #payment-form {
                width: 100%;
                padding: 30px;
                background: #fff;
                border-radius: 3px;
                box-shadow: 0 2px 10px 0px rgba(0,0,0,.1);
            }
            #payment-form button[type="submit"] {
                background: #318be1;
                padding: 9px 12px;
                border: none;
                border-radius: 3px;
                color: #fff;
                cursor: pointer;
            }
            #payment-form button[disabled] {
                background: #999;
            }
            .form-row {
                overflow: hidden;
                margin-bottom: 20px;
            }
            .form-row input {
                color: #444;
                padding: 9px 12px;
                outline: none;
                border: 1px solid rgba(0, 0, 0, .2);
                border-radius: 3px;
            }
            .form-row input:focus {
                border-color: #318be1;
                outline: none;
            }
            .form-row.card input {
                width: 75%;
                float: left;
            }
            .form-row.card input:last-child {
                width: 25%;
                float: left;
            }
            .form-row.amount input {
                width: calc(100% - 94px);
            }
            .form-row.amount label span {
                margin-right: 30px;
            }
            .form-row.exp label span:first-child {
                margin-right: 30px;
            }
        </style>
    </head>
    <body>
        <div id="form-container">
            <?php if(!$success) { ?>
            <form action="" method="POST" id="payment-form">
                <span class="payment-errors"></span>

                <div class="form-row card">
                    <label>
                        <input type="text" size="20" max-length="20" required data-stripe="number" placeholder="Numéro de cartes" value="4242 4242 4242 4242"/>
                        <input type="number" size="4" max-length="4" required data-stripe="cvc" placeholder="CVC" value="123"/>
                    </label>
                </div>

                <div class="form-row exp">
                    <label>
                        <span>Expiration (MM/YYYY)</span>
                        <input type="text" size="2" max-length="2" required data-stripe="exp-month" placeholder="MM" value="11"/>
                    </label>
                        <span> / </span>
                        <input type="text" size="4" max-length="4" required data-stripe="exp-year" placeholder="YYYY" value="19"/>
                </div>

                <div class="form-row amount">
                    <label>
                        <span>Montant</span>
                        <input type="text" name="stripeAmount" data-stripe="amount" placeholder="Montant" value="20" />
                    </label>
                </div>

                <div class="form-row">
                    <label>
                        <span>Devise</span>
                    </label>
                    <input type="radio" name="stripeCurrency" checked value="eur"> Euros
                    <input type="radio" name="stripeCurrency" value="dol"> Dollars
                </div>

                <input type="hidden" name="paymentTime" value="<?php print time(); ?>" />
                <button type="submit">Valider le paiement</button>
            </form>
            <?php } else { ?>
                <p>Merci !</p>
            <?php } ?>
        </div>

        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js" charset="utf-8"></script>

        <script type="text/javascript">
          Stripe.setPublishableKey("<?php print API_KEY; ?>");

          $('#payment-form').submit(function(event) {
            event.preventDefault();
            var $form = $(this);
            $form.find('button').prop('disabled', true);
            Stripe.card.createToken($form, stripeResponseHandler);
            return false;
          });

          function stripeResponseHandler(status, response) {
          var $form = $('#payment-form');

          if (response.error) {
            $form.find('.payment-errors').text(response.error.message);
            $form.find('button').prop('disabled', false);
          } else {
            var token = response.id;
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            $form.get(0).submit();
          }
        };

        </script>

    </body>
</html>
