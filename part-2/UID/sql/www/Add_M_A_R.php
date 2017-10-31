<?php
	include('header.php');
?>
<br>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h3><b>Add Movie/Actor Relation:</b></h3>
<hr>
			<form method = "POST" action="#">
				<div class="form-group">
					<label for="movieid">Movie Title:</label>
					<select class="form-control" name='movieid'>
					<option value="NULL"> </option>
					<?php
						$link = mysql_connect("localhost", "cs143", "", "CS143");
						if (!$link) {
						    echo "Error: Unable to connect to MySQL." . PHP_EOL;
						    echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
						    echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
						    exit;
						}

						// get the query from form TEXTAREA
						$dbQuery = "select id,title from CS143.Movie;";
						// execute query inside database
						$rs = mysql_query($dbQuery, $link) or die(mysql_error());

						while($row = mysql_fetch_row($rs)){

							for ($z = 0; $z < count($row); $z = $z + 2) {
								$t = "<option value='" . current($row) . "'>". next($row) ."</option>";
								echo "$t";

								next($row);
							}

						}


						mysql_free_result($rs);

						mysql_close($link);
					?>

					</select>




					<label for="Actorid">Actor:</label>
					<select class="form-control" name='Actorid'>
					<option value="NULL"> </option>
					<?php
						$link = mysql_connect("localhost", "cs143", "", "CS143");
						if (!$link) {
						    echo "Error: Unable to connect to MySQL." . PHP_EOL;
						    echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
						    echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
						    exit;
						}

						// get the query from form TEXTAREA
						$dbQuery = "select id,first,last from CS143.Actor;";
						// execute query inside database
						$rs = mysql_query($dbQuery, $link) or die(mysql_error());

						while($row = mysql_fetch_row($rs)){

							for ($z = 0; $z < count($row); $z = $z + 3) {
								$t = "<option value='" . current($row) . "'>". next($row) . " " .next($row) ."</option>";
								echo "$t";

								next($row);
							}

						}


						mysql_free_result($rs);

						mysql_close($link);
					?>
					</select>













					<label for="movieid">Role:</label>
					<br>
					<input class="form-control" type="text" name="identity" value="role"/>





					<br />



					<input type='submit' class="btn btn-secondary" value='Click me!'>


					<?php
						echo "<br />";
						$eflag = 0;
						$link = mysql_connect("localhost", "cs143", "", "CS143");
						if (!$link) {
						    echo "Error: Unable to connect to MySQL." . PHP_EOL;
						    echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
						    echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
						    exit;
						}

						if($_SERVER["REQUEST_METHOD"] == "POST"){
							$Actorid = $_POST["Actorid"];
							$movieid = $_POST["movieid"];
							$identity = $_POST["identity"];

							if($Actorid === "NULL"){
								echo "select an actor";
								echo "<br />";
								$eflag = 1;
							}

							if($movieid === "NULL"){
								echo "select a movie";
								echo "<br />";
								$eflag = 1;
							}
							if($identity === "role"){
								echo "write a role";
								echo "<br />";
								$eflag = 1;
							}


							if($eflag === 0){

							$q = "INSERT INTO CS143.MovieActor (mid , aid, role ) VALUES (" . $movieid . ",'" . $Actorid ."','" . $identity . "');";
							$rs = mysql_query($q, $link) or die(mysql_error());

							echo "Role was successfully added to database";
							}

						}

						mysql_close($link);


					?>

				</div>

			</form>
		</div>
