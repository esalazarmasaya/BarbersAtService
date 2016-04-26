--
-- Base de datos: `barbers at service`
--
drop database `barbers_at_service`;
create database `barbers_at_service`;
use `barbers_at_service`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `BrandCode` bigint(20) NOT NULL,
  `BrandName` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Description` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `BrandState` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cellar`
--

CREATE TABLE IF NOT EXISTS `cellar` (
  `CellarCode` bigint(20) NOT NULL,
  `CellarName` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `Length` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Latitude` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Shopping` int(11) NOT NULL,
  `CellarState` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissionbyrole`
--

CREATE TABLE IF NOT EXISTS `permissionbyrole` (
  `RoleCode` int(11) NOT NULL,
  `WebPageCode` int(11) NOT NULL,
  `permission` TINYINT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ProductCode` bigint(20) NOT NULL,
  `ProductName` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `Presentation` bigint(20) NOT NULL,
  `Barcode` bigint(20) NOT NULL,
  `ProductCostPrice` decimal(10,2) NOT NULL,
  `ProductState` bigint(20) NOT NULL,
  `ProductSalePrice` decimal(10,2) NOT NULL,
  `ProducType` bigint(20) NOT NULL,
  `BrandProduct` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `productpresentation`
--

CREATE TABLE IF NOT EXISTS `productpresentation` (
  `ProductPresentationCode` bigint(20) NOT NULL,
  `Presentation` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `Units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productype`
--

CREATE TABLE IF NOT EXISTS `productype` (
  `ProducTypeCode` bigint(20) NOT NULL,
  `ProducTypeName` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Description` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `RoleCode` int(11) NOT NULL,
  `RoleName` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `RoleDescription` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `RoleState` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserCode` bigint(11) NOT NULL,
  `UserFirstName` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `UserSecondName` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `UserFirstLastName` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `UserSecondLastName` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `UserBornDate` date NOT NULL,
  `Phone` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `UserEmail` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `CreationDate` date NOT NULL,
  `Password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `UserState` bigint(20) NOT NULL,
  `RoleCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webpage`
--

CREATE TABLE IF NOT EXISTS `webpage` (
  `WebPageCode` int(11) NOT NULL,
  `WebPageName` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `UrlWebPage` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `WebPageDescription` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `WebState` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `ServiceCode` bigint(20) NOT NULL,
  `Name` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ServicePrice` decimal(10,2) NOT NULL,
  `ServiceState` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;




--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `UserCode` bigint(20) NOT NULL,
  `InicialLunchTime` time NOT NULL,
  `FinalLunchTime` time NOT NULL,
  `InitialDate` date NOT NULL,
  `FinalDate` date DEFAULT NULL,
  `EmployeeState` tinyint(1) NOT NULL,
  `CellarCode` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `PaymentCode` bigint(20) NOT NULL,
  `Date` datetime DEFAULT NULL,
  `Pay` decimal(10,2) DEFAULT NULL,
  `NotPay` decimal(10,2) NOT NULL,
  `EmployeeCode` bigint(20) DEFAULT NULL,
  `Transaction` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `StateCode` bigint(20) NOT NULL,
  `StateName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactionheader`
--

CREATE TABLE IF NOT EXISTS `transactionheader` (
  `TransactionCode` bigint(20) NOT NULL,
  `UserCode` bigint(20) NOT NULL,
  `EmployeeCode` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




--
-- Estructura de tabla para la tabla `transactiondetail`
--

CREATE TABLE IF NOT EXISTS `transactiondetail` (
  `TransactionCode` bigint(20) NOT NULL,
  `Units` int(11) NOT NULL,
  `CourtesyProduct` int(1) NOT NULL,
  `ProductCode` bigint(20) NOT NULL,
  `ServiceCode` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicetimebybarber`
--

CREATE TABLE IF NOT EXISTS `servicetimebybarber` (
  `ServiceTimeBarberCode` bigint(20) NOT NULL,
  `MinTime` time NOT NULL,
  `MaxTime` time NOT NULL,
  `BesTime` time NOT NULL,
  `AverageTime` time NOT NULL,
  `ServicetimebarberEstate` tinyint(1) NOT NULL,
  `ServiceCode` bigint(20) NOT NULL,
  `EmployeeCode` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `waitingqueuebybarber`
--

CREATE TABLE IF NOT EXISTS `waitingqueuebybarber` (
  `QueueCode` bigint(20) NOT NULL,
  `QueueDate` datetime NOT NULL,
  `waitingqueueState` bigint(20) NOT NULL,
  `InitialHour` time NOT NULL,
  `FinalHour` time NOT NULL,
  `Service` bigint(20) NOT NULL,
  `User` bigint(20) NOT NULL,
  `EmployeeCode` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;






