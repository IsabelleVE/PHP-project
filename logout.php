<?php

// verschil sessions en cookies => vraag volgende test!!!!!!!! 

session_start();
session_destroy(); 

/* 
// cookie manier 
setcookie("loggedin", "", time()-3600);
*/

header('location: login.php');


?>