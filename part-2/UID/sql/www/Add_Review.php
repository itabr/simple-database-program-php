<?php
	include('index.php');
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h3><b> Add Review :</b></h3>
 <hr>
  <form class="form-group" method ="POST" action="#" id="usrform">
  <label for="name">Your name:</label>
	 <input type="text" class="form-control" placeholder="Name..." name="name"><br>
	 <div class="form-group">
	 <label for="rating">Rating:</label>
	 <select name="rating">
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	</select>
	</div>
	<div class="form-group">
	<label for="review">Comment:</label>
	 <textarea name="review" rows="10" cols="30" placeholder=". . ."></textarea>
	 </div>
	 <input type="submit" value="Rate it!"class="btn btn-default" style="margin-bottom:10px">
  </form>
  <!--php query start from here -->
  <?php 
	// establish connection
	//echo $_GET["id"];
	$link = mysql_connect("localhost", "cs143", "", "CS143");

	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
	    exit;
	}

	// get the text from search box
	$name = $_POST["name"];
	$rating = $_POST["rating"];
	$review = $_POST["review"];
	$id = $_GET["id"];
	//echo $id;
	if($name != "")
	{
		
		$dbQueryInsertReview = "INSERT INTO CS143.Review (name, time, mid, rating, comment) VALUES ('" . $name ."', NOW(), '" . $id . "' , '" . $rating . "', '" . $review . "');";
		//echo $dbQueryInsertReview;
		// execute query inside database
		$rs = mysql_query($dbQueryInsertReview, $link) or die(mysql_error());

		$num_rows = mysql_num_rows($rs);
		echo "Added review successfully.";
	}
	?>
<!--php query end from here -->
</div>
