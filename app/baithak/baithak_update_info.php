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
        
       echo "Updating Information of users! <br/> Comming Soon!."
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