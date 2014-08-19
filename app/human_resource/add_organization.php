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
					
				    $orgName = $_POST['org_name'];
				    $orgAddress = $_POST['org_address'];
				    $orgArea = $_POST['org_area'];
				    $orgCity = $_POST['org_city'];
				    $orgState = $_POST['org_state'];
				    $orgCountry = $_POST['org_country'];
				    $orgContactNo = $_POST['org_contact_number'];

				    $query = "INSERT INTO `suryoday_db`.`occupation_organization` (`org_id`, `org_name`, `org_start_address`, `org_area_locality`, `org_city`, `org_state`, `org_country`, `org_contact_number`) VALUES (NULL, '$orgName', '$orgAddress', '$orgArea', '$orgCity', '$orgState', '$orgCountry', '$orgContactNo')";
				    $queryRun = mysqli_query($con, $query);
				    echo "<h3 ><strong>".$orgName." Details </strong></h3>
				    			<h3 ><strong>Name : 		 </strong> <span>".$orgName."</span></h3>
				    			<h3 ><strong>Address : 		 </strong> <span>".$orgAddress."</span></h3>
				    			<h3 ><strong>Area/Locality : </strong> <span>".$orgArea."</span></h3>
				    			<h3 ><strong>City : 		 </strong> <span>".$orgCity."</span></h3>
				    			<h3 ><strong>State : 		 </strong> <span>".$orgState."</span></h3>
				    			<h3 ><strong>Country :       </strong> <span>".$orgCountry."</span></h3>
				    			<h3 ><strong>Contact Number :</strong> 	<span>".$orgContactNo."</span></h3>";
				?>

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