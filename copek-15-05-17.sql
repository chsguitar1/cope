-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Maio-2017 às 23:45
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `copek`
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
  `created` timestamp NOT NULL,
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

--
-- Extraindo dados da tabela `acompanhamentos`
--

INSERT INTO `acompanhamentos` (`id`, `tipo`, `descricao`, `projeto_id`, `created`, `modified`, `created_by`) VALUES
(1, 0, 'testee', 1, '2015-11-05 12:58:19', '2015-11-05 12:58:19', 1),
(2, 2, 'Testee 2', 1, '2015-11-05 13:02:05', '2015-11-05 13:02:05', 1),
(3, 1, 'Corrija o cronograma.', 6, '2015-11-06 10:29:35', '2015-11-06 10:29:35', 1),
(4, 1, '113,\r\n', 6, '2015-11-10 12:48:40', '2015-11-10 12:48:40', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alteracao_horarios`
--

CREATE TABLE `alteracao_horarios` (
  `id` int(11) NOT NULL,
  `data_alteracao` date NOT NULL,
  `nova_carga_horaria` int(11) NOT NULL,
  `participante_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
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
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anexos`
--

INSERT INTO `anexos` (`id`, `nome`, `descricao`, `tipo_anexo`, `caminho`, `tamanho`, `created`, `modified`, `created_by`, `projeto_id`) VALUES
(8, '1434-FLEXIBILIZAÇÃO-DA-JORNADA-DE-TRABALHO.pdf', 'Teste', 0, 'anexos/81f455f7-2cdd-4778-804b-95dffb33353f-1434-FLEXIBILIZAÇÃO-DA-JORNADA-DE-TRABALHO.pdf', 1119729, '2015-11-04 17:51:23', '2015-11-04 17:51:23', 1, 10),
(9, 'POP-SeracUmu131 (3).doc', 'teste', 3, 'anexos/75cd6b48-423f-4aa3-92d6-2494238442a5-POP-SeracUmu131 (3).doc', 351744, '2015-11-24 18:15:02', '2015-11-24 18:15:02', 1, 45),
(10, 'Paulo Gaiotto.pdf', 'despacho', 3, 'anexos/3a918759-6f99-4382-a28b-379635aeccca-Paulo Gaiotto.pdf', 1828522, '2015-11-25 11:41:15', '2015-11-25 11:41:15', 1, 44),
(11, 'Portaria 62.pdf', 'projeto', 0, 'anexos/84630fa4-4464-4c22-9fc0-da98d54ecad0-Portaria 62.pdf', 66043, '2015-11-25 11:41:25', '2015-11-25 11:41:25', 1, 44),
(12, 'Acórdão Microsoft TCU.pdf', 'despacho', 3, 'anexos/bea459a6-9d00-42a4-9293-7b74a88b9612-Acórdão Microsoft TCU.pdf', 490127, '2016-06-07 11:34:33', '2016-06-07 11:34:33', 1, 48),
(13, 'retirada 3.pdf', 'ttttt', 0, 'anexos/06355b11-b144-407b-8e71-43152e64e7a6-retirada 3.pdf', 117732, '2016-06-07 11:34:44', '2016-06-07 11:34:44', 1, 48),
(14, 'retirada 3.pdf', 'Despacho', 3, 'anexos/02a5cf2b-7c9b-4ee8-8a35-d7b764a94797-retirada 3.pdf', 117732, '2016-06-08 14:25:09', '2016-06-08 14:25:09', 3, 52),
(15, 'retirada 2.pdf', 'Projeto', 0, 'anexos/6e6b3c86-015a-45dd-b402-18f4e6d34052-retirada 2.pdf', 118392, '2016-06-08 14:25:39', '2016-06-08 14:25:39', 3, 52),
(16, 'retirada 3.pdf', '', 0, 'anexos/32465cbe-22c2-470a-823e-d60c28d789b8-retirada 3.pdf', 117732, '2016-06-13 13:44:23', '2016-06-13 13:44:23', 3, 53),
(17, 'OS RETIRADA.pdf', '', 3, 'anexos/859600c6-83db-44e6-84f8-9c20e45e3429-OS RETIRADA.pdf', 106331, '2016-06-13 13:44:32', '2016-06-13 13:44:32', 3, 53),
(18, 'Detalhes de Conta.pdf', 'teste', 0, 'anexos/cacdcc78-d742-4502-873f-f8578c86ed1d-Detalhes de Conta.pdf', 280640, '2016-08-17 12:39:44', '2016-08-17 12:39:44', 1, 56),
(19, 'PROPOSTA CAMPUS UMUARAMA - SKETCHUP - assinado.pdf', 'teste2', 3, 'anexos/ea3c5ff1-141a-4dd4-9f72-39b53157b0f2-PROPOSTA CAMPUS UMUARAMA - SKETCHUP - assinado.pdf', 316716, '2016-08-17 12:40:07', '2016-08-17 12:40:07', 1, 56),
(21, 'cgu-ponto-ebtt.pdf', 'ttt', 0, 'anexos/84240635-87ff-4cbe-8522-e6d6635dde39-cgu-ponto-ebtt.pdf', 224315, '2017-05-15 22:54:31', '2017-05-15 22:54:31', 1, 49);

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
(1, 'Agronegócio', 4);

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
(3, 8, '2015-10-29 17:02:48', 'Projeto autuado no sistema.', 0, NULL, NULL),
(4, 7, '2015-11-03 17:51:01', 'Projeto autuado no sistema.', 0, NULL, NULL),
(5, 9, '2015-11-03 17:56:54', 'Projeto autuado no sistema.', 0, NULL, NULL),
(6, 41, '2015-11-03 18:18:51', 'Projeto autuado no sistema.', 0, NULL, NULL),
(7, 10, '2015-11-05 11:58:15', 'Projeto autuado no sistema.', 0, NULL, NULL),
(8, 42, '2015-11-05 11:58:53', 'Projeto autuado no sistema.', 0, NULL, NULL),
(9, 42, '2015-11-05 12:02:02', 'Projeto autuado no sistema.', 0, NULL, NULL),
(10, 41, '2015-11-05 12:03:03', 'Projeto autuado no sistema.', 0, NULL, NULL),
(11, 43, '2015-11-05 12:06:36', 'Projeto autuado no sistema.', 0, NULL, NULL),
(12, 1, '2015-11-05 16:30:00', 'Designado parecerista prazo,', 1, NULL, NULL),
(13, 2, '2015-11-05 16:33:14', 'Designado parecerista.', 1, NULL, NULL),
(14, 2, '2015-11-05 16:33:52', 'Designado parecerista prazo,06/02/2020', 1, NULL, NULL),
(15, 6, '2015-11-05 17:13:39', 'Designado parecerista prazo, 06/04/2018.', 1, NULL, NULL),
(16, 6, '2015-11-05 17:14:01', 'Designado parecerista prazo, 04/12/2014.', 1, NULL, NULL),
(17, 6, '2015-11-05 17:43:02', 'Designado parecerista prazo, 05/11/2015.', 1, NULL, NULL),
(18, 6, '2015-11-05 17:46:10', 'Designado parecerista prazo, 04/03/2020.', 1, NULL, NULL),
(25, 44, '2015-11-25 12:46:17', 'Projeto autuado no sistema.', 0, 3, 8),
(27, 6, '2015-11-25 13:13:05', 'Designado parecerista prazo, 31/12/2015.', 1, 6, 4),
(28, 6, '2015-11-25 14:45:27', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(29, 6, '2015-11-25 14:46:09', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(30, 6, '2015-11-25 14:46:24', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(31, 6, '2015-11-25 14:46:40', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(32, 6, '2015-11-25 14:48:01', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(33, 6, '2015-11-25 14:48:01', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(34, 6, '2015-11-25 14:48:11', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(35, 6, '2015-11-25 14:48:11', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(36, 6, '2015-11-25 14:52:21', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(37, 6, '2015-11-25 14:52:22', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(38, 6, '2015-11-25 14:54:12', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(39, 6, '2015-11-25 14:54:12', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(40, 6, '2015-11-25 14:54:22', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(41, 6, '2015-11-25 14:54:22', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(42, 6, '2015-11-25 14:56:34', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(43, 6, '2015-11-25 14:56:34', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(44, 6, '2015-11-25 15:04:18', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(45, 6, '2015-11-25 15:04:18', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(46, 6, '2015-11-25 15:05:55', 'Recebido Parecer - .Favorável', 3, NULL, 1),
(47, 6, '2015-11-25 15:05:56', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(48, 6, '2015-11-25 15:23:03', 'Recebido Parecer - .Favorável', 3, NULL, 4),
(49, 6, '2015-11-25 15:23:03', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(50, 6, '2015-11-25 15:25:26', 'Recebido Parecer - .Pendências', 3, NULL, 4),
(51, 6, '2015-11-25 15:25:26', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(54, 44, '2015-11-25 15:41:16', 'Designado parecerista prazo, 07/11/2015.', 1, 6, 4),
(55, 44, '2015-11-25 15:41:58', 'Recebido Parecer - Favorável', 3, NULL, 4),
(56, 44, '2015-11-25 15:41:58', 'Encaminhado projeto ao COPE para providências.', 4, 3, 8),
(57, 2, '2016-06-06 14:37:18', 'Designado parecerista.', 1, 6, 6),
(58, 3, '2016-06-06 14:40:29', 'Designado parecerista.', 1, 6, 4),
(59, 4, '2016-06-06 14:41:28', 'Designado parecerista.', 1, 6, 4),
(60, 5, '2016-06-06 14:42:04', 'Designado parecerista.', 1, 6, 4),
(61, 6, '2016-06-06 14:42:42', 'Designado parecerista.', 1, 6, 4),
(62, 6, '2016-06-06 16:38:57', 'Designado parecerista.', 1, 6, 4),
(63, 6, '2016-06-06 16:40:33', 'Designado parecerista.', 1, 6, 4),
(64, 48, '2016-06-07 11:37:05', 'Projeto autuado no sistema.', 0, 3, 8),
(65, 6, '2016-06-07 13:17:17', 'Designado parecerista.', 1, 6, 4),
(66, 52, '2016-06-08 14:26:04', 'Projeto autuado no sistema.', 0, 3, 8),
(67, 53, '2016-06-13 13:44:42', 'Projeto autuado no sistema.', 0, 3, 9),
(68, 56, '2016-08-17 12:40:29', 'Projeto autuado no sistema.', 0, 3, 4),
(69, 6, '2017-04-14 14:48:58', 'Projeto autuado no sistema.', 3, NULL, 4),
(70, 6, '2017-04-14 14:56:36', 'Designado parecerista.', 1, 6, 4),
(71, 6, '2017-04-14 14:57:05', 'Pareceber encaminhado.', 3, NULL, 4);

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
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
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
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pareceres`
--

INSERT INTO `pareceres` (`id`, `id_solicitacao_parecer`, `tipo_resposta`, `data_recebimento`, `arquivo`, `nome_arquivo`, `created`, `modified`) VALUES
(1, 3, 1, '2017-04-14 14:33:29', 'anexos/cd0d20ab-c057-433d-a3f2-94f46065fbff-relatorio (32).pdf', 'relatorio (32).pdf', NULL, NULL),
(2, 1, 1, '2017-04-14 14:48:58', 'anexos/7db53c87-6bdf-45a9-8087-c52997dbdc35-relatorio (32).pdf', 'relatorio (32).pdf', NULL, NULL),
(3, 10, 1, '2017-04-14 14:57:05', 'anexos/c8a94373-5215-4204-bc20-b7d4d1528d42-relatorio (32).pdf', 'relatorio (32).pdf', NULL, NULL);

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
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pareceristas`
--

INSERT INTO `pareceristas` (`id`, `parecerista_id`, `projeto_id`, `prazo`, `observacao`, `created_by`, `created`, `modified`) VALUES
(1, 4, 1, NULL, 'teste', 1, '2015-11-05 15:59:01', '2015-11-05 15:59:01'),
(2, 4, 1, NULL, 'jjjjjjjjjjjj', 1, '2015-11-05 16:29:59', '2015-11-05 16:29:59'),
(3, 4, 1, '2019-03-04', 'jjjjjjjjjjjj', 1, '2015-11-05 16:30:28', '2015-11-05 16:30:28'),
(4, 4, 1, '2019-03-04', 'jjjjjjjjjjjj', 1, '2015-11-05 16:30:40', '2015-11-05 16:30:40'),
(5, 4, 1, '2019-03-04', 'jjjjjjjjjjjj', 1, '2015-11-05 16:30:48', '2015-11-05 16:30:48'),
(6, 4, 2, '2020-02-06', '', 1, '2015-11-05 16:33:14', '2015-11-05 16:33:14'),
(7, 4, 2, '2020-02-06', '', 1, '2015-11-05 16:33:52', '2015-11-05 16:33:52'),
(8, 4, 6, '2018-04-06', 'rrr', 1, '2015-11-05 17:13:39', '2015-11-05 17:13:39'),
(9, 4, 6, '2014-12-04', '', 1, '2015-11-05 17:14:01', '2015-11-05 17:14:01'),
(10, 4, 6, '2015-11-05', '000000', 1, '2015-11-05 17:43:02', '2015-11-05 17:43:02'),
(11, 4, 6, '2020-03-04', '', 1, '2015-11-05 17:46:10', '2015-11-05 17:46:10'),
(12, 4, 6, '2015-12-31', 'teste', 1, '2015-11-25 13:10:37', '2015-11-25 13:10:37'),
(13, 4, 6, '2015-12-31', 'teste', 1, '2015-11-25 13:11:32', '2015-11-25 13:11:32'),
(14, 4, 6, '2015-12-31', 'teste', 1, '2015-11-25 13:12:57', '2015-11-25 13:12:57'),
(15, 4, 6, '2015-12-31', 'teste', 1, '2015-11-25 13:13:05', '2015-11-25 13:13:05'),
(16, 4, 44, '2015-11-07', 'teste', 1, '2015-11-25 15:41:16', '2015-11-25 15:41:16');

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
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `participantes_projetos`
--

INSERT INTO `participantes_projetos` (`id`, `carga_horaria`, `tipo_participante`, `bolsista`, `bolsa`, `data_entrada`, `data_saida`, `vinculo_projeto`, `recebe_certificado`, `pessoa_id`, `projeto_id`, `created`, `modified`) VALUES
(1, 5, 0, 0, NULL, '2015-10-28', NULL, 0, 1, 4, 5, '2015-10-28 14:38:32', NULL),
(2, 15, 1, 1, 'teste', '2015-10-28', NULL, 1, 1, 4, 5, '2015-10-28 15:15:10', '2015-10-28 15:15:10'),
(3, 1, 2, 2, '2', '2015-10-28', NULL, 1, 1, 6, 5, '2015-10-28 15:16:03', '2015-10-28 15:16:03'),
(4, 12, 0, 0, '', '2015-01-01', NULL, 1, 0, 4, 6, '2015-10-28 17:09:57', '2015-10-28 17:09:57'),
(6, 3, 0, 0, '', '2015-10-28', NULL, 0, 0, 6, 6, '2015-10-28 17:15:38', '2015-10-28 17:15:38'),
(40, 33, 0, 0, '', '2015-10-29', NULL, 0, 1, 4, 8, '2015-10-29 15:36:14', '2015-10-29 15:36:14'),
(46, 5, 0, 0, '', '2015-11-03', NULL, 0, 1, 4, 9, '2015-11-03 14:18:24', '2015-11-03 14:18:24'),
(48, 12, 0, 0, '', '2015-11-03', NULL, 0, 1, 4, 41, '2015-11-03 17:46:37', '2015-11-03 17:46:37'),
(49, 4, 0, 0, '', '2015-11-03', NULL, 0, 1, 6, 41, '2015-11-03 17:46:43', '2015-11-03 17:46:43'),
(51, 55, 0, 1, '', '2015-11-03', NULL, 0, 1, 4, 7, '2015-11-03 17:49:08', '2015-11-03 17:49:08'),
(52, 3, 0, 0, '', '2015-11-03', NULL, 0, 1, 4, 42, '2015-11-03 18:36:45', '2015-11-03 18:36:45'),
(53, 5, 0, 0, '', '2015-11-05', NULL, 0, 1, 7, 10, '2015-11-05 11:58:04', '2015-11-05 11:58:04'),
(54, 5, 0, 0, '', '2015-11-05', NULL, 0, 1, 4, 43, '2015-11-05 12:05:03', '2015-11-05 12:05:03'),
(55, 5, 2, 0, 'teste', '2015-11-24', NULL, 0, 1, 4, 44, '2015-11-24 18:57:02', '2015-11-24 18:57:02'),
(56, 5, 0, 0, 'testee', '2015-11-24', NULL, 0, 1, 4, 44, '2015-11-24 19:13:27', '2015-11-24 19:13:27'),
(57, 3, 0, 0, 'a', '2016-02-12', NULL, 0, 1, 6, 46, '2016-02-12 11:38:38', '2016-02-12 11:38:38'),
(58, 3, 0, 0, '', '2016-02-12', NULL, 0, 1, 4, 47, '2016-02-12 11:40:09', '2016-02-12 11:40:09'),
(61, 5, 0, 0, '', '2016-06-07', NULL, 0, 1, 4, 48, '2016-06-07 11:33:07', '2016-06-07 11:33:07'),
(63, 5, 0, 0, '', '2016-06-07', NULL, 0, 1, 4, 50, '2016-06-07 12:06:06', '2016-06-07 12:06:06'),
(64, 3, 0, 0, '', '2016-06-07', NULL, 0, 1, 4, 50, '2016-06-07 12:09:35', '2016-06-07 12:09:35'),
(65, 5, 0, 0, '', '2016-06-07', NULL, 0, 1, 4, 51, '2016-06-07 15:01:07', '2016-06-07 15:01:07'),
(66, 4, 0, 0, '', '2015-03-03', NULL, 0, 1, 9, 52, '2016-06-08 14:23:35', '2016-06-08 14:23:35'),
(67, 2, 1, 0, '', '2015-03-03', NULL, 0, 1, 10, 52, '2016-06-08 14:23:53', '2016-06-08 14:23:53'),
(68, 5, 0, 0, '', '2016-06-13', NULL, 0, 1, 9, 53, '2016-06-13 13:44:00', '2016-06-13 13:44:00'),
(69, 5, 0, 0, '', '2016-08-17', NULL, 0, 1, 6, 55, '2016-08-17 12:04:30', '2016-08-17 12:04:30'),
(70, 9, 0, 0, '', '2016-08-17', NULL, 0, 1, 4, 56, '2016-08-17 12:38:05', '2016-08-17 12:38:05'),
(71, 9, 2, 0, '', '2016-08-17', NULL, 0, 1, 8, 56, '2016-08-17 12:38:15', '2016-08-17 12:38:15');

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
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `vinculo`, `siape`, `matricula`, `rg`, `cpf`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(4, 'André Peres Ramos', 2, 5555, '987', '2222222', '2222222222', '2015-10-27 19:04:58', '2015-10-27 19:04:58', 0, NULL),
(6, 'José Aparecido', 1, 9814, NULL, '', '999777888', '2015-10-27 19:13:18', '2015-10-27 19:13:18', 0, NULL),
(7, 'João da Feira', 0, NULL, '', '', '', '2015-11-04 10:49:13', '2015-11-04 10:49:13', 1, NULL),
(8, 'Filipe Andrich', 0, NULL, '', '', '', '2015-11-25 12:09:00', '2015-11-25 12:09:00', 1, 1),
(9, 'Leila Pontes', NULL, NULL, '', '', '', '2016-06-07 19:39:04', '2016-06-07 19:39:04', 1, 1),
(10, 'Elisangela Andrade Angelo', NULL, NULL, '', '', '', '2016-06-07 19:39:42', '2016-06-07 19:39:42', 1, 1);

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
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `rascunho` tinyint(1) DEFAULT NULL,
  `data_protocolo` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `cod_areas_conhecimentos` int(11) NOT NULL,
  `setor_atual` int(11) NOT NULL,
  `id_area_tematica` int(11) DEFAULT NULL,
  `id_linha_extensao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `ano`, `data_inicio`, `data_fim`, `encerrado`, `grande_area_conhecimento`, `comite_etica`, `num_protocolo`, `num_sipac`, `situacao_projeto`, `tipo_projeto`, `tituto_projeto`, `descricao_projeto`, `curso_id`, `parecerista_id`, `created`, `modified`, `rascunho`, `data_protocolo`, `created_by`, `modified_by`, `cod_areas_conhecimentos`, `setor_atual`, `id_area_tematica`, `id_linha_extensao`) VALUES
