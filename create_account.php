<?php
include_once ("classes/User.class.php");
if(!empty($_POST)){
    try {
        $u = new User();
        $u->FirstName = $_POST['firstname'];
        $u->LastName = $_POST['lastname'];
        $u->Email = $_POST['email'];
        $u->UserName = $_POST['username'];
        $u->Password= $_POST['password'];
        $u->Save();
        header('location: wall.php');

    }catch(Exception $e) {
        $feedback = $e->getMessage();
    }
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Instagram Sign Up</title>
    <link rel="stylesheet" media="all" href="css/instagram.css">
    <link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/screen.css" />
    
</head>
<body>

<nav id="navigatie">
           <p>SIGN UP</p>
           <img id="logoinsta" src="images/Instragram%20logo%202013.png">
</nav>
       
       
<div>
    <?php if( isset($feedback)): ?>
        <div class="feedback"><?php echo $feedback?></div>
    <?php endif; ?>
    <section class="login-form-wrap">
        <h1>Sign Up</h1>

        <?php

        if( isset($error) ){

            echo "<p class='error' > $error </p>";
        }

        ?>

        <form class="login-form" method="POST" action="">
            <label>
                <input type="text" name="firstname" placeholder="firstname">
            </label>
            
             <label>
                <input type="text" name="lastname" placeholder="lastname">
            </label>
            <label>
                <input type="email" name="email" placeholder="Email">
            </label>
            <label>
                <input type="text" name="username" placeholder="username">
            </label>
            <label>
                <input type="password" name="password" placeholder="Password">
            </label>
            <input type="submit" value="Sign Up">
        </form>
    </section>
</div>
</body>
</html>