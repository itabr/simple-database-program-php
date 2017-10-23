
/*get movie id*/
/*SELECT id FROM Movie WHERE title = 'Death to Smoochy';*/

/* get actor ids for movie*/
/*SELECT aid FROM MovieActor WHERE mid = (SELECT id FROM Movie WHERE title = 'Death to Smoochy';)*/

/*get first and last names of actors from the movie*/
SELECT CONCAT( first, " ", last) FROM Actor WHERE id in (SELECT aid FROM MovieActor WHERE mid = (SELECT id FROM Movie WHERE title = 'Death to Smoochy'));

/*get count of directors with 4 or greater movies*/
SELECT COUNT(*) FROM (SELECT did FROM MovieDirector GROUP BY did HAVING COUNT(mid) >= 4) AS list;

/*the unique genre categories*/
SELECT genre FROM MovieGenre GROUP BY genre;

/*number of deceased actors in the actor table*/
SELECT COUNT(*) FROM (SELECT id FROM Actor WHERE dod IS NOT NULL) as list;

/*find name of highest earning movie*/
SELECT title FROM Movie WHERE id = (SELECT mid FROM Sales WHERE totalIncome = (SELECT MAX(totalIncome) from Sales));





