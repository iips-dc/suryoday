
<?php
	include '../../includes/login/connect.inc.php';
		
	if(isset($_POST['generate_token'])){				
		$userid = $_POST['userid'];
		$result = mysqli_query($con,"SELECT * FROM user_info where user_id = ".$userid);	
			
		//if userid is valid than add a new entry in visit_details table and generate new token which is sno for this table.
		if(count($result) == 1) {		
			$baithak = mysqli_fetch_array($result);
			//checking all values are mathing or not except occuption ais t is in another table			
			if(($baithak['first_name'] == $_POST['first_name']) && ($baithak['last_name'] == $_POST['last_name']) 
				&& ($baithak['mobile_no'] == $_POST['mobile_number'])){
			#check for occupation
			#insertion in visit_detail table
			//free above result set
			$results->close;			
			mysqli_query($con,"INSERT INTO visit_details(user_id, baithak_id, purpose_id)
			VALUES ('".$userid."', '1', 1)") or die("Error : ".mysqli_error($con));
			echo "visitor added<br/>";

			#fetching new/last added sno and giving it as token to this particular bhkat.
			$result = mysqli_query($con,"SELECT sno FROM visit_details ORDER BY sno DESC LIMIT 1");
			$visitor = $result->fetch_object();
			echo $visitor->sno;
			echo "<script> alert('Generated Token Number is '".$visitor->sno."</script>";
			/*?>
			<script> alert("Generated Token Number is"+ <?php $visit->sno ?> </script>
			<?php*/
			}
			//header("Location: ./index.php");
			//exit;
		else{
			echo $_POST['first_name'].", ".$_POST['last_name'].", ".$_POST['mobile_number']." didn't match iwith database data.<br/>";
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