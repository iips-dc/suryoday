<!-- Including files for DB connection and Session Control -->

<?php
	
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Suryoday | Baithak</title>
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
        	<div dojoType="dijit.layout.ContentPane" id="content" region="center" splitter="true" style="text-align:center"> 
			    <?php

			    	#collection data retrieved through form
			    	$tokenid = $_POST['tokenid'];
				    $baithakid = $_POST['baithakid'];
				    $problem = $_POST['problem'];
				    $status = $_POST['status'];
				    $solution = $_POST['solution'];
				    $assignedTo = $_POST['assignedTo'];
				    $remark = $_POST['remark'];

				    #Authenticating token and baithak_id from visit_details table
				    $selectQuery = "SELECT * FROM `visit_details` WHERE `token` = '$tokenid' and `baithak_id`= '$baithakid'";

				    $checkValidTokenId = mysqli_query($con, $selectQuery);	
				    $visitorExists = mysqli_num_rows($checkValidTokenId);
				
				    if ($visitorExists == 1) {
				    	# code...
				    	$insertQuery = "INSERT INTO `upaay` (`upaay_id`, `baithak_id`, `token`, `samasya`, `upaay`, `status`, `assigned_to`, `remark`) VALUES ('', '$baithakid', '$tokenid', '$problem', '$solution', '$status', '$assigned_to', '$remark')";  //requirement to change column of reason/upaay, v_id/token
				    	$insertQueryRun = mysqli_query($con, $insertQuery);

				    	$upaayDataQuery = "SELECT * FROM `upaay` WHERE `token` = '$tokenid'";
				    	$upaayData = mysqli_query($con, $upaayDataQuery);
				    	$row = mysqli_fetch_array($upaayData);
				?>
				<table border="3px" cellpadding="20px" align="center">
					<tr><td><h3>  Token Id    </h3></td>  <td><h3>  <?php echo $row['token'];?>  </h3></td></tr>
					<tr><td><h3>  Baithak Id  </h3></td>  <td><h3>  <?php echo $row['baithak_id'];?>  </h3></td></tr>
					<tr><td><h3>  Samasya     </h3></td>  <td><h3>  <?php echo $row['samasya'];?>  </h3></td></tr>
					<tr><td><h3>  Status      </h3></td>  <td><h3>  <?php echo $row['Status'];?>  </h3></td></tr>
					<tr><td><h3>  Upaay       </h3></td>  <td><h3>  <?php echo $row['upaay'];?>  </h3></td></tr>
					<tr><td><h3>  Assigned To </h3></td>  <td><h3>  <?php echo $row['assigned_to'];?>  </h3></td></tr>
					<tr><td><h3>  Remark      </h3></td>  <td><h3>  <?php echo $row['remark'];?>  </h3></td></tr>
				</table>
					
					<form action="index#upay.php" method="post">
                        <input type="submit" value="upayRedirect" label="Next Entry" id="upayRedirect" data-dojo-type="dijit/form/Button" />
                    </form>
				<?php
				    }
				    else {
				    	echo "<h3 text-align='center'>Invalid Token Id or Baithak Id</h3>";
				    	echo "<form action='index.php#upay' method='post'>
                        		<input type='submit' value='upayRedirect' label='Retry' id='upayRedirect' data-dojo-type='dijit/form/Button' />
                    		</form>";
				    }
				    #echo "<script>
					#		document.getElementById("tokenGeneration").selected = "false";
					#		document.getElementById("upay").src = "true";
					#	</script>";
				?>
			</div>
			<!-- end of Central Region of Layout Container --> 

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
    "dijit/DropDownMenu", "dijit/MenuItem", "dijit/layout/TabContainer", "dijit/form/RadioButton", 
    "dojo/domReady!", "dijit/form/SimpleTextarea", "dijit/form/DateTextBox" ]);
    </script>
    <?php
        } #End of LoggedIn function
        else{
            include '../../includes/login/login_form.inc.php' ;
        }
    ?>

</body>
</html>