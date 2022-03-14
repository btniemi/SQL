CREATE TABLE Consumptions(
id INTEGER PRIMARY KEY AUTOINCREMENT,
recorded_time DATETIME NOT NULL,
dorm_id INTEGER,
electricity BIGINT NOT NULL,
water BIGINT NOT NULL,
floor_number INTEGER,
room_number INTEGER,
FOREIGN KEY (dorm_id) REFERENCES dorms(id)
);

CREATE TABLE Dorms(
id INTEGER PRIMARY KEY AUTOINCREMENT,
name TEXT NOT NULL,
high_res BOOLEAN NOT NULL
);

/*Would track: date and time of a recording or data points, electricity meter usage, water meter usage, floor or dorm, room in dorm, dorm, name of dorm, if dorm is high res or not
 * I would want to track these things as I see them as the most relevant information to store in a dB for this project.
*/