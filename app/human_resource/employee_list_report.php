
<?php

include '../../includes/login/core.inc.php';
include '../../includes/login/connect.inc.php';
require_once'../../lib/dompdf/dompdf_config.inc.php';
//Configuration for the absoulte path
include "../../config_global.php";   
// Core Css
#include "../../includes/cssLinks.inc.php";

?>

<?php 

if(loggedIn()){ #This function is in /includes/login/core.inc.pho for verfying user session
//Select donation form userinfo and donation table for finding the donation given by the user.
    
$sqlemployeelist="select * from employee_details  inner join user_info on employee_details.user_id= user_info.user_id inner join designation on employee_details.desig_id=designation.desig_id inner join department on employee_details.dept_id=department.dept_id";
$employeelistresult=mysqli_query($con , $sqlemployeelist) or die('Error'.mysqli_error($con));
    

  $html =
    '<html><head>
     <style>
     
     .center{
       text-align:center;
     }
     .strong{
       font-weight:bold;
     }
     table {
       width: 100%;
       border-collapse: collapse;
     }
     th, td {
       border: 1px solid #333;
     }
     </style>
      </head><body>'.
     '<h3><center>Employee List</center></h3>'.         
/*following query is used to get the information of all the employee*/
/*select * from employee_details  inner join user_info on employee_details.user_id= user_info.user_id inner join designation on employee_details.desig_id=designation.desig_id inner join department on employee_details.dept_id=department.dept_id */
        
        /*html code to display the list of employee*/
        $html.='<table width="100%" border="1px">'.
        '<tr><th>S.No.</th><th>Emp ID</th><th>Name</th><th>Contact No.</th><th>Department</th><th>Designation</th></tr>';
        while($employeelistrow = mysqli_fetch_array($employeelistresult)){
            $eid=$employeelistrow[emp_id];
            $fname=$employeelistrow[first_name];
            $mname=$employeelistrow[middle_name];
            $lname=$employeelistrow[last_name];
            $contact=$employeelistrow[mobile_no];
            $department=$employeelistrow[dept_name];
            $designation=$employeelistrow[desig_name];
            
            $sno=1;
            
            $html .='<tr><td>'.$sno.' </td> <td>'.$eid.'</td><td>'.$fname.' '.$mname.' '.$lname.'</td><td>'.$contact.'</td><td>'.$department.'</td> <td>'.$designation.'</td></tr>';     
        }
        $html.='</body></html>'; 
               
$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->render();
$dompdf->stream("Employee_List.pdf");

}
else{
        include '../../includes/login/login_form.inc.php' ;
    }

?>

