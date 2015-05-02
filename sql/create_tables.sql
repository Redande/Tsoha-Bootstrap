CREATE TABLE Account(
	id SERIAL PRIMARY KEY,
	username varchar(15) NOT NULL,
	password varchar(15) NOT NULL
);

CREATE TABLE Hero(
	id SERIAL PRIMARY KEY,
	name varchar(15) NOT NULL
);

CREATE TABLE Role(
	id SERIAL PRIMARY KEY,
	name varchar(15) NOT NULL,
	description varchar(100) NOT NULL
);

CREATE TABLE JoinTable(
	id SERIAL PRIMARY KEY,
	hero INTEGER REFERENCES Hero(id) NOT NULL,
	role INTEGER REFERENCES Role(id) NOT NULL
);