CREATE TABLE IF NOT EXISTS `productInfo` (
  `id` Int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` Int NOT NULL, 
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `productStock` (
  `id` Int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `amount` Int NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `productInfo` (`id`, `name`, `price`, `category`) VALUES
(1, 'Apple', 4, 'grocery'),
(2, 'Banana', 3, 'grocery'),
(3, 'Bread', 2, 'grocery'),
(4, 'Chips', 3, 'grocery'),
(5, 'Juice', 2, 'grocery'),
(6, 'Milk', 3, 'grocery'),
(7, 'Tomato', 2, 'grocery'),
(8, 'Camera', 200, 'technology'),
(9, 'Headphones', 50, 'technology'),
(10, 'Laptop', 500, 'technology'),
(11, 'Phone', 300, 'technology'),
(12, 'Printer', 150, 'technology'),
(13, 'Speakers', 50, 'technology'),
(14, 'TV', 350, 'technology'),
(15, 'Hoodie', 15, 'clothes'),
(16, 'Jacket', 25, 'clothes'),
(17, 'Jeans', 20, 'clothes'),
(18, 'Shirt', 15, 'clothes'),
(19, 'Shoes', 30, 'clothes'),
(20, 'Shorts', 25, 'clothes'),
(21, 'Sunglasses', 45, 'clothes');

INSERT INTO `productStock` (`id`, `name`, `amount`) VALUES
(1, 'Apple', 50),
(2, 'Banana', 50),
(3, 'Bread', 50),
(4, 'Chips', 50),
(5, 'Juice', 50),
(6, 'Milk', 50),
(7, 'Tomato', 50),
(8, 'Camera', 50),
(9, 'Headphones', 50),
(10, 'Laptop', 50),
(11, 'Phone', 50),
(12, 'Printer', 50),
(13, 'Speakers', 50),
(14, 'TV', 50),
(15, 'Hoodie', 50),
(16, 'Jacket', 50),
(17, 'Jeans', 50),
(18, 'Shirt', 50),
(19, 'Shoes', 50),
(20, 'Shorts', 50),
(21, 'Sunglasses', 50);
