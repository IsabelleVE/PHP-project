<!DOCTYPE html>
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
        
	</style> 
	
</head>

<body>

    <nav id="navigatie">
        <p>EXPERIENCE</p>
        <a href="wall.php"><img id="logoinsta" src="images/Instragram%20logo%202013.png"></a>
        
        <div class="uppericons">
           <a href="profilepage.php"><img class="profileicon" src="images/profileicon.png"></a>
           <a href="settings.php"><img class="settingsicon" src="images/settings-icon.png"></a>
           </div>
           
    </nav>

    <section class="login-form-wrap" style="height: 156px">
        <p class="message">Welcome back!</p>
        <a style="color: black" href="logout.php">Logout</a>
    </section>


    <section class="">
        <ul>
            <li class="wallpost">
                <div id="img-holder">

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


</body>

</html>