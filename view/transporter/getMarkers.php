<?php
require("../../dbconfig/config.php");


$seller = $_GET['seller'];
$buyer = $_GET['buyer'];

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


// Select all the rows in the markers table
$query = "SELECT * FROM login WHERE username = '".$seller."' OR username = '".$buyer."'";
// $query = "SELECT * FROM login WHERE username = 'Nimal' OR username = 'KamalPerera'";
$result = mysqli_query($con,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  //echo 'id="' . $ind . '" ';
  echo 'name="' . parseToXML($row['firstName']) . '" ';
  echo 'address="' . parseToXML($row['addressCity']) . '" ';
  echo 'lat="' . $row['latitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>