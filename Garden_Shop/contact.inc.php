<?php

  include 'functions.inc.php';

  if(count($_POST)>0){

    $errors = array();

    //login form submitted
    $email = trim(strip_tags($_POST['email']));
    $object = trim(strip_tags($_POST['object']));
    $message = trim(strip_tags($_POST['message']));


    //vérifie si les champs sont vide
    if(empty($email)){
        $errors['email'][] = 'Indiquez votre e-mail';
    }else{
        $valide_email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if($valide_email == false){
          $errors['email'][] = 'E-mail invalide';
        }
    }

    //Vérifie si le champ est remplie
    if(empty($object)){
      $errors['object'][] = 'Indiquez l\'objet de votre message';
    }

    //Vérifie si le champ est remplie
    if(empty($message)){
      $errors['message'][] = 'Indiquez votre message';
    }

    // $header = 'Content-Type: text/html; charset="UTF-8"';
    $header = "From: $email \n";
    // $header.= "Reply-to: $email \n";


     
    //Si pas d'erreur alors on enregistre l'inscription
    if(empty($errors)){




      $body = '';

      $body .= 'Feedback'."\n";
      $body .= 'E-mail : ' . $email . "\n";
      $body .= 'Objet : ' . $object . "\n";
      $body .= 'Message : ' . $message . "\n";
      $body .= "\n".'Attention: pour répondre à l\'expediteur n\'oubliez pas de reprendre l\'adresse mail qui s\'affiche ci-dessus';

      mail( 'evelyne.dubois.89@gmail.com', 'Garden Shop | Vous avez reçut un message', $body, $header);

      $_POST['email'] = '';
      $_POST['object'] = '';
      $_POST['message'] = '';


      // echo '<iframe id="create_shop-popup" class="white-popup" src="create-shop.view.php" scrolling="no"></iframe>';
      // include 'create-shop.view.php';
      // header('location: create-shop.view.php');
      include 'contact.php';
      exit;      
    } 
    // include 'magasin.php'; 
    // echo 'hello'   ; 
  }
  //DISPLAY the login form
  include 'contact.php';


?>