<!-- Including files for DB connection and Session Control -->
<?php
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday | Donation</title>
    
    <!-- Configuration for the absoulte path -->
     <?php include "../../config_global.php";   ?>
    <!-- Core Css -->
    <?php include "../../includes/cssLinks.inc.php";   ?>

</head>
<body class="claro">
 
<?php 
    if(loggedIn()){ #This function is in /includes/login/core.inc.pho for verfying user session
?>

        <!-- Start of page's Border Layout  -->
        <div dojoType="dijit.layout.BorderContainer" style="width: 100%;height: 100%;"> 
            <div dojoType="dijit.layout.ContentPane" region="top" splitter="true"> 
               <?php include('../../includes/header.inc.php'); ?>
                <?php include('../../includes/menu_bar.inc.php'); ?>
            </div> 

            

            <!-- Center Region of layout -->
             <div dojoType="dijit.layout.ContentPane" id="content" region="center" splitter="true"> 

                <!-- Vertical Left tabs begin -->             
                <div data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region:'center', tabStrip:true" tabPosition="left-h">
<?php

$username = $_SESSION['username'];//session id
/* We have to take token_id .due to absence of token genration we will insert */
if(isset($_POST['projectDonationSubmit'])){//When submit button is clicked
	if(!empty($_POST['userid'])){
		$user_id = mysqli_real_escape_string($con,htmlentities($_POST['userid']));
		$query = "SELECT * FROM `user_info` WHERE `user_id` = '$user_id'";
		$query_run = mysqli_query($con , $query);
		if(mysqli_num_rows($query_run) == 0){
			echo 'Userid doesnt exists';
		}
			else{
	//checks if imp fields are not empty
	if(!empty($_POST['donationType'])&&!empty($_POST['receivedBy'])&&!empty($_POST['projectName'])){
			
		$project = mysqli_real_escape_string($con,htmlentities($_POST['projectName']));
		$received_by = mysqli_real_escape_string($con,htmlentities($_POST['receivedBy']));
		$donationType =mysqli_real_escape_string($con,htmlentities( $_POST['donationType']));
		$remarks = mysqli_real_escape_string($con,htmlentities($_POST['remark']));
		$usage_details = mysqli_real_escape_string($con,htmlentities($_POST['useDetails']));
		$details = mysqli_real_escape_string($con,htmlentities($_POST['details']));
		$pan = mysqli_real_escape_string($con,htmlentities($_POST['panNumber']));
		$mode = mysqli_real_escape_string($con,htmlentities($_POST['cashType']));
		$date = date("Y-m-d");
			if(($received_by == -1) || ($project == -1)){//if $recieved by and $project are not equal to -1
				echo "Please select valid entries from recieved by or project name";
				echo '<br><a href="index.php">Back to donations</a>';
			}
			else{
			//checks if donation is cash or kind
				if($donationType == 'Kind'){//donation type is kind
					if(!empty($_POST['kindvalue'])&&!empty($_POST['kindquantity'])){//if quantity and value both are filled
						$value =  mysqli_real_escape_string($con,htmlentities($_POST['kindvalue']));
						$quantity =  mysqli_real_escape_string($con,htmlentities($_POST['kindquantity']));
						$query = "INSERT INTO `donation`(`user_id`, `donation_type`, `donation_for_project`, `received_by`, `entry_by`, `receipt_no`, `usage_details`, `remark`, `donation_details`, `donation_date`)
					 	VALUES ('$user_id','$donationType','$project','$received_by','$username','','$usage_details','$remarks','$details','$date')";
							if($query_run = mysqli_query($con,$query)){//insertion in donation table now we have to insert in donation_kind_details
								$res = mysqli_query($con,"SELECT MAX(donation_id) FROM donation");
								$row1 = mysqli_fetch_row($res);
								$max_donation_id = $row1[0];
								$query = "INSERT INTO `donation_kind_detail`(`donation_id`, `kind_value`, `quantity`) VALUES ('$max_donation_id','$value','$quantity')";
								if($query_run = mysqli_query($con,$query)){
									echo "Successful";
									echo '<br><a href="index.php">Back to donations</a>';
								}
								else{
									echo "Error in filling kind details";
									echo '<br><a href="index.php">Back to donations</a>';						
								}
							}
							else{
								echo "Error in query.";
								echo '<br><a href="index.php">Back to donations</a>';
								}
							}
						else{//either of them is not filled
							echo "Please enter both value and quantity.";
							echo '<br><a href="index.php">Back to donations</a>';
							}
						}
				else{
					if(($mode == 'Cheque') ||($mode == 'DD') ){
						//if mode is cheque or DD
						if(!empty($_POST['ddChequeNumber'])&&!empty($_POST['amount'])){//checks if amount and mode no is filled
							$mode_no = $_POST['ddChequeNumber'];
							$amount = $_POST['amount'];
							$query = "INSERT INTO `donation`(`user_id`, `donation_type`, `donation_for_project`, `received_by`, `entry_by`, `receipt_no`, `usage_details`, `remark`, `donation_details`, `donation_date`)
					 				VALUES ('$user_id','$donationType','$project','$received_by','$username','','$usage_details','$remarks','$details','$date')";
							if($query_run = mysqli_query($con,$query)){//insertion in donation table now we have to insert in donation_kind_details
									$res = mysqli_query($con,"SELECT MAX(donation_id) FROM donation");
									$row1 = mysqli_fetch_row($res);
									$max_donation_id = $row1[0];
									$query = "INSERT INTO `donation_cash_detail`(`donation_id`, `mode_type`, `mode_no`, `amount`) VALUES ('$max_donation_id','$mode','$mode_no','$amount')";
									if($query_run = mysqli_query($con,$query)){
										echo "Successful";
										echo '<br><a href="index.php">Back to donations</a>';
										}
									else{
										echo "Error in filling cash detaiils.";
										echo '<br><a href="index.php">Back to donations</a>';
										}
									}
								else{
									echo "Error in query. Unable to add details in donation table.";
									echo '<br><a href="index.php">Back to donations</a>';
									}
							}
						else{
							//if amonut and mode no is not filled
							echo 'Please Enter both amount and DD/cheque no';
							echo '<br><a href="index.php">Back to donations</a>';
						}
						}
						else{
						//if mode is cash
						if(!empty($_POST['amount'])){//checks if amount and mode no is filled
							$amount = $_POST['amount'];
							$query = "INSERT INTO `donation`(`user_id`, `donation_type`, `donation_for_project`, `received_by`, `entry_by`, `receipt_no`, `usage_details`, `remark`, `donation_details`, `donation_date`)
					 				VALUES ('$user_id','$donationType','$project','$received_by','$username','','$usage_details','$remarks','$details','$date')";
							if($query_run = mysqli_query($con,$query)){//insertion in donation table now we have to insert in donation_kind_details
									$res = mysqli_query($con,"SELECT MAX(donation_id) FROM donation");
									$row1 = mysqli_fetch_row($res);
									$max_donation_id = $row1[0];
									$query = "INSERT INTO `donation_cash_detail`(`donation_id`, `mode_type`, `mode_no`, `amount`) VALUES ('$max_donation_id','$mode','','$amount')";
									if($query_run = mysqli_query($con,$query)){
										echo "Successful";
										echo '<br><a href="index.php">Back to donations</a>';
										}
									else{
										echo "Error in filling cash detaiils.";
										echo '<br><a href="index.php">Back to donations</a>';
										}
									}
								else{
									echo "Error in query.";
									echo '<br><a href="index.php">Back to donations</a>';
									}
							}
						else{
							//if amonut and mode no is not filled
							echo 'Please Enter amount';
							echo '<br><a href="index.php">Back to donations</a>';
						}
						}
					
					}
					
				}
				
			
		}
}
}
}
mysqli_close($con);
?>

</div> 
</div>       
            <!-- Bottom Region of Layout -->
            <div dojoType="dijit.layout.ContentPane" region="bottom" splitter="true"> 
                &copy; Suryoday Trust . <span style="float:right">Powered By <a  href="#">Developement Center</a> <span>
            </div>
        </div>
            <!-- end of Border Layout Container -->   


    <?php include("../../includes/jsLinks.inc.php"); ?> 
    <?php include("../../includes/dojo_widgets.inc.php"); ?>

    <!-- Script for dynamic loading of pages in center region -->
    <script>
        require(["dojo/parser", "dijit/MenuBar", "dijit/MenuBarItem", "dijit/PopupMenuBarItem",
    "dijit/DropDownMenu", "dijit/MenuItem", "dijit/layout/TabContainer", "dijit/form/RadioButton", "dojo/domReady!", "dijit/form/Textarea" ]);       
    </script>
    <?php
        } #End of LoggedIn function
        else{
            include '../../includes/login/login_form.inc.php' ;
        }
    ?>


</body>
</html>