
--
-- Base de datos: `jobagencydb`
--

-- --------------------------------------------------------
create database jobagencydb;
use jobagencydb;
--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `CompanyID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Password` char(50) NOT NULL,
  `RegistrationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`CompanyID`, `Name`, `Email`, `Password`, `RegistrationDate`) VALUES
(1, 'SJO', 'sjo@sjodomain.com', '3da9fa5352a6ca4f1f4bd66d0bba8dbd06ac5154', '2016-12-15 16:52:14'),
(2, 'Microsoft', 'microsoft@microsoftdomain.com', '7b1a468ee7009f93d568f4f694ea6b2fdd763959', '2016-12-15 16:52:14'),
(3, 'Apple', 'apple@appledomain.com', '6a855343e39a1e823bd3ff3a2375a2a1312af6cd', '2016-12-15 16:52:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offers`
--

CREATE TABLE `offers` (
  `OfferID` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Category` varchar(50) NULL,
  `Description` varchar(500) NOT NULL,
  `CompanyID` int(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `offers`
--

INSERT INTO `offers` (`OfferID`, `Title`, `Category`, `Description`, `CompanyID`) VALUES
(1, 'Math Teacher', 'Education', 'We''re looking for a math teacher for Scientist Bachillerato', 1),
(2, 'C# Senior Programmer', 'TIC', 'Minimum 8 years programming in C# or seem', 2),
(3, 'Technical Engineer', NULL, 'Minimum 5 years in jobs like that', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Password` char(40) NOT NULL,
  `RegistrationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Email`, `Password`, `RegistrationDate`) VALUES
(1, 'Agustín', 'agustin@email.com', '14ee141338dd36564d72874df6471242c68dde0d', '2016-12-15 16:40:52'),
(2, 'Victor', 'victor@email.com', '4aebd1c21afff1d0c694f991d0e2aa2832e443f1', '2016-12-15 16:40:52'),
(3, 'Marc', 'marc@email.com', '9552b845fc9d47e972a09faec38cd8d626b78762', '2016-12-15 16:40:52'),
(4, 'Isaac', 'isaac@email.com', 'c467274b487e371bfc91e148ac652d815177b3c6', '2016-12-15 16:40:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usersoffers`
--

CREATE TABLE `usersoffers` (
  `UserID` int(11) NOT NULL,
  `OfferID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usersoffers`
--

INSERT INTO `usersoffers` (`UserID`, `OfferID`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 2),
(3, 1),
(3, 3),
(4, 2),
(4, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indices de la tabla `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`OfferID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indices de la tabla `usersoffers`
--
ALTER TABLE `usersoffers`
  ADD PRIMARY KEY (`UserID`,`OfferID`),
  ADD KEY `OfferID` (`OfferID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `offers`
--
ALTER TABLE `offers`
  MODIFY `OfferID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`CompanyID`);

--
-- Filtros para la tabla `usersoffers`
--
ALTER TABLE `usersoffers`
  ADD CONSTRAINT `usersoffers_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `usersoffers_ibfk_2` FOREIGN KEY (`OfferID`) REFERENCES `offers` (`OfferID`);


