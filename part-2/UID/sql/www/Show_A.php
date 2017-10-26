<?php
	include('index.php');
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h3><b> Actor Information Page :</b></h3>
<hr>
   <hr>
  <label for="search_input">Search:</label>
 <form class="form-group" action="search.php" method ="GET" id="usrform">
     <input type="text" id="search_input"class="form-control" placeholder="Search..." name="result"><br>
     <input type="submit" value="Click Me!" class="btn btn-default" style="margin-bottom:10px">
 </form>
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
$search = intval($_GET['id']);

$string = "";
//build mysql query for Actor table
$dbQueryActorInfo = "SELECT * FROM CS143.Actor WHERE id = " . $search. ";";

// execute query inside database
$rs = mysql_query($dbQueryActorInfo, $link) or die(mysql_error());

$num_rows = mysql_num_rows($rs);
if($num_rows != 0)
{
	echo "<p>Actor Information:</p>" ;

	echo "<table border=1 ><tr>" ;

	// echo header fields

	for ($x = 0; $x < 3; $x++) {
		if($x == 0)
			echo '<th>' , "Name" , '</th>';
		else if($x == 1)
			echo '<th>' , "Date of Birth" , '</th>';
		else
			echo '<th>' , "Date of Death" , '</th>';
	}

	echo "</tr>";

	while($row = mysql_fetch_row($rs)){

		echo '<tr>';
		
		//Name first and last
		echo '<td>' , $row[2] , " " , $row[1] , '</td>';
		
		//Date of birth
		echo '<td>' , $row[4] , '</td>';
		
		//Date of death
		if($row[5]==NULL)
			echo '<td>Still Alive</td>';
		else
			echo '<td>' , $row[5] , '</td>';

		echo '</tr>';

	}
}

$dbQueryActorMovieInfo = "SELECT DISTINCT title, role FROM CS143.MovieActor, CS143.Movie WHERE mid = CS143.Movie.id AND aid = " . $search . ";";
//echo $dbQueryActorMovieInfo;
// execute query inside database
$rs = mysql_query($dbQueryActorMovieInfo, $link) or die(mysql_error());
echo "<p>Actor's Movies and Role:</p>" ;

	echo "<table border=1 ><tr>" ;

	// echo header fields

	for ($x = 0; $x < 2; $x++) {
		if($x == 0)
			echo '<th>' , "Title" , '</th>';
		else
			echo '<th>' , "Role" , '</th>';
	}

	echo "</tr>";

	while($row = mysql_fetch_row($rs)){

		echo '<tr>';
		
		//Movie title
		echo '<td>' , $row[0] , '</td>';
		
		//Movie role
		echo '<td>' , $row[1] , '</td>';

		echo '</tr>';

	}
mysql_free_result($rs);

mysql_close($link);

?>
</div>

