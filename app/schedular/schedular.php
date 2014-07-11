<!-- Including files for DB connection and Session Control -->
<?php
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday | Schedular</title>
    
    <!-- Configuration for the absoulte path -->
     <?php include "../../config_global.php";   ?>
    <!-- Core Css -->
    <?php include "../../includes/cssLinks.inc.php";   ?>
    <link rel="stylesheet" href=<?php echo $PATH . "assests/js/dojo-1.9.3/dojox/calendar/themes/claro/Calendar.css" ?> />
    <style type="text/css">
      .dojoxCalendar{ font-size: 12px; font-family:Myriad,Helvetica,Tahoma,Arial,clean,sans-serif; }
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
                <div data-dojo-type="dojox/calendar/Calendar"
                     data-dojo-props="dateInterval:'day'"
                     style="position:relative;width:600px;height:600px">
                </div> 
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

        //Script for Dojox.Calendar
        require(["dojox/calendar/Calendar"], function(Calendar){
            // javascript code
        });
        var someData = [
          {
            id: 0,
            summary: "Event 1",
            begin: new Date(2014, 0, 1, 10, 0),
            end: new Date(2014, 0, 1, 12, 0)
          }
        ];

        calendar = new Calendar({
          date: new Date(2014, 0, 1),
          startTimeAttr: "begin",
          endTimeAttr: "end",
          store: new Observable(new Memory({data: someData})),
          dateInterval: "day",
          style: "position:relative;width:500px;height:500px"
        }, "someId");
    </script>

    <?php
        } #End of LoggedIn function
        else{
            include '../../includes/login/login_form.inc.php' ;
        }
    ?>


</body>
</html>