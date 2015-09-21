<?php require "fragments/head.php"; ?>
<div id="ajax-status">
    <div class="preloader-wrapper large active">
        <div class="spinner-layer spinner-blue-only actually-green">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div>
            <div class="gap-patch">
                <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
    </div>
</div>

<a class="btn-floating btn-large waves-effect waves-dark green accent-2" id="close-ajax">
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

    <div class="row">
        <div class="col s12 m10 offset-m1">
            <img src="<?php print $data["img"]; ?>" alt="Formation Google AdWords avancé" class="responsive-img" data-caption="Formation Google AdWords avancé">
        </div>
    </div>


    <div class="row">
        <div class="col s12 m10 offset-m1">
             <p class="flow-text">
               Dans une deuxième phase, nous avons accompagné Trampoline Park au travers d'une formation Google Adwords de niveau avancé.
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m5 offset-m1">
            <p class="flow-text">
                <a href="http://trampolinepark.fr" target="_blank">Visitez trampolinepark.fr<i class="fa fa-external-link"></i></a>
            </p>
        </div>
        <div class="col s12 m5">
            <p class="flow-text right-on-med-and-up social">
                Trampoline Park sur facebook :
                <a href="https://www.facebook.com/letsjumpbordeaux" target="_blank"><i class="fa fa-facebook"></i></a>
            </p>
        </div>
    </div>
</article>
