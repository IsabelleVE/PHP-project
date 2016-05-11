<?php
include("classes/Db.class.php");
/*

try {
    $conn =  Db::getInstance();
    $statement = $conn->prepare("UPDATE MyGuests SET lastname='Doe' WHERE id=2");




    // Prepare statement
    $stmt = $conn->prepare($statement);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $statement . "<br>" . $e->getMessage();
    }

$conn = null;

*/

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Instagram Settings</title>
    <link rel="stylesheet" href="css/instagram.css">
    
    <style type="text/css">
        
        	.login-form-wrap2 {
        display: block;
    background: grey;
    background: -moz-radial-gradient(center, ellipse cover, white 0%, white 100%);
    background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, white), color-stop(100%, white));
    background: -webkit-radial-gradient(center, ellipse cover, white 0%, white 100%);
    background: -o-radial-gradient(center, ellipse cover, white 0%, white 100%);
    background: -ms-radial-gradient(center, ellipse cover, white 0%, white 100%);
    background: radial-gradient(ellipse at center, white 0%, white 100%);
    filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='lightblue', endColorstr='lightblue', GradientType=1);
    border: 1px solid white;
    box-shadow: 0 1px white inset, 0 0 10px 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    /* relative */
    width: 560px;
    height: 380px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 30px;
    padding: 50px 30px 0 30px;
    text-align: center;
}
        
        .profileicon{
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-left: auto;
            margin-right: 20px;
        }
        
        .settingsicon{
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-left: auto;
            margin-right: 40px;
        }
        
        .uppericons{
            float: right;
            margin-top: -60px;
        }
        
        
        footer{
    background-color: #3f729b;
    display: block;
    color: white;
    border-top-left-radius: 2em;
    margin-top: 3em;
    border-top-right-radius: 2em;
    padding-bottom: 1em;
    text-align: center;
    
}

footer h3
{
    margin-top: 1em;
}

        
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
           
    </nav>
    

    
    <section class="login-form-wrap2">
    
    </section>


<footer>
    
    <h3> &copy; <p> Instagram 2015 - 2016 </p>  </h3>
</footer>   


</body>

</html>
