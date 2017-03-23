/*
Navicat MySQL Data Transfer

Source Server         : LOCALE
Source Server Version : 50546
Source Host           : 192.168.56.101:3306
Source Database       : taskp

Target Server Type    : MYSQL
Target Server Version : 50546
File Encoding         : 65001

Date: 2017-03-23 11:49:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for consumer_distributor
-- ----------------------------
DROP TABLE IF EXISTS `consumer_distributor`;
CREATE TABLE `consumer_distributor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consumer_id` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of consumer_distributor
-- ----------------------------
INSERT INTO `consumer_distributor` VALUES ('1', '41', '42');
INSERT INTO `consumer_distributor` VALUES ('2', '41', '40');
INSERT INTO `consumer_distributor` VALUES ('3', '38', '37');
INSERT INTO `consumer_distributor` VALUES ('4', '38', '42');
INSERT INTO `consumer_distributor` VALUES ('5', '38', '37');
INSERT INTO `consumer_distributor` VALUES ('6', '38', '37');
INSERT INTO `consumer_distributor` VALUES ('7', '38', '37');

-- ----------------------------
-- Table structure for order_content
-- ----------------------------
DROP TABLE IF EXISTS `order_content`;
CREATE TABLE `order_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `price` varchar(11) NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_content
-- ----------------------------
INSERT INTO `order_content` VALUES ('1', '1', '1', '5', '100');
INSERT INTO `order_content` VALUES ('2', '1', '2', '3.4', '2');
INSERT INTO `order_content` VALUES ('3', '1', '3', '3', '4');
INSERT INTO `order_content` VALUES ('4', '2', '1', '4', '4');
INSERT INTO `order_content` VALUES ('5', '6', '3', '5', '20');
INSERT INTO `order_content` VALUES ('6', '7', '3', '0', '20');
INSERT INTO `order_content` VALUES ('7', '8', '3', '0', '20');
INSERT INTO `order_content` VALUES ('8', '8', '4', '40', '30');
INSERT INTO `order_content` VALUES ('9', '8', '2', '10', '20');
INSERT INTO `order_content` VALUES ('10', '8', '2', '30', '50');
INSERT INTO `order_content` VALUES ('11', '9', '2', '3.4', '20');
INSERT INTO `order_content` VALUES ('12', '9', '3', '50', '30');
INSERT INTO `order_content` VALUES ('13', '9', '1', '22', '40');
INSERT INTO `order_content` VALUES ('14', '9', '4', '15', '50');
INSERT INTO `order_content` VALUES ('15', '10', '3', '0', '10');
INSERT INTO `order_content` VALUES ('16', '11', '2', '4.2', '20');
INSERT INTO `order_content` VALUES ('17', '11', '1', '5.5', '30');
INSERT INTO `order_content` VALUES ('18', '11', '3', '3.4', '40');
INSERT INTO `order_content` VALUES ('19', '11', '1', '3.2', '50');
INSERT INTO `order_content` VALUES ('20', '15', '3', '31', '545');
INSERT INTO `order_content` VALUES ('21', '15', '1', '25', '21');
INSERT INTO `order_content` VALUES ('22', '16', '1', '100', '50');
INSERT INTO `order_content` VALUES ('23', '17', '1', '5', '10');
INSERT INTO `order_content` VALUES ('24', '18', '1', '0', '10');
INSERT INTO `order_content` VALUES ('25', '19', '1', '0', '10');
INSERT INTO `order_content` VALUES ('26', '20', '1', '0', '10');
INSERT INTO `order_content` VALUES ('27', '21', '1', '0', '10');
INSERT INTO `order_content` VALUES ('28', '22', '1', '0', '10');
INSERT INTO `order_content` VALUES ('29', '16', '7', '30', '20');
INSERT INTO `order_content` VALUES ('30', '17', '1', '15', '2');
INSERT INTO `order_content` VALUES ('31', '17', '5', '89', '4');
INSERT INTO `order_content` VALUES ('32', '17', '7', '12', '5');
INSERT INTO `order_content` VALUES ('33', '17', '2', '145', '8');
INSERT INTO `order_content` VALUES ('34', '17', '6', '45', '6');
INSERT INTO `order_content` VALUES ('35', '17', '1', '30', '3');

-- ----------------------------
-- Table structure for order_list
-- ----------------------------
DROP TABLE IF EXISTS `order_list`;
CREATE TABLE `order_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consumer_distributor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `sum` varchar(11) NOT NULL DEFAULT '0',
  `note` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of order_list
-- ----------------------------
INSERT INTO `order_list` VALUES ('1', '1', '2017-02-24', '518.8', '');
INSERT INTO `order_list` VALUES ('2', '1', '2017-01-19', '16', '');
INSERT INTO `order_list` VALUES ('6', '1', '2017-01-28', '100', '');
INSERT INTO `order_list` VALUES ('9', '1', '2017-03-09', '3198', '');
INSERT INTO `order_list` VALUES ('16', '1', '2017-03-10', '5600', '');
INSERT INTO `order_list` VALUES ('17', '1', '2017-03-24', '2016', '');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distributor_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `measure` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', '42', 'Картошка', '0');
INSERT INTO `product` VALUES ('2', '42', 'Капуста', '0');
INSERT INTO `product` VALUES ('5', '42', 'Гречка', '0');
INSERT INTO `product` VALUES ('6', '42', 'Крупа', '0');
INSERT INTO `product` VALUES ('7', '42', 'Помидор', '0');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_type` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `activation_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('36', 'Николай Громов', '202cb962ac59075b964b07152d234b70', 'admin@local', '380937671566', '3', 'OK', '0bc5d6ed73d193587ebcf7aeda081fe4');
INSERT INTO `users` VALUES ('37', 'Руслан Волков', '202cb962ac59075b964b07152d234b70', 'doctor@local', '380933335296', '2', 'OK', 'f4224d6bc10845f9fdd081381440f1a4');
INSERT INTO `users` VALUES ('38', 'Зарина Зимина', '202cb962ac59075b964b07152d234b70', 'patient@local', '380931264260', '1', 'OK', '');
INSERT INTO `users` VALUES ('39', 'Василий Еремеев', '', 'doctor@local', '380939813350', '2', 'OK', '');
INSERT INTO `users` VALUES ('40', 'Николай Петров', '', 'patient@local', '380932817481', '1', 'OK', '');
INSERT INTO `users` VALUES ('41', 'Школа №12', '202cb962ac59075b964b07152d234b70', 'cons@local', '380932434405', '1', 'OK', '');
INSERT INTO `users` VALUES ('42', 'Золотое руно', '202cb962ac59075b964b07152d234b70', 'distr@local', '380933105819', '2', 'OK', '');
INSERT INTO `users` VALUES ('43', 'ФОП Петров', '507f513353702b50c145d5b7d138095c', 'sokolovskiy.08@mail.ru', '', '0', 'BLOCK', '241bda336ff1be77a9a45620acc67d8f');
