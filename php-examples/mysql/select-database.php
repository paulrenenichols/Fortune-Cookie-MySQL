<?php

	/*
	 * require_once is a way of including another php file in this file
	 * so that we can reuse code.
	 * 
	 * "require" means that our current file won't execute if it can't find
	 * the file we are asking to include.
	 * 
	 * "once" means that if we include other files that include this file,
	 * the file will only be included one time.  Without the "once" specification,
	 * the code could be copied multiple times and cause problems.
	 */
	require_once 'login.php';

	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	
	if (!$db_server) {
		/*
		 * "die" is an exit function that is good for dealing with errors
		 * during development, but not in production.
		 */
		die("Unable to connect to MySQL: " . mysql_error());
	}
	else {
		echo "Connected to database. <br>";
	}
	
	if (mysql_select_db($db_database)) {
		echo "Successfully selected database: $db_database <br>";
	}
	else {
		die("Unable to select database: " . mysql_error());
	}
?>