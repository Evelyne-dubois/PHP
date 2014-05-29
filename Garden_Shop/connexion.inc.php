<?php

if(!isset($_SESSION["id"])){

        if(count($_POST)>0){

    $errors = array();

    //login form submitted
    $email = trim(strip_tags($_POST['log_email']));
    $password = trim(strip_tags($_POST['log_password']));

    $password_log = false;
    $email_log = false;

     mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
     mysql_select_db("evelyned-blog");

    //Vérification de $email
    //Vérifie si le champ est remplie
    if(!empty($email)){
      // Vérifie si l'e-mail ce trouve dans la bd
      $sql = mysql_query("SELECT email FROM users WHERE email = '$email'");
         if(mysql_num_rows($sql)>=1){      
         }
         else{
           $errors['co_email'][] = 'adresse mail introuvable';
          }
    }else{ 
      $errors['co_email'][] = 'Indiquez votre e-mail';
    }

    //Vérifie si le champ est remplie
    if(!empty($password)){
      //crypte le password
      $password = md5($password);
    }else {
      $errors['co_password'][] = 'Indiquez votre mot de passe';
    }

    //Si pas d'erreur alors on enregistre l'inscription
    if(empty($errors)){

      $sql = mysql_query("SELECT * FROM users WHERE email = '$email'");
      $data = mysql_fetch_assoc($sql);

      // Si le mot de passe entré à la même valeur que celui de la base de données, on l'autorise a se connecter... 
      if( $password == $data["password"]){ 

        session_start();

        $_SESSION["id"] = $data["id"];
        $_SESSION["user"] = $data["user"]; 
        $_SESSION["password"] = $data["password"];
        $_SESSION["email"] = $data["email"];
        $_SESSION["shop"] = $data["shops"]; 

        echo '<script type="text/javascript">window.parent.location.reload(); </script>';

        exit;

      // Sinon on lui affiche un message d'erreur. 
      }else{ 
        $errors['connect_error'][] = 'E-mail ou mot de passe invalide';         
      } 
    }     
 }     
  //DISPLAY the login form
  include 'connexion.view.php';
}
else{
  //USER IS LOGGED IN
}

?>