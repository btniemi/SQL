from faker import Faker
fake = Faker()

#creation of person data
nameList = []
birthdateList = []
for i in range(10):
    nameList.append(fake.name())
    birthdateList.append(fake.date())
person = list(zip(nameList, birthdateList))

#creation of movies data
movieList = ['Taken', 'Pirates of the Caribbean', 'Lord of the Rings', 'Inception']
yearList = []
age_ratingList = []
for i in range(4):
    yearList.append(fake.year())
    age_ratingList.append(fake.word(ext_word_list=['G', 'PG', 'PG-13', 'M']))

movies = list(zip(movieList, yearList, age_ratingList))

#creation of watched data
peopleID = []
movieID = []
stars = []
comments = []
for i in range(15):
    peopleID.append(str(fake.random_int(min=1, max=11)))
    movieID.append(str(fake.random_int(min=1, max=6)))
    stars.append(str(fake.random_int(min=1, max=5)))
    comments.append(fake.word(ext_word_list=['great movie', 'terrible film', 'it was alright', 'not my cup of tea','i loved this movies so much']))

watched = list(zip(peopleID, movieID, stars, comments))




# BONUS??? I THINK THIS IS HOW YOU CAN INSERT THE DATA DIRECTLY but i did not get time to try it out...i think you would do all this in CMD line terminal with powershell
"""
import sqlite3

con = sqlite3.connect('peopleMovieDatabase.sqlite.txt') #could also just do file path to the dB whichever you want if can try do it on another database or create it in memory to test
cur = con.cursor()
cur.executemany('INSERT INTO peoples (name, birthdate) VALUES (?, ?)", person)
cur.executemany("INSERT INTO movies (title, releaseYear, age_rating) VALUES (?, ?, ?)", movies)
cur.executemany("INSERT INTO watched (people_id, movie_id, stars, comments) VALUES (?, ?, ?, ?)", watched)

cur.execute() #use this to do selects and check database for your changes if need be

con.commit() #commits any changes to the database you made through executes

con.close() #closes the database

"""
