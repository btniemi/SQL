#THIS FILE DOES NOT WORK ERROR cur.execute("ALTER TABLE Books DROP COLUMN genre;")
                                #sqlite3.OperationalError: near "DROP": syntax error
#i am really confused as to why???

import sqlite3

con = sqlite3.connect('Joins_part2dB.sqlite.txt')
cur = con.cursor()

cur.execute("ALTER TABLE Books DROP COLUMN genre;") #WHY WONT THIS WORK???
