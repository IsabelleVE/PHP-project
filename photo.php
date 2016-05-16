<?php

include_once ("classes/User.class.php");
include_once ("classes/Photo.class.php");
session_start();

if( !isset( $_SESSION['userID'] ) ){
    header('location: login.php');

}


    $p = new Photo();
    $p->PostID = $_GET['postID'];
$photoDetail = $p->ShowPhotoDetails();
$u = new User();
$u->UserID = $photoDetail['userID'];
$userDetails = $u->getUserDetails();


/* PHP COMMENT */

// COMMENTS PLAATSEN


$comment = new Comment();

//controleer of er een update wordt verzonden
if(!empty($_POST['commentmessage']))
{
    $comment->Comment = $_POST['commentmessage'];
    $comment->Comment = $_SESSION['userID'];
    try
    {
        $comment->saveComment();
    }
    catch (Exception $e)
    {
        // $feedback = $e->removeComment();
    }
}

$recentComments = $comment->showComments();

// EINDE COMMENTS PLAATSEN



?><!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/instagram.css">
    <meta charset="UTF-8">
    <title>Document</title>

<style type="text/css">


    .login-form-wrap2 {
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
        max-width: 860px;
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

    .logoutnav{
        float: left;
        display: inline-block;
        margin-right: auto;
        margin-left: 50px;
        margin-top: -50px;
    }
    .profilepic{
        display: block;
        height: 100px;
        width: 100px;
        float:left;
        margin-top: 30px;
        margin-left: 20px;
        margin-bottom: 20px;
    }

    .accountname{
        text-align: left;
        color: #3f729b;

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

    .search{
        border: 2px solid #3f729b;
        border-radius: 1em;
    }
    .photoDetail{
        clear: both;
    }
    img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
    }
</style>
</head>
<body>
<nav id="navigatie">
    <p>PROFILE PAGE</p>
    <a href="wall.php"><img id="logoinsta" src="images/Instragram%20logo%202013.png"></a>

    <div class="uppericons">
        <a href="profilepage.php"><img class="profileicon" src="images/profileicon.png"></a>
        <a href="settings.php"><img class="settingsicon" src="images/settings-icon.png"></a>

    </div>


    <!-- SEARCH -->

    <form>
        <input class="search" type="text" size="30" onkeyup="showResult(this.value)" placeholder="Search...">
        <div id="livesearch"></div>
    </form>

    <!-- END SEARCH -->


    <a class="logoutnav" style="color: #3f729b" href="logout.php">Logout</a>

</nav>


<section class="login-form-wrap2">

    <img class="profilepic" src="files/profilepics/<?php echo $userDetails['profilpic'] ?>" alt="Profilepic">

    <div class="accountanddiscription">
        <h3 class="accountname"><?php echo $userDetails['username']?></h3>

    </div>
    <article class="photoDetail" >
        <img src="files/<?php echo $photoDetail['photo']?>" alt="">
        <p><?php echo $photoDetail['description'] ?></p>


    </article>

    <!-- Hier begint de comment !-->

    <form method="post" action="">
        <div class="statusupdates">
            <h1>GoodBytes.be</h1>
            <input type="text" placeholder="What's on your mind?" id="commentmessage" name="commentmessage" />
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


</section>


<footer>

    <h3> &copy; <p> Instagram 2015 - 2016 </p>  </h3>
</footer>
</body>
</html>