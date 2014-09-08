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
    <title>Suryoday</title>
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
            if(isset($_POST['department_name'])&&isset($_POST['department_objective'])){
       			$department_name= $_POST['department_name'];
        		$department_objective= $_POST['department_objective'];
	        	if(!empty($department_name) && !empty( $department_objective)){
          			$sql= "INSERT INTO department(`department_name`, `department_objective`) VALUES ('$department_name','$department_objective')";
          			if (!mysqli_query($con,$sql)){
                      	die('Error: ' . mysqli_error($con));
         			}
           			else{
           				echo "Department added successfully.";
           			}
		        }
         		else
         		{
          			echo "please fill all the enteries";
        		}
     		}  
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