-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Fev-2017 às 19:31
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notes`
--

INSERT INTO `notes` (`id`, `publisher_id`, `summary`, `description`, `created`, `modified`) VALUES
(1, 1, 'LOTR manuscript', 'this is one of my first tales: ..', '2017-02-04 16:49:19', '2017-02-04 16:49:19'),
(2, 2, 'Roland line...', 'And then said Roland to Edie: - Shut up boy!', '2017-02-04 16:50:17', '2017-02-04 16:50:17'),
(3, 3, 'Barcelona x Real Madri', '2 x 1', '2017-02-04 16:51:38', '2017-02-04 16:51:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notes_tags`
--

CREATE TABLE `notes_tags` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notes_tags`
--

INSERT INTO `notes_tags` (`id`, `tag_id`, `note_id`, `created`, `modified`) VALUES
(1, 4, 1, '2017-02-04 16:49:19', '2017-02-04 16:49:19'),
(2, 4, 2, '2017-02-04 16:50:17', '2017-02-04 16:50:17'),
(3, 2, 3, '2017-02-04 16:51:39', '2017-02-04 16:51:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pseudonym` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `pseudonym`, `created`, `modified`) VALUES
(1, 'JJR Tolkien', 'Melkor', '2017-02-04 16:45:27', '2017-02-04 16:45:27'),
(2, 'Richard Bachman', 'Steven King', '2017-02-04 16:47:34', '2017-02-04 16:47:34'),
(3, 'Barcelona football club', 'Bacelona', '2017-02-04 16:50:55', '2017-02-04 16:50:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `password`, `created`, `modified`) VALUES
(1, 'turcao', 'bcc', '2017-02-04 16:41:17', '2017-02-04 16:52:30'),
(2, 'Hellen', 'hel', '2017-02-04 16:41:48', '2017-02-04 16:41:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tags`
--

INSERT INTO `tags` (`id`, `name`, `created`, `modified`) VALUES
(2, 'sports', '2017-02-04 16:44:07', '2017-02-04 16:44:07'),
(3, 'TI', '2017-02-04 16:44:16', '2017-02-04 16:44:16'),
(4, 'books', '2017-02-04 16:48:48', '2017-02-04 16:48:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tags_subscribers`
--

CREATE TABLE `tags_subscribers` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tags_subscribers`
--

INSERT INTO `tags_subscribers` (`id`, `tag_id`, `subscriber_id`, `created`, `modified`) VALUES
(2, 2, 1, '2017-02-04 16:52:30', '2017-02-04 16:52:30'),
(3, 4, 1, '2017-02-04 16:52:30', '2017-02-04 16:52:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher_key` (`publisher_id`);

--
-- Indexes for table `notes_tags`
--
ALTER TABLE `notes_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taging_key` (`tag_id`),
  ADD KEY `notes_key` (`note_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_subscribers`
--
ALTER TABLE `tags_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_key` (`tag_id`),
  ADD KEY `subscribers_key` (`subscriber_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notes_tags`
--
ALTER TABLE `notes_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tags_subscribers`
--
ALTER TABLE `tags_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `publisher_key` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Limitadores para a tabela `notes_tags`
--
ALTER TABLE `notes_tags`
  ADD CONSTRAINT `notes_key` FOREIGN KEY (`note_id`) REFERENCES `notes` (`id`),
  ADD CONSTRAINT `taging_key` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Limitadores para a tabela `tags_subscribers`
--
ALTER TABLE `tags_subscribers`
  ADD CONSTRAINT `subscribers_key` FOREIGN KEY (`subscriber_id`) REFERENCES `subscribers` (`id`),
  ADD CONSTRAINT `tags_key` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
