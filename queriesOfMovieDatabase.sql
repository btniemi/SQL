/* Total number of times a given movie has been watched */
SELECT COUNT(id), movie_id, movies.title
	FROM watched
	GROUP BY movie_id
	
/* any delinguets that have watched a movie reated above their age */
SELECT name FROM peoples
	JOIN watched ON watched.movie_id = movies.id
	JOIN watched ON watched.people_id = peoples.id
	WHERE peoples.birthdate >= '20070201'
	AND movies.age_rating like '%M%'
	
/* how many movies total a person watched, rewatches included */
SELECT COUNT(id), people_id 
	FROM watched
	GROUP BY people_id 
	
/* how many distinct movies a given person has watched */
SELECT COUNT(DISTINCT movie_id)
	FROM watched
	GROUP BY people_id
	
/* the total movies watched by all people sorted by top watcher */
SELECT * FROM watched
	ORDER BY people_id ASC