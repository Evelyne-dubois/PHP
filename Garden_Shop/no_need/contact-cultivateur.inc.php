<?php



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
    if(!empty($object)){
      $errors['password'][] = 'Indiquez l\'objet de votre message';
    }

    //Vérifie si le champ est remplie
    if(!empty($message)){
      $errors['mesage'][] = 'Indiquez votre message';
    }

    

    //Si pas d'erreur alors on enregistre l'inscription
    if(empty($errors)){

      $body = '';

      $body .= 'E-mail : ' . $email . '<br />';
      $body .= 'Objet : ' . $object . '<br />';
      $body .= 'Message : ' . $message . '<br />';

      mail('evelyne.dubois.89@gmail.com', ' Vous avez reçut un message de la communauté Garden Shop ', $body, 'Content-Type: text/html; charset="UTF-8";');





      // echo '<iframe id="create_shop-popup" class="white-popup" src="create-shop.view.php" scrolling="no"></iframe>';
      // include 'create-shop.view.php';
      // header('location: create-shop.view.php');
      include 'magasin.php';
      exit;      
    } 
    include 'magasin.php';     
  }
  //DISPLAY the login form
  include 'magasin.php';


?>