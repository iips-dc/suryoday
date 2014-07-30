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

        <!-- Center Region of layout -->
            <div dojoType="dijit.layout.ContentPane" id="content" region="center" splitter="true"> 
                                        
        <?php 
        include '../../includes/login/connect.inc.php';
        
        if(isset($_POST['generate_token'])){                
            $userid = $_POST['userid'];
            $result = mysqli_query($con,"SELECT * FROM user_info where user_id = ".$userid);    
            
            //if userid is valid than add a new entry in visit_details table and generate new token which is sno for this table.
            if(count($result) == 1) {       
                $baithak = mysqli_fetch_array($result);
                //checking all values are mathing or not except occuption ais t is in another table         
                if(($baithak['first_name'] == $_POST['first_name']) && ($baithak['last_name'] == $_POST['last_name']) 
                    && ($baithak['mobile_no'] == $_POST['mobile_number'])){
                #check for occupation is yet to be done.
                #insertion in visit_detail table                
                $results->close;        //free above result set
                mysqli_query($con,"INSERT INTO visit_details(user_id, baithak_id, purpose_id)
                VALUES ('".$userid."', '1', 1)") or die("Error : ".mysqli_error($con));
                echo "Visitor added!<br/>";
    
                #fetching new/last added sno and giving it as token to this particular bhkat.
                $result = mysqli_query($con,"SELECT sno FROM visit_details ORDER BY sno DESC LIMIT 1");
                $visitor = $result->fetch_object();
                echo "Generated Token number is ".$visitor->sno."<br/>";
                echo "<a href='./index.php'> Back to previous page </a>";
                //echo "<script> alert('Generated Token Number is '".$visitor->sno."</script>";                
                }                
                else{
                    echo $_POST['first_name'].", ".$_POST['last_name'].", ".$_POST['mobile_number']." didn't match with database data.<br/>";
                }
            }
            else{
                echo "data is not one row";
            }
            $result->close;
            #echo "closed";
            mysqli_close($con);     
            }
        elseif (isset($_POST['register'])) {
            echo "code to redirect it to regtister page";               
        }
        elseif (isset($_POST['update_information'])) {
            echo "code to redirect it to update information page";      
        }    
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