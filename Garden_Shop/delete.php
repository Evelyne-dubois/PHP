<?php
session_start();

mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
mysql_select_db("evelyned-blog");

$id = $_SESSION['id'];
$i = $_GET['i'];
$type = $_GET['type'];

//recupere la liste d'articles
$res = mysql_query('SELECT '.$type.' FROM users where id='.$id.' ');
$element = mysql_fetch_array($res);
$article_table = unserialize($element[$type]);

//suprime la ligne concerné
unset($article_table['article_type'][$i]);
unset($article_table['article_prix'][$i]);
unset($article_table['article_modalite'][$i]);
unset($article_table['article_cueillir'][$i]);
unset($article_table['article_adresse'][$i]);
unset($article_table['article_jour'][$i]);
unset($article_table['article_heure'][$i]);

//Insertion dans la db
mysql_query("UPDATE users set $type = '".serialize($article_table)."' WHERE id=".$id." ");
//Recharge la page
header('Location: profil.php');

?>