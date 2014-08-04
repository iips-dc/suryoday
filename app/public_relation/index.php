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
                        <form class="search" action="search.php" method="post">
                            <div class="col-md-6 text-center">
                             <!-- search box begins-->
                            <div id="searchbox" style="display: center">
                                <h3>Quick search</h3>
                                
                                    <input type="text" name="search" placeholder="Ram" size="18" />
                                    <input type="submit" value="Go" name="searching"/>
                                    <input type="hidden" name="check_keywords" value="yes" />
                                    <input type="hidden" name="area" value="default" />
                                
                                <p class="searchtip" style="font-size: 90%">
                                    Enter a follower name.
                                </p>
                            </div>                                                
                            </div><!-- search box ends -->
                        
                        <!-- filter box begins-->                        
                            <div id="searchbox" class="col-md-6 text-center">
                                <h3>Search By</h3>
                                
                                    <!-- Drop down list:  dijit/form/FilteringSelect -->
                                    <select name="receivedBy" id="receivedBy" data-dojo-type="dijit/form/FilteringSelect">
                                        <option value="-1">None</option>
                                        <option value="User_Id">User id</option>
                                        <option value="Age">Age</option>
                                        <option value="City">Adress City</option>
                                    </select>
                               	
                                <p class="searchtip" style="font-size: 90%">
                                    Choose the one with which you want to search.
                                </p>
                                
                                <input type="text" name="search_term" placeholder="Indore" size="18" />
                                <p class="searchtip" style="font-size: 90%">
                                    Enter the value with which you want to search.
                                </p>
                            </div>
                             </form>                        
                        <!-- filter box ends -->
                        </div>

                        <!-- include css and js files  for grid-->
                        <link rel="stylesheet" type="text/css" href="../../assests/css/grid.css">
                        <link rel="stylesheet" type="text/css" href="../../assests/js/dojo-1.9.3/dojox/grid/enhanced/resources/claro/EnhancedGrid.css">
                        <link rel="stylesheet" type="text/css" href="../../assests/js/dojo-1.9.3/dojox/grid/enhanced/resources/EnhancedGrid_rtl.css">
                        <script src="../../assests/js/grid.js"></script>
                        <div id="gridDiv">
                           
                        </div>

                    </div> <!-- Followers Tab ends -->

                    <!-- Send SMS tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Send SMS">
                        <!-- Inner Tabs for birthday, anniversary and other information sepatrely begins-->
                        <div data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region:'center', tabStrip:true">
                            <!--Birthday tab begins -->
                            <div data-dojo-type="dijit/layout/ContentPane" title="Birthday" selected="true">
                                <h3> Today is Birthday of Bhakts:</h3>
                                <ul>
                                    <li>-------User1--------</li>
                                    <li>-------User2--------</li>
                                    <li>-------User3--------</li>
                                    <li>-------User4--------</li>
                                    <li>-------User5--------</li>
                                </ul>
                                <form action="sendSms.php" method="get">
                                    <input type="submit" value="birthday" label="Send" id="birthday"
                                    data-dojo-type="dijit/form/Button" />
                                </form>
                            </div> <!-- birthday tab ends -->
                            
                            <!-- Anniversary tab begins -->
                            <div data-dojo-type="dijit/layout/ContentPane" title="Anniversary">
                                <h3> Today is Anniversary of following Bhakts:</h3>
                                <ul>
                                    <li>-------User1--------</li>
                                    <li>-------User2--------</li>
                                    <li>-------User3--------</li>
                                    <li>-------User4--------</li>
                                    <li>-------User5--------</li>
                                </ul>
                                <form action="sendSms.php" method="get">
                                    <input type="submit" value="anniversary" label="Send" id="anniversary"
                                    data-dojo-type="dijit/form/Button" />
                                </form>
                            </div> <!-- Anniversary tab ends -->

                            <!-- Information tab begins -->
                            <div data-dojo-type="dijit/layout/ContentPane" title="Information">
                                <h3> Comming soon!!</h3>
                                
                                <form action="sendSms.php" method="get">
                                    <input type="submit" value="information" label="Send" id="information"
                                    data-dojo-type="dijit/form/Button" />
                                </form>
                            </div> <!-- Information tab ends -->

                        </div><!-- end Inner Tabs for birthday, anniversary and other information sepatrely-->
                    </div><!-- Send SMS tab end -->
                    
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
            include '../../includes/login/login_form.inc.php' ;
        }
    ?>


</body>
</html>