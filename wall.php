<?php

session_start();

if( isset( $_SESSION['userID'] ) ){


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
    <link rel="stylesheet" href="css/instagram.css">
    
    <style type="text/css">
        
        
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
        
        .logoutnav{
            float: left;
            display: inline-block;
            margin-right: auto;
            margin-left: 50px;
            margin-top: -50px;
        }
        
       .wallpost {
        display: block;
    margin-left: auto;
    margin-right: auto;
           text-align: center;
   
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
        
	</style> 
	
</head>

<body>

    <nav id="navigatie">
        <p>EXPERIENCE</p>
        <a href="wall.php"><img id="logoinsta" src="images/Instragram%20logo%202013.png"></a>
        <form action ="description.php" method ="post" enctype = "multipart/form-data">
            <label for="file"> File to upload:</label>
            <input type="file" name="file"/>
            <br/>
            <input type="submit" name="submit" value="upload Now" />

        </form>
        <div class="uppericons">
           <a href="profilepage.php"><img class="profileicon" src="images/profileicon.png"></a>
           <a href="settings.php"><img class="settingsicon" src="images/settings-icon.png"></a>
           </div>
           
           
            <a class="logoutnav" style="color: #3f729b" href="logout.php">Logout</a>
           
    </nav>


    <section class="wallpostalex">


        <ul>
            <li class="wallpost">
                <div id="img-holder">
                    <?php  //echo "<img src=" . $newfilename . " />";?>
                </div>

                <div id="comment-section">
                    <p>This is a comment!! #YOLO</p>
                    <form action="">
                        <a href="#" id="like-btn">Like</a>
                        <input type="text" placeholder="Comment" id="activitymessage" name="activitymessage" />
                        <input id="btnSubmit" type="submit" value="Place" />
                    </form>
                </div>
            </li>
        </ul>
    </section>
  
    
    
    <footer>
    
    <h3> &copy; <p> Instagram 2015 - 2016 </p>  </h3>
</footer> 


</body>

</html>