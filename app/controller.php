<?php



function cadastro($user,$email,$pass,$con) {
  
     global $message;
    
     $option = ['cost'=> 15,];
     $new_pass = password_hash($pass,PASSWORD_DEFAULT,$option);
    
     $query = "INSERT INTO `login` (`id`, `user`, `email`, `senha`) VALUES (NULL, '$user', '$email', '$new_pass')";
     mysqli_query($con,$query);

    return $message = "<div class='alert-sucess'>
        <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
         cadastro com sucesso
      </div>";
    
}


function login($user, $pass,$con) {
  
   
   

}