<h1> generate_token_submit </h1>

<?php
	include '../../includes/login/connect.inc.php';
	
	#echo $_POST['userid'].'<br/>';
	if(isset($_POST['generate_token'])){
		echo "Only token should be generat.<br>";
		/*header("Location: ./token_generation.php");
		exit;*/
	$result = mysqli_query($con,"SELECT * FROM user_info where user_id = ".$_POST['userid']);
	
	/*while($row = mysqli_fetch_array($result)) {
  		echo $row['first_name'] . " " . $row['last_name'];
  		echo "<br>";
	}*/	
	//if userid is valid than add a new entry in visit_details table and generate new token which is sno for this table.
	if(count($result) == 1) {
		$bhakth = mysqli_fetch_array($result);
		//checking all values are mathing or not except occuption as it is in another table
		if(($bhakth['first_name'] == $_POST['first_name']) && ($bhakth['last_name'] == $_POST['last_name']) 
			&& ($bhakth['mobile_number'] == $_POST['mobile_number'])){
		#check for occupation
		#insertion in visit_detail table
		#fetching new/last added sno and giving it as token to this particular bhakt.
		}
	}
	else{
		echo "data is not one row";
	}
	$result->close;
	#echo "closed";
	mysqli_close($con);		
	}
	elseif (isset($_POST['register'])) {
		echo "code to redirect it to regtister page";		
?>
        <!--<script type="text/javascript">location.href = 'register.php';</script> -->
<?php
	}
	elseif (isset($_POST['update_information'])) {
		echo "code to redirect it to update information page";		
	}
	
?>