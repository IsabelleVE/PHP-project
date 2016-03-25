<?php

session_start();



// check if cookie exists
if( isset( $_SESSION['loggedin'] ) ){
    
    
    
    /* 
    
    // eerste cookie oplossing
    
    $cookie = $_COOKIE['loggedin']; // yes
   
    $salt = "fnRfrhJdbdfb!!!!dnkfbsOnkmqkn!!Bd!d";
    
    $arrCookie = explode("," , $cookie );
    $username = $arrCookie[0]; // samuel@sieben.com
    $secret = $arrCookie[1]; // password 
    
    if( md5($username.$salt) == $secret ){
        // welcome
    }
    else
    {
        header('location: login.php'); 
    }
    
    */
}
else{
    // if not, redirect to login.php
    
    header('location: login.php');
    
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
        <section class="login-form-wrap" style="height: 156px">
          <p class="message">Welcome back!</p>
          <a style="color: white" href="logout.php">Logout</a>
        </section>
</body>
</html>