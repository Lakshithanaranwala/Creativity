<?php
$target_dir = "file/";
$target_file = $target_dir . $_FILES["fileToUpload"]["name"];


$uploadOk = 1;
//get the file type
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

//rename file before save
$newname=$target_dir ."supun".date("y-m-d").".".$imageFileType ;

//check file type
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

$save=move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$newname);
if($save)
{echo "uploaded";}
?>




//check file type
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "txt" && $imageFileType != "pdf" && $imageFileType != "docx") {
    echo "Sorry, only JPG, JPEG, PNG, GIF, TXT, PDF, & DOCX  files are allowed.";
    
}