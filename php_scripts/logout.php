<?php
	require $PATH . 'includes/core.inc.php';
	session_destroy();
	header('location: '.$httpReferer);
	#header('location: '.$httpReferer);
?>