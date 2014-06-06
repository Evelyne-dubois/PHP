<?php

  include 'connect_db.php';

  //condition a cause du formulaire, recharge la page et perd l'id
  if(!isset($_GET['id'])){
    $id_magasin = mysql_query("SELECT id_magasin FROM search_result ");
    $id_magasin = mysql_fetch_array($id_magasin);
    $id_magasin = $id_magasin['id_magasin'];
  }else{
    $id_magasin = $_GET['id'];
    mysql_query("UPDATE search_result set id_magasin = '$id_magasin' ");
  }

  // recupere les donées
  $sql = mysql_query("SELECT * FROM users WHERE id='$id_magasin' ");
  $element = mysql_fetch_array($sql);

  $shop = $element["shops"];
  $user = $element["user"];
  $boutique_banner = $element["banner"];
  $satisfaction = $element["satisfactions"].'_sur_5';

  // prepare l'adresse à afficher
  $adresse_1 = unserialize($element['adresse_1']);
  $adresse_numero = $adresse_1['numero'];
  $adresse_rue = $adresse_1['rue'];
  $adresse_cp = $adresse_1['cp'];
  $adresse_ville = $adresse_1['ville'];

  $adress1 = $adresse_numero.' '.$adresse_rue.' '.$adresse_cp.' '.$adresse_ville;

  // prepare la deusieme adresse si elle existe
  if(isset($element['adresse_2'])){
    $adresse_2 = unserialize($element['adresse_2']);
    $adresse_numero_2 = $adresse_2['numero'];
    $adresse_rue_2 = $adresse_2['rue'];
    $adresse_cp_2 = $adresse_2['cp'];
    $adresse_ville_2 = $adresse_2['ville'];

    $adress2 = $adresse_numero_2.' '.$adresse_rue_2.' '.$adresse_cp_2.' '.$adresse_ville_2;
  }

  //prepare toutes les entrés d'artciles
  $legumes = unserialize($element["legumes"]);
  $fruits = unserialize($element["fruits"]);
  $graines = unserialize($element["graines"]);
  $confitures = unserialize($element["confitures"]);
  $aromatiques = unserialize($element["aromatiques"]);
 
?>