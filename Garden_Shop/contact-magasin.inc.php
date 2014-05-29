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



      mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
      mysql_select_db("evelyned-blog");

      // recupere le mail du destinataire
      $id_magasin = mysql_query("SELECT id_magasin FROM search_result ");
      $id_magasin = mysql_fetch_array($id_magasin);
      $id_magasin = $id_magasin['id_magasin'];

      $emailto = mysql_query("SELECT email FROM users WHERE id='$id_magasin' ");
      $emailto = mysql_fetch_array($emailto);
      $emailto = $emailto['email'];

     
    //Si pas d'erreur alors on enregistre l'inscription
    if(empty($errors)){




      $body = '';

      $body .= 'E-mail : ' . $email . "\n";
      $body .= 'Objet : ' . $object . "\n";
      $body .= 'Message : ' . $message . "\n";
      $body .= "\n".'Attention: pour répondre à l\'expediteur n\'oubliez pas de reprendre l\'adresse mail qui s\'affiche ci-dessus';

      mail( $emailto, 'Garden Shop | Vous avez reçut un message', $body, $header);

    
      echo '<script>alert("Votre message a été envoyé avec succès.");</script>';

      $email = $object = $message = NULL;
      unset($_POST);

      // header('Location: magasin.php');
      include 'magasin.php';
      exit;      
    } 

   
    echo '<script>alert("Échec, véréfiez d\'avoir correctement rempli tous les champs.");</script>';
      
    
    // include 'magasin.php'; 
    // echo 'hello'   ; 
  }
  //DISPLAY the login form
  include 'magasin.php';


?>