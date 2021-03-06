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
	
	$db_table_name = "cats";
	
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
	 * Create the table
	 */
	$query = "CREATE TABLE $db_table_name (
				id SMALLINT NOT NULL AUTO_INCREMENT,
				familiy VARCHAR(32) NOT NULL,
				name VARCHAR(32) NOT NULL,
				age TINYINT NOT NULL,
				PRIMARY KEY (id)
			)";
	$result = mysql_query($query);
	
	if (!$result) {
		die ("Table creation failed: " . mysql_error());
	}
	else {
		echo "Table creations succeeded <br><br>";
	}

	/*
	 * Describe the table
	 */
	$query = "DESCRIBE $db_table_name";
	$result = mysql_query($query);
	
	if (!$result) {
		die ("Describe failed: " . mysql_error());
	}
	else {
		echo "Describe succeeded <br><br>";
	}
	
	$rows = mysql_num_rows($result);
	
	echo "<style>
			 table   { border-collapse: collapse; }
			td, th   { padding: 0; }
			td, th   { border-top: 1px solid #000; border-left: 1px solid #000; }
			table    { margin-left: 1px; border-right: 1px solid #000; border-bottom: 1px solid #000; }
			td, th   { padding: 5px; }
			tbody th { text-align: right;  }
			thead th { vertical-align: bottom; }
			thead th { text-align: left; }
			thead tr:first-child { text-align: right; }
		  </style>";
	
	echo "<table>
			<caption>Table Description of table '$db_table_name'</caption>
			<thead>
			  <tr> <th>Column</th> <th>Type</th> <th>Null</th> <th>Key</th> </tr>
			</thead>
			<tbody>";
	
	for ($i = 0; $i < $rows; $i++) {
		$row = mysql_fetch_row($result);
		echo "<tr>";
		echo "<th>$row[0]</th>";
		for ($j = 1; $j < 4; $j++) {
			echo "<td>$row[$j]</td>";
		}
		echo "</tr>";
	}
	
	echo "</tbody>
		  </table>";
	
	echo "<br><br>";
	/*
	 * Drop, or "Delete", the table
	 */
	$query = "DROP TABLE $db_table_name";
	$result = mysql_query($query);
	
	if (!$result) {
	die ("DROP TABLE failed: " . mysql_error());
	}
	else {
		echo "DROP TABLE succeeded <br><br>";
	}
	
	/*
	 * Close the database connection.
	 */
	mysql_close($db_server);
?>