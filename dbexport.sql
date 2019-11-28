--
-- PostgreSQL database dump
--

-- Dumped from database version 11.5 (Ubuntu 11.5-1.pgdg18.04+1)
-- Dumped by pg_dump version 11.5 (Ubuntu 11.5-1.pgdg18.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: actor_actor_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.actor_actor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: actors; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.actors (
    id integer NOT NULL,
    first_name character varying(45) NOT NULL,
    last_name character varying(45) NOT NULL,
    birthday date NOT NULL
);


--
-- Name: actors_films; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.actors_films (
    actor_id smallint NOT NULL,
    film_id smallint NOT NULL
);


--
-- Name: actors_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.actors_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: actors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.actors_id_seq OWNED BY public.actors.id;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categories (
    id integer NOT NULL,
    name character varying(255) NOT NULL
);


--
-- Name: categories_films; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categories_films (
    film_id smallint NOT NULL,
    category_id smallint NOT NULL
);


--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- Name: category_category_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.category_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: film_film_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.film_film_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: films; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.films (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    description text,
    release_year date NOT NULL
);


--
-- Name: films_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.films_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: films_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.films_id_seq OWNED BY public.films.id;


--
-- Name: films_producers; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.films_producers (
    film_id smallint NOT NULL,
    producer_id smallint NOT NULL
);


--
-- Name: hall_hall_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.hall_hall_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: halls; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.halls (
    id integer NOT NULL,
    name character varying(100) NOT NULL
);


--
-- Name: halls_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.halls_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: halls_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.halls_id_seq OWNED BY public.halls.id;


--
-- Name: halls_places; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.halls_places (
    hall_id integer NOT NULL,
    place_id integer NOT NULL
);


--
-- Name: phinxlog; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.phinxlog (
    version bigint NOT NULL,
    migration_name character varying(100),
    start_time timestamp without time zone,
    end_time timestamp without time zone,
    breakpoint boolean DEFAULT false NOT NULL
);


--
-- Name: place_place_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.place_place_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: places; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.places (
    id smallint NOT NULL,
    number smallint NOT NULL
);


--
-- Name: places_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.places_id_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: places_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.places_id_seq OWNED BY public.places.id;


--
-- Name: producer_producer_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.producer_producer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: producers; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.producers (
    id integer NOT NULL,
    first_name character varying(45) NOT NULL,
    last_name character varying(45) NOT NULL,
    birthday date NOT NULL
);


--
-- Name: producers_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.producers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: producers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.producers_id_seq OWNED BY public.producers.id;


--
-- Name: session_session_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.session_session_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.sessions (
    id integer DEFAULT nextval('public.session_session_id_seq'::regclass) NOT NULL,
    hall_id smallint NOT NULL,
    start timestamp without time zone NOT NULL,
    finish timestamp without time zone NOT NULL,
    film_id smallint NOT NULL,
    price integer NOT NULL,
    CONSTRAINT start_time_limit_check CHECK ((start > now())),
    CONSTRAINT time_cross_check CHECK ((start < finish))
);


--
-- Name: tickets; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.tickets (
    ticket_id integer NOT NULL,
    price numeric(5,2) NOT NULL,
    sell_time timestamp without time zone DEFAULT now() NOT NULL,
    session_id smallint,
    place_id smallint NOT NULL
);


--
-- Name: tiket_tiket_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.tiket_tiket_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: tikets_tiket_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.tikets_tiket_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: tikets_tiket_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.tikets_tiket_id_seq OWNED BY public.tickets.ticket_id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(255) NOT NULL,
    role character varying(20) NOT NULL,
    created timestamp with time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    modified timestamp without time zone
);


--
-- Name: users_created_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.users_created_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: actors id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.actors ALTER COLUMN id SET DEFAULT nextval('public.actors_id_seq'::regclass);


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: films id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.films ALTER COLUMN id SET DEFAULT nextval('public.films_id_seq'::regclass);


--
-- Name: halls id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.halls ALTER COLUMN id SET DEFAULT nextval('public.halls_id_seq'::regclass);


--
-- Name: places id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.places ALTER COLUMN id SET DEFAULT nextval('public.places_id_seq'::regclass);


--
-- Name: producers id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.producers ALTER COLUMN id SET DEFAULT nextval('public.producers_id_seq'::regclass);


