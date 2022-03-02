create table Authors (
	id INT,
	first_name VARCHAR(50),
	last_name VARCHAR(50),
	title VARCHAR(50),
	address VARCHAR(50),
	city VARCHAR(50),
	state VARCHAR(50),
	zip VARCHAR(50)
);

create table Books (
	id INT,
	author_id VARCHAR(50),
	title VARCHAR(50),
	genre VARCHAR(50),
	isbn VARCHAR(50),
	price VARCHAR(50),
	currancy VARCHAR(50),
	cover_image VARCHAR(50)
);

