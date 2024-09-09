-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2024 a las 04:12:24
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `tipo_carrera` enum('Licenciatura','Tecnicatura','Profesorado','Ingeniería','otros') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `nombre`, `descripcion`, `titulo`, `tipo_carrera`) VALUES
(1, 'Licenciatura en Gestión Ambiental', 'La Licenciatura en Gestión Ambiental se propone la formación de profesionales con una visión sistémica, ética y científica, asumiendo el compromiso de lograr un estrecho lazo con el medio local y regional; atendiendo a sus problemáticas y demandas, y favoreciendo la retroalimentación necesaria para un desarrollo sustentable, desde los saberes y capacidades propias de su campo profesional.', 'Licenciado en Gestión Ambiental', 'Licenciatura'),
(2, 'Tecnicatura Universitaria en Ciberseguridad', 'Participar en estudios sobre la situación actualizada en materia de ciberseguridad.\nAsesorar en la gestión de programas de ciberseguridad y ciberdelito.\nParticipar en equipos multidisciplinarios para la elaboración de soluciones ante incidentes de ciberseguridad y ciberdelitos.\nPromover el desarrollo de iniciativas públicas y privadas sobre la creación y asesoramiento en emprendimientos y empresas relacionados a la temática.\n', 'Técnico Universitario en Ciberseguridad', 'Tecnicatura'),
(3, 'Tecnicatura Universitaria en Gestión Ambiental', 'La Tecnicatura Universitaria en Gestión Ambiental se propone la formación de profesionales con una visión sistémica, ética y científica que aporten técnicamente al desarrollo sustentable local, nacional y regional desde saberes y capacidades propias de su campo profesional.', 'Técnico Universitario en Gestión Ambiental', 'Tecnicatura'),
(4, 'Tecnicatura en Desarrollo de Videojuegos', 'Formar técnicos capaces de desempeñarse con solvencia en el desarrollo integral de videojuegos atendiendo al diseño, la programación, el arte, la realización y la comercialización, áreas disciplinares clave para la concreción de los proyectos.', 'Técnico en Desarrollo de Videojuegos', 'Tecnicatura'),
(5, 'Tecnicatura en Edición Audiovisual', 'Las tecnicaturas en Edición Audiovisual y en Sonido Audiovisual son dos carreras distintas y complementarias que aportan conocimientos y herramientas para desarrollarse profesionalmente en el campo de la producción y posproducción audiovisual en el marco del auge de las Tecnologías de Información y Comunicación (TIC). En este sentido, se concibe al audiovisual como un objeto comunicacional complejo y dinámico que requiere un abordaje multidisciplinario y una alta dosis de creatividad.', 'Técnico en Edición Audiovisual', 'Tecnicatura'),
(6, 'Tecnicatura en Sonido Audiovisual', 'Las tecnicaturas en Edición Audiovisual y en Sonido Audiovisual son dos carreras distintas y complementarias que aportan conocimientos y herramientas para desarrollarse profesionalmente en el campo de la producción y posproducción audiovisual en el marco del auge de las Tecnologías de Información y Comunicación (TIC). En este sentido, se concibe al audiovisual como un objeto comunicacional complejo y dinámico que requiere un abordaje multidisciplinario y una alta dosis de creatividad.', 'Técnico en Sonido Audiovisual', 'Tecnicatura'),
(7, 'Licenciatura en Ciencias Forenses y Criminología', 'La Licenciatura en Ciencias Forenses y Criminología se propone la formación de profesionales con una visión sistémica, ética y científica que aporten técnicamente a la investigación de delitos y al estudio de políticas públicas de seguridad desde saberes y capacidades propias de su campo profesional.', 'Licenciado en Ciencias Forenses y Criminología', 'Licenciatura'),
(8, 'Licenciatura en Economía', 'Formar profesionales con los conocimientos y capacidades que aporten técnicamente a los debates sobre cuestiones económicas desde un marco multidisciplinario, haciendo frente a los desafíos que plantean la globalización y los constantes adelantos tecnológicos.', 'Licenciado en Economía', 'Licenciatura'),
(9, 'Tecnicatura Universitaria en Análisis Contable', 'Formar profesionales con los conocimientos y capacidades que aporten técnicamente a la gestión contable de empresas, organizaciones sin fin de lucro y emprendimientos.', 'Técnico Universitario en Análisis Contable', 'Tecnicatura'),
(10, 'Tecnicatura Universitaria en Criminalística', 'La Tecnicatura Universitaria en Criminalística se propone la formación de profesionales con una visión sistémica, ética y científica que aporten técnicamente a la investigación de delitos desde saberes y capacidades propias de su campo profesional.', 'Técnico Universitario en Criminalística', 'Tecnicatura'),
(11, 'Licenciatura en Gestión Educativa CCC', 'Brindar una formación universitaria a los/as actuales y futuros responsables de dirigir, asesorar, gestionar y supervisar una educación de calidad en las instituciones educativas, en el actual contexto de transformaciones de la educación en nuestro país establecido por la Ley de Educación Nacional Nº 26206.', 'Licenciado en Gestión Educativa', 'Licenciatura'),
(12, 'Licenciatura en Gestión Pública CCC', 'La Licenciatura en Gestión Pública se propone la formación de profesionales capaces de analizar la realidad e intervenirla a partir de los conocimientos sobre las dinámicas de funcionamiento del Estado, del gobierno y de la gestión pública, sus estructuras, los actores que intervienen y lo relativo a los sistemas políticos contemporáneos. A su vez, se pretende profundizar los conocimientos sobre el diseño, análisis y evaluación de las políticas públicas, en general, con especial atención en las políticas sociales, prestando atención a los actores que intervienen en dichos procesos y los conflictos de intereses y de cooperación que implican.', 'Licenciado en Gestión Pública', 'Licenciatura'),
(13, 'Licenciatura en Psicopedagogía', 'El Licenciado/a en Psicopedagogía estará capacitado para prevenir, diagnosticar y realizar intervenciones de asesoramiento, orientación y tratamiento en toda situación donde el aprendizaje y sus vicisitudes se pongan en juego, tanto en ámbitos de salud, educativos, laborales y socio comunitarios, facilitando en los sujetos de diversas edades la construcción de sus proyectos de vida en la comunidad.', 'Licenciado en Psicopedagogía', 'Licenciatura'),
(14, 'Licenciatura en Psicopedagogía CCC', 'El Licenciado/a en Psicopedagogía estará capacitado para prevenir, diagnosticar y realizar intervenciones de asesoramiento, orientación y tratamiento en toda situación donde el aprendizaje y sus vicisitudes se pongan en juego, tanto en ámbitos de salud, educativos, laborales y socio comunitarios, facilitando en los sujetos de diversas edades la construcción de sus proyectos de vida en la comunidad.', 'Licenciado en Psicopedagogía', 'Licenciatura'),
(15, 'Profesorado en Educación Inicial', 'Formar Profesores/as en el Nivel Inicial que permita el ejercicio de la docencia y la formulación, el diseño y la ejecución de propuestas pedagógicas, didácticas y proyectos socioeducativos destinados a la Primera Infancia, en distintas instituciones de su campo de aplicación.', 'Profesor en Educación Inicial', 'Profesorado'),
(16, 'Tecnicatura Universitaria en Gestión Pública', 'La Tecnicatura Universitaria en Gestión Pública se propone la formación de profesionales con conocimientos en temas referidos al funcionamiento del Estado en sus diversos niveles (nacional, provincial, municipal) y que muestre capacidad para comprender la importancia del desarrollo de un Estado acorde a las necesidades sociales. Se pretende, a su vez, brindar conocimientos en aspectos que refieren al diseño, análisis y gestión de políticas públicas; las instituciones de gobierno y los procesos gubernamentales ligados a ellas; la comunicación y la economía de gobierno; la gestión de recursos humanos en el ámbito estatal y las particularidades que asume el sector público en Argentina.', 'Técnico Universitario en Gestión Pública', 'Tecnicatura'),
(17, 'Enfermería Universitaria', 'Formar profesionales en el campo de la Enfermería Universitaria, con conocimientos científicos, humanísticos, éticos, legales y políticos para proporcionar atención de enfermería a las personas, familias y grupos de la comunidad, con compromiso social y político; reconociendo y defendiendo la Salud, como un derecho humano y social y a la atención primaria, como estrategia de abordaje a la comunidad, con una actitud ética y de responsabilidad legal en el ejercicio profesional.', 'Enfermero Universitario', 'otros'),
(18, 'Licenciatura en Instrumentación Quirúrgica CCC', 'La Licenciatura en Instrumentación Quirúrgica, se propone brindar una formación científica, técnica, humanística y de investigación, en relación a la organización, asistencia, investigación y docencia en el campo de incumbencias, en instituciones públicas o privadas.', 'Licenciado en Instrumentación Quirúrgica', 'Licenciatura'),
(19, 'Tecnicatura Universitaria en Emergencias Médicas', 'La Tecnicatura Universitaria en Emergencias Médicas tiene como objetivo formar profesionales capaces de organizar sistemas de respuesta ante emergencias, en el marco de la legislación sanitaria vigente y bajo la supervisión del médico hasta el traslado del paciente al centro de mayor complejidad.', 'Técnico Universitario en Emergencias Médicas', 'Tecnicatura'),
(20, 'Tecnicatura Superior en Alimentos', 'El Técnico en Alimentos garantiza calidad y ética en industrias y producción primaria con las habilidades adquiridas.', 'Técnico Superior en Alimentos', 'Tecnicatura'),
(21, 'Tecnicatura Superior en Higiene y Seguridad', 'El Técnico en Higiene y Seguridad organiza, gestiona y controla la seguridad en el trabajo, planificando y organizando un plan.', 'Técnico Superior en Higiene y Seguridad', 'Tecnicatura'),
(22, 'Tecnicatura Superior en Desarrollo de Software', 'El Técnico en Software crea y mantiene software, trabajando en proyectos multidisciplinarios.', 'Técnico Superior en Desarrollo de Software', 'Tecnicatura'),
(23, 'Profesorado de Educación Secundaria Técnico Profesional', 'El presente plan de estudios tiene por finalidad la formación pedagógico-didáctica para la\npráctica profesional así como la actualización científico tecnológica destinadas a formar\ndocentes con título de base que puedan desarrollar su práctica en las instituciones de la\nmodalidad de Educación Técnico Profesional con nivel secundario técnico. Esto supone\nadmitir que las destinatarias y los destinatarios cuentan con saberes técnicos y científicos\ntecnológicos relativos a un campo ocupacional específico. Tales saberes deben poder ser\nreconocidos, actualizados y, particularmente, articulados y complementados por aquellos\nsaberes relativos a su profesionalidad docente.', 'Profesor de Educación Secundaria Técnico Profesional', 'Profesorado'),
(24, 'Profesorado en instrumento', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Instrumento)', 'Profesorado'),
(25, 'Profesor en Canto', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Canto)\n', 'Profesorado'),
(26, 'Profesorado en Dirección Coral', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Dirección Coral)', 'Profesorado'),
(27, 'Profesorado en Composición', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Composición)\n', 'Profesorado'),
(28, 'Profesorado en Educación Musical', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Educación Musical)\n', 'Profesorado'),
(29, '\r\nProfesorado en Musicología', 'En está carrera se podrá aprender la pedagogía para poder enseñar a otros el arte de la música.', 'Profesor en Música (orientación Musicología)\n', 'Profesorado'),
(30, 'Ingeniería Civil', 'Estudio de la construcción y diseño de infraestructuras', 'Ingeniero Civil', 'Ingeniería'),
(31, 'Ingeniería en Energía Eléctrica', 'Formación en generación y distribución de energía eléctrica', 'Ingeniero en Energía Eléctrica', 'Ingeniería'),
(32, 'Ingeniería Automotriz', 'Diseño y desarrollo de vehículos automotores', 'Ingeniero Automotriz', 'Ingeniería'),
(33, 'Ingeniería Mecánica', 'Aplicación de principios de ingeniería para el diseño de sistemas mecánicos', 'Ingeniero Mecánico', 'Ingeniería'),
(34, 'Licenciatura en Organización Industrial', 'Gestión de procesos industriales y optimización de recursos', 'Licenciado en Organización Industrial', 'Licenciatura'),
(35, 'Tecnicatura Superior en Administración', 'Formación en administración y gestión empresarial', 'Técnico Superior en Administración', 'Tecnicatura'),
(36, 'Tecnicatura en Gestión de la Industria Automotriz', 'Especialización en la gestión de procesos de producción automotriz', 'Técnico en Gestión Automotriz', 'Tecnicatura'),
(37, 'Tecnicatura en Moldes, Matrices y dispositivos', 'Diseño y fabricación de moldes y dispositivos industriales', 'Técnico en Moldes y Matrices', 'Tecnicatura'),
(38, 'Tecnicatura en Programación', 'Desarrollo de software y aplicaciones informáticas', 'Técnico en Programación', 'Tecnicatura'),
(39, 'Tecnicatura en Mecatrónica', 'Página en proceso', 'Técnico en mecatrónica', 'Tecnicatura'),
(40, 'Tecnicatura en Ciencia de Datos e Inteligencia Artificial', 'Página en proceso', 'Técnico en ciencia de datos e inteligencia artificial', 'Tecnicatura'),
(41, 'Profesorado de Inglés', 'Forma profesionales en el uso de la comunicación para promover el desarrollo social, cultural y económico en comunidades y organizaciones. Los estudiantes adquieren habilidades en periodismo, diseño gráfico, producción audiovisual y gestión de proyectos sociales.', 'Profesor de inglés', 'Profesorado'),
(42, 'Tecnicatura en Trabajo Social', 'Página en proceso', 'Técnico en trabajo social', 'Tecnicatura'),
(43, 'Tecnicatura en Comunicación Social para el Desarrollo', 'Prepara a los estudiantes para comprender los procesos de comunicación e influencia social, así como para aplicar estrategias comunicativas efectivas. Cubre áreas como periodismo, relaciones públicas, publicidad y producción multimedia.', 'Técnico en comunicación social para el desarrollo', 'Tecnicatura'),
(44, 'Profesorado de Educación Primaria', 'Formación de docentes para nivel primario', 'Profesor/a de Educación Primaria', 'Profesorado'),
(45, 'Profesorado para la Educación Secundaria en Biología', 'Formación de docentes en Biología para secundaria', 'Profesor/a en Biología', 'Profesorado'),
(47, 'Trayecto de Formación Pedagógica Complementaria para graduados técnicos de nivel superior-secundario', 'Formación pedagógica para técnicos y profesionales', 'Certificación Pedagógica', 'otros'),
(48, 'Profesorado para la Educación Secundaria en Física', 'Formación de docentes en Física para secundaria', 'Profesor/a en Física', 'Profesorado'),
(49, 'Profesor/a de Educación Secundaria en Matemática', 'Formación de docentes en Matemática para secundaria', 'Profesor/a en Matemática', 'Profesorado'),
(50, 'Profesorado de Educación Inicial', 'Formación de docentes para nivel inicial', 'Profesor/a de Educación Inicial', 'Profesorado'),
(51, 'Profesorado de Educación Secundaria en Geografía', 'Formación de docentes en Geografía para secundaria', 'Profesor/a en Geografía', 'Profesorado'),
(52, 'Profesorado de Educación Secundaria en Química', 'Formación de docentes en Química para secundaria', 'Profesor/a en Química', 'Profesorado'),
(53, 'Profesorado en Educación Primaria', 'Formación de docentes para nivel primario', 'Profesor/a en Educación Primaria', 'Profesorado'),
(54, 'Profesorado en Educación Física', 'Formación de docentes en Educación Física', 'Profesor/a en Educación Física', 'Profesorado'),
(55, 'Profesorado en Biología', 'Formación de docentes en Biología', 'Profesor/a en Biología', 'Profesorado'),
(56, 'Profesorado en Historia', 'Formación de docentes en Historia', 'Profesor/a en Historia', 'Profesorado'),
(57, 'Profesorado en Matemática', 'Formación de docentes en Matemática', 'Profesor/a en Matemática', 'Profesorado'),
(58, 'Profesorado en Lengua y Literatura', 'Formación de docentes en Lengua y Literatura', 'Profesor/a en Lengua y Literatura', 'Profesorado'),
(61, 'Licenciatura en Enfermería', 'Aplica cuidados de promoción, prevención, recuperación y rehabilitación en los tres niveles de atención en individuos sanos y enfermos, promoviendo el autocuidado e independencia precoz; en una relación interpersonal de participación mutua que asegure el respeto por la individualidad y dignidad personal de aquellos bajo su cuidado. Administra servicios de enfermería hospitalarios de menor complejidad y de comunidad; colabora en investigaciones en enfermería y otras relacionadas con el área de salud y participa en la educación para la salud.', 'Enfermero Universitario', 'Licenciatura'),
(62, 'Licenciatura en Logística', 'La Licenciatura en Logística abarca todo lo relacionado con la gestión de la cadena de suministros (supply chain), en cuanto al abastecimiento, producción y distribución. Se desarrolla sobre el concepto de logística integral relacionando transporte, movimiento y almacenamiento de bienes, desarrollo y sistematización de procesos y procedimientos, flujo y administración de información y controles.', 'Licenciado en Logística', 'Licenciatura'),
(63, 'Licenciatura en Seguridad', 'El licenciado en seguridad es un graduado universitario con sólida formación teórica, práctica y técnica en Seguridad como objeto de estudio, lo que le posibilita investigar, organizar, planificar, diseñar y conducir intervenciones adecuadas en proyectos, estrategias y acciones de seguridad en el marco de un Estado de Derecho.', 'Licenciado en Seguridad', 'Licenciatura'),
(64, 'Licenciatura en Seguridad e Higiene', 'Formar profesionales con capacidad para diagnosticar e intervenir en la resolución de problemas vinculados con la problemática de higiene y seguridad, según las áreas de competencias de sus carreras y en interacción con otras especialidades.', 'Licenciado en Seguridad e Higiene', 'Licenciatura'),
(65, 'Licenciatura en Gestión Gubernamental', 'El título de Licenciado/a tendrá validez nacional, pudiendo ejercer profesionalmente en cualquier área de la administración pública nacional, provincial o municipal dedicada al análisis, diseño, implementación y desarrollo de políticas públicas como así también para la comprensión, ejecución, coordinación y dirección de las actividades propias de la administración pública (nacional, provincial y municipal).', 'Licenciado en Gestión Gubernamental', 'Licenciatura'),
(66, 'Tecnicatura en Jardinería', 'Formar profesionales con conocimientos científicos, técnicos y estéticos que le permitan utilizar la tecnología existente y su creatividad artística para el diseño de una obra de jardinería, brindar las herramientas teóricas y generar aptitudes para la transformación y transferencia de los avances tecnológicos al medio laboral, y fomentar un pensamiento reflexivo sobre la realidad del sector a niveles nacional e internacional.', 'Técnico en Jardinería', 'Tecnicatura'),
(67, 'Tecnicatura en Floricultura', 'La carrera de Floricultura tiene por objetivo formar profesionales capacitados para la producción y el cultivo de plantas ornamentales, brindar los conocimientos científico técnicos a través de un enfoque interdisciplinario y la aplicación de tecnologías apropiadas que le permitan desempeñar su labor con valores estéticos y cualitativos de la producción artesanal tradicional, analizar y comprender el funcionamiento del sector productivo ornamental nacional y extranjero.', 'Técnico en Floricultura', 'Tecnicatura'),
(68, 'Tecnicatura en Producción Vegetal Orgánica', 'La carrera de Producción Vegetal Orgánica tiene como objetivo formar profesionales con sólidos conocimientos científicos y tecnológicos, capaces de intervenir en las cadenas productivas de manejo orgánico, en la actividad de investigación y extensión, y en la preservación de los recursos naturales desde una visión integral y sustentable, dentro de un contexto socioeconómico con diversos niveles de innovación e incertidumbre.', 'Técnico en Producción Vegetal Orgánica', 'Tecnicatura'),
(69, 'Tecnicatura Universitaria en Mantenimiento Industrial', 'Esta Tecnicatura Superior surge de la necesidad que tiene la industria en general de reforzar la formación de sus técnicos en algunos temas y en disminuir la brecha de formación entre el ingeniero y el técnico de nivel medio en el momento del ejercicio profesional. La Tecnicatura Superior en Mantenimiento Industrial abarca, entre otros, los conceptos de mantenimiento eléctrico, hidráulico, neumático, electrónico y de instalaciones frigoríficas desde una óptica integrada y actual.', 'Técnico Universitario en Mantenimiento Industrial', 'Tecnicatura'),
(70, 'Tecnicatura Universitaria en Procesos Industriales', 'Esta Tecnicatura Universitaria surge de la necesidad que tiene la industria en general de reforzar la formación de sus técnicos en algunos temas y en disminuir la brecha de formación entre el ingeniero y el técnico de nivel medio en el momento del ejercicio profesional.', 'Técnico Universitario en Procesos Industriales.', 'Tecnicatura'),
(71, 'Tecnicatura Universitaria en Programación', 'La rápida evolución del mundo informático obliga al individuo a capacitarse y dominar temas y herramientas de trabajo relacionadas estrechamente con esta temática. Esto implica poseer conocimientos básicos, como así también sobre temas específicos relacionados con las áreas de Programación, Análisis de datos, Diseño de Sistemas y particularmente el adecuado manejo de software que se aplican a las tareas administrativo-contables.   El mercado laboral presenta la necesidad de cubrir la falta de personal técnico capacitado en programación, que puede ser absorbido por organismos públicos o privados. En tal sentido se ofrece una rápida salida laboral con esta carrera de corta duración que proporciona recursos humanos capacitados. ', 'Técnico Universitario en Programación', 'Tecnicatura'),
(72, 'Tecnicatura en Gestión Ambiental y Salud', 'Página en proceso', 'Técnico Universitario en Gestión Ambiental y Salud', 'Tecnicatura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo` enum('telefono','correo','tiktok','instagram','facebook','youtube','whatsapp','twitter') NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `fk_establecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `descripcion`, `tipo`, `contacto`, `fk_establecimiento`) VALUES
(1, 'Teléfono para contactar a la UNSO', 'telefono', '11 4719-4718', 1),
(2, 'Facebook de la UNSO', 'facebook', 'https://www.facebook.com/unsanisidro/', 1),
(3, 'Instagram de la UNSO', 'instagram', 'https://www.instagram.com/unsanisidro/', 1),
(4, 'Youtube de la UNSO', 'youtube', 'https://www.youtube.com/c/unsivirtual', 1),
(5, 'Teléfono para contactar al instituto Nº220', 'telefono', '4756-6300', 2),
(6, 'Correro del instituto Nº220', 'correo', 'institutosuperior220@gmail.com', 2),
(7, 'Instagram del instituto Nº220', 'instagram', 'instagram/isft220', 2),
(8, 'Facebook del instituto Nº220', 'facebook', 'facebook/isft220', 2),
(9, 'Teléfono para contactar al Instituto Superior de Formación Docente Nº229', 'telefono', '4-756-6300', 3),
(10, 'No se han encontrado contactos existentes', 'correo', 'sincontacto@gmail.com', 4),
(11, 'Teléfono para contactar al instituto Nº39', 'telefono', '011 4744 1222', 5),
(12, 'Facebook del instituto Nº117', 'facebook', 'https://m.facebook.com/ISFD117/', 5),
(13, 'WhatsApp para contactarse con la UTN', 'whatsapp', '11 7108 8357', 6),
(14, 'Facebook de la UTN de Pacheco', 'facebook', 'https://www.facebook.com/UTNRegionalPacheco', 6),
(15, 'Instagram de la UTN de Pacheco', 'instagram', 'https://www.instagram.com/utnpacheco', 6),
(16, 'Twitter de la UTN de Pacheco', 'twitter', 'https://x.com/utnfrgpprensa', 6),
(17, 'Telefono para contactar con el instituto Nº59', 'telefono', '11 4743 0415', 7),
(18, 'Instagram del Instituto Nº59', 'instagram', 'https://www.instagram.com/profesorado52.sanisidro?igsh=MW5qeGl1M2wzemVveA==\n', 7),
(19, 'Teléfono para contactar con el Centro Universitario de Vicente López', 'telefono', '11 4513-9873', 8),
(20, 'Instagram del Centro Universitario de Vicente López', 'instagram', 'https://www.instagram.com/centrouniversitariovl/', 8),
(21, 'Facebook del Centro Universitario de Vicente López', 'facebook', 'https://www.facebook.com/centrouniversitariovl', 8),
(22, 'Teléfono para contactarse con el Conservatorio Juan José Castro', 'telefono', '11 4513-2971', 9),
(23, 'Facebook del Conservatorio Juan José Castro', 'facebook', 'https://www.facebook.com/Conservatorio-Castro', 9),
(24, 'Teléfono para contactar al Instituto Nº199', 'telefono', '4736 0013', 10),
(25, 'Correo del Instituto Nº199', 'correo', 'isft199alumnos@gmail.com / isft199@gmail.com', 10),
(26, 'Instagram del Instituto Nº199', 'instagram', 'https://www.instagram.com/isft_199?igsh=bmU0djN6aGczN3ph', 10),
(27, 'YouTube del Instituto Nº199', 'youtube', 'https://youtube.com/@isft1992?si=wnLwT4QYxPxkRhuW', 10),
(28, 'Facebook del instituto Nº199', 'facebook', 'https://www.facebook.com/isft199', 10),
(29, 'Teléfono para contactar al instituto Nº77', 'telefono', '11 7736 1682', 11),
(30, 'Correo para contactar al instituto Nº77', 'correo', 'isfdyt77prosecretaria@gmail.com', 11),
(31, 'Instagram del Instituto Nº77', 'instagram', 'https://www.instagram.com/isfdyt77/', 11),
(32, 'Twitter del Instituto Nº77', 'twitter', 'https://x.com/isfdyt77', 11),
(33, 'Teléfono para contactar al Polo de Educación Superior de Escobar', 'telefono', '(0348) 426-2830', 12),
(34, 'Instagram del Polo de Educación Superior de Escobar', 'instagram', 'https://www.instagram.com/pesescobar?igsh=eDIyYTBydXE0Z2Y1', 12),
(35, 'Facebook del Polo de Educación Superior de Escobar', 'facebook', 'https://www.facebook.com/PESEscobar/', 12),
(36, 'Twitter del Polo de Educación Superior de Escobar', 'twitter', 'https://x.com/escobar_pes?t=7OF1DfdEjxOJ7pN5VsFvPQ&s=09', 12),
(37, 'Teléfono para contactar al Centro Universitario de Tigre', 'telefono', '4512-4399', 13),
(38, 'Correo para contactarse con la Universidad Nacional del Delta', 'correo', 'info@undelta.edu.ar', 14),
(39, 'Teléfono para contactarse con la Universidad Nacional del Delta', 'telefono', '11 4575 3261', 14),
(40, 'Youtube de la Universidad Nacional del Delta', 'youtube', 'https://m.youtube.com/@universidaddelta', 14),
(41, 'Instagram de la Universidad Nacional del Delta', 'instagram', 'https://www.instagram.com/universidaddelta?igsh=anBvMzBtMDZiMGt0', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_distrito` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_distrito`, `nombre`) VALUES
(1, 'Tigre'),
(2, 'San Fernando'),
(3, 'San Isidro'),
(4, 'Vicente Lopez'),
(5, 'Escobar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimiento`
--

CREATE TABLE `establecimiento` (
  `id_establecimiento` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `descripcion` varchar(750) NOT NULL,
  `tipo_establecimiento` enum('Universidad','Instituto','Polo educativo','Centro universitario') NOT NULL,
  `servicios` varchar(4) NOT NULL,
  `coordenadas` longtext NOT NULL,
  `fk_distrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `establecimiento`
--

INSERT INTO `establecimiento` (`id_establecimiento`, `nombre`, `ubicacion`, `descripcion`, `tipo_establecimiento`, `servicios`, `coordenadas`, `fk_distrito`) VALUES
(1, 'Universidad Nacional Raúl Scalabrini Ortiz', 'Juan Bautista de LaSalle 600', 'La Universidad Nacional Raúl Scalabrini Ortiz (UNSO) en San Isidro se destaca por su oferta académica innovadora en herramientas tecnológicas para comunicación, diseño y seguridad informática. Estas propuestas se suman a una oferta de carreras tradicionales en las áreas de Salud, Económicas y Humanidades. Como universidad pública, gratuita y de calidad en la región norte, ofrece carreras terciarias de tres años y de grado de cuatro a cinco años, nuestros estudiantes se forman en grupos reducidos y  de cercanía con los docentes. Todas las carreras están aprobadas por el Ministerio de Educación, garantizando un título oficial al graduarse.', 'Universidad', '1110', '{\"x\":\"-34.4659501\",\"y\":\"-58.5089068\"}', 3),
(2, 'Instituto Superior de Formación Técnica 220', 'Virrey Loreto 2564', 'Actualmente, el ISFT Nº 220 brinda tres carreras técnicas del Nivel Superior gratuitas: Software, Alimentos, Higiene y Seguridad. Procuramos generar vínculos con establecimientos educativos de nivel secundario para que todos/as los jóvenes conozcan nuestra oferta formativa así como también vincularnos con el entorno socioproductivo. Poseemos un fuerte compromiso con la Educación Técnico Profesional.', 'Instituto', '0000', '{\"x\":\"-34.5281097\",\"y\":\"-58.5473953\"}', 4),
(3, 'Instituto Superior de Formación Docente 229', 'Virrey Loreto 2564', 'El Instituto Superior de Formación Docente n°229 es una institución educativa que se centra en la formación de docentes, siendo de gestión estatal, el mismo tiene como objetivo principal brindar una educación de calidad a sus estudiantes para que puedan desempeñarse de manera efectiva en su rol como docentes. Además de la formación académica, también tienen la responsabilidad de fomentar la investigación y la innovación en el campo de la educación, y de ofrecer programas de capacitación continua para los docentes que ya se encuentran en ejercicio.', 'Instituto', '0000', '{\"x\":\"-34.5281097\",\"y\":\"-58.5473953\"}', 4),
(4, 'Instituto Superior de Formación Docente N° 39  \"Jean Piaget\"', 'Agustín Álvarez 1459, B1638', 'El Instituto Superior de Formación Docente N°39, cuenta hoy con una trayectoria de casi 50 años de vida institucional, social y cultural. Localizado en la ciudad de Vicente López, cuenta con una trayectoria como espacio formador mucho más amplia en toda la región. Las carreras que brinda la institución son las siguientes: Lengua y Literatura, Profesorado de Historia, Biología, Matemáticas, Inicial, Primaria y Educación Física, además de cursos,  capacitaciones, otras ofertas de formación permanente y postítulos.', 'Instituto', '1000', '{\"x\":\"-34.533209018367344\",\"y\":\"-58.47785332857143\"}', 4),
(5, 'Escuela Normal Superior N° 117 \"Gral. José Gervasio Artigas\"', '3 de Febrero 1810, San Fernando', 'El instituto cuenta con una Planta Baja y dos pisos, en los cuales hay cincuenta aulas, un Gabinete de Física, un Gabinete de Química, un Gabinete de Biología, un Aula de Música, dos Bibliotecas, un microcine, un SUM, un amplio patio descubierto y dos salas de computación.', 'Instituto', '1000', '{\"x\":\"-34.4461581\",\"y\":\"-58.5510041\"}', 2),
(6, 'Universidad Tecnológica Nacional de Pacheco', 'Av. Hipólito Yrigoyen 288', 'Ubicada en el corazón de la ciudad de General Pacheco, la FRGP es una Facultad pública e inclusiva, comprometida con la generación y promoción del conocimiento, la formación de profesionales de excelencia capaces de dar respuestas ante las demandas propias del desarrollo socioeconómico de nuestro país, teniendo como eje a la Innovación y el Desarrollo tecnológico al servicio de la comunidad, y específicamente de la Industria.', 'Universidad', '1110', '{\"x\":\"-34.456507093877555\",\"y\":\"-58.627104334693875\"}', 1),
(7, 'Instituto Superior de Formación Docente y Técnica Nº 52 \"Maestro Francisco Isauro Arancibia\"', 'Rivadavia 349', 'El Instituto Superior de Formación Docente Instituto Superior De Formación Docente y Técnica N° 52 : \"Maestro Francisco Isauro Arancibia\" tiene la responsabilidad de fomentar la investigación y la innovación en el campo de la educación, y de ofrecer programas de capacitación continua para los docentes que ya se encuentran en ejercicio. Este cumple con estas funciones de manera efectiva, ofreciendo una amplia variedad de programas de formación docente en áreas como educación inicial, educación primaria, educación secundaria y educación técnica. Además, este instituto cuenta con un cuerpo docente altamente capacitado y comprometido con la excelencia académica y la formación integral de sus estudiantes.', 'Instituto', '0000', '{\"x\":\"-34.47004125\",\"y\":\"-58.5129331789133\"}', 3),
(8, 'Centro Universitario de Vicente López', 'Carlos Villate 4480', 'El CUV forma parte de la propuesta educativa local que hace hincapié en la capacitación constante de toda la comunidad educativa.\nActualmente contamos con una capacidad de 24 aulas para albergar más de 1000 estudiantes, contamos con un termo tanque solar y además con una sala de psicomotricidad brindando la posibilidad a l@s estudiantes de dejar a sus hij@s de entre 2 y 5 años al cuidado de un equipo interdisciplinario de profesionales y un Equipo de Orientación a Estudiantes. Por último, el Centro Universitario ofrece un auditorio con capacidad para 293 personas, una biblioteca, cafetería y espacio de esparcimiento.', 'Centro universitario', '1111', '{\"x\":\"-34.53179603061225\",\"y\":\"-58.520279326530606\"}', 4),
(9, 'Conservatorio Juan José Castro', 'Av. Sta Fe 1740', 'El Conservatorio de Música \"Juan José Castro\" es una institución estatal de nivel terciario en Buenos Aires que ofrece formación integral en música, con carreras docentes y tecnicaturas de 4 años, además de formación básica previa sin necesidad de conocimientos previos. Se pueden estudiar instrumentos como arpa, bandoneón, clarinete, contrabajo, corno, fagot, flauta dulce, flauta traversa, guitarra clásica, piano, oboe, percusión sinfónica, trompeta, trombón, saxofón, violín, viola, violoncello y canto lírico a partir de los 14 años. La cursada es anual y por materia, con horarios en turnos mañana, tarde y noche. La enseñanza es gratuita, con una cooperadora anual voluntaria. Otorga títulos con validez nacional.', 'Instituto', '1000', '{\"x\":\"-34.4757712\",\"y\":\"-58.5112714\"}', 3),
(10, 'Instituto Superior de Formación Técnica Nº 199', 'Maestra Celina Voena 1700', 'Instituto de nivel superior terciario dependiente de la DGCyE de la Provincia de Buenos Aires. Brinda las siguientes especialidades: Tecnicatura Superior en Administración de Recursos Humanos, Tecnicatura Superior en Higiene y Seguridad en el Trabajo, Tecnicatura Superior en Logística, Tecnicatura Superior en Turismo y Tecnicatura Superior en Hotelería', 'Instituto', '1000', '{\"x\":\"-34.4669171\",\"y\":\"-58.6438196\"}', 1),
(11, 'Instituto Superior de Formación Docente y Técnica Nº77', 'Sargento Cabral 2772', 'Nuestro ideario institucional consiste en promover instancias de enseñanza y aprendizaje que favorezcan la formación de futuros profesionales capaces de comprender procesos sociales, ideológicos, culturales, políticos y económicos, que les permitan desnaturalizar valores hegemónicos que justifiquen estereotipos y desigualdades sociales, comprometerse con la realidad y generar acciones para su transformación.', 'Instituto', '1000', '{\"x\":\"-34.524711\",\"y\":\"-58.51835514285714\"}', 4),
(12, 'Polo de Educación Superior de Escobar', 'Sucre 1550', 'El PES tiene como objetivo la educación abarcativa y la atención a las demandas sociales de producción y empleo para facilitar el encuentro entre las necesidades del sector productivo y las respuestas que la investigación puede proveer.\nEn definitiva, se busca promover la interacción de diferentes sectores: los estudiantes, las instituciones educativas, el sector productivo, las agencias estatales, los centros de investigación y la promoción de la acción fundada en el conocimiento de construcción colectiva. Desde el Polo invitamos a todos a ser parte de este maravilloso desafío.\n', 'Polo educativo', '1101', '{\"x\":\"-34.37340855\",\"y\":\"-58.751130599999996\"}', 5),
(13, 'Centro universitario de Tigre', 'Solis 1', 'Desde 2011, gestionamos el Centro Universitario Tigre (CUT) para mejorar la accesibilidad de los jóvenes a estudios terciarios y universitarios, permitiéndoles finalizar sus estudios cerca de sus hogares. El CUT ofrece el Ciclo Básico Común (CBC) para 86 carreras de la UBA y más de 10 carreras de diversas universidades. Además, brinda orientación vocacional gratuita y un Centro de Idiomas. Con 23 aulas, un salón de usos múltiples y tecnología avanzada, el CUT realiza anualmente la feria universitaria Expo CUT para orientar a los jóvenes sobre su formación profesional.', 'Centro universitario', '1111', '{\"x\":\"-34.4264888\",\"y\":\"-58.5664895\"}', 1),
(14, 'Universidad Nacional del Delta', 'Av. Avellaneda 2270', 'La Universidad Nacional del Delta, creada en 2023, es una universidad nacional, pública y gratuita. Sirve como un punto de encuentro entre lo local y lo nacional, estudiantes y docentes, academia e industria, y entre pymes y grandes empresas, fomentando la colaboración y la innovación. Se destaca por su accesibilidad y compromiso con la inclusión, el diálogo abierto y la participación activa de la comunidad, fortaleciendo el tejido social y cultural de Tigre, San Fernando y Escobar. La Universidad Nacional del Delta es el lugar donde se construye un futuro de innovación y excelencia.', 'Universidad', '1110', '{\"x\":\"-34.4539417\",\"y\":\"-58.5582294\"}', 2),
(15, 'Ciclo Básico Común Sede Martínez', 'Córdoba 2001 Martínez', 'En este centro universitario se pueden cursar todas las materias del ciclo básico común (CBC) y de las carreras de las facultades de Ciencias Económicas y Psicología. Cuenta con oficinas de departamento de alumnos, sala de profesores, biblioteca y el CURAI (Centro Universitario de Rehabilitaciones y Atención Integral), dicho centro de rehabilitación esta a cargo de la carrera terapia ocupacional. Tiene 40 aulas, dos aulas taller, dos laboratorios, tres estacionamientos y seguridad 24 horas. Cada carrera de la UBA y cada facultad tiene su propio régimen académico.', 'Centro universitario', '1011', '{\"x\":\"-34.498395\",\"y\":\"-58.524974\"}', 3),
(16, 'Instituto Superior de Formación Docente y Técnica N° 140 \"Marie Curie\"', 'Av. Hipólito Yrigoyen 20, B1617 Gral. Pacheco', 'Redefinir el concepto de Instituto Superior de Formación Docente y Técnica solidario, promoviendo la participación democrática y el valor de la justicia, fomentando un fuerte compromiso de directivos, docentes, estudiantes y dirigentes, para que disfruten de su labor y sientan orgullo de pertenecer a la institución.\r\nReforzar el sentido de pertenencia a las carreras científicas y fortalecer los lazos con otras instituciones terciarias y universitarias que compartan nuestros valores, abogando por el apoyo de la comunidad.', 'Instituto', '0000', '{\"x\":\"-34.454911606325474\",\"y\":\"-58.62304406457402\"}', 1),
(17, 'Instituto Superior de Formación Técnica Nº217', 'Av. del Libertador 1262', 'La búsqueda de construir el SER y el saber hacer se basa en el conocimiento y la experiencia adquiridos a través de la práctica real de competencias y capacidades profesionales, todo enmarcado en el Desarrollo Local. Esta visión integra la innovación productiva en bienes de servicio y capital, el desarrollo industrial de nuevas tecnologías, y la promoción de una Usina de Ideas, generadas a partir de las prácticas de los estudiantes, para sustentar el pilar fundamental de la investigación.', 'Instituto', '0000', '{\"x\":\"-34.44078146938776\",\"y\":\"-58.55377939795918\"}', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `url` varchar(20) NOT NULL,
  `fk_establecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `url`, `fk_establecimiento`) VALUES
(1, 'UNRSO.jpg', 1),
(2, 'ISFT220.jpg', 2),
(3, 'ISFD229.jpg', 3),
(4, 'I39.jpg', 4),
(5, 'I117.jpg', 5),
(6, 'UTNP.jpg', 6),
(7, 'I52.jpg', 7),
(8, 'CUV.webp', 8),
(9, 'CJJC.jpg', 9),
(10, 'I199.jpg', 10),
(11, 'ISFDT.jpg', 11),
(12, 'PESE.jpg', 12),
(13, 'cut1.jpg', 13),
(14, 'UND.jpg', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planestudio`
--

CREATE TABLE `planestudio` (
  `id_planestudio` int(11) NOT NULL,
  `pdf` varchar(50) NOT NULL,
  `fk_carrera` int(11) DEFAULT NULL,
  `fk_establecimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `planestudio`
--

INSERT INTO `planestudio` (`id_planestudio`, `pdf`, `fk_carrera`, `fk_establecimiento`) VALUES
(1, 'educacionmusicalcjjc', 28, 9),
(2, 'cantocjjc', 25, 9),
(3, 'composicioncjjc', 27, 9),
(4, 'direccioncoralcjjc', 26, 9),
(5, 'instrumentocjjc', 24, 9),
(6, 'musicologiacjjc', 29, 9),
(19, 'ingcivilutn', 30, 6),
(20, 'ingenergiaelectricautn', 31, 6),
(21, 'ingautomotrizutn', 32, 6),
(22, 'ingmecanicautn', 33, 6),
(23, 'licorganizacionindustrialutn', 34, 6),
(24, 'tecsuperioradministracionutn', 35, 6),
(25, 'tecgestionindustriaautomotriz', 36, 6),
(26, 'tecmoldesmatricesdispositivosutn', 37, 6),
(27, 'tecprogramacionutn', 38, 6),
(28, 'licgestionambientalunso', 1, 1),
(29, 'tecciberseguridadunso', 2, 1),
(30, 'tecgestionambientalunso', 3, 1),
(31, 'tecdesarrollovideojuegosunso', 4, 1),
(33, 'tecsonidoaudiovisualunso', 6, 1),
(34, 'liccienciasforensesycriminologiaunso', 7, 1),
(35, 'liceconomiaunso', 8, 1),
(36, 'tecanalisiscontableunso', 9, 1),
(37, 'teccriminalisticaunso', 10, 1),
(38, 'licgestioneducativaunso', 11, 1),
(39, 'licgestionpublicaunso', 12, 1),
(40, 'licpsicopedagogiaunso', 13, 1),
(41, 'licpsicopedagogiacccunso', 14, 1),
(42, 'profeducacioninicialunso', 15, 1),
(43, 'tecgestionpublicaunso', 16, 1),
(44, 'enfermeriauniversitariaunso', 17, 1),
(45, 'licquirurgicaunso', 18, 1),
(46, 'tecemergenciasmedicasunso', 19, 1),
(47, 'tecsuperioralimentos220', 20, 2),
(48, 'tecseguridadhigiene220', 21, 2),
(49, 'tecdesarrollosoftware220', 22, 2),
(50, 'profsecundariatecprofesional229', 23, 3),
(51, 'mecatronica199', 39, 10),
(52, 'csdatosinteligenciaartificial199', 40, 10),
(55, 'prof_ingles77', 41, 11),
(56, 'tecnicaturatrabajosocial77', 42, 11),
(57, 'tecnicaturacomunicacionsocialdesarrollo77', 43, 11),
(59, '', 15, 4),
(60, '', 44, 4),
(61, '', 54, 4),
(62, '', 55, 4),
(63, '', 56, 4),
(64, '', 57, 4),
(65, '', 58, 4),
(66, '', 15, 17),
(67, '', 44, 17),
(68, '', 51, 17),
(69, '', 52, 17),
(70, '', 21, 17),
(71, '', 45, 16),
(72, '', 20, 16),
(73, '', 47, 16),
(74, '', 48, 16),
(75, '', 49, 16),
(76, '', 44, 16),
(82, 'licenfermeriauba', 61, 12),
(83, 'liclogisticauntref', 62, 12),
(84, '', 63, 12),
(85, 'licseguridadhigieneunlz', 64, 12),
(86, 'licgestiongubernamentalunpaz', 65, 12),
(87, 'tecjardineriauba', 66, 12),
(88, '', 67, 12),
(89, 'tecuniprodvegetalorganicauba', 68, 12),
(90, 'tecunimantenimientoindustrialutnfrd', 69, 12),
(91, 'tecuniprocesosindustrialesutnfrd', 70, 12),
(92, 'tecuniprogramacionutnfrd', 71, 12),
(93, '', 72, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(6) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contrasena`) VALUES
(1, 'Santiago Benjamín', 'hola', 'hola@gmail.com', 'hola123'),
(2, 'carlos', 'solis', 'carlos@gmail.com', 'hola123'),
(3, 'hola', 'hola', 'hola18@gmail.com', 'hola123'),
(4, 'cristobal', 'maier', 'cristobalmaier@gmail.com', 'hola123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `fk_establecimiento` (`fk_establecimiento`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id_distrito`);

--
-- Indices de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD PRIMARY KEY (`id_establecimiento`),
  ADD KEY `fk_distrito` (`fk_distrito`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_establecimiento_2` (`fk_establecimiento`),
  ADD KEY `fk_establecimiento` (`fk_establecimiento`) USING BTREE;

--
-- Indices de la tabla `planestudio`
--
ALTER TABLE `planestudio`
  ADD PRIMARY KEY (`id_planestudio`),
  ADD KEY `fk_establecimiento` (`fk_establecimiento`),
  ADD KEY `fk_carrera` (`fk_carrera`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  MODIFY `id_establecimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `planestudio`
--
ALTER TABLE `planestudio`
  MODIFY `id_planestudio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_establecimiento` FOREIGN KEY (`fk_establecimiento`) REFERENCES `establecimiento` (`id_establecimiento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `establecimiento`
--
ALTER TABLE `establecimiento`
  ADD CONSTRAINT `fk_distrito` FOREIGN KEY (`fk_distrito`) REFERENCES `distrito` (`id_distrito`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_establecimiento3` FOREIGN KEY (`fk_establecimiento`) REFERENCES `establecimiento` (`id_establecimiento`) ON DELETE CASCADE;

--
-- Filtros para la tabla `planestudio`
--
ALTER TABLE `planestudio`
  ADD CONSTRAINT `fk_carrera` FOREIGN KEY (`fk_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_establecimiento2` FOREIGN KEY (`fk_establecimiento`) REFERENCES `establecimiento` (`id_establecimiento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
