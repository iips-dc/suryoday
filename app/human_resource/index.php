<!-- Including files for DB connection and Session Control -->
<?php
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';

    if (isset($_POST['insertPurpose'])) {
        # code...
        $purpose_id = $_POST['purpose_id'];
        $purpose_name = $_POST['purpose_name'];

        $query = mysqli_query($con, "INSERT INTO `purpose`(`purpose_id`, `purpose_name`) VALUES ('$purpose_id','$purpose_name')");
        echo '<script>alert("Purpose Inserted Successfully!");</script>';    
    }
    elseif (isset($_POST['updatePurpose'])) {
        $purpose_id = $_POST['purpose_id'];
        $purpose_name = $_POST['purpose_name'];

        $query = mysqli_query($con, "UPDATE `purpose` SET `purpose_name`='$purpose_name' WHERE 'purpose_id'='$purpose_id'");
        echo '<script>alert("Edited Successfully!");</script>';
    }

?>
<!-- /End of includes -->

<html>
<head>
    <meta charset="utf-8">
    <title>Suryoday | Human Resource</title>
    
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
                    <!-- Add User tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Add User" selected="true" id="addUser">

                        <!-- Form for Add User-->
                        <form action="addUser.php" method="get">
                            <pre>
                                <!-- text inputs:  dijit/form/TextBox -->
                                <strong>E-mail adress: </strong>   <input type="text" name="emailAdress" placeholder="abc@example.com" id="emailAdress"
                                    data-dojo-type="dijit/form/TextBox"/>  
                            </pre>    
                                <center>
                                <input type="submit" value="Add" label="Add" id="addButton"
                                    data-dojo-type="dijit/form/Button" />   
                                </center>              
                        </form><!-- form for addUser ends -->
                        
                    </div> <!-- addUser Tab ends -->

                    <!-- Review User tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Review User">
                        <!-- Form for Upay -->
                        <form action="reviewUser.php" method="get">
                            <pre>   
                                <!-- text inputs:  dijit/form/TextBox -->
                                <strong>E-mail adress: </strong>  <input type="text" name="emailAdress" placeholder="abc@example.com" id="emailAdress"
                                    data-dojo-type="dijit/form/TextBox"/>                                                     
                                <!-- Drop down list:  dijit/form/FilteringSelect -->
                                <strong>User Type: </strong>      <select name="userType" id="userType" data-dojo-type="dijit/form/FilteringSelect" required="true">
                                    <option value="">Select User type</option>
                                    <option value="abc">PR</option>
                                    <option value="xyz">Data Entry Operator</option>
                                    <option value="pqr">HR</option>
                                </select>
                            </pre>
                                <!-- submit button:  dijit/form/Button -->
                                <center>
                                <input type="submit" value="Permit" label="Permit" id="erviewUser"
                                    data-dojo-type="dijit/form/Button" />
                                </center>                                                                     
                        </form><!-- form for Upay ends -->
                    </div>

                    <!-- Profiles tab bigins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Profiles">
                        <!-- Form for Profiles begins -->
                        <form action="profiles.php" method="get">
                            <pre>
                               User1    -------|
                               User2    -------|
                               User3    -------|
                               User4    -------|
                               User5    -------|
                             </pre>                          
                        </form> <!-- Profiles Form ends -->
                    </div>

                    <!-- Shout Box tab -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Shout Box">
                        <pre> Coming Soon!!!</pre>
                    </div> <!-- Shout Box tab ends. -->

                    <!-- Employee List tab -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Employee List">
                         <center>
            

                            <button data-dojo-type="dijit.form.Button" type="button" id="items">Employee List
                            <script type="dojo/connect" data-dojo-event="onClick">
                                window.location = "employee_list_report.php";
                            </script>
                            </button>

                        </center>
                    </div> <!-- Employee List tab ends. -->

                    <!-- Occupation entry tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Register Occupation" id="registerOccupation">
                        <!-- form for registering occupation -->
                        <form action="add_occupation.php" method="post">
                            <pre>

                                <strong>Occupation level one : </strong>          <input type="text" name="occupation_level_one" placeholder="occupation level one name" id="occupationLevelOne"
                                    data-dojo-type="dijit/form/TextBox" />

                                <strong>Occupation level two : </strong>          <input type="text" name="occupation_level_two" placeholder="occupation level two name" id="occupationLevelTwo"
                                    data-dojo-type="dijit/form/TextBox" />

                                <strong>Occupation level three : </strong>        <input type="text" name="occupation_level_three" placeholder="occupation level three name" id="occupationLevelThree"
                                    data-dojo-type="dijit/form/TextBox" />
                                
                                <!--<strong>Organization : </strong>                  <input type="text" name="organization" placeholder="organization name" id="organization"
                                    data-dojo-type="dijit/form/TextBox" />
                                -->    
                                <center>
                                <input type="submit" value="Submit" label="Submit" name="submit" id="addOccupationOrganization" data-dojo-type="dijit/form/Button" />
                                </center>
                            </pre>
                        </form>

                    </div> <!-- Occupation entry form ends. -->

                    <!-- Organization entry tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Register Organization " id="registerOrganization">
                        <!-- form for registering organization -->
                        <form action="add_organization.php" method="post">
                            <pre>

                                <strong>Name : </strong>                <input type="text" name="org_name" placeholder="Name" id="organizationName"
                                    data-dojo-type="dijit/form/TextBox" />

                                <strong>Address : </strong>             <input type="text" name="org_address" placeholder="Address" id="organizationAddress"
                                    data-dojo-type="dijit/form/TextBox" />

                                <strong>Area/Locality : </strong>       <input type="text" name="org_area" placeholder="Area/Locality" id="organizationAreaLocality"
                                    data-dojo-type="dijit/form/TextBox" />

                                <strong>City : </strong>                <input type="text" name="org_city" placeholder="City" id="organizationCity"
                                    data-dojo-type="dijit/form/TextBox" />
                                
                                <strong>State : </strong>               <input type="text" name="org_state" placeholder="State" id="organizationState"
                                    data-dojo-type="dijit/form/TextBox" />
                                
                                <strong>Country : </strong>             <input type="text" name="org_country" placeholder="Country" id="organizationCountry"
                                    data-dojo-type="dijit/form/TextBox" />    
                                
                                <strong>Contact Number : </strong>      <input type="text" name="org_contact_number" placeholder="contact number" id="organizationContactNumber"
                                    data-dojo-type="dijit/form/TextBox" />

                                <center>
                                <input type="submit" value="Submit" label="Submit" name="submit" id="addOrganization" data-dojo-type="dijit/form/Button" />
                                </center>
                            </pre>
                        </form>

                    </div> <!-- Organization entry form ends. -->

                    <!-- Department entry tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Register Department" id="registerDepartment">
                        <!-- form for registering Department -->
                        <form action="add_department.php" method="post">
                            <pre>

                                <strong>Name : </strong>                <input type="text" name="department_name" placeholder="Name" id="departmentName"
                                    data-dojo-type="dijit/form/TextBox" />

                                <strong>Objective : </strong>           <input type="text" name="department_objective" placeholder="Objective" id="departmentObjective"
                                    data-dojo-type="dijit/form/TextBox" />

                                <center>
                                <input type="submit" value="Submit" label="Submit" name="submit" id="addDepartment" data-dojo-type="dijit/form/Button" />
                                </center>
                            </pre>
                        </form>

                    </div> <!-- Department entry form ends. -->

                    <!-- Designation entry tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Register Designation" id="registerDesignation">
                        <!-- form for registering Designation -->
                        <form action="add_designation.php" method="post">
                            <pre>

                                <strong>Name : </strong>                <input type="text" name="designation_name" placeholder="Name" id="designationName"
                                    data-dojo-type="dijit/form/TextBox" />

                                <strong>Roles : </strong>               <input type="text" name="designation_roles" placeholder="Roles" id="designationRoles"
                                    data-dojo-type="dijit/form/TextBox" />

                                <center>
                                <input type="submit" value="Submit" label="Submit" name="submit" id="addDesignation" data-dojo-type="dijit/form/Button" />
                                </center>
                            </pre>
                        </form>

                    </div> <!-- Designation entry form ends. -->

                     <!-- Employee tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Employee " id="employee">
                        <!-- Inner Tabs for Registration and Updataion of Employee begins-->
                        <div data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region:'center', tabStrip:true">
                            <div data-dojo-type="dijit/layout/ContentPane" title="Register" selected="true">
                                <!-- form for registering employee -->
                                <form action="insert.php" method="post">
                                    <pre>
                                        <!-- text inputs:  dijit/form/TextBox -->
                                        <strong>Userid: </strong>          <input type="text" name="userid" id="userid"
                                            data-dojo-type="dijit/form/TextBox"/><br>

                                        <strong>Department:</strong>       <select name="select" data-dojo-type="dojox.form.DropDownSelect">
                                           <option value="iips">IIPS</option>
                                           <option value="ims">IMS</option>
                                           <option value="soc">SOC</option>
                                           <option value="emrc">EMRC</option>
                                           <option value=""></option>
                                           </select><br>

                                        <strong>Designation:</strong>      <select name="select" data-dojo-type="dojox.form.DropDownSelect">
                                         <option value="director">Director</option>
                                         <option value="hod">HOD</option>
                                         <option value="bf">Batch Facilitator</option>
                                         <option value=""></option>
                                         <option value=""></option>
                                        </select><br>

                                        <strong>Working Location: </strong><input type="text" name="userid" id="userid"
                                            data-dojo-type="dijit/form/TextBox"/><br>

                                        <strong>Date Of Joining:</strong>  <input type="text" name="date_of_joining" placeholder="2014-12-01" id="employeeJoiningDate" value="2005-12-30" constraints="{datePattern:'yyyy-MM-dd', strict:true}" data-dojo-type="dijit/form/DateTextBox" required="true"/>

                                        <strong>Paid:</strong>             <input dojoType="dijit.form.RadioButton" id="val1" name="group1" 
                                        checked="checked" value="yes" type="radio" /><label for="val1"> Yes </label><input dojotype="dijit.form.RadioButton" id="val2"  name ="group1" value="no" type="radio"/><label for="val2"> No </label>

                                                        
                                                        <button data-dojo-type="dijit/form/Button" type="submit" name="submitButton" value="Submit">Register</button>
                                                       

                                                            
                                    </pre>                                        
                                </form>
                            </div> <!-- Tab for registration ends. -->

                            <div data-dojo-type="dijit/layout/ContentPane" title="Update" >
                                <!-- form for updating employee -->
                                <form action="update.php" method="post">
                                    <pre>
                                        <!-- text inputs:  dijit/form/TextBox -->
                                        <strong>Userid: </strong>          <input type="text" name="userid" id="userid"
                                            data-dojo-type="dijit/form/TextBox"/><br>

                                        <strong>Department:</strong>       <select name="select" data-dojo-type="dojox.form.DropDownSelect">
                                           <option value="iips">IIPS</option>
                                           <option value="ims">IMS</option>
                                           <option value="soc">SOC</option>
                                           <option value="emrc">EMRC</option>
                                           <option value=""></option>
                                           </select><br>

                                        <strong>Designation:</strong>      <select name="select" data-dojo-type="dojox.form.DropDownSelect">
                                         <option value="director">Director</option>
                                         <option value="hod">HOD</option>
                                         <option value="bf">Batch Facilitator</option>
                                         <option value=""></option>
                                         <option value=""></option>
                                        </select><br>

                                        <strong>Working Location: </strong><input type="text" name="userid" id="userid"
                                            data-dojo-type="dijit/form/TextBox"/><br>

                                        <strong>Date Of Leaving:</strong>  <input type="text" name="date_of_leaving" placeholder="2014-12-01" id="employeeJoiningDate" value="2005-12-30" constraints="{datePattern:'yyyy-MM-dd', strict:true}" data-dojo-type="dijit/form/DateTextBox" />

                                        <strong>Paid:</strong>             <input dojoType="dijit.form.RadioButton" id="val1" name="group1" 
                                        checked="checked" value="yes" type="radio" /><label for="val1"> Yes </label><input dojotype="dijit.form.RadioButton" id="val2"  name ="group1" value="no" type="radio"/><label for="val2"> No </label>

                                                        
                                                        <button data-dojo-type="dijit/form/Button" type="submit" name="submitButton" value="Submit">Update</button>
                                                       

                                                            
                                    </pre>                                        
                                </form>
                            </div> <!-- Tab for updation ends. -->
                        </div> <!-- Inner tabs for employee registration and updation ends. -->
                    </div> <!-- Employee ends. -->

                    <!-- Purpose tab begins -->
                    <div data-dojo-type="dijit/layout/ContentPane" title="Purpose" id="purpose">
                        
                    <!-- Inner Tabs for Purpose-->
                        <div data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region:'center', tabStrip:true">
                            <div data-dojo-type="dijit/layout/ContentPane" title="Purpose List" selected="true">
                                <!-- List of purpose -->
                                    <pre>
                                        <table border="5px">
                                            <tr>
                                                <th>Purpose Id</th>
                                                <th>Purpose Name</th>
                            
                                            </tr>
                                            <?php
                                                $result = mysqli_query($con, "SELECT * FROM `purpose`");
                                                
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    # code...
                                                    echo "<tr>
                                                        <td> ".$row['purpose_id']. " </td>
                                                        <td> ".$row['purpose_name']. " </td>
                                                    </tr>";
                                                }
                                                if (mysqli_num_rows($result) == NULL) {
                                                    # code...
                                                    echo "<tr>
                                                            <td>No purpose entry.</td>
                                                    </tr>";
                                                }
                                                
                                            ?>
                                        </table>                                                                           
                                    </pre>                                        
                            </div> <!-- Tab for purpose list ends. -->

                            <div data-dojo-type="dijit/layout/ContentPane" title="Add new purpose">
                                <!-- form for inserting purpose -->
                                <form action="#" method="post">
                                    <pre>
                                        <strong> Purpose Id :       <input type="text" name="purpose_id" id="purposeId"
                                        data-dojo-type="dijit/form/TextBox"> <br>
                                        <strong> Purpose Name :     <input type="text" name="purpose_name" id="purposeName"
                                        data-dojo-type="dijit/form/TextBox"> <br> 

                                                <button type="submit" name="insertPurpose" value="Insert" data-dojo-type="dijit/form/Button">Insert</button>                           
                                    </pre>                                        
                                </form>
                            </div> <!-- Tab for inserting purpose ends. -->

                            <div data-dojo-type="dijit/layout/ContentPane" title="Update Purpose">
                                <!-- form for updating purpose -->
                                <form action="#" method="post">
                                    <pre>
                                        <strong> Purpose Id :       <input type="text" name="purpose_id" id="purposeId"
                                        data-dojo-type="dijit/form/TextBox"> <br>
                                        <strong> Purpose Name :     <input type="text" name="purpose_name" id="purposeName"
                                        data-dojo-type="dijit/form/TextBox"> <br> 

                                                <button type="submit" name="updatePurpose" value="Update" data-dojo-type="dijit/form/Button">Update</button>                           
                                    </pre>                                        
                                </form>
                            </div> <!-- Tab for updating purpose ends. -->
                        
                    </div>
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

        //code to open page with desired tab selected by default:
        dojo.ready(function(var tab) {
            dijit.byId('tabContainer').selectChild(dijit.byId(tab));
            );

        function editme()
        {
            document.getElementsById('editme').style.ba='red';
            //alert('');
            //editme.style.background-color='red';
        }
        
        $(document).ready()
        {
        
            $( "#submitbutton" ).click(function() {
            
            
                $('.editme').removeAttr('style');
                $('.editme').removeAttr('disabled');
                $('#submitbutton').removeAttr('style');
                
            
            });
          
       }
     </script>

    <?php
        } #End of LoggedIn function
        else{
            include '../../includes/login/login_form.inc.php' ;
        }
    ?>


</body>
</html>
