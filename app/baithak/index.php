<!-- Including files for DB connection and Session Control -->
<?php
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
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

            <!-- Accordion on left region of layout -->
            <div dojoType="dijit.layout.ContentPane" style="width:180px;" region="left">  
                <div dojoType="dijit.layout.AccordionContainer" style="width: 100%;height: 100%;"> 
                    <div dojoType="dijit.layout.ContentPane" title="Service 1"> 
                        <ul style="list-style:none;">
                            <li><a href="#">Option 2</a></li>
                            <li><a id="empInfo" href="#">Employee List</a></li>
                            <li><a href="#">Option 3</a></li>
                            <li><a href="#">Option 4</a></li>
                        </ul>
                    </div>
                    <div dojoType="dijit.layout.ContentPane" title="Service 2"> 
                        This is the content in blade 2. 
                    </div> 
                    <div dojoType="dijit.layout.ContentPane" title="Service 3"> 
                        This is the content in blade 3. 
                    </div> 
                    <div dojoType="dijit.layout.ContentPane" title="Service 4"> 
                        This is the content in blade 4. 
                    </div> 
                    <div dojoType="dijit.layout.ContentPane" title="Service 5"> 
                        This is the content in blade 5. 
                    </div> 
                    <div dojoType="dijit.layout.ContentPane" title="Service 6"> 
                        This is the content in blade 6. 
                    </div> 
                </div>
            </div>

            <!-- Center Region of layout -->
             <div dojoType="dijit.layout.ContentPane" id="content" region="center" splitter="true"> 
                This is the content in the center section. 
            </div> 
        
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
    "dijit/DropDownMenu", "dijit/MenuItem"]);
    </script>

    <?php
        } #End of LoggedIn function
        else{
            include 'includes/login/login_form.inc.php' ;
        }
    ?>


</body>
</html>