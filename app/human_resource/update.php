<?php          
    
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';
    $user_id = $_POST['user_id'];
    
    $checkUserIdQuery = "SELECT * FROM `user_info` WHERE `user_id` = '$user_id'"; 
    $checkQueryRun = mysqli_query($con, $checkUserIdQuery);
    $queryRow = mysqli_num_rows($checkQueryRun);      
            
    if ($queryRow == 1)
    {
       $dept_id = $_POST['dept_id'];
       $desig_id = $_POST['desig_id'];
       $working_location = $_POST['working_location'];
       $date_of_joining = $_POST['date_of_joining'];
       $date_of_leaving = $_POST['date_of_leaving'];
       $paid = $_POST['paid'];
       
       if(!empty($dept_id)&& !empty($desig_id)&& !empty($working_location)&& !empty($date_of_joining)&& !empty($date_of_leaving)&& !empty($paid))    
       {
  	      $query = "UPDATE `employee_details` SET `user_id`='$user_id',`emp_id`='$emp_id',`dept_id`='$dept_id',`desig_id`='$desig_id',`working_location`='$working_location',`date_of_joining`='$date_of_joining',`date_of_leaving`='$date_of_leaving',`paid`='$paid' WHERE `user_id` = '$user_id'";
          if(mysql_query($query))
          {
            echo "record has been updated!";
          }
          else
          {
            mysql_error();
          }
       }
      }
?>