--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: category; Type: TABLE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE TABLE category (
    id integer NOT NULL,
    category_name character varying(50) NOT NULL,
    category_description character varying(256) NOT NULL
);


ALTER TABLE category OWNER TO iwjfzqimsmuzao;

--
-- Name: category_id_seq; Type: SEQUENCE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE SEQUENCE category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE category_id_seq OWNER TO iwjfzqimsmuzao;

--
-- Name: category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER SEQUENCE category_id_seq OWNED BY category.id;


--
-- Name: myuser; Type: TABLE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE TABLE myuser (
    id integer NOT NULL,
    user_name character varying(100) NOT NULL,
    user_password character varying(255) NOT NULL,
    user_email character varying(50) NOT NULL,
    user_address character varying(50),
    user_firstname character varying(30) NOT NULL,
    user_lastname character varying(30) NOT NULL
);


ALTER TABLE myuser OWNER TO iwjfzqimsmuzao;

--
-- Name: myuser_id_seq; Type: SEQUENCE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE SEQUENCE myuser_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE myuser_id_seq OWNER TO iwjfzqimsmuzao;

--
-- Name: myuser_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER SEQUENCE myuser_id_seq OWNED BY myuser.id;


--
-- Name: post; Type: TABLE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE TABLE post (
    id integer NOT NULL,
    user_id integer NOT NULL,
    category_id integer NOT NULL,
    post_text text NOT NULL,
    post_date timestamp without time zone NOT NULL,
    post_subject text NOT NULL
);


ALTER TABLE post OWNER TO iwjfzqimsmuzao;

--
-- Name: post_id_seq; Type: SEQUENCE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE SEQUENCE post_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE post_id_seq OWNER TO iwjfzqimsmuzao;

--
-- Name: post_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER SEQUENCE post_id_seq OWNED BY post.id;


--
-- Name: reply; Type: TABLE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE TABLE reply (
    id integer NOT NULL,
    post_id integer NOT NULL,
    user_id integer NOT NULL,
    reply_date timestamp without time zone NOT NULL,
    reply_text text NOT NULL
);


ALTER TABLE reply OWNER TO iwjfzqimsmuzao;

--
-- Name: reply_id_seq; Type: SEQUENCE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE SEQUENCE reply_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE reply_id_seq OWNER TO iwjfzqimsmuzao;

--
-- Name: reply_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER SEQUENCE reply_id_seq OWNED BY reply.id;


--
-- Name: category id; Type: DEFAULT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY category ALTER COLUMN id SET DEFAULT nextval('category_id_seq'::regclass);


--
-- Name: myuser id; Type: DEFAULT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY myuser ALTER COLUMN id SET DEFAULT nextval('myuser_id_seq'::regclass);


--
-- Name: post id; Type: DEFAULT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY post ALTER COLUMN id SET DEFAULT nextval('post_id_seq'::regclass);


--
-- Name: reply id; Type: DEFAULT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY reply ALTER COLUMN id SET DEFAULT nextval('reply_id_seq'::regclass);


--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: iwjfzqimsmuzao
--

COPY category (id, category_name, category_description) FROM stdin;
1	My Testimony	Post your testimony about missionary work
2	Questions about Gospel Teachings	Post your questions about Gospel topics
3	Funny Missionary Stories	Post your entertaining mission stories
4	Gospel Teaching Tips	Post your ideas for teaching the Gospel
5	Dogs	my favorite dog 
\.


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: iwjfzqimsmuzao
--

SELECT pg_catalog.setval('category_id_seq', 5, true);


--
-- Data for Name: myuser; Type: TABLE DATA; Schema: public; Owner: iwjfzqimsmuzao
--

COPY myuser (id, user_name, user_password, user_email, user_address, user_firstname, user_lastname) FROM stdin;
5	lenag	Green_8312	lenadgerasymenko@gmail.com	111 W 7th S 	Lena	Gerasymenko
7	hipHop	green1234	macsimil@ipnet.ua	459 S 5th W APT 92	Max	Bond
8	bebop	green1	lenadgerasymenko@gmail.com	111 w 7th s 	Lena	Geras
9	Mr_Bond	eMh-J5N-Nqq-qMz	voleyball@gmail.com	445 W 111 S # 109	Madison	Holland
1	MR_Bond	123456	test123@gmail.com	459 S 111 W apt 999	Max	Bond
10	hash	$2y$10$1h5BoE0NY7SMrFXxgFPdteztJ4yJh5.qvYgHXudJHmYEHSpPfhwGy	maxgerasymenko@gmail.com	459 S 5th W APT 999	Scot	Film
11	Lena_Bean	$2y$10$zowxm8U/AaoOcUQmtaTyCum.jGTQX74hV51KteES8hDw7fP1cVyPi	macsimil@ipnet.ua	459 S 5th W APT 92	Flin	Hill
12	CS313	$2y$10$I/WzfyXEORlHnR/uXYbmIOyoHQoTAyPcAzWYAAfVWfufhqgdqOooe	test@gmail.com	459 S 5th W APT 92	PHP_DATA	Postgres
\.


