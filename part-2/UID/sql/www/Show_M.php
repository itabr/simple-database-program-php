<?php
	include('index.php');
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <h3><b> Movie Information Page  :</b></h3>
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
//build mysql query for Movie table
//want title(year), producer, rating, director(dob), genre
$dbQueryMovieInfo = "SELECT * FROM CS143.Movie WHERE id = " . $search. ";";

// execute query inside database
$rs = mysql_query($dbQueryMovieInfo, $link) or die(mysql_error());

$num_rows = mysql_num_rows($rs);

if($num_rows != 0)
{
while($row = mysql_fetch_row($rs))
{
	echo '<a href=Add_Review.php?id=' , $search , '>' , "Add a review for this movie" ,  '</a>';
	echo "<p>Movie Information:</p>" ;

	echo "<p>" ;
		
	//Title (year)
	echo  "Title: " , $row[1] , " (" , $row[2] , ") " , "<br>";

	//Producer
	echo  "Producer: " , $row[4] , "<br>";

	//Rating
	echo  "Rating: " , $row[3] , "<br>";
}
}

$dbQueryDirectorInfo = "SELECT * FROM CS143.Director WHERE id IN (SELECT did FROM CS143.MovieDirector WHERE mid = " . $search. ");";
//echo $dbQueryDirectorInfo;
// execute query inside database
$rs = mysql_query($dbQueryDirectorInfo, $link) or die(mysql_error());

$num_rows = mysql_num_rows($rs);
if($num_rows != 0)
{
while($row = mysql_fetch_row($rs))
{
	//Director (date of birth)
	echo  "Director: " , $row[2] , " " , $row[1] , " (" , $row[3] , ")" , "<br>";
}
}
$dbQueryGenreInfo = "SELECT * FROM CS143.MovieGenre WHERE mid = " . $search. ";";

// execute query inside database
$rs = mysql_query($dbQueryGenreInfo, $link) or die(mysql_error());

$num_rows = mysql_num_rows($rs);
if($num_rows != 0)
{
$counter = 0;
while($row = mysql_fetch_row($rs)){
	
	if($counter == 0)
		echo "Genre(s): ";
	//Genres
	echo  $row[1] , " " ;
	$counter++;
}
}

echo "</p>" ;

$dbQueryMovieActorInfo = "SELECT DISTINCT aid, first, last, role FROM CS143.Actor, (SELECT aid, role FROM CS143.MovieActor WHERE mid = " . $search . ") AS list WHERE list.aid = CS143.Actor.id;";
//echo $dbQueryActorMovieInfo;
// execute query inside database
$rs = mysql_query($dbQueryMovieActorInfo, $link) or die(mysql_error());
$num_rows = mysql_num_rows($rs);
if($num_rows != 0)
{
echo "<p>Actors in this movie:</p>" ;

echo "<table border=1 ><tr>" ;

// echo header fields

for ($x = 0; $x < 2; $x++) {
	if($x == 0)
		echo '<th>' , "Name" , '</th>';
	else
		echo '<th>' , "Role" , '</th>';
}

echo "</tr>";

while($row = mysql_fetch_row($rs)){

	echo '<tr>';
	
	//Movie title
	echo '<td>' ,'<a href=Show_A.php?id=' , $row[0] , '>' , $row[1] , " " , $row[2] , '</a>', '</td>';
	
	//Movie role
	echo '<td>' , '"' , $row[3] , '"' , '</td>';

	echo '</tr>';

}
echo "</table>";
}

$dbQueryAverageScore = "SELECT AVG(rating), COUNT(rating) FROM CS143.Review WHERE mid = " . $search. ";";

// execute query inside database
$rs = mysql_query($dbQueryAverageScore, $link) or die(mysql_error());

if($num_rows != 0)
{
while($row = mysql_fetch_row($rs)){

	echo "<p>User reviews: </p>";
	if($row[1] == 0)
		echo  "Average score of 0/5 with a total of " , $row[1] , " user scores." ;
	else
		echo  "Average score of " , $row[0] , "/5 with a total of " , $row[1] , " user scores." ;
}
}
//name, time, mid, rating, comment
$dbQueryMovieReviewInfo = "SELECT * FROM CS143.Review WHERE mid = " . $search . ";";
//echo $dbQueryActorMovieInfo;
// execute query inside database
$rs = mysql_query($dbQueryMovieReviewInfo, $link) or die(mysql_error());
$num_rows = mysql_num_rows($rs);
if($num_rows != 0  )
{
echo "<p>User comments:</p>" ;

echo "<table border=1 ><tr>" ;

// echo header fields

for ($x = 0; $x < 4; $x++) {
	if($x == 0)
		echo '<th>' , "Name" , '</th>';
	else if ($x == 1)
		echo '<th>' , "Rating" , '</th>';
	else if ($x == 2)
		echo '<th>' , "Time" , '</th>';
	else
		echo '<th>' , "Comment" , '</th>';
}

echo "</tr>";

while($row = mysql_fetch_row($rs)){

	echo '<tr>';
	
	//Name
	echo '<td>' , $row[0] , '</td>';
	
	//Rating
	echo '<td>' , $row[3] , '</td>';
	
	//Time
	echo '<td>' , $row[1] , '</td>';
	
	//Comment
	echo '<td>' , '"' , $row[4] , '"' , '</td>';

	echo '</tr>';

}
echo "</table>";
}
mysql_free_result($rs);

mysql_close($link);

?>
</div>
