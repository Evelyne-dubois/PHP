<?php

session_start();

mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
mysql_select_db("evelyned-blog");

//Conserve la recherche
$i = 1;
$res = mysql_query("SELECT COUNT(id)  FROM users");
$maxi = mysql_fetch_assoc($res);
$maxi = $maxi['COUNT(id)'];

// lien de la home page
if(isset($_GET['article'])){
    $search_article = $_GET['article'];
    $search_type = $_GET['type'];
}else{

  $search_result = mysql_query("SELECT * FROM search_result ");
  $search_result = mysql_fetch_assoc($search_result);

  $search_article = $search_result["search_article"];
  $search_type = $search_result["search_type"];

}


?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Acheter | Garden Shop</title>

        <meta name="description" content="Garden shop, la plateforme d'échange et de vente de fruits et légumes entre particulier">
        <meta name="author" content="Evelyne Dubois">
        <meta name="keywords" content="Garden Shop, fruits, légumes, échanger, vendre, donner, potager, jardins, graines, confitures, jardiner, jardinage, verger, bio">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <link rel="icon" href="images/favicon.ico"/>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    </head>
 
    <body>

      	<header>
              <div class="container">
                  <nav id="main-menu">
                    <ul id="main-menu_links">
                        <li><a class="current" href="acheter.php">Acheter<span>des produits</span></a></li>
                        <li><a href="
                          <?php 
                            if(isset($_SESSION["id"])){

                              if(isset($_SESSION["shop"]) && $_SESSION["shop"] != "" ){
                                echo 'vendre.php';
                              }else{
                                echo '#create_shop-popup" class="open-popup-link';
                              }
                            }else{
                              echo '#connexion-popup" class="open-popup-link';
                            }
                          ?>
                          ">Vendre<span>ses récoltes</span></a></li>
                        <li><a href="cueillettes.php">Cueillir<span class="spacing">soi-même</span></a></li>
                    </ul>
                    <a id="logo" href="index.php">Garden Shop</a>
                    <ul id="main-menu_account">
                      <?php
                        if(isset($_SESSION["user"])){
                          echo '<li><a href="profil.php">'.$_SESSION["user"].'</a></li>';
                          echo '<li><a href="logout.php">Se déconnecter</a></li>';
                        }else{
                          echo '<li><a class="open-popup-link" href="#connexion-popup">se connecter / s\'inscrire</a></li>';
                        }
                      ?>
                    </ul>
                </nav>

                  <!-- For smartphone -->
              <nav id="main-menu-smartphone">

                    <a id="logo-smartphone" href="index.php">Garden Shop</a>
                    <ul id="main-menu-account-smartphone">
                      <?php
                        if(isset($_SESSION["user"])){
                          echo '<li><a href="profil.php">'.$_SESSION["user"].'</a></li>';
                          echo '<li><a href="logout.php">Se déconnecter</a></li>';
                        }else{
                          echo '<li><a class="open-popup-link" href="#connexion-popup">se connecter<span class="smartphone-380-hide"> / s\'inscrire</span></a></li>';
                        }
                      ?>
                    </ul>

                    <ul id="main-menu-links-smartphone">
                        <li><a class="current" href="acheter.php">Acheter</a></li>
                        <li class="text-center"><a href="
                          <?php 
                            if(isset($_SESSION["id"])){

                              if(isset($_SESSION["shop"]) && $_SESSION["shop"] != "" ){
                                echo 'vendre.php';
                              }else{
                                echo '#create_shop-popup" class="open-popup-link';
                              }
                            }else{
                              echo '#connexion-popup" class="open-popup-link';
                            }
                          ?>
                          ">Vendre</a></li>
                        <li class="text-right"><a href="cueillettes.php">Cueillettes</a></li>
                    </ul>
                    
                </nav>
              </div>
      	</header>

        <iframe id="connexion-popup" class="white-popup mfp-hide" src="connexion.view.php" scrolling="no"></iframe>
        <iframe id="create_shop-popup" class="white-popup mfp-hide" src="create-shop.view.php" scrolling="no";></iframe>
        
        <div id="banner" class="banner-acheter"></div>

        <div class="container">
            <div id="content" class="page-search-result">

                <h2>Resultat de la recherche <span><?php echo $search_article; ?></span></h2>
                <p>Vous pouvez spécifier votre ville actuelle pour calculer la distance qui vous sépare des points de ventes.</p>

                <form action="search-result.view.php" method="post">
                    <input type="text" name="origin" placeholder="Votre position (5000 Namur)" value="<?php if( !empty( $_POST['origin'] ) ) echo $_POST['origin']; ?>">
                    <input type="submit" name="submit" value="Actualiser">
                </form>

                <table class="result">
                       <thead>
                           <tr>
                               <th class="distance">D. de <?php if( !empty( $_POST['origin'] ) ){echo $_POST['origin'];}else{echo '- ';} ?></th>
                               <th class="lieu">Lieu</th>
                               <th class="articles"><?php echo $search_type; ?></th>
                               <th class="prix">Prix</th>
                               <th class="satisfaction tablette-700-hide">Satisfaction</th>
                               <th class="magasin tablette-700-hide">Magasin</th>
                           </tr>
                       </thead>

                       <tbody> 
                        
                          <?php include 'search-result.inc.php'; ?>
                           
                       </tbody>
                    </table>

                    <div class="button">
                        <a class="button-more" href="acheter.php">Nouvelle recherche</a>
                    </div>

            </div><!-- content -->
        </div><!--container -->

        <footer>
          <div class="container">
            <ul id="footer-menu">
              <li><a href="contact.php">Contact</a></li>
              <li><a href="terms.php">Termes et conditions</a></li>
            </ul>
            <strong>Garden Shop ©2014</strong>
          </div>
        </footer>

        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script src="js/jquery.magnific-popup.js"></script>
        <script src="js/script.js"></script>
        <!--[if lt IE 10]><script src="js/script_ie.js"></script><![endif]-->
      
    </body>
</html>