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


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instagram</title>
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
    <link rel="stylesheet" href="css/instagram.css">
    </head>
   <body>
    

	<h5>Dit is een test</h5>
</body>
</html>