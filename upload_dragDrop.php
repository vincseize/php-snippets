///////////////////////////////////////////////////////////////// first possibility
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

///////////////////////////////////////////////////////////////// second possibility

<!DOCTYPE html>
<html>
 <head>
  <title>How to Upload a File using Dropzone.js with PHP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
 </head>
 <body>
  <div class="container">
   <br />
   <h3 align="center">How to Upload a File using Dropzone.js with PHP</h3>
   <br />
   
   <form action="upload6.php" class="dropzone" id="dropzoneFrom"> // path

   </form>
   
   <br />
   <br />
   <div align="center">
    <button type="button" class="btn btn-info" id="submit-all">Upload</button>
    <button type="button" class="btn btn-danger" id="cancel-all">Cancel</button>
   </div>
   <br />
   <br />
   <div id="preview"></div>
   <br />
   <br />
  </div>
 </body>
</html>

<script>

$(document).ready(function(){
 
 Dropzone.options.dropzoneFrom = {
  autoProcessQueue: false,
  acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg,.mp3",
  addRemoveLinks: true,
  maxFiles: 2,
  maxFilesize: 100, // mo
  // uploadMultiple: true,
  // parallelUploads: 100,
  init: function(){
   var submitButton = document.querySelector('#submit-all');
   myDropzone = this;
   submitButton.addEventListener("click", function(){
    myDropzone.processQueue();
   });
   this.on("complete", function(){
    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    {
     var _this = this;
     _this.removeAllFiles();
    }
    list_image();
   });
  },
 };

 list_image();

 function list_image()
 {
  $.ajax({
   url:"upload6.php", // path
   success:function(data){
    $('#preview').html(data);
   }
  });
 }

 var cancelButton = document.querySelector('#cancel-all');

 $(document).on('click', '#cancel-all', function(){
  location.reload();
 });

 $(document).on('click', '.remove_image', function(){
  var name = $(this).attr('id');
  $.ajax({
   url:"upload6.php",
   method:"POST",
   data:{name:name},
   success:function(data)
   {
    list_image();
   }
  })
 });
 
});
</script>

/// upload file

<?php

$folder_name = '../assets/ids/1/';

if(!empty($_FILES))
{
 $temp_file = $_FILES['file']['tmp_name'];
 $location = $folder_name . $_FILES['file']['name'];
 move_uploaded_file($temp_file, $location);
}

if(isset($_POST["name"]))
{
 $filename = $folder_name.$_POST["name"];
 unlink($filename);
}

$result = array();

$files = scandir($folder_name);
foreach ($files as $key => $link) {
    if(is_dir($folder_name.$link)){
        unset($files[$key]);
    }
}

$output = '<div class="row">';

if(false !== $files)
{
 foreach($files as $file)
 {
  if('.' !=  $file && '..' != $file)
  {
   $output .= '
   <div class="col-md-2">
    <img src="'.$folder_name.$file.'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
    <button type="button" class="btn btn-link remove_image" id="'.$file.'">Remove '.$file.'</button>
   </div>
   ';
  }
 }
}
$output .= '</div>';
echo $output;

?>


