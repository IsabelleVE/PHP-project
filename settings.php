<?php

require("opvragengegevens.php");

?>



<html>
<head>
<title>Settings</title>
</head>

<body>
<!--kolomkoppen voor de tabel in plain HTML schrijven -->
<table border="0" width="70%" align="center">
<tr>
<td colspan="10"><h2 align="center">Gebruiker</h2></td>
</tr>
<tr>
<th>firstname</th>
<th>lastname</th>
<th>username</th>
<th>email</th>
<th>password</th>
<th>profilepic</th>	
</tr>
<!-- Vanaf hier de PHP while()-lus. Elke lusdoorgang schrijft
een tabelrij naar het scherm -->

<?php while ($rij = mysql_fetch_array($result)){
        echo ("<tr><td>". $rij['firstname'] . " </td> " .
            "<td>" . $rij['lastname'] . " </td>" .
            "<td>" . $rij['username'] . " </td>" .
            "<td>" . $rij['email'] . " </td>" . 
            "<td>" . $rij['password'] . " </td> " .
            "<td>" . $rij['profilepic'] . " </td></tr>\n ");
    }
?>

<!-- Einde van de lus, tabel afsluiten -->
</table>
<hr>
<!-- Eventueel rest van de pagina -->

</body>
</html>
