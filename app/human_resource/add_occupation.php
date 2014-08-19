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
                
            	$occupationLevelOne = $_POST['occupation_level_one'];
                $occupationLevelTwo = $_POST['occupation_level_two'];
                $occupationLevelThree = $_POST['occupation_level_three'];
                #$organization = $_POST['organization'];

                if (!empty($occupationLevelOne)) {
                    # code...
                    $insertOccupationOne = mysqli_query($con, "INSERT INTO `occupation_level_one` (`occupation_level_one_id`, `occupation_level_one_name`) VALUES (NULL, '$occupationLevelOne')");
                    echo "<h3 text-align='center'>".$_POST['occupation_level_one']. " is added. </h3>";
                }

                if (!empty($occupationLevelTwo)) {
                    # code...
                    $insertOccupationTwo = mysqli_query($con, "INSERT INTO `occupation_level_two` (`occupation_level_two_id`, `occupation_level_two_name`) VALUES (NULL, '$occupationLevelTwo')");
                    echo "<h3 text-align='center'>".$_POST['occupation_level_two']. " is added. </h3>";
                }
                
                if (!empty($occupationLevelThree)) {
                    # code...
                    $insertOccupationThree = mysqli_query($con, "INSERT INTO `occupation_level_three` (`occupation_level_three_id`, `occupation_level_three_name`) VALUES (NULL, '$occupationLevelThree')");
                    echo "<h3 text-align='center'>".$_POST['occupation_level_three']. " is added. </h3>";
                }
                
                echo "<form action='index.php#registerOccupation' method='post'>
                            <input type='submit' value='occupationRedirect' label='Back' id='OccupationRedirect' data-dojo-type='dijit/form/Button' />
                        </form>";
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