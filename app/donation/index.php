<!-- Including files for DB connection and Session Control -->
<?php
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday | Donation</title>
    
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
                    
                    <!-- Tab for project donation begin -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Project" selected="true" id="projectDonation">
                        <!-- Form for Donation begins -->
                        <form action="donation.php" method="get">
                        <pre>
                        <!-- text inputs: dijit/form/TextBox -->
                        <strong>Tokenid: </strong>          <input type="text" name="tokenid" placeholder="tokenid" id="tokenid"                        
                        data-dojo-type="dijit/form/TextBox" required="true" data-dojo-props='missingMessage:"Ooops! You forgot tokenid"'/>
                        <!-- radio buttons: dijit/form/RadioButton -->                                            
                        <strong>Type: </strong>             <input type="radio" id="typeKind" name="donationType" checked="checked"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio1">Kind</label> <input type="radio" id="typeCash" name="donationType"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio2">Cash</label>
                        
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
                        <!-- Drop down list: dijit/form/FilteringSelect -->
                        <strong>Received By: </strong>      <select name="receivedBy" id="receivedBy" data-dojo-type="dijit/form/FilteringSelect">
                        <option value="">Select a member</option>
                        
                        <option value="pqr">Pqr</option>
                        </select>
                        
                        <strong>Remark: </strong>           <input type="text" name="remark" placeholder="to be used for xyz!" id="remark"
                        data-dojo-type="dijit/form/Textarea" rows="2" cols="50"/>
                        
                        <strong>Details: </strong>          <input type="text" name="details" placeholder="" id="details"
                        data-dojo-type="dijit/form/Textarea" rows="2" cols="50"/>
                        <center>
                        <!-- submit button: dijit/form/Button -->
                        <input type="submit" value="Donation Submit" label="Submit" id="donationSubmit"
                        data-dojo-type="dijit/form/Button" />
                        </center>
                        </pre>
                        </form> <!-- Donation Form ends -->
                        
                    </div> <!-- project donation Tab ends -->

                    <!-- Trust donation tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Trust" id='trustDonation'>
                        
                    </div><!-- Trust donation tab ends -->
                    <!-- Tab for offrings begin -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Offring" selected="true" id="offring">

                        
                    </div> <!-- offrings Tab ends -->


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