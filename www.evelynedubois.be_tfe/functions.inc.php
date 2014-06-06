<?php

function message_erreur($errors, $input){
  if(count($_POST)>0){
    $message = '';
    if(count($errors[$input])>0){
      foreach($errors[$input] as $e){
        $message = $message.$e;
      }
    }
    return '<p class="error_messages">'.$message.'</p>';
  }
}

?>



        

    
