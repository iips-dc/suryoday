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
$sqldonation="SELECT * from user_info inner join donation on user_info.user_id =donation.user_id";
$donationresult=mysqli_query($con , $sqldonation) or die('Error'.mysqli_error($con));
              

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
     '<h3><center>Donation received in Kind</center></h3>'.         

/*Donation Table */


        $html.='<table width="100%" border="1px">'.
        '<tr><th>Date</th><th>Name of Donor</th><th>Address</th><th>Contact No.</th><th>Donation</th><th>Quantity</th></tr>';
        while($donationrow = mysqli_fetch_array($donationresult)){
            $fname=$donationrow['first_name'];
            $mname=$donationrow['middle_name'];
            $lname=$donationrow['last_name'];
            $name=$fname+$mname+$lname;
            $contact=$donationrow['mobile_no'];
            $donation=$donationrow['amount'];
            $start_address=$donationrow['start_address'];
            $area_locality_tehsil_taluka=$donationrow['area_locality_tehsil_taluka'];
            $district_city=$donationrow['district_city'];
            $country_state=$donationrow['country_state'];
            $pincode=$donationrow['pincode'];
            $address=$start_address+$area_locality_tehsil_taluka+$district_city+$country_state+$pincode;
            $donation_date=$donationrow['date_of_donation'];
            $quantity=$donationrow['quantity'];

        $html .='<<tr><th>'.$donation_date.' </th> <th>'.$name.'</th><th>'.$address.'</th><th>'.$contact.'</th><th>'.$donation.'</th> <th>'.$quantity.'</th></tr>';}      

        $html.='</body></html>'; 
                
$dompdf = new DOMPDF();
$dompdf->load_html($html);

$dompdf->render();
$dompdf->stream("Donation.pdf");

}
else{
        include '../../includes/login/login_form.inc.php' ;
    }

?>

