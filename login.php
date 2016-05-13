<?php
session_start();
include_once ("classes/User.class.php");


if(!empty($_POST)){
    try {
        $u = new User();
        $u->UserName = $_POST['username'];
        $u->Password= $_POST['password'];

        if($u->canLogin()) {
            
            $_SESSION['loggedin'] = $_POST['username'];
            header('location: wall.php');
        } else
        {
            throw new Exception("Your username or password was incorrect!");
        }
    }catch(Exception $e) {
        $feedback = $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instagram</title>
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
    <link rel="stylesheet" href="css/instagram.css">
    <style>
    
    .signupbutton{
        color: white;
        border: 2px solid red;
        background-color: red;
        border-radius: 1em;
        padding: 4px;
    }
        
    
    </style>
</head>
<body>
        
       <nav id="navigatie">
           <p>WELCOME TO</p>
           <img id="logoinsta" src="images/Instragram%20logo%202013.png">
       </nav>
       
        <section class="login-form-wrap">
          <h1>Welcome to Instagram! Log In</h1>
          
          <?php
            
          if( isset($feedback) ){
              
              echo "<p class='error' > $feedback </p>";
          }
            
            ?>
          
          <form class="login-form" method="POST" action="">
            <label>
              <input type="text" name="username" placeholder="Username">
            </label>
            <label>
              <input type="password" name="password" placeholder="Password">
            </label>
            <input type="submit" value="Login">
          </form>
          <h5><a href="#">Forgot password?</a></h5>
<<<<<<< Updated upstream
            <h5 class="signupbutton">Dont have an account?<a href="create_account.php">Sign up</a></h5>
=======
            <h5>Dont have an account?<a href="createaccount.php">Sign up</a></h5>
>>>>>>> Stashed changes
        </section>
</body>
</html>