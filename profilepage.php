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