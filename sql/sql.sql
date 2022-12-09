--
-- PostgreSQL database dump
--

-- Dumped from database version 11.5
-- Dumped by pg_dump version 11.5

-- Started on 2022-08-22 01:00:16

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

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 203 (class 1259 OID 61706)
-- Name: categorie; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categorie (
    id integer NOT NULL,
    categorie character varying(200),
    idmodele integer,
    photocategorie character varying(100)
);


ALTER TABLE public.categorie OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 61704)
-- Name: categorie_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categorie_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorie_id_seq OWNER TO postgres;

--
-- TOC entry 2909 (class 0 OID 0)
-- Dependencies: 202
-- Name: categorie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorie_id_seq OWNED BY public.categorie.id;


--
-- TOC entry 197 (class 1259 OID 61098)
-- Name: clients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.clients (
    id integer NOT NULL,
    nom character varying(100),
    email character varying(150),
    tel character varying(15),
    societe character varying(100),
    activite character varying(100),
    pass character varying(255)
);


ALTER TABLE public.clients OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 61096)
-- Name: clients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.clients_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.clients_id_seq OWNER TO postgres;

--
-- TOC entry 2910 (class 0 OID 0)
-- Dependencies: 196
-- Name: clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.clients_id_seq OWNED BY public.clients.id;


--
-- TOC entry 212 (class 1259 OID 86276)
-- Name: devis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.devis (
    id integer NOT NULL,
    email_client character varying(200),
    id_produit integer,
    description text,
    id_etat integer DEFAULT 1,
    datedemande date DEFAULT now()
);


ALTER TABLE public.devis OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 86274)
-- Name: devis_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.devis_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.devis_id_seq OWNER TO postgres;

--
-- TOC entry 2911 (class 0 OID 0)
-- Dependencies: 211
-- Name: devis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.devis_id_seq OWNED BY public.devis.id;


--
-- TOC entry 210 (class 1259 OID 86252)
-- Name: etat_devis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.etat_devis (
    id integer NOT NULL,
    etat character varying(100),
    description text
);


ALTER TABLE public.etat_devis OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 86250)
-- Name: etat_devis_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.etat_devis_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.etat_devis_id_seq OWNER TO postgres;

--
-- TOC entry 2912 (class 0 OID 0)
-- Dependencies: 209
-- Name: etat_devis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.etat_devis_id_seq OWNED BY public.etat_devis.id;


--
-- TOC entry 199 (class 1259 OID 61170)
-- Name: marque; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.marque (
    id integer NOT NULL,
    marque character varying(100),
    photo character varying(100)
);


ALTER TABLE public.marque OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 61168)
-- Name: marque_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.marque_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.marque_id_seq OWNER TO postgres;

--
-- TOC entry 2913 (class 0 OID 0)
-- Dependencies: 198
-- Name: marque_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.marque_id_seq OWNED BY public.marque.id;


--
-- TOC entry 201 (class 1259 OID 61698)
-- Name: modele; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.modele (
    id integer NOT NULL,
    modele character varying(100),
    config integer
);


ALTER TABLE public.modele OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 61696)
-- Name: modele_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.modele_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.modele_id_seq OWNER TO postgres;

--
-- TOC entry 2914 (class 0 OID 0)
-- Dependencies: 200
-- Name: modele_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.modele_id_seq OWNED BY public.modele.id;


--
-- TOC entry 206 (class 1259 OID 61731)
-- Name: produits; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produits (
    id integer NOT NULL,
    idcategorie integer,
    designation character varying(200),
    photo character varying(100),
    idmarque integer,
    puissance numeric DEFAULT 0,
    prix numeric DEFAULT 0,
    caracteristique text,
    fiche character varying(150)
);


ALTER TABLE public.produits OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 61729)
-- Name: produits_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produits_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produits_id_seq OWNER TO postgres;

--
-- TOC entry 2915 (class 0 OID 0)
-- Dependencies: 205
-- Name: produits_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produits_id_seq OWNED BY public.produits.id;


