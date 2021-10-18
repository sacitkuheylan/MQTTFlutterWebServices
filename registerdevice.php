<?php
$db = mysqli_connect('localhost', 'root', 'root', 'Otkosis_Db');
if (!$db) {
	echo "Database connection failed";
}

$imei = $_POST['DeviceIMEI'];
$userid = $_POST['UserId'];
$name = $_POST['DeviceName'];
$location = $_POST['DeviceLocation'];

$sql = "SELECT * FROM Device WHERE DeviceIMEI = '" .$imei. "'";

$result = mysqli_query($db, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
	echo json_encode("Bu IMEI Kayıtlı");
} 
else {
	$insert = "INSERT INTO Device(DeviceIMEI,UserId,DeviceName,DeviceLocation)VALUES('" . $imei . "','" . $userid . "',
		'" . $name . "','" . $location . "')";
	$query = mysqli_query($db, $insert);
	if ($query) {
		echo json_encode($userid);
	}
}
