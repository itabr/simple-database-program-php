<!doctype html>
<html lang="en">

<head>
<title>CS143 DataBase</title>
<meta charset="utf-8">
<style>
<?php include 'stylesheet/bootstrap.min.css';?>
</style>
</head>

<body>
	<div>
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php"> CS143 DataBase Query System </a>
			<a class="navbar-brand" style="color: #C0C0C0;"> Ilya Tabriz &nbsp;&nbsp; and &nbsp;&nbsp; Therese Horey </a>
		</nav>
		<div class="container-fluid" style="background-color: #C0C0C0;">
			<div class="row">
				<div class="col" style="margin: 10px 0px 10px 0px;">
					<a>
						Add New Content
					</a>
				</div>
				<div class="col" style="margin: 10px 0px 10px 0px;">
					<a>
						Browsering Content
					</a>
				</div>
				<div class="col" style="margin: 10px 0px 10px 0px;">
					<a>
						Search Interface
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col" style="margin: 5px 0px 5px 0px;">
					<a href="index.php?page=Add_actor.php">
						Add Actor/Director
					</a>
				</div>
				<div class="col" style="margin: 5px 0px 5px 0px;">
					<a href="index.php?page=Show_A.php">
						Show Actor Information
					</a>
				</div>
				<div class="col" style="margin: 5px 0px 5px 0px;">
					<a href="index.php?page=search.php">
						Search/Actor Movie
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col" style="margin: 5px 0px 5px 0px;">
					<a href="index.php?page=Add_movie.php">
						Add Movie Information
					</a>
				</div>
				<div class="col" style="margin: 5px 0px 5px 0px;">
					<a href="index.php?page=Show_M.php">
						Show Movie Information
					</a>
				</div>
				<div class="col" style="margin: 5px 0px 5px 0px;">
					<a>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col" style="margin: 5px 0px 5px 0px;">
					<a href="Add_M_A_R.php">
						Add Movie/Actor Relation
					</a>
				</div>
				<div class="col" style="margin: 5px 0px 5px 0px;">
					<a>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col" style="margin: 5px 0px 5px 0px;">
					<a href="Add_M_D_R.php">
						Add Movie/Director Relation
					</a>
				</div>
			</div>
		</div>
	</div>

	<?php
		$page = $_GET['page'];	/* gets the variable $page */
		if (!empty($page)) {
			include($page);
		} 	/* if $page has a value, include it */
		else {
			include('welcome.php');
		} 	/* otherwise, include the default page */
	?>






</body>


</html>
