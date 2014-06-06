<?php

$no_article = true;

//légumes
if(!empty($legumes['article_type'])){

  $i = 0;

  //Nombre de ligne, il faut prendre en compte les id vide (si suprimer)
  //récupere la valeur de la derniere entré
  $last = end($legumes['article_type']);
  //récupere son ID
  $maxi = array_search($last, $legumes['article_type']);

  echo '<table class="storage">
          <thead>
            <tr>
              <td colspan="6">Légumes</td>
            </tr>
          </thead>
          </tbody>';
  
          for($i; $i <= $maxi; $i++) {
            //Dans le cas ou un article a été suprimer, verifier si l'ID existe tjrs
            if(isset($legumes['article_type'][$i])){
            echo '<tr>
                    <td class="articles">'.$legumes['article_type'][$i].'</td>
                    <td class="prix">'.$legumes['article_prix'][$i].'</td>
                    <td class="payement smartphone-380-hide">'.$legumes['article_modalite'][$i].'</td>
                    <td class="cueillir_oui smartphone-380-hide">';
                      if($legumes['article_cueillir'][$i] == 'oui'){
                        echo '<div class="cueillir-oui">
                                <img src="images/cueillir.png" alt="à cueillir" />
                               
                              </div>';
                      }
                    echo '</td>
                    <td class="edit"><a href="javascript:void(0)"></a></td>
                    <td class="supprimer"><a href="delete.php?i='.$i.'&type=legumes"></a></td>
                  </tr>';
            } 
          }
          echo '<tbody>
        </table>';
  }

//Fruits
  if(!empty($fruits['article_type'])){
  // $no_article = false;
  $i = 0;

  $last = end($fruits['article_type']);
  $maxi = array_search($last, $fruits['article_type']);
  
  echo '<table class="storage">
          <thead>
            <tr>
              <td colspan="6">Fruits</td>
            </tr>
          </thead>
          </tbody>';
  
          for($i; $i <= $maxi; $i++) {
            if(isset($fruits['article_type'][$i])){
              echo '<tr>
                      <td class="articles">'.$fruits['article_type'][$i].'</td>
                      <td class="prix">'.$fruits['article_prix'][$i].'</td>
                      <td class="payement smartphone-380-hide">'.$fruits['article_modalite'][$i].'</td>
                      <td class="cueillir_oui smartphone-380-hide">';
                        if($fruits['article_cueillir'][$i] == 'oui'){
                          echo '<div class="cueillir-oui">
                                  <img src="images/cueillir.png" alt="à cueillir" />
                                 
                                </div>';
                        }
                      echo '</td>
                      <td class="edit"><a href="javascript:void(0)"></a></td>
                      <td class="supprimer"><a href="delete.php?i='.$i.'&type=fruits"></a></td>
                    </tr>';
            } 
          }
          echo '<tbody>
        </table>';
  }

//Graines
  if(!empty($graines['article_type'])){

  // $no_article = false;
  $i = 0;
 
  $last = end($graines['article_type']);
  $maxi = array_search($last, $graines['article_type']);

  echo '<table class="storage">
          <thead>
            <tr>
              <td colspan="6">Graines</td>
            </tr>
          </thead>
          </tbody>';
  
          for($i; $i <= $maxi; $i++) {
            if(isset($graines['article_type'][$i])){
              echo '<tr>
                      <td class="articles">'.$graines['article_type'][$i].'</td>
                      <td class="prix">'.$graines['article_prix'][$i].'</td>
                      <td class="payement smartphone-380-hide">'.$graines['article_modalite'][$i].'</td>
                      <td class="cueillir_oui smartphone-380-hide">';
                        if($graines['article_cueillir'][$i] == 'oui'){
                          echo '<div class="cueillir-oui">
                                  <img src="images/cueillir.png" alt="à cueillir" />
                                 
                                </div>';
                        }
                      echo '</td>
                      <td class="edit"><a href="javascript:void(0)"></a></td>
                      <td class="supprimer"><a href="delete.php?i='.$i.'&type=graines"></a></td>
                    </tr>'; 
              }
            }
          echo '<tbody>
        </table>';
  }

//Confitures
  if(!empty($confitures['article_type'])){

  // $no_article = false;
  $i = 0;
  $last = end($confitures['article_type']);
  $maxi = array_search($last, $confitures['article_type']);
  
  echo '<table class="storage">
          <thead>
            <tr>
              <td colspan="6">Confitures</td>
            </tr>
          </thead>
          </tbody>';
  
          for($i; $i <= $maxi; $i++) {
            if(isset($confitures['article_type'][$i])){
              echo '<tr>
                      <td class="articles">'.$confitures['article_type'][$i].'</td>
                      <td class="prix">'.$confitures['article_prix'][$i].'</td>
                      <td class="payement smartphone-380-hide">'.$confitures['article_modalite'][$i].'</td>
                      <td class="cueillir_oui smartphone-380-hide">';
                        if($confitures['article_cueillir'][$i] == 'oui'){
                          echo '<div class="cueillir-oui">
                                  <img src="images/cueillir.png" alt="à cueillir" />
                                 
                                </div>';
                        }
                      echo '</td>
                      <td class="edit"><a href="javascript:void(0)"></a></td>
                      <td class="supprimer"><a href="delete.php?i='.$i.'&type=confitures"></a></td>
                    </tr>';
            }
          }
          echo '<tbody>
        </table>';
  }

//Aromatiques
  if(!empty($aromatiques['article_type'])){

  // $no_article = false;
  $i = 0;
  $last = end($aromatiques['article_type']);
  $maxi = array_search($last, $aromatiques['article_type']);
  
  echo '<table class="storage">
          <thead>
            <tr>
              <td colspan="6">Plantes aromatiques</td>
            </tr>
          </thead>
          </tbody>';
  
          for($i; $i <= $maxi; $i++) {
            if(isset($aromatiques['article_type'][$i])){
              echo '<tr>
                      <td class="articles">'.$aromatiques['article_type'][$i].'</td>
                      <td class="prix">'.$aromatiques['article_prix'][$i].'</td>
                      <td class="payement smartphone-380-hide">'.$aromatiques['article_modalite'][$i].'</td>
                      <td class="cueillir_oui smartphone-380-hide">';
                        if($aromatiques['article_cueillir'][$i] == 'oui'){
                          echo '<div class="cueillir-oui">
                                  <img src="images/cueillir.png" alt="à cueillir" />
                                 
                                </div>';
                        }
                      echo '</td>
                      <td class="edit"><a href="javascript:void(0)"></a></td>
                      <td class="supprimer"><a href="delete.php?i='.$i.'&type=aromatique
                      Achtung
                      s"></a></td>
                    </tr>'; 
            }
          }
          echo '<tbody>
        </table>';
  }

?>