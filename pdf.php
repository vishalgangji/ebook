<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_REQUEST['name'];
    $url = $_REQUEST['url'];
 
  }
// Store the file name into variable
$file = $url;
$filename = $name;
// echo $file;
// echo $filename;

// Header content type
header('Content-type: application/pdf');

header('Content-Disposition: inline; filename="' . $filename . '"');

header('Content-Transfer-Encoding: binary');

header('Accept-Ranges: bytes');

// Read the file
@readfile($file);
echo"hi";

?>
