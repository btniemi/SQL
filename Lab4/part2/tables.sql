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
	cover_image VARCHAR(50),
	FOREIGN KEY (author_id) REFERENCES Authors(id)
);

/* you cant use alter table here so how can we migrate the data to add a foreign key without having to resupply the dropped table with all the data again??? 
 * seems like that is a bad chioce to do in production to just drop a full table then recreate that table and add back in all the data */


SELECT genre, id FROM Books WHERE genre = '(no genres listed)' ;
