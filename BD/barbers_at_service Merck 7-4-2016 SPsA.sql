use `barbers_at_service`;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permission_add_by_rol`(IN `val_RoleName` VARCHAR(50)) 
MODIFIES SQL DATA
COMMENT 'Agrega_permisos_por_rol'
BEGIN
SET @RoleNum = (SELECT `RoleCode` FROM `role` WHERE `RoleName` = `val_RoleName`);
INSERT INTO `permissionbyrole`(`RoleCode`, `WebPageCode`, `Permission`) SELECT @RoleNum, `webpage`.`WebPageCode`, 0 FROM `webpage`;
END $$

DELIMITER ;



/*--DROP PROCEDURE `sp_rol_add`;*/
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_rol_add`(
	IN `val_RoleName` varchar(50),
	IN `val_RoleDescription` varchar(500)
)
MODIFIES SQL DATA
COMMENT 'Agrega_roles'
BEGIN
	SET @TotalRoles = (SELECT count(1) FROM `role` WHERE `RoleName` = `val_RoleName`);
	IF @TotalRoles >= 1 THEN
		UPDATE `role` SET `RoleName` = `val_RoleName`, `RoleDescription`= `val_RoleDescription`, `RoleState` = 1 WHERE `RoleName` = `val_RoleName`;
	ELSE
		INSERT INTO `role`(`RoleName`, `RoleDescription`, `RoleState`) VALUES (`val_RoleName`,`val_RoleDescription`, 1); 
		CALL `sp_permission_add_by_rol`(`val_RoleName`);
	END IF;
END $$

DELIMITER ;





/*--CALL `sp_rol_add`('val_Name', 'val_Description');*/
CALL `sp_rol_add`('Administrador', 'Administrador del sistema');
CALL `sp_rol_add`('Cliente', 'Cliente de la barberia');
CALL `sp_rol_add`('Barbero', 'Barbero');


