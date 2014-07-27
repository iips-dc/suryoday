<!-- Including files for DB connection and Session Control -->
<?php
    include 'includes/login/core.inc.php';
    include 'includes/login/connect.inc.php';
?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday | Donation</title>
    
    <!-- Configuration for the absoulte path -->
     <?php include "config_global.php";   ?>
    <!-- Core Css -->
    <?php include "includes/cssLinks.inc.php";   ?>

</head>
<body class="claro">
 
<?php 
    if(loggedIn()){ #This function is in /includes/login/core.inc.pho for verfying user session
?>

        <!-- Start of page's Border Layout  -->
        <div dojoType="dijit.layout.BorderContainer" style="width: 100%;height: 100%;"> 
            <div dojoType="dijit.layout.ContentPane" region="top" splitter="true"> 
               <?php include('includes/header.inc.php'); ?>
                <?php include('includes/menu_bar.inc.php'); ?>
            </div> 

            

            <!-- Center Region of layout -->
             <div dojoType="dijit.layout.ContentPane" id="content" region="center" splitter="true"> 

                <!-- Vertical Left tabs begin -->             
                <div data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region:'center', tabStrip:true" tabPosition="left-h">
                    
                    <!-- Tab for project donation begin -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Project" selected="true" id="projectDonation">
                        <!-- Form for Donation for project begins -->
                        <form action="donation_project.php" method="post">
                        <pre>
                        <!-- text inputs: dijit/form/TextBox -->
                        <strong>User Id: </strong>          <input type="text" name="userid" placeholder="userid" id="userid"                        
                        data-dojo-type="dijit/form/TextBox" required data-dojo-props='missingMessage:"Ooops! You forgot userid"'/>
                        
                        <strong>Project Name: </strong>     <select name="projectName" id="projectName" data-dojo-type="dijit/form/FilteringSelect" required data-dojo-props='missingMessage:"Ooops! You forgot project name"'>
                        <option value="-1">Select a project</option>
                        <?php
			
							$result = mysqli_query($con,"SELECT * FROM `project`");
							while ($row = mysqli_fetch_array($result)){
   								echo '<option value="'.$row["project_id"].'"> '.$row["project_name"].'</options>';
							}

						?>
                        </select>
                        <!-- radio buttons: dijit/form/RadioButton -->                                            
                         <strong>Type: </strong>             <input type="radio" id="typeKind" value="Kind" name="donationType" checked="checked"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio1">Kind</label> <input type="radio" id="typeCash" value="Cash" name="donationType"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio2">Cash</label>
                        
                        <strong>Kind of Cash: </strong>     <input type="radio" id="typeCheque" value="Cheque" name="cashType" checked="checked"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio1">Cheque</label> <input type="radio" id="typeDD" value="DD" name="cashType"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio2">DD</label> <input type="radio" id="typeMoney" value="Money" name="cashType"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio3">Cash</label>
                        
                        <strong>DD/Cheque Number: </strong> <input type="text" name="ddChequeNumber" placeholder="45203965" id="ddCheckNumber"
                        data-dojo-type="dijit/form/TextBox"  />
                        
                        <strong>Amount </strong>            <input type="text" name="amount" placeholder="9000" id="amount"
                        data-dojo-type="dijit/form/TextBox" /> Rs.
                        
                        <strong>PAN Number: </strong>       <input type="text" name="panNumber" placeholder="45203965" id="panNumber"
                        data-dojo-type="dijit/form/TextBox" />
                        
                        <strong>Value: </strong>            <input type="text" name="kindvalue" placeholder="Rice" id="kindValue"
                        data-dojo-type="dijit/form/TextBox"/>
                        
                        <strong>Quantity: </strong>         <input type="text" name="kindquantity" placeholder="45203965" id="kindQuantity"
                        data-dojo-type="dijit/form/TextBox"/>
                        <!-- Drop down list: dijit/form/FilteringSelect -->
                        <strong>Received By: </strong>      <select name="receivedBy" id="receivedBy" data-dojo-type="dijit/form/FilteringSelect" required data-dojo-props='missingMessage:"Ooops! You forgot Recieved by"'>
                        <option value="-1">Select a member</option>
                        <?php
			
							$result = mysqli_query($con,"SELECT * FROM `employee_details`");
							while ($row = mysqli_fetch_array($result)){
   								echo '<option value="'.$row["user_id"].'"> '.$row["emp_name"].'</options>';
							}

						?>
                        </select>
                        
                        <strong>Remark: </strong>           <input type="text" name="remark" placeholder="special remarks" id="remark"
                        data-dojo-type="dijit/form/Textarea"/>
                        
                        <strong>Usage Details: </strong>    <input type="text" name="useDetails" placeholder="to be used for xyz!" id="remark"
                        data-dojo-type="dijit/form/Textarea"/>
                        
                        <strong>Details: </strong>          <input type="text" name="details" placeholder="donation details" id="details"
                        data-dojo-type="dijit/form/Textarea"/>
                        <center>
                        <!-- submit button: dijit/form/Button -->
                        <input type="submit" value="Donation Submit" label="Submit" id="projectDonationSubmit" name="projectDonationSubmit"
                        data-dojo-type="dijit/form/Button" />
                        </center>
                        </pre>
                        </form> <!-- Donation Form ends -->
                        
                    </div> <!-- project donation Tab ends -->

                    <!-- Trust donation tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Trust" id='trustDonation'>
                    <!-- Form for Donation for trust begins -->
                        <form action="donation_trust.php" method="post">
                        <pre>
                        <!-- text inputs: dijit/form/TextBox -->
                        <strong>User Id: </strong>          <input type="text" name="userid" placeholder="userid" id="userid"                        
                        data-dojo-type="dijit/form/TextBox" required data-dojo-props='missingMessage:"Ooops! You forgot userid"'/>
                        <!-- radio buttons: dijit/form/RadioButton -->                                            
                        <strong>Type: </strong>             <input type="radio" id="typeKind" value="Kind" name="donationType" checked="checked"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio1">Kind</label> <input type="radio" id="typeCash" value="Cash" name="donationType"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio2">Cash</label>
                        
                        <strong>Kind of Cash: </strong>     <input type="radio" id="typeCheque" value="Cheque" name="cashType" checked="checked"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio1">Cheque</label> <input type="radio" id="typeDD" value="DD" name="cashType"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio2">DD</label> <input type="radio" id="typeMoney" value="Money" name="cashType"
                        data-dojo-type="dijit/form/RadioButton" /> <label for="radio3">Cash</label>
                        
                        <strong>DD/Cheque Number: </strong> <input type="text" name="ddChequeNumber" placeholder="45203965" id="ddCheckNumber"
                        data-dojo-type="dijit/form/TextBox"  />
                        
                        <strong>Amount </strong>            <input type="text" name="amount" placeholder="9000" id="amount"
                        data-dojo-type="dijit/form/TextBox" /> Rs.
                        
                        <strong>PAN Number: </strong>       <input type="text" name="panNumber" placeholder="45203965" id="panNumber"
                        data-dojo-type="dijit/form/TextBox" />
                        
                        <strong>Value: </strong>            <input type="text" name="kindvalue" placeholder="Rice" id="kindValue"
                        data-dojo-type="dijit/form/TextBox"/>
                        
                        <strong>Quantity: </strong>         <input type="text" name="kindquantity" placeholder="45203965" id="kindQuantity"
                        data-dojo-type="dijit/form/TextBox"/>
                        <!-- Drop down list: dijit/form/FilteringSelect -->
                        <strong>Received By: </strong>      <select name="receivedBy" id="receivedBy" data-dojo-type="dijit/form/FilteringSelect" required data-dojo-props='missingMessage:"Ooops! You forgot Recieved by"'>
                        <option value="-1">Select a member</option>
                        <?php
			
							$result = mysqli_query($con,"SELECT * FROM `employee_details`");
							while ($row = mysqli_fetch_array($result)){
   								echo '<option value="'.$row["user_id"].'"> '.$row["emp_name"].'</options>';
							}

						?>
                        </select>
                        
                        <strong>Remark: </strong>           <input type="text" name="remark" placeholder="special remarks" id="remark"
                        data-dojo-type="dijit/form/Textarea"/>
                        
                        <strong>Usage Details: </strong>    <input type="text" name="useDetails" placeholder="to be used for xyz!" id="remark"
                        data-dojo-type="dijit/form/Textarea"/>
                        
                        <strong>Details: </strong>          <input type="text" name="details" placeholder="donation details" id="details"
                        data-dojo-type="dijit/form/Textarea"/>
                        <center>
                        <!-- submit button: dijit/form/Button -->
                        <input type="submit" value="Donation Submit" label="Submit" id="trustDonationSubmit" name="trustDonationSubmit"
                        data-dojo-type="dijit/form/Button" />
                        </center>
                        </pre>
                        </form> <!-- Donation Form ends -->
                        
                        
                    </div><!-- Trust donation tab ends -->
                  
                </div><!-- Vertical Left tabs end -->
            </div> 
        
            <!-- Bottom Region of Layout -->
            <div dojoType="dijit.layout.ContentPane" region="bottom" splitter="true"> 
                &copy; Suryoday Trust . <span style="float:right">Powered By <a  href="#">Developement Center</a> </span>
            </div>
        </div>
            <!-- end of Border Layout Container -->   


    <?php include("includes/jsLinks.inc.php"); ?> 
    <?php include("includes/dojo_widgets.inc.php"); ?>

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