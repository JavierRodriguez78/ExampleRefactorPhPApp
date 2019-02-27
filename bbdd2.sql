-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-02-2019 a las 00:50:03
-- Versión del servidor: 5.6.37
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbdd2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(200) NOT NULL,
  `type` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` longtext NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `name`, `description`, `type`, `createdAt`, `text`, `picture`) VALUES
(8, 'Short Answers / Respuestas cortas en ingles', 'Son las respuestas que se le da estandar simplemente para de forma educada decir si­ o no.', 0, '2019-02-20 21:06:52', 'Por ejemplo:\r\n\r\nDo you like fish? \r\nYes, I do.', 'shortAnswers.PNG'),
(9, 'The article / articulo definido', 'Usos y significado del articulo definido del ingles the...', 0, '2019-02-20 21:33:14', 'El articulo definido en ingles The sirve para complementar el nombre haciendo de la cosa referida que deje de ser generica y pase a ser una en particular. En ingles hay ciertas palabras que no usan articulos: home, bed, ...\r\nGo to bed! Not: Go to the Bed...\r\nGo Home! Not: Go to the home...', 'theArticle.PNG'),
(10, 'Verbo To Have / Verb to Have', 'Teoria y practica del verbo auxiliar to have.', 0, '2019-02-20 21:32:26', 'El verbo to have ademas de significar tener en ocasiones es verbo auxiliar que sirve para formar los tiempos pluscuamperfectos compuestos ha jugado o habia ...', 'haveAndHaveGot.PNG'),
(11, 'Verbo To Be / Verb To Be', 'Como conjugar el verbo to Be y para que usos adicionales se emplea', 0, '2019-02-16 04:23:07', 'El verbo to be ademÃ¡s de significar Ser o Estar tambiÃ©n sirve para formar la forma pasiva de los verbos.', 'verbToBe.PNG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT '0',
  `active` tinyint(4) DEFAULT '0',
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `admin`, `active`, `createdAt`, `updatedAt`) VALUES
(1, 'administrador', 'admin@mail.com', '123', 1, 0, NULL, NULL),
(2, 'admin', 'mjosesc@yahoo.com', '1234', 1, 1, NULL, NULL),
(3, 'user', 'mjosesc@yahoo.com', '1234', 0, 1, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
