<?php
/*  Including files for DB connection and Session Control*/
include 'includes/login/core.inc.php';
include 'includes/login/connect.inc.php';

$username = $_SESSION['username'];//session id
/* We have to take token_id .due to absence of token genration we will insert */
if(isset($_POST['projectDonationSubmit'])){//When submit button is clicked
	//checks if imp fields are not empty
	if(!empty($_POST['userid'])&&!empty($_POST['projectName'])&&!empty($_POST['donationType'])&&!empty($_POST['receivedBy'])){
		$user_id = mysqli_real_escape_string($con,htmlentities($_POST['userid']));	
		$project = mysqli_real_escape_string($con,htmlentities($_POST['projectName']));
		$received_by = mysqli_real_escape_string($con,htmlentities($_POST['receivedBy']));
		$donationType =mysqli_real_escape_string($con,htmlentities( $_POST['donationType']));
		$remarks = mysqli_real_escape_string($con,htmlentities($_POST['remark']));
		$usage_details = mysqli_real_escape_string($con,htmlentities($_POST['useDetails']));
		$details = mysqli_real_escape_string($con,htmlentities($_POST['details']));
		$pan = mysqli_real_escape_string($con,htmlentities($_POST['panNumber']));
		if(($received_by == -1) || ($project == -1)){
			echo "Please select valid entries from recieved by or project name";
			echo '<br><a href="index.php">Back to donations</a>';
			}
		else{
		//checks if donation is cash or kind
		if($donationType == 'Kind'){
			if(!empty($_POST['kindvalue'])&&!empty($_POST['kindquantity'])){
				$value = mysqli_real_escape_string($con,htmlentities($_POST['kindvalue']));
				$quantity = mysqli_real_escape_string($con,htmlentities($_POST['kindquantity']));
				$amount = $value.'+'.$quantity;
				$query = "INSERT INTO
				 `suryoday_db`.`donation` ( `user_id`, `donation_type`, `donation_mode`, `donation_for_project`, `amount`, `received_by`, `entry_by`, `receipt_no`, `usage_details`, `remark`, `donation_details`,`pan_no`)
				  VALUES ('$user_id', '$donationType', '', '$project', '$amount', '$received_by', '$username', '', '$usage_details', '$remarks', '$details','$pan')";
				if($query_run = mysqli_query($con,$query)){
					echo "Successful";
					echo '<br><a href="index.php">Back to donations</a>';
					}
				else{
					echo 'Error in query.';
					echo '<br><a href="index.php">Back to donations</a>';
					}
				}
			else{
				echo "Please enter value and quantity both.";
				echo '<br><a href="index.php">Back to donations</a>';
				}
			}
		else{//When donation is of cash type
			if(!empty($_POST['cashType'])&&!empty($_POST['amount'])){
				$cashType = mysqli_real_escape_string($con,htmlentities($_POST['cashType']));
				$amount = mysqli_real_escape_string($con,htmlentities($_POST['amount']));
				if($cashType != 'Money'){//if cheque or DD is given it  should check DD/cheque no is given or not
					if(!empty($_POST['ddChequeNumber'])){//dd / cheque no is mentioned or not
						$ddChequeNumber = mysqli_real_escape_string($con,htmlentities($_POST['ddChequeNumber']));
					}else{
						echo 'Please enter DD or Cheque no.';
						echo '<br><a href="index.php">Back to donations</a>';
						}
					}
				if($amount >= 10000){//checks if amount is greater than 10000 PAN no is mentioned or not
					if(!empty($_POST['panNumber'])){
						$query = "INSERT INTO `suryoday_db`.`donation` (`donation_id`, `user_id`, `donation_type`, `donation_mode`, `donation_for_project`, `amount`, `received_by`, `entry_by`, `receipt_no`, `usage_details`, `remark`, `donation_details`,`pan_no`) VALUES (NULL, '$user_id', '$donationType', '$cashType', '$project', '$amount', '$received_by', '$username', '', '$usage_details', '$remarks', '$details','$pan')";
						if($query_run = mysqli_query($con,$query)){
					echo "Successful";
					echo '<br><a href="index.php">Back to donations</a>';
					}
				else{
					echo 'Error in query.';
					echo '<br><a href="index.php">Back to donations</a>';
					}
				}
					else{
						echo 'Please Enter PAN No as transection is more than of 10000.';
						echo '<br><a href="index.php">Back to donations</a>';
						}
					}
				else {
					$query = "INSERT INTO `suryoday_db`.`donation` (`donation_id`, `user_id`, `donation_type`, `donation_mode`, `donation_for_project`, `amount`, `received_by`, `entry_by`, `receipt_no`, `usage_details`, `remark`, `donation_details`,`pan_no`) VALUES (NULL, '$user_id', '$donationType', '$cashType', '$project', '$amount', '$received_by', '$username', '', '$usage_details', '$remarks', '$details','$pan')";
						if($query_run = mysqli_query($con,$query)){
					echo "Successful";
					echo '<br><a href="index.php">Back to donations</a>';
					}
				else{
					echo 'Error in query.';
					echo '<br><a href="index.php">Back to donations</a>';
					}
					}
				}
				else{
				echo 'Please enter Amount.' ;
				echo '<br><a href="index.php">Back to donations</a>';
				}
			}
			
		}
	}
}
mysqli_close($con);
?>