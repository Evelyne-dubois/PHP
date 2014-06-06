<?php

  session_start();

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Acheter | Garden Shop</title>

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
                        <li><a class="current" href="acheter.php">Trouver<span>des articles</span></a></li>
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
                        <li><a href="cueillettes.php">Cueillir<span class="spacing">chez l'hôte</span></a></li>
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
                        <li><a class="current" href="acheter.php">Trouver</a></li>
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

        <iframe id="connexion-popup" class="white-popup mfp-hide" src="connexion.view.php" scrolling="no"></iframe>
        <iframe id="create_shop-popup" class="white-popup mfp-hide" src="create-shop.view.php" scrolling="no";></iframe>
        
        <div id="banner" class="banner-acheter"></div>

        <div class="container">
            <div id="content" class="page-acheter">

                <div id="recherche-formulaire">
                    <h2>Trouver un article spécifique</h2>

                    <form action="search.inc.php" method="post">

                        <fieldset>
                            <label for="search-article">Que cherchez-vous?</label>
                            <?php if( isset( $errors['search_article'] ) ) echo message_erreur($errors, 'search_article'); ?>
                            <input type="text" name="search_article" id="" placeholder="Fruit, légume, confiture..." value="<?php if( !empty( $_POST['search_article'] ) ) echo $_POST['search_article']; ?>"/>

                            <?php if( isset( $errors['search_type'] ) ) echo message_erreur($errors, 'search_type'); ?>
                            <select name="search_type">
                              <option class="default" value="type" <?php //if( $search_article == 'type' ) echo 'selected="selected"';?> >Type</option>
                              <option value="legumes" <?php //if( $search_article == 'legumes/fruits' ) echo 'selected="selected"';?>>légumes</option>
                              <option value="fruits" <?php //if( $search_article == 'legumes/fruits' ) echo 'selected="selected"';?>>Fruits</option>
                              <option value="graines" <?php //if( $search_article == 'graines' ) echo 'selected="selected"';?>>Graines de semences</option>
                              <option value="confitures" <?php //if( $search_article == 'confitures' ) echo 'selected="selected"';?>>Confitures</option>
                              <option value="boissons" <?php //if( $search_article == 'boissons' ) echo 'selected="selected"';?>>Boissons</option>
                              <option value="aromatiques" <?php //if( $search_article == 'aromatiques' ) echo 'selected="selected"';?>>Plantes aromatiques</option>
                            </select>
                        </fieldset>

                        <fieldset> 
                            <label>Priorité de recherche</label>

                            <select name="first">
                              <option class="default" value="ordre" selected="selected">Rechercher par...</option>
                              <option value="localité">Localité</option>
                              <option value="appreciations">Appréciations</option>
                              <option value="favoris">Favoris</option>
                              <option value="variete">Variété d'articles</option>
                            </select>

                            <select name="second">
                              <option class="default" value="ordre" selected="selected">Rechercher par...</option>
                              <option value="localité">Localité</option>
                              <option value="appreciations">Appréciations</option>
                              <option value="favoris">Favoris</option>
                              <option value="variete">Variété d'articles</option>
                            </select>
                        </fieldset> 

                        <input type="submit" name="submit" value="Rechercher">
                    </form>

                </div>

                <div id="recherche-carte">
                   <h2>Trouver des produits à proximité</h2>

                   <div id="googlemap">
                    <div id="gmap-recherche"></div>

                      <div id="gmap-shop_1"></div>
                      <div id="gmap-shop_2"></div>

                    <div id="gmap-tools"></div> 
                   </div>

                    <div id="mapselected">
                        <table>
                            <tr id="gmapselected-shop_1" class="hide">
                                <td class="magasin"><a href="magasin.php?id=6">Fruits et légumes de Namur</a></td>
                                <td class="tiret"><a href="magasin.php?id=6">-</a></td>
                                <td class="articles"><a href="magasin.php?id=6">salades, radis, tomates, cerices...</a></td>
                            </tr>
                            <tr id="gmapselected-shop_2" class="hide">
                                <td class="magasin"><a href="magasin.php?id=4">Le petit potager</a></td>
                                <td class="tiret"><a href="magasin.php?id=4">-</a></td>
                                <td class="articles"><a href="magasin.php?id=4">tomates, radis, concombres, pommes.</a></td>
                            </tr>
                        </table>
                    </div>

                </div>
    
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