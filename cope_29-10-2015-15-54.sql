/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : copek

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-10-29 15:54:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `alteracao_horarios`
-- ----------------------------
DROP TABLE IF EXISTS `alteracao_horarios`;
CREATE TABLE `alteracao_horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_alteracao` date NOT NULL,
  `nova_carga_horaria` int(11) NOT NULL,
  `participante_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `participanteFK` (`participante_id`),
  CONSTRAINT `participanteFK` FOREIGN KEY (`participante_id`) REFERENCES `participantes_projetos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alteracao_horarios
-- ----------------------------

-- ----------------------------
-- Table structure for `cursos`
-- ----------------------------
DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cursos
-- ----------------------------
INSERT INTO `cursos` VALUES ('1', 'Agronegócio');

-- ----------------------------
-- Table structure for `eventos`
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projeto_id` int(10) unsigned NOT NULL,
  `data_evento` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `descricao` varchar(255) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eventos
-- ----------------------------
INSERT INTO `eventos` VALUES ('3', '8', '2015-10-29 15:02:48', 'Projeto autuado no sistema.', '0');

-- ----------------------------
-- Table structure for `pareceres`
-- ----------------------------
DROP TABLE IF EXISTS `pareceres`;
CREATE TABLE `pareceres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_recebimento` date NOT NULL,
  `tipo_parecer` tinyint(4) NOT NULL,
  `parecerista_id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parecerista_id` (`parecerista_id`),
  KEY `projeto_id` (`projeto_id`),
  CONSTRAINT `pareceres_ibfk_1` FOREIGN KEY (`parecerista_id`) REFERENCES `pessoas` (`id`),
  CONSTRAINT `pareceres_ibfk_2` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pareceres
-- ----------------------------

-- ----------------------------
-- Table structure for `participantes_certificados`
-- ----------------------------
DROP TABLE IF EXISTS `participantes_certificados`;
CREATE TABLE `participantes_certificados` (
  `solicitacoes_certificados_id` int(10) unsigned NOT NULL,
  `participantes_projetos_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`solicitacoes_certificados_id`,`participantes_projetos_id`),
  CONSTRAINT `participantes_certificados_ibfk_1` FOREIGN KEY (`solicitacoes_certificados_id`) REFERENCES `solicitacoes_certificados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of participantes_certificados
-- ----------------------------

-- ----------------------------
-- Table structure for `participantes_projetos`
-- ----------------------------
DROP TABLE IF EXISTS `participantes_projetos`;
CREATE TABLE `participantes_projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pessoaFK` (`pessoa_id`),
  KEY `projeto_id` (`projeto_id`),
  CONSTRAINT `participantes_projetos_ibfk_1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`),
  CONSTRAINT `pessoaFK` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of participantes_projetos
-- ----------------------------
INSERT INTO `participantes_projetos` VALUES ('1', '5', '0', '0', null, '2015-10-28', null, '0', '1', '4', '5', '2015-10-28 12:38:32', null);
INSERT INTO `participantes_projetos` VALUES ('2', '15', '1', '1', 'teste', '2015-10-28', null, '1', '1', '4', '5', '2015-10-28 13:15:10', '2015-10-28 13:15:10');
INSERT INTO `participantes_projetos` VALUES ('3', '1', '2', '2', '2', '2015-10-28', null, '1', '1', '6', '5', '2015-10-28 13:16:03', '2015-10-28 13:16:03');
INSERT INTO `participantes_projetos` VALUES ('4', '12', '0', '0', '', '2015-01-01', null, '1', '0', '4', '6', '2015-10-28 15:09:57', '2015-10-28 15:09:57');
INSERT INTO `participantes_projetos` VALUES ('6', '3', '0', '0', '', '2015-10-28', null, '0', '0', '6', '6', '2015-10-28 15:15:38', '2015-10-28 15:15:38');
INSERT INTO `participantes_projetos` VALUES ('7', '3', '0', '0', '', '2015-10-28', null, '0', '0', '4', '6', '2015-10-28 15:16:06', '2015-10-28 15:16:06');
INSERT INTO `participantes_projetos` VALUES ('8', '3', '0', '0', '', '2015-10-28', null, '0', '0', '4', '6', '2015-10-28 15:16:51', '2015-10-28 15:16:51');
INSERT INTO `participantes_projetos` VALUES ('32', '7', '0', '0', '', '2015-10-28', null, '0', '0', '6', '6', '2015-10-28 15:51:23', '2015-10-28 15:51:23');
INSERT INTO `participantes_projetos` VALUES ('33', '2', '0', '0', '', '2015-10-28', null, '0', '0', '4', '6', '2015-10-28 16:02:03', '2015-10-28 16:02:03');
INSERT INTO `participantes_projetos` VALUES ('34', '12', '0', '0', '', '2015-10-28', null, '0', '0', '4', '6', '2015-10-28 16:22:46', '2015-10-28 16:22:46');
INSERT INTO `participantes_projetos` VALUES ('35', '6', '0', '0', '', '2015-10-28', null, '0', '0', '4', '6', '2015-10-28 16:40:22', '2015-10-28 16:40:22');
INSERT INTO `participantes_projetos` VALUES ('36', '33', '0', '0', '', '2015-10-28', null, '0', '0', '4', '6', '2015-10-28 16:51:30', '2015-10-28 16:51:30');
INSERT INTO `participantes_projetos` VALUES ('37', '-5', '0', '0', '', '2015-10-28', null, '0', '0', '4', '6', '2015-10-28 16:54:37', '2015-10-28 16:54:37');
INSERT INTO `participantes_projetos` VALUES ('38', '34', '0', '0', '', '2015-10-28', null, '0', '0', '4', '6', '2015-10-28 16:55:22', '2015-10-28 16:55:22');
INSERT INTO `participantes_projetos` VALUES ('39', '98', '0', '0', '', '2015-10-29', null, '0', '0', '6', '9', '2015-10-29 11:39:36', '2015-10-29 11:39:36');
INSERT INTO `participantes_projetos` VALUES ('40', '33', '0', '0', '', '2015-10-29', null, '0', '1', '4', '8', '2015-10-29 13:36:14', '2015-10-29 13:36:14');

-- ----------------------------
-- Table structure for `pessoas`
-- ----------------------------
DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `vinculo` tinyint(4) DEFAULT NULL,
  `siape` int(11) DEFAULT NULL,
  `matricula` varchar(11) DEFAULT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pessoas
-- ----------------------------
INSERT INTO `pessoas` VALUES ('4', 'André Peres Ramos', '2', '5555', '987', '2222222', '2222222222', '2015-10-27 17:04:58', '2015-10-27 17:04:58');
INSERT INTO `pessoas` VALUES ('6', 'José Aparecido', '1', '9814', null, '', '999777888', '2015-10-27 17:13:18', '2015-10-27 17:13:18');

-- ----------------------------
-- Table structure for `projetos`
-- ----------------------------
DROP TABLE IF EXISTS `projetos`;
CREATE TABLE `projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ano` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `encerrado` tinyint(1) DEFAULT NULL,
  `grande_area_conhecimento` int(11) NOT NULL,
  `comite_etica` tinyint(1) DEFAULT NULL,
  `num_protocolo` varchar(255) DEFAULT NULL,
  `num_sipac` varchar(255) DEFAULT NULL,
  `situacao_projeto` int(11) NOT NULL,
  `tipo_projeto` int(11) NOT NULL,
  `tituto_projeto` varchar(255) NOT NULL,
  `descricao_projeto` longtext,
  `curso_id` int(11) DEFAULT NULL,
  `parecerista_id` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `rascunho` tinyint(1) DEFAULT NULL,
  `data_protocolo` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cursoPK` (`curso_id`),
  KEY `pareceristaFK` (`parecerista_id`),
  CONSTRAINT `cursoPK` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  CONSTRAINT `pareceristaFK` FOREIGN KEY (`parecerista_id`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projetos
-- ----------------------------
INSERT INTO `projetos` VALUES ('1', '2015', '2015-10-28', null, '1', '1', '1', '', '', '0', '1', 'teste', '', null, null, '2015-10-28 11:39:09', '2015-10-28 11:39:09', '0', '2015-10-28 11:38:00');
INSERT INTO `projetos` VALUES ('2', '2015', '2015-10-28', null, null, '0', '0', null, null, '0', '1', 'teste', '', null, null, '2015-10-28 11:40:48', '2015-10-28 11:40:48', null, null);
INSERT INTO `projetos` VALUES ('3', '2015', '2015-10-28', null, null, '0', '0', null, null, '0', '1', 'teste', '', null, null, '2015-10-28 11:43:54', '2015-10-28 11:43:54', null, null);
INSERT INTO `projetos` VALUES ('4', '2015', '2015-10-28', null, null, '0', '0', null, null, '0', '1', 'teste', '', null, null, '2015-10-28 11:46:36', '2015-10-28 11:46:36', null, null);
INSERT INTO `projetos` VALUES ('5', '2016', '2015-10-28', null, null, '3', '0', null, null, '2', '0', 'Pesquisa da cor do solo', '', null, null, '2015-10-28 15:05:21', '2015-10-28 15:05:21', null, '2015-10-28 15:05:21');
INSERT INTO `projetos` VALUES ('6', '2015', '2015-01-01', null, null, '0', '1', null, null, '0', '1', 'Pesquisa da tonalidade do azul do céu de Umuarama', '', '1', null, '2015-10-28 15:09:39', '2015-10-28 15:09:39', null, null);
INSERT INTO `projetos` VALUES ('7', '2015', '2015-10-29', null, null, '2', '0', null, null, '0', '0', 'Pesquisa da cor da grama', '', null, null, '2015-10-29 11:34:29', '2015-10-29 11:34:29', '1', null);
INSERT INTO `projetos` VALUES ('8', '2015', '2015-10-29', null, null, '2', '0', null, null, '0', '0', 'Pesquisa da cor da grama', '', null, null, '2015-10-29 15:02:48', '2015-10-29 15:02:48', '0', '2015-10-29 15:02:48');
INSERT INTO `projetos` VALUES ('9', '2015', '2015-10-29', null, null, '1', '0', null, null, '0', '0', '2', 'testee', '1', null, '2015-10-29 11:39:05', '2015-10-29 11:39:05', '1', null);

-- ----------------------------
-- Table structure for `relatorios`
-- ----------------------------
DROP TABLE IF EXISTS `relatorios`;
CREATE TABLE `relatorios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_relatorio` datetime NOT NULL,
  `data_protocolo` datetime NOT NULL,
  `tipo_relatorio` tinyint(4) NOT NULL,
  `atividades_realizadas` longtext,
  `bibliografia` longtext,
  `consideracoes_finais` longtext,
  `discussao` longtext,
  `metodologia_utilizada` longtext,
  `producoes_ligadas` longtext,
  `resultados_obtidos` longtext,
  `resumo_projeto` longtext,
  `situacao_atual` tinyint(4) DEFAULT NULL,
  `projeto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projeto_id` (`projeto_id`),
  CONSTRAINT `relatorios_ibfk_1` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of relatorios
-- ----------------------------

-- ----------------------------
-- Table structure for `solicitacoes_certificados`
-- ----------------------------
DROP TABLE IF EXISTS `solicitacoes_certificados`;
CREATE TABLE `solicitacoes_certificados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_solicitacao` date DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  KEY `autenticador_cope` (`autenticador_cope`),
  KEY `autenticador_ce` (`autenticador_ce`),
  KEY `autenticador_sec` (`autenticador_sec`),
  KEY `solicitante_id` (`solicitante_id`),
  KEY `projeto_id` (`projeto_id`),
  CONSTRAINT `solicitacoes_certificados_ibfk_2` FOREIGN KEY (`autenticador_cope`) REFERENCES `pessoas` (`id`),
  CONSTRAINT `solicitacoes_certificados_ibfk_3` FOREIGN KEY (`autenticador_ce`) REFERENCES `pessoas` (`id`),
  CONSTRAINT `solicitacoes_certificados_ibfk_4` FOREIGN KEY (`autenticador_sec`) REFERENCES `pessoas` (`id`),
  CONSTRAINT `solicitacoes_certificados_ibfk_5` FOREIGN KEY (`solicitante_id`) REFERENCES `pessoas` (`id`),
  CONSTRAINT `solicitacoes_certificados_ibfk_6` FOREIGN KEY (`projeto_id`) REFERENCES `projetos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of solicitacoes_certificados
-- ----------------------------

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `escopo` tinyint(4) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `pessoa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pessoa_id` (`pessoa_id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
