<!-- Including files for DB connection and Session Control -->
<?php
	
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';

    //if (isset($_POST['submit'])) {
    	# code...
    	$tokenid = $_POST['tokenid'];
	    $baithakid = $_POST['baithakid'];
	    $problem = $_POST['problem'];
	    $status = $_POST['status'];
	    $solution = $_POST['solution'];
	    $assignedTo = $_POST['assignedTo'];
	    $remark = $_POST['remark'];

	    //$selectQuery = "SELECT `baithak_id` FROM `baithak` WHERE `baithak_id` = '$baithakid'";
	    $selectQuery = "SELECT * FROM `visit_details` WHERE `token_id` = '$tokenid' and `baithak_id`= '$baithakid'";

	    $checkValidTokenId = mysqli_query($con, $selectQuery);
	    $visitorExists = mysqli_num_rows($checkValidTokenId);
	    
	    echo $visitorExists;
	    if ($visitorExists == 1) {
	    	# code...
	    	$insertQuery = "INSERT INTO `upaay` (`upaay_id`, `baithak_id`, `token_id`, `samasya`, `upaay`, `status`, `assigned_to`, `remark`) VALUES ('', '$baithakid', '$tokenid', '$problem', '$solution', '$status', '$assigned_to', '$remark')";  //requirement to change column of reason/upaay, v_id/token_id
	    	$insertQueryRun = mysqli_query($con, $insertQuery);
	    }
	    else {
	    	echo "Invalid Token Id or Baithak Id";
	    }
    //}
?>