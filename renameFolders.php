<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function custom_copy($src, $dst) { 
  
    // open the source directory
    $dir = opendir($src); 
  
    // Make the destination directory if not exist
    @mkdir($dst); 
  
    // Loop through the files in source directory
    while( $file = readdir($dir) ) { 
  
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) 
            { 
  
                // Recursively calling custom copy function
                // for sub directory 
                custom_copy($src . '/' . $file, $dst . '/' . $file); 
  
            } 
            else { 
                copy($src . '/' . $file, $dst . '/' . $file); 
            } 
        } 
    } 
  
    closedir($dir);
} 
  

function deleteDir($path) {
    return is_file($path) ?
            @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
}

function renameDirectoryRecursively($dir, $oldName, $newName) {
    if (!is_dir($dir)) {
        return;
    }

    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $currentPath = $dir . DIRECTORY_SEPARATOR . $file;

            if (is_dir($currentPath)) {
                if ($file === $oldName) {

                    echo "Found directory '$oldName' at: $currentPath<br>";
                
                    $newPath = $dir . DIRECTORY_SEPARATOR . $newName;

                    custom_copy($currentPath, $newPath);

                    deleteDir($currentPath);
                    
                    echo "Renamed directory '$oldName' to '$newName' at: $newPath<br>";
                }
                renameDirectoryRecursively($currentPath, $oldName, $newName);
            }
        }
    }
}

$directory = './titi'; // Replace with the actual starting directory path
$oldName = 'mat'; // The directory name to search for
$newName = 'tex'; // The new directory name

renameDirectoryRecursively($directory, $oldName, $newName);

?>
