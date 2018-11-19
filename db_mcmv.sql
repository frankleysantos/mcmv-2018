-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 19-Nov-2018 às 13:24
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mcmv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

DROP TABLE IF EXISTS `bairros`;
CREATE TABLE IF NOT EXISTS `bairros` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependentes`
--

DROP TABLE IF EXISTS `dependentes`;
CREATE TABLE IF NOT EXISTS `dependentes` (
  `fk_id` int(10) NOT NULL,
  `dependente` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idade` int(3) DEFAULT NULL,
  `parentesco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `documentacao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ocupacao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remuneracao` double DEFAULT NULL,
  `outras_rendas` double DEFAULT NULL,
  PRIMARY KEY (`dependente`),
  KEY `fk_id` (`fk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `principal`
--

DROP TABLE IF EXISTS `principal`;
CREATE TABLE IF NOT EXISTS `principal` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `est_civil` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_nasc` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rg` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zona` int(1) DEFAULT NULL,
  `telefone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `naturalidade` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tempo` int(3) DEFAULT NULL,
  `ocupacao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remuneracao` double DEFAULT NULL,
  `outras_rendas` double DEFAULT NULL,
  `cadunico` tinyint(1) DEFAULT NULL,
  `nis` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bolsa_familia` tinyint(1) DEFAULT NULL,
  `bpc` tinyint(1) DEFAULT NULL,
  `escolaridade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imovel` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comodos` int(2) DEFAULT NULL,
  `aluguel` double DEFAULT NULL,
  `risco` tinyint(1) DEFAULT NULL,
  `deficiencia` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observ` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
