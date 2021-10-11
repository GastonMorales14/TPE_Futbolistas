-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2021 a las 17:35:43
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
  `numero_camiseta` int(3) NOT NULL,
  `equipo` varchar(100) NOT NULL,
  `posicion` varchar(100) NOT NULL,
  `edad` int(3) NOT NULL,
  `fk_id_nacionalidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_jugador`, `nombre`, `apellido`, `numero_camiseta`, `equipo`, `posicion`, `edad`, `fk_id_nacionalidad`) VALUES
(1, 'Marcos', 'Acuña', 8, 'Sevilla', 'Defensor', 29, 1),
(2, 'Emiliano', 'Martinez', 23, 'Aston Villa', 'Arquero', 29, 1),
(3, 'Cristian', 'Romero', 13, 'Tottenham', 'Defensor', 23, 1),
(4, 'Nicolas', 'Otamendi', 19, 'Benfica', 'Defensor', 33, 1),
(5, 'Gonzalo', 'Montiel', 4, 'Sevilla', 'Defensor', 24, 1),
(6, 'Rodrigo', 'De Paul', 7, 'Atletico Madrid', 'Mediocampista', 27, 1),
(7, 'Leandro', 'Paredes', 5, 'Psg', 'Medicampista', 27, 1),
(8, 'Giovani', 'Lo celso', 20, 'Tottenham', 'Mediocampista', 25, 1),
(9, 'Leonel Andres', 'Messi', 10, 'Psg', 'Delantero', 34, 1),
(10, 'Angel', 'Di Maria', 11, 'Psg', 'Delantero', 33, 1),
(11, 'Lautaro', 'Martinez', 22, 'Inter', 'Delantero', 24, 1),
(12, 'Alisson', 'Becker', 1, 'Liverpool', 'Arquero', 29, 2),
(13, 'Danilo', 'Luiz Da Silva', 2, 'Juventus', 'Defensor', 30, 2),
(14, 'Thiago', 'Silva', 3, 'Psg', 'Defensor', 37, 2),
(15, 'Eder', 'Militao', 32, 'Real Madrid', 'Defensor', 23, 2),
(16, 'Alex', 'Sandro', 6, 'Juventus', 'Defensor', 30, 2),
(17, 'Lucas', 'Paqueta', 17, 'Olympique Lyon', 'Medicampista', 24, 2),
(18, 'Carlos', 'Casemiro', 5, 'Real Madrid', 'Medicampista', 29, 2),
(19, 'Fred', 'Santos', 11, 'Manchester United', 'Mediocampista', 32, 2),
(20, 'Neymar', 'Junior', 10, 'Psg', 'Delantero', 29, 2),
(21, 'Gabriel', 'Jesus', 13, 'Manchester City', 'Delantero', 24, 2),
(22, 'Gabriel', 'Barbosa', 9, 'Flamengo', 'Delantero', 25, 2),
(23, 'Fernando', 'Muslera', 1, 'Galatasaray', 'Arquero', 35, 3),
(24, 'Nahitan', 'Nández', 8, 'Cagliari', 'Mediocampista', 25, 3),
(25, 'José María', 'Giménez', 2, 'Atlético Madrid', 'Defensor', 26, 3),
(26, 'Diego', 'Godín', 3, 'Cagliari', 'Defensor', 35, 3),
(27, 'Matías', 'Viña', 17, 'Roma', 'Defensor', 23, 3),
(28, 'Matías', 'Vecino', 5, 'Inter', 'Mediocampista', 30, 3),
(29, 'Federico', 'Valverde', 15, 'Real Madrid', 'Mediocampista', 23, 3),
(30, 'Rodrigo', 'Bentancur', 6, 'Juventus', 'Mediocampista', 24, 3),
(31, 'Giorgian', 'De Arrascaeta', 10, 'Flamengo', 'Mediocampista', 27, 3),
(32, 'Luis', 'Suarez', 9, 'Atletico Madrid', 'Delantero', 34, 3),
(33, 'Edinson', 'Cavani', 21, 'Manchester United', 'Delantero', 34, 3),
(50, 'David', 'Ospina', 1, 'Napoli', 'Arquero', 33, 4),
(51, 'Carlos', 'Cuesta', 4, 'Genk', 'Defensor', 22, 4),
(52, 'Oscar', 'Murillo', 22, 'Pachuca', 'Defensor', 27, 4),
(53, 'Yairo', 'Moreno', 17, 'Pachuca', 'Defensor', 22, 4),
(54, 'Juan', 'Cuadrado', 11, 'Juventus', 'Mediocampista', 33, 4),
(55, 'Juan', 'Quintero', 10, 'Shenzhen', 'Mediocampista', 28, 4),
(56, 'Wilmar', 'Barrios', 25, 'Zenit', 'Mediocampista', 25, 4),
(57, 'Mateus', 'Uribe', 16, 'Porto', 'Mediocampista', 25, 4),
(58, 'Luis', 'Díaz', 14, 'Porto', 'Mediocampista', 24, 4),
(59, 'Rafael', 'Santos Borré', 18, 'Eintracht Frankfurt', 'Delantero', 26, 4),
(60, 'Duvan', 'Zapata', 7, 'Atalanta', 'Delantero', 30, 4);

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
(4, 'Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`email`, `password`, `role`, `name`, `surname`, `birthday`) VALUES
('admin1@gmail.com', '$2y$10$m1Hcj75KUWcBnE08I5UHC.TsauLZv01e2ijQKEzWOTpkIpuztnICu', 1, 'gabriel', 'rodriguez', '1995-02-15'),
('demo@gmail.com', '$2y$10$nb3tqR5lSyIHNOI/wvBVTuvBNJY29Dx/lgDWheY0seJJXVouuwkEm', 0, 'juan', 'perez', '1995-05-12');

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
