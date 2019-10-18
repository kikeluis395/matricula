-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2019 a las 13:56:37
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matricula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activacion`
--

CREATE TABLE `activacion` (
  `cod_activacion` int(11) NOT NULL,
  `descripcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `activacion`
--

INSERT INTO `activacion` (`cod_activacion`, `descripcion`, `periodo`, `estado`) VALUES
(1, 'MATRICULA', '1', 1),
(2, 'RECTIFICACION', '1', 0),
(3, 'PAGO', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `cod_administrador` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dni_fk` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`cod_administrador`, `dni_fk`) VALUES
('2015111111', '11111111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `cod_alumno` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dni_fk` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `anio_ingreso` int(11) NOT NULL,
  `cod_carrera_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`cod_alumno`, `dni_fk`, `anio_ingreso`, `cod_carrera_fk`) VALUES
('2015237215', '70776456', 2015, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `cod_aula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `pabellon` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`cod_aula`, `pabellon`) VALUES
('A4-3', 'A'),
('A5-4', 'A'),
('A5-6', 'A'),
('B5-3', 'B'),
('B5-4', 'B'),
('B5-5', 'B'),
('B5-6', 'B'),
('LAB-1', 'D'),
('LAB-2', 'D'),
('LAB-3', 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `cod_carrera` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `escuela` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cod_facultad_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`cod_carrera`, `descripcion`, `escuela`, `cod_facultad_fk`) VALUES
(1, 'Administración de Turismo y de Negocios Internacionales', 'Escuela Profesional de Administración de Turismo y de Negocios Internacionales', 1),
(2, 'Administración Privada', 'Escuela Profesional de Administración Privada', 1),
(3, 'Administración Pública y Gestión Social', 'Escuela Profesional de Administración Pública y Gestión Social', 1),
(4, 'Economía', 'Escuela Profesional de Economía', 2),
(5, 'Contabilidad', 'Escuela Profesional de Contabilidad', 3),
(6, 'Ciencias de la Comunicación', 'Escuela Profesional de Ciencias de la Comunicación', 4),
(7, 'Sociología', 'Escuela Profesional de Sociología', 4),
(8, 'Trabajo Social', 'Escuela Profesional de Trabajo Social', 4),
(9, 'Ciencias Políticas', 'Escuela Profesional de Ciencias Políticas', 5),
(10, 'Derecho', 'Escuela Profesional de Derecho', 5),
(11, 'Educación Inicial', 'Escuela Profesional de Inicial', 6),
(12, 'Educación Primaria', 'Escuela Profesional de Primaria', 6),
(13, 'Educación Secundaria Especialidad: Computación e Informática', 'Escuela Profesional de Secundaria', 6),
(14, 'Educación Secundaria Especialidad: Idioma Inglés', 'Escuela Profesional de Secundaria', 6),
(15, 'Educación Secundaria Especialidad: Matemática y Física', 'Escuela Profesional de Secundaria', 6),
(16, 'Educación Secundaria Especialidad: Ciencias Naturales', 'Escuela Profesional de Secundaria', 6),
(17, 'Educación Secundaria Especialidad: Filosofía y Ciencias Sociales', 'Escuela Profesional de Secundaria', 6),
(18, 'Educación Secundaria Especialidad: Ciencias Histórico Sociales', 'Escuela Profesional de Secundaria', 6),
(19, 'Educación Secundaria Especialidad: Lenguaje y Literatura', 'Escuela Profesional de Secundaria', 6),
(20, 'Educación Física', 'Escuela Profesional de Educación Física', 6),
(21, 'Antropología y Arqueología', 'Escuela Profesional de Antropología y Arqueología', 7),
(22, 'Filosofía', 'Escuela Profesional de Filosofía', 7),
(23, 'Historia', 'Escuela Profesional de Historia', 7),
(24, 'Lingüística y Literatura', 'Escuela Profesional de Lingüística y Literatura', 7),
(25, 'Arquitectura y Urbanismo', 'Escuela Profesional de Arquitectura y Urbanismo', 8),
(26, 'Ingeniería Civil', 'Escuela Profesional de Ingeniería Civil', 9),
(27, 'Ingeniería de Sistemas', 'Escuela Profesional de Ingeniería de Sistemas', 10),
(28, 'Ingeniería de Transportes', 'Escuela Profesional de Ingeniería de Transportes', 10),
(29, 'Ingeniería Agroindustrial', 'Escuela Profesional de Ingeniería Agroindustrial', 10),
(30, 'Ingeniería Industrial', 'Escuela Profesional de Ingeniería Industrial', 10),
(31, 'Ingeniería Geográfica', 'Escuela Profesional de Ingeniería Geográfica', 11),
(32, 'Ingeniería Ambiental', 'Escuela Profesional de Ingeniería Ambiental', 11),
(33, 'Ingeniería en Ecoturismo', 'Escuela Profesional de Ingeniería en Ecoturismo', 11),
(34, 'Ingeniería Alimentaria', 'Escuela Profesional de Ingeniería Alimentaria', 12),
(35, 'Ingeniería en Acuicultura', 'Escuela Profesional de Ingeniería en Acuicultura', 12),
(36, 'Ingeniería Pesquera', 'Escuela Profesional de Ingeniería Pesquera', 12),
(37, 'Ingeniería Electrónica', 'Escuela Profesional de Ingeniería Electrónica', 13),
(38, 'Ingeniería Informática', 'Escuela Profesional de Ingeniería Informática', 13),
(39, 'Ingeniería Mecatrónica', 'Escuela Profesional de Ingeniería Mecatrónica', 13),
(40, 'Ingeniería de Telecomunicaciones', 'Escuela Profesional de Ingeniería de Telecomunicaciones', 13),
(41, 'Biología', 'Escuela Profesional de Biología', 14),
(42, 'Física', 'Escuela Profesional de Física', 14),
(43, 'Matemática y Estadística', 'Escuela Profesional de Matemática y Estadística', 14),
(44, 'Química', 'Escuela Profesional de Química', 14),
(45, 'Medicina', 'Escuela Profesional de Medicina', 15),
(46, 'Enfermería', 'Escuela Profesional de Enfermería', 15),
(47, 'Nutrición', 'Escuela Profesional de Nutrición', 15),
(48, 'Obstetricia', 'Escuela Profesional de Obstetricia', 15),
(49, 'Odontología', 'Escuela Profesional de Odontología', 16),
(50, 'Terapia Física y Rehabilitación', 'Escuela Profesional de Terapias de Rehabilitación', 17),
(51, 'Terapia de Lenguaje', 'Escuela Profesional de Terapias de Rehabilitación', 17),
(52, 'Radiología', 'Escuela Profesional de Radioimagen', 17),
(53, 'Optometría', 'Escuela Profesional de Radioimagen', 17),
(54, 'Laboratorio y Anatomía Patológica', 'Escuela Profesional de Laboratorio y Anatomía Patológica', 17),
(55, 'Psicología', 'Escuela Profesional de Psicología', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE `ciclo` (
  `num_ciclo` int(11) NOT NULL,
  `num_anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`num_ciclo`, `num_anio`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(7, 4),
(8, 4),
(9, 5),
(10, 5),
(11, 6),
(12, 6),
(13, 7),
(14, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `cod_curso` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `num_creditos` int(11) NOT NULL,
  `cod_plan_curricular_fk` int(11) NOT NULL,
  `num_ciclo_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`cod_curso`, `descripcion`, `num_creditos`, `cod_plan_curricular_fk`, `num_ciclo_fk`) VALUES
('2A0124', 'FILOSOFIA Y ETICA', 4, 3, 6),
('2A0125', 'LOGICA Y ALGORITMOS', 3, 3, 1),
('2C0187', 'LENGUAJE Y REDACCION', 4, 3, 1),
('2D0109', 'SISTEMAS DE GESTION DEL POTENCIAL HUMANO', 3, 3, 6),
('2H0033', 'FUNDAMENTOS DE COMUNICACIONES', 4, 3, 6),
('2I0229', 'DERECHO INFORMATICO Y EMPRESARIAL', 3, 3, 8),
('2I0230', 'GEOPOLITICA Y DEFENSA NACIONAL', 3, 3, 7),
('3A0014', 'FISICA', 4, 3, 2),
('3B0058', 'ALGEBRA LINEAL', 2, 3, 1),
('3B0103', 'MATEMATICA BASICA', 5, 3, 1),
('3B0165', 'CALCULO DIFERENCIAL E INTEGRAL', 5, 3, 2),
('3B0166', 'ECUACIONES DIFERENCIALES', 4, 3, 3),
('3B0170', 'MATEMATICAS DISCRETAS', 4, 3, 4),
('5A0015', 'ARQUITECTURA DEL COMPUTADOR', 3, 3, 5),
('5A0060', 'COMPUTACION E INFORMATICA BASICA', 4, 3, 1),
('5A0062', 'FORMULACION Y EVALUACION DE PROYECTOS INFORMATICOS', 4, 3, 9),
('5A0063', 'FUNDAMENTOS DE BASE DE DATOS', 4, 3, 5),
('5B0021', 'ESTADISTICA INFERENCIAL', 4, 3, 4),
('5B0110', 'ESTADISTICA Y PROBABILIDADES', 4, 3, 3),
('6C0006', 'INVESTIGACION OPERATIVA', 3, 3, 4),
('6C0037', 'METODOLOGIA DE LA INVESTIGACION', 3, 3, 1),
('7A0013', 'ADMINISTRACION FINANCIERA', 3, 3, 7),
('7A0085', 'MARKETING EMPRESARIAL', 3, 3, 7),
('7A0472', 'ADMINISTRACION DE NEGOCIOS', 3, 3, 2),
('7A0477', 'LIDERAZGO Y CREATIVIDAD EMPRESARIAL', 3, 3, 9),
('7A0482', 'PLANEAMIENTO ESTRATEGICO DE NEGOCIOS', 4, 3, 8),
('7B0184', 'COSTOS Y PRESUPUESTOS', 3, 3, 4),
('7B0192', 'CONTABILIDAD GENERAL', 3, 3, 2),
('7B0197', 'INGENIERIA DE PROCESOS DE NEGOCIOS', 4, 3, 5),
('7C0080', 'ECONOMIA', 3, 3, 2),
('7C0081', 'INGENIERIA ECONOMICA', 3, 3, 6),
('8B0003', 'AUDITORIA DE SISTEMAS', 4, 3, 10),
('8B0059', 'INGENIERIA DE SOFTWARE I', 4, 3, 6),
('8B0067', 'SIMULACION DE SISTEMAS', 3, 3, 8),
('8B0068', 'SISTEMAS DE BASE DE DATOS', 4, 3, 6),
('8B0071', 'TALLER DE BASE DE DATOS', 4, 3, 7),
('8B0072', 'TALLER DE INTEGRACION DE SISTEMAS', 4, 3, 8),
('8B0073', 'TEORIA DE SISTEMAS', 3, 3, 3),
('8B0074', 'TOPICOS ESPECIALES EN INGENIERIA DE SISTEMAS I', 3, 3, 9),
('8B0085', 'DINAMICA DE SISTEMAS', 3, 3, 7),
('8B0108', 'ADMINISTRACION DE REDES', 4, 3, 8),
('8B0109', 'ALGORITMOS Y ESTRUCTURA DE DATOS', 4, 3, 2),
('8B0110', 'ANALISIS Y DISEÑO DE SISTEMAS DE INFORMACION', 4, 3, 5),
('8B0111', 'ARQUITECTURA Y CONECTIVIDAD DE REDES', 3, 3, 7),
('8B0112', 'GERENCIA DE PROYECTOS DE TECNOLOGIA DE INFORMACION Y COMUNICACIONES', 4, 3, 10),
('8B0114', 'INGENIERIA DE SOFTWARE II', 3, 3, 7),
('8B0116', 'INTRODUCCION A LA INGENIERIA DE SISTEMAS', 2, 3, 1),
('8B0118', 'SEGURIDAD EN REDES Y SISTEMAS DE INFORMACION', 3, 3, 9),
('8B0121', 'TOPICOS ESPECIALES EN INGENIERIA DE SISTEMAS II', 4, 3, 10),
('8E0003', 'SISTEMAS OPERATIVOS', 4, 3, 5),
('8E0035', 'LENGUAJE DE PROGRAMACION ESTRUCTURADO', 4, 3, 3),
('8E0036', 'LENGUAJE DE PROGRAMACION ORIENTADO A OBJETOS', 4, 3, 4),
('8E0037', 'LENGUAJE DE PROGRAMACION ORIENTADO A WEB', 3, 3, 5),
('8E0039', 'PROGRAMACION LINEAL', 3, 3, 3),
('8F0123', 'ELECTROMAGNETISMO Y ONDAS', 4, 3, 3),
('8F0124', 'INTELIGENCIA ARTIFICIAL', 4, 3, 9),
('8F0126', 'NEGOCIOS ELECTRONICOS', 4, 3, 8),
('8F0127', 'SISTEMAS DIGITALES', 4, 3, 4),
('BA0328', 'GESTION DEL CONOCIMIENTO', 3, 3, 10),
('GA0062', 'PRACTICAS PRE PROFESIONALES I', 6, 3, 9),
('GA0063', 'PRACTICAS PRE PROFESIONALES II', 6, 3, 10),
('HC0107', 'SEMINARIO DE TESIS', 2, 3, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_llevados`
--

CREATE TABLE `cursos_llevados` (
  `cod_alumno_fk` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_curso_fk` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `num_intentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_pre_requisitos`
--

CREATE TABLE `cursos_pre_requisitos` (
  `cod_curso_fk` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `cod_curso_requisito_fk` varchar(6) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos_pre_requisitos`
--

INSERT INTO `cursos_pre_requisitos` (`cod_curso_fk`, `cod_curso_requisito_fk`) VALUES
('3A0014', '3B0103'),
('3B0165', '3B0103'),
('8B0109', '2A0125'),
('8F0123', '3A0014'),
('5B0110', '3B0103'),
('3B0166', '3B0165'),
('8E0035', '8B0109'),
('8E0035', '5A0060'),
('8B0073', '8B0116'),
('8E0039', '3B0058'),
('8F0127', '8F0123'),
('5B0021', '5B0110'),
('3B0170', '3B0166'),
('8E0036', '8E0035'),
('6C0006', '5B0110'),
('7B0184', '7B0192'),
('7B0184', '7C0080'),
('5A0063', '8B0109'),
('8E0037', '8E0036'),
('8E0003', '8E0035'),
('7B0197', '7A0472'),
('5A0015', '8F0127'),
('8B0110', '8B0073'),
('8B0110', '8E0036'),
('2H0033', '5A0015'),
('7C0081', '7B0184'),
('8B0068', '5A0063'),
('2A0124', '2C0187'),
('2D0109', '8B0110'),
('8B0059', '8B0110'),
('8B0111', '2H0033'),
('7A0085', '7B0197'),
('8B0085', '3B0170'),
('7A0013', '7C0081'),
('8B0114', '8B0059'),
('8B0071', '8B0068'),
('2I0230', '2A0124'),
('8B0108', '8B0111'),
('2I0229', '7A0085'),
('8B0072', '8B0114'),
('7A0482', '7A0085'),
('8B0067', '8B0085'),
('8F0126', '7B0197'),
('GA0062', '8B0072'),
('GA0062', '8B0111'),
('7A0477', '7A0482'),
('5A0062', '7A0482'),
('8B0074', '8B0072'),
('8F0124', '8B0067'),
('8B0118', '8B0108'),
('GA0063', 'GA0062'),
('HC0107', '5A0062'),
('BA0328', '8F0124'),
('8B0112', '7A0482'),
('8B0112', '8B0118'),
('8B0121', '8B0074'),
('8B0003', '8B0118');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE `dia` (
  `cod_dia` int(11) NOT NULL,
  `descripcion` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`cod_dia`, `descripcion`) VALUES
(1, 'LUNES'),
(2, 'MARTES'),
(3, 'MIERCOLES'),
(4, 'JUEVES'),
(5, 'VIERNES'),
(6, 'SABADO'),
(7, 'DOMINGO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `cod_docente` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `dni_fk` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`cod_docente`, `dni_fk`) VALUES
('A-1234', '49706895'),
('B-4321', '58690498'),
('C-45678', '68950134'),
('D-0987', '70473512'),
('E-6093', '74637589'),
('F-9358', '79509789'),
('G-3687', '86957843');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `cod_facultad` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`cod_facultad`, `descripcion`) VALUES
(1, 'Facultad de Administración'),
(2, 'Facultad de Ciencias Económicas'),
(3, 'Facultad de Ciencias Financieras y Contables'),
(4, 'Facultad de Ciencias Sociales'),
(5, 'Facultad de Derecho y Ciencia Política'),
(6, 'Facultad de Educación'),
(7, 'Facultad de Humanidades'),
(8, 'Facultad de Arquitectura y Urbanismo'),
(9, 'Facultad de Ingeniería Civil'),
(10, 'Facultad de Ingeniería Industrial y de Sistemas'),
(11, 'Facultad de Ingeniería Geográfica, Ambiental y Ecoturismo'),
(12, 'Facultad de Oceanografía, Pesquería, Ciencias Alimentarias y Acuicultura'),
(13, 'Facultad de Ingeniería Electrónica e Informática'),
(14, 'Facultad de Ciencias Naturales y Matemática'),
(15, 'Facultad de Medicina \"Hipólito Unanue\"'),
(16, 'Facultad de Odontología'),
(17, 'Facultad de Tecnología Médica'),
(18, 'Facultad de Psicología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_alumno`
--

CREATE TABLE `horario_alumno` (
  `cod_horario_curso_fk` int(11) NOT NULL,
  `cod_matricula_fk` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `vez` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario_alumno`
--

INSERT INTO `horario_alumno` (`cod_horario_curso_fk`, `cod_matricula_fk`, `periodo`, `vez`) VALUES
(23, '20152372152019', '2019-I', 1),
(24, '20152372152019', '2019-II', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_curso`
--

CREATE TABLE `horario_curso` (
  `cod_horario_curso` int(11) NOT NULL,
  `cod_docente_fk` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_curso_fk` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `cod_aula_fk` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `seccion` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `cod_dia_fk` int(11) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `turno` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `cupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario_curso`
--

INSERT INTO `horario_curso` (`cod_horario_curso`, `cod_docente_fk`, `cod_curso_fk`, `cod_aula_fk`, `seccion`, `cod_dia_fk`, `hora_entrada`, `hora_salida`, `turno`, `cupos`) VALUES
(1, 'C-45678', '3B0058', 'B5-6', 'A', 3, '11:20:00', '13:00:00', 'M', 44),
(2, 'B-4321', '2C0187', 'B5-4', 'A', 2, '08:00:00', '10:30:00', 'M', 44),
(3, 'B-4321', '2C0187', 'B5-5', 'A', 4, '12:10:00', '13:50:00', 'M', 44),
(4, 'F-9358', '6C0037', 'B5-5', 'A', 4, '08:00:00', '09:40:00', 'M', 44),
(5, 'F-9358', '6C0037', 'B5-6', 'A', 3, '08:00:00', '09:40:00', 'M', 44),
(6, 'D-0987', '3B0103', 'B5-3', 'A', 1, '10:30:00', '13:50:00', 'M', 44),
(7, 'D-0987', '3B0103', 'B5-3', 'A', 2, '11:20:00', '13:50:00', 'M', 44),
(8, 'D-0987', '3B0103', 'B5-3', 'A', 5, '09:40:00', '11:20:00', 'M', 44),
(9, 'G-3687', '8B0116', 'B5-3', 'A', 5, '11:20:00', '13:00:00', 'M', 43),
(10, 'A-1234', '2A0125', 'LAB-1', 'A', 1, '08:50:00', '10:30:00', 'M', 0),
(11, 'A-1234', '2A0125', 'LAB-1', 'A', 3, '09:40:00', '11:20:00', 'M', 0),
(12, 'E-6093', '5A0060', 'LAB-1', 'A', 5, '08:00:00', '09:40:00', 'M', 45),
(13, 'E-6093', '5A0060', 'B5-3', 'A', 4, '09:40:00', '12:10:00', 'M', 45),
(14, 'C-45678', '3B0058', 'B5-6', 'B', 3, '13:00:00', '14:40:00', 'M', 45),
(15, 'B-4321', '2C0187', 'B5-4', 'B', 1, '08:00:00', '10:30:00', 'M', 39),
(16, 'B-4321', '2C0187', 'B5-4', 'B', 4, '08:00:00', '09:40:00', 'M', 39),
(17, 'F-9358', '6C0037', 'B5-5', 'B', 1, '13:00:00', '14:40:00', 'M', 44),
(18, 'F-9358', '6C0037', 'B5-6', 'B', 3, '09:40:00', '11:20:00', 'M', 44),
(19, 'D-0987', '3B0103', 'B5-4', 'B', 1, '10:30:00', '13:00:00', 'M', 43),
(20, 'D-0987', '3B0103', 'B5-4', 'B', 4, '10:30:00', '12:10:00', 'M', 43),
(21, 'D-0987', '3B0103', 'B5-4', 'B', 5, '08:00:00', '09:40:00', 'M', 43),
(22, 'G-3687', '8B0116', 'B5-3', 'B', 2, '08:00:00', '09:40:00', 'M', 44),
(23, 'A-1234', '2A0125', 'LAB-2', 'B', 5, '11:20:00', '13:00:00', 'M', 43),
(24, 'A-1234', '2A0125', 'LAB-1', 'B', 2, '13:00:00', '14:40:00', 'M', 43),
(25, 'E-6093', '5A0060', 'LAB-1', 'B', 2, '10:30:00', '12:10:00', 'M', 44),
(26, 'E-6093', '5A0060', 'LAB-1', 'B', 5, '09:40:00', '11:20:00', 'M', 44),
(27, 'E-6093', '5A0060', 'B5-3', 'B', 4, '12:10:00', '14:40:00', 'M', 44),
(28, 'C-45678', '3B0058', 'B5-5', 'C', 5, '09:40:00', '11:20:00', 'M', 42),
(29, 'B-4321', '2C0187', 'B5-5', 'C', 2, '10:30:00', '12:10:00', 'M', 45),
(30, 'B-4321', '2C0187', 'B5-5', 'C', 4, '09:40:00', '12:10:00', 'M', 45),
(31, 'F-9358', '6C0037', 'B5-5', 'C', 1, '11:20:00', '13:00:00', 'M', 44),
(32, 'F-9358', '6C0037', 'B5-5', 'C', 3, '12:10:00', '13:50:00', 'M', 44),
(33, 'D-0987', '3B0103', 'B5-5', 'C', 3, '07:10:00', '10:30:00', 'M', 43),
(34, 'D-0987', '3B0103', 'B5-5', 'C', 5, '11:20:00', '13:00:50', 'M', 43),
(35, 'G-3687', '8B0116', 'B5-5', 'C', 3, '10:30:00', '12:10:00', 'M', 45),
(36, 'A-1234', '2A0125', 'LAB-1', 'C', 1, '13:00:00', '16:20:00', 'M', 45),
(37, 'E-6093', '5A0060', 'LAB-1', 'C', 2, '07:10:00', '09:40:00', 'M', 42),
(38, 'E-6093', '5A0060', 'LAB-2', 'C', 6, '07:10:00', '08:50:00', 'M', 42),
(39, 'E-6093', '5A0060', 'B5-4', 'C', 2, '12:10:00', '13:50:00', 'M', 42),
(40, 'C-45678', '3A0014', 'B5-3', 'A', 3, '12:10:00', '14:40:00', 'M', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion` (
  `cod_liquidacion` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `liquidacion`
--

INSERT INTO `liquidacion` (`cod_liquidacion`) VALUES
('1234567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `cod_matricula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cod_pago_fk` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cod_alumno_fk` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `cod_plan_curricular_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`cod_matricula`, `cod_pago_fk`, `cod_alumno_fk`, `anio`, `cod_plan_curricular_fk`) VALUES
('20152372152019', '1234567890', '2015237215', 2019, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `cod_nivel` int(11) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`cod_nivel`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'docente'),
(3, 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `cod_pago` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` bigint(20) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`cod_pago`, `fecha`, `monto`) VALUES
('1234567890', 1571368788315, '164.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `dni` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `anio_nacimiento` date NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`dni`, `apellido_paterno`, `apellido_materno`, `nombres`, `anio_nacimiento`, `sexo`) VALUES
('11111111', 'VILCHEZ', 'GONZALES', 'RAUL', '1990-03-28', 'MASCULINO'),
('49706895', 'MANRIQUE', 'TAPIA', 'ALEXIS', '1988-12-04', 'MASCULINO'),
('58690498', 'QUISPE', 'RODRIGUEZ', 'LEONARDO', '1987-08-22', 'MASCULINO'),
('68950134', 'SAAVEDRA', 'RAMIREZ', 'NANCY', '1986-07-16', 'FEMENINO'),
('70473512', 'CORDOVA', 'SANCHEZ', 'JULIETA', '1989-02-18', 'FEMENINO'),
('70594822', 'CALIXTRO', 'MENDOZA', 'HUMBERTO', '1979-05-26', 'MASCULINO'),
('70776456', 'AYALA', 'VIVAS', 'JESUS DANIEL', '1996-11-21', 'MASCULINO'),
('74637589', 'MEDRANO', 'VELARDE', 'JORGE', '1982-04-15', 'MASCULINO'),
('79509789', 'BAUTISTA', 'LASO', 'TERESA', '1985-06-03', 'FEMENINO'),
('86957843', 'TICSE', 'NAVARRETE', 'ELOY', '1980-10-09', 'MASCULINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_curricular`
--

CREATE TABLE `plan_curricular` (
  `cod_plan_curricular` int(11) NOT NULL,
  `cod_carrera_fk` int(11) NOT NULL,
  `anio` varchar(6) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plan_curricular`
--

INSERT INTO `plan_curricular` (`cod_plan_curricular`, `cod_carrera_fk`, `anio`) VALUES
(3, 27, '2010');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `dni_fk` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cod_nivel_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `dni_fk`, `codigo`, `clave`, `cod_nivel_fk`) VALUES
(2, '70776456', '2015237215', 'daniel7712', 3),
(3, '11111111', '2015111111', 'admin123.', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activacion`
--
ALTER TABLE `activacion`
  ADD PRIMARY KEY (`cod_activacion`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cod_administrador`),
  ADD KEY `dni_fk` (`dni_fk`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`cod_alumno`),
  ADD KEY `cod_carrera_fk` (`cod_carrera_fk`),
  ADD KEY `dni_fk` (`dni_fk`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`cod_aula`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`cod_carrera`),
  ADD KEY `cod_facultad_fk` (`cod_facultad_fk`);

--
-- Indices de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  ADD PRIMARY KEY (`num_ciclo`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_curso`),
  ADD KEY `cod_plan_curricular_fk` (`cod_plan_curricular_fk`),
  ADD KEY `num_ciclo_fk` (`num_ciclo_fk`);

--
-- Indices de la tabla `cursos_llevados`
--
ALTER TABLE `cursos_llevados`
  ADD KEY `cod_alumno_fk` (`cod_alumno_fk`),
  ADD KEY `cod_curso_fk` (`cod_curso_fk`);

--
-- Indices de la tabla `cursos_pre_requisitos`
--
ALTER TABLE `cursos_pre_requisitos`
  ADD KEY `cod_curso_fk` (`cod_curso_fk`),
  ADD KEY `cod_curso_requisito_fk` (`cod_curso_requisito_fk`);

--
-- Indices de la tabla `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`cod_dia`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`cod_docente`),
  ADD KEY `dni` (`dni_fk`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`cod_facultad`);

--
-- Indices de la tabla `horario_alumno`
--
ALTER TABLE `horario_alumno`
  ADD KEY `cod_horario_curso_fk` (`cod_horario_curso_fk`),
  ADD KEY `cod_matricula_fk` (`cod_matricula_fk`);

--
-- Indices de la tabla `horario_curso`
--
ALTER TABLE `horario_curso`
  ADD PRIMARY KEY (`cod_horario_curso`),
  ADD KEY `cod_docente_fk` (`cod_docente_fk`),
  ADD KEY `cod_curso_fk` (`cod_curso_fk`),
  ADD KEY `cod_aula_fk` (`cod_aula_fk`),
  ADD KEY `dia` (`cod_dia_fk`);

--
-- Indices de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD PRIMARY KEY (`cod_liquidacion`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`cod_matricula`),
  ADD KEY `cod_pago_fk` (`cod_pago_fk`),
  ADD KEY `cod_alumno_fk` (`cod_alumno_fk`),
  ADD KEY `cod_plan_curricular_fk` (`cod_plan_curricular_fk`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`cod_nivel`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`cod_pago`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `plan_curricular`
--
ALTER TABLE `plan_curricular`
  ADD PRIMARY KEY (`cod_plan_curricular`),
  ADD KEY `cod_carrera_fk` (`cod_carrera_fk`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD KEY `cod_nivel_fk` (`cod_nivel_fk`),
  ADD KEY `cod_alumno_fk` (`dni_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `cod_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `cod_facultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `horario_curso`
--
ALTER TABLE `horario_curso`
  MODIFY `cod_horario_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `plan_curricular`
--
ALTER TABLE `plan_curricular`
  MODIFY `cod_plan_curricular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`dni_fk`) REFERENCES `persona` (`dni`);

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`dni_fk`) REFERENCES `persona` (`dni`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`cod_carrera_fk`) REFERENCES `carrera` (`cod_carrera`);

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `carrera_ibfk_1` FOREIGN KEY (`cod_facultad_fk`) REFERENCES `facultad` (`cod_facultad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `cod_plan_curricular_fk` FOREIGN KEY (`cod_plan_curricular_fk`) REFERENCES `plan_curricular` (`cod_plan_curricular`),
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`num_ciclo_fk`) REFERENCES `ciclo` (`num_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cursos_llevados`
--
ALTER TABLE `cursos_llevados`
  ADD CONSTRAINT `cursos_llevados_ibfk_1` FOREIGN KEY (`cod_curso_fk`) REFERENCES `curso` (`cod_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_llevados_ibfk_2` FOREIGN KEY (`cod_alumno_fk`) REFERENCES `alumno` (`cod_alumno`);

--
-- Filtros para la tabla `cursos_pre_requisitos`
--
ALTER TABLE `cursos_pre_requisitos`
  ADD CONSTRAINT `cursos_pre_requisitos_ibfk_1` FOREIGN KEY (`cod_curso_fk`) REFERENCES `curso` (`cod_curso`),
  ADD CONSTRAINT `cursos_pre_requisitos_ibfk_2` FOREIGN KEY (`cod_curso_requisito_fk`) REFERENCES `curso` (`cod_curso`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`dni_fk`) REFERENCES `persona` (`dni`);

--
-- Filtros para la tabla `horario_alumno`
--
ALTER TABLE `horario_alumno`
  ADD CONSTRAINT `horario_alumno_ibfk_1` FOREIGN KEY (`cod_horario_curso_fk`) REFERENCES `horario_curso` (`cod_horario_curso`),
  ADD CONSTRAINT `horario_alumno_ibfk_2` FOREIGN KEY (`cod_matricula_fk`) REFERENCES `matricula` (`cod_matricula`);

--
-- Filtros para la tabla `horario_curso`
--
ALTER TABLE `horario_curso`
  ADD CONSTRAINT `cod_dia_ibfk_4` FOREIGN KEY (`cod_dia_fk`) REFERENCES `dia` (`cod_dia`),
  ADD CONSTRAINT `horario_curso_ibfk_1` FOREIGN KEY (`cod_docente_fk`) REFERENCES `docente` (`cod_docente`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `horario_curso_ibfk_2` FOREIGN KEY (`cod_aula_fk`) REFERENCES `aula` (`cod_aula`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `horario_curso_ibfk_3` FOREIGN KEY (`cod_curso_fk`) REFERENCES `curso` (`cod_curso`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`cod_pago_fk`) REFERENCES `pago` (`cod_pago`),
  ADD CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`cod_plan_curricular_fk`) REFERENCES `plan_curricular` (`cod_plan_curricular`),
  ADD CONSTRAINT `matricula_ibfk_4` FOREIGN KEY (`cod_alumno_fk`) REFERENCES `alumno` (`cod_alumno`);

--
-- Filtros para la tabla `plan_curricular`
--
ALTER TABLE `plan_curricular`
  ADD CONSTRAINT `plan_curricular_ibfk_1` FOREIGN KEY (`cod_carrera_fk`) REFERENCES `carrera` (`cod_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`cod_nivel_fk`) REFERENCES `nivel` (`cod_nivel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`dni_fk`) REFERENCES `persona` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
