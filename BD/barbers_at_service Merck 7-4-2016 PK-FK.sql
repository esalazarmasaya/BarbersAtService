use `barbers_at_service`;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleCode`);

--
-- Indices de la tabla `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`BrandCode`);

--
-- Indices de la tabla `cellar`
--
ALTER TABLE `cellar`
  ADD PRIMARY KEY (`CellarCode`);

--
-- Indices de la tabla `permissionbyrole`
--
ALTER TABLE `permissionbyrole`
  ADD PRIMARY KEY (`RoleCode`,`WebPageCode`),
  ADD KEY `CodeWebPage` (`WebPageCode`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductCode`),
  ADD KEY `FK_product_producType` (`ProducType`),
  ADD KEY `FK_product_brand` (`BrandProduct`),
  ADD KEY `FK_product_productpresentation` (`Presentation`);


--
-- Indices de la tabla `productpresentation`
--
ALTER TABLE `productpresentation`
  ADD PRIMARY KEY (`ProductPresentationCode`);

--
-- Indices de la tabla `productype`
--
ALTER TABLE `productype`
  ADD PRIMARY KEY (`ProducTypeCode`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserCode`),
  ADD KEY `RoleCode` (`RoleCode`);

--
-- Indices de la tabla `webpage`
--
ALTER TABLE `webpage`
  ADD PRIMARY KEY (`WebPageCode`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ServiceCode`);
  
--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`UserCode`),
  ADD UNIQUE KEY `UserCode` (`UserCode`),
  ADD KEY `fk_employees_cellar` (`CellarCode`);
  
--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentCode`),
  ADD KEY `EmployeeCode` (`EmployeeCode`),
  ADD KEY `fk_payments_transactionheader` (`Transaction`);
  
--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`StateCode`);
  

--
-- Indices de la tabla `transactionheader`
--
ALTER TABLE `transactionheader`
  ADD PRIMARY KEY (`TransactionCode`),
  ADD KEY `fk_transactionheader_employees` (`EmployeeCode`);
  
--
-- Indices de la tabla `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD PRIMARY KEY (`TransactionCode`,`ProductCode`,`ServiceCode`),
  ADD KEY `fk_transactiondetail_product` (`ProductCode`),
  ADD KEY `fk_transactiondetail_service` (`ServiceCode`);
  
--
-- Indices de la tabla `servicetimebybarber`
--
ALTER TABLE `servicetimebybarber`
  ADD PRIMARY KEY (`ServiceTimeBarberCode`),
  ADD KEY `fk_combotimebybarber_combo` (`ServiceCode`),
  ADD KEY `fk_combotimebybarber_EmployeesUser` (`EmployeeCode`); 
  
--
-- Indices de la tabla `waitingqueuebybarber`
--
ALTER TABLE `waitingqueuebybarber`
  ADD PRIMARY KEY (`QueueCode`),
  ADD KEY `fk_waitinglinebybarber_combo` (`Service`),
  ADD KEY `FK_waitingqueuebybarber_barberuser` (`User`),
  ADD KEY `fk_waitingqueuebybarber_states` (`waitingqueueState`),
  ADD KEY `fk_waitingqueuebybarber_employeesUSer` (`EmployeeCode`);
  
  
  
  
  

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

 
--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandCode` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `ProductCode` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productpresentation`
--
ALTER TABLE `productpresentation`
  MODIFY `ProductPresentationCode` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productype`
