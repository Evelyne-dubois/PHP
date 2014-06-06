<?php
include 'functions.inc.php';

if(count($_POST)>0){

    $errors = array();

    $search_article = trim(strip_tags($_POST['search_article']));
    $search_type = trim(strip_tags($_POST['search_type']));

    //Vérification $search_article
    //vérifie si les champs sont vide
    if(empty($search_article)){
        $errors['search_article'][] = 'Indiquez un article à trouver';
    }

    //Vérification $search_type
    //Vérifie si le champ est remplie
    if($search_type == 'type'){
      $errors['search_type'][] = 'Indiquez le type de l\'article';
    }

    //Si pas d'erreur alors on enregistre l'inscription
    if( empty($errors)){

      include 'connect_db.php';

      mysql_query(" UPDATE search_result SET search_article = '$search_article'");
      mysql_query(" UPDATE search_result SET search_type = '$search_type'");

      header('location: search-result.view.php');
    }
 
  //DISPLAY the login form
  include 'acheter.php';
    // header('location: acheter.html');
}
else{
  //USER IS LOGGED IN: DISPLAY the directory index...
  include 'index.php';
  // print_r('deja co');
  die;
}






















?>