/*--DROP PROCEDURE `sp_rol_edit`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_rol_edit`(
	IN `val_RoleCode` int(11),
	IN `val_RoleName` varchar(50),
	IN `val_RoleDescription` varchar(500),
	IN `val_RoleState` bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Modifica un rol'
UPDATE `role` 
SET `RoleName`=`val_RoleName`,
	`RoleDescription`=`val_RoleDescription`,
	`RoleState`=`val_RoleState` 
WHERE `RoleCode`= `val_RoleCode`;

/*--DROP PROCEDURE `sp_role_show`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_role_show`()
    MODIFIES SQL DATA
    COMMENT 'Busca un usuario por el email'
SELECT `RoleCode`, 
	`RoleName`, 
	`RoleDescription`, 
	`RoleState` 
FROM `role`;

/*--DROP PROCEDURE `sp_permission_get_all_by_role`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permission_get_all_by_role`(IN val_RoleCode int(11))
    MODIFIES SQL DATA
    COMMENT 'Obtiene un permiso'
SELECT 
	permissionbyrole.WebPageCode
FROM 
	permissionbyrole INNER JOIN role ON permissionbyrole.RoleCode = role.RoleCode
	 INNER JOIN webpage ON permissionbyrole.WebPageCode = webpage.WebPageCode
WHERE permissionbyrole.RoleCode = val_RoleCode AND permissionbyrole.Permission = 1 AND webpage.WebState = 1 AND role.RoleState = 1
;

/*--DROP PROCEDURE `sp_permission_insert`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permission_insert`
(
	IN `val_RoleCode` int(11),
	IN `val_WebPageCode` int(11),
	IN `val_permission` TINYINT
)
    MODIFIES SQL DATA
    COMMENT 'Ingresa un permiso'
INSERT INTO `permissionbyrole`(
	`RoleCode`, 
	`WebPageCode`,
	`permission`
) VALUES (
	`val_RoleCode`, 
	`val_WebPageCode`,
	`val_permission`
);

/*--DROP PROCEDURE `sp_permission_update`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permission_update`
(
	IN `val_RoleCode` int(11),
	IN `val_WebPageCode` int(11),
	IN `val_permission` TINYINT
)
    MODIFIES SQL DATA
    COMMENT 'Actualiza un permiso'
UPDATE `permissionbyrole` 
SET 
	`permission`= `val_permission`
WHERE 
	`RoleCode` = `val_RoleCode` and 
	`WebPageCode`=`val_WebPageCode`;


/*--DROP PROCEDURE `sp_permission_get_all`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permission_get_all`()
    MODIFIES SQL DATA
    COMMENT 'Obtiene un permiso'
SELECT 
	permissionbyrole.RoleCode, 
	role.RoleName, 
	permissionbyrole.WebPageCode, 
	webpage.WebPageName, 
	permissionbyrole.permission 
FROM 
	permissionbyrole INNER JOIN role ON permissionbyrole.RoleCode = role.RoleCode
	 INNER JOIN webpage ON permissionbyrole.WebPageCode = webpage.WebPageCode
ORDER BY permissionbyrole.RoleCode, permissionbyrole.WebPageCode ASC;



	
UPDATE permissionbyrole SET Permission = 1 WHERE permissionbyrole.RoleCode = 1;





/*DROP PROCEDURE `sp_user_add`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_add`(
	IN `val_UserFirstName` VARCHAR(25) CHARSET utf8, 
	IN `val_UserSecondName` VARCHAR(50) CHARSET utf8, 
	IN `val_UserFirstLastName` VARCHAR(50) CHARSET utf8, 
	IN `val_UserSecondLastName` VARCHAR(50) CHARSET utf8, 
	IN `val_UserBornDate` DATE, 
	IN `val_Phone` VARCHAR(15) CHARSET utf8, 
	IN `val_UserEmail` VARCHAR(100) CHARSET utf8,
	IN `val_Password` VARCHAR(50) CHARSET utf8
) 
	COMMENT 'Agrega un usuario' NOT DETERMINISTIC MODIFIES SQL DATA SQL SECURITY DEFINER 
INSERT INTO `user`(
	`UserFirstName`, 
	`UserSecondName`, 
	`UserFirstLastName`, 
	`UserSecondLastName`, 
	`UserBornDate`, 
	`Phone`, 
	`UserEmail`, 
	`CreationDate`, 
	`Password`, 
	`UserState`, 
	`RoleCode`
) VALUES (
	`val_UserFirstName`, 
	`val_UserSecondName`, 
	`val_UserFirstLastName`, 
	`val_UserSecondLastName`, 
	`val_UserBornDate`, 
	`val_Phone`, 
	`val_UserEmail`, 
	CURRENT_TIMESTAMP, 
	`val_Password`, 
	1, 
	2
);

/*DROP PROCEDURE `sp_user_edit`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_edit`(
	IN `val_UserCode` bigint(11),
	IN `val_UserFirstName` VARCHAR(25) CHARSET utf8, 
	IN `val_UserSecondName` VARCHAR(50) CHARSET utf8, 
	IN `val_UserFirstLastName` VARCHAR(50) CHARSET utf8, 
	IN `val_UserSecondLastName` VARCHAR(50) CHARSET utf8, 
	IN `val_UserBornDate` DATE, 
	IN `val_Phone` VARCHAR(15) CHARSET utf8, 
	IN `val_UserEmail` VARCHAR(100) CHARSET utf8,
	IN `val_UserState` bigint(20),
	IN `val_RoleCode` int(11)
) 
	COMMENT 'Agrega un usuario' NOT DETERMINISTIC MODIFIES SQL DATA SQL SECURITY DEFINER 
UPDATE `user` 
SET 
	`UserFirstName` = `val_UserFirstName`,
	`UserSecondName` = `val_UserSecondName`,
	`UserFirstLastName` = `val_UserFirstLastName`,
	`UserSecondLastName` = `val_UserSecondLastName`,
	`UserBornDate`= `val_UserBornDate`,
	`Phone` = `val_Phone`,
	`UserEmail` = `val_UserEmail`,
	`UserState` = `val_UserState`,
	`RoleCode` = `val_RoleCode`
WHERE `UserCode` =`val_UserCode`;

/*--CALL `sp_user_add`(
	'val_UserFirstName', 
	'val_UserSecondName',
	'val_UserFirstLastName', 
	'val_UserSecondLastName',
	'val_UserBornDate',
	'val_Phone',
	'val_UserEmail',
	'val_Password');*/




