<?php
	ob_start();
	session_start();
	$currentFile = $_SERVER['SCRIPT_NAME'];
	$httpReferer = strval(isset($_SERVER['HTTP_REFERER'])); #It tells the name of the page we came from. We are using this to know the page name
	#from where the user clicked on the logout.
	function loggedIn(){
		if(!isset($_SESSION['username'])){
			return False; 
		}
		else{
			return True;
		}
	}
?>
