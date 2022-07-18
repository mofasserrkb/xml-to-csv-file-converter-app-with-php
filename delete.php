<?php

  // Specifying directory
  $mydir = 'csv/';
 
  // Scanning files in a given directory in descending order
  $myfiles = scandir($mydir, 1);
 
  // Displaying the files in the directory
  //print_r($myfiles[0]);
  $k=count($myfiles);
  for($i=0;$i<$k;$i++)
  {
        $data="$myfiles[$i]";    
        $dir = "csv";    
        $dirHandle = opendir($dir);    
        while ($file = readdir($dirHandle)) {    
            if($file==$data) {
                unlink($dir."/".$file);//give correct path,
                // header("Location:index.php");
            }
        }    
        closedir($dirHandle);
        header("Location:index.php");
 }
?>