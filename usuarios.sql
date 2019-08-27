-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Ago-2019 às 22:40
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `usuarios`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rg` varchar(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `last_access` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_admin` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `email`, `senha`, `rg`, `cpf`, `last_access`, `is_admin`) VALUES
(1, 'Jhonata Campos', 'jhonata-campos@hotmail.com', '$2y$10$L0VrObQyC5JpAKN9rUty/OIwLjhDTdF2PPyFUdT7ffTOcKfbuXPpm', '12.345.678-9', '123.456.789-10', '27/08/19, 05:28:55 pm', 'Sim'),
(2, 'Fulano de Tal', 'fulano@gmail.com', '$2y$10$L0VrObQyC5JpAKN9rUty/OIwLjhDTdF2PPyFUdT7ffTOcKfbuXPpm', '55.555.555-5', '123.465.789-10', '27/08/19, 05:25:31 pm', 'NÃ£o'),
(3, 'Ciclano de Tal', 'ciclano@hotmail.com', '$2y$10$jx8SI3HlqM8z73MTs5.M4.OTj//rjWp7.p.mvUEw2S.DzQ46vHQRK', '32.145.698-7', '987.654.321-00', '00:00:00', 'NÃ£o');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
