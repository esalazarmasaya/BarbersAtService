use barbers_at_service;








INSERT INTO `role` (`RoleCode`, `RoleName`, `RoleDescription`, `RoleState`) VALUES
(1, 'Administrador', 'Administrador del sistema', 1),
(2, 'Cliente', 'Cliente de la barberia', 1),
(3, 'Barbero', 'Barbero', 1);

INSERT INTO `states`(`StateName`) VALUES ('En Espera');
INSERT INTO `states`(`StateName`) VALUES ('Iniciado');
INSERT INTO `states`(`StateName`) VALUES ('Finalizado');
INSERT INTO `states`(`StateName`) VALUES ('Cobrado');
INSERT INTO `states`(`StateName`) VALUES ('Eliminado');

INSERT INTO `brand` (`BrandCode`, `BrandName`, `Description`, `BrandState`) VALUES (1, 'Gallo', 'Cerveza Nacional', 1);

INSERT INTO `cellar` (`CellarCode`, `CellarName`, `Description`, `Length`, `Latitude`, `Shopping`, `CellarState`,`timeOpen`, `timeClose`) VALUES (1, 'Barber', 'Tienda principal', '3x2', '10', 0, 0, '10:00:00', '20:00:00');

call `sp_ProducType_add`('N/A','N/A');
call `sp_ProducType_add`('Babidas alcoholicas','N/A');
call `sp_ProducType_add`('Babidas carbonatadas','N/A');

call `sp_productpresentation_add`('N/A','N/A',0);
call `sp_productpresentation_add`('Unidad','Unidad',1);

call `sp_provider_add`('N/A',1);
call `sp_provider_add`('Cerveceria Centroamericana',1);

call `sp_Product_add`('N/A','N/A',1,1,0,1,0,1,1);
call `sp_Product_add`('Agua pura','Agua Pura',1,1,1,1,1,1,1);
call `sp_Product_add`('Coca Cola','Coca Cola',1,1,1,1,1,1,1);
call `sp_Product_add`('Cerveza Gallo','Cerveza Gallo',1,1,1,1,1,1,1);

INSERT INTO `webpage` (`WebPageCode`, `WebPageName`, `UrlWebPage`, `WebPageDescription`, `WebState`) VALUES
(1, 'Usuarios', '', 'Administraciòn de usuarios.', 1),
(2, 'Roles', '', 'Administraciòn de roles de usuario.', 1),
(3, 'Marcas', '', 'Administraciòn de marcas de producto.', 1),
(4, 'Bodegas', '', 'Administraciòn de bodegas.', 1),
(5, 'Permisos', '', 'Administraciòn de permisos de usuario por tipo de rol.', 1),
(6, 'Paginas Web', '', 'Administraciòn de paginas web.', 1),
(7, 'Productos', '', 'Administraciòn de Productos.', 1),
(8, 'Presentacion de Producto', '', 'Presentacion de Producto.', 1),
(9, 'Tipo de Producto', '', 'Tipo de Producto.', 1),
(10, 'Producto nuevo', '', 'Producto nuevo.', 1),
(11, 'Servicio nuevo', '', 'Servicio nuevo.', 1),
(12, 'Servicios', '', 'Servicios.', 1),
(13, 'Empleado nuevo', '', 'Empleado nuevo.', 1),
(14, 'Empleados', '', 'Empleados.', 1),
(15, 'Ticket nuevo', '', 'Ticket nuevo.', 1),
(16, 'Tickets', '', 'Tickets.', 1),
(17, 'Tiempo promedio nuevo', '', 'Tiempo promedio nuevo.', 1),
(18, 'Tiempos promedio', '', 'Tiempos promedio.', 1),
(19, 'Mi Ticket', '', 'Mi Ticket.', 1),
(20, 'Tickets en Espera', '', 'Tickets en Espera.', 1),
(21, 'Tickets Iniciados', '', 'Tickets Iniciados.', 1),
(22, 'Tickets Finalizados', '', 'Tickets Finalizados.', 1),
(23, 'Tickets Comprobados', '', 'Tickets Comprobados.', 1),
(24, 'Tickets por comprobar (pagados)', '', 'Tickets por comprobar (pagados).', 1),
(25, 'Transaccion nueva', '', 'Transaccion nueva.', 1),
(26, 'Transacciones', '', 'Transacciones.', 1),
(27, 'Transacciones en Espera', '', 'Transacciones en Espera.', 1),
(28, 'Transacciones Iniciados', '', 'Transacciones Iniciados.', 1),
(29, 'Transacciones Finalizados', '', 'Transacciones Finalizados.', 1),
(30, 'Transacciones Comprobados', '', 'Transacciones Comprobados.', 1),
(31, 'Transacciones por comprobar (pagados)', '', 'Transacciones por comprobar (pagados).', 1),
(32, 'Transacciones a editar', '', 'Transacciones por comprobar (pagados).', 1),
(33, 'Transacciones a comprobar', '', 'Transacciones por comprobar (pagados).', 1),
(34, 'Editar transaccion a comprobar', '', 'Transacciones por comprobar (pagados).', 1),
(35, 'Agregar Pagos', '', 'Agregar Pagos.', 1),
(36, 'Ver Pagos', '', 'Ver Pagos.', 1)
;

