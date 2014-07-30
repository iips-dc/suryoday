
<?php 
	$dr = $_SERVER["DOCUMENT_ROOT"]; #output - /var/www/
	
	$fp = realpath(dirname(__FILE__));  #output -  /var/www/ck/ck-management
	$new  = explode($dr, $fp); # parting the path in two parts 
	$css_file_path = $fp. "/app/assets/_inc/cssLinks.inc.php";
	$js_file_path = $fp. "/app/assets/_inc/jsLinks.inc.php";
	#$PATH = "/" .basename(__DIR__) . "/" ;
	$PATH = $new[1]. "/" ;#output - /ck/ck-management/
	

?>