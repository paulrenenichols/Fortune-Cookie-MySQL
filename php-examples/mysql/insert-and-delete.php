<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>


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
	 * delete row
	 */
	if ( isset($_POST['delete']) && isset($_POST['id'])) {
		
		$id = get_post('id');
		$query = "DELETE FROM $db_table_name WHERE id=$id";
		
		/*
		 * run query and test for failure.
		 */
		if ( !mysql_query($query, $db_server) ) {
			/*
			 * query failed
			 */
			echo "DELETE failed: query used: $query<br>" . mysql_error() . "<br><br>";
		}
		else {
			/*
			 * DELETE was successful
			 */
			echo "DELETE succeeded";
		}
	}
	
	/*
	 * insert row
	 */
	if (isset($_POST['name']) &&
		isset($_POST['text']) ) {
		
		$id = get_post('id');
		$date = get_post('date');
		$name = get_post('name');
		$text = get_post('text');
		
		$query = "INSERT INTO $db_table_name (date, name, text) VALUES" 
					. "( NOW(), '$name', '$text')";
		
		/*
		 * run query and test for failure.
		*/
		if ( !mysql_query($query, $db_server) ) {
			/*
			 * query failed
			*/
			echo "INSERT failed: query used: $query<br>" . mysql_error() . "<br><br>";
		}
		else {
		/*
		* INSERT was successful
			*/
			echo "INSERT succeeded";
		}
	}
	
	echo <<<_END
<form action="insert-and-delete.php" method="post">
<pre>
  Name <input type="text" name="name" />
  Text <input type="text" name="text" />
       <input type="submit" name="INSERT ROW" />
</pre>
</form>
_END;

	
	/*
	 * Display all rows in database
	 */
	$query = "SELECT * FROM $db_table_name";
	$result = mysql_query($query);

	if (!$result) {
		die ("SELECT query failed: " . mysql_error());
	}
	else {
		echo "SELECT succeeded<br><br>";
	}
	
	$rows = mysql_num_rows($result);
	for ($i = 0; $i < $rows; $i++) {
		
		/*
		 * Fetch one row at a time
		 */
		$row = mysql_fetch_row($result);
		echo <<<_END
<pre>
  ID $row[0]
Date $row[1]
Name $row[2]
Text $row[3]
</pre>
			<form action="insert-and-delete.php" method="post">
			  	<input style="display: none;" type"hidden" name="delete" value="yes" />
			  	<input style="display: none;" type"hidden" name="id" value="$row[0]" />
			  	<input type="submit" value="DELETE ROW" />
			</form>
_END;
	}
	
	/*
	 * Close the database connection.
	*/
	mysql_close($db_server);
	
	function get_post($var) {
		return mysql_real_escape_string($_POST[$var]);
	}
?>


</body>
</html>