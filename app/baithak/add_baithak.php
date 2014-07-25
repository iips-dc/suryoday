<?php
	include '../../includes/login/connect.inc.php';
	
	echo "Adding new baithak.<br>";
	$date = mysqli_real_escape_string($con, $_POST['baithak_date']);
	$time = mysqli_real_escape_string($con, $_POST['baithak_time']);
	$location = mysqli_real_escape_string($con, $_POST['baithak_location']);
	$state = mysqli_real_escape_string($con, $_POST['baithak_state']);
	$head = mysqli_real_escape_string($con, $_POST['baithak_head']);
	$remark = mysqli_real_escape_string($con, $_POST['baithak_remark']);
	$date = mysqli_real_escape_string($con, $_POST['baithak_date']);
	
	$sql = mysqli_query($con, "INSERT INTO baithak (baithak_date, baithak_time, baithak_location, baithak_state, baithak_head, baithak_remark) VALUES ('$date', '$time', '$location', '$state', '$head', '$remark')");
	
	if (!mysqli_query($con,$sql)) {
  		die('Error: ' . mysqli_error($con));
	}
	echo "1 record added";
	#echo "closed";
	mysqli_close($con);		
	}
?>	