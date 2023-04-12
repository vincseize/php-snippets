<!doctype html>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="dropzone.css" rel="stylesheet" type="text/css">
        <script src="dropzone.js" type="text/javascript"></script>
    </head>
    <body >
        <div class="container" >
            <div class='content'>
            <form action="upload5.php" class="dropzone" id="dropzonewidget"> // path
                
            </form>  
            </div> 
        </div>
    </body>
</html>
/// upload file

<?php
$target_dir = "../assets/ids/1/mp3/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
    $status = 1;
}
?>
