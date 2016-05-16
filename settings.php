<?php
session_start();

include_once("classes/Db.class.php");
include_once("classes/User.class.php");


if( isset( $_SESSION['loggedin'] ) ){


}
else{
    // if not, redirect to login.php

    header('location: login.php');

}
if(!empty($_POST)){

        $u = new User();
    // $u->Password= $_POST['oldPassword'];
    $u->FirstName = $_POST['firstname'];
    $u->LastName = $_POST['lastname'];
    $u->Email = $_POST['email'];
    $u->UserName = $_POST['username'];
    $u->UserID = $_SESSION['userID'];
    if(!empty($_POST['newPassword'])) {
        $u->Password = $_POST['newPassword'];
    }
    $u->changeSettings();

}
$conn =  Db::getInstance();
$statement = $conn->prepare("SELECT * FROM tblUser WHERE userID =" .$_SESSION['userID']);

//$statement->bindValue(":username",$this->m_sUserName);

$statement->execute();

if( $statement->rowCount() > 0){

    $result = $statement->fetch(); // array van resultaten opvragen


}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Instagram Settings</title>
    <link rel="stylesheet" href="css/instagram.css">
    
    <style type="text/css">

    </style>
	
</head>

<body>

    <nav id="navigatie">
        <p>SETTINGS</p>
        <a href="wall.php"><img id="logoinsta" src="images/Instragram%20logo%202013.png"></a>
        
        <div class="uppericons">
           <a href="profilepage.php"><img class="profileicon" src="images/profileicon.png"></a>
           <a href="settings.php"><img class="settingsicon" src="images/settings-icon.png"></a>
           </div>
           
           
           <a class="logoutnav" style="color: #3f729b" href="logout.php">Logout</a>
           
    </nav>
    

    
    <section class="login-form-wrap3">

        <form class="password-form" method="POST" action="">
            <label>firstname :
                <input class="textbox" type="text" name="firstname" value=<?php echo $result['firstname'] ?> >
            </label>
            <label>lastname :
                <input class="textbox" type="text" name="lastname" value=<?php echo $result['lastname'] ?> >
            </label>
            <label>username :
                <input class="textbox" type="text" name="username" value=<?php echo $result['username'] ?> >
            </label>
            <label>email :
                <input class="textbox" type="email" name="email" value=<?php echo $result['email'] ?> >
            </label>

            <label>
                <input class="textbox" type="password" name="newPassword" placeholder="New Password">
            </label>
            <input class="buttonReset" type="submit" value="Reset">
        </form>
    </section>


<footer>
    
    <h3> &copy; <p> Instagram 2015 - 2016 </p>  </h3>
</footer>   


</body>

</html>