--
-- Name: myuser_id_seq; Type: SEQUENCE SET; Schema: public; Owner: iwjfzqimsmuzao
--

SELECT pg_catalog.setval('myuser_id_seq', 12, true);


--
-- Data for Name: post; Type: TABLE DATA; Schema: public; Owner: iwjfzqimsmuzao
--

COPY post (id, user_id, category_id, post_text, post_date, post_subject) FROM stdin;
1	5	2	What are the ten commandments?	2017-02-03 00:00:00	Commandments
3	1	1	We need to love each other!	2017-02-10 00:00:00	Love
8	8	5	tell me why you want a dog	2017-02-11 00:00:00	why dogs?
9	7	5	Describe your favorite dogs??? Please	2017-02-11 00:00:00	Your favorite dogs
10	9	5	Where can I find a great dog?	2017-02-12 00:00:00	I need a dog
11	1	4	How can I become a better listener?	2017-02-13 00:00:00	Listen
12	1	3	FUN FUN FUN	2017-02-13 05:07:37	What about fun
13	1	3	A car seat	2017-02-13 05:08:14	Once upon a time
14	8	2	Suggestions.....	2017-02-14 05:10:22	how I can serve?
16	10	2	Pay tithing with the pure heart?	2017-02-17 06:42:58	Tithing
17	11	4	Any suggestion....???	2017-02-21 04:05:45	how I can become a better listener?
18	12	5	Any great suggestions..... Thanks!	2017-02-22 17:41:42	How can I train my dog?
\.


--
-- Name: post_id_seq; Type: SEQUENCE SET; Schema: public; Owner: iwjfzqimsmuzao
--

SELECT pg_catalog.setval('post_id_seq', 18, true);


--
-- Data for Name: reply; Type: TABLE DATA; Schema: public; Owner: iwjfzqimsmuzao
--

COPY reply (id, post_id, user_id, reply_date, reply_text) FROM stdin;
1	1	1	2017-02-10 06:59:38	We need to follow them!
3	3	6	2017-02-11 04:10:37	Love is great
4	3	6	2017-02-11 04:10:50	love is great
6	3	6	2017-02-11 04:11:51	hi
8	3	7	2017-02-11 04:13:06	What are you doing?
9	3	8	2017-02-11 04:13:13	I'm watching you
10	3	7	2017-02-11 04:13:31	Try to create a post :)
14	9	8	2017-02-11 04:19:13	Teddy!!
15	3	9	2017-02-12 19:10:19	Alma 34:13
16	9	9	2017-02-12 19:11:51	I want to have Teddy
17	9	1	2017-02-13 04:56:45	Big dogs...:))))
18	8	1	2017-02-13 04:57:49	they are fun
20	8	1	2017-02-13 05:51:55	I like playing with them
21	3	1	2017-02-13 05:52:53	I agree
22	3	8	2017-02-14 05:11:17	Help other :)
24	10	1	2017-02-16 18:25:09	My house ;)
25	13	10	2017-02-17 06:42:02	a big fat cat....
27	14	10	2017-02-17 06:43:13	temple work...
28	9	11	2017-02-21 03:54:31	Cute ones.....
29	13	11	2017-02-21 03:55:09	went on a roof.....
30	12	11	2017-02-21 03:56:03	????? hahhahah ?????
31	10	11	2017-02-21 04:06:52	Call me 999 999 99 99
34	11	11	2017-02-21 04:13:24	Do not talk :)
35	9	12	2017-02-22 17:15:11	Nice dogs
36	14	12	2017-02-22 17:44:54	church callings...
\.


--
-- Name: reply_id_seq; Type: SEQUENCE SET; Schema: public; Owner: iwjfzqimsmuzao
--

SELECT pg_catalog.setval('reply_id_seq', 36, true);


--
-- Name: category category_category_name_key; Type: CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY category
    ADD CONSTRAINT category_category_name_key UNIQUE (category_name);


--
-- Name: category category_pkey; Type: CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY category
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);


--
-- Name: myuser myuser_pkey; Type: CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY myuser
    ADD CONSTRAINT myuser_pkey PRIMARY KEY (id);


--
-- Name: myuser myuser_user_name_key; Type: CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY myuser
    ADD CONSTRAINT myuser_user_name_key UNIQUE (user_name);


--
-- Name: post post_pkey; Type: CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY post
    ADD CONSTRAINT post_pkey PRIMARY KEY (id);


--
-- Name: reply reply_pkey; Type: CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY reply
    ADD CONSTRAINT reply_pkey PRIMARY KEY (id);


--
-- Name: reply reply_post_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY reply
    ADD CONSTRAINT reply_post_id_fkey FOREIGN KEY (post_id) REFERENCES post(id);


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO iwjfzqimsmuzao;


--
-- PostgreSQL database dump complete
--

