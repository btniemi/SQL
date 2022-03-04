import sqlite3
con = sqlite3.connect('Joins_part2dB.sqlite.txt')
cur = con.cursor()

cur.execute("SELECT * FROM Books;")

x = cur.fetchall()

for row in cur.execute("SELECT * FROM Books;"):
    print(row[3])

#seperate out the stuff here if can with a sustring from email but cant do this because cant get first one
#cur.execute("SELECT substr(genre, 1, instr(genre, '|') -1) as GenreSubString FROM Books")