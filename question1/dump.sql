--
-- PostgreSQL database dump
--

-- Dumped from database version 11.0 (Debian 11.0-1.pgdg90+2)
-- Dumped by pg_dump version 11.0 (Debian 11.0-1.pgdg90+2)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: customer; Type: TABLE; Schema: public; Owner: default
--

CREATE TABLE public.customer (
    customer_id integer NOT NULL,
    lot_id integer,
    tax smallint
);


ALTER TABLE public.customer OWNER TO "default";

--
-- Name: customer_customer_id_seq; Type: SEQUENCE; Schema: public; Owner: default
--

CREATE SEQUENCE public.customer_customer_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.customer_customer_id_seq OWNER TO "default";

--
-- Name: customer_customer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: default
--

ALTER SEQUENCE public.customer_customer_id_seq OWNED BY public.customer.customer_id;


--
-- Name: lot; Type: TABLE; Schema: public; Owner: default
--

CREATE TABLE public.lot (
    lot_id integer NOT NULL,
    procedure_id integer,
    tax smallint
);


ALTER TABLE public.lot OWNER TO "default";

--
-- Name: lot_lot_id_seq; Type: SEQUENCE; Schema: public; Owner: default
--

CREATE SEQUENCE public.lot_lot_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lot_lot_id_seq OWNER TO "default";

--
-- Name: lot_lot_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: default
--

ALTER SEQUENCE public.lot_lot_id_seq OWNED BY public.lot.lot_id;


--
-- Name: procedure; Type: TABLE; Schema: public; Owner: default
--

CREATE TABLE public.procedure (
    procedure_id integer NOT NULL,
    name character varying(100)
);


ALTER TABLE public.procedure OWNER TO "default";

--
-- Name: procedure_procedure_id_seq; Type: SEQUENCE; Schema: public; Owner: default
--

CREATE SEQUENCE public.procedure_procedure_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.procedure_procedure_id_seq OWNER TO "default";

--
-- Name: procedure_procedure_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: default
--

ALTER SEQUENCE public.procedure_procedure_id_seq OWNED BY public.procedure.procedure_id;


--
-- Name: customer customer_id; Type: DEFAULT; Schema: public; Owner: default
--

ALTER TABLE ONLY public.customer ALTER COLUMN customer_id SET DEFAULT nextval('public.customer_customer_id_seq'::regclass);


--
-- Name: lot lot_id; Type: DEFAULT; Schema: public; Owner: default
--

ALTER TABLE ONLY public.lot ALTER COLUMN lot_id SET DEFAULT nextval('public.lot_lot_id_seq'::regclass);


--
-- Name: procedure procedure_id; Type: DEFAULT; Schema: public; Owner: default
--

ALTER TABLE ONLY public.procedure ALTER COLUMN procedure_id SET DEFAULT nextval('public.procedure_procedure_id_seq'::regclass);


--
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: default
--

COPY public.customer (customer_id, lot_id, tax) FROM stdin;
1       1       9
2       2       3
3       3       5
4       4       1
5       5       6
6       6       3
7       7       9
8       8       6
9       9       12
10      10      4
11      11      5
12      12      6
13      13      2
14      14      4
15      15      6
\.


--
-- Data for Name: lot; Type: TABLE DATA; Schema: public; Owner: default
--

COPY public.lot (lot_id, procedure_id, tax) FROM stdin;
1       1       1
2       6       2
3       2       4
4       4       3
5       4       5
6       2       3
7       5       2
8       3       4
9       2       5
10      1       4
11      5       2
12      3       5
13      4       2
14      2       6
15      2       8
\.


--
-- Data for Name: procedure; Type: TABLE DATA; Schema: public; Owner: default
--

COPY public.procedure (procedure_id, name) FROM stdin;
1       procedure_1
2       procedure_2
3       procedure_3
4       procedure_4
5       procedure_5
6       procedure_6
\.


--
-- Name: customer_customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: default
--

SELECT pg_catalog.setval('public.customer_customer_id_seq', 1, false);


--
-- Name: lot_lot_id_seq; Type: SEQUENCE SET; Schema: public; Owner: default
--

SELECT pg_catalog.setval('public.lot_lot_id_seq', 1, false);


--
-- Name: procedure_procedure_id_seq; Type: SEQUENCE SET; Schema: public; Owner: default
--

SELECT pg_catalog.setval('public.procedure_procedure_id_seq', 1, false);


--
-- Name: customer customer_pkey; Type: CONSTRAINT; Schema: public; Owner: default
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (customer_id);


--
-- Name: lot lot_pkey; Type: CONSTRAINT; Schema: public; Owner: default
--

ALTER TABLE ONLY public.lot
    ADD CONSTRAINT lot_pkey PRIMARY KEY (lot_id);


--
-- Name: procedure procedure_pkey; Type: CONSTRAINT; Schema: public; Owner: default
--

ALTER TABLE ONLY public.procedure
    ADD CONSTRAINT procedure_pkey PRIMARY KEY (procedure_id);


--
-- Name: customer_customer_id_uindex; Type: INDEX; Schema: public; Owner: default
--

CREATE UNIQUE INDEX customer_customer_id_uindex ON public.customer USING btree (customer_id);


--
-- Name: lot_lot_id_uindex; Type: INDEX; Schema: public; Owner: default
--

CREATE UNIQUE INDEX lot_lot_id_uindex ON public.lot USING btree (lot_id);


--
-- Name: procedure_procedure_id_uindex; Type: INDEX; Schema: public; Owner: default
--

CREATE UNIQUE INDEX procedure_procedure_id_uindex ON public.procedure USING btree (procedure_id);


--
-- Name: customer customer_lot_lot_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: default
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_lot_lot_id_fk FOREIGN KEY (lot_id) REFERENCES public.lot(lot_id);


--
-- Name: lot lot_procedure_procedure_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: default
--

ALTER TABLE ONLY public.lot
    ADD CONSTRAINT lot_procedure_procedure_id_fk FOREIGN KEY (procedure_id) REFERENCES public.procedure(procedure_id);


--
-- PostgreSQL database dump complete
--
