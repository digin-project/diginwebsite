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
    </article>
    <?php require "fragments/script.php"; ?>
</body>
</html>
