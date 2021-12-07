-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2021 a las 13:25:49
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `obrex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coolers_procesador`
--

CREATE TABLE `coolers_procesador` (
  `ID_COOLER` int(11) NOT NULL,
  `MODELO` varchar(50) NOT NULL,
  `MARCA` varchar(50) NOT NULL,
  `SOCKET` varchar(50) NOT NULL,
  `ALTURA` varchar(50) NOT NULL,
  `PRECIO` double NOT NULL,
  `RUTA_IMAGEN` varchar(500) DEFAULT NULL,
  `LINK_FABRICANTE` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_1` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_2` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_3` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coolers_procesador`
--

INSERT INTO `coolers_procesador` (`ID_COOLER`, `MODELO`, `MARCA`, `SOCKET`, `ALTURA`, `PRECIO`, `RUTA_IMAGEN`, `LINK_FABRICANTE`, `LINK_COMPRA_1`, `LINK_COMPRA_2`, `LINK_COMPRA_3`) VALUES
(1, 'PRO Cooler 4 Pipes RGB', 'Tempest', 'LGA1200', '183', 35, 'images/piezas/tempest-pro-cooler-4pipes-black-rgb.png', 'https://www.tempestofficial.com/inicio/96-tempest-pro-cooler-4-pipes-black-rgb.html', 'https://www.pccomponentes.com/tempest-pro-cooler-4pipes-black-rgb-ventilador-cpu-120mm', NULL, NULL),
(2, 'Hyper 212', 'Cooler Master', 'AM4 ', '159', 50, 'images/piezas/hyper212_coolerMaster.png', 'https://www.coolermaster.com/la/es-la/catalog/coolers/cpu-air-coolers/hyper-212-rgb-black-edition/', 'https://www.pccomponentes.com/cooler-master-hyper-212-rgb-black-edition', 'https://www.coolmod.com/cooler-master-hyper-212-rgb-black-edition-disipador-cpu/', 'https://www.amazon.es/Cooler-Master-Hyper-Black-Tower/dp/B07H9JL1P8/ref=sr_1_1?adgrpid=60412126485&gclid=CjwKCAiAv_KMBhAzEiwAs-rX1E5q7KhTilPBDXxDmJZv1oOjp49KN_zegIcXjjHNji4--1d6Vi7kUhoCtMUQAvD_BwE&hvadid=310996162720&hvdev=c&hvlocphy=1005495&hvnetw=g&hvqmt=e&hvrand=4452236272937434956&hvtargid=kwd-575591040656&hydadcr=28892_1774523&keywords=hyper%2B212%2Brgb&qid=1637655101&sr=8-1&th=1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `ID_DISCO` int(11) NOT NULL,
  `MODELO` varchar(50) NOT NULL,
  `MARCA` varchar(50) NOT NULL,
  `TIPO` varchar(50) NOT NULL,
  `TAMANO` int(11) NOT NULL,
  `INTERFAZ` varchar(50) NOT NULL,
  `PULGADAS` varchar(50) NOT NULL,
  `PRECIO` double NOT NULL,
  `RUTA_IMAGEN` varchar(500) DEFAULT NULL,
  `LINK_FABRICANTE` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_1` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_2` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_3` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`ID_DISCO`, `MODELO`, `MARCA`, `TIPO`, `TAMANO`, `INTERFAZ`, `PULGADAS`, `PRECIO`, `RUTA_IMAGEN`, `LINK_FABRICANTE`, `LINK_COMPRA_1`, `LINK_COMPRA_2`, `LINK_COMPRA_3`) VALUES
(1, 'BarraCuda', 'Seagate', 'HDD', 1000, 'SATA', '3.5', 37, 'images/piezas/seagate-barracuda-35.png', 'https://www.seagate.com/es/es/support/internal-hard-drives/desktop-hard-drives/barracuda-3-5/', 'https://www.pccomponentes.com/seagate-barracuda-35-1tb-sata3', 'https://www.coolmod.com/seagate-barracuda-1tb-35-sata3-disco-duro/', 'https://www.amazon.es/Seagate-Barracuda-ST1000DM003-Disco-interno/dp/B005T3GRNW/ref=sr_1_2?adgrpid=87462064468&gclid=CjwKCAiAv_KMBhAzEiwAs-rX1BYz68IHnRFlo5yzoruCFo1OaFRxXMlshEmgBoEL382UUsUD0l8ncBoCb3oQAvD_BwE&hvadid=386812007656&hvdev=c&hvlocphy=1005495&hvnetw=g&hvqmt=e&hvrand=12016597410879480503&hvtargid=kwd-300246656570&hydadcr=13809_1830130&keywords=seagate%2Bbarracuda%2B1000gb&qid=1637655816&sr=8-2&th=1'),
(2, 'A400', 'Kingston', 'SSD', 480, 'SATA', '2.5', 48, 'images/piezas/kingston-a400.png', 'https://www.kingston.com/spain/es/ssd/a400-solid-state-drive', 'https://www.pccomponentes.com/kingston-a400-ssd-480gb', 'https://www.coolmod.com/kingston-ssdnow-a400-480gb-25-sata3-disco-ssd/', 'https://www.amazon.es/Kingston-SSD-A400-Disco-s%C3%B3lido/dp/B01N0TQPQB/ref=sr_1_1?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&keywords=Kingston+A400+480&qid=1637655923&s=computers&sr=1-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes_alimentacion`
--

CREATE TABLE `fuentes_alimentacion` (
  `ID_FUENTE` int(11) NOT NULL,
  `MODELO` varchar(50) NOT NULL,
  `MARCA` varchar(50) NOT NULL,
  `POTENCIA` int(11) NOT NULL,
  `CERTIFICADO` varchar(50) DEFAULT NULL,
  `FORMATO_FORMA` varchar(50) NOT NULL,
  `MODULAR` bit(1) NOT NULL,
  `PRECIO` int(11) NOT NULL,
  `RUTA_IMAGEN` varchar(500) DEFAULT NULL,
  `LINK_FABRICANTE` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_1` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_2` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_3` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fuentes_alimentacion`
--

INSERT INTO `fuentes_alimentacion` (`ID_FUENTE`, `MODELO`, `MARCA`, `POTENCIA`, `CERTIFICADO`, `FORMATO_FORMA`, `MODULAR`, `PRECIO`, `RUTA_IMAGEN`, `LINK_FABRICANTE`, `LINK_COMPRA_1`, `LINK_COMPRA_2`, `LINK_COMPRA_3`) VALUES
(1, 'RM Series RM850', 'Corsair', 850, 'Gold', 'ATX', b'1', 165, 'images/piezas/corsair-rm-series-rm850-850w-80-plus-gold-full-modular.png', 'https://www.corsair.com/es/es/Categor%C3%ADas/Productos/Unidades-de-fuentes-de-alimentaci%C3%B3n/rm-series-config/p/CP-9020056-NA', 'https://www.pccomponentes.com/corsair-rm850-850w-80-plus-gold-full-modular', 'https://www.coolmod.com/corsair-rm-series-rm850-2021-80-plus-gold-850w-modular-fuente-psu/', 'https://www.amazon.es/Corsair-RM850-Alimentaci%C3%B3n-Totalmente-CP-9020196-EU/dp/B07S3X7QV7'),
(2, 'Toughpower iRGB Plus', 'Thermaltake', 1000, 'Gold', 'ATX', b'1', 190, 'images/piezas/thermaltake-irgb-1000.png', 'https://es.thermaltake.com/toughpower-irgb-plus-1000w-gold-tt-premium-edition.html', 'https://www.pccomponentes.com/thermaltake-toughpower-irgb-plus-1000w-80-plus-gold-full-modular', NULL, 'https://www.amazon.es/Thermaltake-toughpower-irgb-Plus-1000w/dp/B07NPTL5LJ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obrex_users`
--

CREATE TABLE `obrex_users` (
  `ID_USERS` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CONTRA` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `obrex_users`
--

INSERT INTO `obrex_users` (`ID_USERS`, `NOMBRE`, `APELLIDOS`, `EMAIL`, `CONTRA`) VALUES
(86, 'b', 'b', 'b@b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `placas_base`
--

CREATE TABLE `placas_base` (
  `IDPLACA` int(11) NOT NULL,
  `MODELO` varchar(50) NOT NULL,
  `MARCA` varchar(50) NOT NULL,
  `FORMATO_FORMA` varchar(50) NOT NULL,
  `SOCKET` varchar(50) NOT NULL,
  `M2` bit(1) NOT NULL DEFAULT b'0',
  `TIPO_RAM` varchar(50) NOT NULL,
  `RAM_MAXIMA` int(11) NOT NULL,
  `VELOCIDAD_RAM_MAXIMA` varchar(50) NOT NULL,
  `PRECIO` double NOT NULL,
  `RUTA_IMAGEN` varchar(500) DEFAULT NULL,
  `LINK_FABRICANTE` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_1` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_2` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_3` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `placas_base`
--

INSERT INTO `placas_base` (`IDPLACA`, `MODELO`, `MARCA`, `FORMATO_FORMA`, `SOCKET`, `M2`, `TIPO_RAM`, `RAM_MAXIMA`, `VELOCIDAD_RAM_MAXIMA`, `PRECIO`, `RUTA_IMAGEN`, `LINK_FABRICANTE`, `LINK_COMPRA_1`, `LINK_COMPRA_2`, `LINK_COMPRA_3`) VALUES
(1, 'Z490 A', 'MSI', 'ATX', 'LGA1200', b'1', 'DDR4', 128, '4000', 159, 'images/piezas/msi-z490-a-pro.png', 'https://es.msi.com/Motherboard/Z490-A-PRO', 'https://www.pccomponentes.com/msi-z490-a-pro', 'https://www.coolmod.com/msi-z490-a-pro-socket-1200-placa-base/', 'https://www.amazon.es/MSI-Z490-PRO-Socket-Ranura/dp/B0886R2VJW'),
(2, 'TUF GAMING B550 PLUS', 'Asus', 'ATX', 'AM4', b'1', 'DDR4', 128, '3200', 150, 'images/piezas/tuf-gaming-b550-plus.png', 'https://www.asus.com/es/Motherboards-Components/Motherboards/TUF-Gaming/TUF-GAMING-B550-PLUS/', 'https://www.pccomponentes.com/asus-tuf-gaming-b550-plus', 'https://www.coolmod.com/asus-tuf-gaming-b550-plus-wi-fi-socket-am4-placa-base/', 'https://www.amazon.es/ASUS-TUF-GAMING-B550-PLUS-iluminaci%C3%B3n/dp/B089HG351D/ref=asc_df_B089HG351D/?tag=googshopes-21&linkCode=df0&hvadid=420335591921&hvpos=&hvnetw=g&hvrand=230340234865650551&hvpone=&hvptwo=&hvqmt=&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=1005495&hvtargid=pla-923549102638&psc=1&tag=&ref=&adgrpid=98816205049&hvpone=&hvptwo=&hvadid=420335591921&hvpos=&hvnetw=g&hvrand=230340234865650551&hvqmt=&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=1005495&hvtargid=pla-923549102638');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `ID_PRESUPUESTOS` int(11) NOT NULL,
  `ID_USUARIOS` int(11) NOT NULL,
  `TORRE_P` varchar(500) NOT NULL,
  `PLACA_P` varchar(500) NOT NULL,
  `PROCESADOR_P` varchar(500) NOT NULL,
  `VENTPROCESADOR_P` varchar(500) NOT NULL,
  `RAM_P` varchar(500) NOT NULL,
  `GRAFICA_P` varchar(500) NOT NULL,
  `FUENTEALIM_P` varchar(500) NOT NULL,
  `DISCO_P` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `presupuestos`
--

INSERT INTO `presupuestos` (`ID_PRESUPUESTOS`, `ID_USUARIOS`, `TORRE_P`, `PLACA_P`, `PROCESADOR_P`, `VENTPROCESADOR_P`, `RAM_P`, `GRAFICA_P`, `FUENTEALIM_P`, `DISCO_P`) VALUES
(29, 86, 'Nfortec|Draco V2|80|https://www.pccomponentes.com/nfortec-draco-v2-cristal-templado-usb-30-rgb-negra', 'Asus|TUF GAMING B550 PLUS|150|https://www.pccomponentes.com/asus-tuf-gaming-b550-plus', 'AMD|Ryzen 5 5600X|300|https://www.pccomponentes.com/amd-ryzen-5-5600x-37ghz', 'Cooler Master|Hyper 212|50^https://www.pccomponentes.com/cooler|https://www.pccomponentes.com/cooler-master-hyper-212-rgb-black-edition', 'Kingston|HyperX Renegade|156^https://www.pccomponentes.com/kingston|https://www.pccomponentes.com/kingston-hyperx-ddr4-4000mhz-16gb-2x8gb-cl19', 'MSI|RTX 3070 Gaming Z Trio|950|https://www.pccomponentes.com/msi-geforce-rtx-3070-gaming-z-trio-lhr-8gb-gddr6', 'Thermaltake|Toughpower iRGB Plus|190^https://www.pccomponentes.com/thermaltake|https://www.pccomponentes.com/thermaltake-toughpower-irgb-plus-1000w-80-plus-gold-full-modular', 'Kingston|A400|48^https://www.pccomponentes.com/kingston|https://www.pccomponentes.com/kingston-a400-ssd-480gb'),
(30, 86, 'Nfortec|Draco V2|80|https://www.pccomponentes.com/nfortec-draco-v2-cristal-templado-usb-30-rgb-negra', 'Asus|TUF GAMING B550 PLUS|150|https://www.pccomponentes.com/asus-tuf-gaming-b550-plus', 'AMD|Ryzen 5 5600X|300|https://www.pccomponentes.com/amd-ryzen-5-5600x-37ghz', 'Cooler Master|Hyper 212|50^https://www.pccomponentes.com/cooler|https://www.pccomponentes.com/cooler-master-hyper-212-rgb-black-edition', 'Kingston|HyperX Renegade|156^https://www.pccomponentes.com/kingston|https://www.pccomponentes.com/kingston-hyperx-ddr4-4000mhz-16gb-2x8gb-cl19', 'MSI|RTX 3070 Gaming Z Trio|950|https://www.pccomponentes.com/msi-geforce-rtx-3070-gaming-z-trio-lhr-8gb-gddr6', 'Thermaltake|Toughpower iRGB Plus|190^https://www.pccomponentes.com/thermaltake|https://www.pccomponentes.com/thermaltake-toughpower-irgb-plus-1000w-80-plus-gold-full-modular', 'Seagate|BarraCuda|37^https://www.pccomponentes.com/seagate|https://www.pccomponentes.com/seagate-barracuda-35-1tb-sata3'),
(33, 86, 'Nfortec|Draco V2|80|https://www.pccomponentes.com/nfortec-draco-v2-cristal-templado-usb-30-rgb-negra', 'Asus|TUF GAMING B550 PLUS|150|https://www.pccomponentes.com/asus-tuf-gaming-b550-plus', 'AMD|Ryzen 5 5600X|300|https://www.pccomponentes.com/amd-ryzen-5-5600x-37ghz', 'Cooler Master|Hyper 212|50^https://www.pccomponentes.com/cooler|https://www.pccomponentes.com/cooler-master-hyper-212-rgb-black-edition', 'Kingston|HyperX Renegade|156^https://www.pccomponentes.com/kingston|https://www.pccomponentes.com/kingston-hyperx-ddr4-4000mhz-16gb-2x8gb-cl19', 'Gigabyte|Radeon RX 6700 XT OC|982|https://www.pccomponentes.com/gigabyte-radeon-rx-6900-xt-gaming-oc-16gb-gddr6', 'Corsair|RM Series RM850|165^https://www.pccomponentes.com/corsair|https://www.pccomponentes.com/corsair-rm850-850w-80-plus-gold-full-modular', 'Kingston|A400|48^https://www.pccomponentes.com/kingston|https://www.pccomponentes.com/kingston-a400-ssd-480gb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesadores`
--

CREATE TABLE `procesadores` (
  `IDPROCESADOR` int(11) NOT NULL,
  `MODELO` varchar(50) NOT NULL,
  `MARCA` varchar(50) NOT NULL,
  `SOCKET` varchar(50) NOT NULL,
  `NUCLEOS` int(11) NOT NULL,
  `HYPERTHREADING` bit(1) NOT NULL DEFAULT b'0',
  `SUMINISTRO_MINIMO` int(11) NOT NULL,
  `TIPO_RAM` varchar(50) NOT NULL,
  `VELOCIDAD_RAM` int(11) NOT NULL,
  `PRECIO` double NOT NULL,
  `RUTA_IMAGEN` varchar(500) DEFAULT NULL,
  `LINK_FABRICANTE` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_1` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_2` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_3` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procesadores`
--

INSERT INTO `procesadores` (`IDPROCESADOR`, `MODELO`, `MARCA`, `SOCKET`, `NUCLEOS`, `HYPERTHREADING`, `SUMINISTRO_MINIMO`, `TIPO_RAM`, `VELOCIDAD_RAM`, `PRECIO`, `RUTA_IMAGEN`, `LINK_FABRICANTE`, `LINK_COMPRA_1`, `LINK_COMPRA_2`, `LINK_COMPRA_3`) VALUES
(1, 'i5 10400', 'Intel', 'LGA1200', 6, b'1', 65, 'DDR4', 2666, 180, 'images\\piezas\\intel-core-gen.png', 'https://ark.intel.com/content/www/es/es/ark/products/199271/intel-core-i5-10400-processor-12m-cache-up-to-4-30-ghz.html', 'https://www.pccomponentes.com/intel-core-i5-10400-290-ghz', 'https://www.coolmod.com/intel-core-i5-10400-43-ghz-socket-1200-boxed-procesador/', 'https://www.amazon.es/Intel-Core-i5-10400-Procesador-LGA1200/dp/B0883NPQST?th=1'),
(2, 'Ryzen 5 5600X', 'AMD', 'AM4', 6, b'1', 65, 'DDR4', 3200, 300, 'images\\piezas\\amd-ryzen-gen.png', 'https://www.amd.com/es/products/cpu/amd-ryzen-5-5600x', 'https://www.pccomponentes.com/amd-ryzen-5-5600x-37ghz', 'https://www.coolmod.com/amd-ryzen-5-5600x-46ghz-socket-am4-boxed-procesador/', 'https://www.amazon.es/AMD-Ryzen-5-5600X-Box/dp/B08166SLDF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ram`
--

CREATE TABLE `ram` (
  `IDRAM` int(11) NOT NULL,
  `MODELO` varchar(50) NOT NULL,
  `MARCA` varchar(50) NOT NULL,
  `TIPO_RAM` varchar(50) NOT NULL,
  `TAMANO_RAM` int(11) NOT NULL,
  `VELOCIDAD_RAM` int(11) NOT NULL,
  `CL` int(11) NOT NULL,
  `UNIDADES` int(11) NOT NULL,
  `PRECIO` double NOT NULL,
  `RUTA_IMAGEN` varchar(500) DEFAULT NULL,
  `LINK_FABRICANTE` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_1` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_2` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_3` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ram`
--

INSERT INTO `ram` (`IDRAM`, `MODELO`, `MARCA`, `TIPO_RAM`, `TAMANO_RAM`, `VELOCIDAD_RAM`, `CL`, `UNIDADES`, `PRECIO`, `RUTA_IMAGEN`, `LINK_FABRICANTE`, `LINK_COMPRA_1`, `LINK_COMPRA_2`, `LINK_COMPRA_3`) VALUES
(1, 'FURY Beast', 'Kingston', 'DDR4', 8, 3200, 16, 2, 78, 'images/piezas/kingston-fury-beast-ddr4-3200-mhz-16gb-2x8gb.png', 'https://www.kingston.com/spain/es/memory/gaming/kingston-fury-beast-ddr4-memory', 'https://www.pccomponentes.com/kingston-fury-beast-ddr4-3200-mhz-16gb-2x8gb-cl16', 'https://www.coolmod.com/kingston-fury-beast-16gb-1x16-3200mhz-cl16-memoria-ram/', 'https://www.amazon.es/Kingston-Ordenadores-sobremesa-KF432C16BBAK2-16/dp/B097HNYMYR?th=1'),
(7, 'HyperX Renegade', 'Kingston', 'DDR4', 8, 4000, 19, 2, 156, 'images/piezas/kingston-hyperx-ddr4-4000mhz-16gb-2x8gb.png', 'https://www.kingston.com/spain/es/gaming/hyperx-predator-ddr4-rgb', 'https://www.pccomponentes.com/kingston-hyperx-ddr4-4000mhz-16gb-2x8gb-cl19', 'https://www.coolmod.com/hyperx-predator-16gb-2x8gb-4000mhz-pc4-32000-cl19-memoria-ddr4-81346/', 'https://www.amazon.es/Kingston-Renegade-Ordenadores-sobremesa-KF440C19RBA/dp/B097TRY3N9/ref=sr_1_2?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&keywords=Kingston%2BFURY%2BRenegade%2B4000&qid=1637658059&s=computers&sr=1-2&th=1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas_graficas`
--

CREATE TABLE `tarjetas_graficas` (
  `ID_GRAFICA` int(11) NOT NULL,
  `MODELO` varchar(50) NOT NULL,
  `MARCA` varchar(50) NOT NULL,
  `VRAM` int(11) NOT NULL,
  `VELOCIDAD_RELOJ` int(11) NOT NULL,
  `SUMINISTRO_MINIMO` int(11) NOT NULL,
  `PROFUNDIDAD` int(11) NOT NULL,
  `PRECIO` double NOT NULL,
  `RUTA_IMAGEN` varchar(500) DEFAULT NULL,
  `LINK_FABRICANTE` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_1` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_2` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_3` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarjetas_graficas`
--

INSERT INTO `tarjetas_graficas` (`ID_GRAFICA`, `MODELO`, `MARCA`, `VRAM`, `VELOCIDAD_RELOJ`, `SUMINISTRO_MINIMO`, `PROFUNDIDAD`, `PRECIO`, `RUTA_IMAGEN`, `LINK_FABRICANTE`, `LINK_COMPRA_1`, `LINK_COMPRA_2`, `LINK_COMPRA_3`) VALUES
(1, 'RTX 3070 Gaming Z Trio', 'MSI', 8, 1845, 240, 323, 950, 'images/piezas/msi-geforce-rtx-3070-gaming-z-trio-8gb.png', 'https://www.msi.com/Graphics-Card/GeForce-RTX-3070-GAMING-Z-TRIO', 'https://www.pccomponentes.com/msi-geforce-rtx-3070-gaming-z-trio-lhr-8gb-gddr6', 'https://www.coolmod.com/msi-geforce-rtx-3070-gaming-z-trio-lhr-8gb-gddr6-tarjeta-grafica/', 'https://www.amazon.es/MSI-Gaming-Tarjeta-gr%C3%A1fica-GeForce/dp/B0957X5T3S'),
(2, 'Radeon RX 6700 XT OC', 'Gigabyte', 12, 2622, 230, 281, 982, 'images/piezas/gigabyte-amd-radeon-rx-6700-xt-gaming-oc-12gb.png', 'https://www.gigabyte.com/es/Graphics-Card/GV-R67XTGAMING-OC-12GD', 'https://www.pccomponentes.com/gigabyte-radeon-rx-6900-xt-gaming-oc-16gb-gddr6', 'https://www.coolmod.com/gigabyte-radeon-rx-6700-xt-gaming-oc-12-gb-gddr6-tarjeta-grafica/', 'https://www.amazon.es/Gigabyte-Technology-Radeon-Gaming-GV-R67XTGAMINGOC-12GD/dp/B08Y746XN7/ref=sr_1_1?adgrpid=121776509484&gclid=CjwKCAiAv_KMBhAzEiwAs-rX1G7ZOq0f7TBWOKN9AM4yNErWlyZ366FmAYh1n20QwezbvKUU6Cnr6RoCpQcQAvD_BwE&hvadid=510462251165&hvdev=c&hvlocphy=1005495&hvnetw=g&hvqmt=b&hvrand=11657615576574792770&hvtargid=kwd-1219779956109&hydadcr=3221_1809154&keywords=gigabyte+6700+xt&qid=1637658231&sr=8-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torres`
--

CREATE TABLE `torres` (
  `ID_TORRE` int(11) NOT NULL,
  `MODELO` varchar(50) NOT NULL,
  `MARCA` varchar(50) NOT NULL,
  `FORMATO_FORMA` varchar(50) NOT NULL,
  `LARGO` double NOT NULL,
  `ANCHO` double NOT NULL,
  `ALTO` double NOT NULL,
  `PRECIO` double NOT NULL,
  `RUTA_IMAGEN` varchar(500) DEFAULT NULL,
  `LINK_FABRICANTE` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_1` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_2` varchar(500) DEFAULT NULL,
  `LINK_COMPRA_3` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `torres`
--

INSERT INTO `torres` (`ID_TORRE`, `MODELO`, `MARCA`, `FORMATO_FORMA`, `LARGO`, `ANCHO`, `ALTO`, `PRECIO`, `RUTA_IMAGEN`, `LINK_FABRICANTE`, `LINK_COMPRA_1`, `LINK_COMPRA_2`, `LINK_COMPRA_3`) VALUES
(1, 'Draco V2', 'Nfortec', 'ATX', 435, 201, 435, 80, 'images\\piezas\\nfortec_draco_v2.png', 'https://www.nfortec.com/nfortec-draco-v2', 'https://www.pccomponentes.com/nfortec-draco-v2-cristal-templado-usb-30-rgb-negra', NULL, 'https://www.amazon.es/Nfortec-Templado-Ventiladores-Controlador-Inal%C3%A1mbrico/dp/B07NM15BCZ?th=1'),
(2, 'Soul Cristal', 'Tempest', 'ATX', 335, 200, 440, 40, 'images\\piezas\\tempest-soul-cristal.png', 'https://www.tempestofficial.com/inicio/26-tempest-atx-case-rgb-soul.html', 'https://www.pccomponentes.com/tempest-atx-case-rgb-soul-cristal-templado-usb-30', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coolers_procesador`
--
ALTER TABLE `coolers_procesador`
  ADD PRIMARY KEY (`ID_COOLER`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`ID_DISCO`);

--
-- Indices de la tabla `fuentes_alimentacion`
--
ALTER TABLE `fuentes_alimentacion`
  ADD PRIMARY KEY (`ID_FUENTE`);

--
-- Indices de la tabla `obrex_users`
--
ALTER TABLE `obrex_users`
  ADD PRIMARY KEY (`ID_USERS`);

--
-- Indices de la tabla `placas_base`
--
ALTER TABLE `placas_base`
  ADD PRIMARY KEY (`IDPLACA`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`ID_PRESUPUESTOS`);

--
-- Indices de la tabla `procesadores`
--
ALTER TABLE `procesadores`
  ADD PRIMARY KEY (`IDPROCESADOR`),
  ADD KEY `fk_SOCKET_idx` (`SOCKET`),
  ADD KEY `fk_tipo_ram_idx` (`TIPO_RAM`),
  ADD KEY `fk_velocidad_ram_idx` (`VELOCIDAD_RAM`);

--
-- Indices de la tabla `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`IDRAM`);

--
-- Indices de la tabla `tarjetas_graficas`
--
ALTER TABLE `tarjetas_graficas`
  ADD PRIMARY KEY (`ID_GRAFICA`);

--
-- Indices de la tabla `torres`
--
ALTER TABLE `torres`
  ADD PRIMARY KEY (`ID_TORRE`),
  ADD KEY `fk_formato_forma_idx` (`FORMATO_FORMA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coolers_procesador`
--
ALTER TABLE `coolers_procesador`
  MODIFY `ID_COOLER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `ID_DISCO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fuentes_alimentacion`
--
ALTER TABLE `fuentes_alimentacion`
  MODIFY `ID_FUENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `obrex_users`
--
ALTER TABLE `obrex_users`
  MODIFY `ID_USERS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `placas_base`
--
ALTER TABLE `placas_base`
  MODIFY `IDPLACA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  MODIFY `ID_PRESUPUESTOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `procesadores`
--
ALTER TABLE `procesadores`
  MODIFY `IDPROCESADOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ram`
--
ALTER TABLE `ram`
  MODIFY `IDRAM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tarjetas_graficas`
--
ALTER TABLE `tarjetas_graficas`
  MODIFY `ID_GRAFICA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `torres`
--
ALTER TABLE `torres`
  MODIFY `ID_TORRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
