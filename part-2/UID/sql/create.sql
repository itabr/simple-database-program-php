
/* Primary key constraint: Every movie has a unique identification number. 
CHECK constraint: Every movie must have a title */
CREATE TABLE Movie(id int, title varchar(100), year int, rating char(10), company varchar(50), PRIMARY KEY(id), CHECK(title IS NOT NULL)) ENGINE=INNODB;

/* Primary key constraint: Every actor has a unique identification number. 
CHECK constraint: Every actor must have a date of birth */
CREATE TABLE Actor(id int, last varchar(20), first varchar(20), sex varchar(6), dob date, dod date, PRIMARY KEY(id), CHECK(dob IS NOT NULL)) ENGINE=INNODB;

/* Foreign key constraint: Sales mid to Movie id. */
CREATE TABLE Sales(mid int, ticketsSold int, totalIncome int, FOREIGN KEY (mid) references Movie(id)) ENGINE=INNODB;

/* Primary key constraint: Every director has a unique identification number. */
CREATE TABLE Director(id int, last varchar(20), first varchar(20), dob date, dod date, PRIMARY KEY(id)) ENGINE=INNODB;

/* Foreign key constraint: MovieGenre mid to Movie id */
CREATE TABLE MovieGenre(mid int, genre varchar(20), FOREIGN KEY (mid) references Movie(id)) ENGINE=INNODB;

/* Foreign key constraint: MovieDirector mid to Movie id 
Foreign key constraint: MovieDirector did to Director id */
CREATE TABLE MovieDirector(mid int, did int, FOREIGN KEY (mid) references Movie(id), FOREIGN KEY (did) references Director(id)) ENGINE=INNODB;

/* Foreign key constraint: MovieActor aid to Actor id */
CREATE TABLE MovieActor(mid int, aid int, role varchar(50), FOREIGN KEY (aid) references Actor(id)) ENGINE=INNODB;

/* Foreign key constraint: MovieRating mid to Movie id 
CHECK constraint: imdb rating between 0-100 */
CREATE TABLE MovieRating(mid int, imdb int, rot int, FOREIGN KEY (mid) references Movie(id), CHECK(rating >= 0 AND rating <= 100)) ENGINE=INNODB;

CREATE TABLE Review(name varchar(20), time timestamp, mid int, rating int, comment varchar(500), FOREIGN KEY (mid) references Movie(id)) ENGINE=INNODB;

CREATE TABLE MaxPersonID(id int) ENGINE=INNODB;

CREATE TABLE MaxMovieID(id int) ENGINE=INNODB;