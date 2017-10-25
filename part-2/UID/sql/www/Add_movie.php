<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3>Add new Movie</h3>
    <form method="GET" action="#">
	   <div class="form-group">
		<label for="title">Title:</label>
		<input type="text" class="form-control" placeholder="Text input" name="title">
	   </div>
	   <div class="form-group">
		<label for="company">Company</label>
		<input type="text" class="form-control" placeholder="Text input" name="company">
	   </div>
	   <div class="form-group">
		<label for="year">Year</label>
		<input type="text" class="form-control" placeholder="Text input" name="year">
	   </div>
	   <div class="form-group">
		  <label for="rating">MPAA Rating</label>
		  <select   class="form-control" name="rate">
			 <option value="G">G</option>
			 <option value="NC-17">NC-17</option>
			 <option value="PG">PG</option>
			 <option value="PG-13">PG-13</option>
			 <option value="R">R</option>
			 <option value="surrendere">surrendere</option>
		  </select>
	   </div>
	   <div class="form-group">
		  <label >Genre:</label>
		  <input type="checkbox" name="genre[]" value="Action">Action</input>
		  <input type="checkbox" name="genre[]" value="Adult">Adult</input>
		  <input type="checkbox" name="genre[]" value="Adventure">Adventure</input>
		  <input type="checkbox" name="genre[]" value="Animation">Animation</input>
		  <input type="checkbox" name="genre[]" value="Comedy">Comedy</input>
		  <input type="checkbox" name="genre[]" value="Crime">Crime</input>
		  <input type="checkbox" name="genre[]" value="Documentary">Documentary</input>
		  <input type="checkbox" name="genre[]" value="Drama">Drama</input>
		  <input type="checkbox" name="genre[]" value="Family">Family</input>
		  <input type="checkbox" name="genre[]" value="Fantasy">Fantasy</input>
		  <input type="checkbox" name="genre[]" value="Horror">Horror</input>
		  <input type="checkbox" name="genre[]" value="Musical">Musical</input>
		  <input type="checkbox" name="genre[]" value="Mystery">Mystery</input>
		  <input type="checkbox" name="genre[]" value="Romance">Romance</input>
		  <input type="checkbox" name="genre[]" value="Sci-Fi">Sci-Fi</input>
		  <input type="checkbox" name="genre[]" value="Short">Short</input>
		  <input type="checkbox" name="genre[]" value="Thriller">Thriller</input>
		  <input type="checkbox" name="genre[]" value="War">War</input>
		  <input type="checkbox" name="genre[]" value="Western">Western</input>
	   </div>
	   <button type="submit" class="btn btn-default">Add!</button>
    </form>



</div>
