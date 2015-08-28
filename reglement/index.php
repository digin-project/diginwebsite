<?php
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

        unset($_POST);
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
        <link rel="icon" type="image/png" href="http://digin.fr/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="stylesheet" href="css/main.css" media="screen" charset="utf-8">
    </head>
    <body>
        <div id="form-container">

            <?php if(!$success) { ?>
            <a href="http://digin.fr" target="_blank"><img class="logo" src="http://cdn.digin.fr/digin/logo.png" /></a>
            <div id="form-wrapper">
                <form action="" method="POST" id="payment-form">
                    <h1>Votre interface de paiement sécurisée avec <a href="https://stripe.com/fr" target="_blank"><img class="stripe-logo" src="http://cdn.digin.fr/digin/stripe.png" height="30" /></a><span class="copyright-icon">&copy;</span></h1>
                    <span class="payment-errors"></span>

                    <div class="form-row card">
                        <label>
                            <input type="text" size="16" minlength="16" maxlength="16" required data-stripe="number" placeholder="Numéro de carte"/>
                            <input type="text" size="3" minlength="3" maxlength="3" required data-stripe="cvc" placeholder="CVC"/>
                        </label>

                    </div>
                    <div class="form-row exp">
                        <label>
                            <span>Expiration</span>
                            <input type="text" size="2" minlength="2" maxlength="2" required data-stripe="exp-month" placeholder="MM"/>
                        </label>
                            <span> / </span>
                            <input type="text" size="4" minlength="4" maxlength="4" required data-stripe="exp-year" placeholder="YYYY"/>
                    </div>

                    <div class="form-row amount">
                        <label>
                            <span>Montant</span>
                            <input type="text" autocomplete="false" spellcheck="false" name="stripeAmount" data-stripe="amount" value="<?php print ($get_amount) ?: $get_amount; ?>" placeholder="Montant (ex. 1999.99)" />
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
                    <img src="http://cdn.digin.fr/digin/payment.png" height="40" />

                    <p class="copyright"><?php echo date("Y"); ?> &copy; Digin - <a href="mailto:facturation@digin.fr">facturation@digin.fr</a></p>
                </form>
                <div class="spinner-container"><div class="spinner"></div></div>
            </div>

            <?php } else { ?>
                <a href="http://digin.fr" target="_blank"><img class="logo" src="http://cdn.digin.fr/digin/logo.png" /></a>
                <div id="form-wrapper">
                    <div id="payment-form">
                        <p>Merci pour votre règlement, pour toute question adressez vous à <a href="mailto:facturation@digin.fr">facturation@digin.fr</a></p>
                        <p class="copyright"><?php echo date("Y"); ?> &copy; Digin - <a href="mailto:facturation@digin.fr">facturation@digin.fr</a></p>
                    </div>
                </div>
            <?php } ?>

        </div>

        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js" charset="utf-8"></script>
        <script type="text/javascript">Stripe.setPublishableKey("<?php print API_KEY; ?>");</script>
        <script type="text/javascript" src="js/app.js"></script>
    </body>
</html>
