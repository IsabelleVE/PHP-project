<?php

session_start();

if( isset( $_SESSION['userID'] ) ){


}
else{
    // if not, redirect to login.php

    header('location: login.php');

}


    // COMMENTS PLAATSEN
/*
include_once("classes/Comment.class.php");
$comment = new Comment();

//controleer of er een update wordt verzonden
if(!empty($_POST['commentmessage']))
{
    $comment->Comment = $_POST['commentmessage'];
    try
    {
        $comment->saveComment();
    }
    catch (Exception $e)
    {
        $feedback = $e->removeComment();
    }
}

$recentComments = $comment->showComments();
*/
    // EINDE COMMENTS PLAATSEN

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Instagram</title>
    <link rel="stylesheet" href="css/instagram.css">
    <script>


        $(document).ready(function(){

            $("#btnSubmit").on("click", function(e){

                var message = $("#activitymessage").val();
                $.post( "ajax/savemessage.php", {message: message })
                    .done(function( response ) {

                        if(response.status == "success") {

                            var li = "<li style='display:none;'><h2>GoodBytes.be</h2> " + response.message + "</li>";
                            $("ul#listupdates").prepend(li);
                            $("ul#listupdates li:first-child").slideDown();
                            $("ul#listupdates li").last().slideUp(function(){

                                $(this).remove();
                            });

                        }
                        else {
                            // foutmelding geven
                        }
                    });

                e.preventDefault();

            })
        })


    </script>
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
            <input type="text" id="description" placeholder="Description">
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

                    <form method="post" action="">
                        <div class="statusupdates">
                            <h1>GoodBytes.be</h1>
                            <input type="text" value="What's on your mind?" id="commentmessage" name="commentmessage" />
                            <input id="btnSubmit" type="submit" value="Share" />

                            <ul id="listupdates">
                                <?php
                                if(count($recentComments) > 0)
                                {
                                    foreach($recentComments as $key=>$singleComment)
                                    {
                                        echo "<li><h2>GoodBytes.be</h2> ". $singleComment['comment_description'] ."</li>";
                                    }
                                }
                                else
                                {
                                    echo "<li>Waiting for first status update</li>";
                                }
                                ?>
                            </ul>

                        </div>
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