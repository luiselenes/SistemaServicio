-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2019 a las 05:09:13
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaservicio`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreaRelacionPartidaProyecto` (IN `cvep` VARCHAR(10), IN `np` BIGINT(20), IN `monto` DECIMAL(7,2))  BEGIN
	declare Total decimal(7,2);
	start transaction ;
	update proyectos set MontoAp = MontoAP - monto where CveP like cvep ;
	set Total = (select MontoAp from proyectos where CveP like cvep );
	IF Total < 0 Then 
		rollback ;
        select 'Error al registrar, se excede el monto restante'; 
          else 
		commit ;
        insert into proyectopartidas(Cvep,NumPartida,MontoUA) values(cvep,np,monto);
        select 'Registro Exitoso' ; 
    End If;
    select 'Hola';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spLlorar` (`cp` VARCHAR(10))  Begin
declare v decimal(7,2);
set v = (select total('ingsoft'));
select v ;
End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CRPP` (`cvep` VARCHAR(10), `np` BIGINT(20), `monto` DECIMAL(7,2))  BEGIN
declare Total decimal(7,2);
	start transaction ;
	update proyectos set MontoRes = MontoRes - monto where CveP like cvep ;
	set Total = (select total(cvep));
	IF Total < 0 Then 
		rollback ;
        select 'Error al registrar, se excede el monto restante'; 
          else 
		commit ;
        insert into proyectopartidas(Cvep,NumPartida,MontoUA) values(cvep,np,monto);
        select 'Registro Exitoso' ; 
    End If;
END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `total` (`cp` VARCHAR(10)) RETURNS DECIMAL(7,2) BEGIN
declare total decimal(7,2);
set total = (select MontoRes from proyectos where CveP like cp);
return total;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `CveP` varchar(10) NOT NULL,
  `TipoInf` varchar(50) NOT NULL,
  `Fini` date NOT NULL,
  `Ffin` date NOT NULL,
  `NomArch` varchar(100) DEFAULT NULL,
  `FName` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`CveP`, `TipoInf`, `Fini`, `Ffin`, `NomArch`, `FName`) VALUES
