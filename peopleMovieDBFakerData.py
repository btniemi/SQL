from faker import Faker
fake = Faker()

print(fake.name())
print(fake.date())
print(fake.year())
# movie title like this maybe?
print(fake.text(max_nb_chars=20, ext_word_list=["hello", "epic", "the", "Sidewinder"]))
print(fake.sentence(nb_words=10))
# age_rating just need letter from a group of letter to choose from
print(fake.word(ext_word_list=['G', 'PG', 'PG-13', 'M']))
# number of starts so need an int out of 5
print(fake.random_int(min=1, max=5))

#now we have to loop those useing this structure
    #   Faker.seed(0)
    #   for _ in range(#):
    #       call the fake.whatever and it will generate those for you.

#then its just getting that to either import into the database with the other documentation if can figure that out or through an INSERT STATEMENT
#maybe do like 10 of these of like 20???

#read that doc again but i think it makese sense that you can do all this faker stuff save it off into a list of those and then execute that in the consule Qmark style
#might need to finangle with the saving of list and how to get it to work properly see qmark section for that example maybe a combination of the two could work from insert statement and executemany()