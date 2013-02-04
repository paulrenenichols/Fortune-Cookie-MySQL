<?php
	function echoWithBreak($string) {
		echo $string;
		echo "<br />";
	}
	
	function passByReference(&$var) {
		$var++;
	}
	
	function passByValue($var) {
		$var++;
	}
	
	$number = 4;
	echoWithBreak('$number is: '."$number");
	echoWithBreak("pass by value");
	passByValue($number);
	echoWithBreak('$number is: '."$number");
	echoWithBreak("pass by reference");
	passByReference($number);
	echoWithBreak('$number is: '."$number");
?>