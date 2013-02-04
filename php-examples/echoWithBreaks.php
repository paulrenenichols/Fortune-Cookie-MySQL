<?php
	
	function echoWithBreaks($string, $count) {
		echo $string;
		for($i = 0; i < $count; $i++) {
			echo "<br />";
		}
	}

?>