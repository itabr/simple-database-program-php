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
</div>