--
-- TOC entry 204 (class 1259 OID 61717)
-- Name: v_categoriemodele; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.v_categoriemodele AS
 SELECT categorie.id AS idcategorie,
    categorie.categorie,
    categorie.photocategorie,
    modele.modele,
    categorie.idmodele,
    modele.config
   FROM (public.modele
     JOIN public.categorie ON ((modele.id = categorie.idmodele)));


ALTER TABLE public.v_categoriemodele OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 69874)
-- Name: v1; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.v1 AS
 SELECT produits.id,
    produits.designation,
    produits.photo,
    produits.caracteristique,
    produits.fiche,
    v_categoriemodele.idmodele,
    v_categoriemodele.modele,
    produits.idcategorie,
    v_categoriemodele.categorie,
    v_categoriemodele.config,
    produits.idmarque,
    produits.puissance,
    produits.prix
   FROM (public.produits
     JOIN public.v_categoriemodele ON ((v_categoriemodele.idcategorie = produits.idcategorie)));


ALTER TABLE public.v1 OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 69878)
-- Name: v_produit; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.v_produit AS
 SELECT v1.id,
    v1.designation,
    v1.photo,
    v1.idcategorie,
    v1.categorie,
    v1.idmodele,
    v1.modele,
    v1.config,
    v1.puissance,
    v1.prix,
    v1.idmarque,
    marque.marque,
    v1.caracteristique,
    v1.fiche
   FROM (public.v1
     JOIN public.marque ON ((v1.idmarque = marque.id)));


ALTER TABLE public.v_produit OWNER TO postgres;

--
-- TOC entry 2739 (class 2604 OID 61709)
-- Name: categorie id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorie ALTER COLUMN id SET DEFAULT nextval('public.categorie_id_seq'::regclass);


--
-- TOC entry 2736 (class 2604 OID 61101)
-- Name: clients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clients ALTER COLUMN id SET DEFAULT nextval('public.clients_id_seq'::regclass);


--
-- TOC entry 2744 (class 2604 OID 86279)
-- Name: devis id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.devis ALTER COLUMN id SET DEFAULT nextval('public.devis_id_seq'::regclass);


--
-- TOC entry 2743 (class 2604 OID 86255)
-- Name: etat_devis id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etat_devis ALTER COLUMN id SET DEFAULT nextval('public.etat_devis_id_seq'::regclass);


--
-- TOC entry 2737 (class 2604 OID 61173)
-- Name: marque id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.marque ALTER COLUMN id SET DEFAULT nextval('public.marque_id_seq'::regclass);


--
-- TOC entry 2738 (class 2604 OID 61701)
-- Name: modele id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modele ALTER COLUMN id SET DEFAULT nextval('public.modele_id_seq'::regclass);


--
-- TOC entry 2740 (class 2604 OID 61734)
-- Name: produits id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produits ALTER COLUMN id SET DEFAULT nextval('public.produits_id_seq'::regclass);


--
-- TOC entry 2897 (class 0 OID 61706)
-- Dependencies: 203
-- Data for Name: categorie; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorie (id, categorie, idmodele, photocategorie) FROM stdin;
14	Informatique	3	assets/images/photocategorie/informatique.jpg
1	Onduleur Inline	1	assets/images/photocategorie/onduleur-inline.jpg
2	Onduleur Online	1	assets/images/photocategorie/onduleur-online.jpg
3	Régulateur monophasé	1	assets/images/photocategorie/regulateur-mono.jpg
4	Régulateur triphasé	1	assets/images/photocategorie/regulateur-tri.jpg
6	Imprimante couleur	2	assets/images/photocategorie/imprimante-couleur.jpg
5	Imprimante noir & blanc	2	assets/images/photocategorie/imprimante-noir-blanc.jpg
7	Multifonction noir & blanc	2	assets/images/photocategorie/multifonction-noir-blanc.jpg
8	Multifonction couleur	2	assets/images/photocategorie/multifonction-couleur.jpg
9	Tracer indoor	4	assets/images/photocategorie/tracer-indoor.jpg
10	Tracer outdoor	4	assets/images/photocategorie/tracer-outdoor.jpg
11	Batterie	1	assets/images/photocategorie/
13	Multifonction Occasion	2	assets/images/photocategorie/
\.


