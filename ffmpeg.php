<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<h1>This is a Heading</h1>
<form method = "post" enctype = "multipart/form-data" action= "">
 <input type = "file" name = "files">
 <input type = "submit" name= "submit" value = "submit">
</form>

</body>
</html>
<?php
//include "./ffmpeg";
if(isset($_POST['submit'])){
 
 $ffmpeg = "ffmpeg\\bin\\ffmpeg";
$videoFile = $_FILES['files']['tmp_name'];
if (!file_exists('upload')) {
  mkdir('upload', 0777, true);
}
$name = basename($_FILES["files"]["name"]);
$videodesination = "upload";

$imageFile= $name.".jpg";
$size = "270x150";
$getFromSecond ="5";

//shell_exec("ffmpeg -i ".$videoFile." -an -ss" .$getFromSecond. "-s $size $imageFile"); 
$cmd = "$ffmpeg -i $videoFile -an -ss $getFromSecond -s $size $imageFile";

if(!shell_exec($cmd)){
 

  move_uploaded_file($videoFile, "$videodesination/$name");
  echo "thumbnail created";
}else{
  echo "oops";
}

}
?>