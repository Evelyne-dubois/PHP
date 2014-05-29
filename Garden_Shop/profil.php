<?php

  session_start();
  include 'profil.inc.php';

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Mon profil | Garden Shop</title>

        <meta name="description" content="Garden shop, la plateforme d'échange et de vente de fruits et légumes entre particulier">
        <meta name="author" content="Evelyne Dubois">
        <meta name="keywords" content="Garden Shop, fruits, légumes, échanger, vendre, donner, potager, jardins, graines, confitures, jardiner, jardinage, verger, bio">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <link rel="icon" href="images/favicon.ico"/>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>

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
                        <li><a href="cueillettes.php">Cueillir<span class="spacing">soi-même</span></a></li>
                    </ul>
                    <a id="logo" href="index.php">Garden Shop</a>
                    <ul id="main-menu_account">
                      <?php
                        if(isset($_SESSION["user"])){
                          echo '<li><a class="current" href="profil.php">'.$_SESSION["user"].'</a></li>';
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
                          echo '<li><a class="current" href="profil.php">'.$_SESSION["user"].'</a></li>';
                          echo '<li><a href="logout.php">Se déconnecter</a></li>';
                        }else{
                          echo '<li><a class="open-popup-link" href="#connexion-popup">se connecter / s\'inscrire</a></li>';
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

        <iframe id="create_shop-popup" class="white-popup mfp-hide" src="create-shop.view.php" scrolling="no";></iframe>
        
        <div id="banner" class="<?php if($boutique_banner != ""){echo $boutique_banner;}else{ echo 'banner_shop_quatre';} ?>"></div>

        <div class="container">
            <div id="content" class="page-profil">

                <section>

                    <h2>Informations personnelles</h2>
                    <p>Vous pouvez compléter vos informations, ou les modifier à tout moment</p>

                    <ul>
                        <li><span>Pseudo</span><p class="profil-informarttion-380"><?php echo $_SESSION["user"]; ?></p></li>
                        <li><span>E-mail</span><p class="profil-informarttion-380"><?php echo $_SESSION["email"]; ?></p></li>
                        <li><span>Mot de passe</span><p class="profil-informarttion-380">******</p></li>
                        <li><span>Adresse n°1</span><p class="profil-informarttion-380"><?php echo $adress1 ?></p></li>
                        <li><span>Adresse n°2</span><p class="profil-informarttion-380"><?php if(($adress2 == "/ / / /")){echo '-';}else{ echo $adress2;} ?></p></li>
                        <li><span>Téléphone</span>-</li>
                        <li><span>gsm</span>-</li>
                    </ul>

                    <div class="button-edit">
                        <a href="javascript:void(0)">Modifier mes informations</a>
                    </div>

                </section>

                <section id="profil-magasin">

                    <h2>Mon magasin</h2>
                    
                    <?php if(isset($_SESSION["shop"])){ ?>

                      <p><strong><?php echo $_SESSION["shop"]; ?></strong></p>
                      <img id="satisfaction" src="<?php echo " images/$satisfaction.png"; ?>" alt="<?php echo $satisfaction; ?>" />
                      <p><img src="images/banner/<?php echo $boutique_banner_min; ?>.jpg" width="300" height="76" alt="<?php echo $boutique_banner; ?>"/></p>

                      <div class="button-edit">
                          <a href="javascript:void(0)">Modifier l'image</a>
                      </div>
                      
                      <?php 

                        echo '<div id="voir-boutique"><a class="profil-button" href="magasin.php?id=' . $_SESSION["id"] .'">Voir ma boutique en ligne</a></div>'; 

                        // if( $no_article == true){
                        //   echo '<h3>Pas d\'article en vente</h3>';
                        // }else{
                        //   echo '<h3>Article en vente</h3>';
                        // }
                      
                        echo '<h3>Article en vente</h3>';

                        include'profil.view.php'; 

                      ?>

                     <!--  <div class="button">
                          <a class="button-more" href="vendre.php">Ajouter un article</a>
                      </div> -->

                    <!-- <h3>Cueillette ouverte</h3> -->

                    <?php }else{ echo '<p>vous n\'aves pas de magasin.</p><p><a href="#create_shop-popup" class="open-popup-link profil-button">Créer mon magasin</a></p>';} ?>

                </section>

                <section id="profil-favoris">

                    <h2>Mes cultivateurs favoris</h2>

                    <div class="left">
                        <!-- <h3>Cultivateurs</h3> -->
                        <ul>
                            <li><a class="supprimer" href="javascript:void(0)"></a><a href="magasin.php?id=1">Jardin des gourmandises</a></li>
                            <li><a class="supprimer" href="javascript:void(0)"></a><a href="magasin.php?id=2">Douceurs aux quatre saisons</a></li>
                            <li><a class="supprimer" href="javascript:void(0)"></a><a href="magasin.php?id=5">Le voyage de Moby Dick</a></li>
                        </ul>
                    </div>

                </section>
               
    
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