INSERT INTO `user` (`UserCode`, `UserFirstName`, `UserSecondName`, `UserFirstLastName`, `UserSecondLastName`, `UserBornDate`, `Phone`, `UserEmail`, `CreationDate`, `Password`, `UserState`, `RoleCode`) VALUES
(1, 'Administrador', 'Administrador', 'Administrador', 'Administrador', '0000-00-00', '12345678', 'admin@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 1),
(2, 'Barbero', 'Barbero', 'Barbero', 'Barbero', '0000-00-00', '12345678', 'barb@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 3),
(3, 'Edwin', '', 'Salazar', 'masaya', '0000-00-00', '12345678', 'esalazarmasaya@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 2),
(4, 'Enrique', 'José', 'Merck', 'Cifuentes', '0000-00-00', '12345678', 'enriquemerck@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 2),
(5, 'Alejandro', 'José', 'Echeverría', 'Valls', '0000-00-00', '12345678', 'ajeche@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 2),
(6, 'Melvin', 'Daniel', 'Garcia', 'Garcia', '0000-00-00', '12345678', 'melvingar@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 2),
(7, 'Pablo', 'Francisco', 'Callejas', 'Cifuentes', '0000-00-00', '12345678', 'pabcc@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 2);




call `sp_service_add`('N/A',0);
call `sp_service_add`('Corte de pelo',15);
call `sp_service_add`('Corte de barba',10); 
call `sp_service_add`('Corte de pelo y barba',20); 


call `sp_permission_add_by_rol`('Administrador');
call `sp_permission_add_by_rol`('Cliente');
call `sp_permission_add_by_rol`('Barbero');

call `sp_employees_add`(1,'13:00:00','14:00:00','2015-01-31',1);
call `sp_employees_add`(2,'13:00:00','14:00:00','2015-01-31',1);

ALTER TABLE `transactiondetail` ADD `unitPrice` DECIMAL(10,2) NULL AFTER `ServiceCode`;

ALTER TABLE `transactiondetail`
  ADD PRIMARY KEY (`TransactionCode`,`ProductCode`,`ServiceCode`,`CourtesyProduct`),
  ADD KEY `fk_transactiondetail_product` (`ProductCode`),
  ADD KEY `fk_transactiondetail_service` (`ServiceCode`);
  
ALTER TABLE `transactiondetail`
  ADD CONSTRAINT `fk_transactiondetail_product` FOREIGN KEY (`ProductCode`) REFERENCES `product` (`ProductCode`),
  ADD CONSTRAINT `fk_transactiondetail_service` FOREIGN KEY (`ServiceCode`) REFERENCES `service` (`ServiceCode`),
  ADD CONSTRAINT `fk_transactiondetail_transactionheader` FOREIGN KEY (`TransactionCode`) REFERENCES `transactionheader` (`TransactionCode`);

UPDATE `employees` SET `EmployeeState` = 0 WHERE `UserCode` = 1;

UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 1;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 2;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 3;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 4;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 5;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 6;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 7;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 8;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 9;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 10;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 11;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 12;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 13;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 14;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 15;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 16;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 17;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 18;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 19;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 20;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 21;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 22;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 23;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 24;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 25;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 26;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 27;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 28;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 29;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 30;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 31;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 32;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 33;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 34;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 35;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 36;

UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 1;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 2;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 3;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 4;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 5;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 6;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 7;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 8;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 9;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 10;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 11;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 12;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 13;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 14;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 2 AND `WebPageCode` = 15;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 16;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 17;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 18;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 2 AND `WebPageCode` = 19;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 20;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 21;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 22;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 23;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 24;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 25;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 26;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 27;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 28;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 29;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 30;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 31;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 32;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 33;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 34;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 35;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 2 AND `WebPageCode` = 36;


UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 1;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 2;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 3;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 4;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 5;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 6;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 7;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 8;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 9;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 10;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 11;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 12;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 13;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 14;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 15;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 16;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 17;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 18;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 19;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 20;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 21;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 22;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 23;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 24;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 25;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 26;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 27;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 28;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 29;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 30;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 31;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 32;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 33;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 34;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 35;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 36;





DELIMITER $$


CREATE PROCEDURE sp_transactionheader_get_tranId_where_idUser_and_idEmployee(
	val_EmployeeCode bigint(20),
    val_UserCode bigint(20)
)
SELECT MAX(TransactionCode) FROM transactionheader
WHERE EmployeeCode = val_EmployeeCode AND usercode = val_UserCode
;$$



CREATE PROCEDURE `sp_transactionheader_admin_show_where_only_tranId`(
	IN `val_TransactionCode` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Ingresa el encabezado de una transaccion. '
SELECT 
	`transactionheader`.`TransactionCode`, 
	`transactionheader`.`TransactionDate`,
	`transactionheader`.`UserCode`, 
	`user`.`UserFirstName`, 
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`,
	`user`.`UserEmail`,
	`user`.`RoleCode`,
	`transactionheader`.`EmployeeCode`, 
	`EmployeeUser`.`UserFirstName`, 
	`EmployeeUser`.`UserSecondName`, 
	`EmployeeUser`.`UserFirstLastName`, 
	`EmployeeUser`.`UserSecondLastName`,
	`EmployeeUser`.`UserEmail`,
	`EmployeeUser`.`RoleCode`,
	`transactionheader`.`TransactionTicket`, 
	`transactionheader`.`TransactionState`, 
	`states`.`StateName`,
	`transactionheader`.`CellarCode`,
	`cellar`.`CellarName`,
	`transactionheader`.`Efectivo`,
	`transactionheader`.`Tarjeta`,
	`transactionheader`.`Total`
FROM `transactionheader` left join `user` User on `transactionheader`.`UserCode` = `user`.`UserCode`
	left join `user` `EmployeeUser` on `transactionheader`.`EmployeeCode` = `EmployeeUser`.`UserCode`
	left join `states` on `transactionheader`.`TransactionState` = `states`.`StateCode`
	left join `cellar` on `transactionheader`.`CellarCode` = `cellar`.`CellarCode`
WHERE `transactionheader`.`TransactionCode` = `val_TransactionCode`
ORDER BY `transactionheader`.`TransactionDate` DESC
;$$





CREATE PROCEDURE `sp_transactionheader_count_if_ticket`(
	IN `val_TransactionTicket` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Busca si hay una transacción existente para el numero de ticket ingresado que no haya sido eliminada. '
SELECT count(1)
FROM `transactionheader` WHERE `TransactionTicket` = `val_TransactionTicket` 
	AND `TransactionState` <> 5
;$$





CREATE PROCEDURE `sp_transactionheader_get_transactionid_where_ticket`(
	IN `val_TransactionTicket` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Busca el codigo de transacción de un ticket que no haya sido eliminado. '
SELECT max(`TransactionCode`)
FROM `transactionheader` WHERE `TransactionTicket` = `val_TransactionTicket` 
	AND `TransactionState` <> 5
;$$






		

CREATE PROCEDURE `sp_transactionheader_edit`(
	IN `val_TransactionCode` bigint(20), 
	IN `val_UserCode` bigint(20), 
	IN `val_EmployeeCode` bigint(20), 
	IN `val_TransactionTicket` bigint(20), 
	IN `val_TransactionState` bigint(20), 
	IN `val_CellarCode` bigint(20),
	IN `val_Efectivo` decimal(10,2),
	IN `val_Tarjeta` decimal(10,2)
)
MODIFIES SQL DATA
COMMENT 'Edita el encabezado de una transaccion. '
UPDATE `transactionheader` 
SET 
	`UserCode`=`val_UserCode`,
	`EmployeeCode`=`val_EmployeeCode`,
	`TransactionTicket`=`val_TransactionTicket`,
	`TransactionState`=`val_TransactionState`,
	`CellarCode`=`val_CellarCode` ,
	`Efectivo` = `val_Efectivo`,
	`Tarjeta` = `val_Tarjeta`
WHERE `TransactionCode` = `val_TransactionCode`
;$$



CREATE PROCEDURE `sp_transactionheader_edit_state`(
	IN `val_TransactionCode` bigint(20),
	IN `val_TransactionState` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Edita el encabezado de una transaccion. '
UPDATE `transactionheader` 
SET 
	`TransactionState`=`val_TransactionState`
WHERE `TransactionCode` = `val_TransactionCode`
;$$





CREATE PROCEDURE `sp_transactionheader_admin_show_where_tranId`(
	IN `val_TransactionCode` bigint(20),
	IN `val_TransactionState` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Ingresa el encabezado de una transaccion. '
SELECT 
	`transactionheader`.`TransactionCode`, 
	`transactionheader`.`TransactionDate`,
	`transactionheader`.`UserCode`, 
	`user`.`UserFirstName`, 
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`,
	`user`.`UserEmail`,
	`user`.`RoleCode`,
	`transactionheader`.`EmployeeCode`, 
	`EmployeeUser`.`UserFirstName`, 
	`EmployeeUser`.`UserSecondName`, 
	`EmployeeUser`.`UserFirstLastName`, 
	`EmployeeUser`.`UserSecondLastName`,
	`EmployeeUser`.`UserEmail`,
	`EmployeeUser`.`RoleCode`,
	`transactionheader`.`TransactionTicket`, 
	`transactionheader`.`TransactionState`, 
	`states`.`StateName`,
	`transactionheader`.`CellarCode`,
	`cellar`.`CellarName`,
	`transactionheader`.`Efectivo`,
	`transactionheader`.`Tarjeta`,
	`transactionheader`.`Total`
FROM `transactionheader` left join `user` User on `transactionheader`.`UserCode` = `user`.`UserCode`
	left join `user` `EmployeeUser` on `transactionheader`.`EmployeeCode` = `EmployeeUser`.`UserCode`
	left join `states` on `transactionheader`.`TransactionState` = `states`.`StateCode`
	left join `cellar` on `transactionheader`.`CellarCode` = `cellar`.`CellarCode`
WHERE `transactionheader`.`TransactionCode` = `val_TransactionCode`
	AND `transactionheader`.`TransactionState` = `val_TransactionState`
ORDER BY `transactionheader`.`TransactionDate` DESC
;$$

CREATE PROCEDURE `sp_transactionheader_admin_show_state_another_where`(
	IN `val_value` varchar(50),
	IN `val_TransactionState` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Ingresa el encabezado de una transaccion. '
SELECT 
	`transactionheader`.`TransactionCode`, 
	`transactionheader`.`TransactionDate`,
	`transactionheader`.`UserCode`, 
	`user`.`UserFirstName`, 
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`,
	`user`.`UserEmail`,
	`user`.`RoleCode`,
	`transactionheader`.`EmployeeCode`, 
	`EmployeeUser`.`UserFirstName`, 
	`EmployeeUser`.`UserSecondName`, 
	`EmployeeUser`.`UserFirstLastName`, 
	`EmployeeUser`.`UserSecondLastName`,
	`EmployeeUser`.`UserEmail`,
	`EmployeeUser`.`RoleCode`,
	`transactionheader`.`TransactionTicket`, 
	`transactionheader`.`TransactionState`, 
	`states`.`StateName`,
	`transactionheader`.`CellarCode`,
	`cellar`.`CellarName`,
	`transactionheader`.`Efectivo`,
	`transactionheader`.`Tarjeta`,
	`transactionheader`.`Total`
FROM `transactionheader` left join `user` User on `transactionheader`.`UserCode` = `user`.`UserCode`
	left join `user` `EmployeeUser` on `transactionheader`.`EmployeeCode` = `EmployeeUser`.`UserCode`
	left join `states` on `transactionheader`.`TransactionState` = `states`.`StateCode`
	left join `cellar` on `transactionheader`.`CellarCode` = `cellar`.`CellarCode`
WHERE `user`.`UserFirstName` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `user`.`UserSecondName` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `user`.`UserFirstLastName` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `user`.`UserSecondLastName` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `user`.`UserEmail` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `EmployeeUser`.`UserFirstName` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `EmployeeUser`.`UserSecondName` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `EmployeeUser`.`UserFirstLastName` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `EmployeeUser`.`UserSecondLastName` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `EmployeeUser`.`UserEmail` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `states`.`StateName` like `val_value` AND `transactionheader`.`TransactionState` = `val_TransactionState`
ORDER BY `transactionheader`.`TransactionDate` DESC
;$$

CREATE PROCEDURE `sp_transactionheader_admin_show_another_where`(
	IN `val_value` varchar(50)
)
MODIFIES SQL DATA
COMMENT 'Ingresa el encabezado de una transaccion. '
SELECT 
	`transactionheader`.`TransactionCode`, 
	`transactionheader`.`TransactionDate`,
	`transactionheader`.`UserCode`, 
	`user`.`UserFirstName`, 
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`,
	`user`.`UserEmail`,
	`user`.`RoleCode`,
	`transactionheader`.`EmployeeCode`, 
	`EmployeeUser`.`UserFirstName`, 
	`EmployeeUser`.`UserSecondName`, 
	`EmployeeUser`.`UserFirstLastName`, 
	`EmployeeUser`.`UserSecondLastName`,
	`EmployeeUser`.`UserEmail`,
	`EmployeeUser`.`RoleCode`,
	`transactionheader`.`TransactionTicket`, 
	`transactionheader`.`TransactionState`, 
	`states`.`StateName`,
	`transactionheader`.`CellarCode`,
	`cellar`.`CellarName`,
	`transactionheader`.`Efectivo`,
	`transactionheader`.`Tarjeta`,
	`transactionheader`.`Total`
FROM `transactionheader` left join `user` User on `transactionheader`.`UserCode` = `user`.`UserCode`
	left join `user` `EmployeeUser` on `transactionheader`.`EmployeeCode` = `EmployeeUser`.`UserCode`
	left join `states` on `transactionheader`.`TransactionState` = `states`.`StateCode`
	left join `cellar` on `transactionheader`.`CellarCode` = `cellar`.`CellarCode`
WHERE `user`.`UserFirstName` like `val_value` 
	OR `user`.`UserSecondName` like `val_value`
	OR `user`.`UserFirstLastName` like `val_value`
	OR `user`.`UserSecondLastName` like `val_value`
	OR `user`.`UserEmail` like `val_value`
	OR `EmployeeUser`.`UserFirstName` like `val_value`
	OR `EmployeeUser`.`UserSecondName` like `val_value`
	OR `EmployeeUser`.`UserFirstLastName` like `val_value`
	OR `EmployeeUser`.`UserSecondLastName` like `val_value`
	OR `EmployeeUser`.`UserEmail` like `val_value`
	OR `states`.`StateName` like `val_value`
ORDER BY `transactionheader`.`TransactionDate` DESC
;$$









CREATE PROCEDURE `sp_transactionheader_emp_show`(
	IN `val_EmployeeCode` bigint(20),
	IN `val_TransactionState` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Ingresa el encabezado de una transaccion. '
SELECT 
	`transactionheader`.`TransactionCode`, 
	`transactionheader`.`TransactionDate`,
	`transactionheader`.`UserCode`, 
	`user`.`UserFirstName`, 
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`,
	`user`.`UserEmail`,
	`user`.`RoleCode`,
	`transactionheader`.`EmployeeCode`, 
	`EmployeeUser`.`UserFirstName`, 
	`EmployeeUser`.`UserSecondName`, 
	`EmployeeUser`.`UserFirstLastName`, 
	`EmployeeUser`.`UserSecondLastName`,
	`EmployeeUser`.`UserEmail`,
	`EmployeeUser`.`RoleCode`,
	`transactionheader`.`TransactionTicket`, 
	`transactionheader`.`TransactionState`, 
	`states`.`StateName`,
	`transactionheader`.`CellarCode`,
	`cellar`.`CellarName`,
	`transactionheader`.`Efectivo`,
	`transactionheader`.`Tarjeta`,
	`transactionheader`.`Total`
FROM `transactionheader` left join `user` User on `transactionheader`.`UserCode` = `user`.`UserCode`
	left join `user` `EmployeeUser` on `transactionheader`.`EmployeeCode` = `EmployeeUser`.`UserCode`
	left join `states` on `transactionheader`.`TransactionState` = `states`.`StateCode`
	left join `cellar` on `transactionheader`.`CellarCode` = `cellar`.`CellarCode`
WHERE `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
ORDER BY `transactionheader`.`TransactionDate` DESC
;$$

CREATE PROCEDURE `sp_transactionheader_emp_show_where_tranId`(
	IN `val_TransactionCode` bigint(20),
	IN `val_EmployeeCode` bigint(20),
	IN `val_TransactionState` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Ingresa el encabezado de una transaccion. '
SELECT 
	`transactionheader`.`TransactionCode`, 
	`transactionheader`.`TransactionDate`,
	`transactionheader`.`UserCode`, 
	`user`.`UserFirstName`, 
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`,
	`user`.`UserEmail`,
	`user`.`RoleCode`,
	`transactionheader`.`EmployeeCode`, 
	`EmployeeUser`.`UserFirstName`, 
	`EmployeeUser`.`UserSecondName`, 
	`EmployeeUser`.`UserFirstLastName`, 
	`EmployeeUser`.`UserSecondLastName`,
	`EmployeeUser`.`UserEmail`,
	`EmployeeUser`.`RoleCode`,
	`transactionheader`.`TransactionTicket`, 
	`transactionheader`.`TransactionState`, 
	`states`.`StateName`,
	`transactionheader`.`CellarCode`,
	`cellar`.`CellarName`,
	`transactionheader`.`Efectivo`,
	`transactionheader`.`Tarjeta`,
	`transactionheader`.`Total`
FROM `transactionheader` left join `user` User on `transactionheader`.`UserCode` = `user`.`UserCode`
	left join `user` `EmployeeUser` on `transactionheader`.`EmployeeCode` = `EmployeeUser`.`UserCode`
	left join `states` on `transactionheader`.`TransactionState` = `states`.`StateCode`
	left join `cellar` on `transactionheader`.`CellarCode` = `cellar`.`CellarCode`
WHERE `transactionheader`.`TransactionCode` = `val_TransactionCode`
	AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode`
	AND `transactionheader`.`TransactionState` = `val_TransactionState`
ORDER BY `transactionheader`.`TransactionDate` DESC
;$$

CREATE PROCEDURE `sp_transactionheader_emp_show_another_where`(
	IN `val_value` varchar(50),
	IN `val_EmployeeCode` bigint(20),
	IN `val_TransactionState` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Ingresa el encabezado de una transaccion. '
SELECT 
	`transactionheader`.`TransactionCode`, 
	`transactionheader`.`TransactionDate`,
	`transactionheader`.`UserCode`, 
	`user`.`UserFirstName`, 
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`,
	`user`.`UserEmail`,
	`user`.`RoleCode`,
	`transactionheader`.`EmployeeCode`, 
	`EmployeeUser`.`UserFirstName`, 
	`EmployeeUser`.`UserSecondName`, 
	`EmployeeUser`.`UserFirstLastName`, 
	`EmployeeUser`.`UserSecondLastName`,
	`EmployeeUser`.`UserEmail`,
	`EmployeeUser`.`RoleCode`,
	`transactionheader`.`TransactionTicket`, 
	`transactionheader`.`TransactionState`, 
	`states`.`StateName`,
	`transactionheader`.`CellarCode`,
	`cellar`.`CellarName`,
	`transactionheader`.`Efectivo`,
	`transactionheader`.`Tarjeta`,
	`transactionheader`.`Total`
FROM `transactionheader` left join `user` User on `transactionheader`.`UserCode` = `user`.`UserCode`
	left join `user` `EmployeeUser` on `transactionheader`.`EmployeeCode` = `EmployeeUser`.`UserCode`
	left join `states` on `transactionheader`.`TransactionState` = `states`.`StateCode`
	left join `cellar` on `transactionheader`.`CellarCode` = `cellar`.`CellarCode`
WHERE `user`.`UserFirstName` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `user`.`UserSecondName` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `user`.`UserFirstLastName` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `user`.`UserSecondLastName` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `user`.`UserEmail` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `EmployeeUser`.`UserFirstName` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `EmployeeUser`.`UserSecondName` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `EmployeeUser`.`UserFirstLastName` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `EmployeeUser`.`UserSecondLastName` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `EmployeeUser`.`UserEmail` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
	OR `states`.`StateName` like `val_value` AND `transactionheader`.`EmployeeCode` = `val_EmployeeCode` AND `transactionheader`.`TransactionState` = `val_TransactionState`
ORDER BY `transactionheader`.`TransactionDate` DESC
;$$













CREATE PROCEDURE `sp_waitingqueuebybarber_max_time_barbers_queue`()
MODIFIES SQL DATA
COMMENT 'Muestra el tiempo final del ultimo servicio para el barbero seleccionado para el dia de hoy. '
SELECT `Empleados`.`UserCode`, 
	`Empleados`.`UserEmail`,
	ifnull(time(TiempoParaProximoServicio.`TiempoMaximo`),'00:00:00') TiempoFinUltimoServicio
FROM
	(SELECT `employees`.`UserCode`, `user`.`UserEmail` 
	FROM `employees` left join user on `employees`.`UserCode` = `user`.`UserCode` 
	WHERE `employees`.`EmployeeState` = 1) Empleados 
	LEFT JOIN
	(SELECT `EmployeeCode`, max(`FinalHour`) TiempoMaximo  FROM `waitingqueuebybarber` 
	WHERE `waitingqueueState` <> 5 
		AND DATE(`waitingqueuebybarber`.`QueueDate`) = CURRENT_DATE) TiempoParaProximoServicio ON Usuarios.`UserCode` = TiempoParaProximoServicio.`EmployeeCode`
;$$


CREATE PROCEDURE `sp_TransactionDetail_Insert`(
	IN `val_TransactionCode` bigint(20),
	IN `val_Units` int,
	IN `val_CourtesyProduct` int,
	IN `val_ProductCode` bigint(20),
	IN `val_ServiceCode` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Ingresa un producto al transaction detail, pero verifica si ya hay uno exitente. '
BEGIN
SET @UnidadesProductoOServicio = (SELECT count(1) FROM `transactiondetail` WHERE `TransactionCode` = val_TransactionCode AND `ProductCode` = val_ProductCode AND `ServiceCode`= val_ServiceCode AND `CourtesyProduct`= val_CourtesyProduct);
SET @unitPrice = 0;

IF `val_ProductCode` > 1 AND `val_CourtesyProduct` = 0 THEN
	SET @unitPrice = (SELECT `ProductSalePrice` FROM `product` WHERE ProductCode = val_ProductCode);
END IF;

IF `val_ServiceCode` > 1 AND `val_CourtesyProduct` = 0 THEN
	SET @unitPrice = (SELECT `ServicePrice` FROM `service` WHERE `ServiceCode` = val_ServiceCode);
END IF;

IF @UnidadesProductoOServicio < 1 THEN
	INSERT INTO `transactiondetail`(
		`TransactionCode`, `Units`,`CourtesyProduct`,`ProductCode`,`ServiceCode`, `unitPrice`
	)VALUES(
		`val_TransactionCode`, `val_Units`,`val_CourtesyProduct`,`val_ProductCode`,`val_ServiceCode`, @unitPrice
	);
ELSEIF @UnidadesProductoOServicio >= 1 THEN
	UPDATE `transactiondetail` 
	SET `Units`= `Units` + val_Units, `unitPrice`=@unitPrice
	WHERE `TransactionCode` = val_TransactionCode AND `ProductCode` = val_ProductCode AND `ServiceCode`= val_ServiceCode AND `CourtesyProduct`= val_CourtesyProduct;
END IF;

UPDATE `transactionheader` 
SET `Total`=(
	SELECT sum(`Units` * `unitPrice`)
	FROM `transactiondetail` 
	WHERE `TransactionCode` = val_TransactionCode AND `CourtesyProduct` = 0
	GROUP BY `TransactionCode`
	),
	`TransactionState` = 2
WHERE `TransactionCode` = val_TransactionCode;

END $$



CREATE PROCEDURE `sp_TransactionDetail_show`(
	IN `val_TransactionCode` bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Muestra el detalle de transaccion'
SELECT 
	`transactiondetail`.`TransactionCode`,
	`transactiondetail`.`Units`,
	`transactiondetail`.`CourtesyProduct`,
	`transactiondetail`.`ProductCode`,
	`product`.`ProductName`,
	`transactiondetail`.`ServiceCode`,
	`service`.`Name`, 
	`unitPrice`,
	`transactiondetail`.`Units` * `unitPrice` AS `Total`
FROM `transactiondetail` 
INNER JOIN `service` ON `transactiondetail`.`ServiceCode` = `service`.`ServiceCode`
INNER JOIN `product` ON `transactiondetail`.`ProductCode` = `product`.`ProductCode`
WHERE `transactiondetail`.`TransactionCode` = `val_TransactionCode`
;$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Payment_add_by_Transaction`(
    IN val_transactionCode bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Calcula el pago a empleados por medio de porcentajes en base al tiempo laborado y al servicio prestado'
BEGIN
	SET @EmployeeCode = (SELECT `EmployeeCode` FROM `transactionheader` WHERE `TransactionCode` = val_transactionCode);
    SET @val_date = (SELECT InitialDate FROM employees WHERE UserCode = @EmployeeCode);
    SET @Totalanos = (SELECT YEAR(CURRENT_DATE) - YEAR(@val_date));
    
    IF @Totalanos >= 0 AND @Totalanos <= 1 THEN
        SET @Porcentaje = 0.37;
    ELSEIF @Totalanos > 1 AND @Totalanos <= 2 THEN
        SET @Porcentaje = 0.38;
    ELSEIF @Totalanos > 2 AND @Totalanos <= 3 THEN
        SET @Porcentaje = 0.39;
    ELSEIF @Totalanos > 3 THEN
        SET @Porcentaje = 0.4;
    END IF;
    
SET @val_pago = (
	SELECT IFNULL(sum(IFNULL((`Units` * `unitPrice` * @Porcentaje),0)),0)
	FROM `transactiondetail` 
	WHERE `ServiceCode` > 1 AND `TransactionCode` = val_transactionCode
	GROUP BY `TransactionCode` = val_transactionCode
	);
	
SET @val_pago = (SELECT IFNULL(@val_pago,0));

INSERT INTO Payments (Date,NotPay,EmployeeCode,Transaction)
Values (CURRENT_TIMESTAMP,@val_pago,@EmployeeCode,val_TransactionCode);

UPDATE `transactionheader` SET `TransactionState`= 4  
WHERE `TransactionCode`= val_transactionCode;
END$$


CREATE PROCEDURE `sp_Payments_admin_show`()
    MODIFIES SQL DATA
    COMMENT 'Muestra los pagos a los empleados'
SELECT 
	`user`.`UserFirstName`, 
	`user`.`UserFirstLastName`,
	`user`.`UserEmail`,
	`employees`.`InitialDate`, 
	`payments`.`Date`, 
	IFNULL(`payments`.`NotPay`,0), 
	IFNULL(`payments`.`Pay`,0), 
	`payments`.`Transaction` 
FROM `payments`
INNER JOIN `employees` ON `payments`.`EmployeeCode` = `employees`.`UserCode`
INNER JOIN `user` ON `employees`.`UserCode` = `user`.`UserCode`
;$$





DELIMITER ;























DELIMITER $$


CREATE PROCEDURE `sp_Payment_add`(
	IN `val_Pay` decimal(10,2),
	IN `val_EmployeeCode` bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Muestra los pagos a los empleados'
INSERT INTO `payments`(
	`Date`, `Pay`, `EmployeeCode`
) VALUES (
	CURRENT_TIMESTAMP,
	`val_Pay`,
	`val_EmployeeCode`
)
;$$




DELIMITER ;


