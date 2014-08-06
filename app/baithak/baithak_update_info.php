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
        
       #echo "Updating Information of users! <br/> Comming Soon!."
       #Checking for user_id, first_name, last_name and purpose are not blank
        $user_id = trim($_POST['userid']);
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);       
        $purpose = trim($_POST['purpose']);

        #echo "$user_id, $first_name, $last_name";
        try{
            if(strlen($purpose) == 0){
                throw new Exception("Oops!! Purpose was blank.", 1);                
            }
            elseif ((strlen($user_id) == 0) or (strlen($first_name)==0) or (strlen($last_name)==0)) {
                throw new Exception("Oops!! user_id or first name or last name left blank", 1);                
            }

            #check for user_id and first, last name in database:
            $result = mysqli_query($con, "SELECT first_name, last_name FROM user_info WHERE user_id = $user_id;") or die ("Unabel to search in user_info. <br/> Error : ".mysqli_error($con));            
            if(mysqli_num_rows($result) == 1){
                $row = $result->fetch_object();
                if(($row->first_name == $first_name) and ($row->last_name == $last_name)){
                    #Add visitor in temporary_update_info
                    mysql_query($con, "INSERT INTO temporary_update_info(user_id, mobile_number, occupation)
                    VALUES($user_id, $first_name, $last_name)")  or die("Unabel to add in temporary_update_info <br/> Error : ".mysqli_error($con));
                    echo "Visitor marked for updation";  

                    #Generate token i.e, nsertion in visit_detail table                
                    $result->close;        //free above result set
                    mysqli_query($con,"INSERT INTO visit_details(user_id, baithak_id, purpose_id)
                    VALUES ('".$userid."', 'bi1', 1)") or die("Unabel to add visitor. <br/> Error : ".mysqli_error($con));
                    #echo "Visitor added!<br/>";
        
                    #fetching new/last added sno and giving it as token to this particular bhkat.
                    $result = mysqli_query($con,"SELECT sno FROM visit_details ORDER BY sno DESC LIMIT 1") or die("Unabel to fetch Generated Token <br/> Error : ".mysqli_error($con));
                    $visitor = $result->fetch_object();
                    echo "Generated Token number is <b>".$visitor->sno."</b><br/>";                   
                }
                else{
                    throw new Exception("Oops!! $user_id name didn't match. Please try again.", 1);                    
                }
            }
            else{
                throw new Exception("result is not one row; Some problem in userid.<br/>Please try again.", 1);
                
            }

        }catch (Exception $e){
            echo 'Caught Problem: ',  $e->getMessage(), "\n";
        }
        /*finally {
            #$result -> close;
            $con -> close;
            echo "<br/><a href='./index.php'> Back to previous page ";
        }*/
        $con -> close;
        echo "<br/><a href='./index.php'> Back to previous page ";

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