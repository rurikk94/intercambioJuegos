
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-07-2018 a las 02:19:01
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u287479366_juego`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_admin` int(100) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(15) CHARACTER SET utf32 COLLATE utf32_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_categoria_2` (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'MOBA'),
(2, 'Acción'),
(3, 'Aventuras'),
(4, 'Deportes'),
(5, 'Estrategia'),
(6, 'FPS'),
(7, 'Horror'),
(8, 'Pelea'),
(9, 'Rol'),
(10, 'Carreras'),
(11, 'Casual'),
(12, 'Indie'),
(13, 'MMORPG'),
(14, 'Simuladores'),
(15, 'Mundo Abierto'),
(16, 'Futbol'),
(17, 'Consola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intercambios`
--

CREATE TABLE IF NOT EXISTS `intercambios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_juego_usuario` int(11) NOT NULL,
  `id_usuario_dueno` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `aceptado` tinyint(1) NOT NULL DEFAULT '0',
  `leido` tinyint(1) NOT NULL DEFAULT '0',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `intercambios`
--

INSERT INTO `intercambios` (`id`, `id_juego_usuario`, `id_usuario_dueno`, `id_usuario2`, `fecha`, `aceptado`, `leido`, `borrado`, `precio`) VALUES
(1, 1, 11, 6, '2017-05-30 01:47:55', 1, 0, 0, 0),
(2, 1, 11, 6, '2017-05-30 01:50:47', 0, 1, 0, 0),
(3, 3, 6, 7, '2017-05-30 01:51:06', 1, 0, 0, 0),
(4, 6, 11, 6, '2017-05-31 18:36:47', 0, 1, 0, 0),
(5, 11, 12, 11, '2017-05-31 21:38:11', 1, 0, 0, 0),
(6, 7, 12, 13, '2017-05-31 22:03:16', 1, 0, 0, 0),
(7, 12, 11, 7, '2017-06-11 12:11:34', 0, 1, 0, 0),
(8, 4, 7, 14, '2017-06-12 00:41:50', 1, 0, 0, 5000),
(9, 5, 9, 7, '2017-06-12 00:42:58', 0, 0, 0, 0),
(10, 6, 11, 6, '2017-06-12 01:32:55', 1, 0, 0, 5000),
(11, 1, 6, 6, '2017-06-12 01:38:05', 0, 1, 0, 0),
(12, 3, 6, 6, '2017-06-12 01:39:02', 0, 1, 0, 0),
(13, 1, 6, 11, '2017-06-12 03:31:04', 0, 1, 0, 0),
(14, 1, 6, 11, '2017-06-12 03:33:49', 1, 0, 0, 2000),
(15, 3, 6, 11, '2017-06-12 03:36:00', 1, 0, 0, 10000),
(16, 14, 7, 6, '2017-06-12 04:44:10', 0, 0, 0, 25000),
(17, 12, 11, 6, '2017-06-12 06:24:51', 1, 0, 0, 5000),
(18, 6, 6, 11, '2017-06-12 06:32:28', 0, 1, 0, 5000),
(19, 6, 6, 14, '2017-06-13 20:23:47', 0, 1, 0, 5000),
(20, 21, 14, 7, '2017-06-14 20:33:21', 1, 0, 0, 30000),
(21, 4, 14, 11, '2017-06-15 00:54:04', 0, 0, 0, 15000),
(22, 12, 6, 11, '2017-06-15 00:59:14', 1, 0, 0, 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE IF NOT EXISTS `juegos` (
  `id_juego` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_juego` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_categoria` int(50) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `ano` year(4) DEFAULT NULL,
  `cover` text COLLATE utf8_unicode_ci NOT NULL,
  `art` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_juego`),
  KEY `id_juego` (`id_juego`),
  KEY `id_juego_2` (`id_juego`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id_juego`, `nombre_juego`, `id_categoria`, `descripcion`, `ano`, `cover`, `art`) VALUES
(10, 'Grand Theft Auto V', 3, 'Es un videojuego de acción-aventura de mundo abierto desarrollado por la compañía británica Rockstar North y distribuido por Rockstar Games. Fue lanzado el 17 de septiembre de 2013 para las consolas PlayStation 3 y Xbox 360.5 Posteriormente, fue lanzado para las consolas de nueva generación PlayStation 4 y Xbox One el 18 de noviembre de 2014 y finalmente para Microsoft Windows el 14 de abril de 2015. Se trató del primer gran título en la serie Grand Theft Auto desde que se estrenara Grand Theft Auto IV en 2008, el cual estrenó la «era HD» de la mencionada serie de videojuegos.', 2013, 'https://vignette3.wikia.nocookie.net/gtawiki/images/0/0c/OneTrueSlash.jpg/revision/latest?cb=20140116163503', 'https://img.utdstc.com/screen/windows/thumb/grand-theft-auto-v-wallpaper-2.jpg'),
(11, 'Overwatch', 2, '', 2016, 'http://gamepreorders.com/wp-content/uploads/2016/03/overwatch-cover.jpg', 'https://images4.alphacoders.com/553/553496.jpg'),
(12, 'World of Warcraft', 13, '', 2004, 'http://www.mobygames.com/images/covers/l/219531-world-of-warcraft-battle-chest-macintosh-other.jpg', 'http://i.imgur.com/ppSwMFB.jpg'),
(13, 'World of Warcraft Legion', 13, '', 2016, 'https://justcheapgames.com/wp-content/uploads/2016/08/WoW_Legion_Cover_Photo.jpg', 'http://media.blizzard.com/wow/media/wallpapers/other/legion/legion-2560x1440-wide.jpg'),
(14, 'World of Warships', 14, '', 2015, 'http://guides.gamepressure.com/gfx/box/526.jpg', 'https://images2.alphacoders.com/689/thumb-1920-689300.jpg'),
(15, 'Pokemon GO', 14, '', 2016, 'https://i.ytimg.com/vi/hxeoteYOtos/maxresdefault.jpg', 'https://images7.alphacoders.com/718/718410.png'),
(16, 'Call of Duty: Infinite Warfare', 6, '', 2016, 'https://assets.vg247.com/current//2016/06/call_of_duty_infinite_warfare_possible_new_art_1.jpg', 'http://www.gamingesports.com/wp-content/uploads/2016/11/Call-of-Duty-Infinite-Warfare-Wallpaper.jpg'),
(17, 'Mainkra', 3, '', 2009, 'http://stuffpoint.com/minecraft/image/82438-minecraft-minecraft-cover.jpg', 'http://wallpaper-gallery.net/images/minecraft-wallpaper-download/minecraft-wallpaper-download-20.jpg'),
(18, 'Rayman 2: The Great Escape', 3, 'Rayman 2: The Great Escape es un videojuego diseñado y publicado por Ubisoft para Nintendo 64, Dreamcast, PC, PlayStation. Tuvo un rework para Nintendo DS, bajo el nombre de Rayman DS, para PlayStation 3 y PlayStation Portable en 2008, para Apple bajo el nombre original en 2010, y para la consola Nintendo 3DS con el nombre de Rayman 3D, en 2011. También iba a ser lanzado para la plataforma Sega Saturn, pero fue cancelado poco antes de salir.', NULL, 'http://i.imgur.com/YDfzqKu.jpg', 'http://i.imgur.com/Ko34VzA.jpg'),
(19, 'Rocket League', 10, 'Rocket League es un videojuego que combina el fútbol con los vehículos. Fue desarrollado por Psyonix y lanzado el 7 de julio del 2015. Se encuentra disponible en español, tiene modos de juego cooperativo, de un jugador y en línea. Está disponible para PC, para PlayStation 4 y, con posterioridad a su lanzamiento inicial, para Xbox One.', NULL, 'http://i.imgur.com/wQWRefV.jpg', 'http://i.imgur.com/ERyXU0Y.jpg'),
(20, 'NieR: Automata', 3, 'NieR: Automata (secuela del NieR original de 2010, que a su vez era un spin-off de la saga Drakengard) es un intenso videojuego RPG de acción con abundante exploración, plataformas y un destacado sentido de la verticalidad, desarrollado por Platinum Games y Square Enix. ¿El objetivo de la aventura? En la sintética piel del androide 2B nos embarcamos en una arriesgada misión por recuperar el hogar de la humanidad. ¿Qué funciones tiene nuestro protagonista? Se trata del androide de combate más avanzado jamás construido, uno capaz de desarrollar devastadores unas secuencias combos rápidos y hábiles ataques. Características que brillan de la mano de las mecánicas de combate ideadas por un equipo tan talentoso como el que nos ocupa, y que ha sido capaz de crear joyas como Bayonetta, Mad World o Vanquish.  En concreto la heroína recibe el nombre completo de YoRHa 2B, una entidad de psique fría y calculadora que contrasta con su delicado y vulnerable aspecto. Junto a ella camina otro androide que crea una serie de sinergias narrativas de las que se beneficia la campaña del título. Con ellos el jugador recorre y explora un universo fantástico con identidad propia donde no faltan criaturas alienígenas de aspecto robótico, drones, androides y todo tipo de personajes creados por el gran Akihiko Yoshida. Además uno de los mayores incentivos no sólo es la riqueza de sus variados finales, que nos obligarán a terminar el lanzamiento varias veces si queremos conocer toda su historia al dedillo y descubrir las claves de qué provocó el aciago destino de la humanidad en el pasado para ver el desolador y mundo postapocalíptico en el que nos movemos.', 2017, 'https://image.prntscr.com/image/b2ba9b4cd49c4b0caba429e67ca71329.png', 'https://i.kinja-img.com/gawker-media/image/upload/t_original/a54awwtixy3nbbrpyl70.jpg'),
(21, 'Injusticie 2', 2, 'Injustice 2 es un videojuego de lucha desarrollado por NetherRealm Studios y publicado por Warner Bros. Interactive Entertainment. Es la secuela del videojuego de 2013 Injustice: Dioses entre nosotros. ', 2017, 'http://i.imgur.com/O4siaQ4.jpg', 'http://www.xboxachievements.com/images/news/Injustice_2_Announce_Art.jpg'),
(22, 'Diablo III', 9, '¡El mundo de Santuario es un caos! ¿Listo para la lucha? Diablo 3 nos lleva a combatir contra los ejércitos del infierno encarnando a cualquiera de los cinco héroes que protagonizan la tercera entrega de esta veterana serie de aventuras de acción y rol desarrollada por Blizzard, autores también de Warcraft y StarCraft, que por primera vez se estrena también en consolas, con versiones adaptadas a Xbox 360 y PS3.  Bárbaro, Monje, Cazadora de Demonios, Mago y Médico Brujo. Cada uno con sus propias habilidades especiales y equipo de batalla exclusivo, los nuevos héroes deben explorar oscuras catacumbas, adentrarse en templos malditos, rescatar inocentes en sangrientos campos de batalla y sobrevivir a los mismísimos infiernos en un videojuego que no se olvida de una de las grandes señas de identidad de la franquicia: el cooperativo.  Hasta cuatro personas pueden unir fuerzas para luchar contra las tropas de Azmodan que amenazan con destruir este oscuro mundo de fantasía que crea sus escenarios siempre de forma procedural, para que cada partida sea distinta a la anterior. Durante el viaje conoceremos a nuevos personajes como Leah, también nos cruzaremos con viejos conocidos como Deckard Cain, y tendremos oportunidad de comerciar con vendedores, mejorar nuestras armas, y usar gemas preciosas y diamantes para potenciar las habilidades del héroe.', 2012, 'https://upload.wikimedia.org/wikipedia/en/8/80/Diablo_III_cover.png', 'https://s-media-cache-ak0.pinimg.com/originals/e0/15/ce/e015ceaa2e16074bc98b560b32abf58a.jpg'),
(23, 'Dark Souls III', 3, 'Dark Souls 3 es la tercera entrega de la desafiante saga RPG de FromSoftware y Hidetaka Miyazaki. Un videojuego que mezcla y refina todo lo aprendido anteriormente por sus creadores con la saga Souls y Bloodborne para presentar un título más redondo en lo jugable, con buen equilibrio en las "builds" de personaje, gran tratamiento del ritmo y la velocidad, combates más dinámicos y vivos, escenarios llenos de secretos y, como no, impresionantes y desafiantes jefes finales.', 2016, 'https://image.prntscr.com/image/d58d419828d744ada13c3a9d13145153.png', 'http://i.imgur.com/AfvoZlx.jpg'),
(24, 'FIFA 17', 16, 'FIFA 17 es la apuesta por la simulación de fútbol de EA Sports para la temporada 2016-2017. Vuelve toda la emoción de las principales ligas al mundo del videojuego en una entrega donde se promete un mayor grado de personalización, inmersión y competición.', 2016, 'http://i.imgur.com/ii1IDX7.png', 'http://images.launchbox-app.com/1b050d78-db17-4241-b7f7-4464fbc126fb.jpg'),
(25, 'Sims 4', 14, 'Tú creas. Tú decides. Tú mandas en Los Sims 4. Crea nuevos Sims con personalidades marcadas y aspectos definidos. ¡Controla la mente, el cuerpo y el corazón de tus Sims y juega a la vida! • Crea a quien quieras • Construye la casa perfecta • Juega a la vida', 2014, 'http://www.simcookie.com/wp-content/uploads/2014/06/Les-Sims-4-Cover-art.jpg', 'http://i.imgur.com/s4rUbgW.jpg'),
(26, 'JoJos Bizarre Adventure', 8, '', 1998, 'https://upload.wikimedia.org/wikipedia/en/a/a1/JoJo%27s_Venture_sales_flyer.png', ''),
(27, 'Super Nintendo', 17, 'La Super Nintendo Entertainment System, más conocida como la Super Nintendo o la Super NES (abreviado SNES), también llamada la Super Famicom. es la tercera videoconsola de sobremesa de Nintendo', 1990, 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/SNES-Mod1-Console-Set.jpg/250px-SNES-Mod1-Console-Set.jpg', 'http://wallpapercave.com/wp/XhwWqSR.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_usuarios`
--

CREATE TABLE IF NOT EXISTS `juegos_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL,
  `id_plataforma` int(11) NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `existe` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'si es que esta esperando un intercambio',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `descripcion` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `juegos_usuarios`
--

INSERT INTO `juegos_usuarios` (`id`, `id_usuario`, `id_juego`, `id_plataforma`, `precio`, `existe`, `eliminado`, `descripcion`) VALUES
(1, 11, 18, 3, 2000, 0, 0, ''),
(2, 11, 18, 13, 0, 0, 0, ''),
(3, 11, 19, 16, 10000, 0, 0, ''),
(4, 14, 11, 1, 15000, 1, 0, ''),
(5, 9, 13, 2, NULL, 1, 0, ''),
(6, 6, 20, 16, 5000, 1, 0, ''),
(7, 13, 17, 1, 0, 0, 0, ''),
(8, 12, 16, 9, 0, 0, 0, ''),
(9, 12, 21, 16, 0, 0, 0, ''),
(10, 12, 12, 1, 0, 0, 0, ''),
(11, 11, 23, 16, 0, 0, 0, ''),
(12, 11, 22, 1, 20000, 0, 0, ''),
(13, 6, 10, 1, 0, 1, 1, ''),
(14, 7, 25, 1, 25000, 1, 0, ''),
(15, 11, 25, 1, 0, 0, 0, ''),
(16, 18, 19, 1, 0, 0, 0, ''),
(17, 12, 26, 14, 15000, 1, 0, NULL),
(18, 13, 14, 1, 0, 1, 0, NULL),
(19, 11, 27, 12, 120000, 0, 0, NULL),
(20, 14, 19, 1, 9000, 0, 0, NULL),
(21, 7, 10, 1, 30000, 0, 0, NULL),
(22, 7, 14, 1, 5000, 0, 0, NULL),
(23, 8, 11, 6, 25000, 1, 0, NULL),
(24, 6, 10, 1, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE IF NOT EXISTS `plataforma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_plataforma` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`id`, `nombre_plataforma`) VALUES
(1, 'Windows'),
(2, 'Linux'),
(3, 'PS'),
(4, 'PS2'),
(5, 'PS3'),
(6, 'PS4'),
(7, 'XBOX'),
(8, 'XBOX360'),
(9, 'XBOX ONE'),
(10, 'Wii'),
(11, 'DS'),
(12, 'SNES'),
(13, 'N64'),
(14, 'NES'),
(15, '3DS'),
(16, 'Steam'),
(17, 'Origin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE IF NOT EXISTS `transacciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `tipo` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ABONO' COMMENT '0 abono; 1 cargo',
  `monto` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id`, `id_usuario`, `tipo`, `monto`, `descripcion`, `fecha`) VALUES
(1, 6, 'ABONO', 5000, 'Recarga vía Webbay', '2017-06-12 02:09:57'),
(2, 6, 'CARGO', 5000, 'Compra de juego a Rurikk asd IKA', '2017-06-12 03:22:17'),
(3, 6, 'ABONO', 5000, 'Venta de juego a jorge', '2017-06-12 03:25:45'),
(4, 6, 'CARGO', 5000, 'Compra de juego  a Rurikk asd IKA', '2017-06-12 03:26:53'),
(5, 6, 'ABONO', 5000, 'Venta de juego  a jorge', '2017-06-12 03:26:53'),
(6, 11, 'CARGO', 2000, 'Compra de juego  a jorge sepulveda', '2017-06-12 03:34:03'),
(7, 6, 'ABONO', 2000, 'Venta de juego  a Rurikk asd', '2017-06-12 03:34:03'),
(8, 11, 'ABONO', 15000, 'Recarga vía Webbay', '2017-06-12 03:35:48'),
(9, 6, 'ABONO', 10000, 'Venta de juego  a Rurikk asd', '2017-06-12 03:36:15'),
(10, 11, 'ABONO', 50000, 'Recarga vía Webbay', '2017-06-12 06:14:35'),
(11, 7, 'ABONO', 5000, 'Venta de juego  a Jorge', '2017-06-14 20:32:35'),
(12, 14, 'ABONO', 15000, 'Recarga vía Webbay', '2017-06-14 20:33:31'),
(13, 14, 'ABONO', 30000, 'Venta de juego  a Claudia Graciela', '2017-06-14 20:33:48'),
(14, 11, 'ABONO', 5000, 'Venta de juego  a jorge', '2017-06-15 00:56:31'),
(15, 6, 'ABONO', 20000, 'Venta de juego  a Rurikk asd', '2017-06-15 00:59:28'),
(16, 6, 'ABONO', 5000, 'Recarga vía Webbay', '2018-01-22 02:22:35'),
(17, 6, 'ABONO', 1000, 'Recarga vía Webbay', '2018-01-22 02:22:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT '$passwordCodificada = password_hash($password, PASSWORD_DEFAULT);',
  `admin` tinyint(1) NOT NULL,
  `url_perfil` text COLLATE utf8_unicode_ci,
  `url_banner` text COLLATE utf8_unicode_ci,
  `bio` text COLLATE utf8_unicode_ci,
  `ciudad` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monedero` int(11) NOT NULL DEFAULT '0',
  `ultimo_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_usuario_2` (`id_usuario`),
  KEY `id_usuario_3` (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellidos`, `usuario`, `contrasena`, `admin`, `url_perfil`, `url_banner`, `bio`, `ciudad`, `monedero`, `ultimo_login`, `email`) VALUES
(6, 'jorge', 'sepulveda', 'jorge', '$2y$10$P9qpirsMAq0K.QNqlwOEzuFTG/nCAvkcTkU53zcn1YHaSORWvrRqm', 0, 'http://i.imgur.com/WzBFw39.png', 'http://i.imgur.com/sRoPZcr.png', '			Antiguo sargento del ejército republicano, tras pasar por el campo de concentración de Albatera, en 1941 trabajaba como contable, pero se fue a Zaragoza a probar suerte como cantante y de allí a Madrid,[1] donde inicia su carrera artística en la Sala Casablanca en 1942. Empezó a grabar discos y sus canciones se popularizaron a través de la radio, en programas de canciones dedicadas muy escuchados en la época, cuando las orquestas y artistas de moda actuaban en directo.', 'ARICA', 52000, '2018-07-27 21:51:49', 'sepulveda.jorge.1993@gmail.com'),
(7, 'Claudia Graciela ', 'González Zamora ', 'claudipondi', '$2y$10$aYuiOqnejJxlO6SnjF83RONBsghMnrP7kIK4XgIh1hhWZbHzUjble', 0, 'http://www.gamingenthusiast.net/wp-content/uploads/2015/10/gamers.png', 'http://lacatarina.udlap.mx/wp-content/uploads/2015/02/gamer-life-740x462.jpg', '									', 'Viña del Mar', 99975000, '2017-06-14 16:36:47', 'claudipondi@cuvox.de'),
(8, 'Luis Armando', 'Ahumada Barrera', 'sirluis123', '$2y$10$f/GsnuYJORk2qWnePE5Z1u9l188aVrlJutnDBKG8JSfENcLssSXYa', 0, 'http://pm1.narvii.com/6030/756b6a254c86787a929b605aba68fe71ecfba92f_hq.jpg', 'https://myanimelist.cdn-dena.com/s/common/uploaded_files/1448728195-65b8e8e39e0053779927331ede4b9a05.png', '			las lolis son la vida, sin ellas el mundo no sería como es hoy :3 .								', 'Valparaiso', 0, '2017-06-14 16:13:12', 'sirluis123@cuvox.de'),
(9, 'Jorge Luis', 'Pino Huerta', 'Exahel', '$2y$10$mGCJoowLztGcVIWjfomBX.jOQ0YEtqITfs8gkLIE/Kk7m4DW95e3u', 0, 'http://i.imgur.com/l2GBL8D.png', NULL, NULL, 'CONCEPCIÓN', 0, '2017-06-12 04:51:22', 'exahel@cuvox.de'),
(11, 'Rurikk asd', 'IKA', 'rurikk', '$2y$10$2JuvujqlCLRSb.tzVYic4.pEZwmrJzQGze34QbPWlNrdSUEf/WRsO', 0, 'http://i.imgur.com/TDH0SG7.png', 'https://image.prntscr.com/image/PIPjAYRTQ96nSnqPaRvuUQ.png', '			HOLAA			', 'CHILE', 48000, '2017-06-14 21:02:22', 'rurikk@tekeremata.org'),
(12, '承太郎', '空条', 'sayonala', '$2y$10$KpOWsGoVIUDiVoBR6LmgReKuzNqVcr0anImR/ffc3ACbXrs6F49m2', 0, 'https://s-media-cache-ak0.pinimg.com/originals/e5/8f/f4/e58ff4f01f1a5caf6ed154672e2b39b1.jpg', 'https://kennethcummings.files.wordpress.com/2015/06/jojo-jotaro-intro.jpg', '									', 'ANTOFAGASTA', 0, '2017-06-12 02:53:06', 'jotarokun@cuvox.de'),
(13, 'Asd', 'Asd', 'Asd', '$2y$10$hjaq6BL5hPILZezu1vVY/.ptwskaZeE8s5nMi6gt96JbjpyHZ/0WO', 0, 'https://media.giphy.com/media/l0IyplKoAviiIhUd2/giphy.gif', '', '			', 'SAN FELIPE', 0, '2017-06-12 02:35:22', ''),
(14, 'Jorge', 'Pino Huerta', 'Exahel23', '$2y$10$RG8JiKlPZnxfkmNiBMwyDeRQpv7EWg2FeRP744Bcv9tgFJsXParFi', 0, 'http://i.imgur.com/l2GBL8D.png', NULL, NULL, 'VALPARAISO', 50000, '2017-06-14 16:37:16', 'exahel23@cuvox.de'),
(15, 'Luchokun', 'Ahumalu', 'sirluisgoku123', '$2y$10$pPnamtrM8G.oJ6EwhAWL2.cxCAPR8cgn96hSlwSaiizHgk5fKJVxK', 0, 'http://i.imgur.com/l2GBL8D.png', NULL, NULL, 'CASABLANCA', 0, '2017-06-12 04:51:22', 'sirluisgoku123@cuvox.de'),
(16, 'juano', 'perez', 'jp', '$2y$10$2hj7Vp//SlaPvXeuB22nW.nHQYsjf9FY42KQVoULEyxqZ06g4EC/q', 0, NULL, NULL, NULL, NULL, 0, '2017-06-12 04:51:22', 'jp@cuvox.de'),
(22, 'qweasd', 'qweasd', 'qweasd', '$2y$10$Ne4grGRCUV4K0PY0FZpZh.AilEEgtX4yAJ5QsDF8HzC6IHrWGWvxW', 0, NULL, NULL, NULL, NULL, 0, '2017-06-12 06:41:36', 'qweasd@cuvox.de'),
(17, 'Lord', 'Ason', 'Lordason', '$2y$10$NSAFdTgC9pWuNV9o9n.J3.6vvZomLvGyReW33hOzYPd3O8SxiDzeK', 0, NULL, NULL, NULL, NULL, 10, '2017-06-12 04:51:22', ''),
(18, 'Viviana', 'Gonzalez', 'Baba', '$2y$10$E7m630yvL9vUBFh8Y.HG8ORPNbyUWAEDnEHAyfpnR/t5M6oFEJrB6', 0, NULL, NULL, NULL, NULL, 0, '2017-06-12 04:51:22', ''),
(21, 'Shlomith', 'Cabezas', 'scabezas', '$2y$10$zdAIskX1OWiGnwKOsP1uteYhCQMOSRI1XWV9DIedkxrkhalDfC/7e', 0, NULL, NULL, NULL, NULL, 0, '2017-06-12 04:51:22', ''),
(23, 'brunito ', 'Elshexo Selacome', 'shexoelbi', '$2y$10$dtyRNleDwfEMjv9Nq.35duzooVtjdtIftukfdroM/3tuX0qHI2vNm', 0, NULL, NULL, NULL, NULL, 0, '2017-06-13 00:40:14', 'brunoesteban.2306@gmail.com'),
(24, 'qwe', 'qweqwqweqwee', 'qweqwe', '$2y$10$NqmqsEzi1Wpj.vguPmmYy.V5i1kfnQ12aPEiOVmpIzmms7Z70TAay', 0, NULL, NULL, NULL, NULL, 0, '2017-06-13 06:27:25', 'qweqwe@cuvox.de'),
(25, 'juanito', 'ney', 'qweasdzxc', '$2y$10$otoWL0sqiHoC8ggWemBd7uW38B3v7qWWvDTT9wlI/3ee7pkC2eh5a', 0, NULL, NULL, NULL, NULL, 0, '2018-07-27 22:02:21', 'rurikk94@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
