<?php 
require_once('./app/controller.php');
require_once('./app/connection.php');

//mysqli_real_escape_string

$message = "";
 global $con;
if(isset($_POST['cadastro'])):
 
    if(empty($_POST['user_name']) or empty($_POST['user_email']) or empty($_POST['user_pass'])):
        $message = "<div class='alert-error'>
        <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
        Campos vazios
      </div>";
    else:
        $user_name = mysqli_real_escape_string($con,$_POST['user_name']);
        $user_email = mysqli_real_escape_string($con,$_POST['user_email']);
        $user_pass = mysqli_real_escape_string($con,$_POST['user_pass']);

        cadastro($user_name,$user_email,$user_pass,$con);
        
        
    endif;
endif;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/style.css">
    <title>Cadastro</title>
</head>
<body>
    <?php echo $message; ?>
   <div id="cadastro">
   <h1>Cadastro | <span><a href="index.php">Log In</a></span></h1> 
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
           <input type="text" name="user_name" id="" placeholder="Utilizador...">
           <input type="text" name="user_email" id="" placeholder="Email...">
           <input type="password" name="user_pass" id="" placeholder="Senha..">
           <input type="submit" value="Cadastro"  name="cadastro">
      </form>
    
   </div>
   <script>
// Get all elements with class="closebtn"
var close = document.getElementsByClassName("closebtn");
var i;

// Loop through all close buttons
for (i = 0; i < close.length; i++) {
  // When someone clicks on a close button
  close[i].onclick = function(){

    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var div = this.parentElement;

    // Set the opacity of div to 0 (transparent)
    div.style.opacity = "0";

    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
</body>
</html>