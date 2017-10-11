/* 
Three primary key constraints violation:
	Every movie has a unique identification number - sets all Movie id to 0.*/
	UPDATE Movie SET id = 0;
/* Every actor has a unique identification number - sets all Actor id to 0 */
	UPDATE Actor SET id = 0;
/* 	Every director has a unique identification number - sets all Director id to 0 */
	UPDATE Director SET id = 0;
	
/* Six referential integrity constraints violation:
Foreign key:
	Sales mid to Movie id - sets all Sales mid to 0 */
	UPDATE Sales SET mid = 0;
/* 	MovieGenre mid to Movie id - sets all MovieGenre mid to 0  */
	UPDATE MovieGenre SET mid = 0;
/* 	MovieDirector mid to Movie id - sets all MovieDirector mid to 0  */
	UPDATE MovieDirector SET mid = 0;
/* 	MovieActor mid to Movie id - sets all MovieActor mid to 0  */
	UPDATE MovieActor SET mid = 0;
/* 	MovieDirector did to Director id - sets all MovieDirector did to 0  */
	UPDATE MovieDirector SET did = 0;
/* 	MovieRating mid to Movie id - sets all MovieRating mid to 0  */
	UPDATE MovieRating SET mid = 0;
	
/* Three CHECK constraints violation:
	imdb rating between 0-100 - sets a rating for the movie Death to Smoochy to 200*/
	UPDATE MovieRating SET imdb = 200 WHERE mid = (SELECT id FROM Movie WHERE title = 'Death to Smoochy');
/* 	Every actor must have a date of birth - sets all entries for dob in Actor table to NULL */
	UPDATE Actor SET dob = NULL WHERE dob IS NOT NULL;
/* 	Every movie must have a title - sets the movie title of Death to Smoochy to NULL*/	
	UPDATE Movie SET title = NULL WHERE title = 'Death to Smoochy';
	
