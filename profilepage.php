<?php
include_once("classes/Db.class.php");
    if
    ($_FILES["file"]["error"] > 0
    ) {
//for error messages: see http://php.net/manual/en/features.file-upload.errors.php
        switch ($_FILES["file"]["error"]) {
            case 1:
                $msg = "U mag maximaal 2MB opladen.";
                break;
            default:
                $msg = "Sorry, uw upload kon niet worden verwerkt.";
        }
    }

else
{
//check MIME TYPE - http://php.net/manual/en/function.finfo-open.php
    $allowedtypes = array("image/jpg", "image/jpeg", "image/png", "image/gif");
    $filename = $_FILES["file"]["tmp_name"];
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $fileinfo = $finfo->file($filename);
    if (in_array($fileinfo, $allowedtypes))
    {
//move uploaded files
        $newfilename = "files/" . $_FILES["files"]["name"];
        if
        (move_uploaded_file($_FILES["files"]["tmp_name"], $newfilename))
        {
            $msg = "Upload gelukt!";
            echo "<img src=" . $newfilename . " />";
        }
        else
        {
            $msg = "Sorry, de upload is mislukt.";
        }
    }
    else
    {
        $msg = "Sorry, enkel afbeeldingen zijn toegestaan.";
    }
}
echo $msg . "<br />";


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
    width: 860px;
    height: 2080px;
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
        
        .discription{
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

</nav>


<section class="login-form-wrap2">

    <img class="profilepic" src="../PHP-project/images/vrouw-profilepic.png" alt="Profilepic">

    <div class="accountanddiscription">
        <h3 class="accountname">ACCOUNT NAME</h3>
        <p class="discription">Discription: Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek. Wat u hier leest is een voorbeeldtekst. Deze wordt later vervangen door de uiteindelijke tekst, die nu nog niet bekend is. De faketekst is dus een tekst die eigenlijk nergens over gaat. Het grappige is, dat mensen deze toch vaak lezen. Zelfs als men weet dat het om een faketekst gaat, lezen ze toch door.</p>

        <a href="#" alt="Edit Profile"><img class="editprofile" src="../PHP-project/images/edit-profile-button.png"></a>
    </div>
    <br/>
    <form action ="1-uploadform.code.php" method ="post" enctype = "multipart/form-data">
        <label for="file"> File to upload:</label>
        <input type="file" name="file"/>
        <br/>
        <input type="submit" name="submit" value="upload Now" />

    </form>
</section>


<footer>
    
    <h3> &copy; <p> Instagram 2015 - 2016 </p>  </h3>
</footer>  

</body>
</html>