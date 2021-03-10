-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Database: `pet_shop`
--
CREATE DATABASE IF NOT EXISTS `pet_shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pet_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Dog'),
(2, 'Cat'),
(3, 'Rabbit'),
(4, 'Hamster'),
(5, 'Fish'),
(6, 'Bird'),
(7, 'Reptile');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customerID` varchar(60) NOT NULL,
  `customerName` varchar(60) DEFAULT NULL,
  `customerAddress` varchar(60) DEFAULT NULL,
  `customerTel` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `customerName`, `customerAddress`, `customerTel`) VALUES
('anne@gmail.com', 'Anne', '3 New Road, Drogheda', '0419858545'),
('jac@email.com', 'Jacqueline', '7 The Close', '0852525252'),
('jack@gmail.com', 'Jack', '2 New Street, Dublin', '018745882'),
('joe@gmail.com', 'Joe', '4 UpTown, Navan', '041898556'),
('paddy@gmail.com', 'Paddy', '5 Grove Road, Dundalk', '042985855'),
('rob_12@email.com', 'Rob Robert', '123 Up Street, Dundalk', '0875454545'),
('test2@gmail.com', 'test', '12 test , test', '0892574045'),
('tom@gmail.com', 'Tom', '1 Old Road, Dundalk', '0429858585');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` varchar(60) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `dateOfOrder` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `productID`, `quantity`, `dateOfOrder`) VALUES
(1001, 'anne@gmail.com', 36, 32, '2021-03-06'),
(1007, 'test2@gmail.com', 36, 32, '2021-03-07'),
(1008, 'rob_12@email.com', 50, 1, '2021-03-10'),
(1009, 'tom@gmail.com', 45, 6, '2021-03-10'),
(1010, 'jac@email.com', 37, 8, '2021-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dateAdded` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `name`, `price`, `stock`, `image`, `dateAdded`) VALUES
(27, 1, 'Tennis Ball Toy', '12.99', 7, '216982.jpg', '2021-02-19'),
(28, 1, 'Water & Food Bowl Duo', '25.99', 26, '931472.jpeg', '2021-02-19'),
(29, 1, 'Dog Food - Beef', '8.99', 39, '143902.jpeg', '2021-02-19'),
(30, 1, 'Jumping Ring', '17.65', 5, '290334.jpeg', '2021-02-19'),
(31, 1, 'Tear Stain Remover', '12.99', 15, '726773.jpg', '2021-02-19'),
(32, 2, 'Cat Bed', '12.99', 7, '135579.jpg', '2021-02-19'),
(33, 2, 'Cat Food', '20.00', 27, '369140.jpg', '2021-02-19'),
(34, 2, 'Cat Groomer', '12.99', 15, '24377.jpg', '2021-02-19'),
(35, 2, 'Cat Litter', '17.99', 25, '113690.jpg', '2021-02-19'),
(36, 2, 'Cat Toy', '6.99', 29, '43725.jpg', '2021-02-19'),
(37, 2, 'Cat Treats', '12.99', 17, '508122.jpg', '2021-02-19'),
(38, 3, 'Rabbit Bowl', '4.99', 30, '104594.jpg', '2021-02-19'),
(39, 1, 'Puppy Training Treats', '7.99', 12, '96669.jpeg', '2021-02-19'),
(40, 6, 'Bird Bath', '12.99', 14, '500724.jpg', '2021-02-19'),
(41, 6, 'Bird Cage', '25.99', 3, '286831.jpg', '2021-02-19'),
(42, 6, 'Budgie Food', '12.99', 14, '616281.jpg', '2021-02-19'),
(43, 6, 'Molting Tonic', '12.99', 17, '263770.jpg', '2021-02-19'),
(44, 6, 'Bird Cage Toy ', '3.99', 15, '340469.jpg', '2021-02-19'),
(45, 6, 'Bird Treats', '7.99', 26, '483492.jpg', '2021-02-19'),
(46, 5, 'Goldfish Food', '5.99', 18, '754992.jpg', '2021-02-19'),
(47, 5, 'Tank Treatment', '12.99', 7, '788934.jpg', '2021-02-19'),
(48, 5, 'Fish Tank', '19.99', 5, '733355.jpg', '2021-02-19'),
(49, 5, 'Fish Tank', '27.99', 3, '678116.jpg', '2021-02-19'),
(50, 5, 'Tank Toy', '1.99', 17, '813126.jpg', '2021-02-19'),
(51, 1, 'Brush', '3.99', 25, '596918.jpg', '2021-02-19'),
(52, 4, 'Plastic Home', '17.99', 10, '474168.jpg', '2021-02-19'),
(53, 4, 'Hamster Litter', '12.99', 64, '826052.jpg', '2021-02-19'),
(54, 4, 'Hamster Treats', '4.99', 30, '657463.jpg', '2021-02-19'),
(55, 4, 'Tubes', '1.99', 40, '992007.jpg', '2021-02-19'),
(56, 1, 'Pink Collar ', '7.99', 16, '776218.jpeg', '2021-02-19'),
(57, 3, 'Rabbit Tummy Care', '11.50', 17, '561099.jpg', '2021-02-19'),
(58, 3, 'Rabbit Litter', '12.99', 16, '72649.jpg', '2021-02-19'),
(59, 3, 'Carrot Treats', '7.95', 12, '714708.jpg', '2021-02-19'),
(60, 7, 'Cave', '7.89', 7, '216160.jpg', '2021-02-19'),
(61, 7, 'Bark', '3.99', 12, '929983.jpg', '2021-02-19'),
(62, 7, 'Bedding', '13.99', 18, '9476.jpg', '2021-02-19'),
(63, 7, 'Food Bowl', '6.99', 9, '19909.jpg', '2021-02-19'),
(64, 7, 'Water Bowl', '6.99', 18, '341961.jpg', '2021-02-19'),
(68, 7, 'A little rock', '4.65', 19, '34940.jpg', '2021-03-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);
COMMIT;

