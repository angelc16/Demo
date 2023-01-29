/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100500
 Source Host           : localhost:3307
 Source Schema         : demo

 Target Server Type    : MySQL
 Target Server Version : 100500
 File Encoding         : 65001

 Date: 29/01/2023 13:33:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bank
-- ----------------------------
INSERT INTO `bank` VALUES (1, 'Banco de Crédito del Perú');
INSERT INTO `bank` VALUES (2, 'Banco Pichincha');
INSERT INTO `bank` VALUES (3, 'BBVA');
INSERT INTO `bank` VALUES (4, 'Interbank');
INSERT INTO `bank` VALUES (5, 'MiBanco');
INSERT INTO `bank` VALUES (6, 'Scotiabank Perú');
INSERT INTO `bank` VALUES (7, 'Banco GNB Perú');
INSERT INTO `bank` VALUES (8, 'Banco Falabella');
INSERT INTO `bank` VALUES (9, 'Banco Ripley');
INSERT INTO `bank` VALUES (10, 'Banco Santander Perú');
INSERT INTO `bank` VALUES (11, 'Banco Interamericano de Finanzas (BanBif)');

-- ----------------------------
-- Table structure for channel
-- ----------------------------
DROP TABLE IF EXISTS `channel`;
CREATE TABLE `channel`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of channel
-- ----------------------------
INSERT INTO `channel` VALUES (1, 'Whatsapp');
INSERT INTO `channel` VALUES (2, 'Telegram');

