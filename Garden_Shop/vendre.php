<?php

    session_start();

    //autocompléter les champs adresse, on recupere les données
    mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
    mysql_select_db("evelyned-blog"); 

    $id = $_SESSION['id'];
  
    $sql = mysql_query("SELECT * FROM users WHERE id='$id' ");
    $element = mysql_fetch_array($sql);

    $adresse_1 = unserialize($element['adresse_1']);
    $adresse_name = $adresse_1['nom'];
    $adresse_numero = $adresse_1['numero'];
    $adresse_rue = $adresse_1['rue'];
    $adresse_cp = $adresse_1['cp'];
    $adresse_ville = $adresse_1['ville'];

    if(isset($element['adresse_2'])){
      $adresse_2 = unserialize($element['adresse_2']);
      $adresse_name_2 = $adresse_2['nom'];
      $adresse_numero_2 = $adresse_2['numero'];
      $adresse_rue_2 = $adresse_2['rue'];
      $adresse_cp_2 = $adresse_2['cp'];
      $adresse_ville_2 = $adresse_2['ville'];
    }

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Vendre | Garden Shop</title>

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
 
    <body onLoad="initialise();">

    	<header>
            <div class="container">
                <nav id="main-menu">
                    <ul id="main-menu_links">
                        <li><a href="acheter.php">Acheter<span>des produits</span></a></li>
                        <li><a class="current" href="
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
                        <li><a  href="acheter.php">Acheter</a></li>
                        <li class="text-center"><a class="current" href="
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
        
        <div id="banner" class="banner-vendre"></div>

        <div class="container">
            <div id="content" class="page-vendre">

                <h2>Ajouter un article au magasin</h2>
                <p>Une fois le formulaire validé, votre récolte sera automatiquement ajoutée à votre magasin.</p>

                <form action="vendre.inc.php" method="post">

                        <fieldset id="annonce">

                            <legend>Annonce</legend>
                            <?php if( isset( $errors['add_article'] ) ) echo message_erreur($errors, 'add_article'); ?>
                            <input type="text" name="add_article" id="" placeholder="Articles à vendre" value="<?php if( !empty( $_POST['add_article'] ) ) echo $_POST['add_article']; ?>"/>
                            <?php if( isset( $errors['add_type'] ) ) echo message_erreur($errors, 'add_type'); ?>
                            <select name="add_type">
                              <option value="type" default selected="selected">Type</option>
                              <option value="legumes">Légumes</option>
                              <option value="fruits">Fruits</option>
                              <option value="graines">Graines de semences</option>
                              <option value="confitures">Confitures</option>
                              <option value="aromatiques">Plantes aromatiques</option>
                            </select>

                            <h3>Article à</h3>
                            <?php if( isset( $errors['echange_donne_vends'] ) ) echo message_erreur($errors, 'echange_donne_vends'); ?>
                            <ul class="form-list">
                                <li><input type="checkbox" name="echange_donne_vends[]" value="échange" id="echanger"><label for="echanger">Echanger</label></li>
                                <li><input type="checkbox" name="echange_donne_vends[]" value="donne" id="donner"><label for="donner">Donner</label></li>
                                <li><input type="checkbox" name="echange_donne_vends[]" value="vends" id="vendre"><label for="vendre">Vendre</label></li>
                            </ul>

                            <h3>Cueillette ouverte</h3>
                            <?php if( isset( $errors['cueillette_ouverte'] ) ) echo message_erreur($errors, 'cueillette_ouverte'); ?>
                            <ul class="form-list" id="q-cueillette-ouverte">
                                <li><input type="radio" name="cueillette_ouverte" value="oui" id="oui" ><label for="oui">Oui</label></li>
                                <li><input type="radio" name="cueillette_ouverte" value="non" id="non" ><label for="non">Non</label></li>
                            </uL>

                            <div id="add-price">
                                <h3>Prix</h3>
                                <?php if( isset( $errors['add_price'] ) ) echo message_erreur($errors, 'add_price'); ?>
                                <input type="text" name="add_price" id="" placeholder="Prix"  value="<?php if( !empty( $_POST['add_price'] ) ) echo $_POST['add_price']; ?>"/>
                                <select name="unit_price">
                                    <option value="kg">kg</option>
                                    <option value="pc">pc</option>
                                    <option value="L">L</option>
                                </select>
                            </div>

                            <!-- <h3>Commentaire</h3>
                            <textarea placeholder="Ajouter un commentaire..."></textarea> -->
                            
                        </fieldset>

                        <fieldset id="modalite-cueillette" class="modalite show"> 

                            <legend>Modalité</legend>

                            <div id="horaire-cueillette">
                                  <h3>Horaire de la cueillette ouverte</h3>
                                    <?php if( isset( $errors['cueillettes_jours'] ) ) echo message_erreur($errors, 'cueillettes_jours'); ?>
                                    <ul class="form-list jours-cueillette">
                                      <li><input type="checkbox" name="cueillettes_jours[]" value="lundi" id="lundi"><label for="lundi">Lundi</label></li>
                                      <li><input type="checkbox" name="cueillettes_jours[]" value="mardi" id="mardi"><label for="mardi">Mardi</label></li>
                                      <li><input type="checkbox" name="cueillettes_jours[]" value="mercredi" id="mercredi"><label for="mercredi">Mercredi</label></li>
                                      <li><input type="checkbox" name="cueillettes_jours[]" value="jeudi" id="jeudi"><label for="jeudi">Jeudi</label></li>
                                    </ul>
                                    <ul class="form-list jours-cueillette">
                                      <li><input type="checkbox" name="cueillettes_jours[]" value="vendredi" id="vendredi"><label for="vendredi">Vendredii</label></li>
                                      <li><input type="checkbox" name="cueillettes_jours[]" value="samedi" id="samedi"><label for="samedi">Samedi</label></li>
                                      <li><input type="checkbox" name="cueillettes_jours[]" value="dimanche" id="dimanche"><label for="dimanche">Dimanche</label></li>
                                   </ul>

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

                            <h3>Adresse</h3>

                            <select name="adresse-presaved" id="adresse_selected" onchange="auto_complete()">
                              <option value="new" selected="selected">Nouveau</option>
                              <option value="adresse_1"><?php echo $adresse_name; ?></option>
                              <?php if($adresse_name_2 != "/"){
                              echo '<option value="adresse_2">'.$adresse_name_2.'</option>';
                              }
                              ?>
                            </select>

                            <ul>
                                <li>
                                    <?php if( isset( $errors['adresse_numero'] ) ) echo message_erreur($errors, 'adresse_numero'); ?>
                                    <?php if( isset( $errors['adresse_rue'] ) ) echo message_erreur($errors, 'adresse_rue'); ?>
                                    <input type="text" name="adresse_numero" id="auto_numero" class="numero" placeholder="n°" value="<?php if( !empty( $_POST['adresse_numero'] ) ) echo $_POST['adresse_numero']; ?>"/>
                                    <input type="text" name="adresse_rue" id="auto_rue" class="rue" placeholder="Rue" value="<?php if( !empty( $_POST['adresse_rue'] ) ) echo $_POST['adresse_rue']; ?>"/>
                                </li>
                                <li>
                                    <?php if( isset( $errors['adresse_cp'] ) ) echo message_erreur($errors, 'adresse_cp'); ?>
                                    <?php if( isset( $errors['adresse_ville'] ) ) echo message_erreur($errors, 'adresse_ville'); ?>
                                    <input type="text" name="adresse_cp" id="auto_cp" class="cp" placeholder="Localité" value="<?php if( !empty( $_POST['adresse_cp'] ) ) echo $_POST['adresse_cp']; ?>"/>
                                    <input type="text" name="adresse_ville" id="auto_ville" class="ville" placeholder="Ville" value="<?php if( !empty( $_POST['adresse_ville'] ) ) echo $_POST['adresse_ville']; ?>"/>
                                </li>
                            </ul>

                            <select name="adresse_pays" class="pays">
                              <option value="belgique" selected="selected">Belgique</option>
                              <option value="france">France</option>
                            </select>

                        </fieldset>

                        <fieldset id="ajouter_au_magasin">

                            <input type="submit" name="submit" value="Ajouter au magasin">

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

        <script type="text/javascript">

          var adresse_numero;
          var adresse_rue; 
          var adresse_cp; 
          var adresse_ville;

          var adresse_numero_2; 
          var adresse_rue_2; 
          var adresse_cp_2; 
          var adresse_ville_2;

          function initialise() {

            adresse_numero = <?php echo $adresse_numero; ?>;
            adresse_rue = '<?php echo $adresse_rue; ?>';
            adresse_cp = <?php echo $adresse_cp; ?>;
            adresse_ville = '<?php echo $adresse_ville; ?>';

            <?php if($adresse_name_2 != "/"){ ?>
              adresse_numero_2 = <?php echo $adresse_numero_2; ?>;
              adresse_rue_2 = '<?php echo $adresse_rue_2; ?>';
              adresse_cp_2 = <?php echo $adresse_cp_2; ?>;
              adresse_ville_2 = '<?php echo $adresse_ville_2; ?>';
            <?php }; ?>

          };

        </script>

        <script src="js/script.js"></script>
        <!--[if lt IE 10]><script src="js/script_ie.js"></script><![endif]-->
      
    </body>
</html>