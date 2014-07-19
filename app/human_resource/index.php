<!-- Including files for DB connection and Session Control -->
<?php
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday | Human Resource</title>
    
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

                <!-- Vertical Left tabs begin -->             
                <div data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region:'center', tabStrip:true" tabPosition="left-h">
                    <!-- Add User tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Add User" selected="true" id="addUser">

                        <!-- Form for Add User-->
                        <form action="addUser.php" method="get">
                            <pre>
                                <!-- text inputs:  dijit/form/TextBox -->
                                <strong>E-mail adress: </strong>   <input type="text" name="emailAdress" placeholder="abc@example.com" id="emailAdress"
                                    data-dojo-type="dijit/form/TextBox"/>  
                            </pre>    
                                <center>
                                <input type="submit" value="Add" label="Add" id="addButton"
                                    data-dojo-type="dijit/form/Button" />   
                                </center>              
                        </form><!-- form for addUser ends -->
                        
                    </div> <!-- addUser Tab ends -->

                    <!-- Review User tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Review User">
                        <!-- Form for Upay -->
                        <form action="reviewUser.php" method="get">
                            <pre>   
                                <!-- text inputs:  dijit/form/TextBox -->
                                <strong>E-mail adress: </strong>  <input type="text" name="emailAdress" placeholder="abc@example.com" id="emailAdress"
                                    data-dojo-type="dijit/form/TextBox"/>                                                     
                                <!-- Drop down list:  dijit/form/FilteringSelect -->
                                <strong>User Type: </strong>      <select name="userType" id="userType" data-dojo-type="dijit/form/FilteringSelect" required="true">
                                    <option value="">Select User type</option>
                                    <option value="abc">PR</option>
                                    <option value="xyz">Data Entry Operator</option>
                                    <option value="pqr">HR</option>
                                </select>
                            </pre>
                                <!-- submit button:  dijit/form/Button -->
                                <center>
                                <input type="submit" value="Permit" label="Permit" id="erviewUser"
                                    data-dojo-type="dijit/form/Button" />
                                </center>                                                                     
                        </form><!-- form for Upay ends -->
                    </div>

                    <!-- Profiles tab bigins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Profiles">
                        <!-- Form for Profiles begins -->
                        <form action="profiles.php" method="get">
                            <pre>
                               User1    -------|
                               User2    -------|
                               User3    -------|
                               User4    -------|
                               User5    -------|
                             </pre>                          
                        </form> <!-- Profiles Form ends -->
                    </div>

                    <!-- Shout Box tab -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Forms">
                        <pre> Coming Soon!!!</pre>
                    </div> <!-- Shout Box tab ends. -->

                </div><!-- Vertical Left tabs end -->
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
    "dijit/DropDownMenu", "dijit/MenuItem", "dijit/layout/TabContainer", "dijit/form/RadioButton", "dojo/domReady!", "dijit/form/Textarea" ]);

     </script>

    <?php
        } #End of LoggedIn function
        else{
            include 'includes/login/login_form.inc.php' ;
        }
    ?>


</body>
</html>