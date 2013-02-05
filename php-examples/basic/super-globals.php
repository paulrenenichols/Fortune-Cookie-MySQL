<?php
	
	function echoWithBreak($string) {
		print_r($string);
		echo "<br />";
	}
	
	function echoWithDoubleBreak($string) {
		print_r($string);
		echo "<br />";
		echo "<br />";
	}
	
	echoWithBreak('$GLOBALS');
	echoWithDoubleBreak($GLOBALS);
	echoWithBreak('$_SERVER');
	echoWithDoubleBreak($_SERVER);
	echoWithBreak('$_GET');
	echoWithDoubleBreak($_GET);
	echoWithBreak('$_POST');
	echoWithDoubleBreak($_POST);
	echoWithBreak('$_FILES');
	echoWithDoubleBreak($_FILES);
	echoWithBreak('$_COOKIE');
	echoWithDoubleBreak($_COOKIE);
	echoWithBreak('$_SESSION');
	echoWithDoubleBreak($_SESSION);
	echoWithBreak('$_REQUEST');
	echoWithDoubleBreak($_REQUEST);
	echoWithBreak('$_ENV');
	echoWithDoubleBreak($_ENV);
?>