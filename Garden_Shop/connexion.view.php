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
      
      <div id="iframe_connexion_content">
        <form action="connexion.inc.php" method="post">
          <fieldset>

             <legend>Connexion</legend>
            <?php if( isset( $errors['connect_error'] ) ) echo message_erreur($errors, 'connect_error'); ?>
            <?php if( isset( $errors['co_email'] ) ) echo message_erreur($errors, 'co_email'); ?>
            <input type="text" name="log_email" placeholder="E-mail" value="<?php if( !empty( $_POST['log_email'] ) ) echo $_POST['log_email']; ?>">
            <?php if( isset( $errors['co_password'] ) ) echo message_erreur($errors, 'co_password'); ?>
            <input type="password" name="log_password" placeholder="Password" >
            <input type="submit" name="submit" value="Se connecter">

          </fieldset>
        </form>

        <form action="inscription.inc.php"  method="post" id="inscription">
          <fieldset>

            <legend>Inscription</legend>

            <?php if( isset( $errors['user'] ) ) echo message_erreur($errors, 'user'); ?>
            <input type="text" name="user" placeholder="Nom d'utilisateur" value="<?php if( !empty( $_POST['user'] ) ) echo $_POST['user']; ?>">
            <?php if( isset( $errors['password'] ) ) echo message_erreur($errors, 'password'); ?>
            <input type="password" name="password" placeholder="Password" value="<?php if( !empty( $_POST['password'] ) ) echo $_POST['password']; ?>">
            <?php if( isset( $errors['email'] ) ) echo message_erreur($errors, 'email'); ?>
            <input type="text" name="email" placeholder="E-mail" value="<?php if( !empty( $_POST['email'] ) ) echo $_POST['email']; ?>">
            <input type="submit" name="submit" value="S'inscrire">


          </fieldset>
        </form>
      </div>

      <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
      <script src="js/jquery.magnific-popup.js"></script>
      <script src="js/script.js"></script>
      <!--[if lt IE 10]><script src="js/script_ie.js"></script><![endif]-->

    </body>
</html>