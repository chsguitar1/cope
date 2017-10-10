-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2017 às 15:10
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cope`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao_extensao`
--

CREATE TABLE `acao_extensao` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) CHARACTER SET latin1 NOT NULL,
  `descricao` text CHARACTER SET latin1,
  `publico_alvo` int(11) NOT NULL,
  `tipo_acao` int(11) NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `pessoas_alcancadas` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `projeto_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acompanhamentos`
--

CREATE TABLE `acompanhamentos` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `descricao` longtext NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alteracao_horarios`
--

CREATE TABLE `alteracao_horarios` (
  `id` int(11) NOT NULL,
  `data_alteracao` date NOT NULL,
  `nova_carga_horaria` int(11) NOT NULL,
  `participante_id` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexos`
--

CREATE TABLE `anexos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo_anexo` int(11) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `tamanho` bigint(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas_conhecimentos`
--

CREATE TABLE `areas_conhecimentos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `cod_pai` int(11) DEFAULT NULL,
  `nivel` int(1) NOT NULL,
  `analitico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `areas_conhecimentos`
--

INSERT INTO `areas_conhecimentos` (`id`, `descricao`, `cod_pai`, `nivel`, `analitico`) VALUES
(10000003, 'Ciências Exatas e da Terra', NULL, 0, 0),
(10100008, 'Matemática', 10000003, 1, 0),
(10101004, 'Álgebra', 10100008, 2, 1),
(10102000, 'Análise', 10100008, 2, 1),
(10103007, 'Geometria e Topologia', 10100008, 2, 1),
(10104003, 'Matemática Aplicada', 10100008, 2, 1),
(10200002, 'Probabilidade e Estatística', 10000003, 1, 0),
(10201009, 'Probabilidade', 10200002, 2, 1),
(10202005, 'Estatística', 10200002, 2, 1),
(10203001, 'Probabilidade e Estatística Aplicadas', 10200002, 2, 1),
(10300007, 'Ciência da Computação', 10000003, 1, 0),
(10301003, 'Teoria da Computação', 10300007, 2, 1),
(10302000, 'Matemática da Computação', 10300007, 2, 1),
(10303006, 'Metodologia e Técnicas da Computação', 10300007, 2, 1),
(10304002, 'Sistemas de Computação', 10300007, 2, 1),
(10400001, 'Astronomia', 10000003, 1, 0),
(10402004, 'Astrofísica Estelar', 10400001, 2, 1),
(10404007, 'Astrofísica Extragaláctica', 10400001, 2, 1),
(10405003, 'Astrofísica do Sistema Solar', 10400001, 2, 1),
(10406000, 'Instrumentação Astronômica', 10400001, 2, 1),
(10500006, 'Física', 10000003, 1, 0),
(10502009, 'Áreas Clássicas de Fenomenologia e suas Aplicações', 10500006, 2, 1),
(10503005, 'Física das Partículas Elementares e Campos', 10500006, 2, 1),
(10504001, 'Física Nuclear', 10500006, 2, 1),
(10505008, 'Física Atômica e Molecular', 10500006, 2, 1),
(10506004, 'Física dos Fluidos, Física de Plasmas e Descargas Elétricas', 10500006, 2, 1),
(10507000, 'Física da Matéria Condensada', 10500006, 2, 1),
(10600000, 'Química', 10000003, 1, 0),
(10601007, 'Química Orgânica', 10600000, 2, 1),
(10602003, 'Química Inorgânica', 10600000, 2, 1),
(10603000, 'Físico-Química', 10600000, 2, 1),
(10604006, 'Química Analítica', 10600000, 2, 1),
(10700005, 'Geociências', 10000003, 1, 0),
(10701001, 'Geologia', 10700005, 2, 1),
(10702008, 'Geofísica', 10700005, 2, 1),
(10703004, 'Meteorologia', 10700005, 2, 1),
(10704000, 'Geodesia', 10700005, 2, 1),
(10705007, 'Geografia Física', 10700005, 2, 1),
(10800000, 'Oceanografia', 10000003, 1, 0),
(10801006, 'Oceanografia Biológica', 10800000, 2, 1),
(10802002, 'Oceanografia Física', 10800000, 2, 1),
(10803009, 'Oceanografia Química', 10800000, 2, 1),
(10804005, 'Oceanografia Geológica', 10800000, 2, 1),
(20000006, 'Ciências Biológicas', NULL, 0, 0),
(20100000, 'Biologia Geral', 20000006, 1, 1),
(20200005, 'Genética', 20000006, 1, 0),
(20201001, 'Genética Quantitativa', 20200005, 2, 1),
(20202008, 'Genética Molecular e de Microorganismos', 20200005, 2, 1),
(20203004, 'Genética Vegetal', 20200005, 2, 1),
(20204000, 'Genética Animal', 20200005, 2, 1),
(20205007, 'Genética Humana e Médica', 20200005, 2, 1),
(20206003, 'Mutagênese', 20200005, 2, 1),
(20300000, 'Botânica', 20000006, 1, 0),
(20301006, 'Paleobotânica', 20300000, 2, 1),
(20302002, 'Morfologia Vegetal', 20300000, 2, 1),
(20303009, 'Fisiologia Vegetal', 20300000, 2, 1),
(20304005, 'Taxonomia Vegetal', 20300000, 2, 1),
(20305001, 'Fitogeografia', 20300000, 2, 1),
(20306008, 'Botânica Aplicada', 20300000, 2, 1),
(20400004, 'Zoologia', 20000006, 1, 0),
(20401000, 'Paleozoologia', 20400004, 2, 1),
(20402007, 'Morfologia dos Grupos Recentes', 20400004, 2, 1),
(20403003, 'Fisiologia dos Grupos Recentes', 20400004, 2, 1),
(20404000, 'Comportamento Animal', 20400004, 2, 1),
(20405006, 'Taxonomia dos Grupos Recentes', 20400004, 2, 1),
(20406002, 'Zoologia Aplicada', 20400004, 2, 1),
(20500009, 'Ecologia', 20000006, 1, 0),
(20501005, 'Ecologia Teórica', 20501005, 2, 1),
(20502001, 'Ecologia de Ecossistemas', 20501005, 2, 1),
(20503008, 'Ecologia Aplicada', 20501005, 2, 1),
(20600003, 'Morfologia', 20000006, 1, 0),
(20601000, 'Citologia e Biologia Celular', 20601000, 2, 1),
(20602006, 'Embriologia', 20601000, 2, 1),
(20603002, 'Histologia', 20601000, 2, 1),
(20604009, 'Anatomia', 20601000, 2, 1),
(20700008, 'Fisiologia', 20000006, 1, 0),
(20701004, 'Fisiologia Geral', 20700008, 2, 1),
(20702000, 'Fisiologia de Órgaos e Sistemas', 20700008, 2, 1),
(20703007, 'Fisiologia do Esforço', 20700008, 2, 1),
(20704003, 'Fisiologia Comparada', 20700008, 2, 1),
(20800002, 'Bioquímica', 20000006, 1, 0),
(20801009, 'Química de Macromoléculas', 20800002, 2, 1),
(20802005, 'Bioquímica dos Microorganismos', 20800002, 2, 1),
(20803001, 'Metabolismo e Bioenergética', 20800002, 2, 1),
(20804008, 'Biologia Molecular', 20800002, 2, 1),
(20805004, 'Enzimologia', 20800002, 2, 1),
(20900007, 'Biofísica', 20000006, 1, 0),
(20901003, 'Biofísica Molecular', 20900007, 2, 1),
(20902000, 'Biofísica Celular', 20900007, 2, 1),
(20903006, 'Biofísica de Processos e Sistemas', 20900007, 2, 1),
(20904002, 'Radiologia e Fotobiologia', 20900007, 2, 1),
(21000000, 'Farmacologia', 20000006, 1, 0),
(21001006, 'Farmacologia Geral', 21000000, 2, 1),
(21002002, 'Farmacologia Autonômica', 21000000, 2, 1),
(21003009, 'Neuropsicofarmacologia', 21000000, 2, 1),
(21004005, 'Farmacologia Cardiorenal', 21000000, 2, 1),
(21005001, 'Farmacologia Bioquímica e Molecular', 21000000, 2, 1),
(21006008, 'Etnofarmacologia', 21000000, 2, 1),
(21007004, 'Toxicologia', 21000000, 2, 1),
(21008000, 'Farmacologia Clínica', 21000000, 2, 1),
(21100004, 'Imunologia', 20000006, 1, 0),
(21101000, 'Imunoquímica', 21100004, 2, 1),
(21102007, 'Imunologia Celular', 21100004, 2, 1),
(21103003, 'Imunogenética', 21100004, 2, 1),
(21104000, 'Imunologia Aplicada', 21100004, 2, 1),
(21200009, 'Microbiologia', 20000006, 1, 0),
(21201005, 'Biologia e Fisiologia dos Microorganismos', 21200009, 2, 1),
(21202001, 'Microbiologia Aplicada', 21200009, 2, 1),
(21300003, 'Parasitologia', 20000006, 1, 0),
(21301000, 'Protozoologia de Parasitos', 21300003, 2, 1),
(21302006, 'Helmintologia de Parasitos', 21300003, 2, 1),
(21303002, 'Entomologia e Malacologia de Parasitos e Vetores', 21300003, 2, 1),
(30000009, 'Engenharias', NULL, 0, 0),
(30100003, 'Engenharia Civil', 30000009, 1, 0),
(30101000, 'Construção Civil', 30100003, 2, 1),
(30102006, 'Estruturas', 30100003, 2, 1),
(30103002, 'Geotécnica', 30100003, 2, 1),
(30104009, 'Engenharia Hidráulica', 30100003, 2, 1),
(30105005, 'Infra-Estrutura de Transportes', 30100003, 2, 1),
(30200008, 'Engenharia de Minas', 30000009, 1, 0),
(30201004, 'Pesquisa Mineral', 30200008, 2, 1),
(30202000, 'Lavra', 30200008, 2, 1),
(30203007, 'Tratamento de Minérios', 30200008, 2, 1),
(30300002, 'Engenharia de Materiais e Metalúrgica', 30000009, 1, 0),
(30301009, 'Instalações e Equipamentos Metalúrgicos', 30300002, 2, 1),
(30302005, 'Metalurgia Extrativa', 30300002, 2, 1),
(30303001, 'Metalurgia de Transformação', 30300002, 2, 1),
(30304008, 'Metalurgia Fisica', 30300002, 2, 1),
(30305004, 'Materiais não Metálicos', 30300002, 2, 1),
(30400007, 'Engenharia Elétrica', 30000009, 1, 0),
(30401003, 'Materiais Elétricos', 30400007, 2, 1),
(30402000, 'Medidas Elétricas, Magnéticas e Eletrônicas; Instrumentação', 30400007, 2, 1),
(30403006, 'Circuitos Elétricos, Magnéticos e Eletrônicos', 30400007, 2, 1),
(30404002, 'Sistemas Elétricos de Potência', 30400007, 2, 1),
(30405009, 'Eletrônica Industrial, Sistemas e Controles Eletrônicos', 30400007, 2, 1),
(30406005, 'Telecomunicações', 30400007, 2, 1),
(30500001, 'Engenharia Mecânica', 30000009, 1, 0),
(30501008, 'Fenômenos de Transporte', 30500001, 2, 1),
(30502004, 'Engenharia Térmica', 30500001, 2, 1),
(30503000, 'Mecânica dos Sólidos', 30500001, 2, 1),
(30504007, 'Projetos de Máquinas', 30500001, 2, 1),
(30505003, 'Processos de Fabricação', 30500001, 2, 1),
(30600006, 'Engenharia Química', 30000009, 1, 0),
(30601002, 'Processos Industriais de Engenharia Química', 30600006, 2, 1),
(30602009, 'Operações Industriais e Equipamentos para Engenharia Química', 30600006, 2, 1),
(30603005, 'Tecnologia Química', 30600006, 2, 1),
(30700000, 'Engenharia Sanitária', 30000009, 1, 0),
(30701007, 'Recursos Hídricos', 30700000, 2, 1),
(30702003, 'Tratamento de Águas de Abastecimento e Residuárias', 30700000, 2, 1),
(30703000, 'Saneamento Básico', 30700000, 2, 1),
(30704006, 'Saneamento Ambiental', 30700000, 2, 1),
(30800005, 'Engenharia de Produção', 30000009, 1, 0),
(30801001, 'Gerência de Produção', 30800005, 2, 1),
(30802008, 'Pesquisa Operacional', 30800005, 2, 1),
(30803004, 'Engenharia do Produto', 30800005, 2, 1),
(30804000, 'Engenharia Econômica', 30800005, 2, 1),
(30900000, 'Engenharia Nuclear', 30000009, 1, 0),
(30901006, 'Aplicações de Radioisotopos', 30900000, 2, 1),
(30902002, 'Fusão Controlada', 30900000, 2, 1),
(30903009, 'Combustível Nuclear', 30900000, 2, 1),
(30904005, 'Tecnologia dos Reatores', 30900000, 2, 1),
(31000002, 'Engenharia de Transportes', 30000009, 1, 0),
(31001009, 'Planejamento de Transportes', 31000002, 2, 1),
(31002005, 'Veículos e Equipamentos de Controle', 31000002, 2, 1),
(31003001, 'Operações de Transportes', 31000002, 2, 1),
(31100007, 'Engenharia Naval e Oceânica', 30000009, 1, 0),
(31101003, 'Hidrodinâmica de Navios e Sistemas Oceânicos', 31100007, 2, 1),
(31102000, 'Estruturas Navais e Oceânicas', 31100007, 2, 1),
(31103006, 'Máquinas Marítimas', 31100007, 2, 1),
(31104002, 'Projeto de Navios e de Sistemas Oceânicos', 31100007, 2, 1),
(31105009, 'Tecnologia de Construção Naval e de Sistemas Oceânicas', 31100007, 2, 1),
(31200001, 'Engenharia Aeroespacial', 30000009, 1, 0),
(31201008, 'Aerodinâmica', 31200001, 2, 1),
(31202004, 'Dinâmica de Vôo', 31200001, 2, 1),
(31203000, 'Estruturas Aeroespaciais', 31200001, 2, 1),
(31204007, 'Materiais e Processos para Engenharia Aeronáutica e Aeroespacial', 31200001, 2, 1),
(31205003, 'Propulsão Aeroespacial', 31200001, 2, 1),
(31206000, 'Sistemas Aeroespaciais', 31200001, 2, 1),
(31300006, 'Engenharia Biomédica', 30000009, 1, 0),
(31301002, 'Bioengenharia', 31300006, 2, 1),
(31302009, 'Engenharia Médica', 31300006, 2, 1),
(40000001, 'Ciências da Saúde', NULL, 0, 0),
(40100006, 'Medicina', 40000001, 1, 0),
(40101002, 'Clínica Médica', 40100006, 2, 1),
(40102009, 'Cirurgia', 40100006, 2, 1),
(40103005, 'Saúde Materno-Infantil', 40100006, 2, 1),
(40104001, 'Psiquiatria', 40100006, 2, 1),
(40105008, 'Anatomia Patológica e Patologia Clínica', 40100006, 2, 1),
(40106004, 'Radiologia Médica', 40100006, 2, 1),
(40107000, 'Medicina Legal e Deontologia', 40100006, 2, 1),
(40200000, 'Odontologia', 40000001, 1, 0),
(40201007, 'Clínica Odontológica', 40200000, 2, 1),
(40202003, 'Cirurgia Buco-Maxilo-Facial', 40200000, 2, 1),
(40203000, 'Ortodontia', 40200000, 2, 1),
(40204006, 'Odontopediatria', 40200000, 2, 1),
(40205002, 'Periodontia', 40200000, 2, 1),
(40206009, 'Endodontia', 40200000, 2, 1),
(40207005, 'Radiologia Odontológica', 40200000, 2, 1),
(40208001, 'Odontologia Social e Preventiva', 40200000, 2, 1),
(40209008, 'Materiais Odontológicos', 40200000, 2, 1),
(40300005, 'Farmácia', 40000001, 1, 0),
(40301001, 'Farmacotecnia', 40300005, 2, 1),
(40302008, 'Farmacognosia', 40300005, 2, 1),
(40303004, 'Análise Toxicológica', 40300005, 2, 1),
(40304000, 'Análise e Controle e Medicamentos', 40300005, 2, 1),
(40305007, 'Bromatologia', 40300005, 2, 1),
(40400000, 'Enfermagem', 40000001, 1, 0),
(40401006, 'Enfermagem Médico-Cirúrgica', 40400000, 2, 1),
(40402002, 'Enfermagem Obstétrica', 40400000, 2, 1),
(40403009, 'Enfermagem Pediátrica', 40400000, 2, 1),
(40404005, 'Enfermagem Psiquiátrica', 40400000, 2, 1),
(40405001, 'Enfermagem de Doenças Contagiosas', 40400000, 2, 1),
(40406008, 'Enfermagem de Saúde Pública', 40400000, 2, 1),
(40500004, 'Nutrição', 40000001, 1, 0),
(40501000, 'Bioquímica da Nutrição', 40500004, 2, 1),
(40502007, 'Dietética', 40500004, 2, 1),
(40503003, 'Análise Nutricional de População', 40500004, 2, 1),
(40504000, 'Desnutrição e Desenvolvimento Fisiológico', 40500004, 2, 1),
(40600009, 'Saúde Coletiva', 40000001, 1, 0),
(40601005, 'Epidemiologia', 40600009, 2, 1),
(40602001, 'Saúde Publica', 40600009, 2, 1),
(40603008, 'Medicina Preventiva', 40600009, 2, 1),
(40700003, 'Fonoaudiologia', 40000001, 1, 1),
(40800008, 'Fisioterapia e Terapia Ocupacional', 40000001, 1, 1),
(40900002, 'Educação Física', 40000001, 1, 1),
(50000004, 'Ciências Agrárias', NULL, 0, 0),
(50100009, 'Agronomia', 50000004, 1, 0),
(50101005, 'Ciência do Solo', 50100009, 2, 1),
(50102001, 'Fitossanidade', 50100009, 2, 1),
(50103008, 'Fitotecnia', 50100009, 2, 1),
(50104004, 'Floricultura, Parques e Jardins', 50100009, 2, 1),
(50105000, 'Agrometeorologia', 50100009, 2, 1),
(50106007, 'Extensão Rural', 50100009, 2, 1),
(50200003, 'Recursos Florestais e Engenharia Florestal', 50000004, 1, 0),
(50201000, 'Silvicultura', 50200003, 2, 1),
(50202006, 'Manejo Florestal', 50200003, 2, 1),
(50203002, 'Técnicas e Operações Florestais', 50200003, 2, 1),
(50204009, 'Tecnologia e Utilização de Produtos Florestais', 50200003, 2, 1),
(50205005, 'Conservação da Natureza', 50200003, 2, 1),
(50206001, 'Energia de Biomassa Florestal', 50200003, 2, 1),
(50300008, 'Engenharia Agrícola', 50000004, 1, 0),
(50301004, 'Máquinas e Implementos Agrícolas', 50300008, 2, 1),
(50302000, 'Engenharia de Água e Solo', 50300008, 2, 1),
(50303007, 'Engenharia de Processamento de Produtos Agrícolas', 50300008, 2, 1),
(50304003, 'Construções Rurais e Ambiência', 50300008, 2, 1),
(50305000, 'Energização Rural', 50300008, 2, 1),
(50400002, 'Zootecnia', 50000004, 1, 0),
(50401009, 'Ecologia dos Animais Domésticos e Etologia', 50400002, 2, 1),
(50402005, 'Genética e Melhoramento dos Animais Domésticos', 50400002, 2, 1),
(50403001, 'Nutrição e Alimentação Animal', 50400002, 2, 1),
(50404008, 'Pastagem e Forragicultura', 50400002, 2, 1),
(50405004, 'Produção Animal', 50400002, 2, 1),
(50500007, 'Medicina Veterinária', 50000004, 1, 0),
(50501003, 'Clínica e Cirurgia Animal', 50500007, 2, 1),
(50502000, 'Medicina Veterinária Preventiva', 50500007, 2, 1),
(50503006, 'Patologia Animal', 50500007, 2, 1),
(50504002, 'Reprodução Animal', 50500007, 2, 1),
(50505009, 'Inspeção de Produtos de Origem Animal', 50500007, 2, 1),
(50600001, 'Recursos Pesqueiros e Engenharia de Pesca', 50000004, 1, 0),
(50601008, 'Recursos Pesqueiros Marinhos', 50600001, 2, 1),
(50602004, 'Recursos Pesqueiros de Águas Interiores', 50600001, 2, 1),
(50603000, 'Aqüicultura', 50600001, 2, 1),
(50604007, 'Engenharia de Pesca', 50600001, 2, 1),
(50700006, 'Ciência e Tecnologia de Alimentos', 50000004, 1, 0),
(50701002, 'Ciência de Alimentos', 50700006, 2, 1),
(50702009, 'Tecnologia de Alimentos', 50700006, 2, 1),
(50703005, 'Engenharia de Alimentos', 50700006, 2, 1),
(60000007, 'Ciências Sociais Aplicadas', NULL, 0, 0),
(60100001, 'Direito', 60000007, 1, 0),
(60101008, 'Teoria do Direito', 60100001, 2, 1),
(60102004, 'Direito Público', 60100001, 2, 1),
(60103000, 'Direito Privado', 60100001, 2, 1),
(60104007, 'Direitos Especiais', 60100001, 2, 1),
(60200006, 'Administração', 60000007, 1, 0),
(60201002, 'Administração de Empresas', 60200006, 2, 1),
(60202009, 'Administração Pública', 60200006, 2, 1),
(60203005, 'Administração de Setores Específicos', 60200006, 2, 1),
(60204001, 'Ciências Contábeis', 60200006, 2, 1),
(60300000, 'Economia', 60000007, 1, 0),
(60301007, 'Teoria Econômica', 60300000, 2, 1),
(60302003, 'Métodos Quantitativos em Economia', 60300000, 2, 1),
(60303000, 'Economia Monetária e Fiscal', 60300000, 2, 1),
(60304006, 'Crescimento, Flutuações e Planejamento Econômico', 60300000, 2, 1),
(60305002, 'Economia Internacional', 60300000, 2, 1),
(60306009, 'Economia dos Recursos Humanos', 60300000, 2, 1),
(60307005, 'Economia Industrial', 60300000, 2, 1),
(60308001, 'Economia do Bem-Estar Social', 60300000, 2, 1),
(60309008, 'Economia Regional e Urbana', 60300000, 2, 1),
(60310006, 'Economias Agrária e dos Recursos Naturais', 60300000, 2, 1),
(60400005, 'Arquitetura e Urbanismo', 60000007, 1, 0),
(60401001, 'Fundamentos de Arquitetura e Urbanismo', 60400005, 2, 1),
(60402008, 'Projeto de Arquitetuta e Urbanismo', 60400005, 2, 1),
(60403004, 'Tecnologia de Arquitetura e Urbanismo', 60400005, 2, 1),
(60404000, 'Paisagismo', 60400005, 2, 1),
(60500000, 'Planejamento Urbano e Regional', 60000007, 1, 0),
(60501006, 'Fundamentos do Planejamento Urbano e Regional', 60500000, 2, 1),
(60502002, 'Métodos e Técnicas do Planejamento Urbano e Regional', 60500000, 2, 1),
(60503009, 'Serviços Urbanos e Regionais', 60500000, 2, 1),
(60600004, 'Demografia', 60000007, 1, 0),
(60601000, 'Distribuição Espacial', 60600004, 2, 1),
(60602007, 'Tendência Populacional', 60600004, 2, 1),
(60603003, 'Componentes da Dinâmica Demográfica', 60600004, 2, 1),
(60604000, 'Nupcialidade e Família', 60600004, 2, 1),
(60605006, 'Demografia Histórica', 60600004, 2, 1),
(60606002, 'Política Pública e População', 60600004, 2, 1),
(60607009, 'Fontes de Dados Demográficos', 60600004, 2, 1),
(60700009, 'Ciência da Informação', 60000007, 1, 0),
(60701005, 'Teoria da Informação', 60700009, 2, 1),
(60702001, 'Biblioteconomia', 60700009, 2, 1),
(60703008, 'Arquivologia', 60700009, 2, 1),
(60800003, 'Museologia', 60000007, 1, 1),
(60900008, 'Comunicação', 60000007, 1, 1),
(60901004, 'Teoria da Comunicação', 60800003, 2, 1),
(60902000, 'Jornalismo e Editoração', 60800003, 2, 1),
(60903007, 'Rádio e Televisão', 60800003, 2, 1),
(60904003, 'Relações Públicas e Propaganda', 60800003, 2, 1),
(60905000, 'Comunicação Visual', 60800003, 2, 1),
(61000000, 'Serviço Social', 60000007, 1, 0),
(61001007, 'Fundamentos do Serviço Social', 61000000, 2, 1),
(61002003, 'Serviço Social Aplicado', 61000000, 2, 1),
(61100005, 'Economia Doméstica', 60000007, 1, 1),
(61200000, 'Desenho Industrial', 60000007, 1, 1),
(61201006, 'Programação Visual', 61200000, 2, 1),
(61202002, 'Desenho de Produto', 61200000, 2, 1),
(61300004, 'Turismo', 60000007, 1, 1),
(70000000, 'Ciências Humanas', NULL, 0, 0),
(70100004, 'Filosofia', 70000000, 1, 0),
(70101000, 'História da Filosofia', 70100004, 2, 1),
(70102007, 'Metafísica', 70100004, 2, 1),
(70103003, 'Lógica', 70100004, 2, 1),
(70104000, 'Ética', 70100004, 2, 1),
(70105006, 'Epistemologia', 70100004, 2, 1),
(70106002, 'Filosofia Brasileira', 70100004, 2, 1),
(70200009, 'Sociologia', 70000000, 1, 0),
(70201005, 'Fundamentos da Sociologia', 70200009, 2, 1),
(70202001, 'Sociologia do Conhecimento', 70200009, 2, 1),
(70203008, 'Sociologia do Desenvolvimento', 70200009, 2, 1),
(70204004, 'Sociologia Urbana', 70200009, 2, 1),
(70205000, 'Sociologia Rural', 70200009, 2, 1),
(70206007, 'Sociologia da Saúde', 70200009, 2, 1),
(70207003, 'Outras Sociologias Específicas', 70200009, 2, 1),
(70300003, 'Antropologia', 70000000, 1, 0),
(70301000, 'Teoria Antropológica', 70300003, 2, 1),
(70302006, 'Etnologia Indígena', 70300003, 2, 1),
(70303002, 'Antropologia Urbana', 70300003, 2, 1),
(70304009, 'Antropologia Rural', 70300003, 2, 1),
(70305005, 'Antropologia das Populações Afro-Brasileiras', 70300003, 2, 1),
(70400008, 'Arqueologia', 70000000, 1, 0),
(70401004, 'Teoria e Método em Arqueologia', 70400008, 2, 1),
(70402000, 'Arqueologia Pré-Histórica', 70400008, 2, 1),
(70403007, 'Arqueologia Histórica', 70400008, 2, 1),
(70500002, 'História', 70000000, 1, 0),
(70501009, 'Teoria e Filosofia da História', 70500002, 2, 1),
(70502005, 'História Antiga e Medieval', 70500002, 2, 1),
(70503001, 'História Moderna e Contemporânea', 70500002, 2, 1),
(70504008, 'História da América', 70500002, 2, 1),
(70505004, 'História do Brasil', 70500002, 2, 1),
(70506000, 'História das Ciências', 70500002, 2, 1),
(70600007, 'Geografia', 70000000, 1, 0),
(70601003, 'Geografia Humana', 70600007, 2, 1),
(70602000, 'Geografia Regional', 70600007, 2, 1),
(70700001, 'Psicologia', 70000000, 1, 0),
(70701008, 'Fundamentos e Medidas da Psicologia', 70700001, 2, 1),
(70702004, 'Psicologia Experimental', 70700001, 2, 1),
(70703000, 'Psicologia Fisiológica', 70700001, 2, 1),
(70704007, 'Psicologia Comparativa', 70700001, 2, 1),
(70705003, 'Psicologia Social', 70700001, 2, 1),
(70706000, 'Psicologia Cognitiva', 70700001, 2, 1),
(70707006, 'Psicologia do Desenvolvimento Humano', 70700001, 2, 1),
(70708002, 'Psicologia do Ensino e da Aprendizagem', 70700001, 2, 1),
(70709009, 'Psicologia do Trabalho e Organizacional', 70700001, 2, 1),
(70710007, 'Tratamento e Prevenção Psicológica', 70700001, 2, 1),
(70800006, 'Educação', 70000000, 1, 0),
(70801002, 'Fundamentos da Educação', 70800006, 2, 1),
(70802009, 'Administração Educacional', 70800006, 2, 1),
(70803005, 'Planejamento e Avaliação Educacional', 70800006, 2, 1),
(70804001, 'Ensino-Aprendizagem', 70800006, 2, 1),
(70805008, 'Currículo', 70800006, 2, 1),
(70806004, 'Orientação e Aconselhamento', 70800006, 2, 1),
(70807000, 'Tópicos Específicos de Educação', 70800006, 2, 1),
(70900000, 'Ciência Política', 70000000, 1, 0),
(70901007, 'Teoria Política', 70900000, 2, 1),
(70902003, 'Estado e Governo', 70900000, 2, 1),
(70903000, 'Comportamento Político', 70900000, 2, 1),
(70904006, 'Políticas Públicas', 70900000, 2, 1),
(70905002, 'Política Internacional', 70900000, 2, 1),
(71000003, 'Teologia', 70000000, 1, 0),
(71001000, 'História da Teologia', 71000003, 2, 1),
(71002006, 'Teologia Moral', 71000003, 2, 1),
(71003002, 'Teologia Sistemática', 71000003, 2, 1),
(71004009, 'Teologia Pastoral', 71000003, 2, 1),
(80000002, 'Lingüística, Letras e Artes', NULL, 0, 0),
(80100007, 'Lingüística', 80000002, 1, 0),
(80101003, 'Teoria e Análise Lingüística', 80100007, 2, 1),
(80102000, 'Fisiologia da Linguagem', 80100007, 2, 1),
(80103006, 'Lingüística Histórica', 80100007, 2, 1),
(80104002, 'Sociolingüística e Dialetologia', 80100007, 2, 1),
(80105009, 'Psicolingüística', 80100007, 2, 1),
(80106005, 'Lingüística Aplicada', 80100007, 2, 1),
(80200001, 'Letras', 80000002, 1, 0),
(80201008, 'Língua Portuguesa', 80200001, 2, 1),
(80202004, 'Línguas Estrangeiras Modernas', 80200001, 2, 1),
(80203000, 'Línguas Clássicas', 80200001, 2, 1),
(80204007, 'Línguas Indígenas', 80200001, 2, 1),
(80205003, 'Teoria Literária', 80200001, 2, 1),
(80206000, 'Literatura Brasileira', 80200001, 2, 1),
(80207006, 'Outras Literaturas Vernáculas', 80200001, 2, 1),
(80208002, 'Literaturas Estrangeiras Modernas', 80200001, 2, 1),
(80209009, 'Literaturas Clássicas', 80200001, 2, 1),
(80210007, 'Literatura Comparada', 80200001, 2, 1),
(80300006, 'Artes', 80000002, 1, 0),
(80301002, 'Fundamentos e Crítica das Artes', 80300006, 2, 1),
(80302009, 'Artes Plásticas', 80300006, 2, 1),
(80303005, 'Música', 80300006, 2, 1),
(80304001, 'Dança', 80300006, 2, 1),
(80305008, 'Teatro', 80300006, 2, 1),
(80306004, 'Ópera', 80300006, 2, 1),
(80307000, 'Fotografia', 80300006, 2, 1),
(80308007, 'Cinema', 80300006, 2, 1),
(80309003, 'Artes do Vídeo', 80300006, 2, 1),
(80310001, 'Educação Artística', 80300006, 2, 1),
(90000005, 'Outros', NULL, 0, 0),
(92400000, 'Defesa', 90000005, 1, 1),
(92600000, 'Bioética', 90000005, 1, 1),
(92700004, 'Ciências Ambientais', 90000005, 1, 1),
(92800009, 'Divulgação Científica', 90000005, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas_tematicas`
--

CREATE TABLE `areas_tematicas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `areas_tematicas`
--

INSERT INTO `areas_tematicas` (`id`, `nome`) VALUES
(1, 'Comunicação'),
(2, 'Cultura'),
(3, 'Assistência Jurídica'),
(4, 'Educação'),
(5, 'Meio Ambiente'),
(6, 'Saúde'),
(7, 'Tecnologia e produção'),
(8, 'Trabalho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cronograma`
--

CREATE TABLE `cronograma` (
  `idcronograma` int(11) NOT NULL,
  `idprojeto` int(11) NOT NULL,
  `atividade` varchar(200) NOT NULL,
  `janeiro` tinyint(1) NOT NULL,
  `fevereiro` tinyint(1) NOT NULL,
  `marco` tinyint(1) NOT NULL,
  `abril` tinyint(1) NOT NULL,
  `maio` tinyint(1) NOT NULL,
  `junho` tinyint(1) NOT NULL,
  `julho` tinyint(1) NOT NULL,
  `agosto` tinyint(1) NOT NULL,
  `setembro` tinyint(1) NOT NULL,
  `outubro` tinyint(1) NOT NULL,
  `novembro` tinyint(1) NOT NULL,
  `dezembro` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cronograma`
--

INSERT INTO `cronograma` (`idcronograma`, `idprojeto`, `atividade`, `janeiro`, `fevereiro`, `marco`, `abril`, `maio`, `junho`, `julho`, `agosto`, `setembro`, `outubro`, `novembro`, `dezembro`) VALUES
(1, 4, 'teste', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 4, 'teste 2', 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 'ssss', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 4, 'novo', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 4, 'Entrevistas r', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 4, 'sss', 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(9, 4, 'asdasd', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 3, 'asda', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 5, 'levantamento de dados', 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 5, 'levantamento da estrutura', 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `coordenador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `coordenador_id`) VALUES
(1, 'Informatica', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `projeto_id` int(10) UNSIGNED NOT NULL,
  `data_evento` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `descricao` varchar(255) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `setor_destino` int(11) DEFAULT NULL,
  `responsavel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `projeto_id`, `data_evento`, `descricao`, `tipo`, `setor_destino`, `responsavel_id`) VALUES
(1, 1, '2017-08-25 19:45:20', 'Projeto autuado no sistema.', 0, 3, 1),
(2, 1, '2017-09-04 19:08:36', 'Designado parecerista.', 1, 6, 1),
(3, 1, '2017-09-04 19:12:12', 'Designado parecerista.', 1, 6, 1),
(4, 1, '2017-09-04 19:27:16', 'Designado parecerista.', 1, 6, 1),
(5, 1, '2017-09-04 19:40:43', 'Designado parecerista.', 1, 6, 1),
(6, 1, '2017-09-04 19:47:56', 'Designado parecerista.', 1, 6, 1),
(7, 1, '2017-09-04 19:49:44', 'Designado parecerista.', 1, 6, 1),
(8, 1, '2017-09-04 19:50:50', 'Designado parecerista.', 1, 6, 1),
(9, 1, '2017-09-04 19:51:22', 'Designado parecerista.', 1, 6, 1),
(10, 1, '2017-09-04 20:00:31', 'Designado parecerista.', 1, 6, 1),
(11, 1, '2017-09-04 20:01:45', 'Designado parecerista.', 1, 6, 1),
(12, 1, '2017-09-04 20:05:49', 'Designado parecerista.', 1, 6, 1),
(13, 1, '2017-09-04 20:23:25', 'Designado parecerista.', 1, 6, 1),
(14, 1, '2017-09-04 20:23:51', 'Designado parecerista.', 1, 6, 1),
(15, 1, '2017-09-04 20:27:50', 'Designado parecerista.', 1, 6, 1),
(16, 1, '2017-09-04 20:28:36', 'Designado parecerista.', 1, 6, 1),
(17, 1, '2017-09-04 20:29:31', 'Designado parecerista.', 1, 6, 1),
(18, 1, '2017-09-04 22:33:43', 'Designado parecerista.', 1, 6, 1),
(19, 1, '2017-09-04 22:37:17', 'Designado parecerista.', 1, 6, 1),
(20, 1, '2017-09-04 22:54:34', 'Designado parecerista.', 1, 6, 1),
(21, 1, '2017-09-04 22:58:20', 'Designado parecerista.', 1, 6, 1),
(22, 1, '2017-09-04 23:09:11', 'Designado parecerista.', 1, 6, 1),
(23, 1, '2017-09-04 23:32:47', 'Designado parecerista.', 1, 6, 1),
(24, 1, '2017-09-04 23:34:03', 'Designado parecerista.', 1, 6, 1),
(25, 1, '2017-09-04 23:34:54', 'Designado parecerista.', 1, 6, 1),
(26, 1, '2017-09-04 23:36:05', 'Designado parecerista.', 1, 6, 1),
(27, 1, '2017-09-04 23:37:28', 'Designado parecerista.', 1, 6, 1),
(28, 1, '2017-09-04 23:40:35', 'Designado parecerista.', 1, 6, 1),
(29, 1, '2017-09-04 23:43:12', 'Designado parecerista.', 1, 6, 1),
(30, 1, '2017-09-04 23:44:25', 'Designado parecerista.', 1, 6, 1),
(31, 1, '2017-09-04 23:47:00', 'Designado parecerista.', 1, 6, 1),
(32, 1, '2017-09-04 23:48:50', 'Designado parecerista.', 1, 6, 1),
(33, 1, '2017-09-04 23:53:08', 'Designado parecerista.', 1, 6, 1),
(34, 1, '2017-09-04 23:54:12', 'Designado parecerista.', 1, 6, 1),
(35, 1, '2017-09-04 23:56:23', 'Designado parecerista.', 1, 6, 1),
(36, 1, '2017-09-04 23:58:10', 'Designado parecerista.', 1, 6, 1),
(37, 1, '2017-09-04 23:59:51', 'Designado parecerista.', 1, 6, 1),
(38, 2, '2017-09-05 23:04:53', 'Projeto autuado no sistema.', 0, 3, 3),
(39, 2, '2017-09-05 23:05:08', 'Designado parecerista.', 1, 6, 3),
(40, 4, '2017-09-26 17:09:35', 'Projeto autuado no sistema.', 0, 3, 1),
(41, 4, '2017-09-26 17:10:08', 'Designado parecerista.', 1, 6, 1),
(42, 4, '2017-09-26 18:10:25', 'Pareceber encaminhado.', 1, NULL, 1),
(43, 3, '2017-09-28 23:21:45', 'Projeto autuado no sistema.', 0, 3, 1),
(44, 3, '2017-09-28 23:22:21', 'Designado parecerista.', 1, 6, 1),
(45, 5, '2017-10-10 00:22:19', 'Projeto autuado no sistema.', 0, 3, 1),
(46, 5, '2017-10-10 00:22:47', 'Designado parecerista.', 1, 6, 1),
(47, 5, '2017-10-10 00:27:12', 'Designado parecerista.', 1, 6, 1),
(48, 5, '2017-10-10 00:29:29', 'Designado parecerista.', 1, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fases`
--

CREATE TABLE `fases` (
  `id` int(11) NOT NULL,
  `data_limite` date NOT NULL,
  `data_recebimento` timestamp NULL DEFAULT NULL,
  `aberto` tinyint(4) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `aprovado` tinyint(4) NOT NULL,
  `projeto_id` int(4) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhas_extensao`
--

CREATE TABLE `linhas_extensao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `linhas_extensao`
--

INSERT INTO `linhas_extensao` (`id`, `nome`) VALUES
(1, 'Alfabetização, leitura e escrita'),
(2, ' Educação profissional');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pareceres`
--

CREATE TABLE `pareceres` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_solicitacao_parecer` int(11) NOT NULL,
  `tipo_resposta` int(11) NOT NULL,
  `data_recebimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `arquivo` text NOT NULL,
  `nome_arquivo` text NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `identificacao` tinyint(1) NOT NULL,
  `idt_obs` text NOT NULL,
  `comite` tinyint(1) NOT NULL,
  `comite_obs` text NOT NULL,
  `colegiado` tinyint(1) NOT NULL,
  `colegiado_obs` text NOT NULL,
  `parceria` tinyint(1) NOT NULL,
  `parceria_obs` text NOT NULL,
  `integrantes` tinyint(1) NOT NULL,
  `integrantes_obs` text NOT NULL,
  `caracterizacao` tinyint(1) NOT NULL,
  `caracterizacao_obs` text NOT NULL,
  `relevante` tinyint(1) NOT NULL,
  `relevante_obs` text NOT NULL,
  `teorica` tinyint(1) DEFAULT NULL,
  `teorica_obs` text,
  `objetivos` tinyint(1) NOT NULL,
  `objetivos_obs` text NOT NULL,
  `propostos` tinyint(1) NOT NULL,
  `propostos_obs` text NOT NULL,
  `materiais_finan` tinyint(1) NOT NULL,
  `materiais_fin_obs` text NOT NULL,
  `crono` tinyint(1) NOT NULL,
  `cronograma_obs` text NOT NULL,
  `discentes` tinyint(1) NOT NULL,
  `discentes_obs` text NOT NULL,
  `horaria` tinyint(1) NOT NULL,
  `horaria_obs` text NOT NULL,
  `referencias` tinyint(1) NOT NULL,
  `referencias_obs` text NOT NULL,
  `conclusao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pareceres`
--

INSERT INTO `pareceres` (`id`, `id_solicitacao_parecer`, `tipo_resposta`, `data_recebimento`, `arquivo`, `nome_arquivo`, `created`, `modified`, `identificacao`, `idt_obs`, `comite`, `comite_obs`, `colegiado`, `colegiado_obs`, `parceria`, `parceria_obs`, `integrantes`, `integrantes_obs`, `caracterizacao`, `caracterizacao_obs`, `relevante`, `relevante_obs`, `teorica`, `teorica_obs`, `objetivos`, `objetivos_obs`, `propostos`, `propostos_obs`, `materiais_finan`, `materiais_fin_obs`, `crono`, `cronograma_obs`, `discentes`, `discentes_obs`, `horaria`, `horaria_obs`, `referencias`, `referencias_obs`, `conclusao`) VALUES
(1, 38, 1, '2017-09-26 18:10:25', 'anexos/ee406a49-73d7-407d-81b0-f277e34a0b31-P_20160814_112044.jpg', 'P_20160814_112044.jpg', '2017-09-26 18:10:25', '2017-09-26 18:10:25', 1, 'dsfsd', 1, 'sdf', 1, 'sdfsd', 1, 'sdfsdf', 1, 'sdfsdf', 1, 'sdfsdfs', 1, 'sdfsdfsdf', NULL, NULL, 1, 'sdfsdf', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 'sdfsdfsdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pareceristas`
--

CREATE TABLE `pareceristas` (
  `id` int(11) NOT NULL,
  `parecerista_id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `prazo` date DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes_certificados`
--

CREATE TABLE `participantes_certificados` (
  `solicitacoes_certificados_id` int(10) UNSIGNED NOT NULL,
  `participantes_projetos_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes_projetos`
--

CREATE TABLE `participantes_projetos` (
  `id` int(11) NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `tipo_participante` int(11) NOT NULL,
  `bolsista` tinyint(4) DEFAULT NULL,
  `bolsa` varchar(255) DEFAULT NULL,
  `data_entrada` date NOT NULL,
  `data_saida` date DEFAULT NULL,
  `vinculo_projeto` tinyint(11) NOT NULL,
  `recebe_certificado` tinyint(4) DEFAULT NULL,
  `pessoa_id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `participantes_projetos`
--

INSERT INTO `participantes_projetos` (`id`, `carga_horaria`, `tipo_participante`, `bolsista`, `bolsa`, `data_entrada`, `data_saida`, `vinculo_projeto`, `recebe_certificado`, `pessoa_id`, `projeto_id`, `created`, `modified`) VALUES
(9, 8, 0, 0, '', '2017-08-25', NULL, 0, 1, 1, 1, '2017-08-25 18:49:00', '2017-08-25 18:49:00'),
(10, 4, 0, 0, '', '2017-09-05', NULL, 0, 1, 2, 2, '2017-09-05 23:03:48', '2017-09-05 23:03:48'),
(11, 3, 0, 0, '', '2017-09-05', NULL, 0, 1, 1, 3, '2017-09-05 23:15:07', '2017-09-05 23:15:07'),
(12, 2, 1, 0, '', '2017-09-12', NULL, 0, 1, 3, 3, '2017-09-12 18:06:45', '2017-09-12 18:06:45'),
(13, 2, 2, 0, '', '2017-09-12', NULL, 0, 1, 2, 3, '2017-09-12 19:25:06', '2017-09-12 19:25:06'),
(14, 5, 0, 0, '', '2017-09-26', '2019-02-02', 0, 1, 3, 4, '2017-09-26 17:08:20', '2017-09-26 17:08:20'),
(15, 8, 0, 1, 'capes', '2017-10-10', NULL, 0, 1, 2, 5, '2017-10-10 00:19:49', '2017-10-10 00:19:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `vinculo` tinyint(4) DEFAULT NULL,
  `siape` int(11) DEFAULT NULL,
  `matricula` varchar(11) DEFAULT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `vinculo`, `siape`, `matricula`, `rg`, `cpf`, `email`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'Administrador', NULL, NULL, NULL, NULL, NULL, 'chsguitar1@gmail.com', '2017-08-25 18:14:20', NULL, 1, NULL),
(2, 'Cristiano Herculano da Silva', 0, 6545645, '6545465456', '59923420', '83229973968', 'profchstis@gmail.com', '2017-08-25 18:31:44', '2017-09-04 23:59:36', 1, 1),
(3, 'Paulo', 0, 234234, '2342', '59923420', '83229973968', 'profchstis@gmail.com', '2017-08-25 19:52:22', '2017-08-25 19:52:22', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `encerrado` tinyint(1) DEFAULT NULL,
  `grande_area_conhecimento` int(11) DEFAULT NULL,
  `comite_etica` tinyint(1) DEFAULT NULL,
  `num_protocolo` int(255) DEFAULT NULL,
  `num_sipac` varchar(255) DEFAULT NULL,
  `situacao_projeto` int(11) NOT NULL,
  `tipo_projeto` int(11) NOT NULL,
  `tituto_projeto` varchar(255) NOT NULL,
  `descricao_projeto` longtext,
  `curso_id` int(11) DEFAULT NULL,
  `parecerista_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `rascunho` tinyint(1) DEFAULT NULL,
  `data_protocolo` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `cod_areas_conhecimentos` int(11) NOT NULL,
  `setor_atual` int(11) NOT NULL,
  `id_area_tematica` int(11) DEFAULT NULL,
  `id_linha_extensao` int(11) DEFAULT NULL,
  `colegiado` varchar(50) DEFAULT NULL,
  `parcerias_ext` text,
  `primeira` tinyint(1) NOT NULL DEFAULT '0',
  `resumo` text,
  `palavras_chave` varchar(50) DEFAULT NULL,
  `fundamentacao` text,
  `objetivos` text,
  `metodologia` text,
  `recursos` text,
  `referencias` text,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `ano`, `data_inicio`, `data_fim`, `encerrado`, `grande_area_conhecimento`, `comite_etica`, `num_protocolo`, `num_sipac`, `situacao_projeto`, `tipo_projeto`, `tituto_projeto`, `descricao_projeto`, `curso_id`, `parecerista_id`, `created`, `modified`, `rascunho`, `data_protocolo`, `created_by`, `modified_by`, `cod_areas_conhecimentos`, `setor_atual`, `id_area_tematica`, `id_linha_extensao`, `colegiado`, `parcerias_ext`, `primeira`, `resumo`, `palavras_chave`, `fundamentacao`, `objetivos`, `metodologia`, `recursos`, `referencias`, `status`) VALUES
(1, 2017, '2017-08-01', NULL, NULL, NULL, 0, 1, NULL, 0, 0, 'tec Litera', 'teste', 1, NULL, '2017-08-25 18:48:52', '2017-08-25 19:45:20', 0, '2017-08-25 19:45:20', 1, 1, 60701005, 3, NULL, NULL, 'sdas', '', 1, 'asd', 'asdasd', 'asdasd', 'asdasdasda', 'sadasd', 'asdasdasd', 'asdasdasd', 1),
(2, 2017, '2017-09-01', NULL, NULL, NULL, 0, 2, NULL, 0, 0, 'teste proponente', 'dsasd', 1, NULL, '2017-09-05 23:03:31', '2017-09-05 23:04:52', 0, '2017-09-05 23:04:52', 7, 7, 10201009, 3, NULL, NULL, 'asdaSDAS', 'ASDA', 1, 'ASDASD', '\\SDA', 'ASDASD', 'ASDAS', 'ASDASD', 'ASDASD', 'ASDASD', 1),
(3, 2017, '2017-09-05', NULL, NULL, NULL, 1, 4, NULL, 0, 0, 'arte', 'asdasd', 1, NULL, '2017-09-05 23:15:01', '2017-09-28 23:21:44', 0, '2017-09-28 23:21:44', 7, 1, 10101004, 3, NULL, NULL, 'asd', 'asda', 1, 'asdasd', 'asda', 'asdas', 'asdasd', 'asdasd', 'asdad', 'asdad', 1),
(4, 2017, '2017-09-19', NULL, NULL, NULL, 0, 3, NULL, 0, 1, 'teste crono', 'asda', 1, NULL, '2017-09-06 00:59:54', '2017-09-26 17:09:34', 0, '2017-09-26 17:09:34', 1, 1, 10402004, 3, 1, 1, 'sdasd', 'asdasd', 0, 'asdasd', 'asdasd', 'asdasdas', 'asdasdas', 'asdasdasda', 'asdasdas', 'asdasdasd', 1),
(5, 2017, '2017-09-27', '2010-10-17', NULL, NULL, 0, 5, NULL, 0, 0, 'Projetos de redes', 'Projeto de redes de computadores', 1, NULL, '2017-10-10 00:19:09', '2017-10-10 00:22:19', 0, '2017-10-10 00:22:19', 1, 1, 10301003, 3, NULL, NULL, 'teste', 'teste', 0, 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_relatorio` datetime NOT NULL,
  `data_protocolo` datetime NOT NULL,
  `fase_id` int(11) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL,
  `caminho_arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_users`
--

CREATE TABLE `role_users` (
  `usuario_id` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `role_users`
--

INSERT INTO `role_users` (`usuario_id`, `role`) VALUES
(1, 0),
(1, 1),
(1, 2),
(1, 6),
(7, 1),
(7, 6),
(11, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE `setores` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `responsavel_id` int(11) DEFAULT NULL,
  `identificador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id`, `descricao`, `responsavel_id`, `identificador`) VALUES
(3, 'COPE', 8, 1),
(4, 'Direção de Ensino', 7, 4),
(5, 'Proponente', NULL, 0),
(6, 'Parecerista', NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao_pareceres`
--

CREATE TABLE `solicitacao_pareceres` (
  `id` int(11) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `data_solicitacao` timestamp NULL DEFAULT NULL,
  `data_aceitacao_rejeicao` timestamp NULL DEFAULT NULL,
  `observacao_solicitacao` text,
  `observacao_aceitacao_rejeicao` text,
  `situacao` tinyint(4) NOT NULL,
  `externo` tinyint(1) NOT NULL,
  `data_limite_aceite` date DEFAULT NULL,
  `data_limite_envio` date DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `tipo_parecer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `solicitacao_pareceres`
--

INSERT INTO `solicitacao_pareceres` (`id`, `id_projeto`, `id_pessoa`, `data_solicitacao`, `data_aceitacao_rejeicao`, `observacao_solicitacao`, `observacao_aceitacao_rejeicao`, `situacao`, `externo`, `data_limite_aceite`, `data_limite_envio`, `created`, `modified`, `created_by`, `modified_by`, `tipo_parecer`) VALUES
(1, 1, 1, '2017-09-04 19:08:36', '2017-09-04 19:11:19', 'teste de parecerista', NULL, 2, 0, '2017-09-19', '2017-10-19', '2017-09-04 19:08:36', '2017-09-04 19:11:19', 1, NULL, 1),
(36, 1, 2, '2017-09-04 23:59:51', NULL, '', NULL, 1, 0, '2017-09-19', '2017-10-19', '2017-09-04 23:59:51', NULL, 1, NULL, 1),
(37, 2, 1, '2017-09-05 23:05:08', '2017-09-28 23:24:42', '', NULL, 2, 0, '2017-09-20', '2017-10-20', '2017-09-05 23:05:08', '2017-09-28 23:24:42', 7, NULL, 1),
(38, 4, 1, '2017-09-26 17:10:07', '2017-09-26 17:11:22', 'sdfsdf', NULL, 4, 1, '2017-10-11', '2017-11-10', '2017-09-26 17:10:07', '2017-09-26 18:10:25', 1, NULL, 1),
(39, 3, 1, '2017-09-28 23:22:21', '2017-09-28 23:29:08', 'asdasd', NULL, 2, 0, '2017-10-13', '2017-11-12', '2017-09-28 23:22:21', '2017-09-28 23:29:08', 1, NULL, 1),
(40, 5, 3, '2017-10-10 00:22:47', NULL, 'teste', NULL, 1, 0, '2017-10-25', '2017-11-24', '2017-10-10 00:22:47', NULL, 1, NULL, 1),
(41, 5, 3, '2017-10-10 00:27:12', NULL, 'teste', NULL, 1, 0, '2017-10-25', '2017-11-24', '2017-10-10 00:27:12', NULL, 1, NULL, 1),
(42, 5, 2, '2017-10-10 00:29:29', NULL, 'teste', NULL, 1, 0, '2017-10-25', '2017-11-24', '2017-10-10 00:29:29', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes_certificados`
--

CREATE TABLE `solicitacoes_certificados` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_solicitacao` timestamp NULL DEFAULT NULL,
  `data_inicial` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `hora_aut_cope` timestamp NULL DEFAULT NULL,
  `hora_aut_ce` timestamp NULL DEFAULT NULL,
  `hora_aut_secretaria` timestamp NULL DEFAULT NULL,
  `projeto_id` int(11) NOT NULL,
  `autenticador_cope` int(11) DEFAULT NULL,
  `autenticador_ce` int(11) DEFAULT NULL,
  `autenticador_sec` int(11) DEFAULT NULL,
  `solicitante_id` int(11) NOT NULL,
  `hash_aut_cope` varchar(255) DEFAULT NULL,
  `hash_aut_ce` varchar(255) DEFAULT NULL,
  `hash_aut_sec` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `default_role` tinyint(4) DEFAULT NULL,
  `pessoa_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `default_role`, `pessoa_id`, `created`, `modified`) VALUES
(1, 'admin', '$2y$10$Y8PaXoj7/gYS4Fz9Nvuz9u0DDBIvVed5wRIgIIN9M1x9E28DjQQni', 0, 1, '2015-11-30 13:37:01', '2017-08-03 13:13:42'),
(7, 'paulo', '$2y$10$MSazaseyRXO2GJmrVJ7hrei3kJLZ0MjC6McYC6SE5XUJdvOo8ayiS', 1, 3, '2017-08-25 19:52:35', '2017-08-25 19:52:35'),
(8, 'pro', '$2y$10$hupLwXugGEqhk0Ml3wrpGOgPqI2rCnTwSU5BBgtUnxWvKsRQ2QDqq', 6, 3, '2017-09-26 22:00:44', '2017-09-26 22:00:44'),
(9, 'teste', '$2y$10$eGgNbP5QudZCt8U3Nq8z/e4Cdgt1AdhNLboGg22ZX7qrkQTpZHkyi', 2, 2, '2017-10-09 22:58:12', '2017-10-09 22:58:12'),
(11, 'chs12', '$2y$10$32U26iYKqcR/k80MBm2/X.J5N2FkPefsRiRv8zlyewaxdoOuFaILC', 1, 2, '2017-10-09 23:28:07', '2017-10-09 23:28:07');

--
-- Acionadores `users`
--
DELIMITER $$
CREATE TRIGGER `add_role` AFTER INSERT ON `users` FOR EACH ROW insert into role_users(usuario_id,role) VALUES(new.id, new.default_role)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_role` AFTER UPDATE ON `users` FOR EACH ROW update role_users set usuario_id = new.id, role = new.default_role
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `versao`
--

CREATE TABLE `versao` (
  `id` int(11) NOT NULL,
  `numero` varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acao_extensao`
--
ALTER TABLE `acao_extensao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projeto_id` (`projeto_id`);

--
-- Indexes for table `acompanhamentos`
--
ALTER TABLE `acompanhamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alteracao_horarios`
--
ALTER TABLE `alteracao_horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participanteFK` (`participante_id`);

--
-- Indexes for table `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas_conhecimentos`
--
ALTER TABLE `areas_conhecimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_pai` (`cod_pai`);

--
-- Indexes for table `areas_tematicas`
--
ALTER TABLE `areas_tematicas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cronograma`
--
ALTER TABLE `cronograma`
  ADD PRIMARY KEY (`idcronograma`),
  ADD KEY `id_fk_projeto` (`idprojeto`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coordenador_id` (`coordenador_id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fases_ibfk_1` (`projeto_id`);

--
-- Indexes for table `linhas_extensao`
--
ALTER TABLE `linhas_extensao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pareceres`
--
ALTER TABLE `pareceres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_solicitacao_parecer` (`id_solicitacao_parecer`);

--
-- Indexes for table `pareceristas`
--
ALTER TABLE `pareceristas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parecerista_id` (`parecerista_id`);

--
-- Indexes for table `participantes_certificados`
--
ALTER TABLE `participantes_certificados`
  ADD PRIMARY KEY (`solicitacoes_certificados_id`,`participantes_projetos_id`);

--
-- Indexes for table `participantes_projetos`
--
ALTER TABLE `participantes_projetos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pessoaFK` (`pessoa_id`),
  ADD KEY `projeto_id` (`projeto_id`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursoPK` (`curso_id`),
  ADD KEY `pareceristaFK` (`parecerista_id`),
  ADD KEY `id_area_tematica` (`id_area_tematica`),
  ADD KEY `id_linha_extensao` (`id_linha_extensao`);

--
-- Indexes for table `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projeto_id` (`fase_id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`usuario_id`,`role`);

--
-- Indexes for table `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificador` (`identificador`),
  ADD KEY `setores_ibfk_1` (`responsavel_id`);

--
-- Indexes for table `solicitacao_pareceres`
--
ALTER TABLE `solicitacao_pareceres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_projeto` (`id_projeto`),
  ADD KEY `id_pessoa` (`id_pessoa`);

--
-- Indexes for table `solicitacoes_certificados`
--
ALTER TABLE `solicitacoes_certificados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autenticador_cope` (`autenticador_cope`),
  ADD KEY `autenticador_ce` (`autenticador_ce`),
  ADD KEY `autenticador_sec` (`autenticador_sec`),
  ADD KEY `solicitante_id` (`solicitante_id`),
  ADD KEY `projeto_id` (`projeto_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pessoa_id` (`pessoa_id`),
  ADD KEY `login` (`username`);

--
-- Indexes for table `versao`
--
ALTER TABLE `versao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acao_extensao`
--
ALTER TABLE `acao_extensao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acompanhamentos`
--
ALTER TABLE `acompanhamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alteracao_horarios`
--
ALTER TABLE `alteracao_horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anexos`
--
ALTER TABLE `anexos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `areas_tematicas`
--
ALTER TABLE `areas_tematicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cronograma`
--
ALTER TABLE `cronograma`
  MODIFY `idcronograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `linhas_extensao`
--
ALTER TABLE `linhas_extensao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pareceres`
--
ALTER TABLE `pareceres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pareceristas`
--
ALTER TABLE `pareceristas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `participantes_projetos`
--
ALTER TABLE `participantes_projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setores`
--
ALTER TABLE `setores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `solicitacao_pareceres`
--
ALTER TABLE `solicitacao_pareceres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `solicitacoes_certificados`
--
ALTER TABLE `solicitacoes_certificados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `versao`
--
ALTER TABLE `versao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `acao_extensao`
--
ALTER TABLE `acao_extensao`
  ADD CONSTRAINT `pjd` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`);

--
-- Limitadores para a tabela `alteracao_horarios`
--
ALTER TABLE `alteracao_horarios`
  ADD CONSTRAINT `participanteFK` FOREIGN KEY (`participante_id`) REFERENCES `participantes_projetos` (`id`);

--
-- Limitadores para a tabela `fases`
--
ALTER TABLE `fases`
  ADD CONSTRAINT `fases_ibfk_1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
