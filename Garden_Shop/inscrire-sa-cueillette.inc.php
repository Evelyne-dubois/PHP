<?php
include 'functions.inc.php';

if(count($_POST)>0){

    $errors = array();

    $adresse_numero = $_POST['adresse_numero'];
    $adresse_rue = $_POST['adresse_rue'];
    $adresse_cp = $_POST['adresse_cp'];
    $adresse_ville = $_POST['adresse_ville'];
    $adresse_pays = $_POST['adresse_pays'];

    $date = $_POST['date'];
    // $add_recolte = $_POST['add_recolte'];
    $message = $_POST['message'];


    //Vérif adresse
    if(empty($adresse_numero)){
        $errors['adresse_numero'][] = 'Indiquez le numero';
    }
    if(empty($adresse_rue)){
        $errors['adresse_rue'][] = 'Indiquez la rue';
    }
    if(empty($adresse_cp)){
        $errors['adresse_cp'][] = 'Indiquez le code postal';
    }else{

        if(!ctype_digit($adresse_cp)){
            $errors['adresse_cp'][] = 'Ceci n\'est pas un code postale';
        }else{
            if(($adresse_pays == 'belgique' && strlen($adresse_cp) != 4) || ($adresse_pays == 'france' && strlen($adresse_cp) != 5)){
                $errors['adresse_cp'][] = 'Le code postale n\'est pas valide dans votre pays';
            }
        }
    }
    if(empty($adresse_ville)){
        $errors['adresse_ville'][] = 'Indiquez la ville';
    }
    
    //vérifie si les champs sont vide
    if(empty($date)){
        $errors['date'][] = 'Indiquez la date de votre cueillette ouverte';
    }

    //vérifie si les champs sont vide
    // if(empty($add_recolte)){
    //     $errors['add_recolte'][] = 'Indiquez au moins une récolte';
    // }


    //Si pas d'erreur alors on enregistre l'inscription
    if( empty($errors)){

        mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
        mysql_select_db("evelyned-blog"); 

        //recupere les articles deja inscrit
        $res = mysql_query('SELECT '.$add_type.' FROM users where id='.$id.'');
        $element = mysql_fetch_array($res);
        $article_table = unserialize($element[$add_type]);

        $article_table['article_type'][] = $add_article;
        $article_table['article_prix'][] = $add_price.' / '.$unit_price;
        // print_r( $article_table);

        //Insertion dans la db
        // mysql_query("UPDATE register_validation set $add_type = '".serialize($article_table)."' WHERE id=10 ");

        // ajoute un message vallidation & reset les $_POST
        echo '<script>alert("Échec, la possibilité d\'ajouter une cueillette ouverte n\'est pas encore disponnible.");</script>';
        include 'inscrire-sa-cueillette.php';
        // header('location: cueillettes.php');

    }

  //Si erreur
    echo '<script>alert("Échec, la possibilité d\'ajouter une cueillette ouverte n\'est pas encore disponnible.");</script>';
    include 'inscrire-sa-cueillette.php';
}
else{
  //USER IS LOGGED IN: DISPLAY the directory index...
  // include 'index.php';
  // print_r('deja co');
  // die;
}
