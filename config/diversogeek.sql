-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Set-2022 às 02:33
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `diversogeek`
--
CREATE DATABASE IF NOT EXISTS `diversogeek` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `diversogeek`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_artigos`
--

DROP TABLE IF EXISTS `tb_artigos`;
CREATE TABLE `tb_artigos` (
  `id_artigo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cd_imagem` int(11) NOT NULL,
  `nm_artigo` varchar(255) NOT NULL,
  `ds_artigo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `tb_artigos`:
--   `id_usuario`
--       `tb_usuarios` -> `id_usuario`
--

--
-- Extraindo dados da tabela `tb_artigos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_artigo_tag`
--

DROP TABLE IF EXISTS `tb_artigo_tag`;
CREATE TABLE `tb_artigo_tag` (
  `id_artigo` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `tb_artigo_tag`:
--   `id_artigo`
--       `tb_artigos` -> `id_artigo`
--   `id_tag`
--       `tb_tags` -> `id_tag`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tags`
--

DROP TABLE IF EXISTS `tb_tags`;
CREATE TABLE `tb_tags` (
  `id_tag` int(11) NOT NULL,
  `nm_tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `tb_tags`:
--

--
-- Extraindo dados da tabela `tb_tags`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nm_usuario` varchar(255) NOT NULL,
  `ds_email` varchar(100) NOT NULL,
  `ds_senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `tb_usuarios`:
--

--
-- Extraindo dados da tabela `tb_usuarios`
--

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_artigos`
--
ALTER TABLE `tb_artigos`
  ADD PRIMARY KEY (`id_artigo`),
  ADD UNIQUE KEY `uk_nm_artigo` (`nm_artigo`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Índices para tabela `tb_artigo_tag`
--
ALTER TABLE `tb_artigo_tag`
  ADD PRIMARY KEY (`id_artigo`,`id_tag`),
  ADD KEY `fk_artigo_tag_id_tag` (`id_tag`);

--
-- Índices para tabela `tb_tags`
--
ALTER TABLE `tb_tags`
  ADD PRIMARY KEY (`id_tag`),
  ADD UNIQUE KEY `uk_nm_tag` (`nm_tag`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `uk_ds_email` (`ds_email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_artigos`
--
ALTER TABLE `tb_artigos`
  MODIFY `id_artigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `tb_tags`
--
ALTER TABLE `tb_tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_artigos`
--
ALTER TABLE `tb_artigos`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `tb_artigo_tag`
--
ALTER TABLE `tb_artigo_tag`
  ADD CONSTRAINT `fk_artigo_tag_id_artigo` FOREIGN KEY (`id_artigo`) REFERENCES `tb_artigos` (`id_artigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_artigo_tag_id_tag` FOREIGN KEY (`id_tag`) REFERENCES `tb_tags` (`id_tag`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
