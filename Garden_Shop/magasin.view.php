<?php

//légumes
if(!empty($legumes)){

  $i = 0;
  $maxi = COUNT($legumes['article_type']) - 1;
  
  echo '<table>
          <thead>
            <tr>
              <td colspan="4">legumes</td>
            </tr>
          </thead>
          </tbody>';
  
          for($i; $i <= $maxi; $i++) {

            echo '<tr>
                    <td class="articles">'.$legumes['article_type'][$i].'</td>
                    <td class="prix">'.$legumes['article_prix'][$i].'</td>
                    <td class="mode smartphone-480-hide">'.$legumes['article_modalite'][$i].'</td>
                    <td class="cueillir">';
                      if($legumes['article_cueillir'][$i] == 'oui'){
                        echo '<div class="cueillir-oui">
                                <img src="images/cueillir.png" alt="à cueillir" />
                                <div class="horaire .smartphone-480-hide">
                                  <p>'.$legumes['article_adresse'][$i].'</p>
                                  <p>'.$legumes['article_jour'][$i].'</p>
                                  <p>'.$legumes['article_heure'][$i].'</p>
                                </div>
                              </div>';
                      }
                    echo '</td>
                  </tr>'; 
          }
          echo '<tbody>
        </table>';
  }

//Fruits
  if(!empty($fruits)){

  $i = 0;
  $maxi = COUNT($fruits['article_type']) - 1;
  
  echo '<table>
          <thead>
            <tr>
              <td colspan="4">Fruits</td>
            </tr>
          </thead>
          </tbody>';
  
          for($i; $i <= $maxi; $i++) {

            echo '<tr>
                    <td class="articles">'.$fruits['article_type'][$i].'</td>
                    <td class="prix">'.$fruits['article_prix'][$i].'</td>
                    <td class="mode smartphone-480-hide">'.$fruits['article_modalite'][$i].'</td>
                    <td class="cueillir">';
                      if($fruits['article_cueillir'][$i] == 'oui'){
                        echo '<div class="cueillir-oui">
                                <img src="images/cueillir.png" alt="à cueillir" />
                                <div class="horaire .smartphone-480-hide">
                                  <p>'.$fruits['article_adresse'][$i].'</p>
                                  <p>'.$fruits['article_jour'][$i].'</p>
                                  <p>'.$fruits['article_heure'][$i].'</p>
                                </div>
                              </div>';
                      }
                    echo '</td>
                  </tr>'; 
          }
          echo '<tbody>
        </table>';
  }

//Graines
  if(!empty($graines)){

  $i = 0;
  $maxi = COUNT($graines['article_type']) - 1;
  
  echo '<table>
          <thead>
            <tr>
              <td colspan="4">Graines</td>
            </tr>
          </thead>
          </tbody>';
  
          for($i; $i <= $maxi; $i++) {

            echo '<tr>
                    <td class="articles">'.$graines['article_type'][$i].'</td>
                    <td class="prix">'.$graines['article_prix'][$i].'</td>
                    <td class="mode smartphone-480-hide">'.$graines['article_modalite'][$i].'</td>
                    <td class="cueillir">';
                      if($graines['article_cueillir'][$i] == 'oui'){
                        echo '<div class="cueillir-oui">
                                <img src="images/cueillir.png" alt="à cueillir" />
                                <div class="horaire .smartphone-480-hide">
                                  <p>'.$graines['article_adresse'][$i].'</p>
                                  <p>'.$graines['article_jour'][$i].'</p>
                                  <p>'.$graines['article_heure'][$i].'</p>
                                </div>
                              </div>';
                      }
                    echo '</td>
                  </tr>'; 
          }
          echo '<tbody>
        </table>';
  }

//Confitures
  if(!empty($confitures)){

  $i = 0;
  $maxi = COUNT($confitures['article_type']) - 1;
  
  echo '<table>
          <thead>
            <tr>
              <td colspan="4">Confitures</td>
            </tr>
          </thead>
          </tbody>';
  
          for($i; $i <= $maxi; $i++) {

            echo '<tr>
                    <td class="articles">'.$confitures['article_type'][$i].'</td>
                    <td class="prix">'.$confitures['article_prix'][$i].'</td>
                    <td class="mode smartphone-480-hide">'.$confitures['article_modalite'][$i].'</td>
                    <td class="cueillir">';
                      if($confitures['article_cueillir'][$i] == 'oui'){
                        echo '<div class="cueillir-oui">
                                <img src="images/cueillir.png" alt="à cueillir" />
                                <div class="horaire .smartphone-480-hide">
                                  <p>'.$confitures['article_adresse'][$i].'</p>
                                  <p>'.$confitures['article_jour'][$i].'</p>
                                  <p>'.$confitures['article_heure'][$i].'</p>
                                </div>
                              </div>';
                      }
                    echo '</td>
                  </tr>'; 
          }
          echo '<tbody>
        </table>';
  }

//Aromatiques
  if(!empty($aromatiques)){

  $i = 0;
  $maxi = COUNT($aromatiques['article_type']) - 1;
  
  echo '<table>
          <thead>
            <tr>
              <td colspan="4">Plantes aromatiques</td>
            </tr>
          </thead>
          </tbody>';
  
          for($i; $i <= $maxi; $i++) {

            echo '<tr>
                    <td class="articles">'.$aromatiques['article_type'][$i].'</td>
                    <td class="prix">'.$aromatiques['article_prix'][$i].'</td>
                    <td class="mode smartphone-480-hide">'.$aromatiques['article_modalite'][$i].'</td>
                    <td class="cueillir">';
                      if($aromatiques['article_cueillir'][$i] == 'oui'){
                        echo '<div class="cueillir-oui">
                                <img src="images/cueillir.png" alt="à cueillir" />
                                <div class="horaire .smartphone-480-hide">
                                  <p>'.$aromatiques['article_adresse'][$i].'</p>
                                  <p>'.$aromatiques['article_jour'][$i].'</p>
                                  <p>'.$aromatiques['article_heure'][$i].'</p>
                                </div>
                              </div>';
                      }
                    echo '</td>
                  </tr>'; 
          }
          echo '<tbody>
        </table>';
  }

?>