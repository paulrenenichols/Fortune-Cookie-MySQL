
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
	
	$db_table_name = "fortunes";
	
	if (!$db_server) {
		error_log("Unable to connect to MySQL: " . mysql_error());
	}
	else {
		error_log("Connected to database.");
	}
	
	/*
	 * select the database that we want to access
	 */
	if (mysql_select_db($db_database)) {
		error_log("Successfully selected database: $db_database ");
	}
	else {
		error_log("Unable to select database: " . mysql_error());
	}
	

	
	/*
	 * select rows
	 */
	if (isset($_GET['randomKey']) &&
		isset($_GET['limit']) ) {
		
		$randomKey = get_get('randomKey');
		$limit = get_get('limit');

		$query = "";
		if(isset($_GET['descending'])) {
			$query = "SELECT body FROM $db_table_name WHERE random_id < $randomKey ORDER BY random_id DESC LIMIT $limit";
		}
		else {
			$query = "SELECT body FROM $db_table_name WHERE random_id > $randomKey ORDER BY random_id LIMIT $limit";
		}

		
		/*
		 * run query and test for failure.
		*/
		if ( !mysql_query($query, $db_server) ) {
			/*
			 * query failed
			 */
			error_log("Ajax GET SELECT failed: query used: $query<br>" . mysql_error());
		}
		else {
			/*
			 * Select was successful
			 */
			error_log("Ajax GET SELECT succeeded");
		}
		
		/*
		 * Query the table.
		*/
		$query = "SELECT * FROM $db_table_name";
		$result = mysql_query($query);
		
		if (!$result) {
			error_log("Ajax GET SELECT failed: query used: $query<br>" . mysql_error());
			header(':', true, 404);
			exit;
		}
		else {
			error_log("Ajax GET SELECT succeeded");
		}
		
		$rows = mysql_num_rows($result);
		
		$returnArray = array();
		for ( $i = 0; $i < $rows; $i++ ) {
			$row = mysql_fetch_row($result);
			$returnArray[$i] = $row[$i];
		}
		
		echo encode_json($returnArray);
	}
	
	/*
	 * Close the database connection.
	*/
	mysql_close($db_server);
	
	function get_get($var) {
		return mysql_real_escape_string($_GET[$var]);
	}
?>
