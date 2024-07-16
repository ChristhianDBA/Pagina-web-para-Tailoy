-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2024 a las 00:42:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tailoydbyes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `id_administracion` int(11) NOT NULL,
  `Correo` varchar(255) DEFAULT NULL,
  `Contraseña` varchar(255) DEFAULT NULL,
  `NombreCompleto` varchar(255) DEFAULT NULL,
  `TipoUsuario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`id_administracion`, `Correo`, `Contraseña`, `NombreCompleto`, `TipoUsuario`) VALUES
(1, 'rmeza@tailoy.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Roy Meza Taipe', 'Administrador'),
(17, 'Danielle@NewJeans.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Danielle Marsh', 'Analista'),
(18, 'Aless@tailoy.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Roberto Angeles', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id_detalle` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `id_Productos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`id_detalle`, `idVenta`, `id_Productos`, `cantidad`, `precio_unitario`, `subtotal`) VALUES
(1, 38, 100, 3, 79.20, 237.60),
(2, 39, 100, 3, 79.20, 237.60),
(7, 42, 26, 2, 119.90, 239.80),
(8, 42, 100, 1, 79.20, 79.20),
(9, 43, 98, 2, 5.60, 11.20),
(10, 43, 50, 2, 56.80, 113.60),
(11, 44, 36, 2, 4.10, 8.20),
(12, 45, 84, 3, 37.90, 113.70),
(13, 45, 46, 2, 6.40, 12.80),
(14, 45, 26, 1, 119.90, 119.90),
(15, 46, 1, 3, 25.90, 77.70),
(16, 47, 82, 1, 80.00, 80.00),
(17, 47, 97, 12, 9.80, 117.60),
(21, 49, 83, 2, 43.50, 87.00),
(22, 49, 38, 1, 4.20, 4.20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_Productos` int(11) NOT NULL,
  `NombreProducto` varchar(200) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Caracteristicas` varchar(500) NOT NULL,
  `Categoria` varchar(100) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `PrecioNormal` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) NOT NULL,
  `imglink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_Productos`, `NombreProducto`, `Marca`, `Descripcion`, `Caracteristicas`, `Categoria`, `Precio`, `PrecioNormal`, `Stock`, `imglink`) VALUES
(1, 'Sets de acuarelas', 'WINSOR & NEWTON', 'Set profesional de acuarelas Winsor & Newton, conocidas por su alta calidad y pigmentación. Incluye una gama amplia de colores brillantes y duraderos, ideales para artistas que buscan resultados vibrantes y precisos en sus obras.', 'Pigmentación intensa, colores brillantes y duraderos, alta calidad profesional.', 'Promociones Arte', 25.90, 42.90, 26, 'https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/06+05/arte/carrusel-1.png'),
(2, 'Caballete de madera', 'CONDA', 'Caballete de madera Conda, robusto y ajustable, diseñado para sostener lienzos de diferentes tamaños con estabilidad. Perfecto para estudios y talleres de arte, proporciona la inclinación y soporte necesarios para trabajar cómodamente en diferentes técnicas artísticas.', 'Robusto, ajustable, soporta lienzos de diversos tamaños, ideal para estudios y talleres.', 'Promociones Arte', 129.90, 169.90, 3, 'https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/06+05/arte/carrusel-2.png'),
(3, 'Óleos', 'WINSOR & NEWTON', 'Pinturas al óleo Winsor & Newton, reconocidas por su consistencia cremosa y pigmentación intensa. Ideales para artistas profesionales que buscan colores duraderos y mezclas suaves, aptas para una amplia variedad de estilos y técnicas de pintura.', 'Consistencia cremosa, pigmentación intensa, mezclas suaves y duraderas.', 'Promociones Arte', 149.90, 299.90, 15, 'https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/06+05/arte/carrusel-5.png'),
(4, 'Rotulador plit artist', 'FABERCASTELL', 'Rotulador Pitt Artist de Faber-Castell, con tinta pigmentada permanente. Ofrece colores intensos y resistencia al agua, perfecto para dibujos detallados, ilustraciones y lettering artístico que requieren precisión y durabilidad en los trazos.', 'Tinta pigmentada permanente, colores intensos, resistente al agua, ideal para dibujo detallado y lettering.', 'Promociones Arte', 8.90, 10.90, 10, 'https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/06+05/arte/carrusel-7.png'),
(24, 'Calculadora científica casio FX-991LA CW', 'CASIO', 'Calculadora científica Casio FX-991LA CW, con funciones avanzadas matemáticas, estadísticas e ingenieriles. Ideal para estudiantes y profesionales que necesitan realizar cálculos complejos con precisión y rapidez en diversas áreas académicas y profesionales.', 'Funciones avanzadas matemáticas, estadísticas e ingenieriles, pantalla de alta resolución, fácil de usar.', 'Calculadoras', 129.90, 129.90, 21, 'https://www.casio.com/content/dam/casio/product-info/locales/br/pt-br/calc/product/scientific/F/FX/FX9/fx-991lacw/assets/fx-991LA-CW_case.png.transform/main-visual-sp/image.png'),
(25, 'Calculadora científica casio FX-82LA CW', 'CASIO', 'Calculadora científica Casio FX-82LA CW, compacta y versátil. Ofrece funciones esenciales para cálculos matemáticos y científicos básicos, adecuada para estudiantes de nivel medio y superior que requieren una herramienta confiable y fácil de usar para sus estudios.', 'Compacta, funciones esenciales para cálculos matemáticos y científicos básicos, diseño ergonómico y portátil.', 'Calculadoras', 74.90, 74.90, 20, 'https://www.casio.com/content/dam/casio/product-info/locales/br/pt-br/calc/product/scientific/F/FX/FX8/fx-82lacw/assets/fx-82LA-CW_case_.png.transform/main-visual-sp/image.png'),
(26, 'Calculadora Científica Casio Fx-570LA CW', 'CASIO', 'La calculadora científica Casio Fx-570LA CW es una herramienta avanzada ideal para estudiantes y profesionales. Ofrece una pantalla de alta resolución para una visualización clara de ecuaciones y resultados. Con más de 400 funciones, es perfecta para matemáticas, estadística, álgebra y cálculo. Su diseño compacto y ergonómico facilita su uso y transporte.', 'Pantalla de alta resolución, más de 400 funciones, adecuada para matemáticas, estadística, álgebra y cálculo, diseño compacto y ergonómico.', 'Calculadoras', 119.90, 119.90, 29, 'https://www.casio.com/content/dam/casio/product-info/locales/latin/es-ar/calc/product/scientific/F/FX/FX5/fx-570lacw/assets/fx-570LA-CW_case.png.transform/main-visual-sp/image.png'),
(28, 'Acuarelas Aquafine X 60 Und', 'DALLER ROWNEY', 'Las acuarelas Aquafine X 60 Und de Daler Rowney son reconocidas por su calidad y versatilidad. Este set incluye 60 colores vibrantes y duraderos, ideales para artistas de todos los niveles. Formuladas con pigmentos finamente molidos, ofrecen excelente transparencia y luminosidad en cada aplicación, permitiendo explorar una amplia gama de técnicas de acuarela con resultados profesionales.', 'Paleta de 60 colores vibrantes, pigmentos finamente molidos para transparencia y luminosidad, adecuadas para artistas de todos los niveles, versátiles y duraderas para diversas técnicas de acuarela.', 'Nuevo', 97.90, 149.90, 40, 'https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/13+05/arte/carrusel-1.png'),
(29, 'Sketchbook Canson A4', 'CANSON', 'El Sketchbook Canson A4 es un cuaderno de dibujo de alta calidad, fabricado por Canson, conocido por su papel grueso y resistente ideal para técnicas secas y húmedas. Su tamaño A4 ofrece un espacio cómodo para dibujar y tomar notas, siendo perfecto para artistas y estudiantes que buscan practicar o desarrollar sus habilidades artísticas en un formato portátil y duradero.', 'Papel de alta calidad, grueso y resistente, tamaño A4 adecuado para dibujo y notas, ideal para técnicas secas y húmedas, perfecto para artistas y estudiantes.', 'Nuevo', 36.90, 69.90, 30, 'https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/13+05/arte/carrusel-4.png'),
(30, 'Marcadores Artiliné X 24 Und', 'ARTILINÉ', 'Los Marcadores Artiliné X 24 Und son ideales para dibujo y diseño. Este set incluye 24 colores vibrantes y duraderos, perfectos para artistas y diseñadores que buscan precisión y versatilidad en sus proyectos creativos. Están diseñados con puntas finas que permiten trazos precisos y detallados, ofreciendo una excelente cobertura de color en superficies variadas.', 'Set de 24 marcadores, colores vibrantes y duraderos, puntas finas para trazos precisos, ideal para dibujo y diseño, adecuados para artistas y diseñadores creativos.', 'Nuevo', 71.90, 101.90, 30, 'https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/13+05/arte/carrusel-3.png'),
(31, 'Rotuladores Polychromos Faber-Castell X 24 Und', 'FABERCASTELL', 'Los Rotuladores Polychromos de Faber-Castell son conocidos por su calidad y versatilidad. Este set incluye 24 colores intensos y duraderos, ideales para ilustraciones, diseño gráfico y bocetos. Con puntas de precisión y tintas de alta calidad, ofrecen una excelente cobertura y mezcla de colores, siendo perfectos para artistas que buscan resultados profesionales en sus trabajos creativos.', 'Set de 24 rotuladores, colores intensos y duraderos, puntas de precisión para detalles finos, adecuados para ilustraciones y diseño gráfico, tintas de alta calidad para mezcla y cobertura óptima.', 'Nuevo', 67.90, 87.90, 50, 'https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/13+05/arte/carrusel-8.png'),
(33, 'CUADERNO ANILLADO CUADRICULADO MINERVA A5 DISEÑO MUJER 150 HOJAS', 'MINERVA', ' El Cuaderno Anillado Cuadriculado Minerva A5 está diseñado con un diseño específico para mujeres, ofreciendo un estilo único y personalizado. Con 150 hojas cuadriculadas, proporciona un espacio amplio para tomar notas, realizar esquemas o dibujar de manera organizada y eficiente. Su formato A5 lo hace fácil de transportar y usar en cualquier lugar, siendo ideal para uso personal, académico o profesional.', 'Cuaderno anillado con diseño para mujeres, tamaño A5, 150 hojas cuadriculadas para organización, adecuado para notas y esquemas, portátil y versátil para uso diario.', 'Cuadernos y Blocks', 23.00, 25.00, 30, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuaderno-anillado-cuadriculado-minerva-a5-diseno-mujer-150-hojas-33819-default-1.jpg'),
(34, 'BLOCK BITÁCORA ANILLADO OXFORD A3 90 G 90 HOJAS', 'OXFORD', 'El Block Bitácora Anillado Oxford A3 está diseñado para ser un cuaderno robusto y funcional. Con 90 hojas de papel de 90g/m², ofrece una superficie suave y resistente que es ideal para el dibujo, la escritura y otras aplicaciones artísticas. Su formato A3 proporciona un espacio amplio para esbozos detallados y proyectos artísticos de mayor escala, siendo adecuado para uso profesional y creativo.', 'Block bitácora anillado, tamaño A3, papel de 90g/m² resistente y suave, ideal para dibujo y escritura, adecuado para proyectos artísticos de mayor escala, robusto y funcional para uso profesional y creativo.', 'Cuadernos y Blocks', 27.00, 35.00, 20, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-bitacora-a3-90-hojas-90gr-anillado-5000058-default-1.jpg'),
(35, 'BLOCK PAPEL LUSTRE FABER CASTELL 90 G 48.5 X 31 CM 20 HOJAS', 'FABER CASTELL', 'El Block Papel Lustre de Faber-Castell está diseñado con papel de alta calidad de 90g/m², conocido por su suavidad y resistencia. Con un tamaño de 48.5 x 31 cm y 20 hojas por block, este papel es ideal para dibujar, pintar con acuarelas o realizar proyectos de manualidades. Es adecuado tanto para artistas aficionados como para profesionales que requieren un soporte duradero y versátil para sus creaciones.', 'Block de papel lustre, tamaño 48.5 x 31 cm, papel de 90g/m² suave y resistente, ideal para dibujo, acuarelas y manualidades, adecuado para artistas aficionados y profesionales, proporciona un soporte duradero y versátil para proyectos creativos.', 'Cuadernos y Blocks', 19.20, 25.00, 30, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-papel-lustre-20h-faber-485x31cm-90gr-8522-default-1.jpg'),
(36, 'BLOCK CUADRICULADO JUSTUS A4 50 HOJAS 5 PERFORACIONESBLOCK CUADRICULADO JUSTUS A4 50 HOJAS 5 PERFORACIONES', 'JUSTUS', 'El Block Cuadriculado Justus A4 está diseñado para facilitar la organización y la escritura. Con cuadrícula en cada página, es ideal para tomar notas, realizar cálculos o hacer esquemas de manera ordenada y precisa. Tiene un formato estándar A4, que proporciona suficiente espacio para escribir cómodamente, siendo útil tanto para estudiantes como para profesionales en entornos académicos o de trabajo.', 'Block cuadriculado, tamaño A4, 50 hojas por block, 5 perforaciones para fácil almacenamiento, ideal para tomar notas y realizar cálculos, adecuado para estudiantes y profesionales, facilita la organización y la escritura ordenada.', 'Cuadernos y Blocks', 4.10, 7.00, 48, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-a4-50-hojas-cuadriculado-diseno-justus-15692001-default-1.jpg'),
(37, 'CUADERNO ANILLADO CUADRICULADO MINERVA A4 150 HOJAS TAPA DURA', 'MINERVA', 'El Cuaderno Anillado Cuadriculado Minerva A4 está diseñado con tapa dura para mayor durabilidad y protección. Con 150 hojas cuadriculadas, ofrece un espacio amplio y organizado para tomar notas, realizar diagramas o dibujar de manera precisa y ordenada. Su formato A4 lo hace ideal para estudiantes y profesionales que necesitan un cuaderno robusto y funcional para el trabajo diario o proyectos académicos.', 'Cuaderno anillado con tapa dura, tamaño A4, 150 hojas cuadriculadas para organización, adecuado para notas y diagramas, resistente y duradero, ideal para estudiantes y profesionales.', 'Cuadernos y Blocks', 33.50, 37.50, 20, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuaderno-anillado-cuadriculado-minerva-a4-150-hojas-tapa-dura-64413-default-1.jpg'),
(38, 'CUADERNO DELUXE CUADRICULADO JUSTUS A4 SÓLIDO ROJO 80 HOJAS', 'JUSTUS', 'El Cuaderno Deluxe Cuadriculado Justus A4 está diseñado con una cubierta sólida de color rojo para mayor elegancia y durabilidad. Contiene 80 hojas cuadriculadas, proporcionando un espacio organizado y estructurado para escribir, hacer cálculos o dibujar de manera precisa. Su formato A4 es ideal para estudiantes y profesionales que buscan un cuaderno funcional y estético para uso diario o proyectos específicos.', 'Cuaderno cuadriculado, tamaño A4, 80 hojas, cubierta sólida de color rojo para durabilidad y estilo, adecuado para escritura, cálculos y dibujos precisos, ideal para estudiantes y profesionales que valoran la calidad y la presentación estética.', 'Cuadernos y Blocks', 4.20, 5.00, 14, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuaderno-deluxe-80h-cuadriculado-sol-rojo-justus-49534005-default-1.jpg'),
(39, 'CUADERNO DELUXE RAYADO LORO MONOCOLOR MARVEL ROJO 80 HOJAS', 'LORO', 'El Cuaderno Deluxe Rayado Loro Monocolor Marvel en color rojo es una opción elegante y funcional para tomar notas y organizar pensamientos. Con 80 hojas rayadas, ofrece un espacio estructurado para escribir de manera clara y ordenada. Su diseño monocolor y cubierta robusta lo hacen ideal para uso diario en entornos académicos o profesionales.', 'Cuaderno rayado, tamaño estándar, 80 hojas, cubierta monocolor roja para durabilidad y estilo, adecuado para tomar notas y escritura organizada, ideal para estudiantes y profesionales que prefieren un diseño sobrio y funcional.', 'Cuadernos y Blocks', 5.30, 6.50, 10, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuaderno-deluxe-80-hojas-rayado-monocolor-marvel-loro-rojo-57926007-default-1.jpg'),
(40, 'CUADERNO ANILLADO CUADRICULADO IRIS COLOR A4 DISEÑO CON LIGA 170 HOJAS', 'IRIS COLOR', 'El Cuaderno Anillado Cuadriculado Iris Color A4 combina funcionalidad con estilo gracias a su diseño con liga. Con 170 hojas cuadriculadas, proporciona un amplio espacio para tomar notas, hacer diagramas o dibujar de manera organizada. Su formato A4 y diseño con liga lo hacen ideal para estudiantes y profesionales que valoran la practicidad y la estética en un cuaderno de uso diario.', 'Cuaderno anillado cuadriculado, tamaño A4, diseño con liga para fácil manejo, 170 hojas para organización extensa, adecuado para notas, diagramas y dibujos, ideal para estudiantes y profesionales que buscan funcionalidad y estilo en sus herramientas de trabajo.', 'Cuadernos y Blocks', 26.00, 30.00, 16, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuaderno-anillado-cuadriculado-iris-color-a4-diseno-con-liga-170-hojas-8383-default-1.jpg'),
(41, 'BLOCK DRAGON A3 PAPEL LUSTRE 30 HOJAS', 'DRAGON', 'El Block Dragon A3 está diseñado con papel lustre, ideal para proyectos artísticos y técnicas de dibujo que requieren un soporte de calidad. Con un tamaño de A3, cada block contiene 30 hojas de papel resistente y suave, proporcionando una superficie adecuada para dibujar con detalle y precisión. Es ideal para artistas y estudiantes que necesitan un papel de alto rendimiento para expresar su creatividad.', 'Block de papel lustre, tamaño A3, 30 hojas por block, adecuado para técnicas de dibujo y proyectos artísticos, papel resistente y suave para dibujos detallados, ideal para artistas y estudiantes exigentes con la calidad de su material de trabajo.', 'Cuadernos y Blocks', 10.00, 15.00, 25, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-papel-lustre-a3-30h-dragon-17c-5000114-default-1.jpg'),
(42, 'BLOCK CARTULINA MACEDONIA', 'MACEDONIA', 'El Block de Cartulina Macedonia está compuesto por 20 hojas de cartulina de alta calidad, cada una de 170 gramos por metro cuadrado. Con un tamaño estándar de 23 x 32 cm, este block proporciona una superficie robusta y resistente ideal para proyectos artísticos y manualidades que requieren un soporte sólido y duradero. Es adecuado para diversas técnicas de dibujo, pintura y trabajos en papel donde se valoran la consistencia y la calidad del material.', 'Cartulina de 170 gramos por metro cuadrado, tamaño de 23 x 32 cm, 20 hojas por block, ideal para proyectos artísticos y manualidades, superficie robusta y resistente, perfecta para técnicas de dibujo y pintura.', 'Cuadernos y Blocks', 22.00, 27.00, 30, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-cartulina-macedonia-13293-default-1.jpg'),
(43, 'CUADERNO DELUXE TRIPLE RENGLÓN MINERVA MAGNUS SÓLIDO KIDS 80 HOJAS', 'MINERVA', 'El Cuaderno Deluxe Triple Renglón Minerva Magnus está diseñado con un estilo divertido y colorido para niños. Con una cubierta sólida que ofrece durabilidad, contiene 80 hojas de papel con triple renglón, ideal para estudiantes que están aprendiendo a escribir y practicar caligrafía. Este cuaderno proporciona un espacio organizado y estructurado para mejorar la escritura y la precisión en la formación de letras.', 'Cuaderno con triple renglón, diseñado para niños, cubierta sólida para mayor durabilidad, 80 hojas para práctica de escritura, ideal para mejorar la caligrafía, adecuado para estudiantes en etapa de aprendizaje de la escritura.', 'Cuadernos y Blocks', 6.50, 8.00, 10, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuad-dlx-80h-treng-sol-mag-kids-miner-az-66738002-default-1.jpg'),
(44, 'BLOCK ARCO IRIS OVE A4 25 HOJAS', 'OVE', 'El Block Arco Iris OVE A4 ofrece 25 hojas de papel con un diseño colorido y vibrante, ideal para proyectos creativos y artísticos. Cada hoja tiene un tamaño estándar A4 (21 x 29.7 cm), proporcionando una superficie versátil para dibujar, escribir o realizar manualidades. Este block es perfecto para artistas y estudiantes que buscan un papel que inspire creatividad y permita expresar ideas de manera colorida y atractiva.', 'Block de papel Arco Iris, tamaño A4 (21 x 29.7 cm), 25 hojas por block, diseño colorido y vibrante, ideal para proyectos creativos y artísticos, superficie versátil para dibujo, escritura y manualidades, adecuado para artistas y estudiantes que valoran la expresión visual y la creatividad en sus trabajos.', 'Cuadernos y Blocks', 5.00, 6.20, 10, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-arco-iris-a4-25h-ove-70g-46467-default-1.jpg'),
(45, 'CUADERNO ANILLADO CUADRICULADO LORO A4 160 HOJAS', 'LORO', 'El Cuaderno Anillado Cuadriculado Loro A4 ofrece 160 hojas cuadriculadas, proporcionando un amplio espacio para tomar notas, realizar cálculos o crear diagramas de manera ordenada y estructurada. Su formato A4 lo hace ideal para estudiantes y profesionales que necesitan un cuaderno robusto y funcional para el trabajo diario o proyectos académicos.', 'Cuaderno anillado cuadriculado, tamaño A4, 160 hojas, adecuado para tomar notas y realizar cálculos, ideal para estudiantes y profesionales, proporciona una organización eficiente y espacio suficiente para proyectos extensos.', 'Cuadernos y Blocks', 19.20, 25.00, 10, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuaderno-anillado-cuadriculado-loro-a4-160-hojas-49208-default-1.jpg'),
(46, 'CUADERNO MINERVA A4 DE MÚSICA 48 HOJAS SÓLIDO', 'MINERVA', 'El Cuaderno Minerva A4 de Música está diseñado específicamente para músicos y estudiantes de música. Con 48 hojas, cada una con pauta musical impresa, proporciona un espacio adecuado para componer, transcribir o estudiar partituras y notas musicales. Su cubierta sólida asegura durabilidad y protección para uso continuo en entornos académicos y creativos.', 'Cuaderno de música, tamaño A4, 48 hojas con pauta musical impresa, ideal para componer y estudiar música, cubierta sólida para protección y durabilidad, adecuado para músicos y estudiantes de música que necesitan un cuaderno especializado para sus prácticas y proyectos musicales.', 'Cuadernos y Blocks', 6.40, 8.00, 8, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuaderno-musica-minerva-a-4-60-hojas-solido-13292-default-1.jpg'),
(47, 'MARCADORES POSCA PC-3M BÁSICO ESTUCHE X 8 UND', 'POSCA', 'Los Marcadores Posca PC-3M son conocidos por su versatilidad y calidad en el marcado sobre diversas superficies. Este estuche contiene 8 marcadores en colores básicos, ideales para uso artístico, manualidades y marcado en general. Su punta fina de 0.9-1.3 mm permite trazos precisos y detallados, mientras que su tinta pigmentada es resistente al agua y se adhiere bien a papel, cartón, madera, metal y otros materiales.', 'stuche de 8 marcadores Posca PC-3M en colores básicos, punta fina de 0.9-1.3 mm para trazos precisos, tinta pigmentada resistente al agua y de secado rápido, adecuados para uso artístico, manualidades y marcado en diversas superficies como papel, cartón, madera y metal.', 'Dibujo', 67.90, 79.90, 13, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/e/s/estuche-de-marcadores-3m-8un-basico-posca-47986-default-1.jpg'),
(48, 'COLOR FABER CASTELL GOLDFABER ESTUCHE X 24 UND', 'FABER CASTELL', 'Los Colores Faber-Castell Goldfaber son conocidos por su calidad y pigmentación vibrante. Este estuche contiene 24 lápices de colores en una variedad de tonos, ideales para dibujo, ilustración y coloreado. Cada lápiz está elaborado con pigmentos de alta calidad que ofrecen una excelente cobertura y mezcla de colores sobre papel y cartulina. Son adecuados tanto para artistas principiantes como para profesionales que buscan resultados precisos y duraderos en sus obras.', 'Estuche de 24 lápices de colores Faber-Castell Goldfaber, pigmentos de alta calidad para colores vibrantes, ideales para dibujo, ilustración y coloreado, adecuados para uso sobre papel y cartulina, proporcionan excelente cobertura y mezcla de colores, recomendados para artistas de todos los niveles.', 'Dibujo', 49.00, 57.70, 19, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/o/color-x-24-goldfaber-estuche-cart-faber-castell-48232-default-1.jpg'),
(49, 'MARCADORES FABER CASTELL PITT ARTPEN TONOS PIEL CLARO SET X 6 UND', 'FABER CASTELL', 'Los Marcadores Faber-Castell Pitt ArtPen en tonos piel claro son ideales para dibujos y bocetos que requieren colores suaves y naturales. Este set incluye 6 marcadores con puntas de diferentes grosores, permitiendo realizar trazos finos y detallados. La tinta de alta calidad es resistente al agua y seca rápidamente, ofreciendo una excelente cobertura sobre papel y otras superficies para técnicas de ilustración y diseño gráfico.', 'Set de 6 marcadores Faber-Castell Pitt ArtPen en tonos piel claro, ideales para dibujos y bocetos realistas, puntas de diferentes grosores para trazos precisos, tinta de alta calidad resistente al agua y de secado rápido, adecuados para uso sobre papel y otras superficies en ilustración y diseño gráfico.', 'Dibujo', 61.20, 72.00, 17, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/set-marcadores-pitt-artpen-x6-tonos-piel-claros-15221-default-1.jpg'),
(50, 'ÓLEO PASTEL FABER CASTELL LINEA ARTE X 24 UND', 'FABER CASTELL', 'Los Óleos Pastel Faber-Castell son ideales para técnicas artísticas que requieren colores intensos y mezclables. Este set incluye 24 óleos pastel en una variedad de tonos, diseñados para artistas que buscan expresión y detalle en sus obras. Cada pastel está formulado con pigmentos de alta calidad que ofrecen una excelente cobertura sobre papel, lienzo u otras superficies, permitiendo mezclas suaves y graduales para lograr efectos artísticos únicos.', 'Set de 24 óleos pastel Faber-Castell, colores intensos y mezclables, ideales para técnicas artísticas, pigmentos de alta calidad para excelente cobertura, adecuados para uso sobre papel, lienzo y otras superficies artísticas, permiten mezclas suaves y graduales para efectos artísticos variados.', 'Dibujo', 56.80, 66.90, 20, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/o/l/oleo-pastel-x-24-linea-arte-fab-127024-867-default-1.jpg'),
(51, 'COLORES FABER CASTELL ACUARELABLES ALBRECHT DURER X 36 UND', 'FABER CASTELL', 'Los Colores Faber-Castell Albrecht Dürer son acuarelables y ofrecen una excelente calidad para artistas profesionales y aficionados. Este estuche contiene 36 lápices de colores acuarelables que permiten crear efectos de acuarela con la facilidad del lápiz de color. Cada lápiz está fabricado con pigmentos de alta calidad que proporcionan colores intensos y duraderos, ideales para ilustraciones, bocetos y trabajos artísticos que requieran un acabado suave y mezclable.', 'Estuche de 36 lápices de colores Faber-Castell Albrecht Dürer acuarelables, pigmentos de alta calidad para colores intensos y mezclables, adecuados para técnicas de acuarela y dibujo, lápices que permiten crear efectos de acuarela, ideales para artistas profesionales y aficionados, ofrecen un acabado suave y duradero en papel y otras superficies artísticas.', 'Dibujo', 288.80, 339.80, 15, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/o/color-x-36-acuarelable-albrecht-durer-12270-default-1.jpg'),
(52, 'BLOCK FABRIANO 20X20 CM 300 GR NEGRO 20 HOJAS', 'FABRIANO', 'El Block Fabriano está compuesto por 20 hojas de papel de alta calidad en color negro, con un gramaje de 300 gramos por metro cuadrado. Cada hoja tiene un tamaño de 20x20 cm, ofreciendo una superficie robusta y resistente para técnicas artísticas como el dibujo, la pintura y el diseño gráfico. Ideal para proyectos que requieren un fondo oscuro o para crear contrastes visuales impactantes.', 'Block de papel Fabriano, tamaño 20x20 cm, 300 gramos por metro cuadrado, color negro intenso, ideal para técnicas artísticas como dibujo y pintura, superficie resistente y duradera, adecuada para uso profesional y creativo donde se necesite un fondo oscuro o contraste visual destacado.', 'Dibujo', 36.40, 42.90, 24, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-fabriano-20x20-300g-20-hojas-negro-77326-default-1.jpg'),
(53, 'COLOR ACUARELABLE DERWENT INKTENSE X 12 UND', 'DERWENT', 'Los Colores Acuarelables Derwent Inktense son conocidos por su intensidad y versatilidad en técnicas de acuarela y dibujo. Este set incluye 12 lápices acuarelables que se activan con agua, permitiendo crear efectos vibrantes y duraderos. Cada lápiz está formulado con pigmentos solubles en agua y proporciona colores ricos y profundos, ideales para artistas que buscan expresión y precisión en sus obras.', 'Set de 12 lápices acuarelables Derwent Inktense, colores intensos y vibrantes, activables con agua para crear efectos de acuarela, pigmentos solubles en agua para mezclas suaves y mezclables, ideales para técnicas de acuarela y dibujo artístico, adecuados para artistas de todos los niveles que buscan colores ricos y duraderos en sus obras.', 'Dibujo', 78.60, 104.90, 14, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/o/color-x12-inktense-acuarelable-derwent-62862-default-1.jpg'),
(54, 'MARCADORES ACUARELABLES STAEDTLER DOBLE PUNTA X 36 UND', 'STAEDTLER', 'Los Marcadores Acuarelables Staedtler con doble punta ofrecen versatilidad y calidad para técnicas de dibujo y coloración. Este set contiene 36 marcadores con puntas de pincel flexible y punta fina, ideales para crear trazos precisos y amplias áreas de color. Los marcadores están equipados con tinta acuarelable de alta calidad, permitiendo mezclas suaves y gradientes de color en papel acuarela y otros soportes.', 'Set de 36 marcadores acuarelables Staedtler con doble punta (pincel y fina), ideal para dibujo y coloración artística, tinta acuarelable de alta calidad para mezclas suaves y efectos de acuarela, puntas versátiles para trazos precisos y áreas de color amplias, adecuados para artistas y entusiastas de todas las edades que buscan expresión artística y versatilidad en sus trabajos.', 'Dibujo', 75.90, 94.90, 20, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/m/a/marcador-doble-punta-acuarelables-x-36-staedtler-48163-default-1.jpg'),
(55, 'BLOCK CANSON A3 GRADUATE MIX MEDIA 200 GR 20 HOJAS', 'CANSON', 'El Block Canson A3 Graduate Mix Media está diseñado para artistas que trabajan con diversas técnicas como acuarela, gouache, acrílico, y más. Contiene 20 hojas de papel de 200 gramos por metro cuadrado, ideal para experimentar con diferentes medios sin preocuparse por el deterioro del papel. Su tamaño A3 proporciona un lienzo amplio para crear obras de arte de tamaño considerable.', 'Block de papel Canson Graduate Mix Media, tamaño A3 (29.7 x 42 cm), 200 gramos por metro cuadrado, adecuado para acuarela, gouache, acrílico y más, papel resistente que permite múltiples capas y ajustes, ideal para artistas que requieren versatilidad y calidad en sus proyectos artísticos.', 'Dibujo', 31.90, 40.00, 20, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-mix-me-a3-20h-200g-graduate-canson-46644-default-1.jpg'),
(56, 'SET PITT FABER CASTELL MONOCHROME X 12 UND', 'FABER CASTELL', 'El Set Pitt Faber-Castell Monochrome está compuesto por 12 lápices de la serie Pitt, conocidos por su calidad y versatilidad en técnicas de dibujo y bocetos. Este set incluye lápices en diferentes grados de dureza (B, 2B, 3B, 4B, 5B, 6B, 7B, 8B, 9B, HB, F, H), proporcionando una amplia gama de tonalidades para sombreado, detalle y trazos expresivos. Ideales para artistas que buscan herramientas de alta calidad para sus obras.', 'Set de 12 lápices Faber-Castell Pitt Monochrome, incluye diferentes grados de dureza (B, 2B, 3B, 4B, 5B, 6B, 7B, 8B, 9B, HB, F, H), adecuados para dibujo y bocetos artísticos, ofrecen tonalidades variadas para sombreado y detalle, ideales para artistas y entusiastas del dibujo que valoran la calidad y versatilidad en sus herramientas creativas.', 'Dibujo', 139.00, 150.00, 30, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/set-pitt-monochrome-x-12-pzs-fab-18485-default-1.jpg'),
(57, 'BLOCK DE DIBUJO CANSON 1557 A3 180 GR 30 HOJAS', 'CANSON', 'El Block de Dibujo Canson 1557 está diseñado para artistas y dibujantes que necesitan un papel de alta calidad para sus obras. Con un tamaño A3 (29.7 x 42 cm), contiene 30 hojas de papel de 180 gramos por metro cuadrado, ideal para técnicas secas como lápiz, carbón, pastel y más. Este papel tiene una superficie ligera y ligeramente texturizada que proporciona un buen agarre al medio y permite múltiples capas sin deformación.', 'Block de dibujo Canson 1557, tamaño A3 (29.7 x 42 cm), 180 gramos por metro cuadrado, adecuado para técnicas secas como lápiz, carbón, pastel, etc., superficie ligera y ligeramente texturizada, papel resistente que permite múltiples capas y ajustes, ideal para artistas que buscan calidad y versatilidad en sus trabajos de dibujo.', 'Dibujo', 45.30, 55.00, 26, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-de-dibujo-1557-a3-30h-180g-3976-default-1.jpg'),
(58, 'MARCADORES FABER CASTELL PITT STUDIO TONOS PIEL CAJA X 12 UND', 'FABER CASTELL', 'Los Marcadores Faber-Castell Pitt Studio en tonos piel están diseñados para artistas que necesitan una paleta de colores naturales y cálidos. Este set contiene 12 marcadores de alta calidad con tintas a base de agua y pigmentos de alta intensidad. Cada marcador está equipado con una punta de pincel flexible que permite crear trazos precisos y áreas de color uniformes. Ideales para ilustración, retrato y cualquier proyecto que requiera tonos piel realistas y detallados.', 'Set de 12 marcadores Faber-Castell Pitt Studio en tonos piel, tintas a base de agua y pigmentos de alta intensidad, puntas de pincel flexible para trazos precisos y uniformes, ideales para ilustración y proyectos artísticos que requieren tonos piel naturales, adecuados para artistas y profesionales que valoran la calidad y la precisión en sus trabajos.', 'Dibujo', 137.70, 183.70, 20, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/e/s/estuche-marcadores-pitt-studio-x12-piel-21840004-default-1.jpg'),
(59, 'MARCADORES ARTLINE CHAMELEON SET X 22 UND', 'ARTLINE', 'Los marcadores Artline Chameleon están diseñados para ofrecer efectos de mezcla y degradado de colores sin problemas. Este set incluye 22 marcadores con tintas de doble punta, una de pincel flexible para trazos suaves y otra fina para detalles precisos. Cada marcador permite crear transiciones suaves entre colores similares, ideal para ilustradores y artistas que buscan lograr efectos de coloración realistas y dinámicos en sus obras. Son apreciados por su capacidad de mezcla sin límites, proporc', 'Set de 22 marcadores Artline Chameleon con tintas de doble punta (pincel y fina), ideales para mezclas y degradados de colores, permite transiciones suaves entre tonos similares, adecuados para ilustración y coloración artística, ofrecen versatilidad y calidad en la creación de efectos visuales únicos, diseñados para artistas que buscan resultados precisos y dinámicos en sus trabajos creativos.', 'Dibujo', 428.30, 503.90, 15, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/e/s/est-marcadores-chameleon-x22-deluxe-ct2201-33979-default-1.jpg'),
(60, 'ACRÍLICO DERWENT ACADEMY ESTUCHE MADERA', 'DERWENT', 'Los acrílicos Derwent Academy en estuche de madera ofrecen una selección de colores vibrantes y duraderos, ideales para artistas principiantes y aficionados. El estuche de madera proporciona una forma elegante y organizada de almacenar y transportar los tubos de acrílico. Cada tubo contiene pintura acrílica de alta calidad que se aplica fácilmente y se mezcla bien, permitiendo a los artistas crear capas, mezclas y efectos de textura en sus obras.', 'Estuche de madera con tubos de acrílico Derwent Academy, colores vibrantes y duraderos, ideales para artistas principiantes y aficionados, fácil aplicación y mezcla de colores, permite crear capas y efectos de textura, adecuado para pintura sobre lienzo, papel y otras superficies, proporciona una presentación organizada y portátil para llevar a clases o estudios.', 'Dibujo', 199.90, 367.40, 20, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/a/c/acrilico-derwent-academy-estuche-madera-62876-default-1.jpg'),
(61, 'LIBRO DE ACTIVIDADES APRIÉTAME EN EL ZOOLÓGICO', 'SICOBEN', 'El libro \"Apriétame en el Zoológico\" de Sicoben es una experiencia interactiva diseñada para niños pequeños. Presenta páginas gruesas y resistentes que los niños pueden apretar para escuchar sonidos relacionados con animales del zoológico. Cada página está ilustrada con colores vivos y llamativos, y las actividades están pensadas para estimular el aprendizaje temprano y la interacción sensorial', 'Libro de actividades interactivo para niños, páginas gruesas y resistentes con elementos apretables para activar sonidos de animales, ilustraciones coloridas y atractivas, diseñado para estimular el aprendizaje sensorial y temprano en los niños, ideal para desarrollar habilidades motoras y sensoriales, recomendado para niños en edad preescolar y de primeros años de primaria.', 'Libros y Cuentos', 6.30, 7.90, 15, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/l/i/libro-de-actividades-aprietame-en-el-zoo-25635-default-1.jpg'),
(62, 'LIBRO DE ACTIVIDADES PINTA Y LEE UNICORNIOS', 'INCA', 'El libro \"Pinta y Lee Unicornios\" de Inca es una opción ideal para niños que aman los unicornios. Combina actividades de pintura y lectura en un formato interactivo y educativo. Cada página está diseñada con ilustraciones de unicornios para que los niños las coloreen mientras disfrutan de historias divertidas y educativas sobre estos míticos seres.', 'Libro de actividades que incluye pintura y lectura sobre unicornios, ideal para niños interesados en estos seres mágicos, ilustraciones detalladas para colorear y desarrollar la creatividad, historias cortas y educativas que fomentan la imaginación y el aprendizaje, recomendado para niños en edad preescolar y de primeros años de primaria.', 'Libros y Cuentos', 9.90, 15.00, 20, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/p/i/pinta-y-lee-unicornios-37004002-default-1.jpg'),
(63, 'VOLVER A EMPEZAR (IT STARTS WITH US) COLLEEN HOOVER', 'PLANETA', 'En \"Volver a Empezar\", Colleen Hoover teje una historia emotiva sobre amor, familia y perdón. La trama sigue los altibajos emocionales de Lily Bloom y Ryle Kincaid, dos jóvenes con un pasado complicado que se ven envueltos en un romance intenso y turbulento. A medida que su relación se desarrolla, ambos se enfrentan a secretos y decisiones que pondrán a prueba su amor y su capacidad para perdonar.', '\"Volver a Empezar\" publicado por Planeta tiene aproximadamente 400 páginas en formato de libro de bolsillo estándar. La portada suele presentar un diseño atractivo que refleja el tono emocional y temático de la historia, con detalles que invitan al lector a descubrir la trama compleja y emotiva entre sus personajes principales, Lily Bloom y Ryle Kincaid.', 'Libros y Cuentos', 99.90, 120.00, 15, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/v/o/volver-a-empezar-colleen-hoover-68906-default-1.jpg'),
(64, 'LIBRO HARRY POTTER Y LA ORDEN DEL FÉNIX', 'PENGUIN', '\"Harry Potter y la Orden del Fénix\" es el quinto libro de la aclamada serie escrita por J.K. Rowling. En esta entrega, Harry regresa a su quinto año en Hogwarts y descubre que el Ministerio de Magia está en desacuerdo con la comunidad mágica sobre el regreso de Lord Voldemort. Con la ayuda de la Orden del Fénix, un grupo secreto formado para luchar contra las fuerzas oscuras, Harry debe enfrentar nuevos desafíos, tanto en su vida personal como en el mundo mágico.', 'Edición de tapa dura/blanda publicada por Penguin, aproximadamente 896 páginas, texto en español, incluye ilustraciones de la portada y detalles gráficos, tamaño estándar de libro para fácil manejo y lectura, ideal para lectores de todas las edades, especialmente fanáticos de la serie de Harry Potter.', 'Libros y Cuentos', 69.00, 80.00, 40, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/h/a/harry-potter-y-la-orden-del-fenix-47547-default-1.jpg'),
(65, 'CUENTOS PERUANOS TÍTULOS SURTIDOS', 'DIDACTICA', '\"Cuentos Peruanos Títulos Surtidos\" es una recopilación de historias tradicionales y contemporáneas de Perú, diseñada para ofrecer a los lectores una visión rica y diversa de la cultura y las tradiciones peruanas. Este libro incluye una selección de cuentos escritos por autores peruanos destacados, cada uno de los cuales aporta su propia perspectiva y estilo narrativo. Las historias capturan la esencia del folclore peruano, presentando personajes y escenarios únicos que reflejan la riqueza cultu', 'Colección de cuentos peruanos con títulos surtidos, publicación de Didáctica, incluye historias tradicionales y contemporáneas, escritos por autores peruanos, ideal para todas las edades, fomenta el conocimiento y la apreciación de la cultura peruana, encuadernación en tapa blanda o dura dependiendo de la edición, texto en español, número de páginas varía según la edición específica, ilustraciones pueden estar incluidas para complementar las historias.', 'Libros y Cuentos', 11.60, 19.00, 30, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuentos-peruanos-titulos-surtidos-didactica-10290-default-1.jpg'),
(66, 'UNO SIEMPRE CAMBIA AL AMOR DE SU VIDA AMALIA ANDRADE', 'PLANETA', '\"Uno Siempre Cambia al Amor de su Vida\" de Amalia Andrade, publicado por Planeta, es una guía ilustrada sobre el desamor y la superación personal. Con un tono humorístico y emotivo, el libro ofrece consejos, actividades y reflexiones para ayudar a los lectores a sanar y encontrar la paz tras una ruptura amorosa.', 'Libro de autoayuda, ilustrado, tapa blanda, 200 páginas, formato práctico, texto en español, diseñado para lectores que buscan superar el desamor y fortalecer su bienestar emocional.', 'Libros y Cuentos', 89.90, 100.00, 25, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/u/n/uno-siempre-cambia-al-amor-de-su-vida-68949-default-1.jpg'),
(67, 'SER MUJER EN EL PERÚ JOSEFINA MIRÓ QUESADA', 'PLANETA', '\"Ser Mujer en el Perú\" de Josefina Miró Quesada, publicado por Planeta, es un libro que explora las experiencias y desafíos de las mujeres en la sociedad peruana. A través de testimonios y análisis, la autora aborda temas como la igualdad de género, la cultura, la política y el rol de la mujer en diversos ámbitos, ofreciendo una perspectiva profunda y reflexiva sobre la condición femenina en el Perú contemporáneo.', 'Libro de ensayo y análisis social, tapa blanda, 300 páginas, texto en español, incluye testimonios y análisis detallados sobre la situación de la mujer en el Perú, ideal para lectores interesados en estudios de género y sociología.', 'Libros y Cuentos', 49.99, 60.00, 13, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/ser-mujer-en-el-peru-63205-default-1.jpg'),
(68, 'BREVE HISTORIA DE LA MISOGINIA', 'PLANETA', '\"Breve Historia de la Misoginia\", publicado por Planeta, ofrece un análisis conciso sobre la historia de la misoginia a través de diferentes culturas y épocas. Examina cómo la discriminación y el odio hacia las mujeres han influido en la sociedad, abordando eventos históricos, figuras clave y las raíces culturales y religiosas de la misoginia. Proporciona una perspectiva crítica sobre la lucha por la igualdad de género.', 'Ensayo histórico, tapa blanda, 250 páginas, texto en español, abarca diversas épocas y culturas, ideal para estudios de género e historia.', 'Libros y Cuentos', 85.00, 100.00, 24, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/r/breve-historia-de-la-misoginia-52869-default-1.jpg'),
(69, 'BOTELLA CHILDRENS CLUB JOJO SIWA 450 ML', 'CHILDRENS CLUB', '', '', 'Mochilas, Cartucheras y Loncheras', 19.90, 25.00, 15, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/o/botella-policarbonato-450ml-jojo-siwa-35727-default-1.jpg'),
(70, 'LONCHERA ARTESCO NUTRI BOX LITTLE PONY', 'ARTESCO', '', '', 'Mochilas, Cartucheras y Loncheras', 36.90, 40.00, 15, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/l/o/lonch-ctaper-nutribox-little-pony-artes-16173027-default-1.jpg'),
(71, 'TÁPER ANTHAIX CUADRADO PAW PATROL GIRL 590 ML', 'ANTHAIX', '', '', 'Mochilas, Cartucheras y Loncheras', 16.90, 20.00, 26, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/t/a/taper-cdrd-590ml-paw-patrol-m-20-scool-44552-default-1.jpg'),
(72, 'LONCHERA PORTA PREPPY GRANATE', 'PORTA', '', '', 'Mochilas, Cartucheras y Loncheras', 89.90, 100.00, 10, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/l/o/lonchera-preppy-granate-porta-65957-default-1.jpg'),
(73, 'MALETA CHILDRENS CLUB CON RUEDAS MY LITTLE PONY', 'CHILDRENS CLUB', '', '', 'Mochilas, Cartucheras y Loncheras', 249.90, 259.90, 19, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/m/a/maleta-c-ruedas-my-little-pony-0010-66282-default-1.jpg'),
(74, 'BOTELLA ANTHAIX AZUL 14 L CON CAÑA EXTRAÍBLE', 'ANTHAIX', '', '', 'Mochilas, Cartucheras y Loncheras', 35.00, 40.00, 12, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/o/botella-14lt-ccana-extraible-azul-66504-default-1.jpg'),
(75, 'LONCHERA KIPIT ACOLCHADA AZUL ACERO', 'KIPIT', '', '', 'Mochilas, Cartucheras y Loncheras', 30.00, 42.90, 15, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/l/o/lonchera-kipit-acolchada-azul-acero-63483-default-1.jpg'),
(76, 'MALETA ANTHAIX SCOOL PAW PATROL 3D', 'ANTHAIX', '', '', 'Mochilas, Cartucheras y Loncheras', 249.90, 300.00, 15, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/m/a/maleta-paw-patrol-eva-3d-2020-scool-43727-default-1.jpg'),
(77, 'BOTELLA CUADRADA TITANIO FROZEN 500 ML', 'TITANIO', '', '', 'Mochilas, Cartucheras y Loncheras', 18.90, 20.00, 15, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/o/botella-cuadrada-500-ml-frozen-2-titanio-44934-default-1.jpg'),
(78, 'MALETA ARTESCO MINNIE MOUSE UNICORNIO', 'ARTESCO', '', '', 'Mochilas, Cartucheras y Loncheras', 265.00, 300.00, 18, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/m/a/maleta-minnie-mouse-unicornio-artesco-65655-default-1.jpg'),
(79, 'LONCHERA PORTA JOBS GRANATE', 'PORTA', '', '', 'Mochilas, Cartucheras y Loncheras', 99.90, 110.00, 23, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/l/o/lonchera-jobs-granate-porta-65917-default-1.jpg'),
(80, 'LONCHERA CHILDRENS CLUB MUJER MARAVILLA', 'CHILDRENS CLUB', '', '', 'Mochilas, Cartucheras y Loncheras', 74.90, 79.90, 30, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/l/o/lonchera-mujer-maravilla-0001-childrens-66305-default-1.jpg'),
(81, 'MOCHILA XTREM QUEENS 338 ROSADO', 'XTREM', '', '', 'Mochilas, Cartucheras y Loncheras', 179.00, 190.00, 22, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/m/o/mochila-xtrem-queens-338-rosado-66626-default-1.jpg'),
(82, 'MINI MOCHILA ARTESCO SPIDERMAN REALLY', 'ARTESCO', 'a', 'a', 'Mochilas, Cartucheras y Loncheras', 80.00, 90.00, 28, 'https://realplaza.vtexassets.com/arquivos/ids/35456513-800-auto?v=638514663035000000&width=800&height=auto&aspect=true'),
(83, 'COLOR ACUARELABLE FABER CASTELL GOLDFABER ESTUCHE X 12 UND', 'FABER CASTELL', '', '', 'Pintura', 43.50, 48.40, 28, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/f/a/faber-castell-color-x-12-gold-acuarelables-33968-default-1.jpg'),
(84, 'LÁPIZ GRAFITO STAEDTLER LUMOGRAPH X 8 UND', 'STAEDTLER', '', '', 'Pintura', 37.90, 45.00, 12, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/l/a/lapiz-grafito-lumog-x8-staedtler-42878-default-1.jpg'),
(85, 'PINCEL PUNTA PLANA OVE N°4 MADERA X 2 UND', 'OVE', '', '', 'Pintura', 2.00, 3.50, 40, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/p/i/pincel-punta-plana-ove-n4-madera-x-2-und-5000167-default-1.jpg'),
(86, 'ACRÍLICO PEBEO 27 AMARILLO OCRE 100 ML', 'PEBEO', '', '', 'Pintura', 17.80, 23.00, 20, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/a/c/acrilico-100ml-27-amarillo-ocre-15572022-default-1.jpg'),
(87, 'MARCADORES FABER CASTELL PITT ARTPEN NEGRO SET X 8 UND', 'FABER CASTELL', '', '', 'Pintura', 73.30, 97.80, 19, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/set-marcadores-pitt-artpen-x8-negro-fc-14758-default-1.jpg'),
(88, 'SET WINSOR & NEWTON GODET STUDIO X 24', 'WINSOR & NEWTON', '', '', 'Pintura', 402.60, 473.70, 25, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/set-x-24-godet-studio-set-wn-25342-default-1.jpg'),
(89, 'ACEITE DE TREMENTINA WINSOR & NEWTON DESTILADA X 75 ML', 'WINSOR & NEWTON', '', '', 'Pintura', 36.00, 45.00, 29, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/t/r/trementina-destilada-75ml-9693-default-1.jpg'),
(90, 'COLOR ACUARELABLE FABER CASTELL GOLDFABER ESTUCHE X 24 UND', 'FABER CASTELL', '', '', 'Pintura', 85.20, 94.70, 30, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/f/a/faber-castell-color-x-24-gold-acuarelables-33969-default-1.jpg'),
(91, 'PINCEL DE AGUA STAEDTLER X 1 UND', 'STAEDTLER', '', '', 'Pintura', 13.50, 15.40, 25, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/p/i/pincel-de-agua-staedtler-42895-default-1.jpg'),
(92, 'PINCEL PUNTA REDONDA OVE N°6 X 2 UND', 'OVE', '', '', 'Pintura', 2.30, 3.50, 19, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/p/i/pincel-punta-redonda-ove-n6-x-2-und-5000199-default-1.jpg'),
(93, 'MARCADOR STAEDTLER METÁLICO SET X 5 UND', 'STAEDTLER', '', '', 'Pintura', 23.90, 31.90, 21, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/set-marcadorx5-metalico-staedtler-42903-default-1.jpg'),
(94, 'BLOCK CANSON FIGUERAS 24 X 33 CM 290 GR 10 HOJAS', 'CANSON', '', '', 'Pintura', 33.90, 40.90, 16, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-figueras-24x33-cm-10h-290g-17529-default-1.jpg'),
(95, 'SET ACUARELA PEBEO 12 MEDIO GODET REDONDO', 'PEBEO', '', '', 'Pintura', 77.50, 85.00, 29, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/set-acuarela-12-medio-godet-redond-pebeo-3931-default-1.jpg'),
(96, 'CABALLETE CONDA SKETCH HAYA', 'CONDA', '', '', 'Pintura', 149.90, 199.00, 29, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/a/caballete-sketch-haya-conda-10089-default-1.jpg'),
(97, 'BOLÍGRAFO FABER CASTELL TRILUX 032-M SURTIDO X 12 UND', 'FABER CASTELL', '', '', 'Utiles', 9.80, 12.00, 14, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/f/a/faber-castell-boligrafo-032-m-trilux-x-12-surt-343211-33748-default-1.jpg');
INSERT INTO `productos` (`id_Productos`, `NombreProducto`, `Marca`, `Descripcion`, `Caracteristicas`, `Categoria`, `Precio`, `PrecioNormal`, `Stock`, `imglink`) VALUES
(98, 'TÉMPERA OVE MORADO 250 ML', 'OVE', '', '', 'Utiles', 5.60, 7.00, 100, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/t/e/tempera-ove-morado-250-ml-28020011-default-1.jpg'),
(99, 'TIZAS CRAYOLA JUMBO LAVABLE CAJA X 48 UND', 'CRAYOLA', '', '', 'Utiles', 64.90, 70.00, 19, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/t/i/tiza-crayola-jumbo-lavablecax48-72238-default-1.jpg'),
(100, 'ROTULADOR STABILO EXTRAFINO 88 ESTUCHE RÍGIDO X 20 UND', 'STABILO', '', '', 'Utiles', 79.20, 88.70, 34, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/r/o/rotulador-stabilo-extrafino-88-estuche-rigido-x-20-unidades-42794-default-1.jpg'),
(101, 'PLUMÓN INDELEBLE ARTLINE EPF-700 SUPREME X 4 UND', 'ARTLINE', '', '', 'Utiles', 20.00, 25.00, 16, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/p/l/plumon-artline-perm-supreme-x4-col-epf-700-30492-default-1.jpg'),
(102, 'TIJERA OVE 5\'\' MANGO ROJO X 1 UND', 'OVE', '', '', 'Utiles', 2.00, 4.00, 55, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/t/i/tijera-ove-5-mango-rojo-x-1-und-10135-default-1.jpg'),
(103, 'PLANTILLA DE LETRAS ARTESCO 30 MM', 'ARTESCO', '', '', 'Utiles', 4.00, 5.00, 60, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/n/o/normografo-de-30-mm-plantilla-281-default-1.jpg'),
(104, 'PLUMÓN INDELEBLE VINIFAN BEST COLOR 420 X 12 UND', 'VINIFAN', '', '', 'Utiles', 19.20, 25.00, 25, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/p/l/plumon-vinifan-420-best-color-x-12-36800-default-1.jpg'),
(105, 'COLORES OVE BICOLOR X 12 UND', 'OVE', '', '', 'Utiles', 7.10, 9.00, 67, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/o/colores-ove-bicolor-x-12-und-32593-default-1.jpg'),
(106, 'PLUMÓN FABER CASTELL FIESTA 45 NEÓN X 6 UND', 'FABER CASTELL', '', '', 'Utiles', 6.60, 8.00, 27, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/f/a/faber-castell-plumon-45-x-6-neon-33823-default-1.jpg'),
(107, 'BOLÍGRAFO ARTESCO CR31 AZUL X 6 UND', 'ARTESCO', '', '', 'Utiles', 4.00, 5.00, 35, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/o/boligrafo-cr31-x-6-und-azul-artesco-23650-default-1.jpg'),
(108, 'MINI CORRECTOR ARTESCO 4 ML TIPO LAPICERO', 'ARTESCO', '', '', 'Utiles', 1.50, 2.50, 45, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/o/corrector-mini-4-ml-artesco-7461-default-1.jpg'),
(109, 'JUEGO DE ESCUADRAS VINIFAN 20 CM', 'VINIFAN', '', '', 'Utiles', 2.60, 4.00, 23, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/j/u/juego-de-escuadras-x-20cm-vinifan-20548-default-1.jpg'),
(110, 'CRAYONES LAYCONSA JUMBO PUPPY X 12 UND', 'LAYCONSA', '', '', 'Utiles', 4.40, 5.30, 39, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/r/crayones-jumbo-x-12-puppy-1041-default-1.jpg'),
(111, 'PILA DURACELL D 1300 BLÍSTER X 2 UND', 'DURACELL', '', '', 'Otros', 17.40, 20.50, 67, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/p/i/pilas-grandes-duracell-1300-x-2-17451-default-1.png'),
(112, 'CALCULADORA CASIO 8 DÍGITOS MS-80 S', 'CASIO', '', '', 'Otros', 42.90, 50.00, 56, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/a/calculadora-8-digitos-ms-80-s-1027-default-1.jpg'),
(113, 'CALCULADORA CASIO MX-12B 12 DÍGITOS VERDE', 'CASIO', '', '', 'Otros', 29.90, 35.00, 29, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/a/calculadora-12-digitos-casio-mx-12b-gn-verde-56845003-default-1.jpg'),
(114, 'CALCULADORA GRÁFICA CASIO 3D FX-CP400', 'CASIO', '', '', 'Otros', 999.00, 1200.00, 50, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/a/calcula-grafica-3d-fx-cp400-65709-default-1.jpg'),
(115, 'CALCULADORA CASIO 12 DÍGITOS MX-12S', 'CASIO', '', '', 'Otros', 30.90, 35.00, 25, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/a/calculadora-12-digitos-mx-12smz-12s-540-default-1.jpg'),
(116, 'CALCULADORA CIENTÍFICA CASIO FX-991LA PLUS', 'CASIO', '', '', 'Otros', 110.90, 120.90, 25, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/a/calculadora-cientifica-fx-991-casio-7674-default-1.jpg'),
(117, 'POWERBANK ITEC 10000 MAH INALÁMBRICO CON CABLES', 'ITEC', '', '', 'Otros', 104.90, 199.90, 16, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/p/o/powerbank-itec-10000-mah-inalambrico-con-cables-74123-default-1.jpg'),
(118, 'CALCULADORA GRÁFICA CASIO FX-9860GIII-S', 'CASIO', '', '', 'Otros', 599.00, 699.00, 16, 'https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/a/calculadora-grafica-casio-fx-9860gii-60224-default-1.jpg'),
(123, 'Album de musica', 'Romeo santos', '', '', 'Bachata', 79.90, 99.90, 98, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUSExMVFRUXGBgaFxgYGB0YGxgYGBgYHRgaGBcdHSggGBolGxcXITEhJSkrLi4uHR8zODMtNygtLisBCgoKDg0OGxAQGy0lICYtLS0tLS0tLS0tLy0tLS0tLS8vLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAFAgMEBgcBAAj/xABKEAACAQIDBQQGBwUHAQcFAAABAgMAEQQSIQUGMUFREyJhcTJCgZGhsQcUI1JicsEzgrLR8BYkNJKiwuFzFVNjdMPS8TVDVIOz/8QAGwEAAQUBAQAAAAAAAAAAAAAABAABAgMFBgf/xAA9EQABBAAEAwQJAgQGAgMAAAABAAIDEQQSITFBUWEFEyJxFDKBkaGxwdHwIzMGQ'),
(125, 'Licuadora', 'Huawei', '', '', 'Categoria', 179.90, 299.90, 12, 'https://img.myipadbox.com/sec/product_l/KAP5511.jpg'),
(130, 'ILLIT - 1st Mini Album \"SUPER REAL ME\"', 'Super Realme', 'El mini álbum \"SUPER REAL ME\" de ILLIT es una colección de 6 pistas que exploran géneros como electropop, hip-hop y R&B. Con una producción de alta calidad y letras poderosas, muestra la versatilidad del grupo y su crecimiento artístico. Con una estética visual única y diseño de álbum cuidadoso, es una obra que cautiva tanto auditivamente como visualmente, prometiendo resonar con una audiencia diversa y apasionada.', 'El primer mini álbum de ILLIT, \"SUPER REAL ME\", presenta diversos géneros como electropop, hip-hop y R&B con una producción de alta calidad y letras poderosas e introspectivas. Destaca por su crecimiento artístico, fuerte presencia escénica y diseño meticuloso del álbum, prometiendo cautivar a una audiencia diversa y apasionada con su combinación única de música y estética visual.', 'Música', 100.00, 285.00, 150, 'https://m.media-amazon.com/images/I/31UxJgoZaDL._SX300_SY300_QL70_FMwebp_.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Usuario_id` int(11) NOT NULL,
  `NombreCompleto` varchar(80) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Contraseña` varchar(30) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Genero` varchar(10) NOT NULL,
  `TipoDoc` varchar(15) NOT NULL,
  `NumDoc` varchar(20) NOT NULL,
  `Telefono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usuario_id`, `NombreCompleto`, `Correo`, `Contraseña`, `FechaNacimiento`, `Genero`, `TipoDoc`, `NumDoc`, `Telefono`) VALUES
