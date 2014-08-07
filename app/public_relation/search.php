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
    	<?php include "../../config_global.php";  ?>
    	<!-- Core Css -->
    	<?php include "../../includes/cssLinks.inc.php";   ?>

	<style>
table ,th, td{
	border-collapse: collapse;
	border: 1px solid ;
	}

th {
	
	width:100px;}

  
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
			
			<?php 
				
				function check_search_term(){//if received by is set.we will check if search terms are entered or not
					if(!empty($_POST['search_term'])){
						return True;
						}
					else{
						return False;
						}
					}
				
				#defining function for search.
				function search($query){#This function will take query as parameter and echo a table by executing that query
					//it is required as $con is not a global variable 
					$host = 'localhost';
					$user = 'root';
					$pass = 'root';
					$db = 'suryoday_db';
					$con = mysqli_connect($host,$user,$pass,$db);
					//connection is made
					$query_run = mysqli_query($con, $query);
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
					mysqli_close($con);
					}				
				
				#Search code begins
				if(isset($_POST['searching'])){
					if(!empty($_POST['search'])&&($_POST['receivedBy'] != -1)){//if search and received by both are selected
						$search_name = $_POST['search'];
						$search_by = $_POST['receivedBy'];
						if($search_by != 'Age'){//if search_by is not age.search by is city or user_id
							if(check_search_term()){//search term is set or not
								if($search_by=='City'){
									$search_term = $_POST['search_term'];
									$query = "SELECT * FROM user_info WHERE (first_name LIKE '%".$search_name."%' OR last_name LIKE '%".$search_name."%') AND district_city LIKE '%".$search_term."%'";
									search($query);
									}
								else{
									if($search_by == 'User_Id'){
										$search_term = $_POST['search_term'];
									$query = "SELECT * FROM user_info WHERE (first_name LIKE '%".$search_name."%' OR last_name LIKE '%".$search_name."%' ) ANDuser_id LIKE '%".$search_term."%'";
									search($query);
										}
									}
								}
							else{
								echo "Please enter the keyword you want to search for ".$search_by ."<br>";
								echo "<a href='index.php'>Back to search</a>";
								}
							}
						else{//if search by is age
							//for age from 0-15
							echo "Search results from age 0 - 15<br>";
							$present_date = date("Y-m-d");
							$last_date = date('Y-m-d', strtotime('-15 years'));
							$query = "SELECT * FROM user_info WHERE (first_name LIKE '%".$search_name."%' OR last_name LIKE '%".$search_name."%') AND `dob` < '".$present_date."' AND `dob` > '".$last_date."'";
							search($query);
							//for age 15-30
							echo "Search results from age 15-30 <br>";
							$present_date = $last_date;
							$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
							$query = "SELECT * FROM user_info WHERE (first_name LIKE '%".$search_name."%' OR last_name LIKE '%".$search_name."%') AND `dob` < '".$present_date."' AND `dob` > '".$last_date."'";
							search($query);
							//for age 45-30
							echo "Search results from age 30-45 <br>";
							$present_date = $last_date;
							$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
							$query = "SELECT * FROM user_info WHERE  (first_name LIKE '%".$search_name."%' OR last_name LIKE '%".$search_name."%') AND `dob` < '".$present_date."' AND `dob` > '".$last_date."'";
							search($query);
							//for age 60-45
							echo "Search results from age 45-60<br>";
							$present_date = $last_date;
							$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
							$query = "SELECT * FROM user_info WHERE  (first_name LIKE '%".$search_name."%' OR last_name LIKE '%".$search_name."%' )AND `dob` < '".$present_date."' AND `dob` > '".$last_date."'";
							search($query);
							//for age 60-75
							echo "Search results from age 60 -75 <br>";
							$present_date = $last_date;
							$query = "SELECT * FROM user_info WHERE (first_name LIKE '%".$search_name."%' OR last_name LIKE '%".$search_name."%') AND `dob` < '".$present_date."' AND `dob` > '".$last_date."'";
							search($query);
							//for age 75 and above
							echo "Search results from age 75 and above <br>";
							$present_date = $last_date;
							$query = "SELECT * FROM user_info WHERE (first_name LIKE '%".$search_name."%' OR last_name LIKE '%".$search_name."%') AND `dob` < '".$present_date."'";
							search($query);
							}
						}
					else{
						if(!empty($_POST['search'])&&($_POST['receivedBy'] == -1)){//if only search name is set
							$search_name = $_POST['search'];
							$query = "SELECT * FROM user_info WHERE first_name LIKE '%".$search_name."%' OR last_name LIKE '%".$search_name."%'";
									search($query);
							}
						else{
							if(!empty($_POST['receivedBy'])&&($_POST['receivedBy'] != -1)){//if only search_by is set
								$search_by = $_POST['receivedBy'];
						if($search_by != 'Age'){//if search_by is not age.search by is city or user_id
							if(check_search_term()){//search term is set or not
								if($search_by=='City'){
									$search_term = $_POST['search_term'];
									$query = "SELECT * FROM user_info WHERE district_city LIKE '%".$search_term."%'";
									search($query);
									}
								else{
									if($search_by == 'User_Id'){
										$search_term = $_POST['search_term'];
									$query = "SELECT * FROM user_info WHERE user_id LIKE '%".$search_term."%'";
									search($query);
										}
									}
								}
							else{
								echo "Please enter the keyword you want to search for ".$search_by ."<br>";
								echo "<a href='index.php'>Back to search</a>";
								}
							}
						else{//if search by is age
							//for age from 0-15
							echo "Search results from age 0 - 15<br>";
							$present_date = date("Y-m-d");
							$last_date = date('Y-m-d', strtotime('-15 years'));
							$query = "SELECT * FROM user_info WHERE `dob` < '".$present_date."' AND `dob` > '".$last_date."'";
							search($query);
							//for age 15-30
							echo "Search results from age 15-30 <br>";
							$present_date = $last_date;
							$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
							$query = "SELECT * FROM user_info WHERE `dob` < '".$present_date."' AND `dob` > '".$last_date."'";
							search($query);
							//for age 45-30
							echo "Search results from age 30-45 <br>";
							$present_date = $last_date;
							$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
							$query = "SELECT * FROM user_info WHERE `dob` < '".$present_date."' AND `dob` > '".$last_date."'";
							search($query);
							//for age 60-45
							echo "Search results from age 45-60<br>";
							$present_date = $last_date;
							$last_date = date('Y-m-d', strtotime('-15 years', strtotime($last_date)));
							$query = "SELECT * FROM user_info WHERE `dob` < '".$present_date."' AND `dob` > '".$last_date."'";
							search($query);
							//for age 60-75
							echo "Search results from age 60 -75 <br>";
							$present_date = $last_date;
							$query = "SELECT * FROM user_info WHERE `dob` < '".$present_date."' AND `dob` > '".$last_date."'";
							search($query);
							//for age 75 and above
							echo "Search results from age 75 and above <br>";
							$present_date = $last_date;
							$query = "SELECT * FROM user_info WHERE `dob` < '".$present_date."'";
							search($query);
							}	
								}
							}					
						}
				
					if(empty($_POST['search'])&&empty($_POST['receivedBy'])){//if bot are not set
						echo 'Please select atleast one of the fields.<br>';
						echo "<a href='index.php'>Back to search</a>";					
						}
					}
					
			?>

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
</html>