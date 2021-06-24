-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Jun-2021 às 12:37
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `claves`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `claves`
--

CREATE TABLE `claves` (
  `num_inc` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` int(40) NOT NULL,
  `clave` varchar(500) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `claves`
--

INSERT INTO `claves` (`num_inc`, `nombre`, `tipo`, `clave`, `descripcion`, `cantidad`, `estado`) VALUES
(13, 'Gonçalo Silva', 2, 'dasdas', 'dsadasd', 123, 'No usada'),
(21, 'Alex', 1, 'asdasdasd', 'Frango com arroz', 5, 'No usada'),
(23, 'absol', 3, 'asdasdasd-dasdasdasd-asdasdasdas-dasdasdasd', 'Café da manhã', 21, 'Usada'),
(25, 'dasdasd', 3, 'dasdasda', 'dasdasddas', 23, 'Usada'),
(27, 'Coldplay', 1, 'dasdasd-asdasd-asdasd-asdasd', 'sdadasdasdasd', 111, 'No usada'),
(28, 'Rafael', 3, 'asdasd-dasd-asdasd-adsasd', 'asdasd', 3, 'No usada'),
(29, 'Clemenmtina', 4, '123qwdqwdqdqw', 'dasdqwdqWDQF', 312, 'Usada'),
(34, 'Sara ', 1, 'asdasdasdasdasdasd', 'asdasdasdasd', 123, 'No usada'),
(35, 'Fenix', 2, 'testjanskdajsndkajnsdka', 'dasdasdasdasd', 11, 'No usada'),
(36, 'Alberta', 2, '1312321-312312-13231-312321', 'Imagina poder almoçar', 31, 'Usada'),
(37, 'Galo', 3, 'c1d1rre1-e1wwd12-d1wd11r-1dsdaws', 'you can fly away with me tonight', 21, 'Usada'),
(40, 'asdasd', 3, 'asdasdasd', 'asdasdasd', 21, 'Usada'),
(42, 'dasdas', 3, 'dasdasd', 'adsasd', 123, 'Usada'),
(45, 'João', 1, 'dasdasdasd-asd1sadasd-dasdasd-adsasdasd', 'dasdasd', 21, 'Usada'),
(46, 'Iara Silva', 3, 'asdasdasd-dasdasdas-dasdasdas-dasdas', 'dasdsadfsadf', 31, 'No usada'),
(47, 'Marcelo Rocha', 3, 'asdasd-dasdasd-12edasd-adsdasd', 'dasdasdsad', 41, 'Usada'),
(48, 'Matias', 2, 'dasdasda-sdasdasd-asd-dasdasd', 'cenas do bem', 2, 'No usada'),
(49, 'Tomás Pinho', 1, 'Cenas do mal', 'ufa', 211, 'No usada'),
(50, 'Rúben Correia', 4, 'dasdasd', 'dasdasd', 2113, 'Usada'),
(51, 'Ivan Xará', 2, 'dasdasd-dasdasd-adsdasd-dasd', 'dasdasd', 14, 'No usada'),
(52, 'Leonor Leite', 3, 'dasdsa-dasdsda-dasdsa-dasda', 'dasd12dawd', 24, 'Usada'),
(53, 'Dário', 4, 'dasdas-dasdas-dasd-dasda', 'dasdasdasd', 12, 'Usada'),
(54, 'Vitor', 4, 'dasdasdd-asdasdas-dadas-dasd', 'Gosto de frango', 2, 'No usada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `tipo`) VALUES
(1, 'Office 365'),
(2, 'Microsoft Office 2019'),
(3, 'Windows 10 Pro'),
(4, 'Windows Home');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `claves`
--
ALTER TABLE `claves`
  ADD PRIMARY KEY (`num_inc`),
  ADD KEY `tipo` (`tipo`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `claves`
--
ALTER TABLE `claves`
  MODIFY `num_inc` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `claves`
--
ALTER TABLE `claves`
  ADD CONSTRAINT `claves_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
