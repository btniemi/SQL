/* Total number of times a given movie has been watched */
SELECT COUNT(id) as number_times_movie_watched, movie_id 
	FROM watched
	GROUP BY movie_id
	
/* any delinguets that have watched a movie reated above their age */
SELECT name FROM watched
	JOIN peoples ON watched.people_id = peoples.id
	JOIN movies ON watched.movie_id = movies.id
	WHERE peoples.birthdate > '2007-02-01'
	AND movies.age_rating LIKE '%M'
	
	
/* how many movies total a person watched, rewatches included */
SELECT COUNT(id) as movies_watched, people_id 
	FROM watched
	GROUP BY people_id 
	
/* how many distinct movies a given person has watched */
SELECT COUNT(DISTINCT movie_id) as distinct_movie_watched, people_id 
	FROM watched
	GROUP BY people_id
	
/* the total movies watched by all people sorted by top watcher */
SELECT COUNT(id) as number_times_movie_watched, people_id  
	FROM watched
	GROUP BY people_id
	ORDER BY number_times_movie_watched DESC