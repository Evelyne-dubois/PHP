<?php

  session_start();
  include 'magasin.inc.php';

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Boutique | Garden Shop</title>

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
                        <li><a class="current" href="acheter.php">Acheter<span>des produits</span></a></li>
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
                        <li><a class="current" href="acheter.php">Acheter</a></li>
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

      <iframe id="connexion-popup" class="white-popup mfp-hide" src="connexion.view.php" scrolling="no"></iframe>
      <iframe id="create_shop-popup" class="white-popup mfp-hide" src="create-shop.view.php" scrolling="no";></iframe>
      
      <div id="banner" class="<?php echo $boutique_banner; ?>"></div>

        <div class="container">
            <div id="content" class="page-magasin">

            <div id="information-magasin">
                
                <section>
                    <h2><?php echo $shop ?></span></h2>
                    <p>Magasin de <strong><?php echo $user ?></strong></p>
                    <img id="satisfaction" src="<?php echo " images/$satisfaction.png"; ?>" alt="<?php echo $satisfaction; ?>" />
                    <ul>
                      <li><span>Adresse n°1</span><p><?php echo $adress1 ?></p></li>
                      <li><span>Adresse n°2</span><p><?php if(($adress2 == "/ / / /")){echo '-';}else{ echo $adress2;} ?></p></li>
                    </ul>

                    <div id="googlemap-magasin"></div>

                    <div id="action">
                        <!-- <div class="button"> -->
                            <a class="button-more" id="fav-button" href="#">Ajouter au favoris</a>
                        <!-- </div> -->
                        <!-- <p><span>Satisfait</span><img src="images/vote.png" alt="voter" /></p> -->

                        <!-- Clickez sur l'étoile de votre choix pour valider le vote:<br /><br /> -->
                        <p>
                          <span>Satisfait</span>
                          <img src="images/star_0.png" id='_1' onclick="valider()" onmouseover="rate(1)" />
                          <img src="images/star_0.png" id='_2' onclick="valider()"  onmouseover="rate(2)" />
                          <img src="images/star_0.png" id='_3' onclick="valider()"  onmouseover="rate(3)" />
                          <img src="images/star_0.png" id='_4' onclick="valider()"  onmouseover="rate(4)" />
                          <img src="images/star_0.png" id='_5' onclick="valider()"  onmouseover="rate(5)" />
                        </p>
                        <!-- <br /><br/> -->
                        <!-- <div id="vote">Votre vote : 0 étoile(s) </div><br /><br/> -->
                        <!-- <input type="button" onclick="zero();" value="reset"/> -->

                    </div>
                </section>

                <section>
                    <h2>Articles disponnibles</h2>
                    <p>Dernières mise à jours, le 11 Juin 2014</p>

                    <?php include 'magasin.view.php'; ?>

                </section>

                <section>

                   <h2>Conversation</h2>
                    <form action="javascript:void(0)" method="post" id="add-conversation">
                      <input type="text" placeholder="pseudo">
                      <textarea placeholder="votre commentaire"></textarea>
                      <input type="submit" value="commenter">
                    </form>

                    <?php
                   
                    if($id_magasin == 1){
                
                      echo '

                      <table id="conversation">
                          <tr>
                            <td class="pseudo">Arthur</td>
                            <td class="message">Super accueil, avec plein de conseils en bonus. les cerises sont délicieuses.</td>
                          </tr>
                          <tr>
                            <td class="pseudo">Marc</td>
                            <td class="message">Beau jardin, ça donne envie de se mettre au jardinage. Merci pour les belles pommes.</td>
                          </tr>
                          <tr>
                            <td class="pseudo">Anne</td>
                            <td class="message">Bon produit, accueil agréable, que demander de plus!</td>
                          </tr>
                          <tr>
                            <td class="pseudo">Anne</td>
                            <td class="message">Allez vous proposer des cornichons cette année? Je vous en ai acheté l\'an passé, et ce sont les meilleurs que je n\'ai jamais mangés!</td>
                          </tr>
                          <tr>
                            <td class="pseudo">Hélène</td>
                            <td class="message">Merci pour vos conseils de jardinages, je n\ai plus de problème de parasites maintenant.</td>
                          </tr>
                        </table>

                        <div class="button">
                          <a class="button-more disable" href="javascript:void(0)">plus de commentaire</a>
                        </div>

                        ';

                    }else{

                      if ($id_magasin == 2){

                      echo '

                      <table id="conversation">
                          <tr>
                            <td class="pseudo">Sylvie</td>
                            <td class="message">Grâce à vos belles framboises, j\'est fait de la confiture avec, mes enfants en raffolent.</td>
                          </tr>
                          <tr>
                            <td class="pseudo">Mike</td>
                            <td class="message">Des pommes de terre maison, parfaite pour faire de bonne frites.</td>
                          </tr>
                          <tr>
                            <td class="pseudo">Julien</td>
                            <td class="message">Agréable jardin, j\'y reviendrais tous les samedis faire le plein de produits frais!</td>
                          </tr>
                        </table>

                        ';

                      }else{

                        if ($id_magasin == 3){

                          echo '
                           
                          <table id="conversation">
                            <tr>
                              <td class="pseudo">Amélie</td>
                              <td class="message">Salades, radis, pommes, basilics, j\'est tout dévalisé et je ne regrette pas!</td>
                            </tr>
                            <tr>
                              <td class="pseudo">Paul</td>
                              <td class="message">Mes enfants adorent venir cueillir leurs propres fruits, il en redemande tous les week-ends.</td>
                            </tr>
                            <tr>
                              <td class="pseudo">Julie</td>
                              <td class="message">Dommage que la cueillette se termine à 16h30, je quitte le boulot à cette heure-là!</td>
                            </tr>
                          </table>

                           ';

                        }else{

                          if ($id_magasin == 4){

                          echo '

                            <table id="conversation">
                              <tr>
                                <td class="pseudo">Pierre</td>
                                <td class="message">Énorme quantité de pommes, si vous voulez faire de la compote, tarte ou autres, il y en aura pour tout le monde.</td>
                              </tr>
                              <tr>
                                <td class="pseudo">Jeanne</td>
                                <td class="message">Délicieuse tomate bien juteuse comme je les aime.</td>
                              </tr>
                            </table>

                           ';

                          }
                        }  
                      }
                    }

                    ?>

                </section>

            </div>

            <aside id="magasin-sidebar">

                <div id="jardin-ouvert">

                  <?php
                   
                    if($id_magasin == 1){
                
                      echo '
                        <h2>Cueillettes ouvertes</h2>

                        <p>Le Samedi 14 Juin de 10h à 12h</p>

                        <p class="label">Adresse</p>
                        <p class="no-padding">9 rue des cidres</p>
                        <p class="no-padding">5002 Saint-Servais</p>

                        <p class="label">Article à disposition</p>
                        <p class="no-padding">pommes, cerises, prune.</p>

                        <p class="label">Description</p>
                        <p class="no-padding">Jardin des gourmandises vous ouvre ses portes avec deux grands pommiers, un beau cerisier et trois pruniers. N\'hésitez pas à me contacter pour toutes infomations supplémentaires.</p>';

                    }else{

                      if ($id_magasin == 2){

                      echo '
                        <h2>Cueillettes ouvertes</h2>

                        <p>Le Samedi 14 Juin de 14h30 à 17h</p>

                        <p class="label">Adresse</p>
                        <p class="no-padding">4 rue des carmes</p>
                        <p class="no-padding">5100 Wépion</p>

                        <p class="label">Article à disposition</p>
                        <p class="no-padding">fraises, framboises, pommes, poires.</p>

                        <p class="label">Description</p>
                        <p class="no-padding">Venez gouter à l\'été avec vos enfants.</p>';

                      }else{

                        if ($id_magasin == 3){

                          echo '
                            <h2>Cueillettes ouvertes</h2>

                            <p>Le Lundi 17 Juin de 16h30 à 18h</p>

                            <p class="label">Adresse</p>
                            <p class="no-padding">42 rue des champs</p>
                            <p class="no-padding">5100 Nannine</p>

                            <p class="label">Article à disposition</p>
                            <p class="no-padding">pommes, mûres.</p>

                            <p class="label">Description</p>
                            <p class="no-padding">Dégustations et ventes de produits frais</p>';

                        }else{

                          if ($id_magasin == 4){

                          echo '
                            <h2>Cueillettes ouvertes</h2>

                                <p>Le Lundi 17 Juin de 18 à 20h</p>

                                <p class="label">Adresse</p>
                                <p class="no-padding">26 route de la victoire</p>
                                <p class="no-padding">5000 Namur</p>

                                <p class="label">Article à disposition</p>
                                <p class="no-padding">pommes</p>

                                <p class="label">Description</p>
                                <p class="no-padding">Pommes à volonté, venez vous servir!</p>';

                          }
                        }  
                      }
                    }

                    ?>

                     
                    
                </div>
    
                <div id="contact-magasin">
                    <h2>Contact</h2>
                    <p>Contacter <?php echo $user ?></p>
                    <form action="contact-magasin.inc.php" method="post">

                        <fieldset id="annonce">
                            <?php if( isset( $errors['email'] ) ) echo message_erreur($errors, 'email'); ?>
                            <input type="text" name="email" placeholder="E-mail" value="<?php if( !empty( $_POST['email'] ) ) echo $_POST['email']; ?>"/>
                            <?php if( isset( $errors['object'] ) ) echo message_erreur($errors, 'object'); ?>
                            <input type="text" name="object" placeholder="Objet" value="<?php if( !empty( $_POST['object'] ) ) echo $_POST['object']; ?>"/>
                            <?php if( isset( $errors['message'] ) ) echo message_erreur($errors, 'message'); ?>
                            <textarea name="message" placeholder="Votre message..."><?php if( !empty( $_POST['message'] ) ) echo $_POST['message']; ?></textarea>
                            <input type="submit" name="submit" value="Envoyer">

                        </fieldset>
                    </form>

                </div>
            </aside>

               
    
            </div><!-- content -->
        </div><!--container -->

        <footer id="footer-magasin">
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