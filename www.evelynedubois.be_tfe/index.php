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

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <link rel="icon" href="images/favicon.ico"/>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    </head>
 
    <body>

    	<header>
            <div class="container">
                <nav id="main-menu">
                    <ul id="main-menu_links">
                        <li><a href="acheter.php">Trouver<span>des articles</span></a></li>
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
                          ">Ajouter<span>une récolte</span></a></li>
                        <li><a href="cueillettes.php">Cueillir<span>chez l'hôte</span></a></li>
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
                        <li><a  href="acheter.php">Trouver</a></li>
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
                          ">Ajouter</a></li>
                        <li class="text-right"><a href="cueillettes.php">Cueillir</a></li>
                    </ul>
                    
                </nav>
            </div>
    	</header>

      <iframe id="connexion-popup" class="white-popup mfp-hide" src="connexion.view.php" scrolling="no";></iframe>
      <iframe id="create_shop-popup" class="white-popup mfp-hide" src="create-shop.view.php" scrolling="no";></iframe>

        <div id="banner" class="banner-home">
            <div class="container">

                  <h1>Récoltes fraîches et locales</h1>
                  
                  <p>Nous sommes une petite communauté de jardiniers et de consommateurs à la recherche d'un nouveau mode de consommation.</p> 
                  <p>Pour participer à cette expérience en tant que cultivateur, vous pouvez vous 
                  <a href="
                  <?php 
                    if(!isset($_SESSION["id"])){
                      echo '#connexion-popup" class="open-popup-link';
                    }else{
                      echo 'javascript:void(0)';
                    }
                  ?>
                  ">connecter</a> ou vous 
                  <a href="
                  <?php 
                    if(!isset($_SESSION["id"])){
                      echo '#connexion-popup" class="open-popup-link';
                    }else{
                      echo 'javascript:void(0)';
                    }
                  ?>
                  ">inscrire</a>.</p>

            </div>
        </div>

        <div class="container">
            <div id="content" class="home">
                
                <section>
                    <h2>Les prochaines cueillettes ouvertes</h2>
                    <p>Les cultivateurs vous invitent à cueillir leurs fruits et légumes pour votre consommation personnelle.</p>
                    <p>N'oubliez pas vos paniers</p>

                    <table class="cueillette-ouverte">
                       <thead>
                           <tr>
                               <th colspan="3">Samedi 14 Juin</th>
                           </tr>
                       </thead>

                       <tbody>
                           <tr>
                               <td class="heure"><a href="magasin.php?id=1">10h à 12h</a></td>
                               <td class="lieu"><a href="magasin.php?id=1">Saint-Servais</a></td>
                               <td class="articles"><a href="magasin.php?id=1">pommes, cerises, prunes.</a></td>
                           </tr>
                           <tr>
                               <td class="heure"><a href="magasin.php?id=2">14h30 à 17h</a></td>
                               <td class="lieu"><a href="magasin.php?id=2">Wépion</a></td>
                               <td class="articles"><a href="magasin.php?id=2">fraises, framboises, pommes, poires.</a></td>
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
                               <td class="heure"><a href="magasin.php?id=3">16h30 à 18h</a></td>
                               <td class="lieu"><a href="magasin.php?id=3">Nannine</a></td>
                               <td class="articles"><a href="magasin.php?id=3">pommes, mûres.</a></td>
                           </tr>
                       </tbody>
                    </table>

                    <div class="button">
                        <a class="button-more margin" href="cueillettes.php">Plus de cueillettes ouvertes</a>
                        <a class="button-more" href="inscrire-sa-cueillette.php">Inscrire son jardin</a>
                    </div>
                </section>

                <section class="overflow">
                    <h2>Récoltes les plus répendues</h2>
                    <p>Nos cultivateurs vous proposent une grande variété de fruits et légumes.</p>
                    <p>N'hésitez pas à prendre contacte avec eux.</p>

                    <ul class="recoltes-rependues border">
                      <li class="recoltes-type">Fruits</li>
                      <li><a href="search-result.view.php?article=pommes&type=fruits">Pommes</a></li>
                      <li><a href="search-result.view.php?article=fraises&type=fruits">Fraises</a></li>
                      <li><a href="search-result.view.php?article=cerices&type=fruits">Cerises</a></li>
                      <li><a href="search-result.view.php?article=poires&type=fruits">Poires</a></li>
                    </ul>

                    <ul class="recoltes-rependues border no-border-480">
                      <li class="recoltes-type">Légumes</li>
                      <li><a href="search-result.view.php?article=salades&type=legumes">Salades</a></li>
                      <li><a href="search-result.view.php?article=radis&type=legumes">Radis</a></li>
                      <li><a href="search-result.view.php?article=tomates&type=legumes">Tomates</a></li>
                      <li><a href="search-result.view.php?article=pommes de terre&type=legumes">Pommes de terre</a></li>
                    </ul>

                    <ul class="recoltes-rependues smartphone-480-hide">
                      <li class="recoltes-type">Graines</li>
                      <li><a href="search-result.view.php?article=tomates&type=graines">Tomates</a></li>
                      <li><a href="search-result.view.php?article=radis&type=graines">Radis</a></li>
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
                               <td class="distance"><a href="magasin.php?id=1"><span>3</span> km</a></td>
                               <td class="lieu"><a href="magasin.php?id=1">Saint-Servais</a></td>
                               <td class="articles"><a href="magasin.php?id=1">pommes, cerises, radis...</a></td>
                           </tr>
                           <tr class="tres-proche">
                               <td class="distance"><a href="magasin.php?id=2"><span>8</span> km</a></td>
                               <td class="lieur"><a href="magasin.php?id=2">Wépion</a></td>
                               <td class="articles"><a href="magasin.php?id=2">fraises, pommes, salades, concombres...</a></td>
                           </tr>
                           <tr class="proche">
                               <td class="distance"><a href="magasin.php?id=3"><span>10</span> km</a></td>
                               <td class="lieu"><a href="magasin.php?id=3">Nannine</a></td>
                               <td class="articles"><a href="magasin.php?id=3">radis,salades, pommes de terre, mûres...</a></td>
                           </tr>
                           <tr class="loin">
                               <td class="distance"><a href="magasin.php?id=5"><span>19</span> km</a></td>
                               <td class="lieu"><a href="magasin.php?id=5">Andenne</a></td>
                               <td class="articles"><a href="magasin.php?id=5">tomates, pommes de terre, salades, framboises...</a></td>
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

                  <!-- <a id="today-date" href="#">Aujourd'hui à Namur</a> -->
                  <p id="today-date">Aujourd'hui à Namur</p>

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
              <li><a href="contact.php">Contact</a></li>
              <li><a href="terms.php">Termes et conditions</a></li>
            </ul>
            <strong>Garden Shop ©2014</strong>
          </div>
        </footer>

        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script src="js/jquery.magnific-popup.js"></script>
        <script src="js/script.js"></script>
        <!--[if lt IE 10]><script src="js/script_ie.js"></script><![endif]-->

    </body>
</html>