
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

	//echo "start of post-fortune.php";
	
	$db_server = mysql_connect($db_hostname, $db_username, $db_password);
	
	$db_table_name = "fortunes";
	
	if (!$db_server) {
		error_log("Unable to connect to MySQL: " . mysql_error());
		//echo "Unable to connect to MySQL: " . mysql_error();
	}
	else {
		error_log("Connected to database.");
		//echo "Connected to database.";
	}
	
	/*
	 * select the database that we want to access
	 */
	if (mysql_select_db($db_database)) {
		error_log("Successfully selected database: $db_database ");
		//echo "Successfully selected database: $db_database ";
	}
	else {
		//echo "Unable to select database: " . mysql_error();
	}
	

	
	/*
	 * insert row
	 */
	if (isset($_POST['body']) &&
		isset($_POST['random_id']) ) {
		
		$id = get_post('id');
		$random_id = get_post('random_id');
		$body = get_post('body');
		
		$query = "INSERT INTO $db_table_name (created_at, random_id, body) VALUES" 
					. "(NOW(), $random_id, '$body')";
		
		/*
		 * run query and test for failure.
		*/
		if ( !mysql_query($query, $db_server) ) {
			/*
			 * query failed
			 */
			//echo "INSERT failed: query used: $query" . mysql_error();
		}
		else {
			/*
			 * INSERT was successful
			 */
			//echo "INSERT succeeded";
		}
	}
	
	/*
	 * Close the database connection.
	*/
	mysql_close($db_server);
	
	function get_post($var) {
		return mysql_real_escape_string($_POST[$var]);
	}
	
	//echo "end of post-fortune.php";
?>