(1, 'Omer Runco Valdez', 'omer.runco15@gmail.com', 'odi123odi', '2004-05-01', 'Masculino', 'DNI', '75661452', '939962161'),
(2, 'Jessica Parra ', 'yesyes@gmail.com', 'odi123odi', '2005-01-24', 'Femenino', 'DNI', '98745632', '935789610'),
(3, 'Roy Meza Taipe', 'roi@gmail.com', 'odii123', '2005-06-16', 'Masculino', 'DNI', '15987530', '963258741'),
(4, 'Roberto Angeles Neciosub', 'xmanzanita@gmail.com', 'odi123', '2005-06-16', 'Masculino', 'DNI', '76489234', '965874123'),
(8, 'Antonio Londres', 'anto@gmail.com', '123456789', '2000-05-01', 'Masculino', 'DNI', '76788747', '939962161');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `NombreCompleto` varchar(255) NOT NULL,
  `CorreoElectronico` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Ciudad` varchar(255) NOT NULL,
  `Pais` varchar(255) NOT NULL,
  `DetalleTarjeta` varchar(255) NOT NULL,
  `NombrePropietario` varchar(255) NOT NULL,
  `NTarjeta` varchar(255) NOT NULL,
  `DatoExpiracion` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `STotal` decimal(10,2) NOT NULL,
  `FechaHora` datetime DEFAULT NULL,
  `IdVenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`NombreCompleto`, `CorreoElectronico`, `Direccion`, `Ciudad`, `Pais`, `DetalleTarjeta`, `NombrePropietario`, `NTarjeta`, `DatoExpiracion`, `cvv`, `STotal`, `FechaHora`, `IdVenta`) VALUES
