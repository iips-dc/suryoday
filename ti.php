<h1> Yup </h1>
<?php
	require 'assests/orm/RedBeanPHP4_0_5/rb.php';
	echo "inside php";
    R::setup('mysql:host=localhost;dbname=suryoday_db',
        'root','root');

    echo R::load( 'baithak', 1 ).'<br>'; 
    echo R::findAll( 'user_info' ).'<br>';
    echo R::getAll('select * from user_info');
    echo R::load( 'visit_details', 1 ).'<br>';
    $a = R::find( 'user_info', ' title LIKE ? ', [ 'Praveen' ] );
    echo $a['userid'];
    print_r($a);
    echo sizeof($a)

?>
<br> ends!