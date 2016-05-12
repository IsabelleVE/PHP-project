<?php if
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
?>
