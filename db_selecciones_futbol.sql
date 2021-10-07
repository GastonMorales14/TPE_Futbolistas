-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2021 a las 21:03:39
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_selecciones_futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `equipo` varchar(100) NOT NULL,
  `posicion` varchar(100) NOT NULL,
  `fk_id_nacionalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_jugador`, `nombre`, `apellido`, `equipo`, `posicion`, `fk_id_nacionalidad`) VALUES
(1, 'Marcos', 'Acuña', 'Sevilla', 'Defensor', 1),
(2, 'Emiliano', 'Martinez', 'Aston Villa', 'Arquero', 1),
(3, 'Cristian', 'Romero', 'Tottenham', 'Defensor', 1),
(4, 'Nicolas', 'Otamendi', 'Benfica', 'Defensor', 1),
(5, 'Gonzalo', 'Montiel', 'Sevilla', 'Defensor', 1),
(6, 'Rodrigo', 'De Paul', 'Atletico Madrid', 'Mediocampista', 1),
(7, 'Leandro', 'Paredes', 'Psg', 'Medicampista', 1),
(8, 'Giovani', 'Lo celso', 'Tottenham', 'Mediocampista', 1),
(9, 'Leonel Andres', 'Messi', 'Psg', 'Delantero', 1),
(10, 'Angel', 'Di Maria', 'Psg', 'Delantero', 1),
(11, 'Lautaro', 'Martinez', 'Inter', 'Delantero', 1),
(12, 'Alisson', 'Becker', 'Liverpool', 'Arquero', 2),
(13, 'Danilo', 'Luiz Da Silva', 'Juventus', 'Defensor', 2),
(14, 'Thiago', 'Silva', 'Psg', 'Defensor', 2),
(15, 'Eder', 'Militao', 'Real Madrid', 'Defensor', 2),
(16, 'Alex', 'Sandro', 'Juventus', 'Defensor', 2),
(17, 'Lucas', 'Paqueta', 'Olympique Lyon', 'Medicampista', 2),
(18, 'Carlos', 'Casemiro', 'Real Madrid', 'Medicampista', 2),
(19, 'Fred', 'Santos', 'Manchester United', 'Mediocampista', 2),
(20, 'Neymar', 'Junior', 'Psg', 'Delantero', 2),
(21, 'Gabriel', 'Jesus', 'Manchester City', 'Delantero', 2),
(22, 'Gabriel', 'Barbosa', 'Flamengo', 'Delantero', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `id_nacionalidad` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`id_nacionalidad`, `nombre`) VALUES
(1, 'Argentina'),
(2, 'Brasil'),
(3, 'Uruguay'),
(4, 'Colombia'),
(5, 'Chile');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugador`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`id_nacionalidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
