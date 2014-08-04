<!-- Including files for DB connection and Session Control -->
<?php
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday | Baithak | Register new user</title>
    
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
                                        
        <?php 
        include '../../includes/login/connect.inc.php';
        
        if(isset($_POST['register'])){                
            $userid = $_POST['userid'];
             
            #check userid should be blank
            if(strlen($userid) != 0){
            	echo "Oops!! To register new user userid should be blank.";
            }
            //	INSERT INTO `user_info` (`user_id` ,`first_name` ,`last_name` ,`mobile_no` )VALUES ('cc4', 'cc','bb', '22');
            else{
                #fetch all other values
                $first_name = trim($_POST['first_name']);
                $last_name = trim($_POST['last_name']);
                $mobile_number = trim($_POST['mobile_number']);
                $occupation = trim($_POST['occupation']);
                $purpose = trim($_POST['purpose']);

                #check all values are not blank
                try{
                	if((strlen($first_name) == 0) or (strlen($last_name) == 0) or (strlen($mobile_number)==0) or strlen($occupation)==0 or (strlen($purpose)==0)){
                		throw new Exception("Fields were blank", 1);                		               		
                	}
                	#code to create new user and then generate its token
                	
            		#read last sno to give new userid:
            		$result = mysqli_query($con, "SELECT MAX( sno ) as sno FROM `user_info`;");
            		$row = mysqli_fetch_array($result);
            		$last_sno = $row['sno'];
					#freeing result object
                	$result->close;
                	//new sno will be
                	$new_sno = (int)$last_sno + 1;

					#new userid 
					$new_userid = substr($first_name, 0, 2).$new_sno ;
					echo "New user added with userid: <b>$new_userid</b> <br/>";
                	
                	#insert new user detail in user_info table
                	$result = mysqli_query($con, "INSERT INTO `user_info` (`user_id` ,`first_name` ,`last_name` ,`mobile_no` )
                		VALUES ('".$new_userid."', '".$first_name."','".$last_name."', '".$mobile_number."');") 
                		or die("Unabel to add new user in user_info <br/> Error : ".mysqli_error($con));
                	$result->close;        //free above result set

                	#Put new user in temporry_user_info tabel so that he will be tracked for getting full information.
                	$result = mysqli_query($con, "INSERT INTO `temporary_user_info` (`userid` )
                		VALUES ('".$new_userid."');") 
                		or die("Unabel to add new user in temporaty_user_info <br/> Error : ".mysqli_error($con));

                }catch (Exception $e) {
    				echo 'Caught exception: ',  $e->getMessage(), "\n";
				}

				#puting detail in vesitor_details table and generating token
				
                mysqli_query($con,"INSERT INTO visit_details(user_id, baithak_id, purpose_id)
                VALUES ('".$new_userid."', 'bi1', 1)") or die("Unabel to add visitor <br/> Error : ".mysqli_error($con));
                echo "Visitor added!<br/>";
    
                #fetching new/last added sno and giving it as token to this particular bhkat.
                $result = mysqli_query($con,"SELECT sno FROM visit_details ORDER BY sno DESC LIMIT 1");
                $visitor = $result->fetch_object();
                echo "Generated Token number is <b>".$visitor->sno."</b><br/>";                  
            	$result->close;
            	$con->close;
            }
            
            }
            else{
                echo "There is some problem button is not set. Try again later!!";
            }
            echo "<br/><a href='./index.php'> Back to previous page </a>";
        ?>

        </div><!-- Vertical Left tabs end -->
    </div> <!-- page border layout end -->
        
    <!-- Bottom Region of Layout -->
    <div dojoType="dijit.layout.ContentPane" region="bottom" splitter="true"> 
        &copy; Suryoday Trust . <span style="float:right">Powered By <a  href="#">Developement Center</a> <span>
    </div>
    </div> <!-- end of Border Layout Container --> 

    <?php include("../../includes/jsLinks.inc.php"); ?> 
    <?php include("../../includes/dojo_widgets.inc.php"); ?>

    <!-- Script for dynamic loading of pages in center region -->
    <script>
        require(["dojo/parser", "dijit/MenuBar", "dijit/MenuBarItem", "dijit/PopupMenuBarItem",
    "dijit/DropDownMenu", "dijit/MenuItem", "dijit/layout/TabContainer","dojo/domReady!", ]);
    </script>
    <?php
        } #End of LoggedIn function
        else{
            include '../../includes/login/login_form.inc.php' ;
        }
    ?>


</body>
</html>