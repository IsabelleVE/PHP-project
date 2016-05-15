<?php
session_start();
include_once("classes/Photo.class.php");
include_once("classes/Db.class.php");


if( isset( $_SESSION['userID'] ) ){


}
else{
    // if not, redirect to login.php

    header('location: login.php');

}
if (!empty ($_POST) ){
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
    } else {
//check MIME TYPE - http://php.net/manual/en/function.finfo-open.php
        $allowedtypes = array("image/jpg", "image/jpeg", "image/png", "image/gif");
        $path = $_FILES['file']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $filename = $_FILES["file"]["tmp_name"];
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $fileinfo = $finfo->file($filename);
        if (in_array($fileinfo, $allowedtypes)) {
//move uploaded files
            $newfilename = date('YmdHis') . $_SESSION['userID'] . '.' . $ext;

            if
            (move_uploaded_file($_FILES["file"]["tmp_name"], "files/" . $newfilename)) {
                $msg = "Upload gelukt!";

                if (!empty($_POST)) {
                    $p = new Photo();
                    $p->Description = $_POST['description'];
                    $p->Photo = $newfilename;
                    $p->UploadTime = date('YmdHis');
                    $p->UserID = $_SESSION['userID'];
                    $p->SavePhoto();

                }
            } else {
                $msg = "Sorry, de upload is mislukt.";
            }
        } else {
            $msg = "Sorry, enkel afbeeldingen zijn toegestaan.";
        }
    }
    echo $msg . "<br />";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action ="description.php" method ="POST" enctype = "multipart/form-data">
    <label for="file"> File to upload:</label>
    <input type="file" name="file"/>
    <input type="text" id="description" name="description" placeholder="Description">
    <br/>
    <input type="submit" name="submit" value="upload Now" />

    </form>
<img src="files/<?php echo $newfilename;?>" alt="">
</body>
</html>