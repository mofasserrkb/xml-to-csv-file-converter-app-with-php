<?php
   
  // Specifying directory
  $mydir = 'uploads/';
 
  // Scanning files in a given directory in descending order
  $myfiles = scandir($mydir, 1);
 
  // Displaying the files in the directory
  //print_r($myfiles[0]);
?>