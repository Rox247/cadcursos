-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2021 às 00:40
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `listadecursos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Informatica'),
(2, 'Lideranca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `detalhes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `categoria_id`, `detalhes`) VALUES
(3, 'Gestão da Tecnologia da Informação', 2, 'Curso voltado ao mercado de trabalho no qual o egresso está apto a gerenciar projetos de desenvolvimento na área de Tecnologia da Informação, prestar consultoria na área de qualidade de software e produtos de TI, além de operar como gestor de empresas de pequeno e médio porte na área de TI.'),
(10, 'Curso em modo de teste', 1, 'lorem ipsum :D'),
(11, 'Ciências da Computação', 1, 'O curso de Ciência da Computação forma profissionais qualificados para desenvolver programas e sistemas de informática, desde o planejamento do projeto até a implantação e gerenciamento do software. Por ser da área de ciências exatas, o aluno precisa ter uma boa base matemática e raciocínio lógico desenvolvido.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario`, `senha`) VALUES
(2, 'beta', '202cb962ac59075b964b07152d234b70'),
(3, 'professor', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
