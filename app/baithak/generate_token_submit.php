<h1> generate_token_submit </h1>

<?php
	include '../../includes/login/connect.inc.php';
	
	#echo $_POST['userid'].'<br/>';
	if(isset($_POST['generate_token'])){
		echo "Only token should be generat.<br>";
		/*header("Location: ./token_generation.php");
		exit;*/
	$userid = $_POST['userid'];
	$result = mysqli_query($con,"SELECT * FROM user_info where user_id = ".$userid);	
	/*while($row = mysqli_fetch_array($result)) {
  		echo $row['first_name'] . " " . $row['last_name'];
  		echo "<br>";
	}*/	
	//if userid is valid than add a new entry in visit_details table and generate new token which is sno for this table.
	if(count($result) == 1) {		
		$baithak = mysqli_fetch_array($result);
		echo "baithak";
		echo $baithak['mobile_no'];
		echo $_POST['mobile_number'];
		//checking all values are mathing or not except occuption ais t is in another table
		if(($baithak['first_name'] == $_POST['first_name']) && ($baithak['last_name'] == $_POST['last_name']) 
			&& ($baithak['mobile_no'] == $_POST['mobile_number'])){
			echo "names are connect";
		#check for occupation
		#insertion in visit_detail table
		#$results->free();
		echo "freed";
		mysqli_query($con,"INSERT INTO visit_details(user_id, baithak_id, purpose_id)
		VALUES ('".$userid."', '1', 1)") or die("Error : ".mysqli_error($con));
		echo "visitor added";
		#$result->close;
		#fetching new/last added sno and giving it as token to this particular bhakt.
		$result = mysqli_query($con,"SELECT sno FROM visit_details where user_id = ".$userid);
		echo "result";
		}
		else{
			echo "dfffd";
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