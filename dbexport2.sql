--
-- PostgreSQL database dump
--

-- Dumped from database version 10.5 (Ubuntu 10.5-0ubuntu0.18.04)
-- Dumped by pg_dump version 10.5 (Ubuntu 10.5-0ubuntu0.18.04)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


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
    id integer DEFAULT nextval('public.actor_actor_id_seq'::regclass) NOT NULL,
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
-- Name: category_category_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.category_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.categories (
    id integer DEFAULT nextval('public.category_category_id_seq'::regclass) NOT NULL,
    name character varying(255) NOT NULL
);


--
-- Name: category_films; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.category_films (
    film_id smallint NOT NULL,
    category_id smallint NOT NULL
);


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
    id integer DEFAULT nextval('public.film_film_id_seq'::regclass) NOT NULL,
    title character varying(255) NOT NULL,
    description text,
    release_year date NOT NULL
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
    id integer DEFAULT nextval('public.hall_hall_id_seq'::regclass) NOT NULL,
    name character varying(100) NOT NULL
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
-- Name: producer_films; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.producer_films (
    film_id smallint NOT NULL,
    proucer_id smallint NOT NULL
);


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
    id integer DEFAULT nextval('public.producer_producer_id_seq'::regclass) NOT NULL,
    first_name character varying(45) NOT NULL,
    last_name character varying(45) NOT NULL,
    birthday date NOT NULL
);


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
    CONSTRAINT start_time_limit_check CHECK ((start > now())),
    CONSTRAINT time_cross_check CHECK ((start < finish))
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
-- Name: tikets; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.tikets (
    tiket_id integer DEFAULT nextval('public.tiket_tiket_id_seq'::regclass) NOT NULL,
    price numeric(5,2) NOT NULL,
    sell_time timestamp without time zone DEFAULT now() NOT NULL,
    session_id smallint,
    place_id smallint
);


--
-- Name: users; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(255) NOT NULL,
    role character varying(20) NOT NULL,
    created timestamp without time zone NOT NULL,
    modified timestamp without time zone
);


--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.users_id_seq
    AS integer
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
-- Name: places id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.places ALTER COLUMN id SET DEFAULT nextval('public.places_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: actors; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.actors (id, first_name, last_name, birthday) FROM stdin;
1	Nicolas	Kage	1965-04-24
4	Alex	Born	1985-03-16
5	John	Dorian	1975-03-16
\.


--
-- Data for Name: actors_films; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.actors_films (actor_id, film_id) FROM stdin;
1	1
1	2
1	3
4	3
5	3
4	1
5	1
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.categories (id, name) FROM stdin;
2	Хорроры
3	Боевик
4	Драмма
1	Комедия
\.


--
-- Data for Name: category_films; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.category_films (film_id, category_id) FROM stdin;
\.


--
-- Data for Name: films; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.films (id, title, description, release_year) FROM stdin;
1	Властелин колец: Братство кольца	Приключенческая картина является первой частью кинотрилогии, снятой по роману известного английского писателя Джона Рональда Руэл Толкина «Властелин колец». Выйдя в мировой прокат, картина собрала почти один миллиард долларов, а так же получила огромное количество всевозможных наград, в том числе и четыре «Оскара».\r\nПо сюжету фильма темный властелин Саурон отковывает магическое Кольцо Всевластия, которое должно покорить все народы. Но в одной из битв кольцо было утрачено, и спустя долгие годы оно попадает в руки к одному из представителей народа хоббитов – Бильбо Бэггинсу. О своей находке он рассказывает своему давнему другу волшебнику Гэндельфу. Оказывается, что оно принадлежало Саурону, и тому, кто им владеет, кольцо дает невиданную власть и могущество. И теперь старый хозяин намерен его вернуть, чтобы стать владыкой Средиземья. Чтобы этого не произошло кольцо нужно уничтожить, но сделать это далеко непросто.	2019-02-03
2	Властелин колец: Две крепости	Приключенческий фильм, вышедший на экраны в 2002 году – это вторая часть кинотрилогии, снятой по роману известного английского писателя Джона Рональда Руэл Толкина «Властелин колец». Фильм продолжает рассказывать о хоббитах Фродо и Сэме, держащих свой путь в самое сердце Мордора, чтобы в пламени Роковой горы уничтожить злополучное Кольцо Всевластия. В этом долгом и опасном путешествии их проводником выступает странное существо Голлум, которое некогда было хоббитом.\r\nВ это время, так называемое «Братство кольца» теряет силы, и, лишившись вожаков, начинает распадаться. Так же происходит большое сражение между силами Света и ордами орков Саурона, в котором добру, хоть и с большим усилием, но удается одержать победу. Однако это лишь победа в одном сражении, а решающая битва еще впереди.\r\n	2019-02-04
3	Властелин колец: Возвращение Короля	Приключенческий фильм «Властелин колец: Возвращение Короля» - это заключительная часть трилогии, снятой новозеландским режиссером Питером Джексоном по роману известного английского писателя Дж. Р. Р. Толкина «Властелин колец». \r\nОтважные хоббиты Фродо и Сэм, благодаря невероятной выдержке и выносливости, почти достигли своей цели. В это самое время темный владыка Саурон направляет несметные полчища орков к стенам города королей – Минас-Тирита. В результате грандиозного сражения силам добра снова удается одержать победу в битве. Однако исход всей войны зависит именно от тех самых двух хоббитов, ведь если они не смогут уничтожить кольцо, то все жертвы будут напрасны.\r\n	2019-02-04
10	Test-film	sss	2019-08-15
\.


--
-- Data for Name: halls; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.halls (id, name) FROM stdin;
1	Hall A 
2	Hall B
3	Hall c
\.


--
-- Data for Name: phinxlog; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.phinxlog (version, migration_name, start_time, end_time, breakpoint) FROM stdin;
20190222112822	Actors	2019-02-22 11:28:22	2019-02-22 11:28:22	f
20190222125108	Catigories	2019-02-22 12:51:09	2019-02-22 12:51:09	f
20190222125437	Categories	2019-02-22 12:54:37	2019-02-22 12:54:37	f
20190222130444	Categories	2019-02-22 13:04:44	2019-02-22 13:04:44	f
20190222144217	Producers	2019-02-22 14:42:17	2019-02-22 14:42:17	f
20190805181952	CreateUsers	2019-08-08 10:53:48	2019-08-08 10:53:49	f
\.


--
-- Data for Name: places; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.places (id, number) FROM stdin;
1	1
2	2
3	3
4	4
5	5
6	6
7	7
8	8
9	9
10	10
\.


--
-- Data for Name: producer_films; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.producer_films (film_id, proucer_id) FROM stdin;
\.


--
-- Data for Name: producers; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.producers (id, first_name, last_name, birthday) FROM stdin;
1	Steeven	Spelberg	2019-04-04
2	Brews	Willis	2014-09-12
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.sessions (id, hall_id, start, finish, film_id) FROM stdin;
\.


--
-- Data for Name: tikets; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.tikets (tiket_id, price, sell_time, session_id, place_id) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.users (id, username, password, role, created, modified) FROM stdin;
1	Test_name	$2y$10$MauM2BNVfSAqi40iSsz4Yuug8Et9ASVGpmfDMf5vDyWSa4tsEgz16	admin	2019-08-30 10:51:16.138	\N
2	Test_name1	$2y$10$j4Mxo.6NxTALWn7x.NtXHedcD.JCtMRTcnVv8NDpuj25gaokwh21K	moderator	2019-08-30 10:51:13.364	\N
3	Test_name2	$2y$10$H3l0ZlU05aNDBi/FItFvYuLX17LOH05VNiZst8cgywRzJrKRoN7Uu	cashier	2019-08-30 10:51:17.161	\N
\.


--
-- Name: actor_actor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.actor_actor_id_seq', 5, true);


--
-- Name: category_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.category_category_id_seq', 6, true);


--
-- Name: film_film_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.film_film_id_seq', 10, true);


--
-- Name: hall_hall_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.hall_hall_id_seq', 3, true);


--
-- Name: place_place_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.place_place_id_seq', 1, false);


--
-- Name: places_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.places_id_seq', 10, true);


--
-- Name: producer_producer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.producer_producer_id_seq', 2, true);


--
-- Name: session_session_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.session_session_id_seq', 33, true);


--
-- Name: tiket_tiket_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.tiket_tiket_id_seq', 1, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.users_id_seq', 3, true);


