<?php

	$global1 = "global1";
	$global2 = "global2";

	function testGlobal() {
		
		$local = "local";
		
		//to access a global, you have to make a global declaration in the function
		global $global1;
		
		echo $local;  //this is a local variable, so this works
		echo "<br />";
		
		echo $global1;  //this works because we have used the "global" keyword to identify this variable
		echo "<br />";
		
		echo $global2;  //this fails, because we have not used the "global" keyword on it
		echo "<br />";
	}

	testGlobal();
?>