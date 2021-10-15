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

$sql = "SELECT PhoneNumber FROM User WHERE PhoneNumber = '" . $phonenumber . "'";

$result = mysqli_query($db, $sql);
$count = mysqli_num_rows($result);

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
	echo json_encode("Error");
} else {
	//$insert_dep = "INSERT INTO User(NameSurname,PhoneNumber,Username,Password,Email,DeviceId)VALUES('" . $name . "','" . $phonenumber . "',
	//	'" . $username . "','" . $password . "','" . $email . "','" . $updateid . "')";
	$insert = "INSERT INTO User(NameSurname,PhoneNumber,Username,Password,Email)VALUES('" . $name . "','" . $phonenumber . "',
		'" . $username . "','" . $password . "','" . $email . "')";
	$query = mysqli_query($db, $insert);
	if ($query) {
		echo json_encode(" Success ");
	}
}