--
-- Name: tickets ticket_id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tickets ALTER COLUMN ticket_id SET DEFAULT nextval('public.tikets_tiket_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: actors; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.actors (id, first_name, last_name, birthday) FROM stdin;
1	FTest_name1	STest_name1	2019-11-09
2	FTest_name2	STest_name2	2019-11-16
3	FTest_name3	STest_name3	2019-11-24
\.


--
-- Data for Name: actors_films; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.actors_films (actor_id, film_id) FROM stdin;
2	5
2	6
2	11
2	3
1	3
3	3
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.categories (id, name) FROM stdin;
1	Test_category
2	Комедия
3	Биография
4	Боевик
5	Мелодрамма
\.


--
-- Data for Name: categories_films; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.categories_films (film_id, category_id) FROM stdin;
3	3
3	2
4	2
3	4
3	1
\.


--
-- Data for Name: films; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.films (id, title, description, release_year) FROM stdin;
1	Test-film	twst	2019-11-09
2	Test-film1	ttt	2019-11-09
3	Зеленая книга	Фильм расскажет о турне именитого джазового пианиста доктора Дона Ширли, взявшего себе в водители и охранники максимально неподходящего на данную роль попутчика.\r\n\r\nСам он - настоящий светский лев, стильный и утончённый музыкант с чувством вкуса, талантливый виртуоз клавишных инструментов, отправившийся в гастрольное путешествие. В турне никак не обойтись без водителя, но Тони "Болтун" меньше всего подходит для подобного дела - неотёсанный вышибала, который даже вилку с ножом правильно держать не может, его регулярно тянет поговорить - иначе как бы он заслужил такое своё прозвище, в общем, главное - что Тони крепок, могуч и может кулаками постоять за своего обидчика в период нелёгкой жизни темнокожих в США, даже из числа звёзд и прославившихся знаменитостей. А потому впереди их ждёт удивительное путешествие, меняющее их жизни.	2019-01-24
4	Test-film3	sadasd	2019-11-16
5	Test-film4	sdasd	2019-11-16
6	Test-film5	ssad	2019-11-19
11	Test-film7	ssssss	2019-11-19
\.


--
-- Data for Name: films_producers; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.films_producers (film_id, producer_id) FROM stdin;
3	1
\.


--
-- Data for Name: halls; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.halls (id, name) FROM stdin;
1	1
2	2
3	3
\.


--
-- Data for Name: halls_places; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.halls_places (hall_id, place_id) FROM stdin;
\.


--
-- Data for Name: phinxlog; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.phinxlog (version, migration_name, start_time, end_time, breakpoint) FROM stdin;
\.


--
-- Data for Name: places; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.places (id, number) FROM stdin;
11	1
12	2
13	3
14	4
15	5
16	6
17	7
18	8
19	9
20	10
21	11
22	12
\.


--
-- Data for Name: producers; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.producers (id, first_name, last_name, birthday) FROM stdin;
1	FTest_name1	STest_name1	2019-11-09
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.sessions (id, hall_id, start, finish, film_id, price) FROM stdin;
38	2	2019-11-30 15:18:00	2019-12-24 16:18:00	11	100
36	2	2019-11-25 21:00:00	2019-12-17 23:00:00	2	50
35	1	2019-11-25 10:00:00	2019-11-25 12:00:00	1	20
37	1	2019-11-25 10:00:00	2019-12-18 11:00:00	1	30
\.


--
-- Data for Name: tickets; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tickets (ticket_id, price, sell_time, session_id, place_id) FROM stdin;
3	100.00	2019-11-24 20:59:44.97145	38	11
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.users (id, username, password, role, created, modified) FROM stdin;
1	Test_name1	$2y$10$gEscxF7JOX4KM/l4BhQP2Oy7YxvffLFeed.P0JUCS.47Cn4z9yGAK	moderator	2019-11-09 19:46:56.406576+00	\N
2	Test_name	$2y$10$xtMwDhnU7TpmwJmbqVyjWOIRanjef518X3hU8RRidTtVdVWmwX1mq	cashier	2019-11-09 19:47:26.658173+00	\N
4	Tadmin	$2y$10$jAHKPn5TfUrqZrAYbL92Jejjqhr8pXQJ5MlY6//05EQ54eiShvM9m	admin	2019-11-27 21:54:17.478084+00	\N
\.


--
-- Name: actor_actor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.actor_actor_id_seq', 5, true);


--
-- Name: actors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.actors_id_seq', 3, true);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.categories_id_seq', 5, true);


--
-- Name: category_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.category_category_id_seq', 6, true);


--
-- Name: film_film_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.film_film_id_seq', 10, true);


--
-- Name: films_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.films_id_seq', 11, true);


--
-- Name: hall_hall_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.hall_hall_id_seq', 3, true);


--
-- Name: halls_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.halls_id_seq', 3, true);


--
-- Name: place_place_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.place_place_id_seq', 1, false);


--
-- Name: places_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.places_id_seq', 22, true);


--
-- Name: producer_producer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.producer_producer_id_seq', 2, true);


--
-- Name: producers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.producers_id_seq', 1, true);


--
-- Name: session_session_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.session_session_id_seq', 39, true);


--
-- Name: tiket_tiket_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tiket_tiket_id_seq', 1, true);


--
-- Name: tikets_tiket_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tikets_tiket_id_seq', 3, true);


--
-- Name: users_created_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_created_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_id_seq', 5, true);


