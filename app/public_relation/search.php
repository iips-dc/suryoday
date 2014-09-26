<!-- Including files for DB connection and Session Control -->
<?php
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<?php
	function find_userid_array($where){
		$query = "SELECT user_id FROM user_info WHERE $where";
			$user_arr = array();
			$query_run = mysqli_query($GLOBALS['con'], $query);
			if(mysqli_num_rows($query_run)>0){
				while($row = mysqli_fetch_array($query_run)){
					array_push( $user_arr,$row['user_id']);						
				}
			}
			else{
				array_push( $user_arr,"No results Found");
			}
		return $user_arr;
		}
	
	#defining function for search.
				function convert_to_table($user_id){#This function will take query as parameter and echo a table by executing that query
					//it is required as $con is not a global variable 
					$query = "SELECT * FROM user_info WHERE user_id = '$user_id'";
					$query_run = mysqli_query($GLOBALS['con'], $query);
					if(mysqli_num_rows($query_run)>0){
					?>

<table>
  <tr>
    <th style="width:30px">S.no.</th>
    <th style="width:80px">User_id</th>
    <th style="width:100px">Name</th>
    <th>Date of Birth</th>
    <th style="width:130px">Address</th>
    <th>City</th>
    <th>State</th>
    <th>Pincode</th>
    <th>Mobile No.</th>
    <th >Landline No.</th>
    <th style="width:150px">Email id</th>
  </tr>
  <?php
							$i=0;
   							while($row = mysqli_fetch_array($query_run)){
									$i =$i + 1;
						?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $row['user_id']; ?></td>
    <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
    <td><?php echo $row['dob']; ?></td>
    <td><?php echo $row['start_address']." ".$row['area_locality_tehsil_taluka']; ?></td>
    <td><?php echo $row['district_city']; ?></td>
    <td><?php echo $row['country_state']; ?></td>
    <td><?php echo $row['pincode']; ?></td>
    <td><?php echo $row['landline_no']; ?></td>
    <td><?php echo $row['mobile_no']; ?></td>
    <td><?php echo $row['email']; ?></td>
  </tr>
  <?php
								}
							}
					else{
						echo "No results Found.<br>";
					}
						?>
</table>
<?php
					
					}				
	if(isset($_POST['name_submit'])||isset($_POST['location_submit'])){
		//checks if either of go button is clicked
		$name = $_POST['name'];
		$phone_no = $_POST['phone_no'];
		$district_city = $_POST['district_city'];
		$bithak_date = $_POST['bithak_date'];
		$profession = $_POST['profession'];
		$dob = $_POST['dob'];
		$date_of_anniversary = $_POST['date_of_anniversary'];
		$where = "";
		$user_arr = array();
		
		if($dob || $date_of_anniversary || $phone_no || $name || $district_city || !empty($_POST['age']) ){
			//it will check if profession and bithak are set or not
			if($dob || $date_of_anniversary || $phone_no){//it will check if dob or anniversary or phone no is selected
				if($dob){//if dob is selected
				$where .= "`dob` = '$dob'";
				}
				else{
					if($date_of_anniversary){//if doanniversary is selected
					$where .= "`date_of_anniversary` = '$date_of_anniversary'";
					}
					else{
						if($phone_no){//if phone no is selected
						$where .= "`mobile_no` = '$phone_no' OR `landline_no` = '$phone_no' ";
						}
					}
				}
			}
			else{// if name age or location is selected
				if($name){
					$where .= "(`first_name` like '%".$name."%' OR `last_name` like '%".$name."%') ";
				}
				if($district_city){
					if($name){
						$where .= " AND ";
					}
					$where .= "(`district_city` = '".$district_city."')";
				}
				if(!empty($_POST['age'])){//if age is selected
					$selected_age = array(); 
					foreach($_POST['age'] as $value){
						array_push($selected_age,$value);
					}//it will be an array as it is checkbox
					
					if($name || $district_city){
						$where .= " AND ";
					}
						$where1 = $where;
					$all_age_array = array('0-15' => array(),
											'15-30' => array(),
											'30-45' => array(),
											'45-60' => array(),
											'60-75' => array(),
											'75-above' => array());//we will store user id related to a age grp in array
					//for age from 0-15
					$present_date = date("Y-m-d");
					$last_date = date('Y-m-d', strtotime('-15 years'));
					$where = $where1 . " (`dob` < '".$present_date."' AND `dob` > '".$last_date."') ";
					$all_age_array['0-15'] = find_userid_array($where);
					//for age 15-30
					$present_date = $last_date;
					$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
					$where= $where1 . " ( `dob` < '".$present_date."' AND `dob` > '".$last_date."') ";
					$all_age_array['15-30'] = find_userid_array($where);
					//for age 45-30
					$present_date = $last_date;
					$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
					$where = $where1 .  " (`dob` < '".$present_date."' AND `dob` > '".$last_date."') ";
					$all_age_array['30-45'] = find_userid_array($where);
					//for age 60-45
					$present_date = $last_date;
					$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
					$where = $where1 . " (`dob` < '".$present_date."' AND `dob` > '".$last_date."')";
					$all_age_array['45-60'] = find_userid_array($where);
					//for age 60-75
					$present_date = $last_date;
					$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
					$where= $where1 .  " ( `dob` < '".$present_date."' AND `dob` > '".$last_date."')";
					$all_age_array['60-75'] = find_userid_array($where);
					//for age 75 and above
					$present_date = $last_date;
					$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
					$where = $where1 . " ( `dob` < '".$present_date."' AND `dob` > '".$last_date."')";
					$all_age_array['75-above'] = find_userid_array($where);
					
					//finding array of age grps selected
					$N = count($selected_age);
					for($i = 0;$i<$N ; $i++){
						$n =count($all_age_array[$selected_age[$i]]);
						for($j=0;$j<$n;$j++){
							array_push($user_arr ,$all_age_array[$selected_age[$i]][$j]);
						}
					}

				}
			}
			$query = "SELECT user_id FROM user_info WHERE $where";
			$user_array = array();
			$query_run = mysqli_query($con, $query);
			if(mysqli_num_rows($query_run)>0){
				while($row = mysqli_fetch_array($query_run)){
					array_push( $user_arr,$row['user_id']);						
				}
			}
			else{
				array_push( $user_arr,"No results Found");
			}
			
		}
		else{
			if(!empty($_POST['profession']) || !empty( $_POST['bithak_date'])){//if profession or baithak id are selected
				if ($_POST['profession']) {
					# code...
					$query = "SELECT * FROM `occupation` WHERE `occupation_level_one_id` = '$profession'";
					$query_run = mysqli_query($con, $query);
					if(mysqli_num_rows($query_run)>0){
						while($row = mysqli_fetch_array($query_run)){
							array_push( $user_arr,$row['user_id']);						
						}
					}
					else{
						array_push( $user_arr,"No results Found");
					}	
				}
				if (!empty( $_POST['bithak_date']) ) {
					# code...
					$query = "SELECT `baithak_id` FROM `baithak` WHERE `bithak_date` = '$bithak_date'";
					$query_run = mysqli_query($con , $query);
					$row1 = mysqli_fetch_row($query_run);
					$baithak_id = $row1[0];

					$query = "SELECT `user_id` FROM `visit_details` WHERE `baithak_id` = '$baithak_id'";
					$query_run = mysqli_query($con, $query);
					if(mysqli_num_rows($query_run)>0){
						while($row = mysqli_fetch_array($query_run)){
							array_push( $user_arr,$row['user_id']);						
						}
					}
					else{
						array_push( $user_arr,"No results Found");
					}	
				}
				
			}
			else{
				echo "Please select some filters to search";
			}
			
		}
		$N = count($user_arr);
		$count_no_result = 0;//will ount no of "no results"
		$array_to_table = array();
		for ($i=0; $i <$N ; $i++) {//this for loop will eleminate the "no result found" elments and left elements will be passed in array to 
		//get converted into table
			# code...
			if($user_arr[$i] == "No results Found"){
				$count_no_result = $count_no_result + 1;
			}
			else{
				array_push($array_to_table, $user_arr[$i]);
			}
		}

		if ($count_no_result != $N) {
			$n =  count($array_to_table);
			for($i=0;$i<$n;$i++){
				convert_to_table($array_to_table[$i]);
				}
		}
		else {
			echo "No Records Found.";
		}
	
	}
?>
