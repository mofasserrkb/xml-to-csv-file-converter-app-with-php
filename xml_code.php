<?php
 include 'filesLogic.php';
 include 'test.php';
// Open xml file that is present in
// your folder
$xmldata = 'uploads/'.$myfiles[0];
// echo var_dump($xmldata) . "<br>";
// exit("stop");
// Check if your file mentioned above
// is exists or not
if (file_exists($xmldata)) {
	
	// If file exists then load your xml
	// data using simplexml_load_file
	// function
	$xml_data = simplexml_load_file($xmldata);
	
	// Open xml file using fopen in write
	// mode and download the data as
	// result.csv
    $name=$myfiles[0].md5(date('Y-m-d H:i:s:u')).'.csv';
	//$i = fopen('csv/'.md5(date('Y-m-d H:i:s:u')).$myfiles[0].'.csv', 'w');
	$i = fopen('csv/'.$name, 'w');
	// Function call
	Csv($xml_data, $i);
	
	// Closing file
	fclose($i);
    //uploading file in database
     // Specifying directory
 // $mydir1 = 'csv/'.$name;
 $mydir1 = 'csv/'.$name;
 $mydir11='csv/';
  // Scanning files in a given directory in descending order
    $myfiles1 = scandir($mydir11, 1);
//   echo var_dump($myfiles1) . "<br>";
//  exit("stop");
 
  // Displaying the files in the directory
  //print_r($myfiles[0]);
//   $size=0;
  $k=count($myfiles1);
   for ($j=0;$j<$k;$j++)
   {
    if($myfiles1[$j]==$name)
  {   
//     $mydir2='csv/'.$myfiles1[$j]; 
//   $sql1 = "INSERT INTO files (name, size, downloads) VALUES ('  $mydir2', $size, 0)";
//   $result=mysqli_query($conn, $sql1);
 $namefile='csv/'.$myfiles1[$j];
if (file_exists($namefile)) {
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename=' . basename($namefile));
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize('csv/'.$myfiles1[$j]));
	readfile('csv/'.$myfiles1[$j]);
}
   }
   }
//downloading csv file


}
else {
	echo "No file found, insert xml file";
}
// Function to create csv file
function Csv($xml_data, $i) {

	// Count data for data present in
	// xml using children function
	foreach ($xml_data->children() as $data) {
		$hasChild = (count($data->children())
						> 0) ? true : false;

		// Data is present, then store into
		// csv by using fputcsv function
		if( ! $hasChild) {
			
			//$arr = array($data->getName(),$data);
			$arr = array(
				['',$xml_data->getName(),$data->getName(),$xml_data->attributes(),'',$data],
				
			);
			  
			//$arr = array('TAG Name-Field Name-Attribute Vaule- Data','',$xml_data->getName(),$data->getName(),$xml_data->attributes(),'',$data);
						
		//	fputcsv($i, $arr ,',','"');
			// Loop through file pointer and a line
   foreach ($arr as $fields) {
    fputcsv($i, $fields,',','"');
    }
		}
		else {
		
			// Call function
			Csv($data, $i);
		}
	}
}


?>