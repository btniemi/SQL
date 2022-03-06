# did use help from Austin Reichert to understand more about sqlite3 python library and some code help
import sqlite3
con = sqlite3.connect('Joins_part2dB.sqlite.txt')
cur = con.cursor()

genreQuery = []
for row in cur.execute("SELECT * FROM Books;"):
    genreQuery.append(row[3])


#seperate out the stuff here if can with a sustring from email but cant do this because cant get first one
#cur.execute("SELECT substr(genre, 1, instr(genre, '|') -1) as GenreSubString FROM Books")


def beforePipe(string):
    string = string[:string.index('|')] #gets everything up to a pipe character
    return string

def removePipe(string):
    toPipe = string[:string.index('|')] + '|' #removes the element up to and including the pipe
    string = string.replace(toPipe, '')
    return(string)

Genres = []

def getGenresFrom(genre):
    if '|' in genre:
        pipeCount = genre.count('|')
        while pipeCount > 0:
            newGenre = beforePipe(genre)
            Genres.append(newGenre)
            genre = removePipe(genre)
            pipeCount -= 1
        Genres.append(genre)
    else:
        Genres.append(genre)


for element in genreQuery:
    getGenresFrom(element)

uniqueGenres = set(Genres)
uniqueGenresList = list(zip(uniqueGenres))


#cur.execute("CREATE TABLE Genres(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, genre VARCHAR NOT NULL);")
    #table already exists so cant run 2 times

#cur.executemany('INSERT INTO Genres(genre) VALUES(?)', uniqueGenresList)
    #inserts dont want to run again because will add to table 2 times because of the commit statement below
con.commit()

cur.execute("SELECT * FROM Genres")
print(cur.fetchall())


