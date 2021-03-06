Command line: psql -U postgres


CREATE TABLE public.type 
(
	id SERIAL PRIMARY KEY NOT NULL,
	name VARCHAR(50)

);

CREATE TABLE race
(
   id SERIAL PRIMARY KEY NOT NULL,
   type_id INT REFERENCES type(id) NOT NULL,
   location VARCHAR(100) NOT NULL,
   name VARCHAR(100) NOT NULL,
   date DATE NOT NULL	
);

CREATE TABLE Scriptures
(
   id SERIAL PRIMARY KEY NOT NULL,
   book VARCHAR(100) NOT NULL,
   chapter SMALLINT NOT NULL,
   verse SMALLINT NOT NULL,
   content TEXT NOT NULL	
);


INSERT INTO type(name) VALUES ('Marathon');
INSERT INTO race(type_id, location, name, date)
   VALUES(1, 'Rexburg, ID', 'Web Enginnering Marathon', '2017-04-06');
     INSERT INTO category(category_name, category_description) VALUES('My Testimony', 'Post your testimony about missionary work');
     INSERT INTO category(category_name, category_description) VALUES('Questions about Gospel Teachings', 'Post your questions about Gospel topics');
     INSERT INTO category(category_name, category_description) VALUES('Funny Missionary Stories', 'Post your entertaining mission stories');
     INSERT INTO category(category_name, category_description) VALUES('Gospel Teaching Tips', 'Post your ideas for teaching the Gospel');

///////////////////////////////////// week 04 ////////////////////////////////////////////////////////////////////////

CREATE TABLE public.myuser
(
   id             SERIAL       PRIMARY KEY NOT NULL ,
   user_name      VARCHAR(50)  NOT NULL UNIQUE,
   user_password  VARCHAR(50)  NOT NULL ,
   user_email     VARCHAR(50)  NOT NULL ,
   user_address   VARCHAR(50),
   user_firstname VARCHAR(30) NOT NULL,
   user_lastname  VARCHAR(30) NOT NULL
);

CREATE TABLE public.category
(
  id SERIAL PRIMARY KEY NOT NULL ,
  category_name        VARCHAR(50) NOT NULL UNIQUE,
  category_description VARCHAR(256) NOT NULL
);

  CREATE TABLE public.post
  (
    id SERIAL PRIMARY KEY NOT NULL ,
    user_id INT REFERENCES public.myuser(id) NOT NULL,
    category_id INT REFERENCES public.category(id) NOT NULL,
    post_text TEXT NOT NULL,
    post_date Timestamp NOT NULL,
    post_subject TEXT NOT NULL
  );    

CREATE TABLE public.reply
(
  id SERIAL PRIMARY KEY NOT NULL ,
  post_id INT REFERENCES public.post(id) NOT NULL,
  user_id INT NOT NULL,
  reply_date Timestamp NOT NULL,
  reply_text TEXT NOT NULL
);


