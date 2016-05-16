<?php
include_once("classes/Db.class.php");
    include_once ("classes/User.class.php");
include_once ("classes/Photo.class.php");
session_start();

if( !isset( $_SESSION['userID'] ) ){
    header('location: login.php');

}
$u = new User();
    $u->UserID = $_GET["userID"];
   $userDetails = $u->getUserDetails();
    $p = new Photo();
    $p->UserID = $_GET["userID"];
    $profilePhotos = $p->ShowProfilePhotos();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instagram Profile Page</title>
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
    <link rel="stylesheet" href="css/instagram.css">

    
    
    
    <script>

function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
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


        /* Afbeelding Vrouw */

        .profilepic{
            display: block;
            height: 100px;
            width: 100px;
            float:left;
            margin-top: 30px;
            margin-left: 20px;
        }

        .accountname{
            text-align: left;
            color: #3f729b;

        }

        .description{
            text-align: left;
        }

        .accountanddiscription{
            display: block;
            float: left;
            width: 70%;
            margin-left: 80px;
        }

        .editprofile{
            display: block;
            height: 50px;
            width: 100px;
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
        .userPhotos{
            clear: both;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .userPhotos div{
            width: 32%;
            margin-bottom: 15px;
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
        <p class="description">Description: <?php echo $userDetails['description'] ?></p>

    </div>
<article class="userPhotos">
    <?php foreach($profilePhotos as $profilePhoto): ?>
       <div>
           <a href="photo.php?postID=<?php echo $profilePhoto['postID']?>"><img src="files/<?php echo $profilePhoto['photo']; ?>" alt=""></a>
           </div>
    <?php endforeach; ?>
</article>
</section>


<footer>
    
    <h3> &copy; <p> Instagram 2015 - 2016 </p>  </h3>
</footer>  

</body>
</html>