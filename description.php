<?php
include_once("classes/Photo.class.php");
session_start();

if( isset( $_SESSION['loggedin'] ) ){


}
else{
    // if not, redirect to login.php

    header('location: login.php');

}
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
        $newfilename = "files/" . $_FILES["file"]["name"];
        if
        (move_uploaded_file($_FILES["file"]["tmp_name"], $newfilename))
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
$username = $_SESSION["loggedin"];
echo $username;
if(!empty($_POST)){

        $p = new Photo();
        $p->description = $_POST['description'];
    $p->description =$_POST['username'];
    $p->SavePhoto();

}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<input type="text" id="description" placeholder="Description">
<a href="wall.php" ><input type="submit" value="Post"></a>
</body>
</html>
