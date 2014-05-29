<?php
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Cueillettes ouvertes | Garden Shop</title>

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
                        <li><a href="acheter.php">Acheter<span>des produits</span></a></li>
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
                          ">Vendre<span>ses récoltes</span></a></li>
                        <li><a class="current" href="cueillettes.php">Cueillir<span class="spacing">soi-même</span></a></li>
                    </ul>
                    <a id="logo" href="index.php">Garden Shop</a>
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

                  <!-- For smartphone -->
                  <nav id="main-menu-smartphone">

                        <a id="logo-smartphone" href="index.php">Garden Shop</a>
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
                            <li class="text-right"><a class="current" href="cueillettes.php">Cueillettes</a></li>
                        </ul>
                        
                    </nav>
              </div>
      	</header>

        <iframe id="connexion-popup" class="white-popup mfp-hide" src="connexion.view.php" scrolling="no"></iframe>
        <iframe id="create_shop-popup" class="white-popup mfp-hide" src="create-shop.view.php" scrolling="no";></iframe>
        
        <div id="banner" class="banner-cueillette"></div>

        <div class="container">
            <div id="content" class="page-cueillette">

                <h2>Toutes les cueillettes ouvertes</h2>

                <p>Vous pouvez spécifier votre ville actuelle pour calculer la distance qui vous sépare des jardins.</p>
                <form action="javascript:void(0)" method="post">
                    <input type="text" name="" placeholder="Ville, CP" >
                    <input type="submit" name="submit" value="Actualiser">
                </form>

                <div class="button">
                    <a class="button-more" href="inscrire-sa-cueillette.php
                      <?php 
                            // if(isset($_SESSION["id"])){

                            //   if(isset($_SESSION["shop"]) && $_SESSION["shop"] != "" ){
                            //     echo 'vendre.php" class="banner-button';
                            //   }else{
                            //     echo '#create_shop-popup" class="open-popup-link banner-button';
                            //   }
                            // }else{
                            //   echo '#connexion-popup" class="open-popup-link banner-button';
                            // }
                      ?>
                    ">Inscrire son jardin</a>
                </div>

                 <table class="cueillette-ouverte">
                       <thead>
                           <tr>
                               <th colspan="3">Samedi 14 Juin</th>
                               <th class="distance" >d. Namur</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td class="heure"><a href="magasin.php?id=1">10h à 12h</a></td>
                               <td class="lieu"><a href="magasin.php?id=1">Saint-Servais</a></td>
                               <td class="articles"><a href="magasin.php?id=1">pommes, cerises, prune.</a></td>
                               <td class="distance"><a href="magasin.php?id=1">3 Km</a></td>
                           </tr>
                           <tr>
                               <td class="heure"><a href="magasin.php?id=2">14h30 à 17h</a></td>
                               <td class="lieu"><a href="magasin.php?id=2">Wépion</a></td>
                               <td class="articles"><a href="magasin.php?id=2">fraises, framboises, pommes, poires.</a></td>
                               <td class="distance"><a href="magasin.php?id=2">8 Km</a></td>
                           </tr>
                       </tbody>
                    </table>

                    <table class="cueillette-ouverte">
                       <thead>
                           <tr>
                               <th colspan="3">Lundi 17 Juin</th>
                               <th class="distance" >d. Namur</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td class="heure"><a href="magasin.php?id=3">16h30 à 18h</a></td>
                               <td class="lieu"><a href="magasin.php?id=3">Nannine</a></td>
                               <td class="articles"><a href="magasin.php?id=3">pommes, mûres.</a></td>
                               <td class="distance"><a href="magasin.php?id=3">10 Km</a></td>
                           </tr>
                       </tbody>
                    </table>

                    <table class="cueillette-ouverte">
                       <thead>
                           <tr>
                               <th colspan="3">Mercredi 19 Juin</th>
                               <th class="distance" >d. Namur</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td class="heure"><a href="magasin.php?id=4">18h à 20h</a></td>
                               <td class="lieu"><a href="magasin.php?id=4">Namur</a></td>
                               <td class="articles"><a href="magasin.php?id=4">pommes.</a></td>
                               <td class="distance"><a href="magasin.php?id=4">0 Km</a></td>
                           </tr>
                       </tbody>
                    </table>
               
            </div><!-- content -->
        </div><!--container -->

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