--
-- Table structure for table `categories`
--

TODO 

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Category 1'),
(2, 'Category 2'),
(3, 'Category 3');

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `recordID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`recordID`, `categoryID`, `name`, `price`, `image`) VALUES
(1, 1, 'Some text', '12.00', '644471.jpg'),
(2, 1, 'Some text', '15.00', '233012.jpg'),
(3, 1, 'Some text', '18.00', '329484.jpg'),
(4, 1, 'Some text', '10.00', '644055.jpg'),
(5, 2, 'Some text', '16.00', '373465.jpg'),
(6, 2, 'Some text', '19.00', '373989.jpg'),
(7, 2, 'Some text', '12.00', '374104.jpg'),
(8, 2, 'Some text', '10.00', '4733.jpg'),
(9, 2, 'Some text', '15.00', '834551.jpg'),
(10, 3, 'Some text', '13.00', '908783.jpg'),
(11, 3, 'Some text', '17.00', '835545.jpg'),
(12, 3, 'Some text', '19.00', '119273.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`recordID`);


ALTER TABLE `records`
  MODIFY `recordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


CREATE TABLE customers (
	customerID VARCHAR(60) NOT NULL,
	customerName VARCHAR(60),
	customerAddress VARCHAR(60),
	customerTel VARCHAR(60),
PRIMARY KEY (customerID));

INSERT INTO customers VALUES
("tom@gmail.com","Tom","1 Old Road, Dundalk","0429858585"),
("jack@gmail.com","Jack","2 New Street, Dublin","018745882"),
("anne@gmail.com","Anne","3 New Road, Drogheda","0419858545"),
("joe@gmail.com","Joe","4 UpTown, Navan","041898556"),
("paddy@gmail.com","Paddy","5 Grove Road, Dundalk","042985855");

CREATE TABLE orders ( 
	orderID INT(11) NOT NULL AUTO_INCREMENT,
	customerID VARCHAR(60),
	productID INT (11),
	quantity INT(100),
	dateOfOrder DATE NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (orderID),
FOREIGN KEY (customerID) REFERENCES customers(customerID));

ALTER TABLE orders AUTO_INCREMENT = 1000;
