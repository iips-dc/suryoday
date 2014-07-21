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
                    <!-- Followers Tab begins -->                    
                    <div data-dojo-type="dijit/layout/ContentPane" title="Followers" selected="true" id="followers">
                        <div class="row">
                            <div class="col-md-6 text-center">
                             <!-- search box begins-->
                            <div id="searchbox" style="display: center">
                                <h3>Quick search</h3>
                                <form class="search" action="search.php" method="get">
                                    <input type="text" name="q" size="18" />
                                    <input type="submit" value="Go" />
                                    <input type="hidden" name="check_keywords" value="yes" />
                                    <input type="hidden" name="area" value="default" />
                                </form>
                                <p class="searchtip" style="font-size: 90%">
                                    Enter search terms or a follower name.
                                </p>
                            </div>                                                
                            </div><!-- search box ends -->
                        
                        <!-- filter box begins-->                        
                            <div id="searchbox" class="col-md-6 text-center">
                                <h3>Search By</h3>
                                <form class="search" action="search.php" method="get">
                                    <!-- Drop down list:  dijit/form/FilteringSelect -->
                                    <select name="receivedBy" id="receivedBy" data-dojo-type="dijit/form/FilteringSelect">
                                        <option value="">None</option>
                                        <option value="Occupation">Occupation</option>
                                        <option value="xyz">Age</option>
                                        <option value="pqr">Adress City</option>
                                    </select>
                                </form>
                                <p class="searchtip" style="font-size: 90%">
                                    Choose the one with which you want to search.
                                </p>
                            </div>                        
                        <!-- filter box ends -->
                        </div>

                        <!-- include css and js files  for grid-->
                        <link rel="stylesheet" type="text/css" href="../../assests/css/grid.css">
                        <link rel="stylesheet" type="text/css" href="../../assests/js/dojo-1.9.3/dojox/grid/enhanced/resources/claro/EnhancedGrid.css">
                        <link rel="stylesheet" type="text/css" href="../../assests/js/dojo-1.9.3/dojox/grid/enhanced/resources/EnhancedGrid_rtl.css">
                        <script src="../../assests/js/grid.js"></script>
                        <div id="gridDiv">
                            OOOOOOOOOOOOOOOOOOOOOOOOOOOOO
                        </div>

                    </div> <!-- Followers Tab ends -->

                    <!-- Send SMS tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Send SMS">
                        <!-- Form for Upay -->
                        <form action="sendSMS.php" method="get">
                            <pre>
                                <!-- text inputs:  dijit/form/TextBox -->
                                <strong>Tokenid: </strong>          <input type="text" name="tokenid" placeholder="tokenid" id="tokenid"
                                    data-dojo-type="dijit/form/TextBox" required="true" data-dojo-props='missingMessage:"Ooops! You forgot Problem!"'/>    
                                 
                                <strong>Bithakid:  </strong>        <input type="text" name="bithakid" placeholder="0012" id="bithakid"
                                    data-dojo-type="dijit/form/TextBox" required="true" data-dojo-props='missingMessage:"Ooops! You forgot bithakid!"' /> 
            
                                <strong>Problem: </strong>          <input type="text" name="problem" placeholder="Only Darshan" id="problem"
                                    data-dojo-type="dijit/form/Textarea" required="true" data-dojo-props='missingMessage:"Ooops! You forgot Problem!"' /> 
                                 <!-- radio buttons:  dijit/form/RadioButton -->
                                <strong>Status: </strong>           <input type="radio" id="statusSolved" name="status" checked="checked"
                                    data-dojo-type="dijit/form/RadioButton" />  <label for="radio1">Solved</label>  <input type="radio" id="statusUnsolved" name="status"
                                    data-dojo-type="dijit/form/RadioButton" />  <label for="radio2">Unsolved</label>

                                <strong>Reason: </strong>           <input type="text" name="reason" placeholder="Better if done in next month." id="reason"
                                    data-dojo-type="dijit/form/Textarea" style:"width:50px;" />                                 
                                <!-- Drop down list:  dijit/form/FilteringSelect -->
                                <strong>Assigned To: </strong>      <select name="assignedTo" id="assignedTo" data-dojo-type="dijit/form/FilteringSelect" required="true">
                                    <option value="">Select a member</option>
                                    <option value="abc">Abc</option>
                                    <option value="xyz">Xyz</option>
                                    <option value="pqr">Pqr</option>
                                </select>

                                <strong>Remark: </strong>           <input type="text" name="remark" placeholder="to be done urgently!" id="remark"
                                    data-dojo-type="dijit/form/Textarea"/> <br/>                           
                                <!-- submit button:  dijit/form/Button -->
                                <center>
                                <input type="submit" value="Upay Submit" label="Submit" id="upaySubmit"
                                    data-dojo-type="dijit/form/Button" />
                                </center>                     
                             </pre>                          
                        </form><!-- form for Send SMS ends -->
                    </div>
                    
                </div><!-- Vertical Left tabs end -->
            </div> <!-- Send SMS tab ends -->
        
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

    <?php
        } #End of LoggedIn function
        else{
            include '../../includes/login/login_form.inc.php' ;
        }
    ?>


</body>
</html>