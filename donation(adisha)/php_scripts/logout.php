<?php
	require '../config_global.php';
	require '../includes/login/core.inc.php';
	session_unset();
	session_destroy();
	header('location: ../index.php');
	#header('location: '.$httpReferer);
?>