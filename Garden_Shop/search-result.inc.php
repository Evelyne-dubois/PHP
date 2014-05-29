<?php

//Génère le code html pour afficher les resultats de la recherche dans le tableau
$not_found = true;

for($i; $i <= $maxi; $i++) {

    // Récupere toutes les données necessaire
    $sql = mysql_query("SELECT * FROM users WHERE id='$i' ");
    $element = mysql_fetch_array($sql);

    $search_type_table = unserialize($element[$search_type]);
   
    if(($search_type_table != null)){

        foreach ($search_type_table['article_type'] as $key){

                if($key == $search_article){

                    $not_found = false;

                    //prepare les données
                    $shop = $element["shops"];
                    $satisfaction = $element["satisfactions"];
                    // prepare la class de satisfaction
                    switch ($satisfaction) {
                        case 0:
                            $satisfaction = 'zero_etoile';
                            break;
                        case 1:
                            $satisfaction = 'une_etoile';
                            break;
                        case 2:
                            $satisfaction = 'deux_etoiles';
                            break;
                        case 3:
                            $satisfaction = 'trois_etoiles';
                            break;
                        case 4:
                            $satisfaction = 'quatre_etoiles';
                            break;
                        case 5:
                            $satisfaction = 'cinq_etoiles';
                            break;
                    }

                    $adresse_1 = unserialize($element['adresse_1']);
                    $adresse_cp = $adresse_1['cp'];
                    $adresse_ville = $adresse_1['ville'];

                    // beta, non dynamique
                    // $distance = $element['distance'];
                    $distance = '- ';


                    if(!empty($_POST['origin'])){

                        $origin = $_POST['origin'];
                        $origin = preg_replace('#[^A-Za-z0-9çéàèêÈÉÊÀ]+#', '', $origin);
                        // echo $origin;
                        $destination = $adresse_cp.$adresse_ville;
                    

                        $url='http://maps.google.com/maps/api/directions/xml?language=fr&origin='.$origin.'&destination='.$destination.'&sensor=false';
                        $xml=file_get_contents($url);
                        $root = simplexml_load_string($xml);
                        $distance=$root->route->leg->distance->value;
                        $duree=$root->route->leg->duration->value; 
                        $etapes=$root->route->leg->step;

                        $result = array(
                             'distanceEnMetres'=>$distance,
                             // 'dureeEnSecondes'=>$duree,
                             // 'etapes'=>$etapes,
                             // 'adresseDepart'=>$root->route->leg->start_address,
                             // 'adresseArrivee'=>$root->route->leg->end_address
                        );

                        $distance = $distance/1000;
                        $distance = number_format($distance,1);
                    }




                    

                    echo '<tr>';
                    echo '<td class="distance"><a href="magasin.php?id=' . $i .'">'.$distance.' Km</a></td>';
                    echo '<td class="lieu"><a href="magasin.php?id=' . $i .'">'.$adresse_ville.'</a></td>';
                    echo '<td class="articles"><a href="magasin.php?id=' . $i .'">';
                    foreach($search_type_table['article_type'] as $key){
                        echo '<span>'.$key.'</span>';
                    }
                    echo '</a></td>';
                    echo '<td class="prix"><a href="magasin.php?id=' . $i .'">';
                    foreach($search_type_table['article_prix'] as $key){
                        echo '<span>'.$key.'</span>';
                    }
                    echo '</a></td>';
                    echo '<td  class="satisfaction '.$satisfaction.' tablette-700-hide"><a href="magasin.php?id=' . $i .'">'.$satisfaction.'</a></td>';
                    echo '<td class="magasin tablette-700-hide"><a href="magasin.php?id=' . $i .'">'.$shop.'</a></td>';
                    echo '</tr>';
                }
        }
    }
}
if($not_found == true){
    echo '<tr><td class="not-found" colspan="6">Désoler, votre article n\'a pas été trouvé</td></tr>';
}

?>
