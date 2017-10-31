<?php
	include('index.php');
?>


		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h3>Add Movie/Director Relation</h3>

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




					<label for="Directorid">Director:</label>
					<select class="form-control" name='Directorid'>
					<option value=NULL> </option>
					<?php
						$link = mysql_connect("localhost", "cs143", "", "CS143");
						if (!$link) {
						    echo "Error: Unable to connect to MySQL." . PHP_EOL;
						    echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
						    echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
						    exit;
						}

						// get the query from form TEXTAREA
						$dbQuery = "select id,first,last from CS143.Director;";
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

					<br />

					<input type='submit' class="btn btn-default" value='Click me!'>


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
							$Directorid = $_POST["Directorid"];
							$movieid = $_POST["movieid"];

							if($Directorid === "NULL"){
								echo "select a director";
								echo "<br />";
								$eflag = 1;
							}

							if($movieid === "NULL"){
								echo "select a movie";
								echo "<br />";
								$eflag = 1;
							}

							if($eflag === 0){
								$q = "INSERT INTO CS143.MovieDirector (mid , did ) VALUES (" . $movieid . ",'" . $Directorid . "');";
								$rs = mysql_query($q, $link) or die(mysql_error());
								echo "director was successfully added to database";
							}

						}

						mysql_close($link);


					?>

				</div>

			</form>
		</div>

