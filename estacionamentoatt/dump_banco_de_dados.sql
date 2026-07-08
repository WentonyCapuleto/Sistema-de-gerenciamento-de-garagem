-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jul-2023 às 15:52
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id20834635_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `id` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL UNIQUE,
  `marca` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `ano` varchar(4) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `placa`, `marca`, `cpf`, `modelo`, `cor`, `ano`) VALUES
(3, 'GHI9012', 'Volkswagen', '11111111111', 'Golf', 'Branco', '2005'),
(4, 'JKL3456', 'Ford', '11111111111', 'Mustang', 'Vermelho', '2005'),
(5, 'MNO7890', 'Chevrolet', '11111111111','Camaro', 'Amarelo', '2005'),
(6, 'QWE1234', 'Renault', '11111111111','Sandero', 'Preto', '2010'),
(8, 'ZXC7890', 'Hyundai', '11111111111','HB20', 'Prata', '2013'),
(9, 'QAZ2468', 'Chevrolet', '11111111111','Onix', 'Branco', '2014'),
(10, 'WSX1357', 'Ford', '11111111111','Fiesta', 'Verde', '2015'),
(11, 'EDC5790', 'Toyota', '11111111111','Etios', 'Cinza', '2016'),
(12, 'RFV8024', 'Volkswagen', '11111111111','Polo', 'Laranja', '2017'),
(13, 'TGB4681', 'Honda', '11111111111','Civic', 'Roxo', '2018'),
(14, 'NOP3456', 'Volvo', '11111111111','XC90', 'Branco', '2005'),
(15, 'QRS7890', 'Land Rover', '11111111111','Range Rover', 'Prata', '2005'),
(16, 'YHN2468', 'Mitsubishi', '11111111111','Lancer', 'Marrom', '2019'),
(17, 'WXY6789', 'Tesla', '11111111111','Model 3', 'Vermelho', '2005'),
(24, 'ddd3d33', 'BMW', '11111111111','teste', 'azul', '2023'),
(26, 'asd4d32', 'BMW', '11111111111','carro', 'branco', '2023'),
(28, '123as123', 'BMW', '11111111111','aasd', 'cinza', '2022');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `data_hora_entrada` datetime DEFAULT NULL,
  `carro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `entradas`
--

INSERT INTO `entradas` (`id`, `data_hora_entrada`, `carro_id`) VALUES
(2, '2023-05-02 11:30:00', 2),
(6, '2023-05-06 15:30:00', 6),
(7, '2023-05-07 10:00:00', 7),
(8, '2023-05-08 11:30:00', 8),
(9, '2023-05-09 14:45:00', 9),
(10, '2023-05-10 09:15:00', 10),
(12, '2023-05-12 15:30:00', 12),
(13, '2023-05-13 10:00:00', 13),
(15, '2023-05-15 14:45:00', 15),
(16, '2023-05-16 09:15:00', 16),
(17, '2023-05-17 11:45:00', 17),
(18, '2023-05-18 15:30:00', 18),
(19, '2023-05-19 10:00:00', 19),
(20, '2023-05-20 11:30:00', 20),
(21, '2023-07-04 10:42:38', 2),
(22, NULL, 0),
(23, '2023-07-04 10:42:38', 2),
(24, '2023-07-06 10:41:00', 9),
(25, '2023-07-01 10:47:00', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saidas`
--

CREATE TABLE `saidas` (
  `id` int(11) NOT NULL,
  `entrada_id` int(11) DEFAULT NULL,
  `data_hora_saida` datetime DEFAULT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `saidas`
--

INSERT INTO `saidas` (`id`, `entrada_id`, `data_hora_saida`, `valor`) VALUES
(2, 2, '2023-05-02 19:15:00', 0),
(3, 3, '2023-05-03 22:30:00', 0),
(4, 4, '2023-05-04 18:30:00', 0),
(5, 5, '2023-05-05 21:00:00', 0),
(7, 7, '2023-05-07 18:00:00', 0),
(8, 8, '2023-05-08 19:15:00', 0),
(10, 10, '2023-05-10 18:30:00', 0),
(11, 11, '2023-05-11 21:00:00', 0),
(12, 12, '2023-05-12 23:45:00', 0),
(13, 13, '2023-05-13 18:00:00', 0),
(14, 14, '2023-05-14 19:15:00', 0),
(15, 15, '2023-05-15 22:30:00', 0),
(16, 16, '2023-05-16 18:30:00', 0),
(17, 17, '2023-05-17 21:00:00', 0),
(18, 18, '2023-05-18 23:45:00', 0),
(19, 19, '2023-05-19 18:00:00', 0),
(20, 20, '2023-05-20 19:15:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'andersson', '698dc19d489c4e4db73e28a713eab07b'),
(2, 'wentony', '7815696ecbf1c96e6894b779456d330e');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `saidas`
--
ALTER TABLE `saidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrada_id` (`entrada_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carros`
--
ALTER TABLE `carros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `saidas`
--
ALTER TABLE `saidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