--
-- TOC entry 2891 (class 0 OID 61098)
-- Dependencies: 197
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: postgres
--

-- COPY public.clients (id, nom, email, tel, societe, activite, pass) FROM stdin;
-- 1	jaona	rakoto@gmail.com	0340400404	\N	\N	1234
-- 2	razafy	razafy@gmail.com	0320200202	\N	\N	1234
-- \.


--
-- TOC entry 2903 (class 0 OID 86276)
-- Dependencies: 212
-- Data for Name: devis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.devis (id, email_client, id_produit, description, id_etat, datedemande) FROM stdin;
\.


--
-- TOC entry 2901 (class 0 OID 86252)
-- Dependencies: 210
-- Data for Name: etat_devis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.etat_devis (id, etat, description) FROM stdin;
1	en attente	devis en attente
2	en cours	devis en cours
3	termine	devis termine
\.


--
-- TOC entry 2893 (class 0 OID 61170)
-- Dependencies: 199
-- Data for Name: marque; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.marque (id, marque, photo) FROM stdin;
1	Kebos	assets/images/marque/kebos.png
6	Lenovo	assets/images/marque/lenovo.png
7	ipower	assets/images/marque/ipower.png
8	brother	assets/images/marque/brother.png
9	asus	assets/images/marque/asus.png
10	Olivetti	assets/images/marque/olivetti.png
12	Protek	assets/images/marque/Protek.png
14	Hp	assets/images/marque/Hp.png
15	Canon	assets/images/marque/Canon.png
\.


--
-- TOC entry 2895 (class 0 OID 61698)
-- Dependencies: 201
-- Data for Name: modele; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.modele (id, modele, config) FROM stdin;
1	Protéction électrique	1
2	Bureautique	2
3	Informatique	3
4	Grand format	4
\.


