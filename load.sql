

/*load actor data*/
LOAD DATA LOCAL INFILE '~/data/actor1.del' INTO TABLE Actor
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

LOAD DATA LOCAL INFILE '~/data/actor2.del' INTO TABLE Actor
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

LOAD DATA LOCAL INFILE '~/data/actor3.del' INTO TABLE Actor
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

/*load director data*/
LOAD DATA LOCAL INFILE '~/data/director.del' INTO TABLE Director
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

/*load movie actor data*/
LOAD DATA LOCAL INFILE '~/data/movieactor1.del' INTO TABLE MovieActor
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

LOAD DATA LOCAL INFILE '~/data/movieactor2.del' INTO TABLE MovieActor
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

/*load movie data*/
LOAD DATA LOCAL INFILE '~/data/movie.del' INTO TABLE Movie
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

/*load movie director data*/
LOAD DATA LOCAL INFILE '~/data/moviedirector.del' INTO TABLE MovieDirector
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

/*load movie genre data*/
LOAD DATA LOCAL INFILE '~/data/moviegenre.del' INTO TABLE MovieGenre
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

/*load movie rating data*/
LOAD DATA LOCAL INFILE '~/data/movierating.del' INTO TABLE MovieRating
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

/*load sales data*/
LOAD DATA LOCAL INFILE '~/data/sales.del' INTO TABLE Sales
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"';

/*insert max person ID*/
INSERT INTO MaxPersonID VALUE(69000);

/*insert max movie ID*/
INSERT INTO MaxMovieID VALUE(4750);

