<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instagram Profile Page</title>
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
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
           
       </nav>
       
       
        <section class="login-form-wrap2">
        
        <img class="profilepic" src="../PHP-project/images/vrouw-profilepic.png" alt="Profilepic">
        
        <div class="accountanddiscription">
         <h3 class="accountname">ACCOUNT NAME</h3>
           <p class="discription">Discription: Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek. Wat u hier leest is een voorbeeldtekst. Deze wordt later vervangen door de uiteindelijke tekst, die nu nog niet bekend is. De faketekst is dus een tekst die eigenlijk nergens over gaat. Het grappige is, dat mensen deze toch vaak lezen. Zelfs als men weet dat het om een faketekst gaat, lezen ze toch door.</p>
           
            <a href="#" alt="Edit Profile"><img class="editprofile" src="../PHP-project/images/edit-profile-button.png"></img></a> 
            </div>
            
        </section>
</body>
</html>