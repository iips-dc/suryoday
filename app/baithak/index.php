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

                <!-- Vertical Left tabs begin -->             
                <div data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region:'center', tabStrip:true" tabPosition="left-h">
                    <!-- Tab for token generation begin -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Token Generation" selected="true" id="tokenGeneration">

                        <!-- Form for Token Geneeration -->
                        <form action="generate_token_submit.php" method="post">
                            <pre>
                                <!-- text inputs:  dijit/form/TextBox -->
                                <strong>Userid: </strong>           <input type="text" name="userid" placeholder="userid" id="userid"
                                    data-dojo-type="dijit/form/TextBox"/>      <input type="submit" value="Find Visitor" label="Find Visitor" id="findVisitorButton"
                                    data-dojo-type="dijit/form/Button" /><br/>
                                 
                                <strong>First Name:  </strong>      <input type="text" name="first_name" placeholder="John" id="firstName"
                                    data-dojo-type="dijit/form/TextBox"/> <br/>
            
                                <strong>Last Name: </strong>        <input type="text" name="last_name" placeholder="Smith" id="lastName"
                                    data-dojo-type="dijit/form/TextBox"/> <br/>
            
                                <strong>Mobile Number: </strong>   <input type="text" name="mobile_number" placeholder="98267594100" id="contactNumber"
                                    data-dojo-type="dijit/form/TextBox"/> <br/>
            
                                <strong>Occupation: </strong>       <input type="text" name="occupation" placeholder="Student" id="occupation"
                                    data-dojo-type="dijit/form/TextBox"/> <br/>

                                 <strong>Purpose: </strong>         <input type="text" name="purpose" placeholder="Darshan" id="purpose"
                                    data-dojo-type="dijit/form/TextBox"/> <br/>
                            </pre>   
                                                     
                                <!-- submit button:  dijit/form/Button -->
                                <center>
                                <input type="submit" name="generate_token" value="Generate Token" label="Generate Token" id="generateTokenButton"
                                    data-dojo-type="dijit/form/Button" />
            
                                <input type="submit" name="register" value="Register" label="Register" id="registerButton"
                                    data-dojo-type="dijit/form/Button" />   
            
                                <input type="submit" name="update_information" value="Update Information" label="Update Information" id="updateInformationButton"
                                    data-dojo-type="dijit/form/Button" />   
                                </center>              
                        </form><!-- form for tokenGeneration ends -->
                        
                    </div> <!-- tokenGeneration Tab ends -->

                    <!-- Upay tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Upay">
                        <!-- Form for Upay -->
                        <form action="upay.php" method="get">
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

                                <strong>Remark: </strong>           <input type="text" name="upay_remark" placeholder="to be done urgently!" id="upayRemark"
                                    data-dojo-type="dijit/form/Textarea"/> <br/>                           
                                <!-- submit button:  dijit/form/Button -->
                                <center>
                                <input type="submit" value="Upay Submit" label="Submit" id="upaySubmit"
                                    data-dojo-type="dijit/form/Button" />
                                </center>                     
                             </pre>                          
                        </form><!-- form for Upay ends -->
                    </div>

                    <!-- Registration and Updation tab -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Forms">
                        <!-- Inner Tabs for Registration and Updataion sepatrely begins-->
                        <div data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region:'center', tabStrip:true">
                            <div data-dojo-type="dijit/layout/ContentPane" title="Register" selected="true">
                                <h3> List of Bhakts yet to Register:</h3>
                                <form action="register.php" method="get">
                                    <input type="submit" value="registrationForms" label="Generate" id="registerationForms"
                                    data-dojo-type="dijit/form/Button" />
                                </form>
                            </div>
                            <div data-dojo-type="dijit/layout/ContentPane" title="Update">
                                <h3> List of Bhakts need to update information:</h3>
                                <form action="updateOccupation.php" method="get">
                                    <input type="submit" value="generateForms" label="Generate" id="generateForms"
                                    data-dojo-type="dijit/form/Button" />
                                </form>
                            </div>
                            
                        </div><!-- end Inner Tabs for Registration and Updataion sepatrely-->
                    </div> <!-- Registration and Updation tab ends. -->

                    <!-- Tab for new Baithak begin -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Add Baithak" id="addBaithak">

                        <!-- Form for Add Baithak -->
                        <form action="add_baithak.php" method="post">
                            <pre>
                                <!-- text inputs:  dijit/form/TextBox -->
                                <strong>Date: </strong>           <input type="text" name="baithak_date" placeholder="2/9/9" id="baithakDate"
                                    data-dojo-type="dijit/form/TextBox"/><br/>                                
                                <strong>Time:  </strong>          <input type="text" name="baithak_time" placeholder="2PM" id="time"
                                    data-dojo-type="dijit/form/TextBox"/> <br/>            
                                <strong>Location: </strong>       <input type="text" name="baithak_location" placeholder="Indore" id="location"
                                    data-dojo-type="dijit/form/TextBox"/> <br/>            
                                <strong>State: </strong>          <input type="text" name="baithak_state" placeholder="MP" id="state"
                                    data-dojo-type="dijit/form/TextBox"/> <br/>            
                                <strong>Head: </strong>           <select name="baithak_head" id="baithskHead" data-dojo-type="dijit/form/FilteringSelect" required="true">
                                    <option value="">Select a member</option>
                                    <option value="abc">Abc</option>
                                    <option value="xyz">Xyz</option>
                                    <option value="pqr">Pqr</option>
                                </select>

                                <strong>Remark: </strong>         <input type="text" name="baithak_remark" placeholder="vip are not coming" id="baithakRemark"
                                    data-dojo-type="dijit/form/Textarea"/> <br/>               
                            </pre>   
                                                     
                                <!-- submit button:  dijit/form/Button -->
                                <center>
                                <input type="submit" name="add" value="Add" label="Add" id="add"
                                    data-dojo-type="dijit/form/Button" />            
                                </center>              
                        </form><!-- form for Add Baithak ends -->
                        
                    </div> <!-- Add Baithak Tab ends -->

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