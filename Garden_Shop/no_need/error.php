<?php

  session_start();

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Garden Shop</title>

        <meta name="description" content="Garden shop, la plateforme d'échange et de vente de fruits et légumes entre particulier">
        <meta name="author" content="Evelyne Dubois">
        <meta name="keywords" content="Garden Shop, fruits, légumes, échanger, vendre, donner, potager, jardins, graines, confitures, jardiner, jardinage, verger, bio">

        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
        <!-- <meta name="viewport" content="width=480"> -->

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!--[if gte IE 5]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->
        
        <link rel="icon" href="images/favicon.ico"/>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    </head>
 
    <body>

    	<header>
            <div class="container">
                <nav id="main-menu">
                    <ul id="main-menu_links">
                        <li><a href="acheter.php">Acheter</a></li>
                        <li><a href="
                          <?php 
                            if(isset($_SESSION["id"])){

                              if(isset($_SESSION["shop"]) && $_SESSION["shop"] != "" ){
                                echo 'vendre.php';
                              }else{
                                echo '#create_shop-popup" class="open-popup-link';
                              }
                            }else{
                              echo '#connexion-popup" class="open-popup-link';
                            }
                          ?>
                          ">Vendre</a></li>
                        <li><a href="cueillettes.php">Cueillettes</a></li>
                    </ul>
                    <a id="logo" class="current" href="index.php">Garden Shop</a>
                    <ul id="main-menu_account">
                      <?php
                        if(isset($_SESSION["user"])){
                          echo '<li><a href="profil.php">'.$_SESSION["user"].'</a></li>';
                          echo '<li><a href="logout.php">Se déconnecter</a></li>';
                        }else{
                          echo '<li><a class="open-popup-link" href="#connexion-popup">se connecter / s\'inscrire</a></li>';
                        }
                      ?>
                    </ul>
                </nav>

                <nav id="main-menu-smartphone">

                    <a id="logo-smartphone" class="current" href="index.php">Garden Shop</a>
                    <ul id="main-menu-account-smartphone">
                      <?php
                        if(isset($_SESSION["user"])){
                          echo '<li><a href="profil.php">'.$_SESSION["user"].'</a></li>';
                          echo '<li><a href="logout.php">Se déconnecter</a></li>';
                        }else{
                          echo '<li><a class="open-popup-link" href="#connexion-popup">se connecter<span class="smartphone-380-hide"> / s\'inscrire</span></a></li>';
                        }
                      ?>
                    </ul>

                    <ul id="main-menu-links-smartphone">
                        <li><a  href="acheter.php">Acheter</a></li>
                        <li class="text-center"><a href="
                          <?php 
                            if(isset($_SESSION["id"])){

                              if(isset($_SESSION["shop"]) && $_SESSION["shop"] != "" ){
                                echo 'vendre.php';
                              }else{
                                echo '#create_shop-popup" class="open-popup-link';
                              }
                            }else{
                              echo '#connexion-popup" class="open-popup-link';
                            }
                          ?>
                          ">Vendre</a></li>
                        <li class="text-right"><a href="cueillettes.php">Cueillettes</a></li>
                    </ul>
                    
                </nav>
            </div>
    	</header>

      <iframe id="connexion-popup" class="white-popup mfp-hide" src="connexion.view.php" scrolling="no";></iframe>
      <iframe id="create_shop-popup" class="white-popup mfp-hide" src="create-shop.view.php" scrolling="no";></iframe>

        <div id="banner" class="banner-error"></div>

        <div class="container">
            <div id="content" class="home">
                
                <section>
                    <h2>Les prochaines ceuillettes ouvertes</h2>
                    <p>Venez cueillir vos propres fruits et légumes et n’oubliez pas d’apporter vos paniers.</p>

                    <table class="cueillette-ouverte">
                       <thead>
                           <tr>
                               <th colspan="3">Samedi 14 Juin</th>
                           </tr>
                       </thead>

                       <tbody>
                           <tr>
                               <td class="heure"><a href="#">10h à 12h</a></td>
                               <td class="lieu"><a href="#">Saint-Servais</a></td>
                               <td class="articles"><a href="#">pommes, cerises, prune.</a></td>
                           </tr>
                           <tr>
                               <td class="heure"><a href="#">10h30 à 12h</a></td>
                               <td class="lieu"><a href="#">Wépion</a></td>
                               <td class="articles"><a href="#">fraises, framboises, cerises, salades, concombres.</a></td>
                           </tr>
                       </tbody>
                    </table>

                    <table class="cueillette-ouverte">
                       <thead>
                           <tr>
                               <th colspan="3">Lundi 17 Juin</th>
                           </tr>
                       </thead>

                       <tbody>
                           <tr>
                               <td class="heure"><a href="#">16h30 à 18h</a></td>
                               <td class="lieu"><a href="#">Nannine</a></td>
                               <td class="articles"><a href="#">pommes, mûres, radis.</a></td>
                           </tr>
                       </tbody>
                    </table>

                    <table class="cueillette-ouverte">
                       <thead>
                           <tr>
                               <th colspan="3">Mercredi 19 Juin</th>
                           </tr>
                       </thead>

                       <tbody>
                           <tr>
                               <td class="heure"><a href="#">18h à 20h</a></td>
                               <td class="lieu"><a href="#">Namur</a></td>
                               <td class="articles"><a href="#">pommes.</a></td>
                           </tr>
                       </tbody>
                    </table>

                    <div class="button">
                        <a class="button-more margin" href="cueillettes.php">Plus de cueillettes ouvertes</a>
                        <a class="button-more" href="vendre.php">Inscrire son jardin</a>
                    </div>
                </section>

                <section class="overflow">
                    <h2>Récoltes les plus répendues</h2>

                    <ul class="recoltes-rependues border">
                      <li class="recoltes-type">Fruits</li>
                      <li><a href="#">Pommes verte</a></li>
                      <li><a href="#">Fraises</a></li>
                      <li><a href="#">Cerises</a></li>
                      <li><a href="#">Framboises</a></li>
                    </ul>

                    <ul class="recoltes-rependues border no-border-480">
                      <li class="recoltes-type">Légumes</li>
                      <li><a href="#">Salades frisée</a></li>
                      <li><a href="#">Concombre</a></li>
                      <li><a href="#">Pommes de terre</a></li>
                      <li><a href="#">Haricots</a></li>
                    </ul>

                    <ul class="recoltes-rependues smartphone-480-hide">
                      <li class="recoltes-type">Graines</li>
                      <li><a href="#">Tomates</a></li>
                      <li><a href="#">Salades</a></li>
                      <li><a href="#">Radis</a></li>
                      <li><a href="#">Concombres</a></li>
                    </ul>

                      
                    
                    <div class="button">
                        <a class="button-more" href="acheter.php">Plus de récoltes</a>
                    </div>
                </section>

                <section class="last-section">

                    <h2>Récoltes à proximité</h2>
                    <label for="whereareyou" id="whereareyou-label">De</label>
                    <input type="text" value="Namur" name="" id="whereareyou">

                    <table class="recoltes-proximite">

                       <tbody>
                           <tr class="tres-proche">
                               <td class="distance"><a href="#"><span>3</span> km</a></td>
                               <td class="lieu"><a href="#">Saint-Servais</a></td>
                               <td class="articles"><a href="#">pommes, fraises, radis.</a></td>
                           </tr>
                           <tr class="tres-proche">
                               <td class="distance"><a href="#"><span>8</span> km</a></td>
                               <td class="lieur"><a href="#">Wépion</a></td>
                               <td class="articles"><a href="#">fraise.</a></td>
                           </tr>
                           <tr class="proche">
                               <td class="distance"><a href="#"><span>10</span> km</a></td>
                               <td class="lieu"><a href="#">Nannine</a></td>
                               <td class="articles"><a href="#">franboises, pommes de terre, concombres.</a></td>
                           </tr>
                           <tr class="loin">
                               <td class="distance"><a href="#"><span>19</span> km</a></td>
                               <td class="lieu"><a href="#">Andenne</a></td>
                               <td class="articles"><a href="#">tomates cerise, salades verte.</a></td>
                           </tr>
                       </tbody>
                    </table>

                    <div class="button">
                        <a class="button-more" href="acheter.php">Plus de récoltes</a>
                    </div>

                </section>

            </div><!-- content -->
            <aside id="widget" class="desktop-1000">

              <div id="meteo">
                
                <div id="today">
                  <a id="today-date" href="#">Aujourd'hui à Namur</a>
                  <div id="today-t">
                    <span>24C°</span>
                    <img src="images/widget/sun.png" alt="Grand soleil" />
                  </div>
                </div>
                  <ul id="next-days" class="show">
                    <li>
                      <div class="day">Vendredi 13 juin</div>
                      <div class="weather">9° / 22°</div>
                      <div class="icon"><img src="images/widget/small-sun.png" alt="Grand soleil" /></div>
                    </li>
                    <li>
                      <div class="day">Samedi 14 Juin</div>
                      <div class="weather">11° / 23°</div>
                      <div class="icon"><img src="images/widget/small-cloud.png" alt="Nuageux" /></div>
                    </li>
                    <li>
                      <div class="day">Dimanche 15 Juin</div>
                      <div class="weather">10° / 20°</div>
                      <div class="icon"><img src="images/widget/small-rain.png" alt="Pluie" /></div>
                    </li>
                    <li>
                      <div class="day">Lundi 16 Juin</div>
                      <div class="weather">9° / 23°</div>
                      <div class="icon"><img src="images/widget/small-rain-sun.png" alt="Mitigé" /></div>
                    </li>
                    <li id="reduce">Réduire</li>
                  </ul>
              </div>
       
            </aside>
        </div><!-- container -->

        <footer>
          <div class="container">
            <ul id="footer-menu">
              <li><a href="contact.html">Contact</a></li>
              <li><a href="contact.html">En savoir plus</a></li>
              <li><a href="contact.html">Crédits</a></li>
            </ul>
            <strong>Garden Shop ©2014</strong>
          </div>
        </footer>

        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script src="js/jquery.magnific-popup.js"></script>
        <script src="js/script.js"></script>

    </body>
</html>