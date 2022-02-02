# Collaborated with Austin Reichert with help how to create the inserts and also on some of the SQL getting database to work

from faker import Faker

fake = Faker()

# print(fake.name())
# print(fake.date())
# print(fake.year())

# movie title like this maybe?
# print(fake.text(max_nb_chars=20, ext_word_list=["hello", "epic", "the", "Sidewinder"]))
# print(fake.sentence(ext_word_list=['great movie', 'terrible film', 'it was alright', 'not my cup of tea', 'i loved this movies so much']))
# print(fake.sentence(nb_words=10))

# age_rating just need letter from a group of letter to choose from
# print(fake.word(ext_word_list=['G', 'PG', 'PG-13', 'M']))

# number of starts so need an int out of 5
# print(fake.random_int(min=1, max=5))

# now we have to loop those using this structure
#   Faker.seed(0)
#   for _ in range(#):
#       call the fake.whatever and it will generate those for you.


def generatePeople():
    return ("INSERT INTO peoples (name, birthdate) VALUES ('" + fake.name() + "' , '" + fake.date() + "')")

for i in range(10):
    print(generatePeople())


def generateMovies():
    movieList = ['Taken', 'Pirates of the Caribbean', 'Lord of the Rings', 'Inception']
    for i in range(len(movieList)):
        print("INSERT INTO movies (title, releaseYear, age_rating) VALUES ('" + movieList[i] + "' , '" + fake.year() + "' , '" + fake.word(ext_word_list=['G', 'PG', 'PG-13', 'M']) + "')")

generateMovies()

def generateWatchedMovies():
    return ("INSERT INTO watched (people_id, movie_id, stars, comments) VALUES (" + str(fake.random_int(min=1, max=11)) + " , " + str(fake.random_int(min=1, max=6)) + " , " + str(fake.random_int(min=1, max=5)) + " , '" + fake.word(ext_word_list=['great movie', 'terrible film', 'it was alright', 'not my cup of tea', 'i loved this movies so much']) + "')")

for i in range(15):
    print(generateWatchedMovies())