--
ALTER TABLE `productype`
  MODIFY `ProducTypeCode` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `RoleCode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `UserCode` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `webpage`
--
ALTER TABLE `webpage`
  MODIFY `WebPageCode` int(11) NOT NULL AUTO_INCREMENT;
  
  
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Usuarios', '', 'Administraciòn de usuarios.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Roles', '', 'Administraciòn de roles de usuario.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Marcas', '', 'Administraciòn de marcas de producto.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Bodegas', '', 'Administraciòn de bodegas.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Permisos', '', 'Administraciòn de permisos de usuario por tipo de rol.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Paginas Web', '', 'Administraciòn de paginas web.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Productos', '', 'Administraciòn de Productos.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Presentacion de Producto', '', 'Presentacion de Producto.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Tipo de Producto', '', 'Tipo de Producto.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Producto nuevo', '', 'Producto nuevo.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Servicio nuevo', '', 'Servicio nuevo.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Servicios', '', 'Servicios.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Empleado nuevo', '', 'Empleado nuevo.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Empleados', '', 'Empleados.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Ticket nuevo', '', 'Ticket nuevo.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Tickets', '', 'Tickets.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Tiempo promedio nuevo', '', 'Tiempo promedio nuevo.', 1);
INSERT INTO `webpage`(`WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES ('Tiempos promedio', '', 'Tiempos promedio.', 1);

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `ServiceCode` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentCode` bigint(20) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `StateCode` bigint(20) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT de la tabla `transactionheader`
--
ALTER TABLE `transactionheader`
  MODIFY `TransactionCode` bigint(20) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `servicetimebybarber`
--
ALTER TABLE `servicetimebybarber`
  MODIFY `ServiceTimeBarberCode` bigint(20) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT de la tabla `waitingqueuebybarber`
--
ALTER TABLE `waitingqueuebybarber`
  MODIFY `QueueCode` bigint(20) NOT NULL AUTO_INCREMENT;

  --
-- AUTO_INCREMENT de la tabla `cellar`
--
ALTER TABLE `cellar`
  MODIFY `CellarCode` bigint(20) NOT NULL AUTO_INCREMENT;























--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_brand` FOREIGN KEY (`BrandProduct`) REFERENCES `brand` (`BrandCode`),
  ADD CONSTRAINT `FK_product_producType` FOREIGN KEY (`ProducType`) REFERENCES `productype` (`ProducTypeCode`),
  ADD CONSTRAINT `FK_product_productpresentation` FOREIGN KEY (`Presentation`) REFERENCES `productpresentation` (`ProductPresentationCode`);


--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleCode`) REFERENCES `role` (`RoleCode`);
  

  
  
  
--
-- Filtros para la tabla `permissionbyrole`
--
ALTER TABLE `permissionbyrole`
  ADD CONSTRAINT `fk_permissionbyrole_role` FOREIGN KEY (`RoleCode`) REFERENCES `role` (`RoleCode`);
  
ALTER TABLE `permissionbyrole`
  ADD CONSTRAINT `fk_permissionbyrole_WebPageCode` FOREIGN KEY (`WebPageCode`) REFERENCES `webpage` (`WebPageCode`);
  
--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_cellar` FOREIGN KEY (`CellarCode`) REFERENCES `cellar` (`CellarCode`),
  ADD CONSTRAINT `fk_employees_user` FOREIGN KEY (`UserCode`) REFERENCES `user` (`UserCode`);
  
--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_employees` FOREIGN KEY (`EmployeeCode`) REFERENCES `employees` (`UserCode`),
  ADD CONSTRAINT `fk_payments_transactionheader` FOREIGN KEY (`Transaction`) REFERENCES `transactionheader` (`TransactionCode`);
  
--
-- Filtros para la tabla `transactionheader`
--
ALTER TABLE `transactionheader`
  ADD CONSTRAINT `fk_transactionheader_employees` FOREIGN KEY (`EmployeeCode`) REFERENCES `employees` (`UserCode`);

--
-- Filtros para la tabla `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD CONSTRAINT `fk_transactiondetail_product` FOREIGN KEY (`ProductCode`) REFERENCES `product` (`ProductCode`),
  ADD CONSTRAINT `fk_transactiondetail_service` FOREIGN KEY (`ServiceCode`) REFERENCES `service` (`ServiceCode`),
  ADD CONSTRAINT `fk_transactiondetail_transactionheader` FOREIGN KEY (`TransactionCode`) REFERENCES `transactionheader` (`TransactionCode`);

--
-- Filtros para la tabla `servicetimebybarber`
--
ALTER TABLE `servicetimebybarber`
  ADD CONSTRAINT `fk_combotimebybarber_EmployeesUser` FOREIGN KEY (`EmployeeCode`) REFERENCES `employees` (`UserCode`),
  ADD CONSTRAINT `fk_combotimebybarber_combo` FOREIGN KEY (`ServiceCode`) REFERENCES `service` (`ServiceCode`);
  
--
-- Filtros para la tabla `waitingqueuebybarber`
--
ALTER TABLE `waitingqueuebybarber`
  ADD CONSTRAINT `fk_waitinglinebybarber_combo` FOREIGN KEY (`Service`) REFERENCES `service` (`ServiceCode`),
  ADD CONSTRAINT `fk_waitingqueuebybarber_employee` FOREIGN KEY (`EmployeeCode`) REFERENCES `employees` (`UserCode`),
  ADD CONSTRAINT `fk_waitingqueuebybarber_states` FOREIGN KEY (`waitingqueueState`) REFERENCES `states` (`StateCode`),
  ADD CONSTRAINT `fk_waitingqueuebybarber_user` FOREIGN KEY (`User`) REFERENCES `user` (`UserCode`);
  
  
  
  
  
  
  