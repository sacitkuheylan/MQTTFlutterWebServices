<?php
$db = mysqli_connect('localhost', 'root', 'root', 'Otkosis_Db');
if (!$db) {
	echo "Database connection failed";
}

$name = $_POST['NameSurname'];
$phonenumber = $_POST['PhoneNumber'];
$username = $_POST['Username'];
$password = $_POST['Password'];
$email = $_POST['Email'];

$sql = "SELECT * FROM User WHERE PhoneNumber = '" . $phonenumber . "'";
$sql1 = "SELECT * FROM User WHERE Username = '" . $username . "'";
$sql2 = "SELECT * FROM User WHERE Email = '" . $email . "'";

$result = mysqli_query($db, $sql);
$count = mysqli_num_rows($result);

$result1 = mysqli_query($db, $sql1);
$count1 = mysqli_num_rows($result1);

$result2 = mysqli_query($db, $sql2);
$count2 = mysqli_num_rows($result2);

/*
$sql2 = "SELECT DeviceId FROM Device WHERE DeviceIMEI = '" . $imei . "'";
$sql2run = mysqli_query($db, $sql2);
$sql2count = mysqli_num_rows($sql2run);

if ($sql2count == 1) {
	while ($yenisonuc = mysqli_fetch_row($sql2run)) {
		echo $yenisonuc[0];
		$updateid = $yenisonuc[0];
	}
} else {
	echo "Device Not Found";
}
*/

if ($count == 1) {
	echo json_encode("PhoneNumRegistered");
} 
else if ($count1 == 1) {
	echo json_encode("UsernameRegistered");
} 
else if ($count2 == 1) {
	echo json_encode("EmailRegistered");
} 
else {
	//$insert_dep = "INSERT INTO User(NameSurname,PhoneNumber,Username,Password,Email,DeviceId)VALUES('" . $name . "','" . $phonenumber . "',
	//	'" . $username . "','" . $password . "','" . $email . "','" . $updateid . "')";
	$insert = "INSERT INTO User(NameSurname,PhoneNumber,Username,Password,Email)VALUES('" . $name . "','" . $phonenumber . "',
		'" . $username . "','" . $password . "','" . $email . "')";
	$query = mysqli_query($db, $insert);
	if ($query) {
		echo json_encode("Success");
	}
}
