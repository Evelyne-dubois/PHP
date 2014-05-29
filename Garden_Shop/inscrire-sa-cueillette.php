<?php
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Inscrire sa cueillette ouverte | Garden Shop</title>

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
            <div id="content" class="page-inscrire-cueillette">

                <h2>Inscrire sa cueillette ouverte</h2>
                <p>Pour inscrire votre jardin à une cueillette ouverte, veuillez remplir le formulaire.</p>
                <!-- <p><span>L'inscription d'une cueillette ouverte n'est pas encore disponnible.</span></p> -->

                <form action="inscrire-sa-cueillette.inc.php" method="post">

                        <fieldset class="modalite">

                            <legend>Modalité</legend>
                            <h3>Adresse</h3>

                            <ul>
                                <li>
                                    <?php if( isset( $errors['adresse_numero'] ) ) echo message_erreur($errors, 'adresse_numero'); ?>
                                    <?php if( isset( $errors['adresse_rue'] ) ) echo message_erreur($errors, 'adresse_rue'); ?>
                                    <input type="text" name="adresse_numero" class="numero" placeholder="n°" value="<?php if( !empty( $_POST['adresse_numero'] ) ) echo $_POST['adresse_numero']; ?>"/>
                                    <input type="text" name="adresse_rue" class="rue" placeholder="Rue" value="<?php if( !empty( $_POST['adresse_rue'] ) ) echo $_POST['adresse_rue']; ?>"/>
                                </li>
                                <li>
                                    <?php if( isset( $errors['adresse_cp'] ) ) echo message_erreur($errors, 'adresse_cp'); ?>
                                    <?php if( isset( $errors['adresse_ville'] ) ) echo message_erreur($errors, 'adresse_ville'); ?>
                                    <input type="text" name="adresse_cp" class="cp" placeholder="Localité" value="<?php if( !empty( $_POST['adresse_cp'] ) ) echo $_POST['adresse_cp']; ?>"/>
                                    <input type="text" name="adresse_ville" class="ville" placeholder="Ville" value="<?php if( !empty( $_POST['adresse_ville'] ) ) echo $_POST['adresse_ville']; ?>"/>
                                </li>
                            </ul>

                            <!-- <select name="adresse-presaved">
                                <option value="maison" selected="selected">Nouveau</option>
                              <option value="maison" selected="selected">Maison</option>
                              <option value="jardin">jardin</option>
                            </select> -->

                            <select name="adresse_pays" class="pays">
                              <option value="belgique" selected="selected">Belgique</option>
                              <option value="france">France</option>
                            </select>
                            
                            <div id="horaire-cueillette">
                                  
                                <h3>Horaire</h3>
                                
                                <?php if( isset( $errors['date'] ) ) echo message_erreur($errors, 'date'); ?>
                                <input type="date" class="date" name="date" placeholder="" value="<?php if( !empty( $_POST['date'] ) ){ echo $_POST['date'];}else{echo 'Jour de la cueillette ouverte';} ?>">

                                  <div class="heure-select">
                                  <label>De</label>
                                   <select name="debut_cueillette" id="debut-cueillette">
                                     <option value="7h">7h</option>
                                     <option value="7h30">7h30</option>
                                     <option value="8h">8h</option>
                                     <option value="8h30">8h30</option>
                                     <option value="9h">9h</option>
                                     <option value="9h30">9h30</option>
                                     <option value="10h">10h</option>
                                     <option value="10h30">10h30</option>
                                     <option value="11h">11h</option>
                                     <option value="11h30">11h30</option>
                                     <option value="12h">12h</option>
                                     <option value="12h30">12h30</option>
                                     <option value="13h">13h</option>
                                     <option value="13h30">13h30</option>
                                     <option value="14h">14h</option>
                                     <option value="14h30">14h30</option>
                                     <option value="15h">15h</option>
                                     <option value="15h30">15h30</option>
                                     <option value="16h">16h</option>
                                     <option value="16h30">16h30</option>
                                     <option value="17h">17h</option>
                                     <option value="17h30">17h30</option>
                                     <option value="18h">18h</option>
                                     <option value="18h30">18h30</option>
                                     <option value="19h">19h</option>
                                     <option value="19h30">19h30</option>
                                     <option value="20h">20h</option>
                                     <option value="20h30">20h30</option>
                                     <option value="21h">21h</option>
                                     <option value="21h30">21h30</option>
                                     <option value="22h">22h</option>
                                  </select>

                                  <label>à</label>
                                  <select name="fin_cueillette"  id="fin-cueillette">
                                     <option value="7h">7h</option>
                                     <option value="7h30">7h30</option>
                                     <option value="8h">8h</option>
                                     <option value="8h30">8h30</option>
                                     <option value="9h">9h</option>
                                     <option value="9h30">9h30</option>
                                     <option value="10h">10h</option>
                                     <option value="10h30">10h30</option>
                                     <option value="11h">11h</option>
                                     <option value="11h30">11h30</option>
                                     <option value="12h">12h</option>
                                     <option value="12h30">12h30</option>
                                     <option value="13h">13h</option>
                                     <option value="13h30">13h30</option>
                                     <option value="14h">14h</option>
                                     <option value="14h30">14h30</option>
                                     <option value="15h">15h</option>
                                     <option value="15h30">15h30</option>
                                     <option value="16h">16h</option>
                                     <option value="16h30">16h30</option>
                                     <option value="17h">17h</option>
                                     <option value="17h30">17h30</option>
                                     <option value="18h">18h</option>
                                     <option value="18h30">18h30</option>
                                     <option value="19h">19h</option>
                                     <option value="19h30">19h30</option>
                                     <option value="20h">20h</option>
                                     <option value="20h30">20h30</option>
                                     <option value="21h">21h</option>
                                     <option value="21h30">21h30</option>
                                     <option value="22h">22h</option>
                                  </select>
                                </div>
                              </div>

                        </fieldset>

                        <fieldset id="annonce">
                            
                            <div id="recoltes">
                                <legend>Récoltes à disposition</legend>
                                <p>Indiquez vos articles à récolter</p>

                                <?php if( isset( $errors['add_recolte'] ) ) echo message_erreur($errors, 'add_recolte'); ?>
                                <input type="text" name="add_recolte" id="add_recolte" maxlength="25" placeholder="récolte disponnible"/>
                                <div id="button_add" onclick="add_checklist(event)">+</div>

                                <ul id="recoltes-disponnible"></ul>



                            </div>
                        </fieldset>
                        <fieldset>
                                
                            <legend>Description</legend>

                            <textarea name="message" placeholder="Votre message..."><?php if( !empty( $_POST['message'] ) ) echo $_POST['message']; ?></textarea>
                            <input type="submit" name="submit" value="Inscrire sa cueillette ouverte">

                        </fieldset>

                    </form>

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