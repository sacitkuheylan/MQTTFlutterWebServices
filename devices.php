<?php
 
// Importing DatabaseConfig.php file.
$con = mysqli_connect('localhost','root','root','Otkosis_Db');
 
 // Getting the received ID in JSON Format into $json variable.
 $json = file_get_contents('php://input');
 
 // Decoding the received JSON.
 $obj = json_decode($json,true);
 $userid = $_POST['UserId'];
 
 // Populate ID from JSON $obj array and store into $ID variable.
 //Fetching the selected record as per ID.
 $CheckSQL = "SELECT DeviceId, DeviceIMEI, DeviceName, DeviceLocation FROM Device WHERE UserId = '".$userid."'";
 //$CheckSQL = "SELECT DeviceId, DeviceIMEI, DeviceName, DeviceLocation FROM Device";
 
 $result = $con->query($CheckSQL);
 
if ($result->num_rows >0) {
 
 while($row[] = $result->fetch_assoc()) {
 
 $Item = $row;
 
 $json = json_encode($Item, JSON_NUMERIC_CHECK);
 
 }
 
}else {
	
 echo "No Results Found.";
 
}
 
echo $json;
 
$con->close();
?>