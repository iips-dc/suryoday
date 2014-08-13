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
    <style>
    #filter {
    	background-color: #EFEFEF;
    	width: 280px;
    	padding-left: 10px;
    	margin: 5px 5px 0 5px;
    	/*border: 1px solid #808080;*/
    }
    #filter_container {
    	border-right: 3px solid #808080;
    }
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
             	<div class="row">
             		<div class="col-lg-3" id="filter_container">
             		<strong>Filter results</strong>
             			<form action="" method="post">
             				<div id="filter">
             					<strong>Name: </strong> <br>
             					<input type="text" name="name" placeholder="Ram" id="name" 
                                    data-dojo-type="dijit/form/TextBox"/>
                                <input type="submit" name="name_sub" value="Go" label="Go" id="name_sub"
                                    data-dojo-type="dijit/form/Button" />
             				</div>
             				<div id="filter">
             					<strong>Phone number: </strong> <br>
             					<input type="text" name="phone_no" placeholder="1264537" id="phoneNo" 
                                    data-dojo-type="dijit/form/TextBox"/>
                            </div>
             				<div id="filter">
             					<strong>Location: </strong> <br>
             					<select name="loc_name" id="locName" data-dojo-type="dijit/form/FilteringSelect">
                                    <option value="">Select a Location</option>
                                    <option value="abc">Indore</option>
                                    <option value="xyz">Ujjain</option>
                                    <option value="pqr">Pqr</option>
                                </select>
                                <input type="submit" name="loc_sub" value="Go" label="Go" id="loc_sub"
                                    data-dojo-type="dijit/form/Button" />
             				</div>
             				<div id="filter">
             					<strong>Age: </strong> <br>
             					<input type="checkbox" name="age" value="0-15">0-15<br>
								<input type="checkbox" name="age" value="15-30">15-30<br>
								<input type="checkbox" name="age" value="30-45">30-45<br>
								<input type="checkbox" name="age" value="45-60">45-60<br>
								<input type="checkbox" name="age" value="60-75">above 75<br>
							</div>
							<div id="filter">
             					<strong>Baithak: </strong> <br>
             					<input type="text" name="baithak_date" id="baithakDate" value="2005-12-30"
    							data-dojo-type="dijit/form/DateTextBox"/>
    						</div>
    						<div id="filter">
             					<strong>Profession: </strong> <br>
             					<select name="Profession" id="profession" data-dojo-type="dijit/form/FilteringSelect" required="true">
                                    <option value="">Select a profession</option>
                                    <option value="abc">doctor</option>
                                    <option value="xyz">engineer</option>
                                    <option value="pqr">Pqr</option>
                                </select>
               				</div>
               				<div id="filter">
             					<strong>Birthday: </strong> <br>
             					<input type="text" name="birthday" id="birthday" value="2005-12-30"
    							data-dojo-type="dijit/form/DateTextBox"/>
    						</div>
    						<div id="filter">
             					<strong>Anniversary: </strong> <br>
             					<input type="text" name="anniversary" id="anniversary" value="2005-12-30"
    							data-dojo-type="dijit/form/DateTextBox"/>
    						</div>
             			</form>
             		</div>
             	</div>
            </div> 
        
            <!-- Bottom Region of Layout -->
            <div dojoType="dijit.layout.ContentPane" region="bottom" splitter="true"> 
                &copy; Suryoday Trust . <span style="float:right">Powered By <a  href="#">Developement Center</a> </span>
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