--
-- Name: actors_films actors_films_actors_id_pk_films_id_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.actors_films
    ADD CONSTRAINT actors_films_actors_id_pk_films_id_pk PRIMARY KEY (actor_id, film_id);


--
-- Name: actors actors_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.actors
    ADD CONSTRAINT actors_pk PRIMARY KEY (id);


--
-- Name: categories_films categories_films_film_id_pk_category_id_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categories_films
    ADD CONSTRAINT categories_films_film_id_pk_category_id_pk PRIMARY KEY (film_id, category_id);


--
-- Name: categories categories_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pk PRIMARY KEY (id);


--
-- Name: films films_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.films
    ADD CONSTRAINT films_pk PRIMARY KEY (id);


--
-- Name: films_producers films_producers_film_id_pk_producer_id-pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.films_producers
    ADD CONSTRAINT "films_producers_film_id_pk_producer_id-pk" PRIMARY KEY (film_id, producer_id);


--
-- Name: halls halls_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.halls
    ADD CONSTRAINT halls_pk PRIMARY KEY (id);


--
-- Name: halls_places halls_places_halls_id_pk-places_id_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.halls_places
    ADD CONSTRAINT "halls_places_halls_id_pk-places_id_pk" PRIMARY KEY (hall_id, place_id);


--
-- Name: phinxlog phinxlog_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.phinxlog
    ADD CONSTRAINT phinxlog_pkey PRIMARY KEY (version);


--
-- Name: places places_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.places
    ADD CONSTRAINT places_pkey PRIMARY KEY (id);


--
-- Name: producers producers_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.producers
    ADD CONSTRAINT producers_pk PRIMARY KEY (id);


--
-- Name: sessions session_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT session_pkey PRIMARY KEY (id);


--
-- Name: tickets tickets_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tickets_pk PRIMARY KEY (ticket_id);


--
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk PRIMARY KEY (id);


--
-- Name: actors_films_actor_id_uindex; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX actors_films_actor_id_uindex ON public.actors_films USING btree (actor_id, film_id);


--
-- Name: actors_id_uindex; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX actors_id_uindex ON public.actors USING btree (id);


--
-- Name: categories_id_uindex; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX categories_id_uindex ON public.categories USING btree (id);


--
-- Name: category_films_category_id_uindex; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX category_films_category_id_uindex ON public.categories_films USING btree (category_id, film_id);


--
-- Name: films_id_uindex; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX films_id_uindex ON public.films USING btree (id);


--
-- Name: hall_name_uindex; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX hall_name_uindex ON public.halls USING btree (name);


--
-- Name: halls_id_uindex; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX halls_id_uindex ON public.halls USING btree (id);


--
-- Name: places_number_uindex; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX places_number_uindex ON public.places USING btree (number);


--
-- Name: producers_id_uindex; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX producers_id_uindex ON public.producers USING btree (id);


--
-- Name: actors_films film_actor_actor_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.actors_films
    ADD CONSTRAINT film_actor_actor_id_fkey FOREIGN KEY (actor_id) REFERENCES public.actors(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: actors_films film_actor_film_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.actors_films
    ADD CONSTRAINT film_actor_film_id_fkey FOREIGN KEY (film_id) REFERENCES public.films(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: categories_films film_categories_category_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categories_films
    ADD CONSTRAINT film_categories_category_id_fkey FOREIGN KEY (category_id) REFERENCES public.categories(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: categories_films film_categories_film_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categories_films
    ADD CONSTRAINT film_categories_film_id_fkey FOREIGN KEY (film_id) REFERENCES public.films(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: films_producers film_producers_film_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.films_producers
    ADD CONSTRAINT film_producers_film_id_fkey FOREIGN KEY (film_id) REFERENCES public.films(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: films_producers film_producers_producer_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.films_producers
    ADD CONSTRAINT film_producers_producer_id_fkey FOREIGN KEY (producer_id) REFERENCES public.producers(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: sessions fk_hall; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT fk_hall FOREIGN KEY (hall_id) REFERENCES public.halls(id);


--
-- Name: halls_places halls_places_halls_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.halls_places
    ADD CONSTRAINT halls_places_halls_id_fk FOREIGN KEY (hall_id) REFERENCES public.halls(id);


--
-- Name: halls_places halls_places_places_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.halls_places
    ADD CONSTRAINT halls_places_places_id_fk FOREIGN KEY (place_id) REFERENCES public.places(id);


--
-- Name: sessions session_film_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT session_film_fk FOREIGN KEY (film_id) REFERENCES public.films(id);


--
-- Name: tickets tiket_place_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tiket_place_fk FOREIGN KEY (place_id) REFERENCES public.places(id);


--
-- Name: tickets tiket_session_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tickets
    ADD CONSTRAINT tiket_session_fk FOREIGN KEY (session_id) REFERENCES public.sessions(id);


--
-- PostgreSQL database dump complete
--

