<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <title>Acheter | Garden Shop</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

 
    </head>
 
    <body>

    	<header>
            <div class="container">
                <nav id="main-menu">
                    <ul id="main-menu_links">
                        <li><a class="current" href="acheter.html">Acheter</a></li>
                        <li><a href="vendre.html">Vendre</a></li>
                        <li><a href="cueillettes.html">ceuillettes</a></li>
                    </ul>
                    <a id="logo" href="index.html">Garden Shop</a>
                    <ul id="main-menu_account">
                        <li><a href="">se connecter / s'inscrire</a></li>
                    </ul>
                </nav>
            </div>
    	</header>

        <div id="banner" class="banner-search-result">
            



        </div>

        <div class="container">
            <div id="content" class="page-search-result">

                <h2>Resultat de la recherche <span>Pommes</span></h2>
                <p>Vous pouvez spécifier votre ville actuelle pour calculer la distance qui vous sépare des points de ventes.</p>

                <form action="" method="post">
                    <input type="text" name="" placeholder="Adresse n°1" >
                    <input type="text" name="" placeholder="Adresse n°1" >

                    <input type="submit" name="submit" value="Actualiser">
                </form>

                <table class="result">
                       <thead> <!-- En-tête du tableau -->
                           <tr>
                               <th class="distance">Nam / Din</th>
                               <th class="lieu">Lieu</th>
                               <th class="articles">Articles en stock</th>
                               <th class="prix">Prix</th>
                               <th class="satisfaction">Satisfaction</th>
                               <th class="magasin">Magasin</th>
                           </tr>
                       </thead>

                       <tbody> <!-- Corps du tableau -->
                          <?php

                          mysql_connect("localhost","root","");
mysql_select_db("tfe");

                            $i = 1;
                            $res = mysql_query("SELECT COUNT(id)  FROM register_validation");
                            $maxi = mysql_fetch_assoc($res);
                            $maxi = $maxi['COUNT(id)'];
                            // $search_article = trim(strip_tags($_POST['search_article']));


                            echo '<form>';
                            for($i; $i <= $maxi; $i++) {

                                $sql = mysql_query("SELECT legumes_3 FROM register_validation WHERE id='$i' ");
                                $element = mysql_fetch_array($sql);
                                $legumes = unserialize($element['legumes_3']);

                                foreach ($legumes['legume_type'] as $key){

                                        if($key == 'poire'){
                                            echo '<tr>';
                                            echo '<td>'.$i.'</td>';
                                            echo '<td>lieu</td>';
                                            echo '<td>';
                                            foreach($legumes['legume_type'] as $key){
                                                echo '<li>'.$key.'</li>';

                                                // $key_id = array_search($key, $legumes['legume_type']);
                                                // // echo $key_id;

                                                // $euros = $legumes['legume_prix'][$key_id];
                                                // echo $euros.'</li>';
                                                // echo '</tr>';
                                            }
                                            echo '</td>';
                                            echo '<td>';
                                            foreach($legumes['legume_prix'] as $key){
                                                echo '<li>'.$key.'</li>';

                                                // $key_id = array_search($key, $legumes['legume_type']);
                                                // echo $key_id;

                                                // $euros = $legumes['legume_prix'][$key_id];
                                                // echo $euros.'</li>';
                                                // echo '</tr>';
                                            }
                                            echo '</td>';
                                            echo '</tr>';
                                        }


                                //     echo $key;
                                // print_r ($legumes['legume_type']);
                                // echo '</br>';
                                // print_r($legumes);

                                }
                            }
                            echo '</form>';




                          ?>




                           <tr>
                               <td class="distance"><a href="#">3km / 34km</a></td>
                               <td class="lieu"><a href="#">Saint-Servais</a></td>
                               <td class="articles">
                                    <a href="#">
                                        <strong>Pommes</strong>
                                        <span>Tomates</span>
                                        <span>Concombres</span>
                                        <span>Cornichon</span>
                                    </a>
                                </td>
                                <td class="prix">
                                    <a href="#">
                                        <strong>0.80€ / kg</strong>
                                        <span>0.95€ / kg</span>
                                        <span>0.30€ / pc</span>
                                        <span>3€ / kg</span>
                                    </a>
                                </td>
                               <td class="satisfaction"><a href="#"><img src="images/4sur5.png" alt="4 sur 5 étoiles" /></a></td>
                               <td class="magasin"><a href="#">La source printanière</a></td>
                           </tr>
                           <tr>
                               <td class="distance"><a href="#">7km / 34km</a></td>
                               <td class="lieu"><a href="#">Flawinne</a></td>
                               <td class="articles">
                                    <a href="#">
                                        <span>Pommes</span>
                                        <span>Fraises</span>
                                    </a>
                                </td>
                                <td class="prix">
                                    <a href="#">
                                        <span>0.75€ / kg</span>
                                        <span>1.80€ / kg</span>
                                    </a>
                                </td>
                               <td class="satisfaction"><a href="#"><img src="images/3sur5.png" alt="3 sur 5 étoiles" /></a></td>
                               <td class="magasin"><a href="#">Passion des fruits</a></td>
                           </tr>
                       </tbody>
                    </table>

                    <div class="button">
                        <a class="button-more" href="acheter.html">Nouvelle recherche</a>
                    </div>


               
    
            </div><!-- content -->
        </div><!--container -->

        <footer>
          <div class="container">
            <ul id="footer-menu">
              <li><a href="contact.html">Contact</a></li>
              <li><a href="contact.html">En savoir plus</a></li>
              <li><a href="contact.html">Crédits</a></li>
            </ul>
            <strong>Garden Shop ©2014</strong>
          </div>
        </footer>
      
    </body>
</html>