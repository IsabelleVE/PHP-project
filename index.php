<?php

session_start();



// check if cookie exists
if( isset( $_SESSION['loggedin'] ) ){
    
    
    
    /* 
    
    // eerste cookie oplossing
    
    $cookie = $_COOKIE['loggedin']; // yes
   
    $salt = "fnRfrhJdbdfb!!!!dnkfbsOnkmqkn!!Bd!d";
    
    $arrCookie = explode("," , $cookie );
    $username = $arrCookie[0]; // samuel@sieben.com
    $secret = $arrCookie[1]; // password 
    
    if( md5($username.$salt) == $secret ){
        // welcome
    }
    else
    {
        header('location: login.php'); 
    }
    
    */
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
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
    <link rel="stylesheet" href="css/instagram.css">
    
   
    
     <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.2.min.js"></script>

	<!-- JQUERY -->
	<script>
		$(document).ready(function(){
			<!-- e = klikevent -->
			$("#btnSubmit").on("click", function(e){
				// tekstvak uitlezen
				var message = $("#activitymessage").val();

				// post naar een php pagina om op te slaan
				// message 1 is de naam van je JSON eigenschap
				// message 1 is hetgene dat je moet uitlezen voor te tonen
				// message 2 is de waarde van je tekstvak
				$.post( "ajax/savemessage.php", {message: message })
					.done(function( response ) {
						// boodschap bijvoegen in UI
						if(response.status == "success") {
							// bijvoegen
							var li = "<li style='display:none;'><h2>GoodBytes.be</h2> " + response.message + "</li>";
							$("ul#listupdates").prepend(li);
							$("ul#listupdates li:first-child").slideDown();

							// enkel de laatste tien worden getoond
							$("ul#listupdates li").last().slideUp(function(){
								// anders werkt het maar 1 keer
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
        
        form{
            border-radius: 3px; 
        }
        
		body
		{
			font-family: "Lucida Grande", Tahoma, Verdana, sans-serif;
            border-radius: 3px;
		}

		h1
		{
			margin-bottom: 5px;
		}

		h2
		{
			color: lightskyblue;
			display: inline;
		}

		ul
		{
			margin-top: 10px;
		}

		ul li
		{
			border-bottom: 1px dotted white;
			padding: 15px 5px;
		}

		#activitymessage
		{
			border: 1px solid grey;
			padding: 5px;
			width: 280px;
			font-size: 1.1em;
		}

		div.statusupdates
		{
			width: 380px;
			background-color: white;
			padding: 20px;
			margin: 0 auto;
		}

		#btnSubmit
		{
			background-color: lightskyblue;
			color: #fff;
			font-size: 1.1em;
			border: 1px solid #29447e;
            border-radius: 2px; 
		}

		div.errors
		{
			width: 380px;
			margin: 25px auto;
			background-color: #bd273a;
			-moz-border-radius: 10px;
			color: white;
			font-weight: bold;
			text-shadow: 1px 1px 1px #000;
			padding: 20px;
			display:none;
		}
	</style> 
    
</head>
<body>
        
       <nav id="navigatie">
           <p>EXPERIENCE</p>
           <img id="logoinsta" src="images/Instragram%20logo%202013.png">
       </nav>
       
        <section class="login-form-wrap" style="height: 156px">
          <p class="message">Welcome back!</p>
          <a style="color: black" href="logout.php">Logout</a>
        </section>





        <form method="post" action="">
		<div class="statusupdates">
			<h1>Feed</h1>


		</div>
	</form>

	
</body>
</html>