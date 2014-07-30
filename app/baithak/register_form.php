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
    <!-- css for form table -->
    <style type="text/css">
        .labelsAndValues-labelCell {
        background-color: lightgrey;
        padding-left: 5px;           
        }
        
        .labelsAndValues-valueCell {
        padding: 15px;
       /* padding-left: 20px;
        padding-top: 15px;*/
        background-color: lightblue;
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

             <form action="#" method="POST">
                <!-- dijit table used for layout of large form -->
                 <div data-dojo-type="dojox.layout.TableContainer" data-dojo-props="cols:6, customClass:'labelsAndValues'" id="formTable">
                         <div data-dojo-type="dijit.form.TextBox" title="Userid:" colspan="6" placeholder="45AB99" style="width:100%;"></div>

                         <!-- for name -->
                         <div data-dojo-type="dijit.form.TextBox" title="First Name:" colspan="2" name="first_name" id="firstName" placeholder="Tom"></div>
                         <div data-dojo-type="dijit.form.TextBox" title="Middle Name:" colspan="2" name="middle_name" id="middleName" placeholder="D"></div>
                         <div data-dojo-type="dijit.form.TextBox" title="Last Name:" colspan="2" name="last_name" id="lastName" placeholder="Clarke"></div>

                         <!-- for address -->
                        <div data-dojo-type="dijit.form.TextBox" title="Country:" colspan="2" name="country" id="country" placeholder="India"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="State:" colspan="2" name="state" id="state" placeholder="MP"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="City:" colspan="2" name="city" id="city" placeholder="Indore"></div>
                        <textarea data-dojo-type="dijit.form.Textarea" style="width:100%;" colspan="2" title="Area/Locality:" name="area_locality" id="areaLocality" placeholder="Bapat Square Near Vijay Nagar"> </textarea>
                        <textarea data-dojo-type="dijit.form.Textarea" style="width:100%;" colspan="2" title="Start Address:" name="start_address" id="startAddress" placeholder="109 Abc Apartment"> </textarea>
                        <div data-dojo-type="dijit.form.TextBox" title="Pincode" colspan="2" name="pincode" id="pincode" placeholder="452001"></div>

                        <!-- for contact details -->
                        <div data-dojo-type="dijit.form.TextBox" title="Mobile Number:" colspan="2" name="mobile_number" id="mobileNumber" placeholder="985632489"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Alt. Mobile Number:" colspan="2" name="alternate_mobile_number" id="alternateMonileNumber" placeholder="9898995689"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Landline Number:" colspan="2" name="landline_number" id="landlineNumber" placeholder="4520016"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="City Code:" colspan="2" name="city_code" id="cityCode" placeholder="0731"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Country Code:" colspan="2" name="country_code" id="countryCode" placeholder="91"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="FAX Number:" colspan="2" name="fax_number" id="faxNumber" placeholder="8945AB"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Email Address:" colspan="2" name="email_address" id="emailAddress" placeholder="abc@example.com"></div>

                        <!-- personal details -->
                        <div data-dojo-type="dijit.form.DateTextBox" title="Birth Date:" colspan="2" name="birth_date" id="birthDate" placeholder="2000-10-31"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Blood Group:" colspan="2" name="blood_group" id="bloodGroup" placeholder="B+ve"></div>
                        <div data-dojo-type="dijit.form.RadioButton" title="Male:" colspan="1" name="gender" id="genderMale" checked="checked"></div>
                        <div data-dojo-type="dijit.form.RadioButton" title="Female:" colspan="1" name="gender" id="genderFemale"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Father Name:" colspan="2" name="father_name" id="fatherName" placeholder=""></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Mother Name:" colspan="2" name="mother_name" id="motherName" placeholder=""></div>
                        <div data-dojo-type="dijit.form.CheckBox" title="Is Married" colspan="2" name="is_married" id="isMarried"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Spouse Name:" colspan="2" name="spouse_name" id="spouseName" placeholder=""></div>
                        <div data-dojo-type="dijit.form.DateTextBox" title="Anniversary Date:" colspan="2" name="anniversary_date" id="anniversaryDate" placeholder="yyyy-mm-dd"></div>

                        <!-- Other informations -->
                        <div data-dojo-type="dijit.form.CheckBox" title="Is Visitor" name="is_visitor" id="isVisitor"></div>
                        <div data-dojo-type="dijit.form.CheckBox" title="Is VIP" name="is_vip" id="isVip"></div>
                        <div data-dojo-type="dijit.form.TextBox" title="PAN Number:" colspan="2" name="pan_number" id="panNumber" placeholder=""></div>

                        <!-- Occupation details -->
                        <div data-dojo-type="dijit.form.TextBox" title="Occupation L1:" colspan="2" name="occupation_level1" id="occupationL1" placeholder=""></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Occupation L2:" colspan="2" name="occupation_level2" id="occupationL2" placeholder=""></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Occupation L3:" colspan="2" name="occupation_level3" id="occupationL3" placeholder=""></div>
                        <div data-dojo-type="dijit.form.TextBox" title="Organization:" colspan="2" name="organization" id="organization" placeholder=""></div>                  

                 </div> <!-- dijit table for form layout ends -->
                 <br/>
                 <center>
                <input type="submit" value="Register" label="Submit" name="register_details" id="registerDetails"
                    data-dojo-type="dijit/form/Button" />
                </center>                          
             </form>
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
    "dijit/DropDownMenu", "dijit/MenuItem", "dijit/layout/TabContainer", "dijit/form/RadioButton", 
    "dojo/domReady!", "dijit/form/Textarea", "dijit/form/DateTextBox" ]);
    dojo.require("dijit.dijit");
    dojo.require("dojox.layout.TableContainer");
    dojo.require("dijit.form.TextBox");
    dojo.require("dijit.form.CheckBox");
    dojo.require("dijit.form.Textarea");
    </script>
    <?php
        } #End of LoggedIn function
        else{
            include '../../includes/login/login_form.inc.php' ;
        }
    ?>


</body>
</html>