--
-- TOC entry 2899 (class 0 OID 61731)
-- Dependencies: 206
-- Data for Name: produits; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produits (id, idcategorie, designation, photo, idmarque, puissance, prix, caracteristique, fiche) FROM stdin;
7	2	GRD11 RT-6-10K-Tower-L	assets/images/modele/Ond_On_21.jpg	1	10000	0	tower grd11	Fiche/Onduleur/GR31 10-20K &GR33 10-60K
8	2	GR33-Rack-4U-30K-60K L	assets/images/modele/Ond_On_19.jpg	1	60000	0	gr33 rack	Fiche/Onduleur/GR31 10-20K &GR33 10-60K
9	2	GL33 160K-200K R side	assets/images/modele/Ond_On_13.jpg	1	200000	0	gl33	Fiche/Onduleur/GR31 10-20K &GR33 10-60K
11	1	Pg 500-800	assets/images/modele/inline/500.jpg	1	500	1500000	Inline 500 a 800VA	\N
12	1	Pg 3000	assets/images/modele/inline/3000.jpg	1	3000	2000000	Inline 3000VA	\N
10	7	d-copia4024-MFplus	assets/images/modele/bureautique/d-copia-4024-MFplus0.jpg	10	0	0	noir&blanc A4	\N
13	1	Pg 1000	assets/images/modele/inline/600-1000.jpg	1	1000	2000000	Inline 1000 VA	\N
14	1	Pg 1200	assets/images/modele/inline/1200-3000.jpg	1	1200	1550000	Inline 1200 VA 	\N
15	1	Pg 5000	assets/images/modele/inline/PGII-5000.jpg	1	3000	4000000	Inline 3000VA	\N
19	2	GHIII-33- 100-200KW-Tower-L side	assets/images/modele/online/GHIII-33-100-200KW.jpg	1	100000	0	GHIII-33- 100-200KW-Tower-L side Open door	\N
20	2	GR11	assets/images/modele/online/kebos_GR11-1-3K--D.jpg	1	1000	0	GR11	\N
21	2	GR31 Rack	assets/images/modele/online/GR-31-33-10-20K-Rack-L-side--D.jpg	1	15000	0	GR 31 Rack L side	\N
22	3	AVR 1000VA	assets/images/modele/regM/1KVA-1.jpg	1	1000	0	AVR 1kVA	\N
23	3	5000VA	assets/images/modele/regM/3-5.jpg	1	5000	0	Automatic voltage regulator	\N
24	3	10000VA	assets/images/modele/regM/8-12.jpg	1	10000	0	8-10 KVA	\N
25	3	AVR 15000VA	assets/images/modele/regM/avr15.jpg	1	15000	0	AVR 15kVA	\N
26	3	AVR 20000VA	assets/images/modele/regM/avr20.jpg	1	20000	0	AVR 20kVA	\N
27	4	5000VA	assets/images/modele/regT/5.jpg	1	5000	0	Triphas‚	\N
28	4	10000VA	assets/images/modele/regT/3-10.jpg	1	10000	0	Triphas‚	\N
29	4	20000VA	assets/images/modele/regT/20.jpg	1	20000	0	Triphas‚	\N
30	4	30000VA	assets/images/modele/regT/3-30.jpg	1	30000	0	Triphas‚	\N
31	4	60000VA	assets/images/modele/regT/3-60.jpg	1	60000	0	Triphas‚	\N
32	4	100000VA	assets/images/modele/regT/3-100.jpg	1	100000	0	Triphas‚	\N
33	11	GB-12-7A	assets/images/modele/batterie/GB-12V-7Ah.jpg	12	7	0	12V- 7A	\N
34	11	GB-12-9A	assets/images/modele/batterie/GB-12-9.jpg	12	9	0	12V- 9A	\N
35	11	GB-12-12A	assets/images/modele/batterie/GB-12-12A.jpg	12	12	0	12V- 12A	\N
36	11	GB-12-26A	assets/images/modele/batterie/GB-12-26A.jpg	12	26	0	12V- 26A	\N
37	11	GP-12-100A	assets/images/modele/batterie/GB-12V-100A.jpg	12	26	0	12V- 26A	\N
38	11	Prise  parasurtenseur	assets/images/modele/batterie/P_02.jpg	7	0	50000	Prise parasurtenseur	\N
39	11	Prise	assets/images/modele/batterie/P_03.jpg	7	0	50000	Prise	\N
40	14	Pc Lenovo	assets/images/modele/info/pcLenovo.jpg	6	0	0	Pc lenovo	\N
42	14	Pavillon 15	assets/images/modele/info/hp15.jpg	9	0	0	Hp core i5 8e gen 8Gb 1Tb	\N
43	14	Hp blanche	assets/images/modele/info/hpBur.jpg	9	0	0	intel core i3 4Gb	\N
46	14	lenvy 14	assets/images/modele/info/hp14.jpg	9	0	0	Hp lenvy  14	\N
47	14	S6 lite	assets/images/modele/info/s6L.jpg	9	0	0	Galaxy s6 mite	\N
52	5	pg-L2540 plus	assets/images/modele/bureautique/imprimanteN/pg-L2540plus.jpg	10	0	0	 imprimante noir et blanc format A4	\N
53	5	pg-L2545	assets/images/modele/bureautique/imprimanteN/pg-L2545.jpg	10	0	0	 imprimante noir et blanc format A4	\N
54	5	hp-m712	assets/images/modele/bureautique/imprimanteN/hp-m712.jpg	14	0	0	imprimante laser monochrome 	\N
55	5	C9200	assets/images/modele/bureautique/imprimanteN/epson-aculaser-c9200n.jpg	10	0	0	format A4 	\N
56	6	d-color-P2130	assets/images/modele/bureautique/imprimanteC/d-color-P2130.jpg	10	0	0	format A4	\N
57	6	d-color-P2226plus	assets/images/modele/bureautique/imprimanteC/d-color-P2226plus.jpg	10	0	0	 imprimante couleur format A3	\N
58	6	d-color-P3100	assets/images/modele/bureautique/imprimanteC/d-color-P3100.jpg	10	0	0	imprimante couleur A4 	\N
59	6	mf455	assets/images/modele/bureautique/imprimanteC/mf455.jpg	15	0	0	format A4 	\N
60	7	d-copia-MF6000	assets/images/modele/bureautique/multifonction-A3N/d-copia-MF6000.jpg	10	0	0	multifonction noir et blanc format A3 	\N
61	7	d-copia-MF4001	assets/images/modele/bureautique/multifonction-A3N/d-copia-MF4001.jpg	10	0	0	multifonction noir et blanc format A3	\N
64	7	ecosys-M3145dn	assets/images/modele/bureautique/multifonction-A4N/ecosys-M3145dn.jpg	10	0	0	format A4	\N
65	8	d-color-MF2624plus	assets/images/modele/bureautique/multifonction-A4C/d-color-MF2624plus.jpg	10	0	0	format A4	\N
66	8	d-color-MF3024	assets/images/modele/bureautique/multifonction-A4C/d-color-MF3024.jpg	10	0	0	format A4	\N
67	8	d-color-MF3801	assets/images/modele/bureautique/multifonction-A4C/d-color-MF3801.jpg	10	0	0	format A4	\N
70	8	d-color-MF659	assets/images/modele/bureautique/multifonction-A3C/d-color-MF659.jpg	10	0	0	format A3	\N
73	9	eco solvent	assets/images/modele/GrandF/eco.jpg	14	0	0	eco solvent printer	\N
74	9	printer	assets/images/modele/GrandF/i3.jpg	14	0	0	printer	\N
75	9	hpT730	assets/images/modele/GrandF/hpT730.jpg	14	0	0	Hp printer	\N
76	9	indoor	assets/images/modele/GrandF/i1.jpg	14	0	0	tracer	\N
77	10	epson eco solvent	assets/images/modele/GrandF/o1.jpg	14	0	0	printer	\N
78	10	flexographic	assets/images/modele/GrandF/o2.jpg	14	0	0	printer	\N
79	10	printer	assets/images/modele/GrandF/o3.jpg	14	0	0	printer outdoor	\N
80	10	print	assets/images/modele/GrandF/o4.jpg	14	0	0	printer	\N
\.