/*--CALL `sp_user_edit`(
	`val_UserCode`,
	`val_UserFirstName`, 
	`val_UserSecondName`, 
	`val_UserFirstLastName`, 
	`val_UserSecondLastName`, 
	`val_UserBornDate`, 
	`val_Phone`, 
	`val_UserEmail`,
	`val_Password`,
	`val_UserState`,
	`val_RoleCode`);*/


	
CALL `sp_user_add`('Administrador', 'Administrador', 'Administrador', 'Administrador', '', '12345678', 'admin@galileo.edu', '202cb962ac59075b964b07152d234b70');
update user set `RoleCode` = 1 where UserEmail = 'admin@galileo.edu';
CALL `sp_user_add`('Edwin', '', 'Salazar', 'masaya', '', '12345678', 'esalazarmasaya@galileo.edu', '202cb962ac59075b964b07152d234b70');
CALL `sp_user_add`('Enrique', 'José', 'Merck', 'Cifuentes', '', '12345678', 'enriquemerck@galileo.edu', '202cb962ac59075b964b07152d234b70');
CALL `sp_user_add`('Alejandro', 'José', 'Echeverría', 'Valls', '', '12345678', 'ajeche@galileo.edu', '202cb962ac59075b964b07152d234b70');
CALL `sp_user_add`('Melvin', 'Daniel', 'Garcia', 'Garcia', '', '12345678', 'melvingar@galileo.edu', '202cb962ac59075b964b07152d234b70');
CALL `sp_user_add`('Pablo', 'Francisco', 'Callejas', 'Cifuentes', '', '12345678', 'pabcc@galileo.edu', '202cb962ac59075b964b07152d234b70');



/*DROP PROCEDURE `sp_user_login`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_login`(IN `val_Email` VARCHAR(100), IN `val_password` VARCHAR(50))
    MODIFIES SQL DATA
    COMMENT 'Busca un usuario por el email'
SELECT 
	`UserCode`, 
	`UserFirstName`, 
	`UserSecondName`, 
	`UserFirstLastName`, 
	`UserSecondLastName`, 
	`UserBornDate`, 
	`Phone`, 
	`UserEmail`, 
	`CreationDate`, 
	`Password`, 
	`UserState`, 
	`RoleCode` 
FROM `user` 
WHERE 
	`UserEmail` = `val_Email` and 
	`Password` = `val_password`;




/*DROP PROCEDURE `sp_user_show_all`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_show_all`() 
	COMMENT 'Muestra todos los usuarios' NOT DETERMINISTIC MODIFIES SQL DATA SQL SECURITY DEFINER 
SELECT `UserCode`, 
	`UserFirstName`, 
	`UserSecondName`, 
	`UserFirstLastName`, 
	`UserSecondLastName`, 
	`UserBornDate`, 
	`Phone`, 
	`UserEmail`, 
	`CreationDate`, 
	`UserState`, 
	`RoleCode` 
FROM `user`;

/*DROP PROCEDURE `sp_user_get_id`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_get_id`()
    MODIFIES SQL DATA
    COMMENT 'Busca un usuario por el email'
SELECT 
	`UserCode`,
	`UserEmail`,
	`UserFirstName`, 
	`UserSecondName`, 
	`UserFirstLastName`, 
	`UserSecondLastName`
FROM `user`
ORDER BY `UserEmail` ASC;
	
/*DROP PROCEDURE `sp_user_get_id_where`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_get_id_where`(IN `val_value` VARCHAR(100))
    MODIFIES SQL DATA
    COMMENT 'Busca un usuario por el email'
SELECT 
	`UserCode`,
	`UserEmail`,
	`UserFirstName`, 
	`UserSecondName`, 
	`UserFirstLastName`, 
	`UserSecondLastName`
FROM `user` 
WHERE 
	`UserEmail` = `val_value` AND  `UserCode` = val_value OR 
	`UserFirstName` = `val_value` AND  `UserCode` = val_value OR  
	`UserSecondName` = `val_value` AND  `UserCode` = val_value OR 
	`UserFirstLastName` = `val_value` AND  `UserCode` = val_value OR 
	`UserSecondLastName` = `val_value` AND  `UserCode` = val_value 
ORDER BY `UserEmail` ASC;
	


	
	
	





/*--DROP PROCEDURE `sp_brand_add`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_brand_add`(
	IN `val_Name` VARCHAR(50) CHARSET utf8, 
	IN `val_Description` VARCHAR(500) CHARSET utf8,
	IN `val_BrandState` bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Agrega un brand'
INSERT INTO `brand`(
	`brandName`, 
	`Description`,
	`BrandState`
) VALUES (
	`val_Name`, 
	`val_Description`,
	`val_BrandState`
);


/*--CALL `sp_brand_add`('val_Name', 'val_Description');*/
CALL `sp_brand_add`('Gallo', 'Cerveza Nacional',1);


