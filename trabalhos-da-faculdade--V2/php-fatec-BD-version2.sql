-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2021 at 11:42 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-fatec`
--

-- --------------------------------------------------------

--
-- Table structure for table `Clientes`
--

CREATE TABLE `Clientes` (
  `Nome` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Endereco` varchar(500) NOT NULL,
  `Aceita_notificacao` tinyint(1) NOT NULL,
  `Senha` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Clientes`
--

INSERT INTO `Clientes` (`Nome`, `Email`, `Endereco`, `Aceita_notificacao`, `Senha`) VALUES
('Jão', 'jao@gmail.com', 'aaaaa', 1, '12'),
('Paula', 'paula@abcd.com', '007 apartamento Lisboa', 0, 'aa'),
('Zé', 'ze@email.com', '123 pastel de carne', 1, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `Compras`
--

CREATE TABLE `Compras` (
  `Codigo` int(11) NOT NULL,
  `Data_Compra` date NOT NULL,
  `ID_Produto` int(11) DEFAULT NULL,
  `Email_Cliente` varchar(500) DEFAULT NULL,
  `Quantidade` int(11) NOT NULL,
  `Entrega_24h` tinyint(1) NOT NULL,
  `Entrega_Correios` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Compras`
--

INSERT INTO `Compras` (`Codigo`, `Data_Compra`, `ID_Produto`, `Email_Cliente`, `Quantidade`, `Entrega_24h`, `Entrega_Correios`) VALUES
(1, '2021-06-04', 4, 'jao@gmail.com', 4, 0, 0),
(2, '2021-06-04', 4, 'jao@gmail.com', 4, 0, 0),
(3, '2021-06-04', 1, 'jao@gmail.com', 2, 0, 0),
(4, '2021-06-04', 7, 'jao@gmail.com', 1, 0, 0),
(5, '2021-06-04', 6, 'jao@gmail.com', 3, 0, 0),
(6, '2021-06-04', 1, 'jao@gmail.com', 1, 0, 0),
(7, '2021-06-04', 4, 'jao@gmail.com', 1, 1, 1),
(8, '2021-06-04', 7, 'jao@gmail.com', 2, 1, 1),
(9, '2021-06-04', 5, 'jao@gmail.com', 2, 1, 1),
(10, '2021-06-04', 3, 'jao@gmail.com', 4, 1, 1),
(11, '2021-06-04', 1, 'jao@gmail.com', 6, 1, 1),
(12, '2021-06-04', 4, 'jao@gmail.com', 3, 1, 1),
(13, '2021-06-04', 1, 'jao@gmail.com', 1, 0, 1),
(14, '2021-06-04', 1, 'jao@gmail.com', 1, 1, 0),
(15, '2021-06-04', 5, 'jao@gmail.com', 2, 1, 0),
(16, '2021-06-04', 6, 'ze@email.com', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Produtos`
--

CREATE TABLE `Produtos` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(500) NOT NULL,
  `Valor` float NOT NULL,
  `Descricao` varchar(500) NOT NULL,
  `Quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Produtos`
--

INSERT INTO `Produtos` (`ID`, `Nome`, `Valor`, `Descricao`, `Quantidade`) VALUES
(1, 'Moeda comemorativa Brasil 500 anos', 450, 'Fabricado apenas 500 moedas em comemoração aos quinhentos anos de descobrimento do país. Item raríssmo por', 0),
(3, 'Moeda 5 centavos USA de 1913', 480, 'Uma das moedas de cinco centavos mais difíceis de se encontrar atualmente, tento poucos exemplares no mercado. Por apenas', 0),
(4, 'Moeda de 1804 nos Estados Unidos', 565, 'Um dos primeiro modelos de moeda dos Estados Unidos da América,\\n essa moeda é de uma raridade elevada em nosso país. Por:', 0),
(5, 'Moeda inglesa de 1725', 786, 'Moeda de ouro de 1725 da Ingleterra, seu preço é tão alto quanto a dificuldade de ser encontrada. Época das cruzadas e templários. Preço:', 0),
(6, 'Moeda portuguesa 50 centavos de 1925', 550, 'Moeda rara de portugal devido a baixa quantidade de exemplares existentes e ao contexto histórico do país de turbulência. Preço:', 0),
(7, 'Moeda de 1 escudo de Portugal', 600, 'Moeda de um escudo de Portugal, rara pois o país não utiliza mais o escudo como moeda. Preço:', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `Compras`
--
ALTER TABLE `Compras`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `ID_Produto` (`ID_Produto`),
  ADD KEY `Email_Cliente` (`Email_Cliente`);

--
-- Indexes for table `Produtos`
--
ALTER TABLE `Produtos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Compras`
--
ALTER TABLE `Compras`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Produtos`
--
ALTER TABLE `Produtos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Compras`
--
ALTER TABLE `Compras`
  ADD CONSTRAINT `Email_Cliente` FOREIGN KEY (`Email_Cliente`) REFERENCES `Clientes` (`Email`),
  ADD CONSTRAINT `ID_Produto` FOREIGN KEY (`ID_Produto`) REFERENCES `Produtos` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;