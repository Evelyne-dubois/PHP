<?php

  mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
  mysql_select_db("evelyned-blog");

  $id = $_SESSION['id'];
  
  $sql = mysql_query("SELECT * FROM users WHERE id='$id' ");
  $element = mysql_fetch_array($sql);

  $boutique_banner = $element["banner"];
  $boutique_banner_min = $element["banner"].'_min';
  $satisfaction = $element["satisfactions"].'_sur_5';

  $adresse_1 = unserialize($element['adresse_1']);
  $adresse_numero = $adresse_1['numero'];
  $adresse_rue = $adresse_1['rue'];
  $adresse_cp = $adresse_1['cp'];
  $adresse_ville = $adresse_1['ville'];

  $adress1 = $adresse_numero.' '.$adresse_rue.' '.$adresse_cp.' '.$adresse_ville;

  if(isset($element['adresse_2'])){
    $adresse_2 = unserialize($element['adresse_2']);
    $adresse_numero_2 = $adresse_2['numero'];
    $adresse_rue_2 = $adresse_2['rue'];
    $adresse_cp_2 = $adresse_2['cp'];
    $adresse_ville_2 = $adresse_2['ville'];

    $adress2 = $adresse_numero_2.' '.$adresse_rue_2.' '.$adresse_cp_2.' '.$adresse_ville_2;
  }

  $legumes = unserialize($element["legumes"]);
  $fruits = unserialize($element["fruits"]);
  $graines = unserialize($element["graines"]);
  $confitures = unserialize($element["confitures"]);
  $aromatiques = unserialize($element["aromatiques"]);
  
?>