#///////////////////////////////////////////////////////////////////MY FORUM//////////////////////////////////////////////


 INSERT INTO Scriptures(book,chapter,verse, content) VALUES ('Doctrine and Covenants', 88 , 49 , 'The light shineth in darkness, and the darkness comprehendeth it not); nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him' );

  INSERT INTO Scriptures VALUES ('Doctrine and Covenants', 93 , 28 , 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things');

   INSERT INTO Scriptures VALUES ('Mosiah', 16 , 9 , 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death');



   CREATE DATABASE db_scriptures;

   CREATE TABLE Scriptures
(
   id SERIAL PRIMARY KEY NOT NULL,
   book VARCHAR(100) NOT NULL,
   chapter SMALLINT NOT NULL,
   verse SMALLINT NOT NULL,
   content TEXT NOT NULL	
);


INSERT INTO Scriptures(book,chapter,verse, content)
VALUES ('John', 1 , 5, 'The light shineth in darkness, and the darkness comprehendeth it not');
INSERT INTO Scriptures(book,chapter,verse, content)
VALUES ('Doctrine and Covenants', 88 , 49 , 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him');
INSERT INTO Scriptures(book,chapter,verse, content)
VALUES ('Doctrine and Covenants', 93 , 28 , 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things');
INSERT INTO Scriptures(book,chapter,verse, content)
VALUES ('Mosiah', 16 , 29 , 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death');





CREATE TABLE movie
(
  id SERIAL PRIMARY KEY NOT NULL,
  title VARCHAR(100) NOT NULL,
  length SMALLINT,
  year SMALLINT,
  rating VARCHAR(10) 
);

CREATE TABLE actor
(
  id SERIAL PRIMARY KEY NOT NULL,
  name VARCHAR(100) NOT NULL
);

CREATE TABLE movie_actor
(
   id SERIAL PRIMARY KEY NOT NULL,
   movie_id INT NOT NULL REFERENCES movie(id),
   actor_id INT NOT NULL REFERENCES actor(id),
   character VARCHAR(100) 
);


INSERT INTO movie(title, length, year, rating) 
VALUES ('STAR WArs IV: A New Hope', NULL, 1977, 'PG');


INSERT INTO movie(title, rating) 
VALUES ('Indiana Jones and The last Crusade', 'PG-13');

UPDATE movie SET year=1989 WHERE id=2;
SELECT * FROM movie WHERE rating = 'PG';

INSERT INTO actor(name) 
VALUES ('Mark Hamill'), ('Harrison Ford'), ('Carrie John'), ('Mark John');

INSERT INTO movie_actor(movie_id, actor_id, character)
VALUES (1,1,'Luke Skywalker'), (1,2,'Han Solo'), (1,3, 'Princess Lie'), 
(2, 2, 'Indiana Jones'), (2,4, 'Henry Jones Sr.');


SELECT * FROM movie m INNER JOIN movie_actor ma ON m.id = ma.movie_id;


SELECT title FROM movie m INNER JOIN movie_actor ma ON m.id = ma.movie_id INNER JOIN actor a ON a.id = ma.actor_id
where a.name = 'Mark Hamill';


CREATE USER php_movie_guy WITH PASSWORD 'orange';
GRANT SELECT, INSERT, UPDATE ON ALL TABLES IN SCHEMA public TO php_movie_guy;

// My Command
 SELECT * FROM public.myuser m INNER JOIN public.post ma ON m.id = ma.user_id INNER JOIN public.category ca ON ca.id = ma.category_id;

 SELECT * FROM public.myuser m INNER JOIN public.post ma ON m.id = ma.user_id;



CREATE TABLE topic
(
  id SERIAL PRIMARY KEY NOT NULL,
  name VARCHAR(50) NOT NULL
);

CREATE TABLE scripture_topic
(
   scr_id INT NOT NULL REFERENCES scripture(id),
   top_id INT NOT NULL REFERENCES topic(id)
);

CREATE DATABASE notebok;

CREATE TABLE course
(
  id SERIAL PRIMARY KEY NOT NULL,
  name VARCHAR(80) NOT NULL UNIQUE,
  number VARCHAR(10) NOT NULL UNIQUE
);

CREATE TABLE note
(
  id SERIAL PRIMARY KEY NOT NULL,
  course_id INT NOT NULL REFERENCES course(id),
  content TEXT NOT NULL,
  date DATE NOT NULL     
);

CREATE USER note_user WITH PASSWORD 'orange';
GRANT INSERT, SELECT, UPDATE, DELETE ON ALL TABLES IN SCHEMA public TO note_user;
GRANT USAGE, SELECT ON ALL SEQUENCEs IN SCHEMA public TO note_user;    


INSERT INTO course(name, number) VALUES ('Web Enginnering II', 'CS 313'); 
INSERT INTO note(course_id, content, date) VALUES (1, 'Learing about PHP. It''s really cool', '2017-02-09');