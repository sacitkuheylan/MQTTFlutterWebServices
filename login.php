<?php
	$db = mysqli_connect('localhost','root','root','Otkosis_Db');

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM User WHERE Username = '".$username."' AND Password = '".$password."'";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		while($yenisonuc=mysqli_fetch_row($result) ){
			$deviceId = $yenisonuc[6];
		}
		$sql2 = "SELECT * FROM Device Where DeviceId = '".$deviceId."'";
		$result2 = mysqli_query($db,$sql2);
		while($yenisonuc2 = mysqli_fetch_row($result2)) {
			echo $yenisonuc2[1];
		}
	}else{
		echo json_encode("Error");
	}