--
-- Name: actors actor_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.actors
    ADD CONSTRAINT actor_pkey PRIMARY KEY (id);


--
-- Name: categories category_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);


--
-- Name: actors_films film_actor_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.actors_films
    ADD CONSTRAINT film_actor_pkey PRIMARY KEY (actor_id, film_id);


--
-- Name: category_films film_category_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.category_films
    ADD CONSTRAINT film_category_pkey PRIMARY KEY (film_id, category_id);


--
-- Name: films film_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.films
    ADD CONSTRAINT film_pkey PRIMARY KEY (id);


--
-- Name: producer_films film_producer_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.producer_films
    ADD CONSTRAINT film_producer_pkey PRIMARY KEY (film_id, proucer_id);


--
-- Name: halls hall_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.halls
    ADD CONSTRAINT hall_pkey PRIMARY KEY (id);


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
-- Name: producers producer_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.producers
    ADD CONSTRAINT producer_pkey PRIMARY KEY (id);


--
-- Name: sessions session_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT session_pkey PRIMARY KEY (id);


--
-- Name: tikets tiket_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tikets
    ADD CONSTRAINT tiket_pkey PRIMARY KEY (tiket_id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: hall_name_uindex; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX hall_name_uindex ON public.halls USING btree (name);


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
-- Name: category_films film_categories_category_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.category_films
    ADD CONSTRAINT film_categories_category_id_fkey FOREIGN KEY (category_id) REFERENCES public.categories(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: category_films film_categories_film_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.category_films
    ADD CONSTRAINT film_categories_film_id_fkey FOREIGN KEY (film_id) REFERENCES public.films(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: producer_films film_producers_film_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.producer_films
    ADD CONSTRAINT film_producers_film_id_fkey FOREIGN KEY (film_id) REFERENCES public.films(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: producer_films film_producers_producer_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.producer_films
    ADD CONSTRAINT film_producers_producer_id_fkey FOREIGN KEY (proucer_id) REFERENCES public.producers(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- Name: sessions fk_hall; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT fk_hall FOREIGN KEY (hall_id) REFERENCES public.halls(id);


--
-- Name: sessions session_film_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT session_film_fk FOREIGN KEY (film_id) REFERENCES public.films(id);


--
-- Name: tikets tiket_place_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tikets
    ADD CONSTRAINT tiket_place_fk FOREIGN KEY (place_id) REFERENCES public.places(id);


--
-- Name: tikets tiket_session_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.tikets
    ADD CONSTRAINT tiket_session_fk FOREIGN KEY (session_id) REFERENCES public.sessions(id);


--
-- PostgreSQL database dump complete
--

