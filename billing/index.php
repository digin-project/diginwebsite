<?php
    header('Access-Control-Allow-Origin: https://digin.fr');
    header('Access-Control-Allow-Origin: http://cdn.digin.fr');

    require_once "vendor/stripe/stripe-php/init.php";
    require_once "stripe_config.php";

    $payment_secret = FORM_SECRET;
    $success = false;
    $get_amount = (isset($_GET["amount"])) ? $_GET["amount"] : false;
    $get_currency = (isset($_GET["currency"])) ? $_GET["currency"] : "cad";

    \Stripe\Stripe::setApiKey(API_SECRET);

    if(isset($_POST) && !empty($_POST)) {
        $token = $_POST['stripeToken'];
        try {
        $charge = \Stripe\Charge::create(array(
            "amount" => $_POST['stripeAmount'] * 100, // amount in cents, again
            "currency" => $_POST['stripeCurrency'],
            "source" => $token,
            "description" => "Example charge")
        );

        $success = true;
        } catch(\Stripe\Error\Card $e) {
          // The card has been declined
        }
    }

    function sanitize_output($buffer) {
        $search = array(
            '/\>[^\S ]+/s',
            '/[^\S ]+\</s',
            '/(\s)+/s'
        );
        $replace = array(
            '>',
            '<',
            '\\1'
        );
        $buffer = preg_replace($search, $replace, $buffer);
        return $buffer;
    }

    ob_start("sanitize_output");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <title>Digin - Interface de paiement sécurisée</title>
        <link rel="icon" type="image/png" href="/billing/images/favicon-32x32.png" sizes="32x32">
        <link rel="stylesheet" href="/billing/css/main.css" media="screen" charset="utf-8">
        <style media="screen and (max-width: 500px)">
            html, body { background: #fafafa; padding-top: 30px; }
            #payment-form h1 { font-size: 22px; }
            #payment-form img.stripe-logo { height: 24px; }
            .form-row.card input:last-child { width: 30%; margin-left: 0; }
            .form-row.exp label span:first-child { display: block; margin-right: 0; margin-bottom: 10px; }
            .form-row.amount input { width: calc(100% - 94px); margin-left: 0; }
            #payment-form button[type="submit"] { width: 100%; margin-bottom: 20px; }
            #payment-form img:not(.stripe-logo) { margin: 0; display: block; margin: 0 auto; }
            #payment-form .separator { display: none; }
            #payment-form input.exp { width: calc(50% - 2px); }
        </style>
    </head>
    <body>
        <div id="form-container">

            <?php if(!$success) { ?>
            <a href="https://digin.fr" target="_blank"><img class="logo" src="/billing/images/logo.png" /></a>
            <div id="form-wrapper">
                <form action="" method="POST" id="payment-form">
                    <h1>Votre interface de paiement sécurisée avec <a href="https://stripe.com/fr" target="_blank"><img class="stripe-logo" src="/billing/images/stripe.png" height="30" /></a><span class="copyright-icon">&copy;</span></h1>
                    <span class="payment-errors"></span>

                    <div class="form-row card">
                        <input type="text" size="19" minlength="19" maxlength="19" name="paymentCard" required data-stripe="number" placeholder="Numéro de carte"/>
                        <input type="text" size="3" minlength="3" maxlength="3" name="paymentCVC" required data-stripe="cvc" placeholder="CVC"/>
                    </div>
                    <div class="form-row exp">
                        <label>
                            <span>Expiration</span>
                            <input type="text" size="2" minlength="2" maxlength="2" class="exp" required data-stripe="exp-month" placeholder="MM"/>
                        </label>
                            <span class="separator"> / </span>
                            <input type="text" size="4" minlength="4" maxlength="4" class="exp" required data-stripe="exp-year" placeholder="YYYY"/>
                    </div>

                    <div class="form-row amount">
                        <label>
                            <span>Montant</span>
                            <input type="text" autocomplete="false" spellcheck="false" required name="stripeAmount" data-stripe="amount" value="<?php print ($get_amount) ?: $get_amount; ?>" placeholder="ex. 1 999.99" />
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Devise</span>
                        </label>
                        <input type="radio" name="stripeCurrency" <?php print ($get_currency == "eur") ? "checked" : "" ?> value="eur"> EUR
                        <input type="radio" name="stripeCurrency" <?php print ($get_currency == "cad") ? "checked" : "" ?> value="cad"> CAD
                    </div>

                    <input type="hidden" name="paymentTime" value="<?php print time(); ?>" />
                    <button type="submit">Valider le paiement</button>
                    <img src="/billing/images/payment.png" height="40" />

                    <p class="copyright"><?php echo date("Y"); ?> &copy; Digin - <a href="mailto:facturation@digin.fr">facturation@digin.fr</a></p>
                </form>
                <div class="spinner-container"><div class="spinner"></div></div>
            </div>

            <?php } else { ?>
                <a href="http://digin.fr" target="_blank"><img class="logo" src="/billing/images/logo.png" /></a>
                <div id="form-wrapper">
                    <div id="payment-form">
                        <p>Merci pour votre règlement de
                            <?php print $_POST['stripeAmount']; print ($_POST['stripeCurrency'] == "eur") ? "&euro;" : "&#36;" ?>
                            , pour toute question adressez vous à <a href="mailto:facturation@digin.fr">facturation@digin.fr</a></p>
                        <p class="copyright"><?php echo date("Y"); ?> &copy; Digin - <a href="mailto:facturation@digin.fr">facturation@digin.fr</a></p>
                    </div>
                </div>
                <?php unset($_POST); ?>
            <?php } ?>

        </div>

        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js" charset="utf-8"></script>
        <script type="text/javascript">Stripe.setPublishableKey("<?php print API_KEY; ?>");</script>
        <script type="text/javascript" src="/billing/js/app.js"></script>
    </body>
</html>
