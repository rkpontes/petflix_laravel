-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 29-Out-2019 às 00:32
-- Versão do servidor: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petflix`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Cachorros'),
(2, 'Gatos'),
(3, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(155) NOT NULL,
  `password` varchar(155) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `activated`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'teste@teste.com', '$2y$10$rHMnHOJob.s2P7gzoJ0qe.faa3BYZtAXwEbFJCGjepkrZWlwfgp1m', 1, NULL, '2019-10-28 13:33:31', '2019-10-28 13:33:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `youtube_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `featured` tinyint(1) DEFAULT '0',
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `slug`, `youtube_id`, `image`, `featured`, `activated`, `created_at`, `category_id`) VALUES
(13, 'Video 1', NULL, 'video-1', 'hY7m5jjJ9mM', 'https://img.youtube.com/vi/hY7m5jjJ9mM/0.jpg', 1, 1, '2019-10-29 00:54:36', 2),
(14, 'Video 2', NULL, 'video-2', 'ZNoo5dndz0g', 'https://img.youtube.com/vi/ZNoo5dndz0g/0.jpg', 1, 1, '2019-10-29 00:54:58', 2),
(15, 'Video 3', NULL, 'video-3', 'a_IA-8nQ4FY', 'https://img.youtube.com/vi/a_IA-8nQ4FY/0.jpg', 1, 1, '2019-10-29 00:55:16', 2),
(16, 'Novo vídeo 3d', NULL, 'video-4', 'sbR1SNJs_vM', 'https://img.youtube.com/vi/sbR1SNJs_vM/0.jpg', 1, 1, '2019-10-29 00:56:19', 1),
(17, 'Video 5', NULL, 'video-5', 'PgD56JEUWFA', 'https://img.youtube.com/vi/PgD56JEUWFA/0.jpg', 1, 1, '2019-10-29 00:56:39', 1),
(18, 'Video 6', NULL, 'video-6', 'iPW75ZO4pIA', 'https://img.youtube.com/vi/iPW75ZO4pIA/0.jpg', 0, 1, '2019-10-29 00:56:58', 1),
(19, 'Video 7', NULL, 'video-7', 'E2XCepwaYDc', 'https://img.youtube.com/vi/E2XCepwaYDc/0.jpg', 0, 1, '2019-10-29 00:57:29', 2),
(20, 'Video 7', NULL, 'video-7', 'aQ70qsk9n1Q', 'https://img.youtube.com/vi/aQ70qsk9n1Q/0.jpg', 0, 1, '2019-10-29 00:57:51', 1),
(21, 'Video 8', NULL, 'video-8', 'EtH9Yllzjcc', 'https://img.youtube.com/vi/EtH9Yllzjcc/0.jpg', 0, 1, '2019-10-29 00:58:20', 1),
(22, 'Video 9', NULL, 'video-9', 'spMkaJp975s', 'https://img.youtube.com/vi/spMkaJp975s/0.jpg', 0, 1, '2019-10-29 00:58:37', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_videos_categories_idx` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
