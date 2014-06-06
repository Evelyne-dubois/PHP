<?php
session_start();
include 'functions.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Garden Shop</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    </head>
 
    <body>
      
      <div id="iframe_creat-shop_content">
        <form action="create-shop.inc.php" method="post" id="create_shop">

          <legend id="creat_shop_legend">Créer votre boutique</legend>
          <p>Si vous êtes cultivateur, vous devez créer votre boutique pour vendre vos articles.</p>
          <p>Vous pouvez également le faire <a href="index.php" onclick="window.parent.location.reload();">plus tard</a>.</p>
            

          <fieldset>

            <h3>1. Nommez votre magasin</h3>
            <?php if( isset( $errors['shop_name'] ) ) echo message_erreur($errors, 'shop_name'); ?>
            <input type="text" name="shop_name" class="shop_name" placeholder="Nom de votre boutique" value="<?php if( !empty( $_POST['shop_name'] ) ) echo $_POST['shop_name']; ?>">

            <h3>2. Choisissez votre banniere</h3>
            <?php if( isset( $errors['banner_shop'] ) ) echo message_erreur($errors, 'banner_shop'); ?>
            <ul class="banner_choice" id="">
                <li><input type="radio" name="banner_shop" value="banner_shop_1" id="banner_shop_un"><label for="oui">Oui</label></li>
                <li><input type="radio" name="banner_shop" value="banner_shop_2" id="banner_shop_deux"><label for="non">Non</label></li>
                <li><input type="radio" name="banner_shop" value="banner_shop_3" id="banner_shop_trois"><label for="non">Non</label></li>
                <li><input type="radio" name="banner_shop" value="banner_shop_4" id="banner_shop_quatre"><label for="non">Non</label></li>
                <li><input type="radio" name="banner_shop" value="banner_shop_5" id="banner_shop_cinq"><label for="non">Non</label></li>
            </uL>

            </fieldset>

            <fieldset id="" class="modalite">

              <h3>3. Indiquez votre adresse</h3>
              <p>Adresse n°1 <span>(ex. domicile)</span></p>
              <ul>
                  <li>
                    <?php if( isset( $errors['adresse_name'] ) ) echo message_erreur($errors, 'adresse_name'); ?>
                    <input type="text" name="adresse_name" class="place_name" placeholder="Nom (ex. Maison)" value="<?php if( !empty( $_POST['adresse_name'] ) ) echo $_POST['adresse_name']; ?>"/>
                  </li>
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

              <select name="adresse_pays">
                <option value="belgique" selected="selected">Belgique</option>
                <option value="france">France</option>
              </select>

              <p>Adresse n°2 <span>(falcultatif)</span></p>
              <ul>
                  <li>
                    <?php if( isset( $errors['adresse_name_2'] ) ) echo message_erreur($errors, 'adresse_name_2'); ?>
                    <input type="text" name="adresse_name_2" class="place_name" placeholder="Nom (ex. Travail, Jardin)" value="<?php if( !empty( $_POST['adresse_name_2'] ) ) echo $_POST['adresse_name_2']; ?>"/>
                  </li>
                  <li>
                      <?php if( isset( $errors['adresse_numero_2'] ) ) echo message_erreur($errors, 'adresse_numero_2'); ?>
                      <?php if( isset( $errors['adresse_rue_2'] ) ) echo message_erreur($errors, 'adresse_rue_2'); ?>
                      <input type="text" name="adresse_numero_2" class="numero" placeholder="n°" value="<?php if( !empty( $_POST['adresse_numero_2'] ) ) echo $_POST['adresse_numero_2']; ?>"/>
                      <input type="text" name="adresse_rue_2" class="rue" placeholder="Rue" value="<?php if( !empty( $_POST['adresse_rue_2'] ) ) echo $_POST['adresse_rue_2']; ?>"/>
                  </li>
                  <li>
                      <?php if( isset( $errors['adresse_cp_2'] ) ) echo message_erreur($errors, 'adresse_cp_2'); ?>
                      <?php if( isset( $errors['adresse_ville_2'] ) ) echo message_erreur($errors, 'adresse_ville_2'); ?>
                      <input type="text" name="adresse_cp_2" class="cp" placeholder="Localité" value="<?php if( !empty( $_POST['adresse_cp_2'] ) ) echo $_POST['adresse_cp_2']; ?>"/>
                      <input type="text" name="adresse_ville_2" class="ville" placeholder="Ville" value="<?php if( !empty( $_POST['adresse_ville_2'] ) ) echo $_POST['adresse_ville_2']; ?>"/>
                  </li>
              </ul>

              <select name="adresse_pays_2">
                <option value="belgique" selected="selected">Belgique</option>
                <option value="france">France</option>
              </select>

          </fieldset>

          <fieldset id="valider-boutique">
            <input type="submit" name="submit" value="valider">
          </fieldset>

        </form>
      </div>

      <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
      <script src="js/jquery.magnific-popup.js"></script>
      <script src="js/script.js"></script>
      <!--[if lt IE 10]><script src="js/script_ie.js"></script><![endif]-->

    </body>
</html>