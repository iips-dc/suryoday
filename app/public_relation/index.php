<<<<<<< HEAD
<!-- Including files for DB connection and Session Control -->
<?php
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday | Public Relation</title>
    
    <!-- Configuration for the absoulte path -->
     <?php include "../../config_global.php";   ?>
    <!-- Core Css -->
    <?php include "../../includes/cssLinks.inc.php";   ?>
    <style>
    #filter {
    	background-color: #EFEFEF;
    	
    	padding-left: 10px;
    	margin: 5px 5px 0 5px;
    	/*border: 1px solid #808080;*/
    }
    #filter_container {
    	border-right: 3px solid #808080;
    }

    table,td,th{
    	border: 1px solid #000;
    }
    </style>

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
             	<div class="row">
             		<div class="col-md-3" id="filter_container">
             		<strong>Filter results</strong>
             			<form action="#" method="post">
             				<div id="filter">
             					<strong>Name: </strong> <br>
             					<input type="text" name="name" placeholder="Ram" id="name" 
                                    data-dojo-type="dijit/form/TextBox"/>
                                <input type="submit" name="name_submit" value="Go" label="Go" id="nameSubmit"
                                    data-dojo-type="dijit/form/Button" />
             				</div>
             				<div id="filter">
             					<strong>Phone number: </strong> <br>
             					<input type="text" name="phone_no" placeholder="1264537" id="phoneNo" 
                                    data-dojo-type="dijit/form/TextBox"/>
                            </div>
             				<div id="filter">
             					<strong>Location: </strong> <br>
             					<select name="district_city" id="locationName" data-dojo-type="dijit/form/FilteringSelect">
                                    <option value="">Select a Location</option>
                                    <?php 
                                    	$query = "SELECT DISTINCT `district_city` FROM `user_info`";
                                    	$query_run =  mysqli_query($con,$query);
                                    	while($row = mysqli_fetch_array($query_run)){
                                    		echo '<option value= "'.$row['district_city'].'">'.$row['district_city'].'</option>';
                                    	}
                                    ?>
                                    </select>
                                <input type="submit" name="location_submit" value="Go" label="Go" id="locationSubmit"
                                    data-dojo-type="dijit/form/Button" />
             				</div>
             				<div id="filter">
             					<strong>Age: </strong> <br>
             					<input type="checkbox" name="age[]" value="0-15">0-15<br>
								<input type="checkbox" name="age[]" value="15-30">15-30<br>
								<input type="checkbox" name="age[]" value="30-45">30-45<br>
								<input type="checkbox" name="age[]" value="45-60">45-60<br>
								<input type="checkbox" name="age[]" value="60-75">60-75<br>
								<input type="checkbox" name="age[]" value="75-above">75 above<br>
							</div>
							<div id="filter">
             					<strong>Baithak: </strong> <br>
             					<select name="bithak_date" id="baithakDate" data-dojo-type="dijit/form/FilteringSelect">
                                    <option value="">Select a baithak date</option>
                                    <?php 
                                    	$query = "SELECT DISTINCT `bithak_date` FROM baithak";
                                    	$query_run =  mysqli_query($con,$query);
                                    	while($row = mysqli_fetch_array($query_run)){
                                    		echo '<option value= "'.$row['bithak_date'].'">'.$row['bithak_date'].'</option>';
                                    	}
                                    ?>
                                </select>
    						</div>
    						<div id="filter">
             					<strong>Profession: </strong> <br>
             					<select name="profession" id="profession" data-dojo-type="dijit/form/FilteringSelect">
                                    <option value="">Select a profession</option>
                                    <?php 
                                    	$query = "SELECT * FROM `occupation_level_one`";
                                    	$query_run =  mysqli_query($con,$query);
                                    	while($row = mysqli_fetch_array($query_run)){
                                    		echo '<option value= "'.$row['occupation_level_one_id'].'">'.$row['occupation_level_one_name'].'</option>';
                                    	}
                                    ?>
                                </select>
               				</div>
               				<div id="filter">
             					<strong>Birthday: </strong> <br>
             					<input type="text" id="dob" name="dob" data-dojo-type="dijit/form/DateTextBox"/>
    						</div>
    						<div id="filter">
             					<strong>Anniversary: </strong> <br>
             					<input type="text" name="date_of_anniversary" id="anniversary" data-dojo-type="dijit/form/DateTextBox"/>
    						</div>
             			</form>
             		</div>
                    <div class="col-md-9">
                    <!--this div will perform php functioning and display results-->
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

                    <!--php ends-->
                    </table>
                    </div>                    
             	</div>
            </div> 
        
            <!-- Bottom Region of Layout -->
            <div dojoType="dijit.layout.ContentPane" region="bottom" splitter="true"> 
                &copy; Suryoday Trust . <span style="float:right">Powered By <a  href="#">Developement Center</a> </span>
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
=======
<!-- Including files for DB connection and Session Control -->
<?php
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday | Public Relation</title>
    
    <!-- Configuration for the absoulte path -->
     <?php include "../../config_global.php";   ?>
    <!-- Core Css -->
    <?php include "../../includes/cssLinks.inc.php";   ?>
    <style>
    #filter {
    	background-color: #EFEFEF;
    	
    	padding-left: 10px;
    	margin: 5px 5px 0 5px;
    	/*border: 1px solid #808080;*/
    }
    #filter_container {
    	border-right: 3px solid #808080;
    }

    table,td,th{
    	border: 1px solid #000;
    }
    </style>

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
             	<div class="row">
             		<div class="col-md-3" id="filter_container">
             		<strong>Filter results</strong>
             			<form action="#" method="post">
             				<div id="filter">
             					<strong>Name: </strong> <br>
             					<input type="text" name="name" placeholder="Ram" id="name" 
                                    data-dojo-type="dijit/form/TextBox"/>
                                <input type="submit" name="name_submit" value="Go" label="Go" id="nameSubmit"
                                    data-dojo-type="dijit/form/Button" />
             				</div>
             				<div id="filter">
             					<strong>Phone number: </strong> <br>
             					<input type="text" name="phone_no" placeholder="1264537" id="phoneNo" 
                                    data-dojo-type="dijit/form/TextBox"/>
                            </div>
             				<div id="filter">
             					<strong>Location: </strong> <br>
             					<select name="district_city" id="locationName" data-dojo-type="dijit/form/FilteringSelect">
                                    <option value="">Select a Location</option>
                                    <?php 
                                    	$query = "SELECT DISTINCT `district_city` FROM `user_info`";
                                    	$query_run =  mysqli_query($con,$query);
                                    	while($row = mysqli_fetch_array($query_run)){
                                    		echo '<option value= "'.$row['district_city'].'">'.$row['district_city'].'</option>';
                                    	}
                                    ?>
                                    </select>
                                <input type="submit" name="location_submit" value="Go" label="Go" id="locationSubmit"
                                    data-dojo-type="dijit/form/Button" />
             				</div>
             				<div id="filter">
             					<strong>Age: </strong> <br>
             					<input type="checkbox" name="age[]" value="0-15">0-15<br>
								<input type="checkbox" name="age[]" value="15-30">15-30<br>
								<input type="checkbox" name="age[]" value="30-45">30-45<br>
								<input type="checkbox" name="age[]" value="45-60">45-60<br>
								<input type="checkbox" name="age[]" value="60-75">60-75<br>
								<input type="checkbox" name="age[]" value="75-above">75 above<br>
							</div>
							<div id="filter">
             					<strong>Baithak: </strong> <br>
             					<select name="bithak_date" id="baithakDate" data-dojo-type="dijit/form/FilteringSelect">
                                    <option value="">Select a baithak date</option>
                                    <?php 
                                    	$query = "SELECT DISTINCT `bithak_date` FROM baithak";
                                    	$query_run =  mysqli_query($con,$query);
                                    	while($row = mysqli_fetch_array($query_run)){
                                    		echo '<option value= "'.$row['bithak_date'].'">'.$row['bithak_date'].'</option>';
                                    	}
                                    ?>
                                </select>
    						</div>
    						<div id="filter">
             					<strong>Profession: </strong> <br>
             					<select name="profession" id="profession" data-dojo-type="dijit/form/FilteringSelect">
                                    <option value="">Select a profession</option>
                                    <?php 
                                    	$query = "SELECT * FROM `occupation_level_one`";
                                    	$query_run =  mysqli_query($con,$query);
                                    	while($row = mysqli_fetch_array($query_run)){
                                    		echo '<option value= "'.$row['occupation_level_one_id'].'">'.$row['occupation_level_one_name'].'</option>';
                                    	}
                                    ?>
                                </select>
               				</div>
               				<div id="filter">
             					<strong>Birthday: </strong> <br>
             					<input type="text" id="dob" name="dob" data-dojo-type="dijit/form/DateTextBox"/>
    						</div>
    						<div id="filter">
             					<strong>Anniversary: </strong> <br>
             					<input type="text" name="date_of_anniversary" id="anniversary" data-dojo-type="dijit/form/DateTextBox"/>
    						</div>
             			</form>
             		</div>
                    <div class="col-md-9">
                    <!--this div will perform php functioning and display results-->
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

                    <!--php ends-->
                    </table>
                    </div>                    
             	</div>
            </div> 
        
            <!-- Bottom Region of Layout -->
            <div dojoType="dijit.layout.ContentPane" region="bottom" splitter="true"> 
                &copy; Suryoday Trust . <span style="float:right">Powered By <a  href="#">Developement Center</a> </span>
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
>>>>>>> c377a8370f7e218c3f5b1c56952ae43820a73f83
</html>