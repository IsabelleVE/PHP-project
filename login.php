<?php

// function canLogin
// cookies staan op de gebruiker zijn/haar pc => waardoor manipuleerbaar

function canLogin( $p_username, $p_password ){
    if( $p_username == "samuel@sieben.com" && $p_password == "secret" ){

        return true;
    }
    else{

        return false;
    }

}

// if structure 

if( !empty( $_POST ) ){
    
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
        
        header('location: index.php');
        
    }  
    else{
        // feedback
        $error = "Whoops, connot login."; 
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook</title>
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
    <link rel="stylesheet" href="css/facebook.css">
</head>
<body>
        <section class="login-form-wrap">
          <h1>Facebook</h1>
          
          <?php
            
          if( isset($error) ){
              
              echo "<p class='error' > $error </p>";
          }
            
            ?>
          
          <form class="login-form" method="POST" action="">
            <label>
              <input type="email" name="email" placeholder="Email">
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