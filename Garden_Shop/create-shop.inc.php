<?php
// include 'functions.inc.php';

if(count($_POST)>0){

    mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
    mysql_select_db("evelyned-blog"); 

    $errors = array();

    $shop_name = trim(strip_tags($_POST['shop_name']));
    
    $adresse_name = trim(strip_tags($_POST['adresse_name']));
    $adresse_numero = trim(strip_tags($_POST['adresse_numero']));
    $adresse_rue = trim(strip_tags($_POST['adresse_rue']));
    $adresse_cp = trim(strip_tags($_POST['adresse_cp']));
    $adresse_ville = trim(strip_tags($_POST['adresse_ville']));
    $adresse_pays = trim(strip_tags($_POST['adresse_pays']));

    $adresse_name_2 = trim(strip_tags($_POST['adresse_name_2']));
    $adresse_numero_2 = trim(strip_tags($_POST['adresse_numero_2']));
    $adresse_rue_2 = trim(strip_tags($_POST['adresse_rue_2']));
    $adresse_cp_2 = trim(strip_tags($_POST['adresse_cp_2']));
    $adresse_ville_2 = trim(strip_tags($_POST['adresse_ville_2']));
    $adresse_pays_2 = trim(strip_tags($_POST['adresse_pays_2']));

    //echape les ",'
    $shop_name = mysql_real_escape_string($shop_name);

    $adresse_name = mysql_real_escape_string($adresse_name);
    $adresse_rue = mysql_real_escape_string($adresse_rue);
    $adresse_ville = mysql_real_escape_string($adresse_ville);

    $adresse_name_2 = mysql_real_escape_string($adresse_name_2);
    $adresse_rue_2 = mysql_real_escape_string($adresse_rue_2);
    $adresse_ville_2 = mysql_real_escape_string($adresse_ville_2);


    //vérifie si les champs sont vide
    if(empty($shop_name)){
        $errors['shop_name'][] = 'Indiquez le nom de votre boutique';
    }

    if (!isset($_POST['banner_shop'])){ 
        $errors['banner_shop'][] = 'Vous devez choisir une bannière'; 
    }else{
        $banner_shop = $_POST['banner_shop'];

        switch ($banner_shop) {
            case 'banner_shop_1':
                $banner_shop = 'banner_shop_un';
                // echo '1';
                break;
            case 'banner_shop_2':
                $banner_shop = 'banner_shop_deux';
                // echo '2';
                break;
            case 'banner_shop_3':
                $banner_shop = 'banner_shop_trois';
                // echo '3';
                break;
            case 'banner_shop_4':
                $banner_shop = 'banner_shop_quatre';
                // echo '4';
                break;
            case 'banner_shop_5':
                $banner_shop = 'banner_shop_cinq';
                // echo '5';
                break;
        }
    }


    //Vérif adresse n°1
    if(empty($adresse_name)){
        $errors['adresse_name'][] = 'Indiquez le nom de votre adresse';
    }
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
       
    //Vérif adresse n°2
    if(!empty($adresse_name_2) || !empty($adresse_numero_2) || !empty($adresse_rue_2) || !empty($adresse_cp_2) || !empty($adresse_ville_2)){
        if(empty($adresse_name_2)){
            $errors['adresse_name_2'][] = 'Indiquez le nom de votre adresse';
        }
        if(empty($adresse_numero_2)){
            $errors['adresse_numero_2'][] = 'Indiquez le numero';
        }
        if(empty($adresse_rue_2)){
            $errors['adresse_rue_2'][] = 'Indiquez la rue';
        }
        if(empty($adresse_cp_2)){
            $errors['adresse_cp_2'][] = 'Indiquez le code postal';
        }else{

            if(!ctype_digit($adresse_cp_2)){
                $errors['adresse_cp_2'][] = 'Ceci n\'est pas un code postale';
            }else{
                if(($adresse_pays_2 == 'belgique' && strlen($adresse_cp_2) != 4) || ($adresse_pays_2 == 'france' && strlen($adresse_cp_2) != 5)){
                    $errors['adresse_cp_2'][] = 'Le code postale n\'est pas valide dans votre pays';
                }
            }
        }
        if(empty($adresse_ville_2)){
            $errors['adresse_ville_2'][] = 'Indiquez la ville';
        }
    }else{

        $adresse_name_2 = '/';
        $adresse_numero_2 = '/';
        $adresse_rue_2 = '/';
        $adresse_cp_2 = '/';
        $adresse_ville_2 = '/';
        $adresse_pays_2 = '/';

    }

    //Si pas d'erreur alors on enregistre l'inscription
    if( empty($errors)){

        // mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
        // mysql_select_db("evelyned-blog"); 

        session_start();
        $id = $_SESSION["id"];

        // insere dans un tableau les données
        $adresse_un['nom'] = $adresse_name;
        $adresse_un['numero'] = $adresse_numero;
        $adresse_un['rue'] =  $adresse_rue;
        $adresse_un['cp'] = $adresse_cp;
        $adresse_un['ville'] = $adresse_ville;
        $adresse_un['pays'] =  $adresse_pays;

        $adresse_deux['nom'] = $adresse_name_2;
        $adresse_deux['numero'] = $adresse_numero_2;
        $adresse_deux['rue'] =  $adresse_rue_2;
        $adresse_deux['cp'] = $adresse_cp_2;
        $adresse_deux['ville'] = $adresse_ville_2;
        $adresse_deux['pays'] =  $adresse_pays_2;

        //Insertion dans la db
        mysql_query("UPDATE users set adresse_1 = '".serialize($adresse_un)."' WHERE id=".$id." ");
        mysql_query("UPDATE users set adresse_2 = '".serialize($adresse_deux)."' WHERE id=".$id." ");
        mysql_query("UPDATE users set shops = '$shop_name' WHERE id=".$id." ");
        mysql_query("UPDATE users set banner = '$banner_shop' WHERE id=".$id." ");

        $_SESSION["shop"] = $shop_name;

        
        // ajoute un message vallidation & reset les $_POST
        // header('location: index.php');
        echo '<script type="text/javascript">window.parent.location.reload(); </script>';
        // include 'create-shop.view.php';
    }
      
  include 'create-shop.view.php';
}
else{
  //USER IS LOGGED IN: DISPLAY the directory index...
  // include 'index.php';
  // print_r('deja co');
  // die;
}
