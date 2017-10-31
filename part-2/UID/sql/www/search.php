<?php
	include('header.php');
?>
<br>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h3><b> Searching Page:</b></h3>
 <hr>
 <h4>
  <label for="search_input">Search:</label>
  </h4>
  <form class="form-group" method ="GET" id="usrform">
	 <input type="text" id="search_input"class="form-control" placeholder="Search..." name="result"><br>
	 <input type="submit" value="Click Me!"class="btn btn-secondary" style="margin-bottom:10px">
  </form>
  <!--php query start from here -->
  <?php

	// establish connection
	$link = mysql_connect("localhost", "cs143", "", "CS143");

	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
	    exit;
	}

	// get the text from search box
	$search = $_GET["result"];
	if($search != "")
	{
	$terms = explode(" ", $search);
	$size = count($terms);
	$string = "";
	//print_r($terms);
	for ($i = 0; $i < $size; $i++)
	{
		//one term
		if($i == 0 && $size == 1)
			$string = $string . "CONCAT(first, last) LIKE " . "'%" . $terms[$i] . "%'";
		//first term multiple terms
		else if($i == 0)
			$string = $string . "CONCAT(first, last) LIKE " . "'%" . $terms[$i] . "%'" . " AND ";
		//middle terms
		else if($i != $size-1)
			$string = $string . "CONCAT(first, last) LIKE " . "'%" . $terms[$i] . "%'" . " AND " ;
		//last term
		else
			$string = $string . "CONCAT(first, last) LIKE " . "'%" . $terms[$i] . "%'";
	}

	//echo $terms[0];
	//echo $terms[$i-1];
	//echo $string;
	//build mysql query for Actor table
	$dbQueryActor = "SELECT * FROM CS143.Actor WHERE " . $string . ";";
	//echo $dbQueryActor;
	// execute query inside database
	$rs = mysql_query($dbQueryActor, $link) or die(mysql_error());

	$num_rows = mysql_num_rows($rs);
	if($num_rows != 0)
	{
		echo "<div>";
		echo "<h4>Matching actors:</h4>" ;
		echo "<table border=1 class = 'table table-hover'><tr>" ;

		// echo header fields
		echo "<thead class='thead-dark'>";
		for ($x = 0; $x < 2; $x++) {
			if($x == 0)
				echo '<th>' , "Name" , '</th>';
			else
				echo '<th>' , "Date of Birth" , '</th>';
		}
		echo "</tr>" ;
		echo "</thead>";
		while($row = mysql_fetch_row($rs)){

			echo '<tr>';
			
			//Name first and last
			echo '<td>' , '<a href=Show_A.php?id=' , $row[0] , '>' , $row[2] , " " , $row[1] , '</a>', '</td>';
			
			//Date of birth
			echo '<td>' , '<a href=Show_A.php?id=' , $row[0] , '>' , $row[4] , '</a>', '</td>';

			/*for ($z = 0; $z < count($row); $z++) {

				if(current($row)==NULL)
					echo '<td>N/A</td>';
				else
					echo '<td>' , "<a href=" , current($row) , '</td>';

				next($row);
			}*/

			echo '</tr>';

		}
		echo "</table>";
		echo "</div>";
	}
	
	$string = "";
	//print_r($terms);
	for ($i = 0; $i < $size; $i++)
	{
		//one term
		if($i == 0 && $size == 1)
			$string = $string . "title LIKE " . "'%" . $terms[$i] . "%'";
		//first term multiple terms
		else if($i == 0)
			$string = $string . "title LIKE " . "'%" . $terms[$i] . "%'" . " AND ";
		//middle terms
		else if($i != $size-1)
			$string = $string . "title LIKE " . "'%" . $terms[$i] . "%'" . " AND " ;
		//last term
		else
			$string = $string . "title LIKE " . "'%" . $terms[$i] . "%'";
	}
	
	$dbQueryMovie = "SELECT * FROM CS143.Movie WHERE " . $string . ";";
	//echo $dbQueryMovie;
	// execute query inside database
	$rs = mysql_query($dbQueryMovie, $link) or die(mysql_error());

	$num_rows = mysql_num_rows($rs);
	if($num_rows != 0)
	{
		echo "<div>";
		echo "<h4>Matching movies:</h4>" ;
				
		echo "<table border=1 class = 'table table-hover'><tr>" ;

		// echo header fields
		echo "<thead class='thead-dark'>";
		for ($x = 0; $x < 2; $x++) {
			if($x == 0)
				echo '<th>' , "Title" , '</th>';
			else
				echo '<th>' , "Year" , '</th>';
		}

		echo "</tr>" ;
		echo "</thead>";
		while($row = mysql_fetch_row($rs)){

			echo '<tr>';
			
			//Movie title
			echo '<td>' , '<a href=Show_M.php?id=' , $row[0] , '>' , $row[1] , '</a>', '</td>';
			
			//Year
			echo '<td>' , '<a href=Show_M.php?id=' , $row[0] , '>' , $row[2] , '</a>', '</td>';

			echo '</tr>';

		}
		echo "</table>";
		echo "</div>";
	}

	}
	mysql_free_result($rs);

	mysql_close($link);

?>
<!--php query end from here -->
</div>
