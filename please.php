<?php

include("Functions551.inc");
$db = connectDB();


makeProf($db);
populateProf($db,"OfficeHoursDatabase.csv");
//makeHours($db);


function makeProf($db){
// delete old table if present
// make new table
$string1 = "CREATE TABLE Prof";
$string2 = "(";
$string3 = "ProfPre    VARCHAR(5), ";
$string4 = "ProfF    VARCHAR(20), ";
$string5 = "ProfL    VARCHAR(30), ";
$string6 = "Department    VARCHAR(30), ";
$string7 = "Office VARCHAR(10), ";
$string8 = "ProfNetId    VARCHAR(8) NOT NULL ";

$string99 = ");";

$query = $string1.$string2.$string3.$string4.$string5.$string6.$string7.$string8.$string99;
$result = mysqli_query($db, $query) or die('Query failed: ' .mysqli_error($db));
echo "Table Prof created . . . <br>";
echo "Would have run query: ".$query."<br>";

}

function makeHours($db){
// delete old table if present
// make new table
$string1 = "CREATE TABLE Hours";
$string2 = "(";
$string3 = "MonHrs    VARCHAR(10), ";
$string4 = "TueHrs    VARCHAR(10), ";
$string5 = "WedHrs    VARCHAR(10), ";
$string6 = "ThursHrs   VARCHAR(10), ";
$string7 = "FriHrs    VARCHAR(10) ";
$string99 = ");";

$query = $string1.$string2.$string3.$string4.$string5.$string6.$string7.$string99;
$result = mysqli_query($db, $query) or die('Query failed: ' .mysqli_error($db));
echo "Table Hours created . . . <br>";
echo "Would have run query: ".$query."<br>";
}

function parseLine($sBuffer){
// fieldLength is 11

	$myBuffer = $sBuffer;
        	$iCount = 0;
	$strLength = strlen($myBuffer);

	if($strLength==0)
 	    return;

//echo "Buffer is ".$sBuffer."<br>";

	for($i=0;$i<10;$i++){
	   $nextComma = strpos($myBuffer,',');
	   if($nextComma==0)
		$aTokens[$iCount]=NULL;
	   else
		$aTokens[$iCount]=substr($myBuffer,0,$nextComma);
	   $myBuffer=substr($myBuffer,$nextComma+1);
	   $iCount++;
	}
	$aTokens[$iCount]=substr($myBuffer,0);

	return $aTokens;
}

function populateProf($db,$filename){

	$inFile = fopen($filename, "r");
	if($inFile){
	    $buffer = fgets($inFile, 4096);
echo "Fields: <br>";
echo "#".$buffer."#<br><br>";
echo "Data:<br>";
	    while (!feof($inFile)) {
	      $buffer = fgets($inFile, 4096);
	      $buffer = rtrim($buffer);
	      if($buffer=="")
		continue;
echo "#".$buffer."#<br>";
	      $fields = parseLine($buffer);
	      echo $fields[0].'#'.$fields[1].'#'.$fields[2].'#'.$fields[3].'#'.$fields[4].'#'.$fields[5].'#<br>';
//insert record in table

	     $string1 = "INSERT INTO Prof(ProfPre, ProfF, ProfL, Department, Office, ProfNetId) VALUES('";
	     $string2 = $fields[0]."','";
	     $string3 = $fields[1]."','";
	     $string4 = $fields[2]."','";
	     $string5 = $fields[3]."','";
	     $string6 = $fields[4]."','";
	     $string7 = $fields[5]." ' ";
	     $string99 = ");";

	     $query = $string1.$string2.$string3.$string4.$string5.$string6.$string7.$string99;

	     $result = mysqli_query($db, $query) or die('Query failed: ' . mysqli_error());
	     echo "Query would have been ".$query."<br><br>";

            } // end while
        fclose($inFile);
        }// end if

       echo "Action completed on Prof.<br><br>";

}

?>