--
-- TOC entry 2916 (class 0 OID 0)
-- Dependencies: 202
-- Name: categorie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorie_id_seq', 14, true);


--
-- TOC entry 2917 (class 0 OID 0)
-- Dependencies: 196
-- Name: clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.clients_id_seq', 2, true);


--
-- TOC entry 2918 (class 0 OID 0)
-- Dependencies: 211
-- Name: devis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.devis_id_seq', 4, true);


--
-- TOC entry 2919 (class 0 OID 0)
-- Dependencies: 209
-- Name: etat_devis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.etat_devis_id_seq', 3, true);


--
-- TOC entry 2920 (class 0 OID 0)
-- Dependencies: 198
-- Name: marque_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.marque_id_seq', 15, true);


--
-- TOC entry 2921 (class 0 OID 0)
-- Dependencies: 200
-- Name: modele_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.modele_id_seq', 4, true);


--
-- TOC entry 2922 (class 0 OID 0)
-- Dependencies: 205
-- Name: produits_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produits_id_seq', 80, true);


--
-- TOC entry 2754 (class 2606 OID 61711)
-- Name: categorie categorie_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT categorie_pkey PRIMARY KEY (id);


--
-- TOC entry 2748 (class 2606 OID 61103)
-- Name: clients clients_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clients
    ADD CONSTRAINT clients_pkey PRIMARY KEY (id);


