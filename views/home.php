<?php require "fragments/head.php"; ?>
<body>

    <noscript>
        <div id="noscript">
            <p class="flow-text center-align">Oups, javascript n’est pas activé sur votre navigateur, ce qui ne vous permet pas de profiter de l’expérience de navigation sur notre site.</p>
        </div>
    </noscript>

    <div id="not_chrome">
        <p class="flow-text center-align">Pour une expérience plus fluide, utilisez un navigateur plus performant :
            <a href="https://www.google.com/chrome/browser/desktop/index.html" alt="Télécharger Google Chrome" target="_blank" rel="nofollow" title="Télécharger Google Chrome">Google Chrome</a>
        </p>
        <p class="flow-text center-align close">Non merci !</p>
    </div>

    <div id="wrapper">
        <!-- preloader -->
        <div id="preloader" class="valign-wrapper">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue-only actually-black">
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

        <!-- status spinner -->
        <div id="status">
            <div class="preloader-wrapper small active">
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

        <!-- Navigation bar -->
        <header class="navbar-fixed" id="nav">
            <nav>
                <div class="nav-wrapper">
                    <a href="/" alt="Digin" title="Digin" class="brand-logo"><img src="http://cdn.digin.fr/digin/logo.png" height="40" alt="Digin" title="Digin" /></a>
                    <a href="#" alt="Menu mobile" data-activates="mobile-menu" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                    <ul class="right hide-on-med-and-down table-of-contents">
                        <li><a href="#triangles" alt="Accueil" title="Accueil">Accueil</a></li>
                        <li><a href="#works" alt="Références" title="Références">Références</a></li>
                        <li><a href="#services" alt="Pertinence" title="Pertinence">Pertinence</a></li>
                        <li><a href="#lab" alt="Impertinence" title="Impertinence">Impertinence</a></li>
                        <li><a href="#contact" alt="Contact" title="Contact">Contact</a></li>
                    </ul>

                    <ul class="side-nav" id="mobile-menu">
                        <li><a href="#triangles" alt="Accueil" title="Accueil">Accueil</a></li>
                        <li><a href="#works" alt="Références" title="Références">Références</a></li>
                        <li><a href="#services" alt="Pertinence" title="Pertinence">Pertinence</a></li>
                        <li><a href="#lab" alt="Impertinence" title="Impertinence">Impertinence</a></li>
                        <li><a href="#contact" alt="Contact" title="Contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Triangles section -->
        <div id="triangles" class="scrollspy">
            <div id="output">
                <div class="h1-wrapper valign-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col s12">
                                <h1>Agence Web (im)pertinente</h1>
                            </div>
                        </div>
                    </div>
                    <a class="btn-floating btn-large waves-effect waves-dark green accent-2" id="explore">
                        <i class="mdi-navigation-arrow-forward indigo-text text-darken-4"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="divider"></div>
        </div>

        <!-- Works section -->
        <section class="section scrollspy" id="works">
            <div class="container">
                <div class="row">
                    <h2>Quelques projets récents</h2>

                    <div class="filter-options">
                       <a class="btn-flat waves-green-accent waves-effect active" id="all" data-group="all">Tout</a>
                       <a class="btn-flat waves-green-accent waves-effect" data-group="dev">Développement Web</a>
                       <a class="btn-flat waves-green-accent waves-effect" data-group="mobile">Mobile</a>
                       <a class="btn-flat waves-green-accent waves-effect" data-group="webmarketing">Webmarketing</a>
                   </div>
                </div>
            </div>
            <div class="wide-container container">
                <!-- Shuffle grid -->
                <div id="shuffle-grid" class="row">
                    <a href="/projet/trampolinepark" alt="Trampoline Park" title="Trampoline Park" id="trampolinepark" class="col s12 m6 l4 picture-item" data-groups='["webmarketing"]'>
                        <img src="http://cdn.digin.fr/digin/works/trampolinepark_cover.png" class="responsive-img" alt="Webmarketing pour Trampoline Park à Bordeaux">
                        <h5>Webmarketing Trampoline Park</h5>
                    </a>
                    <a href="/projet/cnrs" id="cnrs" alt="CNRS" title="CNRS" class="col s12 m6 l4 picture-item" data-groups='["dev"]'>
                        <img src="http://cdn.digin.fr/digin/works/cnrs.jpg" class="responsive-img" alt="client CNRS">
                        <h5>Webdesign CNRS</h5>
                    </a>
                    <a href="/projet/paarkin" id="paarkin" alt="Paarkin" title="Paarkin" class="col s12 m6 l4 picture-item" data-groups='["mobile"]'>
                        <img src="http://cdn.digin.fr/digin/works/paarkin.png" class="responsive-img" alt="Conception et développement de l'application mobile Paarkin">
                        <h5>Application mobile Paarkin</h5>
                    </a>
                    <a href="/projet/youkka" id="youkka" alt="Youkka" title="Youkka" class="col s12 m6 l4 picture-item" data-groups='["dev"]'>
                        <img src="http://cdn.digin.fr/digin/works/youkka.jpg" class="responsive-img" alt="Site Internet du réseau social Youkka">
                        <h5>Réseau Social Youkka</h5>
                    </a>
                    <a href="/projet/tourduhautmoulin" id="tourduhautmoulin" alt="Tour du Haut Moulin" title="Tour du Haut Moulin" class="col s12 m6 l4 picture-item" data-groups='["dev","webmarketing"]'>
                        <img src="http://cdn.digin.fr/digin/works/tourduhautmoulin.jpg" class="responsive-img" alt="Création site Web e-commerce Prestashop Chateau Tour du Haut Moulin">
                        <h5>E-commerce Haut Moulin</h5>
                    </a>
                    <a href="/projet/maiandra" id="maiandra" alt="Maiandra" title="Maiandra" class="col s12 m6 l4 picture-item" data-groups='["dev","webmarketing"]'>
                        <img src="http://cdn.digin.fr/digin/works/maiandra.jpg" class="responsive-img" alt="Identité et communication Web pour Salon de coiffure Maïandra">
                        <h5>Identité Maïandra</h5>
                    </a>
                    <a href="/projet/brosseau" id="brosseau" alt="Brosseau" title="Brosseau" class="col s12 m6 l4 picture-item" data-groups='["dev","webmarketing"]'>
                        <img src="http://cdn.digin.fr/digin/works/brosseau2.png" class="responsive-img" alt="Site Web et référencement naturel (SEO)">
                        <h5>Référencement brosseau.ca</h5>
                    </a>
                    <a href="/projet/gnubila" id="gnubila" alt="Gnubila" title="Gnubila" class="col s12 m6 l4 picture-item" data-groups='["dev"]'>
                        <img src="http://cdn.digin.fr/digin/works/gnubila.jpg" class="responsive-img" alt="Site Web Gnubila">
                        <h5>Site Web gnubila.fr</h5>
                    </a>
                    <a href="/projet/cfm" id="cfm" alt="CFM" title="CFM" class="col s12 m6 l4 picture-item" data-groups='["dev","webmarketing"]'>
                        <img src="http://cdn.digin.fr/digin/works/cfm.jpg" class="responsive-img" alt="Site Web mobile et SEO pour le CFM">
                        <h5>Mobile & SEO cfm33.com</h5>
                    </a>

                </div>
            </div>
        </section>

        <!-- Services section -->
        <section class="section grey-section scrollspy" id="services">
            <div class="container">
                <div class="row">
                    <h2>Pertinence</h2>
                    <div class="col s12 m10 offset-m1 l8 offset-l2">
                        <p class="flow-text center-align">
                            Une agence Web réactive, consciencieuse et efficiente.
                        </p>
                    </div>
                </div>

                <!-- Row with service icons -->
                <div class="row services">
                    <div class="col s12 l3">
                        <i class="material-icons md-48" style="color:#318be1">code</i>
                        <div class="divider"></div>
                        <h5>Développement <br> Web & mobile</h5>
                        <p>Création de site vitrine, développement sur mesure, conception d'application mobile, nous répondons à tous vos besoins en développement web et mobile avec les dernières technologies et règles d'optimisation SEO.</p>
                    </div>
                    <div class="col s12 l3">
                        <i class="material-icons md-48" style="color:#318be1">stars</i>
                        <div class="divider"></div>
                        <h5>Référencement <br> naturel (SEO)</h5>
                        <p>Qu'il s'agisse de seo on-site ou off-site (netlinking), nous mettons au point ensemble une stratégie gagnante avec des <b>résultats mesurables</b>. Nous avons toujours atteint et surpassé les objectifs établis en référencement naturel.</p>
                    </div>
                    <div class="col s12 l3">
                        <i class="material-icons md-48" style="color:#318be1">school</i>
                        <div class="divider"></div>
                        <h5>Formation <br> webmarketing</h5>
                        <p>Nous offrons 2 types de formations Webmarketing et Social Media : Google <b>AdWords</b> niveau débutant ou avancé, et la formation Community Management avec <b>Facebook</b>. Nos formations sont admissibles à une prise en charge OPCA / DIF. </p>
                    </div>
                    <div class="col s12 l3">
                        <i class="material-icons md-48" style="color:#318be1">trending_up</i>
                        <div class="divider"></div>
                        <h5>Stratégie <br> webmarketing</h5>
                        <p>Une présence Web réussie nécessite des objectifs et une stratégie adaptée. Nous connaissons les recettes qui fonctionnent de par nos <b>15 ans d'expérience</b> dans le Web, et les résultats que nous obtenons pour nos clients parlent d'eux mêmes.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Get started section -->
        <section class="section scrollspy" id="lab">
            <div class="container">
                <div class="row">
                    <h2>Impertinence</h2>
                    <div class="col s12 m10 offset-m1 l8 offset-l2">
                        <p class="flow-text center-align">
                            Peut-on être innovant sans être impertinent ?
                            Nous remettons régulièrement en question les solutions existantes et expérimentons nos propres concepts d'application web et mobile au travers de notre <a href="ajax/pages/digin-lab.html" class="ajax-link" id="digin-lab" alt="Notre lab" title="Notre lab">lab</a>.
                        </p>
                        <p class="center-align">
                            <a href="ajax/pages/digin-lab.html" id="digin-lab" alt="Notre lab" title="Notre lab" class="waves-effect waves-light btn-large green accent-2 indigo-text text-darken-4 ajax-link">
                                <i class="fa fa-flask left"></i>Découvrir nos projets
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="divider"></div>
        </div>

        <div class="container">
            <div class="divider"></div>
        </div>

        <!-- Contact form section -->
        <section class="section grey-section scrollspy" id="contact">
            <div class="container">
                <div class="row">
                    <h2>Nous contacter</h2>
                    <div class="col s12 m10 offset-m1 l8 offset-l2">
                        <p class="flow-text center-align">
                            Parlez-nous de votre projet ou passez nous le bonjour. Vos messages nous font toujours plaisir.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <form class="col s12 m12 l8 offset-l2" action="php/mailer.php" id="contact-form" novalidate>
                        <!-- This field helps us avoid spam bots, don't remove it -->
                        <div class="cant-touch-this">
                            <input type="text" name="hammertime" tabindex="-1" value="">
                        </div>
                        <!-- End of anti-spam field -->
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="first-name" name="first-name" type="text" class="required">
                                <label for="first-name">Prénom</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last-name" name="last-name" type="text">
                                <label for="last-name">Nom</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" class="required">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="message" name="message" class="materialize-textarea required"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="center-align">
                            <button type="submit" name="send" class="btn-large disabled">
                                Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="wide-container maps-no-padding">
                <div class="row">
                    <div class="col s12 maps-no-padding">
                        <!-- Google map container -->
                        <div id="map-canvas" class="map"></div>
                    </div>
                </div>
            </div>
            <div class="container contact-details">
                <div class="row">
                    <div class="col s12 m6 l4">
                        <h5>Bureaux</h5>
                        <div class="divider"></div>
                        <address>
                            <a href="http://www.darwin-ecosysteme.fr/" target="_blank">Espace Darwin</a> / <a href="http://bxno.de/" target="_blank">Le Node</a><br>
                            Bordeaux<br>
                        </address>
                    </div>
                    <div class="col s12 m6 l4">
                        <h5>Nous joindre</h5>
                        <div class="divider"></div>
                        <p>
                            +33 9 84 29 94 71<br>
                            <a href="mailto:contact@digin.fr" alt="Notre adresse email" title="Notre adresse email">contact@digin.fr</a>
                        </p>
                    </div>
                    <div class="col s12 m6 l4 modern-connect">
                        <h5>Se connecter</h5>
                        <div class="divider"></div>
                        <p>
                            <a href="skype:freekers" alt="Notre Skype" title="Notre Skype"><i class="fa fa-skype"></i> digin.skype</a><br>
                            <a href="https://www.facebook.com/digin.agenceweb" alt="Notre Facebook" title="Notre Facebook"><i class="fa fa-facebook"></i> facebook</a><br>
                            <a href="https://twitter.com/agencedigin" alt="Notre Twitter" title="Notre Twitter"><i class="fa fa-twitter"></i> twitter</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer section -->
        <footer class="page-footer">
            <div class="footer-copyright">
                <div class="container">
                    © 2015 Digin | <a href="ajax/pages/mentions-legales.html" id="mentions-legales" alt="Mentions légales" title="Mentions légales" class="ajax-link">Mentions légales</a>
                </div>
            </div>
        </footer>

    </div>

    <div id="ajax-box" class="translate"></div>
    <?php require "fragments/script.php"; ?>
</body>
</html>