(1, 2015, '2015-10-28', NULL, 1, 1, 1, 1, '', 0, 1, 'teste', '', NULL, 4, '2015-11-05 11:57:27', '2016-06-13 14:13:57', 0, '2015-11-05 11:57:27', 1, NULL, 20703007, 3, NULL, NULL),
(2, 2015, '2015-10-28', NULL, NULL, 0, 0, 2, NULL, 0, 1, 'teste', '', NULL, 4, '2015-11-05 11:57:28', '2016-06-13 14:13:56', 0, '2015-11-05 11:57:28', 1, NULL, 20703007, 3, NULL, NULL),
(3, 2015, '2015-10-28', NULL, NULL, 0, 0, 3, NULL, 0, 1, 'teste', '', NULL, NULL, '2015-11-05 11:57:32', '2016-06-13 14:13:56', 0, '2015-11-05 11:57:32', 1, NULL, 20703007, 3, NULL, NULL),
(4, 2015, '2015-10-28', NULL, NULL, 0, 0, 4, NULL, 0, 1, 'teste', '', NULL, NULL, '2015-11-05 11:57:33', '2016-06-13 14:13:56', 0, '2015-11-05 11:57:33', 1, NULL, 20703007, 3, NULL, NULL),
(5, 2016, '2015-10-28', NULL, NULL, 3, 0, 5, NULL, 2, 0, 'Pesquisa da cor do solo', '', NULL, NULL, '2015-11-05 11:57:33', '2016-06-13 14:13:56', 0, '2015-11-05 11:57:33', 1, NULL, 20703007, 3, NULL, NULL),
(6, 2015, '2015-01-01', NULL, NULL, 0, 1, 6, NULL, 0, 1, 'Pesquisa da tonalidade do azul do céu de Umuarama', '', 1, 4, '2015-11-05 11:57:33', '2016-06-13 14:13:56', 0, '2015-11-05 11:57:33', 1, NULL, 20703007, 3, NULL, NULL),
(7, 2015, '2015-10-29', NULL, NULL, 2, 0, 7, NULL, 0, 0, 'Pesquisa da cor da grama', '', NULL, NULL, '2015-11-05 11:57:34', '2016-06-13 14:13:55', 0, '2015-11-05 11:57:34', 1, NULL, 20703007, 3, NULL, NULL),
(8, 2015, '2015-10-29', NULL, NULL, 2, 0, 8, NULL, 0, 0, 'Pesquisa da cor da grama', '', NULL, NULL, '2015-11-05 11:57:35', '2016-06-13 14:13:55', 0, '2015-11-05 11:57:35', 1, NULL, 20703007, 3, NULL, NULL),
(9, 2015, '2015-10-29', NULL, 0, 1, 0, 9, '', 0, 0, 'Testeeee', 'testee', 1, NULL, '2015-11-05 11:57:35', '2016-06-13 14:13:55', 0, '2015-11-05 11:57:35', 1, NULL, 20703007, 3, NULL, NULL),
(10, 2015, '2015-11-15', '2015-11-30', NULL, 0, 0, 1, NULL, 0, 1, 'teste', 'teste', 1, NULL, '2015-11-05 11:58:15', '2016-06-13 14:13:55', 0, '2015-11-05 11:58:15', 1, 1, 20703007, 3, NULL, NULL),
(41, 2015, '2015-11-03', '2015-10-31', NULL, 0, 0, 14, NULL, 0, 0, 'Testeeee', 'teste', NULL, NULL, '2015-11-05 12:03:03', '2016-06-13 14:13:55', 0, '2015-11-05 12:03:03', 1, NULL, 20703007, 3, NULL, NULL),
(42, 2016, '2015-06-01', '2016-12-01', NULL, 4, 0, 9, NULL, 0, 0, 'Pesquisa do volume de pombos na rodoviária', 'Teste', NULL, NULL, '2015-11-05 12:02:02', '2016-06-13 14:13:54', 0, '2015-11-05 12:02:02', 1, NULL, 20703007, 3, NULL, NULL),
(43, 2015, '2015-11-06', NULL, NULL, 0, 0, 15, NULL, 0, 0, 'Teste', 'teste', NULL, NULL, '2015-11-05 12:06:35', '2015-11-25 12:15:22', 0, '2015-11-05 12:06:35', 1, 1, 20703007, 3, NULL, NULL),
(44, 2015, '2015-11-07', NULL, NULL, 0, 0, 21, NULL, 0, 0, 'Projeto de teste 2', 'teste', 1, 4, '2015-11-05 13:04:10', '2015-11-25 15:41:16', 0, '2015-11-25 12:46:17', 1, 1, 20703007, 3, NULL, NULL),
(46, 2016, '2016-02-12', '2016-03-01', NULL, NULL, 0, NULL, NULL, 0, 0, 'ddd', 'fsdfsdfsd', NULL, NULL, '2016-02-12 11:38:08', '2016-02-12 11:38:08', 1, NULL, 1, 1, 10101004, 3, NULL, NULL),
(47, 2016, '2016-02-01', NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 'help', 'ffff', NULL, NULL, '2016-02-12 11:40:00', '2016-06-07 11:34:09', 1, NULL, 1, 1, 10101004, 3, NULL, NULL),
(48, 2016, '2016-06-01', NULL, NULL, NULL, 0, 22, NULL, 0, 0, 'PESQUISA1', 'TESTE', NULL, NULL, '2016-06-07 11:30:02', '2016-06-07 11:37:05', 0, '2016-06-07 11:37:05', 1, 1, 10405003, 3, NULL, NULL),
(49, 2016, '2016-06-16', NULL, NULL, NULL, 0, NULL, NULL, 0, 1, 'extensão1', 'testeeee', 1, NULL, '2016-06-07 11:39:04', '2016-07-12 13:01:55', 1, NULL, 1, 1, 10404007, 3, 3, 2),
(50, 2015, '2016-06-07', NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 'dddd', 'ddd', NULL, NULL, '2016-06-07 11:58:49', '2016-06-07 11:58:49', 1, NULL, 1, 1, 10101004, 3, NULL, NULL),
(51, 2016, '2016-06-01', NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 'testeee', '', NULL, NULL, '2016-06-07 15:00:48', '2016-06-07 15:00:48', 1, NULL, 1, 1, 40401006, 3, NULL, NULL),
(52, 2015, '2015-03-03', '2015-10-30', NULL, NULL, 0, 23, NULL, 0, 1, 'Doe sua voz', 'Projeto com objetivo tal, tal.', NULL, NULL, '2016-06-08 14:22:45', '2016-06-08 14:26:04', 0, '2016-06-08 14:26:04', 3, 3, 80303005, 3, 1, 1),
(53, 2016, '2016-06-06', '2016-06-27', NULL, NULL, 0, 24, NULL, 0, 0, 'teste', 'f', NULL, NULL, '2016-06-13 13:43:49', '2016-06-13 13:44:42', 0, '2016-06-13 13:44:41', 3, 3, 10101004, 3, NULL, NULL),
(54, 2015, '2016-06-28', NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 'f', '', NULL, NULL, '2016-06-13 14:04:12', '2016-06-13 14:04:12', 1, NULL, 3, 3, 10101004, 3, NULL, NULL),
(55, 2016, '2016-08-01', '2016-08-31', NULL, NULL, 0, NULL, NULL, 0, 1, 'teste 08', 'Este projeto é um teste 08', NULL, NULL, '2016-08-17 12:02:17', '2016-08-17 12:02:17', 1, NULL, 1, 1, 10402004, 3, 1, 1),
(56, 2017, '2016-08-01', '2016-09-23', NULL, NULL, 0, 25, NULL, 0, 1, 'teste09', 'teste', NULL, NULL, '2016-08-17 12:37:53', '2016-08-17 12:40:29', 0, '2016-08-17 12:40:29', 1, 1, 21201005, 3, 5, 2);

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
(2, 2),
(3, 6);

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
  `data_solicitacao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `data_aceitacao_rejeicao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `observacao_solicitacao` text,
  `observacao_aceitacao_rejeicao` text,
  `situacao` tinyint(4) NOT NULL,
  `externo` tinyint(1) NOT NULL,
  `data_limite_aceite` date DEFAULT NULL,
  `data_limite_envio` date DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `tipo_parecer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `solicitacao_pareceres`
--

INSERT INTO `solicitacao_pareceres` (`id`, `id_projeto`, `id_pessoa`, `data_solicitacao`, `data_aceitacao_rejeicao`, `observacao_solicitacao`, `observacao_aceitacao_rejeicao`, `situacao`, `externo`, `data_limite_aceite`, `data_limite_envio`, `created`, `modified`, `created_by`, `modified_by`, `tipo_parecer`) VALUES
(1, 6, 4, '2017-04-14 14:48:58', '2017-04-14 14:48:58', 'f', NULL, 4, 0, '2016-06-06', '2016-06-06', '2017-04-14 14:48:58', '2017-04-14 14:48:58', 1, NULL, 0),
(2, 6, 6, '2016-06-06 14:37:18', '0000-00-00 00:00:00', 'f', NULL, 1, 0, '2016-06-06', '2016-06-06', '0000-00-00 00:00:00', NULL, 1, NULL, 0),
(3, 6, 4, '2017-04-14 14:33:29', '2017-04-14 14:33:29', '', NULL, 4, 0, '2016-06-06', '2016-06-06', '2017-04-14 14:33:29', '2017-04-14 14:33:29', 1, NULL, 0),
(4, 6, 4, '2017-04-14 13:35:52', '2017-04-14 13:35:52', '', NULL, 2, 0, '2016-06-06', '2016-06-06', '2017-04-14 13:35:52', '2017-04-14 13:35:52', 1, NULL, 0),
(5, 6, 4, '2017-04-14 13:37:22', '2017-04-14 13:37:22', '', NULL, 3, 0, '2016-06-06', '2016-06-06', '2017-04-14 13:37:22', '2017-04-14 13:37:22', 1, NULL, 0),
(6, 6, 4, '2017-05-15 22:44:43', '2017-05-15 22:44:43', '', NULL, 2, 0, '2016-06-06', '2016-06-06', '2017-05-15 22:44:43', '2017-05-15 22:44:43', 1, NULL, 0),
(7, 6, 4, '2016-06-06 16:38:57', '0000-00-00 00:00:00', '', NULL, 1, 0, '2016-06-06', '2016-06-06', '0000-00-00 00:00:00', NULL, 1, NULL, 2),
(8, 6, 4, '2016-06-06 16:40:33', '0000-00-00 00:00:00', '', NULL, 1, 0, '2016-06-06', '2016-06-06', '0000-00-00 00:00:00', NULL, 1, NULL, 1),
(9, 6, 4, '2016-06-07 13:17:17', '0000-00-00 00:00:00', 'teste', NULL, 1, 0, '2016-06-07', '2016-06-07', '0000-00-00 00:00:00', NULL, 1, NULL, 1),
(10, 6, 4, '2017-04-14 14:57:05', '2017-04-14 14:57:05', 'teste', NULL, 4, 0, '2017-04-29', '2017-05-29', '2017-04-14 14:57:05', '2017-04-14 14:57:05', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes_certificados`
--

