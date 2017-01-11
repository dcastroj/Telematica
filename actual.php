<?php
require("dbinfo.php");

$LatitudGPSS;
$LongitudGPSS;

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$connection=mysql_connect ($servername, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($dbname, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM rastreo ORDER BY id DESC LIMIT 1";
$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
    $LatitudGPSS=$row['lat'];
    $LongitudGPSS=$row['lng'];
}

//header("Content-type: text/xml");
//
//// Start XML file, echo parent node
//echo '<markers>';
//
//// Iterate through the rows, printing XML nodes for each
//while ($row = @mysql_fetch_assoc($result)){
//  // ADD TO XML DOCUMENT NODE
//  echo '<marker ';
//  echo 'lat="' . $row['latitud'] . '" ';
//  echo 'lng="' . $row['longitud'] . '" ';
//  echo '/>';
//}
//
//// End XML file
//echo '</markers>';

?>

<script type="text/javascript">
    
    var LatitudGPSS=<?php echo json_encode($LatitudGPSS);?>;
    var LongitudGPSS=<?php echo json_encode($LongitudGPSS);?>;

</script>
        
        
