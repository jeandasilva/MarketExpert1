--
-- PostgreSQL database dump
--

-- Dumped from database version 16.2 (Ubuntu 16.2-1.pgdg20.04+1)
-- Dumped by pg_dump version 16.2 (Ubuntu 16.2-1.pgdg20.04+1)

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

SET default_table_access_method = heap;

--
-- Name: itensvenda; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.itensvenda (
    item_venda_id integer NOT NULL,
    venda_id integer NOT NULL,
    produto_id integer NOT NULL,
    quantidade integer NOT NULL,
    preco_unitario numeric(10,2) NOT NULL,
    subtotal numeric(10,2) NOT NULL,
    imposto numeric(10,2) NOT NULL
);


ALTER TABLE public.itensvenda OWNER TO postgres;

--
-- Name: itensvenda_item_venda_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.itensvenda_item_venda_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.itensvenda_item_venda_id_seq OWNER TO postgres;

--
-- Name: itensvenda_item_venda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.itensvenda_item_venda_id_seq OWNED BY public.itensvenda.item_venda_id;


--
-- Name: produtos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produtos (
    produto_id integer NOT NULL,
    nome character varying(255) NOT NULL,
    preco numeric(10,2) NOT NULL,
    tipo_produto_id integer NOT NULL,
    quantidade_produto_estoque integer NOT NULL,
    imagem character varying(255)
);


ALTER TABLE public.produtos OWNER TO postgres;

--
-- Name: produtos_produto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produtos_produto_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produtos_produto_id_seq OWNER TO postgres;

--
-- Name: produtos_produto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produtos_produto_id_seq OWNED BY public.produtos.produto_id;


--
-- Name: tiposproduto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tiposproduto (
    tipo_produto_id integer NOT NULL,
    descricao character varying(255) NOT NULL,
    imposto_percentual numeric(5,2) NOT NULL
);


ALTER TABLE public.tiposproduto OWNER TO postgres;

--
-- Name: tiposproduto_tipo_produto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tiposproduto_tipo_produto_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tiposproduto_tipo_produto_id_seq OWNER TO postgres;

--
-- Name: tiposproduto_tipo_produto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tiposproduto_tipo_produto_id_seq OWNED BY public.tiposproduto.tipo_produto_id;


--
-- Name: vendas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.vendas (
    venda_id integer NOT NULL,
    data_venda timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    total numeric(10,2) DEFAULT 0.00 NOT NULL,
    total_imposto numeric(10,2) DEFAULT 0.00 NOT NULL
);


ALTER TABLE public.vendas OWNER TO postgres;

--
-- Name: vendas_venda_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vendas_venda_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.vendas_venda_id_seq OWNER TO postgres;

--
-- Name: vendas_venda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vendas_venda_id_seq OWNED BY public.vendas.venda_id;


--
-- Name: itensvenda item_venda_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itensvenda ALTER COLUMN item_venda_id SET DEFAULT nextval('public.itensvenda_item_venda_id_seq'::regclass);


--
-- Name: produtos produto_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos ALTER COLUMN produto_id SET DEFAULT nextval('public.produtos_produto_id_seq'::regclass);


--
-- Name: tiposproduto tipo_produto_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tiposproduto ALTER COLUMN tipo_produto_id SET DEFAULT nextval('public.tiposproduto_tipo_produto_id_seq'::regclass);


--
-- Name: vendas venda_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas ALTER COLUMN venda_id SET DEFAULT nextval('public.vendas_venda_id_seq'::regclass);


--
-- Data for Name: itensvenda; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.itensvenda (item_venda_id, venda_id, produto_id, quantidade, preco_unitario, subtotal, imposto) FROM stdin;
1	1	1	1	1200.00	1200.00	180.00
\.

--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produtos (produto_id, nome, preco, tipo_produto_id, quantidade_produto_estoque, imagem) FROM stdin;
1	Pacote de Arroz 5kg	20.00	1	200	'imagem_arroz_5kg.jpg'
2	Suco de Laranja 1L	5.00	2	150	'imagem_suco_laranja.jpg'
3	Cerveja Nacional 350ml	2.50	3	500	'imagem_cerveja_nacional.jpg'
4	Vinho Tinto 750ml	45.00	4	100	'imagem_vinho_tinto.jpg'
5	Refrigerante Cola 2L	3.00	5	300	'imagem_refrigerante_cola.jpg'
6	Batata Chips 200g	3.50	1	150	'imagem_batata_chips.jpg'
7	Água Mineral 500ml	1.00	2	300	'imagem_agua_mineral.jpg'
8	Cerveja Importada 350ml	4.00	3	200	'imagem_cerveja_importada.jpg'
9	Vinho Branco 750ml	50.00	4	90	'imagem_vinho_branco.jpg'
10	Refrigerante Laranja 2L	3.00	5	250	'imagem_refrigerante_laranja.jpg'
\.


--
-- Data for Name: tiposproduto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tiposproduto (tipo_produto_id, descricao, imposto_percentual) FROM stdin;
1	Alimentos	8.00
2	Bebidas	10.00
3	Cervejas	18.00
4	Vinhos	15.00
5	Refrigerantes	12.00
\.

--
-- Data for Name: vendas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.vendas (venda_id, data_venda, total, total_imposto) FROM stdin;
1	2024-05-03 15:02:55.533306	1370.00	180.00
\.


--
-- Name: itensvenda_item_venda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.itensvenda_item_venda_id_seq', 1, true);


--
-- Name: produtos_produto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produtos_produto_id_seq', 3, true);


--
-- Name: tiposproduto_tipo_produto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tiposproduto_tipo_produto_id_seq', 3, true);


--
-- Name: vendas_venda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vendas_venda_id_seq', 1, true);


--
-- Name: itensvenda itensvenda_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itensvenda
    ADD CONSTRAINT itensvenda_pkey PRIMARY KEY (item_venda_id);


--
-- Name: produtos produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (produto_id);


--
-- Name: tiposproduto tiposproduto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tiposproduto
    ADD CONSTRAINT tiposproduto_pkey PRIMARY KEY (tipo_produto_id);


--
-- Name: vendas vendas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendas
    ADD CONSTRAINT vendas_pkey PRIMARY KEY (venda_id);


--
-- Name: itensvenda itensvenda_produto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itensvenda
    ADD CONSTRAINT itensvenda_produto_id_fkey FOREIGN KEY (produto_id) REFERENCES public.produtos(produto_id) ON DELETE CASCADE;


--
-- Name: itensvenda itensvenda_venda_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.itensvenda
    ADD CONSTRAINT itensvenda_venda_id_fkey FOREIGN KEY (venda_id) REFERENCES public.vendas(venda_id) ON DELETE CASCADE;


--
-- Name: produtos produtos_tipo_produto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_tipo_produto_id_fkey FOREIGN KEY (tipo_produto_id) REFERENCES public.tiposproduto(tipo_produto_id);


--
-- PostgreSQL database dump complete
--

