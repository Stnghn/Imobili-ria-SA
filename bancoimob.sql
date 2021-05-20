-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Maio-2021 às 03:01
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_anuncio`
--

CREATE TABLE `tb_anuncio` (
  `idanuncio` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `tiponegocio` varchar(10) NOT NULL,
  `preço` decimal(10,2) NOT NULL,
  `id_autor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_anuncio`
--

INSERT INTO `tb_anuncio` (`idanuncio`, `titulo`, `descricao`, `data`, `imagem`, `tiponegocio`, `preço`, `id_autor`) VALUES
(1, 'casa', 'casacasa', '2021-05-11', '', 'venda', '0.00', 0),
(2, 'casa', 'casa', '2021-05-18', '', 'aluguel', '0.00', 0),
(3, 'sdf', 'sdf', '2021-05-12', '2021.05.01-17.45.24.png', '', '0.00', 0),
(4, 'xczcx', 'czxxcz', '2021-05-20', '2021.05.01-17.46.17.png', '', '0.00', 0),
(5, 'sdfsdf', 'dfsfsd', '2021-06-03', '2021.05.01-17.47.22.jpg', '', '0.00', 0),
(6, 'sdaads', 'dasasdasd', '2021-05-12', '2021.05.01-17.48.30.png', 'aluguel', '0.00', 0),
(7, 'asdsdsa', 'asddsads', '2021-05-11', '2021.05.01-17.52.23.jpg', 'aluguel', '0.00', 0),
(8, 'sda', 'ssaddassd', '2021-05-05', '2021.05.01-18.37.05.png', 'aluguel', '0.00', 0),
(9, 'sadsda', 'sadsad', '2021-05-11', '2021.05.01-19.01.20.png', 'aluguel', '1254.00', 0),
(10, 'sdsd', 'adssd', '2021-05-19', '2021.05.01-19.01.46.png', 'venda', '125.00', 0),
(11, 'sdaads', 'sdaasd', '2021-05-13', '2021.05.01-19.02.34.png', 'venda', '125000.00', 0),
(12, 'asdsd', 'sadasd', '2021-05-12', '2021.05.01-19.07.13.png', 'aluguel', '150000.00', 0),
(13, 'aaaaa', 'dfsssss', '2021-05-05', '2021.05.01-19.44.42.png', 'aluguel', '12312.00', 0),
(14, 'asddas', 'asdads', '2021-05-12', '2021.05.01-22.02.34.png', 'venda', '0.00', 0),
(16, 'sss', 'sss', '2021-05-12', '2021.05.02-10.43.44.png', 'aluguel', '500000.00', 9),
(17, 'sad', 'asd', '2021-05-11', '2021.05.02-11.17.48.png', 'aluguel', '1000000.00', 9),
(18, 'batata', 'a', '2021-05-18', '2021.05.09-19.55.55jpeg', 'venda', '56000.00', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipouser`
--

CREATE TABLE `tb_tipouser` (
  `idtipo` int(11) NOT NULL,
  `descricao` varchar(15) NOT NULL,
  `tipouser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_tipouser`
--

INSERT INTO `tb_tipouser` (`idtipo`, `descricao`, `tipouser`) VALUES
(1, 'Administrador', 1),
(2, 'Comum', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `iduser` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`iduser`, `email`, `nome`, `senha`, `telefone`) VALUES
(7, 'teste3@gmail.com', 'testetres', 'teste3', '1'),
(9, 'teste5@gmail.com', 'testecinco', 'teste5', '123'),
(10, 'teste7@gmail.com', 'teste sete', 'teste7', '1'),
(11, 'teste8@gmail.com', 'maria', 'teste8', '123'),
(12, 'teste9@gmail.com', 'ariana', 'teste9', '123456'),
(13, 'sddsa@gmail.com', 'ssa', '123', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_anuncio`
--
ALTER TABLE `tb_anuncio`
  ADD PRIMARY KEY (`idanuncio`);

--
-- Índices para tabela `tb_tipouser`
--
ALTER TABLE `tb_tipouser`
  ADD PRIMARY KEY (`idtipo`);

--
-- Índices para tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_anuncio`
--
ALTER TABLE `tb_anuncio`
  MODIFY `idanuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tb_tipouser`
--
ALTER TABLE `tb_tipouser`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
