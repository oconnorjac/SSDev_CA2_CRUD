
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

