<?php

  session_start();

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Contact | Garden Shop</title>

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

        <div id="banner" class="banner-home banner-contact"></div>

        <div class="container">
            <div id="content" class="contact">
              
              <div id="presentation">
                <p class="text-center">Garden Shop à été réalisé dans le cadre d'un travail de fin d'étude en web design & multimedia.</p>
                <p class="text-center">Merci d'avoir visiter le site, vous pouvez me contacter via <a href="https://twitter.com/Frenchdede89">twitter</a> ou en me laissant un message ci-dessous</p>
              </div>
               
                <section>
                    <form action="contact.inc.php" method="post">

                        <legend>Contact</legend>
                        <p>Une question, une suggestion ou un avis sur Garden Shop?</p>

                        <fieldset id="annonce">

                            <?php if( isset( $errors['email'] ) ) echo message_erreur($errors, 'email'); ?>
                            <input type="text" name="email" placeholder="E-mail" value="<?php if( !empty( $_POST['email'] ) ) echo $_POST['email']; ?>"/>
                            <?php if( isset( $errors['object'] ) ) echo message_erreur($errors, 'object'); ?>
                            <input type="text" name="object" placeholder="Objet" value="<?php if( !empty( $_POST['object'] ) ) echo $_POST['object']; ?>"/>
                            <?php if( isset( $errors['message'] ) ) echo message_erreur($errors, 'message'); ?>
                            <textarea name="message" placeholder="Votre message..." value="<?php if( !empty( $_POST['message'] ) ) echo $_POST['message']; ?>"></textarea>
                            <input type="submit" name="submit" value="Envoyer">

                        </fieldset>
                    </form>             

                </section>

            </div><!-- content -->
        </div><!-- container -->

        <footer>
          <div class="container">
            <ul id="footer-menu">
              <li><a class="current" href="contact.php">Contact</a></li>
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