CREATE TABLE `solicitacoes_certificados` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_solicitacao` timestamp NULL DEFAULT NULL,
  `data_inicial` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `hora_aut_cope` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `hora_aut_ce` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `hora_aut_secretaria` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
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
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `default_role`, `pessoa_id`, `created`, `modified`) VALUES
(1, 'admin', '$2y$10$Y8PaXoj7/gYS4Fz9Nvuz9u0DDBIvVed5wRIgIIN9M1x9E28DjQQni', 0, 4, '2015-11-30 11:37:01', '2015-11-30 11:37:01'),
(2, 'parecerista', '$2y$10$X2zJoEV7aoJ0kUwEYI13qOHYpG/W/q8INgTi60PLPR9eNhELVxMSO', 2, 4, '2015-11-27 13:48:56', '2015-11-27 13:48:56'),
(3, 'leila', '$2y$10$x5gKAjTu2CpTfQ3MgHN0Ju7bqgsLJsprPjgLVLA3ZJxvhXto1upuW', 6, 9, '2016-06-08 14:12:56', '2016-06-08 14:12:56');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `alteracao_horarios`
--
ALTER TABLE `alteracao_horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anexos`
--
ALTER TABLE `anexos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `areas_tematicas`
--
ALTER TABLE `areas_tematicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `linhas_extensao`
--
ALTER TABLE `linhas_extensao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pareceres`
--
ALTER TABLE `pareceres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pareceristas`
--
ALTER TABLE `pareceristas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `participantes_projetos`
--
ALTER TABLE `participantes_projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `solicitacoes_certificados`
--
ALTER TABLE `solicitacoes_certificados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Limitadores para a tabela `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`coordenador_id`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `fases`
--
ALTER TABLE `fases`
  ADD CONSTRAINT `fases_ibfk_1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`);

--
-- Limitadores para a tabela `pareceres`
--
ALTER TABLE `pareceres`
  ADD CONSTRAINT `pareceres_ibfk_1` FOREIGN KEY (`id_solicitacao_parecer`) REFERENCES `solicitacao_pareceres` (`id`);

--
-- Limitadores para a tabela `pareceristas`
--
ALTER TABLE `pareceristas`
  ADD CONSTRAINT `pareceristas_ibfk_1` FOREIGN KEY (`parecerista_id`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `participantes_certificados`
--
ALTER TABLE `participantes_certificados`
  ADD CONSTRAINT `participantes_certificados_ibfk_1` FOREIGN KEY (`solicitacoes_certificados_id`) REFERENCES `solicitacoes_certificados` (`id`);

--
-- Limitadores para a tabela `participantes_projetos`
--
ALTER TABLE `participantes_projetos`
  ADD CONSTRAINT `participantes_projetos_ibfk_1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`),
  ADD CONSTRAINT `pessoaFK` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `projetos`
--
ALTER TABLE `projetos`
  ADD CONSTRAINT `cursoPK` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `pareceristaFK` FOREIGN KEY (`parecerista_id`) REFERENCES `pessoas` (`id`),
  ADD CONSTRAINT `projetos_ibfk_1` FOREIGN KEY (`id_area_tematica`) REFERENCES `areas_tematicas` (`id`),
  ADD CONSTRAINT `projetos_ibfk_2` FOREIGN KEY (`id_linha_extensao`) REFERENCES `linhas_extensao` (`id`);

--
-- Limitadores para a tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD CONSTRAINT `relatorios_ibfk_1` FOREIGN KEY (`fase_id`) REFERENCES `projetos` (`id`);

--
-- Limitadores para a tabela `setores`
--
ALTER TABLE `setores`
  ADD CONSTRAINT `setores_ibfk_1` FOREIGN KEY (`responsavel_id`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `solicitacao_pareceres`
--
ALTER TABLE `solicitacao_pareceres`
  ADD CONSTRAINT `solicitacao_pareceres_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `projetos` (`id`),
  ADD CONSTRAINT `solicitacao_pareceres_ibfk_2` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `solicitacoes_certificados`
--
ALTER TABLE `solicitacoes_certificados`
  ADD CONSTRAINT `solicitacoes_certificados_ibfk_2` FOREIGN KEY (`autenticador_cope`) REFERENCES `pessoas` (`id`),
  ADD CONSTRAINT `solicitacoes_certificados_ibfk_3` FOREIGN KEY (`autenticador_ce`) REFERENCES `pessoas` (`id`),
  ADD CONSTRAINT `solicitacoes_certificados_ibfk_4` FOREIGN KEY (`autenticador_sec`) REFERENCES `pessoas` (`id`),
  ADD CONSTRAINT `solicitacoes_certificados_ibfk_5` FOREIGN KEY (`solicitante_id`) REFERENCES `pessoas` (`id`),
  ADD CONSTRAINT `solicitacoes_certificados_ibfk_6` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
