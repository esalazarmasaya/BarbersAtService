-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2016 a las 19:23:56
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `barbers_at_service`
--
drop database barbers_at_service;
create database barbers_at_service;
use barbers_at_service;

DELIMITER $$
--
-- Procedimientos
--




CREATE PROCEDURE `sp_transactionheader_admin_show`()
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
ORDER BY `transactionheader`.`TransactionDate` DESC
;$$



CREATE PROCEDURE `sp_transactionheader_add`( 
	IN `val_UserCode` bigint(20), 
	IN `val_EmployeeCode` bigint(20), 
	IN `val_TransactionTicket` bigint(20), 
	IN `val_CellarCode` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Ingresa el encabezado de una transaccion. '
INSERT INTO `transactionheader`(
	`TransactionDate`,
	`UserCode`, 
	`EmployeeCode`, 
	`TransactionTicket`, 
	`TransactionState`,
	`CellarCode`,
	`Efectivo`,
	`Tarjeta`,
	`Total`
) VALUES (
	CURRENT_TIMESTAMP,
	`val_UserCode`,
	`val_EmployeeCode`,
	`val_TransactionTicket`,
	1,
	`val_CellarCode`,
	0,
	0,
	0
)
;$$


CREATE PROCEDURE `sp_waitingqueuebybarber_admin_show_emp_user_where_state_another`(
	IN val_value varchar(50),
	IN val_waitingqueueState bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Muestra todos los tickets con decripcion de usuario y empleado por estado y por los valores encontrados en el texto ingresado. '
SELECT 
	`waitingqueuebybarberEmployee`.`QueueCode`, 
	`waitingqueuebybarberEmployee`.`QueueDate`, 
	`waitingqueuebybarberEmployee`.`waitingqueueState`, 
	`waitingqueuebybarberEmployee`.`StateName`,
	`waitingqueuebybarberEmployee`.`InitialHour`, 
	`waitingqueuebybarberEmployee`.`FinalHour`, 
	`waitingqueuebybarberEmployee`.`Service`, 
	`waitingqueuebybarberEmployee`.`ServiceName`,
	`waitingqueuebybarberEmployee`.`User`,
	`user`.`UserFirstName` UserFirstName, 
	`user`.`UserSecondName` UserSecondName, 
	`user`.`UserFirstLastName` UserFirstLastName, 
	`user`.`UserSecondLastName` UserSecondFirstLastName,
	`user`.`UserEmail` UserEmail,  
	`user`.`RoleCode` UserRoleCode,
	`waitingqueuebybarberEmployee`.`EmployeeCode`,
	`waitingqueuebybarberEmployee`.EmployeeFirstName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondName, 
	`waitingqueuebybarberEmployee`.EmployeeFirstLastName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondFirstLastName,
	`waitingqueuebybarberEmployee`.EmployeeEmail,  
	`waitingqueuebybarberEmployee`.EmployeeRoleCode
FROM 
	(SELECT 
		`waitingqueuebybarber`.`QueueCode`, 
		`waitingqueuebybarber`.`QueueDate`, 
		`waitingqueuebybarber`.`waitingqueueState`, 
		`states`.`StateName`,
		`waitingqueuebybarber`.`InitialHour`, 
		`waitingqueuebybarber`.`FinalHour`, 
		`waitingqueuebybarber`.`Service`, 
		`Service`.`Name` ServiceName,
		`waitingqueuebybarber`.`User`, 
		`waitingqueuebybarber`.`EmployeeCode`,
		`user`.`UserFirstName` EmployeeFirstName, 
		`user`.`UserSecondName` EmployeeSecondName, 
		`user`.`UserFirstLastName` EmployeeFirstLastName, 
		`user`.`UserSecondLastName` EmployeeSecondFirstLastName,
		`user`.`UserEmail` EmployeeEmail,  
		`user`.`RoleCode` EmployeeRoleCode
	FROM `waitingqueuebybarber` left join `user` on `waitingqueuebybarber`.`EmployeeCode`  = `user`.`usercode`
			left join `Service` on `waitingqueuebybarber`.`Service` = `Service`.`ServiceCode`
			left join states on `waitingqueuebybarber`.`waitingqueueState` = `states`.`StateCode`
			WHERE `waitingqueuebybarber`.`waitingqueueState` = val_waitingqueueState) as waitingqueuebybarberEmployee 
	left join `user` on `waitingqueuebybarberEmployee`.`User`  = `user`.`usercode`
WHERE 
	`waitingqueuebybarberEmployee`.`StateName` like val_value OR 
	`waitingqueuebybarberEmployee`.`ServiceName` like val_value OR 
	`user`.`UserFirstName` like val_value OR 
	`user`.`UserSecondName` like val_value OR 
	`user`.`UserFirstLastName` like val_value OR 
	`user`.`UserSecondLastName` like val_value OR 
	`user`.`UserEmail` like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeFirstName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeSecondName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeFirstLastName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeSecondFirstLastName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeEmail like val_value
ORDER BY `waitingqueuebybarberEmployee`.`QueueDate` DESC
;$$

CREATE PROCEDURE `sp_waitingqueuebybarber_admin_show_employee_user_where_state`(
	IN val_waitingqueueState bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Muestra todos los tickets con decripcion de usuario y empleado por estado. '
SELECT 
	`waitingqueuebybarberEmployee`.`QueueCode`, 
	`waitingqueuebybarberEmployee`.`QueueDate`, 
	`waitingqueuebybarberEmployee`.`waitingqueueState`, 
	`waitingqueuebybarberEmployee`.`StateName`,
	`waitingqueuebybarberEmployee`.`InitialHour`, 
	`waitingqueuebybarberEmployee`.`FinalHour`, 
	`waitingqueuebybarberEmployee`.`Service`, 
	`waitingqueuebybarberEmployee`.`ServiceName`,
	`waitingqueuebybarberEmployee`.`User`,
	`user`.`UserFirstName` UserFirstName, 
	`user`.`UserSecondName` UserSecondName, 
	`user`.`UserFirstLastName` UserFirstLastName, 
	`user`.`UserSecondLastName` UserSecondFirstLastName,
	`user`.`UserEmail` UserEmail,  
	`user`.`RoleCode` UserRoleCode,
	`waitingqueuebybarberEmployee`.`EmployeeCode`,
	`waitingqueuebybarberEmployee`.EmployeeFirstName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondName, 
	`waitingqueuebybarberEmployee`.EmployeeFirstLastName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondFirstLastName,
	`waitingqueuebybarberEmployee`.EmployeeEmail,  
	`waitingqueuebybarberEmployee`.EmployeeRoleCode
FROM 
	(SELECT 
		`waitingqueuebybarber`.`QueueCode`, 
		`waitingqueuebybarber`.`QueueDate`, 
		`waitingqueuebybarber`.`waitingqueueState`, 
		`states`.`StateName`,
		`waitingqueuebybarber`.`InitialHour`, 
		`waitingqueuebybarber`.`FinalHour`, 
		`waitingqueuebybarber`.`Service`, 
		`Service`.`Name` ServiceName,
		`waitingqueuebybarber`.`User`, 
		`waitingqueuebybarber`.`EmployeeCode`,
		`user`.`UserFirstName` EmployeeFirstName, 
		`user`.`UserSecondName` EmployeeSecondName, 
		`user`.`UserFirstLastName` EmployeeFirstLastName, 
		`user`.`UserSecondLastName` EmployeeSecondFirstLastName,
		`user`.`UserEmail` EmployeeEmail,  
		`user`.`RoleCode` EmployeeRoleCode
	FROM `waitingqueuebybarber` left join `user` on `waitingqueuebybarber`.`EmployeeCode`  = `user`.`usercode`
			left join `Service` on `waitingqueuebybarber`.`Service` = `Service`.`ServiceCode`
			left join states on `waitingqueuebybarber`.`waitingqueueState` = `states`.`StateCode`
			WHERE `waitingqueuebybarber`.`waitingqueueState` = val_waitingqueueState) as waitingqueuebybarberEmployee 
		left join `user` on `waitingqueuebybarberEmployee`.`User`  = `user`.`usercode`
ORDER BY `waitingqueuebybarberEmployee`.`QueueDate` DESC
;$$



CREATE PROCEDURE `sp_waitingqueuebybarber_update_from_initialized_to_finalize`(
	IN val_QueueCode bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Actualiza el ticket de estado Iniciado a Finalizado y actualiza la hora de inicio del servicio. '
UPDATE `waitingqueuebybarber` 
SET `waitingqueueState`= 3,`FinalHour`=CURRENT_TIME
WHERE `QueueCode`= val_QueueCode
;$$

CREATE PROCEDURE `sp_waitingqueuebybarber_update_from_finalize_proved`(
	IN val_QueueCode bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Actualiza el ticket de estado Iniciado a Finalizado y actualiza la hora de inicio del servicio. '
UPDATE `waitingqueuebybarber` 
SET `waitingqueueState`= 4
WHERE `QueueCode`= val_QueueCode
;$$

CREATE PROCEDURE `sp_waitingqueuebybarber_update_from_waiting_to_initialize`(
	IN val_QueueCode bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Actualiza el ticket de estado En Espera a Iniciado y actualiza la hora de inicio del servicio. '
UPDATE `waitingqueuebybarber` 
SET `waitingqueueState`= 2,`InitialHour`=CURRENT_TIME
WHERE `QueueCode`= val_QueueCode
;$$



CREATE PROCEDURE `sp_waitingqueuebybarber_show_employee_user_where_state_another`(
	IN val_value varchar(50),
	IN val_waitingqueueState bigint(20),
	IN val_EmployeeCode bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Muestra todos los tickets con decripcion de usuario y empleado por estado y por los valores encontrados en el texto ingresado. '
SELECT 
	`waitingqueuebybarberEmployee`.`QueueCode`, 
	`waitingqueuebybarberEmployee`.`QueueDate`, 
	`waitingqueuebybarberEmployee`.`waitingqueueState`, 
	`waitingqueuebybarberEmployee`.`StateName`,
	`waitingqueuebybarberEmployee`.`InitialHour`, 
	`waitingqueuebybarberEmployee`.`FinalHour`, 
	`waitingqueuebybarberEmployee`.`Service`, 
	`waitingqueuebybarberEmployee`.`ServiceName`,
	`waitingqueuebybarberEmployee`.`User`,
	`user`.`UserFirstName` UserFirstName, 
	`user`.`UserSecondName` UserSecondName, 
	`user`.`UserFirstLastName` UserFirstLastName, 
	`user`.`UserSecondLastName` UserSecondFirstLastName,
	`user`.`UserEmail` UserEmail,  
	`user`.`RoleCode` UserRoleCode,
	`waitingqueuebybarberEmployee`.`EmployeeCode`,
	`waitingqueuebybarberEmployee`.EmployeeFirstName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondName, 
	`waitingqueuebybarberEmployee`.EmployeeFirstLastName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondFirstLastName,
	`waitingqueuebybarberEmployee`.EmployeeEmail,  
	`waitingqueuebybarberEmployee`.EmployeeRoleCode
FROM 
	(SELECT 
		`waitingqueuebybarber`.`QueueCode`, 
		`waitingqueuebybarber`.`QueueDate`, 
		`waitingqueuebybarber`.`waitingqueueState`, 
		`states`.`StateName`,
		`waitingqueuebybarber`.`InitialHour`, 
		`waitingqueuebybarber`.`FinalHour`, 
		`waitingqueuebybarber`.`Service`, 
		`Service`.`Name` ServiceName,
		`waitingqueuebybarber`.`User`, 
		`waitingqueuebybarber`.`EmployeeCode`,
		`user`.`UserFirstName` EmployeeFirstName, 
		`user`.`UserSecondName` EmployeeSecondName, 
		`user`.`UserFirstLastName` EmployeeFirstLastName, 
		`user`.`UserSecondLastName` EmployeeSecondFirstLastName,
		`user`.`UserEmail` EmployeeEmail,  
		`user`.`RoleCode` EmployeeRoleCode
	FROM `waitingqueuebybarber` left join `user` on `waitingqueuebybarber`.`EmployeeCode`  = `user`.`usercode`
			left join `Service` on `waitingqueuebybarber`.`Service` = `Service`.`ServiceCode`
			left join states on `waitingqueuebybarber`.`waitingqueueState` = `states`.`StateCode`
			WHERE `waitingqueuebybarber`.`waitingqueueState` = val_waitingqueueState and 
				`waitingqueuebybarber`.`EmployeeCode` = val_EmployeeCode) as waitingqueuebybarberEmployee 
	left join `user` on `waitingqueuebybarberEmployee`.`User`  = `user`.`usercode`
WHERE 
	`waitingqueuebybarberEmployee`.`StateName` like val_value OR 
	`waitingqueuebybarberEmployee`.`ServiceName` like val_value OR 
	`user`.`UserFirstName` like val_value OR 
	`user`.`UserSecondName` like val_value OR 
	`user`.`UserFirstLastName` like val_value OR 
	`user`.`UserSecondLastName` like val_value OR 
	`user`.`UserEmail` like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeFirstName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeSecondName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeFirstLastName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeSecondFirstLastName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeEmail like val_value
ORDER BY `waitingqueuebybarberEmployee`.`QueueDate` DESC
;$$



CREATE PROCEDURE `sp_waitingqueuebybarber_show_employee_user_where_state`(
	IN val_waitingqueueState bigint(20),
	IN val_EmployeeCode bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Muestra todos los tickets con decripcion de usuario y empleado por estado. '
SELECT 
	`waitingqueuebybarberEmployee`.`QueueCode`, 
	`waitingqueuebybarberEmployee`.`QueueDate`, 
	`waitingqueuebybarberEmployee`.`waitingqueueState`, 
	`waitingqueuebybarberEmployee`.`StateName`,
	`waitingqueuebybarberEmployee`.`InitialHour`, 
	`waitingqueuebybarberEmployee`.`FinalHour`, 
	`waitingqueuebybarberEmployee`.`Service`, 
	`waitingqueuebybarberEmployee`.`ServiceName`,
	`waitingqueuebybarberEmployee`.`User`,
	`user`.`UserFirstName` UserFirstName, 
	`user`.`UserSecondName` UserSecondName, 
	`user`.`UserFirstLastName` UserFirstLastName, 
	`user`.`UserSecondLastName` UserSecondFirstLastName,
	`user`.`UserEmail` UserEmail,  
	`user`.`RoleCode` UserRoleCode,
	`waitingqueuebybarberEmployee`.`EmployeeCode`,
	`waitingqueuebybarberEmployee`.EmployeeFirstName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondName, 
	`waitingqueuebybarberEmployee`.EmployeeFirstLastName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondFirstLastName,
	`waitingqueuebybarberEmployee`.EmployeeEmail,  
	`waitingqueuebybarberEmployee`.EmployeeRoleCode
FROM 
	(SELECT 
		`waitingqueuebybarber`.`QueueCode`, 
		`waitingqueuebybarber`.`QueueDate`, 
		`waitingqueuebybarber`.`waitingqueueState`, 
		`states`.`StateName`,
		`waitingqueuebybarber`.`InitialHour`, 
		`waitingqueuebybarber`.`FinalHour`, 
		`waitingqueuebybarber`.`Service`, 
		`Service`.`Name` ServiceName,
		`waitingqueuebybarber`.`User`, 
		`waitingqueuebybarber`.`EmployeeCode`,
		`user`.`UserFirstName` EmployeeFirstName, 
		`user`.`UserSecondName` EmployeeSecondName, 
		`user`.`UserFirstLastName` EmployeeFirstLastName, 
		`user`.`UserSecondLastName` EmployeeSecondFirstLastName,
		`user`.`UserEmail` EmployeeEmail,  
		`user`.`RoleCode` EmployeeRoleCode
	FROM `waitingqueuebybarber` left join `user` on `waitingqueuebybarber`.`EmployeeCode`  = `user`.`usercode`
			left join `Service` on `waitingqueuebybarber`.`Service` = `Service`.`ServiceCode`
			left join states on `waitingqueuebybarber`.`waitingqueueState` = `states`.`StateCode`
			WHERE `waitingqueuebybarber`.`waitingqueueState` = val_waitingqueueState and `waitingqueuebybarber`.`EmployeeCode` = val_EmployeeCode) as waitingqueuebybarberEmployee 
		left join `user` on `waitingqueuebybarberEmployee`.`User`  = `user`.`usercode`
ORDER BY `waitingqueuebybarberEmployee`.`QueueDate` DESC
;$$


CREATE PROCEDURE `sp_user_email_verification`(
	`val_UserEmail` varchar(100)
) 
MODIFIES SQL DATA
COMMENT 'Devuelve un valor mayor a cero en caso exista un email igual. '
BEGIN
SELECT count(1) 
FROM `user` 
WHERE `UserEmail` = `val_UserEmail`
;
END $$


CREATE PROCEDURE `sp_waitingqueuebybarber_update`(
	`val_QueueCode` bigint(20),
	`val_waitingqueueState` bigint(20),
	`val_InitialHour` time,
	`val_FinalHour` time,
	`val_Service` bigint(20),
	`val_EmployeeCode` bigint(20)
) 
MODIFIES SQL DATA
COMMENT 'Actualiza la cola en cualquier estado. '
BEGIN
UPDATE `waitingqueuebybarber` 
SET 
	`waitingqueueState`=`val_waitingqueueState`,
	`InitialHour`=`val_InitialHour`,
	`FinalHour`=`val_FinalHour`,
	`Service`=`val_Service`,
	`EmployeeCode`=`val_EmployeeCode` 
WHERE `QueueCode`=`val_QueueCode`
;
END $$


CREATE PROCEDURE `sp_states_show`() 
MODIFIES SQL DATA
COMMENT 'Presenta los estados de los tickets. '
BEGIN
SELECT `StateCode`, `StateName` FROM `states`;
END $$


CREATE PROCEDURE `sp_employee_get_cellar_from_id`(IN val_EmployeeCode bigint(20)) 
MODIFIES SQL DATA
COMMENT 'Busca la tienda en base al id de empleado. '
BEGIN
	SELECT `CellarCode` FROM `employees` WHERE `UserCode` = val_EmployeeCode;
END $$

CREATE PROCEDURE `sp_waitingqueuebybarber_show_employee_user`(
)
MODIFIES SQL DATA
COMMENT 'Muestra todos los tickets no importando el estado con decripcion de usuario y empleado. '
SELECT 
	`waitingqueuebybarberEmployee`.`QueueCode`, 
	`waitingqueuebybarberEmployee`.`QueueDate`, 
	`waitingqueuebybarberEmployee`.`waitingqueueState`, 
	`waitingqueuebybarberEmployee`.`StateName`,
	`waitingqueuebybarberEmployee`.`InitialHour`, 
	`waitingqueuebybarberEmployee`.`FinalHour`, 
	`waitingqueuebybarberEmployee`.`Service`, 
	`waitingqueuebybarberEmployee`.`ServiceName`,
	`waitingqueuebybarberEmployee`.`User`,
	`user`.`UserFirstName` UserFirstName, 
	`user`.`UserSecondName` UserSecondName, 
	`user`.`UserFirstLastName` UserFirstLastName, 
	`user`.`UserSecondLastName` UserSecondFirstLastName,
	`user`.`UserEmail` UserEmail,  
	`user`.`RoleCode` UserRoleCode,
	`waitingqueuebybarberEmployee`.`EmployeeCode`,
	`waitingqueuebybarberEmployee`.EmployeeFirstName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondName, 
	`waitingqueuebybarberEmployee`.EmployeeFirstLastName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondFirstLastName,
	`waitingqueuebybarberEmployee`.EmployeeEmail,  
	`waitingqueuebybarberEmployee`.EmployeeRoleCode
FROM 
	(SELECT 
		`waitingqueuebybarber`.`QueueCode`, 
		`waitingqueuebybarber`.`QueueDate`, 
		`waitingqueuebybarber`.`waitingqueueState`, 
		`states`.`StateName`,
		`waitingqueuebybarber`.`InitialHour`, 
		`waitingqueuebybarber`.`FinalHour`, 
		`waitingqueuebybarber`.`Service`, 
		`Service`.`Name` ServiceName,
		`waitingqueuebybarber`.`User`, 
		`waitingqueuebybarber`.`EmployeeCode`,
		`user`.`UserFirstName` EmployeeFirstName, 
		`user`.`UserSecondName` EmployeeSecondName, 
		`user`.`UserFirstLastName` EmployeeFirstLastName, 
		`user`.`UserSecondLastName` EmployeeSecondFirstLastName,
		`user`.`UserEmail` EmployeeEmail,  
		`user`.`RoleCode` EmployeeRoleCode
	FROM `waitingqueuebybarber` left join `user` on `waitingqueuebybarber`.`EmployeeCode`  = `user`.`usercode`
			left join `Service` on `waitingqueuebybarber`.`Service` = `Service`.`ServiceCode`
			left join states on `waitingqueuebybarber`.`waitingqueueState` = `states`.`StateCode`) as waitingqueuebybarberEmployee 
		left join `user` on `waitingqueuebybarberEmployee`.`User`  = `user`.`usercode`
ORDER BY `waitingqueuebybarberEmployee`.`QueueDate` DESC
;$$

CREATE PROCEDURE `sp_waitingqueuebybarber_show_employee_user_where`(
	IN val_value varchar(50)
)
MODIFIES SQL DATA
COMMENT 'Muestra todos los tickets que contengan el valor ingresado en campos que sean texto. '
SELECT 
	`waitingqueuebybarberEmployee`.`QueueCode`, 
	`waitingqueuebybarberEmployee`.`QueueDate`, 
	`waitingqueuebybarberEmployee`.`waitingqueueState`, 
	`waitingqueuebybarberEmployee`.`StateName`,
	`waitingqueuebybarberEmployee`.`InitialHour`, 
	`waitingqueuebybarberEmployee`.`FinalHour`, 
	`waitingqueuebybarberEmployee`.`Service`, 
	`waitingqueuebybarberEmployee`.`ServiceName`,
	`waitingqueuebybarberEmployee`.`User`,
	`user`.`UserFirstName` UserFirstName, 
	`user`.`UserSecondName` UserSecondName, 
	`user`.`UserFirstLastName` UserFirstLastName, 
	`user`.`UserSecondLastName` UserSecondFirstLastName,
	`user`.`UserEmail` UserEmail,  
	`user`.`RoleCode` UserRoleCode,
	`waitingqueuebybarberEmployee`.`EmployeeCode`,
	`waitingqueuebybarberEmployee`.EmployeeFirstName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondName, 
	`waitingqueuebybarberEmployee`.EmployeeFirstLastName, 
	`waitingqueuebybarberEmployee`.EmployeeSecondFirstLastName,
	`waitingqueuebybarberEmployee`.EmployeeEmail,  
	`waitingqueuebybarberEmployee`.EmployeeRoleCode
FROM 
	(SELECT 
		`waitingqueuebybarber`.`QueueCode`, 
		`waitingqueuebybarber`.`QueueDate`, 
		`waitingqueuebybarber`.`waitingqueueState`, 
		`states`.`StateName`,
		`waitingqueuebybarber`.`InitialHour`, 
		`waitingqueuebybarber`.`FinalHour`, 
		`waitingqueuebybarber`.`Service`, 
		`Service`.`Name` ServiceName,
		`waitingqueuebybarber`.`User`, 
		`waitingqueuebybarber`.`EmployeeCode`,
		`user`.`UserFirstName` EmployeeFirstName, 
		`user`.`UserSecondName` EmployeeSecondName, 
		`user`.`UserFirstLastName` EmployeeFirstLastName, 
		`user`.`UserSecondLastName` EmployeeSecondFirstLastName,
		`user`.`UserEmail` EmployeeEmail,  
		`user`.`RoleCode` EmployeeRoleCode
	FROM `waitingqueuebybarber` left join `user` on `waitingqueuebybarber`.`EmployeeCode`  = `user`.`usercode`
			left join `Service` on `waitingqueuebybarber`.`Service` = `Service`.`ServiceCode`
			left join states on `waitingqueuebybarber`.`waitingqueueState` = `states`.`StateCode`) as waitingqueuebybarberEmployee 
		left join `user` on `waitingqueuebybarberEmployee`.`User`  = `user`.`usercode`
WHERE 
	`waitingqueuebybarberEmployee`.`StateName` like val_value OR 
	`waitingqueuebybarberEmployee`.`ServiceName` like val_value OR 
	`user`.`UserFirstName` like val_value OR 
	`user`.`UserSecondName` like val_value OR 
	`user`.`UserFirstLastName` like val_value OR 
	`user`.`UserSecondLastName` like val_value OR 
	`user`.`UserEmail` like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeFirstName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeSecondName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeFirstLastName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeSecondFirstLastName like val_value OR 
	`waitingqueuebybarberEmployee`.EmployeeEmail like val_value
ORDER BY `waitingqueuebybarberEmployee`.`QueueDate` DESC
;$$


CREATE PROCEDURE `sp_ServiceTimeByBarber_show`()
MODIFIES SQL DATA
COMMENT 'Muestra todos los tiempos de los barberos por de servicio. '
SELECT 
	`servicetimebybarber`.`ServiceTimeBarberCode`, 
	`servicetimebybarber`.`MinTime`, 
	`servicetimebybarber`.`MaxTime`, 
	`servicetimebybarber`.`BesTime`, 
	`servicetimebybarber`.`AverageTime`, 
	`servicetimebybarber`.`ServicetimebarberEstate`, 
	`servicetimebybarber`.`ServiceCode`, 
	`service`.`Name`,
	`servicetimebybarber`.`EmployeeCode`,
	`user`.`UserFirstName`,
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`
FROM `servicetimebybarber` left join `user` on `servicetimebybarber`.`EmployeeCode` = `user`.`UserCode`
	left join `service` on `servicetimebybarber`.`ServiceCode` = `service`.`ServiceCode`
ORDER BY `user`.`UserFirstName`, `user`.`UserFirstLastName`, `servicetimebybarber`.`ServiceCode` ASC
;$$

CREATE PROCEDURE `sp_ServiceTimeByBarber_show_where`(
	IN `val_value` varchar(50)
)
MODIFIES SQL DATA
COMMENT 'Muestra todos los tiempos de los barberos por de servicio que contengan el valor ingresado en campos que sean texto. '
SELECT 
	`servicetimebybarber`.`ServiceTimeBarberCode`, 
	`servicetimebybarber`.`MinTime`, 
	`servicetimebybarber`.`MaxTime`, 
	`servicetimebybarber`.`BesTime`, 
	`servicetimebybarber`.`AverageTime`, 
	`servicetimebybarber`.`ServicetimebarberEstate`, 
	`servicetimebybarber`.`ServiceCode`, 
	`service`.`Name`,
	`servicetimebybarber`.`EmployeeCode`,
	`user`.`UserFirstName`,
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`
FROM `servicetimebybarber` left join `user` on `servicetimebybarber`.`EmployeeCode` = `user`.`UserCode`
	left join `service` on `servicetimebybarber`.`ServiceCode` = `service`.`ServiceCode`
WHERE `service`.`Name` LIKE `val_value` OR 
	`user`.`UserFirstName` LIKE `val_value` OR 
	`user`.`UserSecondName` LIKE `val_value` OR 
	`user`.`UserFirstLastName` LIKE `val_value` OR 
	`user`.`UserSecondLastName` LIKE `val_value` 
ORDER BY `user`.`UserFirstName`, `user`.`UserFirstLastName`, `servicetimebybarber`.`ServiceCode` ASC
;$$

CREATE PROCEDURE `sp_waitingqueuebybarber_get_my_ticket`(
	IN `val_useridcode` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Devuelve los datos, si existen, para el usuario que solicito un ticket. '
SELECT 
	`QueueCode`, 
	`QueueDate`, 
	`waitingqueueState`,
	`InitialHour`, 
	`FinalHour`, 
	`Service`, 
	`User`, 
	`EmployeeCode`, 
	HOUR(InitialHour) IniHour, 
	MINUTE(InitialHour) IniMin, 
	SECOND(InitialHour) IniSec 
FROM `waitingqueuebybarber` 
WHERE `User` = val_useridcode AND waitingqueueState = 1 AND InitialHour > CURRENT_TIMESTAMP AND date(`QueueDate`) = CURRENT_DATE
;$$

CREATE PROCEDURE `sp_waitingqueuebybarber_my_actual_tickets`(
	IN `val_useridcode` bigint(20)
)
MODIFIES SQL DATA
COMMENT 'Devuelve cuantos ticket activos hay para un usuario. '
SELECT 
	count(1) 
FROM `waitingqueuebybarber` 
WHERE `User` = val_useridcode AND waitingqueueState = 1 AND InitialHour > CURRENT_TIMESTAMP AND date(`QueueDate`) = CURRENT_DATE
;$$





CREATE PROCEDURE `sp_testColas_insert`(IN val_Service bigint(20),val_User bigint(20),val_EmployeeCode bigint(20)) 
MODIFIES SQL DATA
COMMENT 'Agrega_ticket'
BEGIN
SET @msg = (select '');
SET @iniciaAlmuerzoEmpleado = (SELECT `InicialLunchTime` FROM `employees` WHERE `UserCode` = val_EmployeeCode);
SET @finalizaAlmuerzoEmpleado = (SELECT `FinalLunchTime` FROM `employees` WHERE `UserCode` = val_EmployeeCode);
SET @tienda = (SELECT `CellarCode` FROM `employees` WHERE `UserCode` = val_EmployeeCode);
SET @HoraAbreTienda = (SELECT `timeOpen` FROM `cellar` WHERE `CellarCode` = @tienda);
SET @HoraCierraTienda = (SELECT `timeClose` FROM `cellar` WHERE `CellarCode` = @tienda);
SET @pendientesHoy = (SELECT count(queuecode) FROM `waitingqueuebybarber` WHERE `FinalHour` > CURRENT_TIME AND waitingqueuestate < 3 AND waitingqueuebybarber.EmployeeCode = val_EmployeeCode);
SET @existeServicio = (select 
							count(1) 
						FROM servicetimebybarber ST 
						WHERE ST.ServiceCode = val_Service AND ST.employeecode = val_EmployeeCode);
IF @existeServicio < 1 THEN
	call sp_ServiceTimeByBarber_Insert('01:00:00', '01:00:00', '01:00:00', val_Service, val_EmployeeCode);
END IF;
SET @tiempoServicio = (select 
							AverageTime 
						FROM servicetimebybarber ST INNER JOIN Service S ON ST.ServiceCode = S.ServiceCode 
							INNER JOIN Employees E ON ST.EmployeeCode = E.UserCode 
						WHERE ST.ServiceCode = val_Service AND ST.employeecode = val_EmployeeCode);
IF @pendientesHoy >= 1 THEN
	SET @HoraInicio = (SELECT max(FinalHour) FROM `waitingqueuebybarber` WHERE `FinalHour` > CURRENT_TIME AND waitingqueuebybarber.EmployeeCode = val_EmployeeCode);
	SET @HoraFin = (select ADDTIME(@HoraInicio,@tiempoServicio));
ELSE
	SET @HoraInicio = (SELECT ADDTIME(CURRENT_TIME,'00:15:00'));
	SET @HoraFin = (select ADDTIME(@HoraInicio,@tiempoServicio));
END IF;

IF @HoraInicio > @iniciaAlmuerzoEmpleado AND @HoraInicio < @finalizaAlmuerzoEmpleado OR @HoraFin > @iniciaAlmuerzoEmpleado AND @HoraFin < @finalizaAlmuerzoEmpleado THEN
	SET @HoraInicio = @finalizaAlmuerzoEmpleado;
	SET @HoraFin = (select ADDTIME(@HoraInicio,@tiempoServicio));
END IF;

IF @HoraInicio < @HoraAbreTienda THEN
	SET @HoraInicio = @HoraAbreTienda;
	SET @HoraFin = (select ADDTIME(@HoraInicio,@tiempoServicio));
END IF;

IF @HoraInicio >= @HoraAbreTienda AND @HoraInicio < @HoraCierraTienda AND @HoraFin > @HoraAbreTienda AND @HoraFin <= @HoraCierraTienda THEN
	insert into waitingqueuebybarber(
		QueueDate,
		waitingqueuestate,
		InitialHour,
		FinalHour,Service,
		User,
		Employeecode
	) values (
		CURRENT_TIMESTAMP, 
		1,
		@HoraInicio,
		@HoraFin,
		val_Service,
		val_User,
		val_EmployeeCode
	);
	SET @msg = (select 'Ticket ingresado exitosamente. ');
ELSE
	SET @msg = (select 'El ticket no se pudo ingresar. El barbero seleccionado no le podra atender el dia de hoy. Pruebe seleccionar a otro barbero.');
END IF;

select @msg;
END $$







CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AverageTimeByBarber`(
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
WHERE `ServiceTimeBarberCode` = `val_ServiceTimeBarberCode`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AverageTimeByBarber_Update`(
	IN `val_MinTime` Time,
	IN `val_MaxTime` Time,
	IN `val_BesTime` Time,
	IN `val_ServiceTimeBarberCode` bigint(20),
	IN `val_ServicetimebarberEstate` tinyint(1)
)
UPDATE `servicetimebybarber`
	SET `MinTime` = `val_MinTime`,
	 `MaxTime` = `val_MaxTime`,
	 `BesTime` = `val_BesTime`,
    `AverageTime`= (`val_MinTime` + `val_MaxTime` + (4*`val_BesTime`)) / 6 ,
	`ServicetimebarberEstate` = `val_ServicetimebarberEstate`
WHERE `ServiceTimeBarberCode` = `val_ServiceTimeBarberCode`$$

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
)$$

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
WHERE `brandCode` = `val_Code`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_brand_show`()
    MODIFIES SQL DATA
    COMMENT 'Busca un usuario por el email'
SELECT 
	`brandCode`, 
	`brandName`, 
	`Description`,
	`BrandState`
FROM `brand`$$

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
	`val_Shopping`)$$

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
WHERE `cellarCode`=`val_Code`$$

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
FROM `cellar`$$

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
WHERE `CellarCode` = val_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_employees_add`(
	IN `val_UserCode` bigint(20),
	IN `val_InicialLunchTime` time,
	IN `val_FinalLunchTime` time,
	IN `val_InitialDate` date,
	IN `val_CellarCode` bigint(20) 
)
    MODIFIES SQL DATA
    COMMENT 'Agrega un Empleado'
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
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_employees_edit`(
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
WHERE `UserCode`=val_UserCode$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_employees_show`()
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
FROM `employees`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_employee_get_info_from_user_by_id`(
)
SELECT 
	`employees`.`UserCode`, 
	`employees`.`CellarCode`, 
	`user`.`UserEmail`, 
	`user`.`UserFirstName`, 
	`user`.`UserSecondName`, 
	`user`.`UserFirstLastName`, 
	`user`.`UserSecondLastName`
FROM `employees` left join `user` on `employees`.`UserCode` = `user`.`UserCode`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_employee_get_info_from_user_by_id_where`(
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
WHERE `employees`.`UserCode` = val_id$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Payments`(
    IN val_employeecode bigint(20),
    IN val_transactionCode bigint(20)
)
    MODIFIES SQL DATA
    COMMENT 'Calcula el pago a empleados por medio de porcentajes en base al tiempo laborado y al servicio prestado'
BEGIN
    SET @val_date = (SELECT InitialDate FROM employees WHERE UserCode = val_employeecode);
    SET @Totalanos = (SELECT YEAR(CURRENT_DATE) - YEAR(@val_date));
    
    IF @Totalanos > 0 AND @Totalanos <= 1 THEN
        SET @Porcentaje = 0.37;
    ELSEIF @Totalanos > 1 AND @Totalanos <= 2 THEN
        SET @Porcentaje = 0.38;
    ELSEIF @Totalanos > 2 AND @Totalanos <= 3 THEN
        SET @Porcentaje = 0.39;
    ELSEIF @Totalanos > 3 THEN
        SET @Porcentaje = 0.4;
    END IF;
    
SET @val_pago = (SELECT SUM(service.ServicePrice * TD.Units * @porcentaje) FROM Service INNER JOIN TransactionDetail TD 
                 ON Service.ServiceCode = TD.ServiceCode
                  INNER JOIN TransactionHeader TH 
                  ON TD.TransactionCode = TH.TransactionCode
                  INNER JOIN Employees E ON TH.EmployeeCode = E.UserCode
                  WHERE TH.EmployeeCode = E.UserCode AND Service.ServiceCode = TD.ServiceCode AND TD.TransactionCode = val_transactionCode
                  GROUP BY TD.TransactionCode);
INSERT INTO Payments (Date,NotPay,EmployeeCode,Transaction)
Values (CURRENT_TIMESTAMP,@val_pago,val_EmployeeCode,val_TransactionCode);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permission_add_by_rol`(IN `val_RoleName` VARCHAR(50))
    MODIFIES SQL DATA
    COMMENT 'Agrega_permisos_por_rol'
BEGIN
SET @RoleNum = (SELECT `RoleCode` FROM `role` WHERE `RoleName` = `val_RoleName`);
INSERT INTO `permissionbyrole`(`RoleCode`, `WebPageCode`, `Permission`) SELECT @RoleNum, `webpage`.`WebPageCode`, 0 FROM `webpage`;
END$$

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
ORDER BY permissionbyrole.RoleCode, permissionbyrole.WebPageCode ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permission_get_all_by_role`(IN val_RoleCode int(11))
    MODIFIES SQL DATA
    COMMENT 'Obtiene un permiso'
SELECT 
	permissionbyrole.WebPageCode
FROM 
	permissionbyrole INNER JOIN role ON permissionbyrole.RoleCode = role.RoleCode
	 INNER JOIN webpage ON permissionbyrole.WebPageCode = webpage.WebPageCode
WHERE permissionbyrole.RoleCode = val_RoleCode AND permissionbyrole.Permission = 1 AND webpage.WebState = 1 AND role.RoleState = 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permission_insert`(
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
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_permission_update`(
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
	`WebPageCode`=`val_WebPageCode`$$

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
)$$

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
WHERE `ProductPresentationCode`=`val_ProductPresentationCode`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_productpresentation_show`()
    MODIFIES SQL DATA
    COMMENT 'Muestra las presentaciones de producto'
SELECT 
	`ProductPresentationCode`, 
	`Presentation`, 
	`Description`, 
	`Units` 
FROM `productpresentation`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ProducType_add`(
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
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ProducType_edit`(
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
	`ProducTypeCode`=`val_ProducTypeCode`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_ProducType_show`()
    MODIFIES SQL DATA
    COMMENT 'Busca un tipo producto por el codigo de tipo producto'
SELECT `ProducTypeCode`, 
	`ProducTypeName`,
	 `Description`
FROM `ProducType`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Product_add`(
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
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_Product_edit`(
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
WHERE `ProductCode`= `val_ProductCode`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_product_show`()
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
FROM `product`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_product_show_where`(IN `val_value` VARCHAR(50))
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
WHERE `product`.`ProductName` LIKE `val_value` or `product`.`Description` LIKE `val_value`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_provider_add`(
	IN `val_ProviderName` VARCHAR(50),
	IN `val_ProviderEstate` TINYINT(1)
)
INSERT INTO `ProductProvider`(
	`ProviderName`,
	`ProviderEstate`
)
VALUES(
	`val_ProviderName`,
	`val_ProviderEstate`
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_provider_eddit`(
	IN `val_ProviderCode` bigint(20),
	IN `val_ProviderName` VARCHAR(50),
	IN `val_ProviderEstate` TINYINT(1)
)
UPDATE `ProductProvider`
	SET `ProviderName` = `val_ProviderName`,
	    `ProviderEstate` = `val_ProviderEstate`
WHERE `ProviderCode` = `val_ProviderCode`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_provider_show`()
SELECT `ProviderCode`,
	   `ProviderName`,
	   `ProviderEstate`
FROM `ProductProvider`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_role_show`()
    MODIFIES SQL DATA
    COMMENT 'Busca un usuario por el email'
SELECT `RoleCode`, 
	`RoleName`, 
	`RoleDescription`, 
	`RoleState` 
FROM `role`$$

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
END$$

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
WHERE `RoleCode`= `val_RoleCode`$$

CREATE PROCEDURE `sp_ServiceTimeByBarber_Insert`(
	IN `val_MinTime` TIME,
	IN `val_MaxTime` TIME,
	IN `val_BesTime` TIME,
	IN `val_ServiceCode` bigint(20),
	IN `val_EmployeeCode` bigint(20)
)
INSERT INTO `servicetimebybarber`(
	`MinTime`,`MaxTime`,`BesTime`,`AverageTime`,`ServiceCode`,`EmployeeCode`, ServicetimebarberEstate
)
VALUES(
	`val_MinTime`,`val_MaxTime`,`val_BesTime`,(`val_MinTime` + `val_MaxTime` + (4*`val_BesTime`)) / 6,`val_ServiceCode`,`val_EmployeeCode`, 1
);$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_service_add`(
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
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_service_edit`(
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
WHERE `ServiceCode`= val_ServiceCode$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_service_show`()
    MODIFIES SQL DATA
    COMMENT 'Devuelve los servicios'
SELECT 
	`ServiceCode`, 
	`Name`, 
	`ServicePrice`, 
	`ServiceState` 
FROM `service`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_service_show_where`(IN val_Name varchar(50))
    MODIFIES SQL DATA
    COMMENT 'Devuelve los servicios'
SELECT 
	`ServiceCode`, 
	`Name`, 
	`ServicePrice`, 
	`ServiceState` 
FROM `service`
WHERE Name LIKE val_Name$$

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
    MODIFIES SQL DATA
    COMMENT 'Agrega un usuario'
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
)$$

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
    MODIFIES SQL DATA
    COMMENT 'Agrega un usuario'
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
WHERE `UserCode` =`val_UserCode`$$

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
ORDER BY `UserEmail` ASC$$

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
ORDER BY `UserEmail` ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_get_id_where_email`(IN `val_value` VARCHAR(100))
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
	`UserEmail` = `val_value`
ORDER BY `UserEmail` ASC$$

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
	`Password` = `val_password`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_show_all`()
    MODIFIES SQL DATA
    COMMENT 'Muestra todos los usuarios'
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
FROM `user`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_waitingqueuebybarber_show`()
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
FROM `waitingqueuebybarber` left join user on waitingqueuebybarber.EmployeeCode = user.UserCode$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_webpage_get_all`()
    MODIFIES SQL DATA
    COMMENT 'Devuelve todas las paginas'
SELECT 
	`WebPageCode`, 
	`WebPageName`, 
	`UrlWebPage`, 
	`WebPageDescription`,
	`WebState` 
FROM `webpage`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_webpage_insert`(
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
)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_webpage_update`(
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
WHERE `WebPageCode` = `val_WebPageCode`$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `BrandCode` bigint(20) NOT NULL,
  `BrandName` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Description` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `BrandState` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`BrandCode`, `BrandName`, `Description`, `BrandState`) VALUES
(1, 'Gallo', 'Cerveza Nacional', 1);

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
  `CellarState` bigint(20) NOT NULL,
  `timeOpen` time NULL,
  `timeClose` time NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cellar`
--

INSERT INTO `cellar` (`CellarCode`, `CellarName`, `Description`, `Length`, `Latitude`, `Shopping`, `CellarState`,`timeOpen`, `timeClose`) VALUES
(1, 'Barber', 'Tienda principal', '3x2', '10', 0, 0, '10:00:00', '20:00:00');

-- --------------------------------------------------------

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
-- Estructura de tabla para la tabla `permissionbyrole`
--

CREATE TABLE IF NOT EXISTS `permissionbyrole` (
  `RoleCode` int(11) NOT NULL,
  `WebPageCode` int(11) NOT NULL,
  `permission` tinyint(4) NOT NULL
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
  `BrandProduct` bigint(20) NOT NULL,
  `ProductProvider` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productincome`
--

CREATE TABLE IF NOT EXISTS `productincome` (
  `CellarCode` bigint(20) NOT NULL,
  `Units` int(11) NOT NULL,
  `AdmissionDate` date NOT NULL,
  `ProductInComeState` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `productprovider`
--

CREATE TABLE IF NOT EXISTS `productprovider` (
  `ProviderCode` bigint(20) NOT NULL,
  `ProviderName` varchar(50) NOT NULL,
  `ProviderEstate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`RoleCode`, `RoleName`, `RoleDescription`, `RoleState`) VALUES
(1, 'Administrador', 'Administrador del sistema', 1),
(2, 'Cliente', 'Cliente de la barberia', 1),
(3, 'Barbero', 'Barbero', 1);

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
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `StateCode` bigint(20) NOT NULL,
  `StateName` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockbycellar`
--

CREATE TABLE IF NOT EXISTS `stockbycellar` (
  `CellarCode` bigint(20) NOT NULL,
  `ProductCode` bigint(20) NOT NULL,
  `UnitsInStock` int(11) NOT NULL,
  `StockEstate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

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
-- Estructura de tabla para la tabla `transactionheader`
--

CREATE TABLE IF NOT EXISTS `transactionheader` (
  `TransactionCode` bigint(20) NOT NULL,
  `TransactionDate` datetime NOT NULL,
  `UserCode` bigint(20) NOT NULL,
  `EmployeeCode` bigint(20) NOT NULL,
  `TransactionTicket` bigint(20),
  `TransactionState` bigint(20),
  `CellarCode` bigint(20),
  `Efectivo` decimal(10,2),
  `Tarjeta` decimal(10,2),
  `Total` decimal(10,2)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`UserCode`, `UserFirstName`, `UserSecondName`, `UserFirstLastName`, `UserSecondLastName`, `UserBornDate`, `Phone`, `UserEmail`, `CreationDate`, `Password`, `UserState`, `RoleCode`) VALUES
(1, 'Administrador', 'Administrador', 'Administrador', 'Administrador', '0000-00-00', '12345678', 'admin@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 1),
(2, 'Barbero', 'Barbero', 'Barbero', 'Barbero', '0000-00-00', '12345678', 'barb@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 3),
(3, 'Edwin', '', 'Salazar', 'masaya', '0000-00-00', '12345678', 'esalazarmasaya@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 2),
(4, 'Enrique', 'José', 'Merck', 'Cifuentes', '0000-00-00', '12345678', 'enriquemerck@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 2),
(5, 'Alejandro', 'José', 'Echeverría', 'Valls', '0000-00-00', '12345678', 'ajeche@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 2),
(6, 'Melvin', 'Daniel', 'Garcia', 'Garcia', '0000-00-00', '12345678', 'melvingar@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 2),
(7, 'Pablo', 'Francisco', 'Callejas', 'Cifuentes', '0000-00-00', '12345678', 'pabcc@galileo.edu', '2016-04-27', '202cb962ac59075b964b07152d234b70', 1, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `webpage`
--

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
(31, 'Transacciones por comprobar (pagados)', '', 'Transacciones por comprobar (pagados).', 1)
;

--
-- Índices para tablas volcadas
--

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
  ADD KEY `FK_product_productpresentation` (`Presentation`),
  ADD KEY `fk_product_productprovider` (`ProductProvider`);

--
-- Indices de la tabla `productincome`
--
ALTER TABLE `productincome`
  ADD PRIMARY KEY (`CellarCode`);

--
-- Indices de la tabla `productpresentation`
--
ALTER TABLE `productpresentation`
  ADD PRIMARY KEY (`ProductPresentationCode`);

--
-- Indices de la tabla `productprovider`
--
ALTER TABLE `productprovider`
  ADD PRIMARY KEY (`ProviderCode`);

--
-- Indices de la tabla `productype`
--
ALTER TABLE `productype`
  ADD PRIMARY KEY (`ProducTypeCode`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleCode`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ServiceCode`);

--
-- Indices de la tabla `servicetimebybarber`
--
ALTER TABLE `servicetimebybarber`
  ADD PRIMARY KEY (`ServiceTimeBarberCode`),
  ADD KEY `fk_combotimebybarber_combo` (`ServiceCode`),
  ADD KEY `fk_combotimebybarber_EmployeesUser` (`EmployeeCode`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`StateCode`);

--
-- Indices de la tabla `stockbycellar`
--
ALTER TABLE `stockbycellar`
  ADD PRIMARY KEY (`CellarCode`,`ProductCode`),
  ADD KEY `fk_stockbycellar_product` (`ProductCode`);

--
-- Indices de la tabla `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD PRIMARY KEY (`TransactionCode`,`ProductCode`,`ServiceCode`),
  ADD KEY `fk_transactiondetail_product` (`ProductCode`),
  ADD KEY `fk_transactiondetail_service` (`ServiceCode`);

--
-- Indices de la tabla `transactionheader`
--
ALTER TABLE `transactionheader`
  ADD PRIMARY KEY (`TransactionCode`),
  ADD KEY `fk_transactionheader_employees` (`EmployeeCode`),
  ADD KEY `fk_transactionheader_state` (`TransactionState`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserCode`),
  ADD KEY `RoleCode` (`RoleCode`);

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
-- Indices de la tabla `webpage`
--
ALTER TABLE `webpage`
  ADD PRIMARY KEY (`WebPageCode`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brand`
--
ALTER TABLE `brand`
  MODIFY `BrandCode` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cellar`
--
ALTER TABLE `cellar`
  MODIFY `CellarCode` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentCode` bigint(20) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `productprovider`
--
ALTER TABLE `productprovider`
  MODIFY `ProviderCode` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productype`
--
ALTER TABLE `productype`
  MODIFY `ProducTypeCode` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `RoleCode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `ServiceCode` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicetimebybarber`
--
ALTER TABLE `servicetimebybarber`
  MODIFY `ServiceTimeBarberCode` bigint(20) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `UserCode` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `waitingqueuebybarber`
--
ALTER TABLE `waitingqueuebybarber`
  MODIFY `QueueCode` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `webpage`
--
ALTER TABLE `webpage`
  MODIFY `WebPageCode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Restricciones para tablas volcadas
--

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
-- Filtros para la tabla `permissionbyrole`
--
ALTER TABLE `permissionbyrole`
  ADD CONSTRAINT `fk_permissionbyrole_WebPageCode` FOREIGN KEY (`WebPageCode`) REFERENCES `webpage` (`WebPageCode`),
  ADD CONSTRAINT `fk_permissionbyrole_role` FOREIGN KEY (`RoleCode`) REFERENCES `role` (`RoleCode`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_brand` FOREIGN KEY (`BrandProduct`) REFERENCES `brand` (`BrandCode`),
  ADD CONSTRAINT `FK_product_producType` FOREIGN KEY (`ProducType`) REFERENCES `productype` (`ProducTypeCode`),
  ADD CONSTRAINT `FK_product_productpresentation` FOREIGN KEY (`Presentation`) REFERENCES `productpresentation` (`ProductPresentationCode`),
  ADD CONSTRAINT `fk_product_productprovider` FOREIGN KEY (`ProductProvider`) REFERENCES `productprovider` (`ProviderCode`);

--
-- Filtros para la tabla `productincome`
--
ALTER TABLE `productincome`
  ADD CONSTRAINT `fk_productincome_cellar` FOREIGN KEY (`CellarCode`) REFERENCES `cellar` (`CellarCode`);

--
-- Filtros para la tabla `servicetimebybarber`
--
ALTER TABLE `servicetimebybarber`
  ADD CONSTRAINT `fk_combotimebybarber_EmployeesUser` FOREIGN KEY (`EmployeeCode`) REFERENCES `employees` (`UserCode`),
  ADD CONSTRAINT `fk_combotimebybarber_combo` FOREIGN KEY (`ServiceCode`) REFERENCES `service` (`ServiceCode`);

--
-- Filtros para la tabla `stockbycellar`
--
ALTER TABLE `stockbycellar`
  ADD CONSTRAINT `fk_stockbycellar_cellar` FOREIGN KEY (`CellarCode`) REFERENCES `cellar` (`CellarCode`),
  ADD CONSTRAINT `fk_stockbycellar_product` FOREIGN KEY (`ProductCode`) REFERENCES `product` (`ProductCode`);

--
-- Filtros para la tabla `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD CONSTRAINT `fk_transactiondetail_product` FOREIGN KEY (`ProductCode`) REFERENCES `product` (`ProductCode`),
  ADD CONSTRAINT `fk_transactiondetail_service` FOREIGN KEY (`ServiceCode`) REFERENCES `service` (`ServiceCode`),
  ADD CONSTRAINT `fk_transactiondetail_transactionheader` FOREIGN KEY (`TransactionCode`) REFERENCES `transactionheader` (`TransactionCode`);

--
-- Filtros para la tabla `transactionheader`
--
ALTER TABLE `transactionheader`
  ADD CONSTRAINT `fk_transactionheader_employees` FOREIGN KEY (`EmployeeCode`) REFERENCES `employees` (`UserCode`),
  ADD CONSTRAINT `fk_transactionheader_state` FOREIGN KEY (`TransactionState`) REFERENCES `states` (`StateCode`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleCode`) REFERENCES `role` (`RoleCode`);

--
-- Filtros para la tabla `waitingqueuebybarber`
--
ALTER TABLE `waitingqueuebybarber`
  ADD CONSTRAINT `fk_waitinglinebybarber_combo` FOREIGN KEY (`Service`) REFERENCES `service` (`ServiceCode`),
  ADD CONSTRAINT `fk_waitingqueuebybarber_employee` FOREIGN KEY (`EmployeeCode`) REFERENCES `employees` (`UserCode`),
  ADD CONSTRAINT `fk_waitingqueuebybarber_states` FOREIGN KEY (`waitingqueueState`) REFERENCES `states` (`StateCode`),
  ADD CONSTRAINT `fk_waitingqueuebybarber_user` FOREIGN KEY (`User`) REFERENCES `user` (`UserCode`);
 
INSERT INTO `states`(`StateName`) VALUES ('En Espera');
INSERT INTO `states`(`StateName`) VALUES ('Iniciado');
INSERT INTO `states`(`StateName`) VALUES ('Finalizado');
INSERT INTO `states`(`StateName`) VALUES ('Cobrado');
INSERT INTO `states`(`StateName`) VALUES ('Eliminado');

call `sp_permission_add_by_rol`('Administrador');
call `sp_permission_add_by_rol`('Cliente');
call `sp_permission_add_by_rol`('Barbero');


call `sp_employees_add`(2,'13:00:00','14:00:00','2015-01-31',1); 

call `sp_service_add`('Corte de pelo',15);
call `sp_service_add`('Corte de barba',10); 
call `sp_service_add`('Corte de pelo y barba',20); 

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
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 1 AND `WebPageCode` = 25;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 26;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 27;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 28;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 29;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 30;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 1 AND `WebPageCode` = 31;

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
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 25;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 26;
UPDATE `permissionbyrole` SET `permission`= 0 WHERE `RoleCode`= 3 AND `WebPageCode` = 27;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 28;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 29;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 30;
UPDATE `permissionbyrole` SET `permission`= 1 WHERE `RoleCode`= 3 AND `WebPageCode` = 31;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
