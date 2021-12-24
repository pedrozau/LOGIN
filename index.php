<?php 
require_once('./app/controller.php');
require_once('./app/connection.php');
session_start();
$message = "";

global $con;
if(isset($_POST['login'])):
    if(empty($_POST['user_name']) || empty($_POST['user_pass'])):
        $message = "<div class='alert-error'>
        <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
        Campos vazios
      </div>";
    else:
         $user_name = mysqli_real_escape_string($con,$_POST['user_name']);
         $user_pass = mysqli_real_escape_string($con,$_POST['user_pass']);
         $query = "SELECT * FROM login where user = '$user_name'";
         $result_0 = mysqli_query($con,$query);
         if(mysqli_num_rows($result_0) == 1):
            $query = "SELECT * FROM login where  user = '$user_name'";
            $result = mysqli_query($con,$query);
            while($rows = mysqli_fetch_array($result)):
                 if(password_verify($user_pass,$rows['senha'])):
                     $_SESSION['id_user'] = $rows['id'];
                     header("Location: ./app/home.php");
                 else:
                    $message = "<div class='alert-error'>
                    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
                     Senha está errada 
                  </div>";
                 endif;
            endwhile;

         else:
            $message = "<div class='alert-error'>
            <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>
            Usuario não existe
          </div>";
         endif;

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
    <title>Login</title>
</head>
<body>
    <?php echo $message; ?>
   <div id="login">
         <h1>Log in | <span><a href="cadastro.php">Cadastro</a></span></h1> 
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
           <input type="text" name="user_name" id="" placeholder="Utilizador..">
           <input type="password" name="user_pass" id="" placeholder="Senha...">
           <input type="submit" value="Login" name="login">
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