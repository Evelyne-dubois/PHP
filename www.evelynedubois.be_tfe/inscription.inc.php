<?php

if(!isset($_SESSION["id"])){

  if(count($_POST)>0){

    $errors = array();

    //login form submitted
    $new_user = trim(strip_tags($_POST['user']));
    $password = trim(strip_tags($_POST['password']));
    $email = trim(strip_tags($_POST['email']));

    $new_user_checked = false;
    $password_checked = false;
    $email_checked = false;

     include 'connect_db.php';

    //Vérification $user
    //vérifie si les champs sont vide
    if(empty($new_user)){
        $errors['user'][] = 'Indiquez votre nom d\'utilisateur';
    }else{
      //Vérifie si le nom d'utilisateur est disponnible
      $result = mysql_query("SELECT user FROM users WHERE user = '$new_user'");
       if(mysql_num_rows($result)>=1){
          $errors['user'][] = 'Nom d\'utilisateur déjà utilisé';
       }
    }

    //Vérification $password
    //Vérifie si le champ est remplie
    if(!empty($password)){
      // Vérifie si le password à au moins 5 caractere
      if(strlen($password)>4){
        //crypte le password
        $password = md5($password);
      }else{
        $errors['password'][] = 'Minimum 5 caractères';
      }
    }else {
      $errors['password'][] = 'Indiquez votre mot de passe';
    }

    //Vérification de $email
    //Vérifie si le champ est remplie
    if(!empty($email)){
      // Vérifie si l'e-mail est juste
      $valide_email = filter_var($email, FILTER_VALIDATE_EMAIL);
      if($valide_email == true){
        $result = mysql_query("SELECT email FROM users WHERE email = '$email'");
         if(mysql_num_rows($result)>=1){
            $errors['email'][] = 'cet e-mail est déjà utilisé';
         }
      }else{
        $errors['email'][] = 'l\'e-mail est invalide';
      }
    }else{ 
      $errors['email'][] = 'Indiquez votre e-mail';
    }

    //Si pas d'erreur alors on enregistre l'inscription
    if(empty($errors)){

      $query = mysql_query(" INSERT INTO users(id, user, password, email, distance) VALUES('','$new_user','$password','$email','-') ");

      $sql = mysql_query("SELECT * FROM users WHERE email = '$email'");
      $data = mysql_fetch_assoc($sql);

      session_start();

      $_SESSION["id"] = $data["id"];
      $_SESSION["user"] = $data["user"]; 
      $_SESSION["password"] = $data["password"];
      $_SESSION["email"] = $data["email"]; 

      $connected = true; 

      echo '<script type="text/javascript">window.parent.location.reload(); </script>';
      // echo '<iframe id="create_shop-popup" class="white-popup" src="create-shop.view.php" scrolling="no"></iframe>';
      // include 'create-shop.view.php';
      // header('location: create-shop.view.php');
      exit;      
    }      
  }
  //DISPLAY the login form
  include 'connexion.view.php';
}
else{
  //USER IS LOGGED IN: DISPLAY the directory index...
}

?>