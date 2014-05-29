<?php

// session_start();

//include
// include 'config.inc.php';
// include 'functions.inc.php';

$_SESSION['logged_in'] = 'bad';

// RUNTIME / LOGIN CHECK
if($_SESSION['logged_in'] != 'ok'){

  if(count($_POST)>0){


    $errors = array();

    //login form submitted
    $new_user = trim(strip_tags($_POST['user']));
    $password = trim(strip_tags($_POST['password']));
    $email = trim(strip_tags($_POST['email']));

    $new_user_checked = false;
    $password_checked = false;
    $email_checked = false;

     mysql_connect("localhost","root","");
     mysql_select_db("tfe");

    //Vérification $user
    //vérifie si les champs sont vide
    if(empty($new_user)){
        $errors['user'][] = 'Indiquez votre nom d\'utilisateur';
        // $new_user_error = 'Indiquez votre nom d\'utilisateur';
    }else{
      //Vérifie si le nom d'utilisateur est disponnible
      $result = mysql_query("SELECT user FROM users WHERE user = '$new_user'");
       if(mysql_num_rows($result)>=1){
          $errors['user'][] = 'Nom d\'utilisateur déjà utilisé';
       }else{
          $errors['user'][] = '';
          $new_user_checked = true;
      }
    }

    //Vérification $password
    //Vérifie si le champ est remplie
    if(!empty($password)){
      // Vérifie si le password à au moins 5 caractere
      if(strlen($password)>4){
        //crypte le password
        $password = md5($password);
        $errors['password'][] = '';
        //$password_error = '';
        $password_checked = true;
      }else{
        $errors['password'][] = 'Minimum 5 caractères';
        // $password_error = 'Minimum 5 caractères';
      }
    }else {
      $errors['password'][] = 'Indiquez votre mot de passe';
      // $password_error = 'Indiquez votre mot de passe';
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
         }else{
            $errors['email'][] = '';
            $email_checked = true;
          }
        }else{
          $errors['email'][] = 'l\'e-mail est invalide';
          // $email_error = 'l\'e-mail est invalide';
        }
    }else{ 
      $errors['email'][] = 'Indiquez votre e-mail';
      // $email_error = 'Indiquez votre e-mail';
    }

    //Si pas d'erreur alors on enregistre l'inscription
    if($new_user_checked == true && $password_checked == true && $email_checked == true){

      $query = mysql_query(" INSERT INTO users VALUES('','$new_user','$password','$email') ");

      $user = $new_user;
      $_SESSION = $user;
      $_SESSION['logged_in'] = 'ok';

     header('location: index.php');
     exit;
        
    }



      
  }
  //DISPLAY the login form
  include 'connexion.view.php';
}
else{
  //USER IS LOGGED IN: DISPLAY the directory index...
  include 'index.php';
  // print_r('deja co');
  die;
}



















// if(isset($_POST['submit'])){

//   $user = htmlspecialchars(trim($_POST['user']));
//   $password = htmlspecialchars(trim($_POST['password']));
//   $email = htmlspecialchars(trim($_POST['email']));


//   if($user && $password && $email){

//     if(strlen($password)>4){

//         $password = md5($password);

//         mysql_connect("localhost", "root", "");
//         mysql_select_db("tfe");

//         $query = mysql_query(" INSERT INTO register_validation VALUES('','$user','$password','$email') ");
//         // echo "Success"; 



//     }else{
//       echo "minimum 5 caractere";
//       // echo "Failed";
//     }
//   }
//   else{
//     echo "remplissez tout les champs";
//     // echo "Failed";
//   }
// }


?>



<!-- CREATE TABLE `validation` (
`id` INT( 255 ) NOT NULL AUTO_INCREMENT ,
`pseudo` VARCHAR( 255 ) NOT NULL ,
`passe` VARCHAR( 255 ) NOT NULL ,
`email` VARCHAR( 255 ) NOT NULL ,
INDEX ( `id` )
); -->