/*
 Navicat Premium Data Transfer

 Source Server         : spring boot
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : music

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 07/03/2023 14:40:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for song
-- ----------------------------
DROP TABLE IF EXISTS `song`;
CREATE TABLE `song`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lyric` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `singer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `src` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of song
-- ----------------------------
INSERT INTO `song` VALUES (1, 'Gặp người đúng lúc', 'Wǒ men kū le wǒ men xiào zhe <br> wǒ men tái tóu wàng tiān kōng<br>xīng xīng hái liàng zhe jǐ kē\r\n<br>wǒ men chàng zhe shí jiān de gē<br>cái dǒng dé xiāng hù yǒng bào<br>dào dǐ shì wèi le shén me<br>yīn wèi wǒ gāng hǎo yù jiàn nǐ<br>liú xià zú jì cái měi ', 'Fengtimo', 'assets/img/fentimo.webp', 'assets/song/gapnguoidungluc.mp3');
INSERT INTO `song` VALUES (2, 'Sai Người Sai Thời Điểm', 'Chuyện tình yêu lúc nào cũng thế\r\nĐi mãi bao năm lê thê mong tìm được ai chung lối về\r\nĐể dành một đời yêu thương trao về nhau không vấn vương\r\nChỉ mong rằng ta mãi bên cạnh dù đời còn bao gió sương\r\nVà chuyện tình yêu bây giờ vẫn thế\r\nAnh vẫn luôn yêu em', 'Thanh Hưng\r\n', 'assets/img/sainguoisaithoidiem.jpg', 'assets/song/sainguoisaithoidiem.mp3');
INSERT INTO `song` VALUES (3, 'Lửng Lơ', 'Ngày trôi dài hơn đêm\r\nĐôi ta chỉ mong yên bình\r\nĐừng theo làn mây trôi\r\nBuông lơi niềm tin quá vội\r\nLưng chừng giữa bao hạnh phúc mới\r\nLửng lơ tình yêu cũ\r\nChạy theo ngàn đau thương\r\nCon tim này đã héo mòn\r\nChẳng nguyên vẹn như xưa\r\nNước mắt giờ trôi the', 'Masew, B Ray, RedT, Ý Tiên', 'assets/img/lunglo.jpg', 'assets/song/lunglo.mp3');
INSERT INTO `song` VALUES (4, 'Khoảng Lặng Mùa Đông', 'Nhiều khi tôi ước mơ\r\nMỗi buổi sớm, trong mùa đông lạnh\r\nMùi thông thơm ngát\r\nĐánh thức tôi một ngày ấm hơn\r\nNgập ngừng trên lối đi\r\nNhững làn gió xuyên mình tê dại\r\nHàng cây trơ nhánh\r\nÁnh nắng rơi nhè nhẹ, xuyến xao\r\nKìm nén lại trái tim, cho ngăn đừng ', 'Uyên Linh.', 'assets/img/khoanglangmuadong.png', 'assets/song/khoanglangmuadong.mp3');
INSERT INTO `song` VALUES (5, 'Mượn Rượu Tỏ Tình', 'Oh-h-h, sự chú ý của ta lỡ va phải vào ánh mắt của nàng\r\nRồi bùng lên trong tim ta như một đốm lửa vàng\r\nAct cool đứng hình mất năm giây\r\nNhìn em bên ngoài có lẽ ăn đứt mấy tấm hình đăng face\r\nHey\r\nEm ăn tối chưa nhở?\r\nNếu rồi thì làm một ly\r\nAnh chỉ muốn', ' BigDaddy, Emily.', 'assets/img/muonruoutotinh.jpg', 'assets/song/muonruoutotinh.mp3');
INSERT INTO `song` VALUES (6, 'Cô Thắm Không Về', 'Từng là hơi ấm bên đời\r\nGiờ là cơn gió ngang trời\r\nMọi người xung quanh thay nhau cho tôi biết cô Thắm không về nữa đâu\r\nĐặt trọn niềm tin sai người\r\nGiờ này ai khóc ai cười\r\nThề hẹn làm chi...\r\nĐể rồi bỏ đi\r\nTôi cố đem tình vun đắp\r\nMây hóa ngang trời ch', 'Phát Hồ', 'assets/img/cothamkhongve.jpg', 'assets/song/cothamkhongve.mp3');
INSERT INTO `song` VALUES (7, 'Chắc ai đó sẽ về', 'Anh tìm nỗi nhớ anh tìm quá khứ\r\nNhớ lắm kí ức anh và em\r\nTrả lại anh yêu thương ấy\r\nXin người hãy về nơi đây\r\nBàn tay yếu ớt cố níu em ở lại\r\nNhững giọt nước mắt lăn dài trên mi\r\nCứ thế anh biết phải làm sao\r\nTình yêu trong em đã mất\r\nPhai dần đi theo gi', 'Sơn Tùng MTP', 'assets/img/chacaidoseve.jpg', 'assets/song/chacaidoseve.mp3');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint NOT NULL COMMENT '0: admin, 1: user',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin@gmail.com', '123', 0);
INSERT INTO `user` VALUES (2, 'user@gmail.com', '123', 1);
INSERT INTO `user` VALUES (4, 'hao@gmail.com', '123', 1);
INSERT INTO `user` VALUES (5, 'huy@gmail.com', '123', 1);

SET FOREIGN_KEY_CHECKS = 1;
