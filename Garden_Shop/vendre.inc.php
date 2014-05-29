<?php
include 'functions.inc.php';

if(count($_POST)>0){

    $errors = array();

    $add_article = trim(strip_tags($_POST['add_article']));
    $add_type = trim(strip_tags($_POST['add_type']));
    
    $add_price = $_POST['add_price'];
    $unit_price = $_POST['unit_price'];

    //vérifie si les champs sont vide
    if(empty($add_article)){
        $errors['add_article'][] = 'Indiquez l\'article à vendre';
    }

    //Vérifie si le champ est correctement remplie
    if($add_type == 'type'){
      $errors['add_type'][] = 'Indiquez le type de l\'article';
    }

    //Verfication $echange_donne_vends
    if (!isset( $_POST['echange_donne_vends'])){ 
        $errors['echange_donne_vends'][] = 'Vous devez cocher au moins une case'; 
    }else{
        //recupérer les valeurs dans un array
        $echange_donne_vends = $_POST['echange_donne_vends'];
        $echange_donne_vends = implode(' - ', $_POST['echange_donne_vends']);
    }

    //Cueillette ouverte ou non
    if (!isset($_POST['cueillette_ouverte'])){ 
        $errors['cueillette_ouverte'][] = 'Vous devez cocher une case'; 
    }else{
        $cueillette_ouverte = $_POST['cueillette_ouverte'];
        //Si oui verif' les champs suplementaire
        if($cueillette_ouverte == 'oui'){

            $debut_cueillette = $_POST['debut_cueillette'];
            $fin_cueillette = $_POST['fin_cueillette'];

            $adresse_numero = $_POST['adresse_numero'];
            $adresse_rue = $_POST['adresse_rue'];
            $adresse_cp = $_POST['adresse_cp'];
            $adresse_ville = $_POST['adresse_ville'];
            $adresse_pays = $_POST['adresse_pays'];

            //Verfication $cueillettes_jours
            if (!isset( $_POST['cueillettes_jours'])){ 
                $errors['cueillettes_jours'][] = 'Vous devez cocher au moins une case'; 
            }else{
                //recupérer les valeurs dans un array
                $cueillettes_jours = $_POST['cueillettes_jours'];
                $cueillettes_jours = implode(' - ', $_POST['cueillettes_jours']);
            }

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
        }else{
           $adresse_numero = '/';
           $adresse_rue = '/';
           $adresse_cp = '/';
           $adresse_ville = '/';
           $cueillettes_jours = '/';
           $debut_cueillette = '/';
           $fin_cueillette = '/';
        }
    }

    //Vérif' du prix
    if(empty($add_price)){
        $errors['add_price'][] = 'Indiquez votre prix';
    }else{
       if(is_numeric($add_price)){
            $add_price = floatval($add_price);
            $add_price =  number_format($add_price,2);
        }else{
            $errors['add_price'][] = 'Ceci n\'est pas un nombre';
            
        }
    }


    //Si pas d'erreur alors on enregistre l'inscription
    if( empty($errors)){

        

        mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
        mysql_select_db("evelyned-blog"); 

        session_start();
        $id = $_SESSION["id"];

        //recupere les articles deja inscrit
        $res = mysql_query('SELECT '.$add_type.' FROM users where id='.$id.' ');
        $element = mysql_fetch_array($res);
        $article_table = unserialize($element[$add_type]);

        // Update les tableau avec les nouvelles données
        $article_table['article_type'][] = $add_article;
        $article_table['article_prix'][] = $add_price.' / '.$unit_price;
        $article_table['article_modalite'][] = $echange_donne_vends;
        $article_table['article_cueillir'][] = $cueillette_ouverte;
        $article_table['article_adresse'][] = $adresse_numero.' '.$adresse_rue.'</br> '.$adresse_cp.' '.$adresse_ville;
        $article_table['article_jour'][] = $cueillettes_jours;
        $article_table['article_heure'][] = 'De '.$debut_cueillette.' à '.$fin_cueillette;

        //Insertion dans la db
        mysql_query("UPDATE users set $add_type = '".serialize($article_table)."' WHERE id=".$id." ");

        // ajoute un message vallidation & reset les $_POST
        header('location: index.php');
    }  
    echo '<script>alert("Échec, véréfiez d\'avoir correctement rempli tous les champs.");</script>';   
    include 'vendre.php';
}
else{
  //USER IS LOGGED IN: DISPLAY the directory index...
  // include 'index.php';
  // print_r('deja co');
  // die;
}
