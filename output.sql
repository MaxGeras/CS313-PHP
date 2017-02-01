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
-- Name: post; Type: TABLE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE TABLE post (
    id integer NOT NULL,
    user_id integer NOT NULL,
    category_id integer NOT NULL,
    post_text text NOT NULL,
    post_date date NOT NULL,
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
    reaply_newuser integer NOT NULL,
    reply_id_user integer NOT NULL,
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
-- Name: user; Type: TABLE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE TABLE "user" (
    id integer NOT NULL,
    user_name character varying(100) NOT NULL,
    user_password character varying(30) NOT NULL,
    user_email character varying(30) NOT NULL,
    user_address character varying(30),
    user_firstname character varying(20) NOT NULL,
    user_lastname character varying(30) NOT NULL
);


ALTER TABLE "user" OWNER TO iwjfzqimsmuzao;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: iwjfzqimsmuzao
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_id_seq OWNER TO iwjfzqimsmuzao;

--
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- Name: category id; Type: DEFAULT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY category ALTER COLUMN id SET DEFAULT nextval('category_id_seq'::regclass);


--
-- Name: post id; Type: DEFAULT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY post ALTER COLUMN id SET DEFAULT nextval('post_id_seq'::regclass);


--
-- Name: reply id; Type: DEFAULT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY reply ALTER COLUMN id SET DEFAULT nextval('reply_id_seq'::regclass);


--
-- Name: user id; Type: DEFAULT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: iwjfzqimsmuzao
--

COPY category (id, category_name, category_description) FROM stdin;
1	My Testimony	Post your testimony about missionary work
2	Questions about Gospel Teachings	Post your questions about Gospel topics
3	Funny Missionary Stories	Post your entertaining mission stories
4	Gospel Teaching Tips	Post your ideas for teaching the Gospel
\.


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: iwjfzqimsmuzao
--

SELECT pg_catalog.setval('category_id_seq', 4, true);


--
-- Data for Name: post; Type: TABLE DATA; Schema: public; Owner: iwjfzqimsmuzao
--

COPY post (id, user_id, category_id, post_text, post_date, post_subject) FROM stdin;
\.


--
-- Name: post_id_seq; Type: SEQUENCE SET; Schema: public; Owner: iwjfzqimsmuzao
--

SELECT pg_catalog.setval('post_id_seq', 1, false);


--
-- Data for Name: reply; Type: TABLE DATA; Schema: public; Owner: iwjfzqimsmuzao
--

COPY reply (id, reaply_newuser, reply_id_user, reply_text) FROM stdin;
\.


--
-- Name: reply_id_seq; Type: SEQUENCE SET; Schema: public; Owner: iwjfzqimsmuzao
--

SELECT pg_catalog.setval('reply_id_seq', 1, false);


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: iwjfzqimsmuzao
--

COPY "user" (id, user_name, user_password, user_email, user_address, user_firstname, user_lastname) FROM stdin;
\.


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: iwjfzqimsmuzao
--

SELECT pg_catalog.setval('user_id_seq', 1, false);


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
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: user user_user_email_key; Type: CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_user_email_key UNIQUE (user_email);


--
-- Name: user user_user_name_key; Type: CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_user_name_key UNIQUE (user_name);


--
-- Name: user user_user_password_key; Type: CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_user_password_key UNIQUE (user_password);


--
-- Name: post post_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY post
    ADD CONSTRAINT post_user_id_fkey FOREIGN KEY (user_id) REFERENCES "user"(id);


--
-- Name: reply reply_reaply_newuser_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY reply
    ADD CONSTRAINT reply_reaply_newuser_fkey FOREIGN KEY (reaply_newuser) REFERENCES "user"(id);


--
-- Name: reply reply_reply_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: iwjfzqimsmuzao
--

ALTER TABLE ONLY reply
    ADD CONSTRAINT reply_reply_id_user_fkey FOREIGN KEY (reply_id_user) REFERENCES post(id);


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO iwjfzqimsmuzao;


--
-- PostgreSQL database dump complete
--

