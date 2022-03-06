# did use help from Austin Reichert to understand more about sqlite3 python library and some code help
import sqlite3

con = sqlite3.connect('Joins_part2dB.sqlite.txt')
cur = con.cursor()

# cur.execute("CREATE TABLE bookGenres(genre_id INTEGER NOT NULL, book_id INTEGER NOT NULL, FOREIGN KEY(genre_id)
# REFERENCES Genres(id), FOREIGN KEY(book_id) REFERENCES Books(id));")
    #this is only done once and looks good to me

genreDict = {}
for row in cur.execute("SELECT * FROM Genres;"):
    genreDict[row[1]] = row[0]

def beforePipe(string):
    string = string[:string.index('|')] #gets everything up to a pipe character
    return string

def removePipe(string):
    toPipe = string[:string.index('|')] + '|' #removes the element up to and including the pipe
    string = string.replace(toPipe, '')
    return(string)

bookId = []
Genre = []

def getGenresforBook(bId, genre):
    if '|' in genre:
        pipeCount = genre.count('|')
        while pipeCount > 0:
            newGenre = beforePipe(genre)
            Genre.append(newGenre)
            bookId.append(bId)
            genre = removePipe(genre)
            pipeCount -= 1
        Genre.append(genre)
        bookId.append(bId)
    else:
        Genre.append(genre)
        bookId.append(bId)

for row in cur.execute("SELECT * FROM Books;"):
    booksId = row[0]
    genres = str(row[3])
    getGenresforBook(booksId, genres)

bookidwithgenre = list(zip(bookId, Genre))

#cur.executemany("INSERT INTO bookGenres(genre_id, book_id) VALUES(?,?)", bookidwithgenre)
    #once the above is done once dont want to run again that is why it is commented out
con.commit()

cur.execute('SELECT * FROM bookGenres')
print(cur.fetchall())