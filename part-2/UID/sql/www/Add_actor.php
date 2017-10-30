<?php
	include('index.php');
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3>Add new Actor/Director</h3>
    <form method = "POST" action="#">
	  <label class="radio-inline">
		  <input type="radio" checked="checked" name="identity" value="Actor"/>
		  Actor
	   </label>
	   <label class="radio-inline">
		  <input type="radio" name="identity" value="Director"/>Director
	   </label>
	   <div class="form-group">
		<label for="first_name">First Name</label>
		<input type="text" class="form-control" placeholder="Text input"  name="fname"/>
	   </div>
	   <div class="form-group">
		<label for="last_name">Last Name</label>
		<input type="text" class="form-control" placeholder="Text input" name="lname"/>
	   </div>
	   <label class="radio-inline">
		  <input type="radio" name="sex" checked="checked" value="male">Male
	   </label>
	   <label class="radio-inline">
		  <input type="radio" name="sex" value="female">Female
	   </label>
	   <div class="form-group">
		<label for="DOB">Date of Birth</label>
		<input type="text" class="form-control" placeholder="Text input" name="dateb">ie: 1997-05-05<br>
	   </div>
	   <div class="form-group">
		<label for="DOD">Date of Die</label>
		<input type="text" class="form-control" placeholder="Text input" name="dated">(leave blank if alive now)<br>
	   </div>
	   <button type="submit" class="btn btn-default">Add!</button>
    </form>

</div>


<?php

	function isRealDate($date) {
	    if (false === strtotime($date)) {
	        return false;
	    }
	    list($year, $month, $day) = explode('-', $date);
	    return checkdate($month, $day, $year);
	}


	$page = 'Add_actor.php';
	// establish connection
	$link = mysql_connect("localhost", "cs143", "", "CS143");
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
	    exit;
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$dob = $_POST["dateb"];
		$dod = $_POST["dated"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$identity = $_POST["identity"];
		$sex = $_POST["sex"];


		if(isRealDate($dob) && $lname && $fname){

				$q = "SELECT id FROM CS143.MaxPersonID;";
				$rs = mysql_query($q, $link) or die(mysql_error());
				$id = mysql_fetch_row($rs)[0] + 1;

				if($dod){
					if(isRealDate($dod)){
						if($identity === "Actor"){
							$q = "INSERT INTO CS143." . $identity . "(id , last, first, sex, dob, dod ) VALUES (" . $id . ",'" . $lname ."','" . $fname ."','". $sex  ."','". $dob ."','". $dod."');";
							$rs = mysql_query($q, $link) or die(mysql_error());
						}
						else{
							$q = "INSERT INTO CS143." . $identity . "(id , last, first, dob ) VALUES (" . $id . ",'" . $lname ."','" . $fname ."','". $dob . "');";
							$rs = mysql_query($q, $link) or die(mysql_error());
						}
						$rs = mysql_query("UPDATE CS143.MaxPersonID SET id = id + 1 WHERE id = $id - 1;", $link) or die(mysql_error());
						echo $rs;

						echo $q;

						if($rs==1){
							echo "person added to database successfully";
						}

					}
					else{
						echo "make sure date format is correct";
					}
				}
				else{
					if($identity === "Actor"){
						$q = "INSERT INTO CS143." . $identity . "(id , last, first, sex, dob ) VALUES (" . $id . ",'" . $lname ."','" . $fname ."','". $sex  ."','". $dob . "');";
						$rs = mysql_query($q, $link) or die(mysql_error());
					}
					else{
						$q = "INSERT INTO CS143." . $identity . "(id , last, first, dob ) VALUES (" . $id . ",'" . $lname ."','" . $fname ."','". $dob . "');";
						$rs = mysql_query($q, $link) or die(mysql_error());
					}

					$rs = mysql_query("UPDATE CS143.MaxPersonID SET id = id + 1 WHERE id = $id - 1;", $link) or die(mysql_error());

					if($rs==1){
						echo "person added to database successfully";
					}
				}
		}
		else{
			echo "Error fill all the froms and make sure date format is correct ";
		}
	}




	mysql_close($link);
?>
