/*
Navicat MySQL Data Transfer

Source Server         : Koneksi_Saya
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_musik

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-05-20 14:05:13
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `anggota`
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id_anggota` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(255) NOT NULL,
  `foto_anggota` varchar(255) NOT NULL,
  `id_role` bigint(20) NOT NULL,
  `id_band` bigint(20) NOT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `id_role` (`id_role`),
  KEY `id_band` (`id_band`),
  CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roleanggota` (`id_role`),
  CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_band`) REFERENCES `band` (`id_band`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES ('5', 'Mike Dirnt', 'md.jpeg', '3', '5');
INSERT INTO `anggota` VALUES ('6', 'Noah Sebastian', 'ns.jpg', '2', '6');
INSERT INTO `anggota` VALUES ('7', 'Billie Joe Armstrong', 'bja.jpg', '2', '5');
INSERT INTO `anggota` VALUES ('8', 'Gerard Way', 'gerardway.png', '2', '4');
INSERT INTO `anggota` VALUES ('10', 'Kevin Skaff', 'kevinskaff.jpg', '4', '8');

-- ----------------------------
-- Table structure for `band`
-- ----------------------------
DROP TABLE IF EXISTS `band`;
CREATE TABLE `band` (
  `id_band` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_band` varchar(255) NOT NULL,
  PRIMARY KEY (`id_band`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of band
-- ----------------------------
INSERT INTO `band` VALUES ('4', 'My Chemical Romance');
INSERT INTO `band` VALUES ('5', 'Green Day');
INSERT INTO `band` VALUES ('6', 'Bad Omens');
INSERT INTO `band` VALUES ('8', 'A Day to Remember');

-- ----------------------------
-- Table structure for `roleanggota`
-- ----------------------------
DROP TABLE IF EXISTS `roleanggota`;
CREATE TABLE `roleanggota` (
  `id_role` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of roleanggota
-- ----------------------------
INSERT INTO `roleanggota` VALUES ('2', 'Lead Vocalist');
INSERT INTO `roleanggota` VALUES ('3', 'Bass Guitar');
INSERT INTO `roleanggota` VALUES ('4', 'Lead Guitar');
