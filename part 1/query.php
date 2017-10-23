<html>
<head><title> CS143 Project 1 </title></head>
<body>

<p> Project by Ilya Tabriz and Therese Horey </p>

<p> Type an SQL query in the following box: </p>

<p>
	<form action="router.php" method="GET">
		<textarea name="query" cols="60" rows="8"></textarea>
		<br />
		<input type="submit" value="hit it!" />
	</form>
</p>

<?php

	// establish connection
	$link = mysql_connect("localhost", "cs143", "", "CS143");

	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
	    exit;
	}

	// get the query from form TEXTAREA
	$dbQuery = $_GET["query"];

	// execute query inside database
	$rs = mysql_query($dbQuery, $link) or die(mysql_error());

	$num_rows = mysql_num_rows($rs);

	echo "<p>Results from database:</p>" ;

	echo "<table border=1 ><tr>" ;

	// echo header fields

	for ($x = 0; $x < mysql_num_fields($rs); $x++) {
		echo '<th>' , mysql_fetch_field($rs, $x)->name , '</th>';
	}

	echo "</tr>" ;

	while($row = mysql_fetch_row($rs)){

		echo '<tr>';

		for ($z = 0; $z < count($row); $z++) {

			if(current($row)==NULL)
				echo '<td>N/A</td>';
			else
				echo '<td>' , current($row) , '</td>';

			next($row);
		}

		echo '</tr>';

	}


	mysql_free_result($rs);

	mysql_close($link);

?>
	</table>
</body>
</html>
