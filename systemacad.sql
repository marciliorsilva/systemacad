-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Set-2018 às 05:53
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `systemacad`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `codigo_aluno` int(11) NOT NULL,
  `cpf_aluno` varchar(15) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `rg` varchar(9) NOT NULL,
  `dtNascimento` date NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `codigo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`codigo_aluno`, `cpf_aluno`, `nome`, `rg`, `dtNascimento`, `sexo`, `cidade`, `bairro`, `uf`, `logradouro`, `numero`, `telefone`, `email`, `codigo_usuario`) VALUES
(1, '123.456-78', 'Alex', '123456789', '0000-00-00', 'M', 'Cabo', 'São Francisco', 'PE', 'logradouro', '122', '8888-8888', 'alex@teste.com', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunodisciplina`
--

CREATE TABLE `alunodisciplina` (
  `codigo_alunoDisc` int(11) NOT NULL,
  `nota1` double NOT NULL,
  `nota2` double NOT NULL,
  `mediaFinal` double NOT NULL,
  `codigo_disciplina` varchar(8) NOT NULL,
  `codigo_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aviso`
--

CREATE TABLE `aviso` (
  `codigo_aviso` int(11) NOT NULL,
  `assunto` varchar(60) NOT NULL,
  `dataAviso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `img` varchar(45) DEFAULT NULL,
  `mensagem` mediumtext NOT NULL,
  `codigo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aviso`
--

INSERT INTO `aviso` (`codigo_aviso`, `assunto`, `dataAviso`, `img`, `mensagem`, `codigo_usuario`) VALUES
(1, 'HaverÃ¡ aula amanhÃ£', '2018-09-23 05:00:42', '15376788425ba71dfab0f3d.png', 'a', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avisocurso`
--

CREATE TABLE `avisocurso` (
  `codigo_avisoCurso` int(11) NOT NULL,
  `codigo_curso` varchar(8) NOT NULL,
  `codigo_aviso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `codigo_curso` varchar(8) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `qtde_periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`codigo_curso`, `nome`, `carga_horaria`, `turno`, `qtde_periodo`) VALUES
('3231', 'InformÃ¡tica', 128, 'Matutino', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursodisciplina`
--

CREATE TABLE `cursodisciplina` (
  `codigo_cursoDisc` int(11) NOT NULL,
  `carga_horaria` int(11) NOT NULL,
  `codigo_curso` varchar(8) NOT NULL,
  `codigo_disciplina` varchar(8) NOT NULL,
  `codigo_periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `codigo_disciplina` varchar(8) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`codigo_disciplina`, `nome`) VALUES
('3231', 'InformÃ¡tica bÃ¡sica'),
('32312', 'cliente22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `codigo_funcionario` int(11) NOT NULL,
  `cpf_funcionario` varchar(15) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `rg` varchar(9) NOT NULL,
  `dtNascimento` date NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `codigo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`codigo_funcionario`, `cpf_funcionario`, `nome`, `rg`, `dtNascimento`, `sexo`, `cidade`, `bairro`, `uf`, `logradouro`, `numero`, `telefone`, `email`, `codigo_usuario`) VALUES
(1, '1.234.567-89', 'Alex', '123456789', '0000-00-00', 'M', 'Cabo', 'São Francisco', 'PE', 'logradouro', '122', '8888-8888', 'alex@teste.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `codigo` varchar(10) NOT NULL,
  `codigo_aluno` int(11) NOT NULL,
  `codigo_curso` varchar(8) NOT NULL,
  `dataMatricula` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo`
--

CREATE TABLE `periodo` (
  `codigo_periodo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `codigo_professor` int(11) NOT NULL,
  `cpf_professor` varchar(15) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `rg` varchar(9) NOT NULL,
  `dtNascimento` date NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `codigo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`codigo_professor`, `cpf_professor`, `nome`, `rg`, `dtNascimento`, `sexo`, `cidade`, `bairro`, `uf`, `logradouro`, `numero`, `telefone`, `email`, `codigo_usuario`) VALUES
(1, '12.345.678-99', 'Joao Silva', '1.111.111', '1970-01-01', 'M', 'Cabo de Santo Agostinho', 'SÃ£o Francisco', 'PE', 'Rua Manoel Florentino da Silva, 111, 111, 233', '122', '(19) 8572-4176', 'alex2@teste.com', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professordisciplina`
--

CREATE TABLE `professordisciplina` (
  `codigo_profDisc` int(11) NOT NULL,
  `codigo_professor` int(11) NOT NULL,
  `codigo_disciplina` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `codigo_turma` varchar(10) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `horas_aula_dia` time NOT NULL,
  `qtde_aula_semana` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `codigo_cursoDisc` int(11) NOT NULL,
  `codigo_profDisc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmaaluno`
--

CREATE TABLE `turmaaluno` (
  `codigo_turmaAluno` int(11) NOT NULL,
  `codigo_turma` varchar(10) NOT NULL,
  `codigo_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigo_usuario` int(11) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nivelAcesso` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigo_usuario`, `senha`, `nivelAcesso`) VALUES
(1, '123456', '3'),
(2, '123456', '1'),
(3, '123456', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`codigo_aluno`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indexes for table `alunodisciplina`
--
ALTER TABLE `alunodisciplina`
  ADD PRIMARY KEY (`codigo_alunoDisc`),
  ADD KEY `codigo_disciplina` (`codigo_disciplina`),
  ADD KEY `codigo_aluno` (`codigo_aluno`);

--
-- Indexes for table `aviso`
--
ALTER TABLE `aviso`
  ADD PRIMARY KEY (`codigo_aviso`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indexes for table `avisocurso`
--
ALTER TABLE `avisocurso`
  ADD PRIMARY KEY (`codigo_avisoCurso`),
  ADD KEY `codigo_curso` (`codigo_curso`),
  ADD KEY `codigo_aviso` (`codigo_aviso`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`codigo_curso`);

--
-- Indexes for table `cursodisciplina`
--
ALTER TABLE `cursodisciplina`
  ADD PRIMARY KEY (`codigo_cursoDisc`),
  ADD KEY `codigo_curso` (`codigo_curso`),
  ADD KEY `codigo_disciplina` (`codigo_disciplina`),
  ADD KEY `codigo_periodo` (`codigo_periodo`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`codigo_disciplina`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`codigo_funcionario`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigo_aluno` (`codigo_aluno`),
  ADD KEY `codigo_curso` (`codigo_curso`);

--
-- Indexes for table `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`codigo_periodo`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`codigo_professor`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indexes for table `professordisciplina`
--
ALTER TABLE `professordisciplina`
  ADD PRIMARY KEY (`codigo_profDisc`),
  ADD KEY `codigo_professor` (`codigo_professor`),
  ADD KEY `codigo_disciplina` (`codigo_disciplina`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`codigo_turma`),
  ADD KEY `codigo_cursoDisc` (`codigo_cursoDisc`),
  ADD KEY `codigo_profDisc` (`codigo_profDisc`);

--
-- Indexes for table `turmaaluno`
--
ALTER TABLE `turmaaluno`
  ADD PRIMARY KEY (`codigo_turmaAluno`),
  ADD KEY `codigo_turma` (`codigo_turma`),
  ADD KEY `codigo_aluno` (`codigo_aluno`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `codigo_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alunodisciplina`
--
ALTER TABLE `alunodisciplina`
  MODIFY `codigo_alunoDisc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aviso`
--
ALTER TABLE `aviso`
  MODIFY `codigo_aviso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `avisocurso`
--
ALTER TABLE `avisocurso`
  MODIFY `codigo_avisoCurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cursodisciplina`
--
ALTER TABLE `cursodisciplina`
  MODIFY `codigo_cursoDisc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `codigo_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periodo`
--
ALTER TABLE `periodo`
  MODIFY `codigo_periodo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `codigo_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professordisciplina`
--
ALTER TABLE `professordisciplina`
  MODIFY `codigo_profDisc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turmaaluno`
--
ALTER TABLE `turmaaluno`
  MODIFY `codigo_turmaAluno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);

--
-- Limitadores para a tabela `alunodisciplina`
--
ALTER TABLE `alunodisciplina`
  ADD CONSTRAINT `alunodisciplina_ibfk_1` FOREIGN KEY (`codigo_disciplina`) REFERENCES `disciplina` (`codigo_disciplina`),
  ADD CONSTRAINT `alunodisciplina_ibfk_2` FOREIGN KEY (`codigo_aluno`) REFERENCES `aluno` (`codigo_aluno`);

--
-- Limitadores para a tabela `aviso`
--
ALTER TABLE `aviso`
  ADD CONSTRAINT `aviso_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);

--
-- Limitadores para a tabela `avisocurso`
--
ALTER TABLE `avisocurso`
  ADD CONSTRAINT `avisocurso_ibfk_1` FOREIGN KEY (`codigo_curso`) REFERENCES `curso` (`codigo_curso`),
  ADD CONSTRAINT `avisocurso_ibfk_2` FOREIGN KEY (`codigo_aviso`) REFERENCES `aviso` (`codigo_aviso`);

--
-- Limitadores para a tabela `cursodisciplina`
--
ALTER TABLE `cursodisciplina`
  ADD CONSTRAINT `cursodisciplina_ibfk_1` FOREIGN KEY (`codigo_curso`) REFERENCES `curso` (`codigo_curso`),
  ADD CONSTRAINT `cursodisciplina_ibfk_2` FOREIGN KEY (`codigo_disciplina`) REFERENCES `disciplina` (`codigo_disciplina`),
  ADD CONSTRAINT `cursodisciplina_ibfk_3` FOREIGN KEY (`codigo_periodo`) REFERENCES `periodo` (`codigo_periodo`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`codigo_aluno`) REFERENCES `aluno` (`codigo_aluno`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`codigo_curso`) REFERENCES `curso` (`codigo_curso`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `usuario` (`codigo_usuario`);

--
-- Limitadores para a tabela `professordisciplina`
--
ALTER TABLE `professordisciplina`
  ADD CONSTRAINT `professordisciplina_ibfk_1` FOREIGN KEY (`codigo_professor`) REFERENCES `professor` (`codigo_professor`),
  ADD CONSTRAINT `professordisciplina_ibfk_2` FOREIGN KEY (`codigo_disciplina`) REFERENCES `disciplina` (`codigo_disciplina`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`codigo_cursoDisc`) REFERENCES `cursodisciplina` (`codigo_cursoDisc`),
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`codigo_profDisc`) REFERENCES `professordisciplina` (`codigo_profDisc`);

--
-- Limitadores para a tabela `turmaaluno`
--
ALTER TABLE `turmaaluno`
  ADD CONSTRAINT `turmaaluno_ibfk_1` FOREIGN KEY (`codigo_turma`) REFERENCES `turma` (`codigo_turma`),
  ADD CONSTRAINT `turmaaluno_ibfk_2` FOREIGN KEY (`codigo_aluno`) REFERENCES `aluno` (`codigo_aluno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