/*--DROP PROCEDURE `sp_brand_edit`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_brand_edit`(
	IN `val_Code` VARCHAR(50) CHARSET utf8,
	IN `val_Name` VARCHAR(50) CHARSET utf8, 
	IN `val_Description` VARCHAR(500) CHARSET utf8,
	IN `val_BrandState` bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Modifica un brand'
UPDATE `brand` 
SET `brandName` = `val_Name`,
	`Description` = `val_Description`,
	`BrandState` = `val_BrandState`
WHERE `brandCode` = `val_Code`;

/*DROP PROCEDURE `sp_brand_show`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_brand_show`()
    MODIFIES SQL DATA
    COMMENT 'Busca un usuario por el email'
SELECT 
	`brandCode`, 
	`brandName`, 
	`Description`,
	`BrandState`
FROM `brand`;





/*--DROP PROCEDURE `sp_cellar_add`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cellar_add`(
	IN `val_Name` VARCHAR(50) CHARSET utf8, 
	IN `val_Description` VARCHAR(500) CHARSET utf8,
	IN `val_Length` VARCHAR(50) CHARSET utf8,
	IN `val_Latitude` VARCHAR(50) CHARSET utf8,
	IN `val_Shopping` int(11))
    MODIFIES SQL DATA
    COMMENT 'Agrega un cellar'
INSERT INTO `cellar`(
	`cellarName`, 
	`Description`, 
	Length, 
	Latitude, 
	Shopping
) VALUES (
	`val_Name`, 
	`val_Description`, 
	`val_Length`, 
	`val_Latitude`, 
	`val_Shopping`);


/*--CALL `sp_cellar_add`('val_Name', 'val_Description',`Length`,`Latitude`,`Shopping`);*/
CALL `sp_cellar_add`('Barber', 'Bodega principal','3x2','10',0);


