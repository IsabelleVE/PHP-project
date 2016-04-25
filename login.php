<?php

include_once ("classes/User.class.php");


if(!empty($_POST)){
    try {
        $u = new User();
        $u->UserName = $_POST['username'];
        $u->Password= $_POST['password'];

        if($u->canLogin()) {
            session_start();
            $_SESSION['loggedin'] = $_POST['username'];
            header('location: index.php');
        }
    }catch(Exception $e) {
        $feedback = $e->getMessage();
    }
}
// if structure 

/*if( !empty( $_POST ) ){
    
$username = $_POST['email'];
$password = $_POST['password'];

    if( canLogin( $username, $password ) ){
        
        session_start(); 
        $_SESSION['loggedin'] = "yes";
        

        /* 
        
        // Vorige Cookieoplossing
        
        $salt = "fnRfrhJdbdfb!!!!dnkfbsOnkmqkn!!Bd!d";
        $secret = md5( $username.$salt );
        $cookieContent = $username.",".$secret; 

        // remember user
        
        setcookie( "loggedin", $cookieContent , time()+60*60*24*30); // cookie van 1 maand 
        */
        
        // redirect to index.php
        
       /* header('location: index.php');
        
    }  
    else{
        // feedback
        $error = "Wow stop! You are using wrong input"; 
    }
}
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instagram</title>
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
    <link rel="stylesheet" href="css/instagram.css">
</head>
<body>
        
       <nav id="navigatie">
           <p>WELCOME TO</p>
           <img id="logoinsta" src="images/Instragram%20logo%202013.png">
       </nav>
       
        <section class="login-form-wrap">
          <h1>Welcome to Instagram! Log In</h1>
          
          <?php
            
          if( isset($error) ){
              
              echo "<p class='error' > $error </p>";
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
          <h5><a href="#">Forgot password</a></h5>
        </section>
</body>
</html>