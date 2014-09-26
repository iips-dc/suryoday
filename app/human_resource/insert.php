<?php
    
    include '../../includes/login/core.inc.php';
    include '../../includes/login/connect.inc.php';

    $user_id = $_POST['user_id'];
    $dept_id = $_POST['dept_id'];
    $desig_id = $_POST['desig_id'];
    $working_location = $_POST['working_location'];
    $date_of_joining = $_POST['date_of_joining'];
    $date_of_leaving = $_POST['date_of_leaving'];
    $paid = $_POST['paid'];
    
    $checkUserIdQuery = "SELECT * FROM `user_info` WHERE `user_id` = '$user_id'"; 
    $checkQueryRun = mysqli_query($con, $checkUserIdQuery);
    $queryRow = mysqli_num_rows($checkQueryRun);
    
    if ($queryRow == 1) {
        # code...
        if(!empty($user_id)&& !empty($dept_id)&& !empty($desig_id)&& !empty($working_location)&& !empty($date_of_joining)&& !empty($date_of_leaving)&& !empty($paid))    
          {
            $query = "INSERT INTO `employee_details`(`user_id`, `emp_id`, `dept_id`, `desig_id`, `working_location`, `date_of_joining`, `date_of_leaving`, `paid`) VALUES ('$user_id', 'NULL', '$dept_id', '$desig_id', '$working_location', '$date_of_joining', '$date_of_leaving', '$paid')";
                
                if (mysql_query($query))
                {
                  echo "record has been inserted";
                }
                else
                {
                  mysql_error();
                }
           }
      }
    else {
      echo "<h3 text-align='center'> Invalid User id </h3>";
    }  
              
?>
    