/*--DROP PROCEDURE `sp_cellar_edit`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cellar_edit`(
	IN `val_Code` bigint(20),
	IN `val_Name` VARCHAR(50) CHARSET utf8, 
	IN `val_Description` VARCHAR(500) CHARSET utf8,
	IN `val_Length` VARCHAR(50) CHARSET utf8,
	IN `val_Latitude` VARCHAR(50) CHARSET utf8,
	IN `val_Shopping` int(11))
    MODIFIES SQL DATA
    COMMENT 'Modifica un cellar'
UPDATE `cellar` 
SET `cellarName`=`val_Name`,
	`Description`=`val_Description`,
	`Length`=`val_Length`,
	`Latitude`=`val_Latitude`,
	`Shopping`=`val_Shopping` 
WHERE `cellarCode`=`val_Code`;

/*DROP PROCEDURE `sp_cellar_show`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cellar_show`()
    MODIFIES SQL DATA
    COMMENT 'Busca un usuario por el email'
SELECT 
	`CellarCode`, 
	`CellarName`, 
	`Description`, 
	`Length`, 
	`Latitude`, 
	`Shopping`
FROM `cellar`;

/*DROP PROCEDURE `sp_cellar_show_where_id`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cellar_show_where_id`(IN val_id varchar(20))
    MODIFIES SQL DATA
    COMMENT 'Busca una bodega por id'
SELECT 
	`CellarCode`, 
	`CellarName`, 
	`Description`, 
	`Length`, 
	`Latitude`, 
	`Shopping`
FROM `cellar`
WHERE `CellarCode` = val_id;



/*--DROP PROCEDURE `sp_webpage_insert`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_webpage_insert`
(
	IN `val_WebPageName` varchar(25),
	IN `val_UrlWebPage` varchar(500),
	IN `val_WebPageDescription` varchar(500),
	IN `val_WebState` bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Ingresa una pagina'
INSERT INTO `webpage`(
	`WebPageName`, 
	`UrlWebPage`, 
	`WebPageDescription`,
	`WebState`
) VALUES (
	`val_WebPageName`, 
	`val_UrlWebPage`, 
	`val_WebPageDescription`,
	`val_WebState`
);

/*--DROP PROCEDURE `sp_webpage_update`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_webpage_update`
(
	IN `val_WebPageCode` int(11),
	IN `val_WebPageName` varchar(25),
	IN `val_UrlWebPage` varchar(500),
	IN `val_WebPageDescription` varchar(500),
	IN `val_WebState` bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Edita una pagina'
UPDATE `webpage` 
SET 
	`WebPageName` = `val_WebPageName`,
	`UrlWebPage`= `val_UrlWebPage`,
	`WebPageDescription`= `val_WebPageDescription`,
	`WebState`= `val_WebState` 
WHERE `WebPageCode` = `val_WebPageCode`;

/*--DROP PROCEDURE `sp_webpage_get_all`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_webpage_get_all`()
    MODIFIES SQL DATA
    COMMENT 'Devuelve todas las paginas'
SELECT 
	`WebPageCode`, 
	`WebPageName`, 
	`UrlWebPage`, 
	`WebPageDescription`,
	`WebState` 
FROM `webpage`;

/*--DROP PROCEDURE `sp_productpresentation_add`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productpresentation_add`(
	IN `val_Presentation` VARCHAR(50) CHARSET utf8, 
	IN `val_Description` VARCHAR(500) CHARSET utf8, 
	IN `val_Units` int(11))
    MODIFIES SQL DATA
    COMMENT 'Agrega una presentación de producto'
INSERT INTO `productpresentation`(
	`Presentation`, 
	`Description`, 
	`Units`
) VALUES (
	`val_Presentation`, 
	`val_Description`, 
	`val_Units`
);

/*--DROP PROCEDURE `sp_productpresentation_edit`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productpresentation_edit`(
	IN `val_ProductPresentationCode` bigint(20),
	IN `val_Presentation` VARCHAR(50) CHARSET utf8, 
	IN `val_Description` VARCHAR(500) CHARSET utf8, 
	IN `val_Units` int(11))
    MODIFIES SQL DATA
    COMMENT 'Modifica una presentacion de producto'
UPDATE `productpresentation` 
SET 
	`Presentation`=`val_Presentation`,
	`Description`=`val_Description`,
	`Units`=`val_Units` 
WHERE `ProductPresentationCode`=`val_ProductPresentationCode`;

/*DROP PROCEDURE `sp_productpresentation_show`;*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productpresentation_show`()
    MODIFIES SQL DATA
    COMMENT 'Muestra las presentaciones de producto'
SELECT 
	`ProductPresentationCode`, 
	`Presentation`, 
	`Description`, 
	`Units` 
FROM `productpresentation`;




/*--DROP PROCEDURE `sp_ProducType_add`;*/
CREATE PROCEDURE `sp_ProducType_add`(
	IN `val_Productypename` varchar(50),
	IN `val_ProducTypeDescription` varchar(500) 
)
    MODIFIES SQL DATA
    COMMENT 'Agrega una Entrada de un Tipo de Producto'