-- ----------------------------
-- Table structure for client
-- ----------------------------
DROP TABLE IF EXISTS `client`;
CREATE TABLE `client`  (
  `Id` bigint NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DocumentNumber` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1000057 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of client
-- ----------------------------
INSERT INTO `client` VALUES (1000000, 'Tiger Nixon', '10008801', 'Tiger@test.com');
INSERT INTO `client` VALUES (1000001, 'Garrett Winters', '10008802', 'Garrett@test.com');
INSERT INTO `client` VALUES (1000002, 'Ashton Cox', '10008803', 'Ashton@test.com');
INSERT INTO `client` VALUES (1000003, 'Cedric Kelly', '10008804', 'Cedric@test.com');
INSERT INTO `client` VALUES (1000004, 'Airi Satou', '10008805', 'Airi@test.com');
INSERT INTO `client` VALUES (1000005, 'Brielle Williamson', '10008806', 'Brielle@test.com');
INSERT INTO `client` VALUES (1000006, 'Herrod Chandler', '10008807', 'Herrod@test.com');
INSERT INTO `client` VALUES (1000007, 'Rhona Davidson', '10008808', 'Rhona@test.com');
INSERT INTO `client` VALUES (1000008, 'Colleen Hurst', '10008809', 'Colleen@test.com');
INSERT INTO `client` VALUES (1000009, 'Sonya Frost', '10008810', 'Sonya@test.com');
INSERT INTO `client` VALUES (1000010, 'Jena Gaines', '10008811', 'Jena@test.com');
INSERT INTO `client` VALUES (1000011, 'Quinn Flynn', '10008812', 'Quinn@test.com');
INSERT INTO `client` VALUES (1000012, 'Charde Marshall', '10008813', 'Charde@test.com');
INSERT INTO `client` VALUES (1000013, 'Haley Kennedy', '10008814', 'Haley@test.com');
INSERT INTO `client` VALUES (1000014, 'Tatyana Fitzpatrick', '10008815', 'Tatyana@test.com');
INSERT INTO `client` VALUES (1000015, 'Michael Silva', '10008816', 'Michael@test.com');
INSERT INTO `client` VALUES (1000016, 'Paul Byrd', '10008817', 'Paul@test.com');
INSERT INTO `client` VALUES (1000017, 'Gloria Little', '10008818', 'Gloria@test.com');
INSERT INTO `client` VALUES (1000018, 'Bradley Greer', '10008819', 'Bradley@test.com');
INSERT INTO `client` VALUES (1000019, 'Dai Rios', '10008820', 'Dai@test.com');
INSERT INTO `client` VALUES (1000020, 'Jenette Caldwell', '10008821', 'Jenette@test.com');
INSERT INTO `client` VALUES (1000021, 'Yuri Berry', '10008822', 'Yuri@test.com');
INSERT INTO `client` VALUES (1000022, 'Caesar Vance', '10008823', 'Caesar@test.com');
INSERT INTO `client` VALUES (1000023, 'Doris Wilder', '10008824', 'Doris@test.com');
INSERT INTO `client` VALUES (1000024, 'Angelica Ramos', '10008825', 'Angelica@test.com');
INSERT INTO `client` VALUES (1000025, 'Gavin Joyce', '10008826', 'Gavin@test.com');
INSERT INTO `client` VALUES (1000026, 'Jennifer Chang', '10008827', 'Jennifer@test.com');
INSERT INTO `client` VALUES (1000027, 'Brenden Wagner', '10008828', 'Brenden@test.com');
INSERT INTO `client` VALUES (1000028, 'Fiona Green', '10008829', 'Fiona@test.com');
INSERT INTO `client` VALUES (1000029, 'Shou Itou', '10008830', 'Shou@test.com');
INSERT INTO `client` VALUES (1000030, 'Michelle House', '10008831', 'Michelle@test.com');
INSERT INTO `client` VALUES (1000031, 'Suki Burks', '10008832', 'Suki@test.com');
INSERT INTO `client` VALUES (1000032, 'Prescott Bartlett', '10008833', 'Prescott@test.com');
INSERT INTO `client` VALUES (1000033, 'Gavin Cortez', '10008834', 'Gavin@test.com');
INSERT INTO `client` VALUES (1000034, 'Martena Mccray', '10008835', 'Martena@test.com');
INSERT INTO `client` VALUES (1000035, 'Unity Butler', '10008836', 'Unity@test.com');
INSERT INTO `client` VALUES (1000036, 'Howard Hatfield', '10008837', 'Howard@test.com');
INSERT INTO `client` VALUES (1000037, 'Hope Fuentes', '10008838', 'Hope@test.com');
INSERT INTO `client` VALUES (1000038, 'Vivian Harrell', '10008839', 'Vivian@test.com');
INSERT INTO `client` VALUES (1000039, 'Timothy Mooney', '10008840', 'Timothy@test.com');
INSERT INTO `client` VALUES (1000040, 'Jackson Bradshaw', '10008841', 'Jackson@test.com');
INSERT INTO `client` VALUES (1000041, 'Olivia Liang', '10008842', 'Olivia@test.com');
INSERT INTO `client` VALUES (1000042, 'Bruno Nash', '10008843', 'Bruno@test.com');
INSERT INTO `client` VALUES (1000043, 'Sakura Yamamoto', '10008844', 'Sakura@test.com');
INSERT INTO `client` VALUES (1000044, 'Thor Walton', '10008845', 'Thor@test.com');
INSERT INTO `client` VALUES (1000045, 'Finn Camacho', '10008846', 'Finn@test.com');
INSERT INTO `client` VALUES (1000046, 'Serge Baldwin', '10008847', 'Serge@test.com');
INSERT INTO `client` VALUES (1000047, 'Zenaida Frank', '10008848', 'Zenaida@test.com');
INSERT INTO `client` VALUES (1000048, 'Zorita Serrano', '10008849', 'Zorita@test.com');
INSERT INTO `client` VALUES (1000049, 'Jennifer Acosta', '10008850', 'Jennifer@test.com');
INSERT INTO `client` VALUES (1000050, 'Cara Stevens', '10008851', 'Cara@test.com');
INSERT INTO `client` VALUES (1000051, 'Hermione Butler', '10008852', 'Hermione@test.com');
INSERT INTO `client` VALUES (1000052, 'Lael Greer', '10008853', 'Lael@test.com');
INSERT INTO `client` VALUES (1000053, 'Jonas Alexander', '10008854', 'Jonas@test.com');
INSERT INTO `client` VALUES (1000054, 'Shad Decker', '10008855', 'Shad@test.com');
INSERT INTO `client` VALUES (1000055, 'Michael Bruce', '10008856', 'Michael@test.com');
INSERT INTO `client` VALUES (1000056, 'Donna Snider', '10008857', 'Donna@test.com');

-- ----------------------------
-- Table structure for currency
-- ----------------------------
DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of currency
-- ----------------------------
INSERT INTO `currency` VALUES (1, 'SOLES', 'S/.');
INSERT INTO `currency` VALUES (2, 'DOLARES', '$');

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `CreationDate` datetime(0) NULL DEFAULT NULL,
  `ChannelId` int NULL DEFAULT NULL,
  `BankId` int NULL DEFAULT NULL,
  `Quantity` float NULL DEFAULT NULL,
  `CurrencyId` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `BankCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ClientId` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of transaction
-- ----------------------------
INSERT INTO `transaction` VALUES (1, '2023-01-28 19:31:28', 1, 2, 22, '1', NULL, '6546546', 1000001);
INSERT INTO `transaction` VALUES (2, '2023-01-28 19:31:28', 1, 2, 44.1, '1', 'tinyjpg.jpg', '12312422', 1000001);
INSERT INTO `transaction` VALUES (3, '2023-01-28 19:31:28', 1, 2, 999, '1', 'tinyjpg.jpg', '12312422', 1000002);
INSERT INTO `transaction` VALUES (4, '2023-01-28 19:31:28', 1, 2, 98, '1', 'tinyjpg.jpg', '12312422', 1000001);
INSERT INTO `transaction` VALUES (5, '2023-01-28 19:31:28', 1, 3, 500, '1', 'tinyjpg.jpg', '12312422', 1000001);
INSERT INTO `transaction` VALUES (6, '2023-01-28 19:31:28', 1, 2, 44.1, '1', 'tinyjpg.jpg', '12312422', 1000003);
INSERT INTO `transaction` VALUES (7, '2023-01-28 19:31:28', 1, 2, 44.1, '1', 'tinyjpg.jpg', '12312422', 1000001);
INSERT INTO `transaction` VALUES (8, '2023-01-28 19:31:28', 2, 2, 44.1, '1', 'tinyjpg.jpg', '11111111', 1000001);
INSERT INTO `transaction` VALUES (9, '2023-01-28 19:31:28', 1, 2, 47, '1', 'tinyjpg.jpg', '12312422', 1000001);
INSERT INTO `transaction` VALUES (10, '2023-01-28 19:31:28', 1, 2, 44.1, '1', 'tinyjpg.jpg', '12312422', 1000001);
INSERT INTO `transaction` VALUES (11, '2023-01-28 19:31:28', 2, 2, 44.1, '1', 'tinyjpg.jpg', '12312422', 1000003);
INSERT INTO `transaction` VALUES (12, '2023-01-28 19:31:28', 1, 5, 45, '1', 'tinyjpg.jpg', '12312422', 1000003);
INSERT INTO `transaction` VALUES (13, '2023-01-28 19:31:28', 2, 2, 55, '1', 'tinyjpg.jpg', '2255234', 1000003);
INSERT INTO `transaction` VALUES (14, '2023-01-28 19:31:28', 1, 2, 202, '1', 'tinyjpg.jpg', '12312422', 1000002);
INSERT INTO `transaction` VALUES (15, '2023-01-28 19:31:28', 1, 2, 44.1, '1', 'tinyjpg.jpg', '12312422', 1000003);
INSERT INTO `transaction` VALUES (16, '2023-01-28 19:31:28', 2, 1, 44.1, '1', 'tinyjpg.jpg', '12312422', 1000003);
INSERT INTO `transaction` VALUES (17, '2023-01-28 19:31:28', 1, 2, 99, '1', 'tinyjpg.jpg', '12312422', 1000003);
INSERT INTO `transaction` VALUES (18, '2023-01-28 19:31:28', 1, 2, 44.1, '1', 'tinyjpg.jpg', '7866785754', 1000002);
INSERT INTO `transaction` VALUES (19, '2023-01-28 19:31:28', 2, 1, 24.1, '1', 'tinyjpg.jpg', '2223333333', 1000001);
INSERT INTO `transaction` VALUES (20, '2023-01-28 19:31:28', 2, 4, 14, '1', 'tinyjpg.jpg', '12312422', 1000002);
INSERT INTO `transaction` VALUES (21, '2023-01-28 19:31:28', 1, 2, 1111, '1', 'tinyjpg.jpg', '12312422', 1000002);
INSERT INTO `transaction` VALUES (22, '2023-01-28 19:31:28', 1, 2, 222, '1', 'tinyjpg.jpg', '2424242422', 1000004);
INSERT INTO `transaction` VALUES (23, '2023-01-28 19:31:28', 1, 2, 22, '1', 'tinyjpg.jpg', '12312422', 1000004);
INSERT INTO `transaction` VALUES (24, '2023-01-28 19:31:28', 1, 2, 1111, '2', 'tinyjpg.jpg', '12312422', 1000004);
INSERT INTO `transaction` VALUES (25, '2023-01-28 19:31:28', 1, 2, 1111, '1', 'tinyjpg.jpg', '12312422', 1000004);
INSERT INTO `transaction` VALUES (26, '2023-01-28 19:31:28', 1, 3, 1111, '1', 'tinyjpg.jpg', '12312422', 1000004);
INSERT INTO `transaction` VALUES (28, '2023-01-28 19:31:28', 1, 1, 2221, '0', 'tinyjpg.jpg', '36133', 1000004);
INSERT INTO `transaction` VALUES (29, '2023-01-28 19:31:28', 1, 1, 2221, '0', 'tinyjpg.jpg', '36133', 1000004);
INSERT INTO `transaction` VALUES (30, '2023-01-28 19:31:28', 1, 2, 12, '1', 'tinyjpg.jpg', '36133', 1000001);
INSERT INTO `transaction` VALUES (31, '2023-01-28 19:31:28', 1, 1, 222, '1', 'tinyjpg.jpg', '36133', 1000010);
INSERT INTO `transaction` VALUES (32, '2023-01-28 19:31:28', 1, 1, 233, '1', 'tinyjpg.jpg', '20058', 1000008);
INSERT INTO `transaction` VALUES (33, '2023-01-28 19:31:28', 1, 2, 2322, '1', 'tinyjpg.jpg', '2223', 1000004);
INSERT INTO `transaction` VALUES (34, '2023-01-28 19:31:28', 1, 2, 2322, '1', 'tinyjpg.jpg', '2223', 1000004);
INSERT INTO `transaction` VALUES (39, '2023-01-28 19:31:28', 1, 2, 2322, '1', 'tinyjpg.jpg', '2223', 1000004);
INSERT INTO `transaction` VALUES (40, '2023-01-28 19:31:28', 1, 2, 2322, '1', 'tinyjpg.jpg', '2223', 1000004);
INSERT INTO `transaction` VALUES (41, '2023-01-28 19:31:28', 1, 2, 2322, '1', 'tinyjpg.jpg', '2223', 1000004);
INSERT INTO `transaction` VALUES (42, '2023-01-28 19:31:28', 1, 2, 2322, '1', 'tinyjpg.jpg', '2223', 1000004);
INSERT INTO `transaction` VALUES (43, '2023-01-28 19:31:28', 1, 2, 2322, '1', 'tinyjpg.jpg', '2223', 1000004);
INSERT INTO `transaction` VALUES (44, '2023-01-28 19:31:28', 1, 2, 2322, '1', 'tinyjpg.jpg', '2223', 1000004);
INSERT INTO `transaction` VALUES (45, '2023-01-28 19:31:28', 2, 2, 8000, '1', 'tinyjpg.jpg', '22121', 1000002);
INSERT INTO `transaction` VALUES (46, '2023-01-28 19:31:28', 1, 1, 222, '1', 'tinyjpg.jpg', '36133', 1000001);
INSERT INTO `transaction` VALUES (47, '2023-01-28 19:31:28', 2, 2, 1000, '1', 'tinyjpg.jpg', '36133', 1000001);
INSERT INTO `transaction` VALUES (48, '2023-01-28 19:31:28', 1, 2, 324324, '1', 'tinyjpg.jpg', '36133', 1000001);
INSERT INTO `transaction` VALUES (49, '2023-01-28 19:31:28', 1, 1, 22, '1', 'tinyjpg.jpg', '36133', 1000005);
INSERT INTO `transaction` VALUES (50, '2023-01-28 19:31:28', 1, 2, 111, '1', 'tinyjpg.jpg', '36133', 1000024);

-- ----------------------------
-- Table structure for transaction_tracking
-- ----------------------------
DROP TABLE IF EXISTS `transaction_tracking`;
CREATE TABLE `transaction_tracking`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CreationTime` datetime(0) NULL DEFAULT NULL,
  `TransactionId` int NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of transaction_tracking
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