('Roberto Angeles Neciosub', 'xmanzanita@gmail.com', 'Av. La Molina 987', 'Lima', 'Perú', '', 'Roberto Angeles Neciosub', '874915981561258', '2024-07', '123', 158.00, NULL, 18),
('Danielle Marsh', 'MarshDanielle@Outlook.com', '47 Bowes Street Woden ', 'Camberra', 'Australia', '', 'Danielle', '54785598548002', '11/27', '520', 98.00, NULL, 26),
('Hanni New Jeans', 'Hanni@NewJeans.com', '321 Sakura', 'Tokio', 'Japon', '', 'Hanni', '1111122223334445', '08/25', '231', 139.00, NULL, 28),
('Chaewon', 'Chaewon@gmail.com', 'Texas', 'Arequipa', 'Vangladesh', 'Debito', 'Chaewon ', '85698424789541', '09/32', '125', 255.90, NULL, 29),
('hahahahah', 'ahhahah@gmail.com', 'jajajajaj', 'jhshshsh', 'hshshsh', 'Credito', 'shshshshsh', '123456479541335256', '2024-09', '123', 0.00, NULL, 37),
('Alonso Fuño Cisneros', 'roymezataipe@gmail.com', 'Av. Cesar Vallejo 478 - El Agustino', 'Lima', 'Perú', 'Debito', 'Roy Makaay Meza Taipe', '15931236159814789', '2024-12', '159', 237.60, '2024-06-29 19:31:50', 38),
('Alonso Fuño Cisneros', 'roymezataipe@gmail.com', 'Av. Cesar Vallejo 478 - El Agustino', 'Lima', 'Perú', 'Debito', 'Roy Makaay Meza Taipe', '15931236159814789', '2024-12', '159', 237.60, '2024-06-29 19:36:16', 39),
('Sergio Gonzales Gutierrez', 'abc@gmail.com', 'Av. Paris 159 SMP', 'Arequipa', 'Perú', 'Debito', 'Juan Manuel Vargas', '1596123647951596', '2024-09', '159', 319.00, '2024-06-29 19:56:46', 42),
('Yess Yess', 'yes@gmail.com', 'Av. Chaclacayo 666 Chaclacayo', 'Lima', 'Perú', 'Debito', 'Jess Parra Bautista', '1234159845981236', '2024-07', '159', 124.80, '2024-06-29 21:10:16', 43),
('Alonso Fuño Cisneros', 'roymezataipe@gmail.com', 'Av. Cesar Vallejo 478 - El Agustino', 'Lima', 'Perú', 'Debito', 'Roy Makaay Meza Taipe', '1598789615961478', '2024-07', '159', 8.20, '2024-06-29 21:22:10', 44),
('Roberto Angeles', 'feliz@gmail.com', 'Av. Cesar Vallejo 478 - El Agustino', 'Lima', 'Perú', 'Debito', 'Roberto Angeles', '7777896547893216', '2024-08', '159', 246.40, '2024-06-29 22:52:53', 45),
('Kim Chaewon', 'Chaewon@Leeserafim.com', 'South Korean ', 'Chaclacayo', 'Korean', 'Debito', 'Kim Chaewon', '8759654235468150', '2024-08', '842', 77.70, '2024-06-30 10:24:57', 46),
('Hanni', 'Hanni@Tailoy.com', 'Av. ALfonso Ugarte 3342', 'Lima', 'Perú', 'Credito', 'Hanni J. S.', '78446112678452', '2024-07', '564', 197.60, '2024-06-30 22:36:59', 47),
('Alex Vazquez Diaz', 'aleo@gmail.com', 'Av. Vallejo 187 Ate', 'Lima', 'Perú', 'Credito', 'Alex Tienda', '1891123615961478', '2024-08', '126', 91.20, '2024-07-02 01:13:28', 49);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`id_administracion`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `id_Productos` (`id_Productos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_Productos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usuario_id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`IdVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administracion`
--
ALTER TABLE `administracion`
  MODIFY `id_administracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_Productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`IdVenta`),
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`id_Productos`) REFERENCES `productos` (`id_Productos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
