USE simpleGym;
DROP TABLE IF EXISTS tblOrder;
DROP TABLE IF EXISTS tblCustomer;
DROP TABLE IF EXISTS tblProduct;

CREATE TABLE tblCustomer (
    fistName VARCHAR(20),
    lastName VARCHAR(20),
    houseNumber VARCHAR(20),
    streetName VARCHAR(20),
    city VARCHAR(255),
    postCode VARCHAR(42),
    email VARCHAR(255),
    password VARCHAR(42),
    PRIMARY KEY (email)
);

CREATE TABLE tblProduct (
    productName VARCHAR(20),
    description VARCHAR (250),
    price VARCHAR (10),
    image VARCHAR(30),
    PRIMARY KEY (productName)
);

INSERT INTO tblProduct VALUES
    ("Membership 30 days", "images/membership1.jpg", 80, "what does is sound like?"),
    ("Membership 90 days", "images/membership2.jpg", 200, "what does is sound like?"),
    ("Membership 1 year", "images/membership3.jpg", 600, "what does is sound like?"),
    ("Membership 5 years", "images/membership4.jpg", 2500, "what does is sound like?"),
    ("Membership4Life", "images/membership5.jpg", 100000, "what does is sound like?");

CREATE TABLE tblOrder (
    orderId smallint AUTO_INCREMENT,
    productName VARCHAR(20),
    email VARCHAR(255),
    quantity SMALLINT,
    PRIMARY KEY (orderId),
    FOREIGN KEY (productName) REFERENCES tblProduct(productName),
    FOREIGN KEY (email) REFERENCES tblCustomer(email)
);
