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



















        // if(isset($_POST['submit'])){

        //     $user = htmlspecialchars(trim($_POST['user']));
        //     $password = htmlspecialchars(trim($_POST['password']));
        //     $email = htmlspecialchars(trim($_POST['email']));


        //     if($user && $password && $email){

        //       if(strlen($password)>4){

        //           $password = md5($password);

        //           mysql_connect("mysql51-98.perso","evelyned-blog","mcf287C7");
        //           mysql_select_db("tfe");

        //           $query = mysql_query(" INSERT INTO register_validation VALUES('','$user','$password','$email') ");

        //         header('Location: index.php');



        //       }else{
        //         echo "minimum 5 caractere";
        //       }
        //     }
        //     else{
        //       echo "remplissez tout les champs";
        //     }
        // }





        // function message_erreur($errors, $input){
        // 	if(count($_POST)>0){
        // 		$message = '';
        // 		if(count($errors[$input])>0){
        // 			foreach($errors[$input] as $e){
        // 				$message = $message . '<li>'.$e.'</li>';
        // 			}
        // 		}
        // 		return '<ul class="error_messages">'.$message.'</ul>';
        // 	}
        // }



?>



        

    