('FIS', '1er Avance', '2019-05-17', '2019-01-24', 'FISchuy.jpg', 'chuy.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `ID` bigint(20) NOT NULL,
  `Descripcion` text NOT NULL,
  `IDUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`ID`, `Descripcion`, `IDUsuario`) VALUES
(1, 'Creo un Reporte del Proyecto', 4),
(2, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto co', 4),
(3, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto con clave: FIS - Fundamentos de Ingenieria', 4),
(4, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto con clave: FIS - Fundamentos de Ingenieria', 4),
(5, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto con clave: FIS - Fundamentos de Ingenieria', 4),
(6, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto con clave: FIS - Fundamentos de Ingenieria', 4),
(7, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto con clave: FIS - Fundamentos de Ingenieria', 4),
(8, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto con clave: FIS - Fundamentos de Ingenieria', 4),
(9, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto con clave: ingsoft - ingenieria de software', 4),
(10, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto con clave: ingsoft - ingenieria de software', 4),
(11, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto con clave: ingsoft - ingenieria de software', 4),
(12, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe para el proyecto con clave: ingsoft - ingenieria de software', 4),
(13, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(14, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(15, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(16, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(17, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(18, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(19, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(20, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(21, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(22, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(23, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(24, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(25, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(26, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(27, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(28, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(29, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(30, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(31, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(32, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(33, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(34, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(35, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(36, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(37, 'Gaxiola Sánchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(38, 'Gaxiola Sanchez Omar Ivan Genero un reporte, el cual es el Primer Informe para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(39, 'Gaxiola Sanchez Omar Ivan Genero un reporte, el cual es el  para el proyecto con clave:  - ', 5),
(40, 'Gaxiola Sanchez Omar Ivan Genero un reporte, el cual es el Primer Informe Parcial para el proyecto con clave: AlgEvol - Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', 5),
(41, 'Rosa del Carmen Guerrero Vazquez Genero un reporte, el cual es el Primer Informe Parcial para el proyecto con clave: FIS - Fundamentos de Ingenieria', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

CREATE TABLE `partidas` (
  `NumPartida` bigint(20) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`NumPartida`, `Titulo`, `Descripcion`) VALUES
(21101, 'Papelería', ''),
(21201, 'Toner', ''),
(21401, 'MATERIALES Y ÚTILES CONSUMIBLES PARA EL PROCESAMIENTO EN EQUIPOS Y BIENES INFORMATICOS', 'Asignaciones destinadas a la adquisición de insumos utilizados en el procesamiento, grabación, como son disco duros, dispositivos USB, disco compacto (CD y DVD) e impresión de datos, así como los materiales para la limpieza y protección de equipos tales como: medios ópticos y magnéticos, apuntadores, protectores de vídeo, fundas, solventes y otros.'),
(21501, '', ''),
(22201, 'PRODUCTOS ALIMENTICIOS PARA ANIMALES', 'Asignaciones destinadas para la adquisición de productos alimenticios para la manutención de animales propiedad o bajo el cuidado de dependencias y entidades, tales como: forrajes frescos y achicalados, alimentos preparados, entre otros, así como los demás gastos necesarios para la alimentación de los mismos.'),
(23101, 'PRODUCTOS ALIMENTICIOS, AGROPRECUARIOS Y FORESTALES ADQUIRIDOS COMO MATERIA PRIMA', 'Asignaciones destinadas a la adquisición de productos alimenticios como materias primas en estado natural, transformadas o semitransformadas, de naturaleza vegetal y animal que se utilizan en los procesos productivos, diferentes a las contenidas en las demás partidas de este Clasificador.'),
(23501, 'PRODUCTOS QUIMICOS, FARMACEUTICOS Y DE LABORATORIO ADQUIRIDOS COMO MATERIA PRIMA', 'Asignaciones destinadas a la adquisición de farmacéuticos y botánicos, productos antisépticos de uso farmacéutico, sustancias para diagnóstico, complementos alimenticios, plasmas y otros derivados de la sangre y productos médicos veterinarios, entre otros, como materias primas en estado natural, transformadas o semitransformadas, que se utilizan en los procesos productivos, diferentes a las contenidas en las demás partidas de este Clasificador.'),
(23701, 'Productos de cuero, piel, plástico, y hule adquiridos como materia prima.', ' '),
(24501, 'VIDRIO Y PRODUCTOS DE VIDRIO', 'Asignaciones destinadas a la adquisición de vidrio plano, templado, inastillable y otros vidrios laminados; espejos; envases y artículos de vidrio y fibra de vidrio.'),
(24601, 'MATERIAL ELECTRICO Y ELECTRONICO', 'Asignaciones destinadas a la adquisición de todo tipo de material eléctrico y electrónico, tales como: cables, interruptores, tubos fluorescentes, focos, aislantes, electrodos, transistores, alambres, lámparas, entre otros, que requieran las líneas de transmisión telegráfica, telefónica y de telecomunicaciones, sean aéreas, radiotelegráficas, entre otras.'),
(24701, 'ARTICULOS METALICOS PARA LA CONSTRUCCION', 'Asignaciones destinadas a cubrir los gastos por adquisición de productos para construcción hechos de hierro, acero, aluminio, cobre, zinc, bronce y otras aleaciones tales como: lingotes, planchas, planchones, hojalata, perfiles, alambres, varillas, ventanas y puertas metálicas, clavos, tornillos y tuercas de todo tipo; mallas ciclónicas y cercas metálicas, etc.'),
(24901, 'Otros materiales y artículos de construcción y reparación.', ''),
(25101, 'PRODUCTOS QUIMICOS BASICOS', 'Asignaciones destinadas a la adquisición de productos químicos básicos: petroquímicos como benceno, tolueno, xileno, etileno, propileno, estireno a partir del gas natural, del gas licuado del petróleo y de destilados y otras facciones posteriores a la refinación del petróleo; reactivos, fluoruros, fosfatos, nitratos, óxidos, alquinos, marcadores genéticos, entre otros.'),
(25201, 'PLAGUICIDAS, ABONOS Y FERTILIZANTES', 'Asignaciones destinadas a la adquisición de este tipo de productos cuyo estado de fabricación se encuentre terminado, tales como: fertilizantes complejos e inorgánicos, fungicidas, herbicidas, raticidas, entre otros. Incluye los abonos que se comercializan en estado natural.'),
(25301, 'MEDICINAS Y PRODUCTOS FARMACEUTICOS', 'Asignaciones destinadas a la adquisición de medicinas y productos farmacéuticos de aplicación humana o animal; tales como: vacunas, drogas, medicinas de patente, medicamentos, sueros, plasma, oxígeno, entre otros.'),
(25401, 'MATERIALES, ACCESORIOS Y SUMINISTROS MEDICOS', 'Asignaciones destinadas a la adquisición de toda clase de materiales y suministros médicos que se requieran en hospitales, unidades sanitarias, consultorios, clínicas veterinarias, etc., tales como: jeringas, gasas, agujas, vendajes, material de sutura, espátulas, lentes, lancetas, hojas de bisturí, y prótesis en general, entre otros.'),
(25501, 'MATERIALES, ACCESORIOS Y SUMINISTROS DE LABORATORIO', 'Asignaciones destinadas a la adquisición de toda clase de materiales y suministros, tales como: cilindros graduados, matraces, probetas, mecheros, probetas, mecheros, tanques de revelado, materiales para radiografía, electrocardiografía, medicina nuclear, y demás materiales y suministros utilizados en los laboratorios médicos, químicos, de investigación, fotográficos, cinematográficos, entre otros. Esta partida incluye animales para experimentación.'),
(25901, 'OTROS PRODUCTOS QUIMICOS', 'Asignaciones destinadas a la adquisición de productos químicos básicos inorgánicos tales como: ácidos, bases y sales inorgánicas, cloro, negro de humo y el enriquecimiento de materiales radioactivos. Así como productos químicos básicos orgánicos, tales como: ácidos, anhídridos , alcoholes de uso industrial, cetonas, aldehídos, ácidos grasos, aguarrás, colofonia, colorantes naturales no comestibles, materiales sintéticos para perfumes y cosméticos, edulcorantes sintéticos, entre otros.'),
(29101, 'HERRAMIENTAS MENORES', 'Asignaciones destinadas a la adquisición de herramientas auxiliares de trabajo, utilizadas en carpintería, silvicultura, horticultura, ganadería, agricultura y otras industrias, tales como: desarmadores, martillos, llaves, para tuercas, carretillas de mano, cuchillos, navajas, tijeras de mano, sierras de mano, alicates, hojas para seguetas, micrómetros, cintas métricas, pinzas, prensas, berbiquíes, garlopas, taladros, zapapicos, escaleras, detectores de metales manuales y demás bienes de consumo similares. Excluye las refacciones y accesorios señalados en este capítulo: así como herramientas y maquinas herramientas consideradas en el capítulo 5000 Bienes muebles, inmuebles e intangibles.'),
(29401, 'REFACCIONES Y ACCESORIOS PARA EQUIPO DE COMPUTO Y TELECOMUNICACIONES', ' Asignaciones destinadas a la adquisición de componentes y dispositivos internos o externos que se integran al equipo de cómputo y/o telecomunicaciones, con el objetivo de conservar o recuperar su funcionalidad y que son de difícil control de inventarios, tales como: tarjetas electrónicas, discos (CD y DVD) internos, puertos USB, HDMI, circuitos, bocinas, pantallas, ratón, teclados, cámaras, entre otros.'),
(29501, 'REFACCIONES Y ACCESORIOS MENORES DE EQUIPO E INSTRUMENTAL MEDICO Y DE LABORATORIO', 'Asignaciones destinadas a la adquisición de refacciones y accesorios para todo tipo de aparatos e instrumentos médicos y de laboratorio.'),
(33301, 'SERVICIO DE DESARROLLO DE APLICACIONES INFORMATICAS', 'Asignaciones destinadas a cubrir el costo de los servicios profesionales que se contraten con personas físicas y morales para el desarrollo de sistemas, sitios o páginas de internet, procesamiento y elaboración de programas, ploteo por computadoras, reproducción de información en medios magnéticos, mantenimiento de sítios y/o páginas web, distintos de los contratados mediante licencia de uso previstos en la partida 32701 \"Patentes, derechos de autor, regalías y otros\".'),
(33304, 'SERVICIO DE MATENIMIENTO DE APLICACIONES INFORMÁTICAS', 'Asignaciones destinadas a cubrir el costo de los servicios profesionales que se contraten con personas físicas y morales para el mantenimiento de sitios y/o páginas web, así como el mantenimiento y soporte a los sistemas y programas ya existentes, distintos de los contratados mediante licencia de uso previstos en la partida 32701 \"Patentes, derechos de autor, regalías y otros\".'),
(33601, 'SERVICIOS RELACIONADOS CON TRADUCCIONES', 'Asignaciones destinadas a cubrir el costo de la contratación de servicios con personas físicas o morales, para realizar todo tipo de traducciones escritas o verbales.'),
(33901, 'SUBCONTRATACION DE SERVICIOIS CON TERCEROS', 'Asignaciones destinadas a cubrir el costo de los servicios provenientes de la subcontratación que las dependencias y entidades lleven a cabo con personas físicas o morales especializadas, que resulten más convenientes o generen ahorros en la prestación de bienes o servicios públicos, tales como: servicio de mantenimiento, maquila de productos, medicamentos, servicio médico, hospitalario, de laboratorio, entre otros. Lo anterior, cuando no sea posible atenderlos de manera directa por la propia dependencia o entidad.'),
(35301, 'MANTENIMIENTO Y CONSERVACION DE BIENES INFORMATICOS', 'Asignaciones destinadas a cubrir el costo de los servicios que se contraten con terceros para el mantenimiento y conservación de bienes informáticos, tales como: computadoras, impresoras, dispositivos de seguridad, reguladores, fuentes de potencia ininterrumpida, entre otros, incluido el pago de deducibles de seguros.'),
(35401, 'INSTALACION, REPARACION Y MANTENIMIENTO DE EQUIPO E INSTRUMENTAL MEDICO Y DE LABORATORIO', 'Asignaciones destinadas a cubrir los gastos de servicios de instalación, reparación y mantenimiento de equipo e instrumental médico y de laboratorio.'),
(35702, 'MANTENIMIENTO Y CONSERVACION DE MAQUINARIA Y EQUIPO', 'Asignaciones destinadas a cubrir el costo de los servicios de mantenimiento y conservación de la maquinaria y equipo propiedad o al servicio de las dependencias y entidades, tales como: tractores, palas mecánicas, dragas, fertilizadoras, vehículos, embarcaciones, aeronaves, equipo especializado instalado en los inmuebles, entre otros, cuando se efectúen por cuenta de terceros, incluido el pago de deducibles de seguros.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `probador`
--

CREATE TABLE `probador` (
  `directorio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `probador`
--

INSERT INTO `probador` (`directorio`) VALUES
('..Informes233232Diagrama.pdf'),
('..\\Informes\\233232Diagrama.pdf'),
('..Informesprueba.txt'),
(''),
('LOGO_TEC_PNG_OK.png'),
('3224I2MMTO.png'),
('Pro3Corregido2.png'),
('supervision.sql');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectopartidas`
--

CREATE TABLE `proyectopartidas` (
  `Cvep` varchar(10) NOT NULL,
  `NumPartida` bigint(20) NOT NULL,
  `MontoUA` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyectopartidas`
--

INSERT INTO `proyectopartidas` (`Cvep`, `NumPartida`, `MontoUA`) VALUES
('8tyta', 21201, '100.00'),
('FIS', 24601, '100.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `CveP` varchar(10) NOT NULL,
  `TituloP` mediumtext NOT NULL,
  `VigI` date NOT NULL,
  `VigF` date NOT NULL,
  `DirProy` varchar(100) NOT NULL,
  `Colaboradores` varchar(200) NOT NULL,
  `MontoAp` decimal(7,2) DEFAULT NULL,
  `MontoRes` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`CveP`, `TituloP`, `VigI`, `VigF`, `DirProy`, `Colaboradores`, `MontoAp`, `MontoRes`) VALUES
('8tyta', 'informatica empresarial de por ahi', '2019-04-03', '2019-04-02', 'Jesus Alberto Cervantes Medina', 'no se sabe aun quien xD aun', '1000.00', '600.00'),
('AlgEvol', 'Aplicacion de computo paralelo al algoritmo evolutivo para optimizacion multiobjetivo MOEA/D', '2019-01-01', '2019-01-01', 'Gaxiola Sï¿½nchez Omar Ivan', 'S/C', '1000.00', '1000.00'),
('atenf', 'Analisis de la demanda de atencion de enfermedades renales en hospitales publicos', '2019-01-01', '2019-01-01', 'López Varela Carmen Guadalupe', 'S/C', '1000.00', '1000.00'),
('Bambo', 'Bambobo Express', '2019-04-09', '2019-04-23', 'Antonio Huerta', 'Jesus Cervantes', '1000.00', '600.00'),
('Cafezaso', 'Liderazgo y clima organizacional como predictores de la calidad en el servicio de suministro de tiendas de abarrotes', '2019-01-01', '2019-01-01', 'Lugo Félix Alejandro', 'S/C', '1000.00', '1000.00'),
('FIS', 'Fundamentos de Ingenieria', '2019-04-03', '2019-04-24', 'Rosa del Carmen Guerrero Vazquez', 'Jesus Alberto Cervantes Medina, Karime Gutierrez', '1000.00', '600.00'),
('geo', 'rosita', '2019-04-01', '2019-04-30', 'Rosa del Carmen Guerrero Vazquez', 'geo', '1000.00', '600.00'),
('geo22', 'rosita22', '2019-04-01', '2019-04-30', 'Rosa del Carmen Guerrero Vazquez', 'geo', '1000.00', '600.00'),
('IENET', 'Internet IEN', '2019-04-02', '2019-04-01', 'Luis Gilberto Urias', 'Jesus Alberto Cervantes Medina, Jonathan Curiel Envila', '1000.00', '600.00'),
('ingsoft', 'ingenieria de software', '2019-04-24', '2018-02-08', 'Rosa del Carmen Guerrero Vazquez', 'Jesus Alberto Cervantes Medina, Irenia Marlen NuÃ±ez Ruelas', '1000.00', '600.00'),
('ingwbmodi', 'Ingenieria Web', '2019-04-24', '2019-04-30', 'Jesus Alberto Cervantes Medina', 'Jesus Alberto Cervantes Medina, Irenia Marlen NuÃ±ez Ruelas', '1000.00', '600.00'),
('LA2', 'Compilador Automatas 2', '2018-08-27', '2018-12-07', 'Ramon Zatarain Cabada', 'Jesus Alberto Cervantes Medina, Irenia Marlen NuÃ±ez Ruelas', '1000.00', '600.00'),
('LA21', 'Compilador Automatas 2.3', '2019-04-24', '2019-04-29', 'Ramon Zatarain Cabada', '', '1000.00', '600.00'),
('MVC', 'Prueba MVC ', '2018-11-13', '2019-04-30', 'Jesus Alberto Cervantes Medina', 'Irenia NuÃ±ez', '1000.00', '600.00'),
('Pro3', 'Scaneador', '2016-07-31', '2016-12-14', 'Jesus Astolfo Rodriguez Valenzuela', 'Jesus Alberto Cervantes Medina, Rosa Guerrero Vazquez', '1000.00', '600.00'),
('ProdBio', 'Caracterizacion, control, y mejora de procesos en la elaboracion de productor biologicos', '2019-01-01', '2019-01-01', 'Ochoa Gallegos Jesús Ramón', 'S/C', '1000.00', '1000.00'),
('ProyAuto1B', 'Compilador Automatas 1', '2018-01-22', '2018-06-01', 'Rosalio Zatarain Cabada', 'Jesus Alberto Cervantes Medina, Irenia Marlen NuÃ±ez Ruelas', '1000.00', '600.00'),
('proyecto1', 'Proyecto1', '2019-01-01', '2019-01-03', 'Guerrero Vasquez Rosa del Carmen', 'Jesus Cervantes, Renato Mascareno', '1000.00', '600.00'),
('proyecto2', 'Proyecto2', '2018-03-02', '2019-01-03', 'Jesus Alberto Cervantes Medina', 'Rosa Del Carmen Guerrero Vazquez, Luis Alfredo Electus, Anahi Manjarrez', '1000.00', '600.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Uname` varchar(45) NOT NULL,
  `Pass` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `tipoUser` varchar(30) NOT NULL,
  `NombreCompleto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Uname`, `Pass`, `Email`, `tipoUser`, `NombreCompleto`) VALUES
(3, 'ING CERVANTES', 'vb60', 'jscervantesmedina@gmail.com', 'Administrador', 'Jesus Alberto Cervantes Medina'),
(4, 'RositaMazapan', 'GeoYRosa', 'rositagv17@gmail.com', 'Administrativo', 'Rosa del Carmen Guerrero Vazquez'),
(5, 'DGSOI', 'DGSOI', 'kgugj@gmail.com', 'Administrativo', 'Gaxiola Sanchez Omar Ivan'),
(6, 'Chuy', 'vb60', 'algun', 'Administrador', 'Jesus Cervantes'),
(7, 'MCOGJR', 'MCOGJR', 'MCOGJR', 'Administrativo', 'Ochoa Gallegos Jesus Ramon'),
(8, 'ILFA', 'ILFA22', 'ILFA', 'Administrativo', 'Lugo Felix Alejandro'),
(9, 'DLVCG', 'DLVGC123', 'CorreoProbado@gmail.com', 'Administrativo', 'Lopez Varela Carmen Guadalupe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`CveP`,`TipoInf`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Indices de la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`NumPartida`);

--
-- Indices de la tabla `proyectopartidas`
--
ALTER TABLE `proyectopartidas`
  ADD KEY `Cvep` (`Cvep`),
  ADD KEY `NumPartida` (`NumPartida`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`CveP`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Uname` (`Uname`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informes`
--
ALTER TABLE `informes`
  ADD CONSTRAINT `informes_ibfk_1` FOREIGN KEY (`CveP`) REFERENCES `proyectos` (`CveP`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `proyectopartidas`
--
ALTER TABLE `proyectopartidas`
  ADD CONSTRAINT `proyectopartidas_ibfk_1` FOREIGN KEY (`Cvep`) REFERENCES `proyectos` (`CveP`),
  ADD CONSTRAINT `proyectopartidas_ibfk_2` FOREIGN KEY (`NumPartida`) REFERENCES `partidas` (`NumPartida`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
