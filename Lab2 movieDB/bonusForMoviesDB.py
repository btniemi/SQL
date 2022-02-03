from faker import Faker

fake = Faker()

# creation of person data
nameList = []
birthdateList = []
for i in range(10):
    nameList.append(fake.name())
    birthdateList.append(fake.date())
person = list(zip(nameList, birthdateList))

# creation of movies data
movieList = ['Taken', 'Pirates of the Caribbean', 'Lord of the Rings', 'Inception']
yearList = []
age_ratingList = []
for i in range(4):
    yearList.append(fake.year())
    age_ratingList.append(fake.word(ext_word_list=['G', 'PG', 'PG-13', 'M']))

movies = list(zip(movieList, yearList, age_ratingList))

# creation of watched data
peopleID = []
movieID = []
stars = []
comments = []
for i in range(15):
    peopleID.append(str(fake.random_int(min=1, max=11)))
    movieID.append(str(fake.random_int(min=1, max=6)))
    stars.append(str(fake.random_int(min=1, max=5)))
    comments.append(fake.word(ext_word_list=['great movie', 'terrible film', 'it was alright', 'not my cup of tea',
                                             'i loved this movies so much']))

watched = list(zip(peopleID, movieID, stars, comments))

# BONUS??? I think this works for in memory database all in a py file just running this works, i assume that if I give the connecting a file to write to and then commit changes this would create the db for me

import sqlite3

con = sqlite3.connect(":memory:")  # could also just do file path to the dB whichever you want if can try do it on another database or create it in memory to test
cur = con.cursor()

# Create Tables
cur.execute('CREATE TABLE peoples('
            'id INTEGER PRIMARY KEY AUTOINCREMENT,'
            'name TEXT NOT NULL,'
            'birthdate DATE)')

cur.execute('CREATE TABLE movies('
            'id INTEGER PRIMARY KEY AUTOINCREMENT,'
            'title TEXT NOT NULL,'
            'releaseYear YEAR,'
            'age_rating TEXT NOT NULL)')

cur.execute('CREATE TABLE watched('
            'id INTEGER PRIMARY KEY AUTOINCREMENT,'
            'people_id INTEGER,'
            'movie_id INTEGER,'
            'stars INTEGER NOT NULL,'
            'comments TEXT NOT NULL,'
            'FOREIGN KEY(people_id) REFERENCES peoples(id),'
            'FOREIGN KEY(movie_id) REFERENCES movies(id))')

# Create Data for tables inserts
cur.executemany('INSERT INTO peoples (name, birthdate) VALUES (?, ?)', person)
cur.executemany('INSERT INTO movies (title, releaseYear, age_rating) VALUES (?, ?, ?)', movies)
cur.executemany('INSERT INTO watched (people_id, movie_id, stars, comments) VALUES (?, ?, ?, ?)', watched)

# check if info was created select statements
cur.execute('SELECT * FROM peoples')
print(cur.fetchall())
cur.execute('SELECT * FROM movies')
print(cur.fetchall())
cur.execute('SELECT * FROM watched')
print(cur.fetchall())

# con.commit() #commits any changes to the database you made through executes I dont think you need this for in memory just if you want to save the changes

con.close() #closes the database file and if in memory nothing gets saved