INSERT INTO `ProducType`(
	`Productypename`,
	`Description`
) VALUES (
	`val_Productypename`,
	`val_ProducTypeDescription`
);


/*--DROP PROCEDURE `sp_ProducType_edit`;*/
CREATE PROCEDURE `sp_ProducType_edit`(
	`val_ProducTypeCode` bigint(20),
	`val_Productypename` varchar(50),
	`val_ProducTypeDescription` varchar(500)
)
    MODIFIES SQL DATA
    COMMENT 'Modifica un tipo de producto'
UPDATE `ProducType` 
SET `ProducTypeName`=`val_Productypename`,
    `Description`= `val_ProducTypeDescription`
WHERE	
	`ProducTypeCode`=`val_ProducTypeCode`;


/*DROP PROCEDURE `sp_ProducType_show`;*/
CREATE PROCEDURE `sp_ProducType_show`()
    MODIFIES SQL DATA
    COMMENT 'Busca un tipo producto por el codigo de tipo producto'
SELECT `ProducTypeCode`, 
	`ProducTypeName`,
	 `Description`
FROM `ProducType`;


/*--DROP PROCEDURE `sp_product_add`;*/
CREATE PROCEDURE `sp_Product_add`(
	IN `val_ProductName` VARCHAR(50), 
	IN `val_Description` varchar(500), 
	IN `val_Presentation` bigint(20),
	IN `val_Barcode` bigint(20),
	IN `val_CostPrice` decimal(10,2),
	IN `val_ProductState` boolean,
	IN `val_ProductSalePrice` decimal(10,2),
	IN `val_ProdcType` bigint(20),
	IN `val_BrandProduct` bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Agrega un producto'
INSERT INTO `product`(
	`ProductName`, 
	`Description`, 
	`Presentation`, 
	`Barcode`, 
	`ProductCostPrice`, 
	`ProductState`, 
	`ProductSalePrice`, 
	`ProducType`, 
	`BrandProduct`
) VALUES (
	`val_ProductName`, 
	`val_Description`,
	`val_Presentation`,
	`val_Barcode`,
	`val_CostPrice`,
	`val_ProductState`,
	`val_ProductSalePrice`,
	`val_ProdcType`,
	`val_BrandProduct`
);



/*--DROP PROCEDURE `sp_product_edit`;*/
CREATE PROCEDURE `sp_Product_edit`(
	`val_ProductCode` bigint(20),
	`val_ProductName` VARCHAR(50), 
	`val_Description` varchar(500), 
	`val_Presentation` bigint(20),
	`val_Barcode` bigint(20),
	`val_CostPrice` decimal(10,2),
	`val_ProductState` boolean,
	`val_ProductSalePrice` decimal(10,2),
	`val_ProdcType` bigint(20),
	`val_BrandProduct` bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Modifica un Producto'
UPDATE `product` 
SET `ProductName` = `val_ProductName`, 
	`Description` = `val_Description`,
	`Presentation` = `val_Presentation`,
	`Barcode` = `val_Barcode`,
	`ProductCostPrice` = `val_CostPrice`,
	`ProductState` = `val_ProductState`,
	`ProductSalePrice` = `val_ProductSalePrice`,
	`ProducType` = `val_ProdcType`,
	`BrandProduct` = `val_BrandProduct`
WHERE `ProductCode`= `val_ProductCode`;



/*--DROP PROCEDURE `sp_product_show_min`;*/
/*CREATE PROCEDURE `sp_product_show_min`()
    MODIFIES SQL DATA
    COMMENT 'Busca un product por el codigo del producto'
SELECT 
	`product`.`ProductCode`, 
	`product`.`ProductName`, 
	`product`.`ProductSalePrice`, 
	`productype`.`ProducTypeName`, 
	`brand`.`BrandName`
FROM `product` left join `brand` on `product`.`BrandProduct` = `brand`.`BrandCode`
	left join `productype` on `product`.`ProducType` = `productype`.`ProducTypeCode`;	*/


/*DROP PROCEDURE `sp_product_show_where`;*/
CREATE PROCEDURE `sp_product_show_where`(IN `val_value` VARCHAR(50))
    MODIFIES SQL DATA
    COMMENT 'Busca un product por el codigo del producto'
SELECT 
	`product`.`ProductCode`, 
	`product`.`ProductName`, 
	`product`.`Description`, 
	`product`.`Presentation`, 
	`product`.`Barcode`, 
	`product`.`ProductCostPrice`, 
	`product`.`ProductState`, 
	`product`.`ProductSalePrice`, 
	`product`.`ProducType`, 
	`product`.`BrandProduct`
FROM `product`
WHERE `product`.`ProductName` LIKE `val_value` or `product`.`Description` LIKE `val_value`;

	
/*DROP PROCEDURE `sp_product_show`;*/
CREATE PROCEDURE `sp_product_show`()
    MODIFIES SQL DATA
    COMMENT 'Busca un product por el codigo del producto'
SELECT 
	`product`.`ProductCode`, 
	`product`.`ProductName`, 
	`product`.`Description`, 
	`product`.`Presentation`, 
	`product`.`Barcode`, 
	`product`.`ProductCostPrice`, 
	`product`.`ProductState`, 
	`product`.`ProductSalePrice`, 
	`product`.`ProducType`, 
	`product`.`BrandProduct`
FROM `product`;



/*--DROP PROCEDURE `sp_service_add`;*/
CREATE PROCEDURE `sp_service_add`(
	IN `val_Servicename` varchar(50),
	IN `val_ServicePrice` decimal(10,2) 
)
    MODIFIES SQL DATA
    COMMENT 'Agrega un Servicio'
INSERT INTO `service`(
	`Name`, 
	`ServicePrice`, 
	`ServiceState`
) VALUES (
	val_Servicename,
	val_ServicePrice,
	1
);

/*--DROP PROCEDURE `sp_service_edit`;*/
CREATE PROCEDURE `sp_service_edit`(
	IN `val_ServiceCode` bigint(20),
	IN `val_Servicename` varchar(50),
	IN `val_ServicePrice` decimal(10,2),
	IN `val_ServiceState` tinyint(1) 
)
    MODIFIES SQL DATA
    COMMENT 'Edita un Servicio'
UPDATE `service` 
SET 
	`Name`= val_Servicename,
	`ServicePrice`= val_ServicePrice,
	`ServiceState`= val_ServiceState 
WHERE `ServiceCode`= val_ServiceCode;


/*--DROP PROCEDURE `sp_service_show`;*/
CREATE PROCEDURE `sp_service_show`()
    MODIFIES SQL DATA
    COMMENT 'Devuelve los servicios'
SELECT 
	`ServiceCode`, 
	`Name`, 
	`ServicePrice`, 
	`ServiceState` 
FROM `service`;

/*--DROP PROCEDURE `sp_service_show_where`;*/
CREATE PROCEDURE `sp_service_show_where`(IN val_Name varchar(50))
    MODIFIES SQL DATA
    COMMENT 'Devuelve los servicios'
SELECT 
	`ServiceCode`, 
	`Name`, 
	`ServicePrice`, 
	`ServiceState` 
FROM `service`
WHERE Name LIKE val_Name;


/*--DROP PROCEDURE `sp_employees_add`;*/
CREATE PROCEDURE `sp_employees_add`(
	IN `val_UserCode` bigint(20),
	IN `val_InicialLunchTime` time,
	IN `val_FinalLunchTime` time,
	IN `val_InitialDate` date,
	IN `val_CellarCode` bigint(20) 
)
    MODIFIES SQL DATA
    COMMENT 'Agrega un Servicio'
INSERT INTO `employees`(
	`UserCode`,
	`InicialLunchTime`, 
	`FinalLunchTime`, 
	`InitialDate`, 
	`EmployeeState`, 
	`CellarCode`
) VALUES (
	val_UserCode,
	val_InicialLunchTime,
	val_FinalLunchTime,
	val_InitialDate,
	1,
	val_CellarCode
);

/*--DROP PROCEDURE `sp_employees_edit`;*/
CREATE PROCEDURE `sp_employees_edit`(
	IN `val_UserCode` bigint(20),
	IN `val_InicialLunchTime` time,
	IN `val_FinalLunchTime` time,
	IN `val_InitialDate` date,
	IN `val_FinalDate` date,
	IN `val_EmployeeState` tinyint(1),
	IN `val_CellarCode` bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Agrega un Servicio'
UPDATE `employees` 
SET 
	`InicialLunchTime`=val_InicialLunchTime,
	`FinalLunchTime`=val_FinalLunchTime,
	`InitialDate`=val_InitialDate,
	`FinalDate`=val_FinalDate,
	`EmployeeState`=val_EmployeeState,
	`CellarCode`=val_CellarCode 
WHERE `UserCode`=val_UserCode;

/*--DROP PROCEDURE `sp_employees_show`;*/
CREATE PROCEDURE `sp_employees_show`()
    MODIFIES SQL DATA
    COMMENT 'Agrega un Servicio'
SELECT 
	`UserCode`, 
	`InicialLunchTime`, 
	`FinalLunchTime`, 
	`InitialDate`, 
	`FinalDate`, 
	`EmployeeState`, 
	`CellarCode` 
FROM `employees`;

/*--DROP PROCEDURE `sp_AverageTimeByBarber`;*/
CREATE PROCEDURE `sp_AverageTimeByBarber`(
	IN `val_MinTime` Time,
	IN `val_MaxTime` Time,
	IN `val_BesTime` Time,
	IN `val_ServiceTimeBarberCode` bigint(20)
)

UPDATE `servicetimebybarber`
	SET `MinTime` = `val_MinTime`,
	 `MaxTime` = `val_MaxTime`,
	 `BesTime` = `val_BesTime`,
    `AverageTime`= (`val_MinTime` + `val_MaxTime` + (4*`val_BesTime`)) / 6 
WHERE `ServiceTimeBarberCode` = `val_ServiceTimeBarberCode`;


/*--DROP PROCEDURE `sp_employee_get_info_from_user_by_id_where`;*/
CREATE PROCEDURE `sp_employee_get_info_from_user_by_id_where`(
	IN val_id bigint(20)
)
SELECT 
	`employees`.`UserCode`, 
	`employees`.`CellarCode`, 
	`user`.`UserEmail`, 
	`user`.`UserFirstName`, 
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`
FROM `employees` left join `user` on `employees`.`UserCode` = `user`.`UserCode`
WHERE `employees`.`UserCode` = val_id
;

/*--DROP PROCEDURE `sp_employee_get_info_from_user_by_id`;*/
CREATE PROCEDURE `sp_employee_get_info_from_user_by_id`(
)
SELECT 
	`employees`.`UserCode`, 
	`employees`.`CellarCode`, 
	`user`.`UserEmail`, 
	`user`.`UserFirstName`, 
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`
FROM `employees` left join `user` on `employees`.`UserCode` = `user`.`UserCode`
;


/*--DROP PROCEDURE `sp_waitingqueuebybarber_show`;*/
CREATE PROCEDURE `sp_waitingqueuebybarber_show`()
MODIFIES SQL DATA
COMMENT 'Muestra colas'
SELECT 
	`waitingqueuebybarber`.`QueueCode`, 
	`waitingqueuebybarber`.`QueueDate`, 
	`waitingqueuebybarber`.`waitingqueueState`, 
	`waitingqueuebybarber`.`InitialHour`, 
	`waitingqueuebybarber`.`FinalHour`, 
	`waitingqueuebybarber`.`Service`, 
	`waitingqueuebybarber`.`User`, 
	`waitingqueuebybarber`.`EmployeeCode`,
	`user`.`userfirstname`,
	`user`.`UserFirstLastName`
FROM `waitingqueuebybarber` left join user on waitingqueuebybarber.EmployeeCode = user.UserCode
;

