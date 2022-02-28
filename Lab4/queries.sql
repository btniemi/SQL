SELECT Books.title as Book, Authors.first_name as Author_First_Name, Authors.last_name as Author_Last_Name
FROM Books
INNER JOIN Authors ON Books.author_id = Authors.id