--
-- TOC entry 2760 (class 2606 OID 86286)
-- Name: devis devis_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.devis
    ADD CONSTRAINT devis_pkey PRIMARY KEY (id);


--
-- TOC entry 2758 (class 2606 OID 86260)
-- Name: etat_devis etat_devis_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.etat_devis
    ADD CONSTRAINT etat_devis_pkey PRIMARY KEY (id);


--
-- TOC entry 2750 (class 2606 OID 61175)
-- Name: marque marque_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.marque
    ADD CONSTRAINT marque_pkey PRIMARY KEY (id);


--
-- TOC entry 2752 (class 2606 OID 61703)
-- Name: modele modele_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modele
    ADD CONSTRAINT modele_pkey PRIMARY KEY (id);


--
-- TOC entry 2756 (class 2606 OID 61741)
-- Name: produits produits_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produits
    ADD CONSTRAINT produits_pkey PRIMARY KEY (id);


--
-- TOC entry 2765 (class 2606 OID 86292)
-- Name: devis fk_idetat; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.devis
    ADD CONSTRAINT fk_idetat FOREIGN KEY (id_etat) REFERENCES public.etat_devis(id);


--
-- TOC entry 2763 (class 2606 OID 61747)
-- Name: produits fk_idmarque; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produits
    ADD CONSTRAINT fk_idmarque FOREIGN KEY (idmarque) REFERENCES public.marque(id);


--
-- TOC entry 2761 (class 2606 OID 61712)
-- Name: categorie fk_idmodele; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorie
    ADD CONSTRAINT fk_idmodele FOREIGN KEY (idmodele) REFERENCES public.modele(id);


--
-- TOC entry 2762 (class 2606 OID 61742)
-- Name: produits fk_idmodele; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produits
    ADD CONSTRAINT fk_idmodele FOREIGN KEY (idcategorie) REFERENCES public.categorie(id);


--
-- TOC entry 2764 (class 2606 OID 86287)
-- Name: devis fk_idproduit; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.devis
    ADD CONSTRAINT fk_idproduit FOREIGN KEY (id_produit) REFERENCES public.produits(id);


-- Completed on 2022-08-22 01:00:17

--
-- PostgreSQL database dump complete
--

------------------------------------------------------------------------------------------------------------------------
insert into clients values(
    1, 'jaona', 'jaona@gmail.com', '0330202102', 'a', 'a', md5('0000')
);




create table rendezvous(
    id serial primary key,
    mailClient varchar(150),
    dateRdv timestamp,
    lieu varchar(100),
    motif text,
    etat integer default 0
);
-- etat : 0:envoye, 1:valider, 2: annuler

-- select c.id, c.nom, c.email, c.tel, c.societe, c.iduserrole, m.idclientssent, m.dateheurechat, m.messages
-- from clients as c
-- join messages as m
-- on c.id = m.idclientssent
-- group by c.id, m.idclientssent
-- order by m.dateheurechat DESC;

select DISTINCT on (m.idclientssent)m.idclientssent,m.idclientsreceive, m.messages, m.dateheurechat, c.id, c.nom, c.email, c.tel, c.societe, c.iduserrole
from messages as m
join clients as c
on m.idclientssent = c.id
ORDER by idclientssent, dateheurechat desc;

create view lastmessagesent as
select greatest(idclientssent, idclientsreceive) as client, least(idclientssent, idclientsreceive) as dg, max(dateheurechat) as maxdate
from messages
GROUP BY greatest(idclientssent, idclientsreceive), least(idclientssent, idclientsreceive);

create view lastconversation as
select lms.client, lms.dg, lms.maxdate,m.messages,m.idclientssent, m.idclientsreceive, c.id, c.nom, c.email, c.tel, c.societe, c.iduserrole
from lastmessagesent as lms
join messages as m
on m.dateheurechat = lms.maxdate
join clients as c
on lms.client = c.id;



select * from ordremessage
where idclientssent=4 or idclientsreceive=4
order by dateheurechat ASC limit 5;
