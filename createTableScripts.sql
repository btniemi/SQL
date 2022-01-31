CREATE TABLE peoples(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name varchar(255) NOT NULL,
	birthdate DATE,
);

CREATE TABLE movies(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title TEXT NOT NULL,
	releaseYear YEAR,
	rating int NOT NULL,
)

CREATE TABLE watched(
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	people_id int,
	movie_id int,
	stars int NOT NULL,
	comments TEXT NOT NULL,
	FOREIGN KEY (people_id)
		REFRENCES peoples (id),
	FOREIGN KEY (movie_id)
		REFRENCES movies(id),
)

/* start with putting this into the shell and getting them into DBeaver and go from there */