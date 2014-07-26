<h1> Yup </h1>
<?php
	include("assests/orm/RedBeanPHP4_0_5/rb.phar");
	echo "inside php";
    R::setup('mysql:host=localhost;dbname=suryoday_db',
        'root','root');
    /*$baithak = R::dispense('baithak');

    #$baithak->baithak_id = 2;
    $baithak->baithak_date = '2014-12-05';
    $baithak->baithak_time = '19:00:00';
    $baithak->baithak_location = 'Indore';
    $baithak->baithak_state = 'MP';
    $baithak->baithak_status = 'done';
    $baithak->baithak_remark = 'djfh';

    $id = R::store($baithak);
    */echo "inserted";
    echo R::load( 'baithak', 1).'<br>'; 
    echo R::findAll( 'user_info' ).'<br>';
    echo R::getAll('select * from user_info');
    #echo R::load( 'visit_details', 1 ).'<br>';
    $a = R::find( 'user_info', ' title LIKE ? ', [ 'Praveen' ] );
    echo $a['userid'];
    print_r($a);
    echo sizeof($a)

?>
<br> ends!