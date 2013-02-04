<?php

	/*
	 * Static variables are local, but they persist 
	 * from function call to function call to function call
	 */
	function staticTest() {
		static $count = 0;
		$notStatic = 0;
		echo '$count is: '."$count";
		echo "<br />";
		echo '$notStatic is: '."$notStatic";
		echo "<br />";
		echo "incrementing variables";
		echo "<br />";
		echo '$count++';
		echo "<br />";
		echo '$notStatic++';
		echo "<br />";
		$count++;
		$notStatic++;
		echo "<br />";
		echo "<br />";
		echo "<br />";
		
	}
	
	staticTest();
	staticTest();
	staticTest();
?>