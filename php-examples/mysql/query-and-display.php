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
	
	$db_table_name = "simple_table";
	
	if (!$db_server) {
		/*
		 * "die" is an exit function that is good for dealing with errors
		 * during development, but not in production.
		 */
		die("Unable to connect to MySQL: " . mysql_error());
	}
	else {
		echo "Connected to database. <br><br>";
	}
	
	/*
	 * select the database that we want to access
	 */
	if (mysql_select_db($db_database)) {
		echo "Successfully selected database: $db_database <br><br>";
	}
	else {
		die("Unable to select database: " . mysql_error());
	}
	
	/*
	 * Query the table.
	 */
	$query = "SELECT * FROM $db_table_name";
	$result = mysql_query($query);
	
	if (!$result) {
		die("Database access failed: " . mysql_error());
	}
	else {
		echo "Query was successful <br><br>";
	}
	
	$rows = mysql_num_rows($result);
	
	for ( $i = 0; $i < $rows; $i++ ) {
		
		/*
		 * We are fetching individual columns, one at a time.
		 * 
		 * In query-and-display-one-row-at-a-time.php, we fetch whole rows instead of individual columns.
		 */
		echo 'row #'."$i".'<br>';
		echo 'id:    ' . mysql_result($result, $i, 'id')    . '<br>';
		echo 'date:  ' . mysql_result($result, $i, 'date')  . '<br>';
		echo 'name:  ' . mysql_result($result, $i, 'name')  . '<br>';
		echo 'text:  ' . mysql_result($result, $i, 'text')  . '<br>';
		echo '<br>';
	}
	
	/*
	 * Close the database connection.
	*/
	mysql_close($db_server);
?>