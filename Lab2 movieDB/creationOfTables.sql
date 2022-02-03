CREATE TABLE peoples(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name TEXT NOT NULL,
	birthdate DATE
);

CREATE TABLE movies(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	title TEXT NOT NULL,
	releaseYear YEAR,
	age_rating TEXT NOT NULL
);

CREATE TABLE watched(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	people_id INTEGER,
	movie_id INTEGER,
	stars INTEGER NOT NULL,
	comments TEXT NOT NULL,
	FOREIGN KEY (people_id)
		REFERENCES peoples (id),
	FOREIGN KEY (movie_id) 
		REFERENCES movies(id)
);

/* start with putting this into the shell and getting them into DBeaver and go from there */