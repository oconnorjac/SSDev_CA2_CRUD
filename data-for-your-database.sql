/*create database*/
DROP DATABASE IF EXISTS pet_shop;
CREATE DATABASE IF NOT EXISTS pet_shop;
USE pet_shop;

/*categories*/
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
PRIMARY KEY (categoryID));

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Rabbit'),
(4, 'Hamster'),
(5, 'Fish'),
(6, 'Bird'),
(7, 'Reptile');
ALTER TABLE categories AUTO_INCREMENT=8;

/*products*/
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (productID),
FOREIGN KEY (categoryID) REFERENCES categories(categoryID));

INSERT INTO `products` (`productID`, `categoryID`, `name`, `price`, `stock`, `image`, `dateAdded`) VALUES
(27, 1, 'Tennis Ball Toy', '12.99', 7, '216982.jpg', '2021-02-19 11:21:45'),
(28, 1, 'Water & Food Bowl Duo', '25.99', 26, '931472.jpeg', '2021-02-19 11:22:03'),
(29, 1, 'Dog Food - Beef', '8.99', 39, '143902.jpeg', '2021-02-19 11:22:33'),
(30, 1, 'Jumping Ring', '17.65', 5, '290334.jpeg', '2021-02-19 11:22:59'),
(31, 1, 'Tear Stain Remover', '12.99', 15, '726773.jpg', '2021-02-19 11:23:45'),
(32, 2, 'Cat Bed', '12.99', 7, '135579.jpg', '2021-02-19 11:24:16'),
(33, 2, 'Cat Food', '20.00', 27, '369140.jpg', '2021-02-19 11:25:15'),
(34, 2, 'Cat Groomer', '12.99', 15, '24377.jpg', '2021-02-19 11:27:01'),
(35, 2, 'Cat Litter', '17.99', 25, '113690.jpg', '2021-02-19 11:25:10'),
(36, 2, 'Cat Toy', '6.99', 29, '43725.jpg', '2021-02-19 11:26:11'),
(37, 2, 'Cat Treats', '12.99', 17, '508122.jpg', '2021-02-19 11:27:16'),
(38, 3, 'Rabbit Bowl', '4.99', 30, '104594.jpg', '2021-02-19 11:28:03'),
(39, 1, 'Puppy Training Treats', '7.99', 12, '96669.jpeg', '2021-02-19 11:31:03'),
(40, 6, 'Bird Bath', '12.99', 14, '500724.jpg', '2021-02-19 11:42:59'),
(41, 6, 'Bird Cage', '25.99', 3, '286831.jpg', '2021-02-19 11:43:59'),
(42, 6, 'Budgie Food', '12.99', 14, '616281.jpg', '2021-02-19 11:44:59'),
(43, 6, 'Molting Tonic', '12.99', 17, '263770.jpg', '2021-02-19 11:47:03'),
(44, 6, 'Bird Cage Toy ', '3.99', 15, '340469.jpg', '2021-02-19 11:49:33'),
(45, 6, 'Bird Treats', '7.99', 26, '483492.jpg', '2021-02-19 11:52:03'),
(46, 5, 'Goldfish Food', '5.99', 18, '754992.jpg', '2021-02-19 11:53:59'),
(47, 5, 'Tank Treatment', '12.99', 7, '788934.jpg', '2021-02-19 11:54:33'),
(48, 5, 'Fish Tank', '19.99', 5, '733355.jpg', '2021-02-19 11:55:59'),
(49, 5, 'Fish Tank', '27.99', 3, '678116.jpg', '2021-02-19 11:57:45'),
(50, 5, 'Tank Toy', '1.99', 17, '813126.jpg', '2021-02-19 11:58:45'),
(51, 1, 'Brush', '3.99', 25, '596918.jpg', '2021-02-19 11:59:16'),
(52, 4, 'Plastic Home', '17.99', 10, '474168.jpg', '2021-02-19 00:00:00'),
(53, 4, 'Hamster Litter', '12.99', 64, '826052.jpg', '2021-02-19 00:00:00'),
(54, 4, 'Hamster Treats', '4.99', 30, '657463.jpg', '2021-02-19 00:00:00'),
(55, 4, 'Tubes', '1.99', 40, '992007.jpg', '2021-02-19 00:00:00'),
(56, 1, 'Pink Collar ', '7.99', 16, '776218.jpeg', '2021-02-19 00:00:00'),
(57, 3, 'Rabbit Tummy Care', '11.50', 17, '561099.jpg', '2021-02-19 00:00:00'),
(58, 3, 'Rabbit Litter', '12.99', 16, '72649.jpg', '2021-02-19 00:00:00'),
(59, 3, 'Carrot Treats', '7.95', 12, '714708.jpg', '2021-02-19 00:00:00'),
(60, 7, 'Cave', '7.89', 7, '216160.jpg', '2021-02-19 00:00:00'),
(61, 7, 'Bark', '3.99', 12, '929983.jpg', '2021-02-19 00:00:00'),
(62, 7, 'Bedding', '13.99', 18, '9476.jpg', '2021-02-19 00:00:00'),
(63, 7, 'Food Bowl', '6.99', 9, '19909.jpg', '2021-02-19 00:00:00'),
(64, 7, 'Water Bowl', '6.99', 18, '341961.jpg', '2021-02-19 00:00:00');
ALTER TABLE products AUTO_INCREMENT=65;

/*customers*/
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customerID` varchar(60) NOT NULL,
  `customerName` varchar(60) DEFAULT NULL,
  `customerAddress` varchar(60) DEFAULT NULL,
  `customerTel` varchar(60) DEFAULT NULL,
PRIMARY KEY (customerID));

INSERT INTO `customers` (`customerID`, `customerName`, `customerAddress`, `customerTel`) VALUES
('anne@gmail.com', 'Anne', '3 New Road, Drogheda', '0419858545'),
('jac@email.com', 'Jacqueline', '7 The Close', '0852525252'),
('jack@gmail.com', 'Jack', '2 New Street, Dublin', '018745882'),
('joe@gmail.com', 'Joe', '4 UpTown, Navan', '041898556'),
('paddy@gmail.com', 'Paddy', '5 Grove Road, Dundalk', '042985855'),
('testing9@gmail.com', 'testingg', 'testing 4 u', '0872525254'),
('tom@gmail.com', 'Tom', '1 Old Road, Dundalk', '0429858585');

/*orders*/
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `customerID` varchar(60) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `dateOfOrder` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (orderID),
FOREIGN KEY (customerID) REFERENCES customers(customerID),
FOREIGN KEY (productID) REFERENCES products(productID));

INSERT INTO `orders` (`orderID`, `customerID`, `productID`, `quantity`, `dateOfOrder`) VALUES
(1001, 'anne@gmail.com', 36, 32, '2021-03-06 15:29:35'),
(1007, 'testing9@gmail.com', 36, 32, '2021-03-07 15:31:39'),
(1008, 'jack@gmail.com', 50, 1, '2021-03-10 16:27:31'),
(1009, 'tom@gmail.com', 45, 6, '2021-03-10 17:56:25'),
(1010, 'jac@email.com', 37, 8, '2021-03-10 16:00:01'),
(1013, 'joe@gmail.com', 32, 21, '2021-03-12 11:12:42');
ALTER TABLE orders AUTO_INCREMENT=1014;

/*CA3 users table*/
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
PRIMARY KEY (id));