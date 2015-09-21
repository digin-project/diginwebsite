<?php require "fragments/head.php"; ?>
<body style="overflow: auto;">

    <a class="btn-floating btn-large waves-effect waves-dark green accent-2" href="/">
        <i class="mdi-navigation-close indigo-text text-darken-4"></i>
    </a>

    <div class="parallax-container" id="hero">
        <div class="parallax"><img src="http://cdn.digin.fr/digin/works/trampolinepark-detail/trampolinepark_cover.png" alt="Webmarketing pour Trampoline Park Bordeaux"></div>
    </div>

    <article class="container">
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <h1>
                    <?php print $data["title"]; ?>
                </h1>
                <p class="flow-text grey lighten-4 padding-text">
                    Client : <?php print $data["client"]; ?> <br>
                    Mission : <?php print $data["mission"]; ?>
                </p>
                <p class="flow-text">
                    <?php print $data["text"]; ?>
                </p>
            </div>
        </div>

        <?php if($data["img"]) { ?>
        <div class="row">
            <div class="col s12 m10 offset-m1">
                <img src="<?php print $data["img"]["url"]; ?>" alt="<?php print $data["img"]["alt"]; ?>" class="responsive-img">
            </div>
        </div>
        <?php } ?>

        <?php if($data["end_text"]) { ?>
        <div class="row">
            <div class="col s12 m10 offset-m1">
                 <p class="flow-text">
                    <?php print $data["end_text"]; ?>
                </p>
            </div>
        </div>
        <?php } ?>


        <?php if(empty($data["isPaarkin"]) || !$data["isPaarkin"]) { ?>
        <div class="row">

            <?php if($data["url"]) { ?>
            <div class="col s12 m5 offset-m1">
                <p class="flow-text">
                    <a href="<?php print $data["url"]; ?>" target="_blank"><?php print $data["url_text"]; ?><i class="fa fa-external-link"></i></a>
                </p>
            </div>
            <?php } ?>

            <?php if($data["facebook"]) { ?>
            <div class="col s12 m5">
                <p class="flow-text right-on-med-and-up social">
                    <?php print $data["facebook_text"]; ?>
                    <a href="<?php print $data["facebook"]; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                </p>
            </div>
            <?php } ?>

        </div>
        <?php } else { ?>
        <div class="row">
            <div class="col s12 m5 offset-m1">
                <p class="flow-text">
                    <a href="http://paark.in" target="_blank">Plus d'infos sur le site paark.in<i class="fa fa-external-link"></i></a>
                </p>
                <p class="flow-text">
                    <a href="https://itunes.apple.com/fr/app/paarkin/id980062452?mt=8" target="_blank">Application iPhone sur l'App Store<i class="fa fa-external-link"></i></a>
                </p>
                <p class="flow-text">
                    <a href="https://play.google.com/store/apps/details?id=com.digin.paarkin" target="_blank">Application Android<i class="fa fa-external-link"></i></a>
                </p>
            </div>
            <div class="col s12 m5">
                <p class="flow-text right-on-med-and-up social">
                    Paarkin sur les réseaux sociaux :
                    <a href="https://www.facebook.com/paarkinfr" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/paarkinfr" target="_blank"><i class="fa fa-twitter"></i></a>
                </p>
            </div>
        </div>
        <?php } ?>

    </article>
    <?php require "fragments/script.php"; ?>
</body>
</html>
