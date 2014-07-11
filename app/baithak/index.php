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
                    <div data-dojo-type="dijit/layout/ContentPane" title="Token Generation" selected="true" id="tokenGeneration">

                        <!-- Form for Token Geneeration -->
                        <form action="generate_token.php" method="get">
                            <pre>
                                <!-- text inputs:  dijit/form/TextBox -->
                                <strong>Userid: </strong>           <input type="text" name="userid" placeholder="userid" id="userid"
                                    data-dojo-type="dijit/form/TextBox"/>      <input type="submit" value="Find Visitor" label="Find Visitor" id="findVisitorButton"
                                    data-dojo-type="dijit/form/Button" /><br/>
                                 
                                <strong>First Name:  </strong>      <input type="text" name="firstName" placeholder="John" id="firstName"
                                    data-dojo-type="dijit/form/TextBox" required="true" data-dojo-props='missingMessage:"Ooops! You forgot first name!"' /> <br/>
            
                                <strong>Last Name: </strong>        <input type="text" name="lastName" placeholder="Smith" id="lastName"
                                    data-dojo-type="dijit/form/TextBox" required="true" data-dojo-props='missingMessage:"Ooops! You forgot last name!"' /> <br/>
            
                                <strong>Contact Number: </strong>   <input type="text" name="contactNumber" placeholder="98267594100" id="contactNumber"
                                    data-dojo-type="dijit/form/TextBox" required="true" data-dojo-props="regExp:'[\\w]+', missingMessage:'Ooops! You forgot contact number!' " /> <br/>
            
                                <strong>Occupation: </strong>       <input type="text" name="occupation" placeholder="Student" id="occupation"
                                    data-dojo-type="dijit/form/TextBox" required="true" data-dojo-props='missingMessage:"Ooops! You forgot Occupation!"' /> <br/>

                                 <strong>Purpose: </strong>         <input type="text" name="purpose" placeholder="Darshan" id="purpose"
                                    data-dojo-type="dijit/form/TextBox" required="true" data-dojo-props='missingMessage:"Ooops! You forgot Purpose!"' /> <br/>
                            </pre>   
                                                     
                                <!-- submit button:  dijit/form/Button -->
                                <center>
                                <input type="submit" value="Generate Token" label="Generate Token" id="generateTokenButton"
                                    data-dojo-type="dijit/form/Button" />
            
                                <input type="submit" value="Register" label="Register" id="registerButton"
                                    data-dojo-type="dijit/form/Button" />   
            
                                <input type="submit" value="Update Information" label="Update Information" id="updateInformationButton"
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

                                <strong>Remark: </strong>           <input type="text" name="remark" placeholder="to be done urgently!" id="remark"
                                    data-dojo-type="dijit/form/Textarea"/> <br/>                           
                                <!-- submit button:  dijit/form/Button -->
                                <center>
                                <input type="submit" value="Upay Submit" label="Submit" id="upaySubmit"
                                    data-dojo-type="dijit/form/Button" />
                                </center>                     
                             </pre>                          
                        </form><!-- form for Upay ends -->
                    </div>

                    <!-- Donation tab bigins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Donation">
                        <!-- Form for Donation begins -->
                        <form action="donation.php" method="get">
                            <pre>
                                <!-- text inputs:  dijit/form/TextBox -->
                                <strong>Tokenid: </strong>          <input type="text" name="tokenid" placeholder="tokenid" id="tokenid"
                                    data-dojo-type="dijit/form/TextBox" required="true" data-dojo-props='missingMessage:"Ooops! You forgot tokenid"'/>                                 
                                <!-- radio buttons:  dijit/form/RadioButton -->
                                <strong>For Project: </strong>      <input type="radio" id="forProject" name="project" checked="checked"
                                    data-dojo-type="dijit/form/RadioButton" />  <label for="radio1">Yes</label>  <input type="radio" id="notForProject" name="project"
                                    data-dojo-type="dijit/form/RadioButton" />  <label for="radio2">No</label>

                                <strong>Type: </strong>             <input type="radio" id="typeKind" name="donationType" checked="checked"
                                    data-dojo-type="dijit/form/RadioButton" />  <label for="radio1">Kind</label>  <input type="radio" id="typeCash" name="donationType"
                                    data-dojo-type="dijit/form/RadioButton" />  <label for="radio2">Cash</label>                                                   
                                
                                <strong>DD/Check Number: </strong>  <input type="text" name="ddCheckNumber" placeholder="45203965" id="ddCheckNumber"
                                    data-dojo-type="dijit/form/TextBox" disabled="true" /> 

                                <strong>Amount </strong>            <input type="text" name="amount" placeholder="9000" id="amount"
                                    data-dojo-type="dijit/form/TextBox" disabled="true"/> Rs.

                                <strong>PAN Number: </strong>       <input type="text" name="panNumber" placeholder="45203965" id="panNumber"
                                    data-dojo-type="dijit/form/TextBox" disabled="true"/> 

                                <strong>Value: </strong>            <input type="text" name="kindvalue" placeholder="Rice" id="kindValue"
                                    data-dojo-type="dijit/form/TextBox"/> 

                                <strong>Quantity: </strong>         <input type="text" name="kindquantity" placeholder="45203965" id="kindQuantity"
                                    data-dojo-type="dijit/form/TextBox"/> 
                                <!-- Drop down list:  dijit/form/FilteringSelect -->
                                <strong>Received By: </strong>      <select name="receivedBy" id="receivedBy" data-dojo-type="dijit/form/FilteringSelect">
                                    <option value="">Select a member</option>
                                    <option value="abc">Abc</option>
                                    <option value="xyz">Xyz</option>
                                    <option value="pqr">Pqr</option>
                                </select>

                                <strong>Remark: </strong>           <input type="text" name="remark" placeholder="to be used for xyz!" id="remark"
                                    data-dojo-type="dijit/form/Textarea"/>                          

                                <strong>Details: </strong>          <input type="text" name="details" placeholder="" id="details"
                                    data-dojo-type="dijit/form/Textarea"/>                         
                                <!-- submit button:  dijit/form/Button -->
                            
                                <input type="submit" value="Donation Submit" label="Submit" id="donationSubmit"
                                    data-dojo-type="dijit/form/Button" />
                                                  
                             </pre>                          
                        </form> <!-- Donation Form ends -->
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

     <!-- Donation form GUI part as per cash/kind     -->
     
     
     //document.getElementById("typeCash").onselect=function(){document.getElementById('panNumber').disabled = true;}
     document.getElementById("typeKind").onclick=function(){
        document.getElementById('kindValue').disabled = false;
        document.getElementById('kindQuantity').disabled = false;

        document.getElementById('panNumber').disabled = true;
        document.getElementById('amount').disabled = true;
        document.getElementById('ddCheckNumber').disabled = true;
    }

    document.getElementById("typeCash").onclick=function(){
        document.getElementById('panNumber').disabled = false;
        document.getElementById('amount').disabled = false;
        document.getElementById('ddCheckNumber').disabled = false;

        document.getElementById('kindValue').disabled = true;
        document.getElementById('kindQuantity').disabled = true;
    }

     </script>

    <?php
        } #End of LoggedIn function
        else{
            include 'includes/login/login_form.inc.php' ;
        }
    ?>


</body>
</html>