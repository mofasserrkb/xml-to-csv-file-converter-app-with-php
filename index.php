<?php include 'filesLogic.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>XML TO CSV Converter</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data" >
          <h3>Upload XML File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">upload</button> <br> <br>
          <a href="xml_code.php">Click here for converting xml to csv and Download csv file </a> <br> 
          <span style="color:hotpink;font-weight:bold"> Upload xml file before downloading csv file <span> <br><br>
        <a href="downloads.php"> Click here for downloading xml file </a> <br> <br>
        
        <a href="delete.php"> Clear here for clearing csv junk files  </a> <br>
        <span style="color:hotpink;font-weight:bold"> * Download csv file before clearing csv junk file <span> <br><br>
        <a href="delete1.php"> Clear here for clearing xml junk files  </a> <br>
        <span style="color:hotpink;font-weight:bold"> * Download xml file before clearing xml junk file <span> <br><br>
        </form>
        
        
      </div>
    </div>
  </body>
</html>