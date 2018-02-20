CREATE TABLE IF NOT EXISTS `productInfo` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `price` Int NOT NULL, 
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY product_code (`code`)
);

CREATE TABLE IF NOT EXISTS `productPic` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `productInfo` (`id`, `name`, `code`, `price`, `category`) VALUES
(1, 'Apple', 'Ac3401', 4, 'grocery'),
(2, 'Banana', 'Bc3822', 3, 'grocery'),
(3, 'Bread', 'Br4281', 2, 'grocery'),
(4, 'Chips', 'Ch2132', 3, 'grocery'),
(5, 'Juice', 'Ju8762', 2, 'grocery'),
(6, 'Milk', 'Mi4562', 3, 'grocery'),
(7, 'Tomato', 'To6642', 2, 'grocery'),
(8, 'Camera', 'Ca7782', 200, 'technology'),
(9, 'Headphones', 'He6252', 50, 'technology'),
(10, 'Laptop', 'La8192', 500, 'technology'),
(11, 'Phone', 'Ph0019', 300, 'technology'),
(12, 'Printer', 'Pr8928', 150, 'technology'),
(13, 'Speakers', 'Sp0218', 50, 'technology'),
(14, 'TV', 'Tv0123', 350, 'technology'),
(15, 'Hoodie', 'Ho7721', 15, 'clothes'),
(16, 'Jacket', 'Ja0987', 25, 'clothes'),
(17, 'Jeans', 'Je2121', 20, 'clothes'),
(18, 'Shirt', 'Sh6517', 15, 'clothes'),
(19, 'Shoes', 'Se0011', 30, 'clothes'),
(20, 'Shorts', 'Sr0982', 25, 'clothes'),
(21, 'Sunglasses', 'Su3321', 45, 'clothes');

INSERT INTO `productPic` (`id`, `name`, `image`) VALUES
(1, 'Apple', 'product-images/grocery/apple.jpg'),
(2, 'Banana', 'product-images/grocery/banana.jpg'),
(3, 'Bread', 'product-images/grocery/bread.jpg'),
(4, 'Chips', 'product-images/grocery/chips.jpg'),
(5, 'Juice', 'product-images/grocery/juice.jpg'),
(6, 'Milk', 'product-images/grocery/milk.jpg'),
(7, 'Tomato', 'product-images/grocery/tomato.jpg'),
(8, 'Camera', 'product-images/technology/camera.jpg'),
(9, 'Headphones', 'product-images/technology/headphones.jpg'),
(10, 'Laptop', 'product-images/technology/laptop.jpg'),
(11, 'Phone', 'product-images/technology/phone.jpg'),
(12, 'Printer', 'product-images/technology/printer.jpg'),
(13, 'Speakers', 'product-images/technology/speakers.jpg'),
(14, 'TV', 'product-images/technology/tv.jpg'),
(15, 'Hoodie', 'product-images/clothes/hoodie.jpg'),
(16, 'Jacket', 'product-images/clothes/jacket.jpg'),
(17, 'Jeans', 'product-images/clothes/jeans.jpg'),
(18, 'Shirt', 'product-images/clothes/shirt.jpg'),
(19, 'Shoes', 'product-images/clothes/shoes.jpg'),
(20, 'Shorts', 'product-images/clothes/shorts.jpg'),
(21, 'Sunglasses', 'product-images/clothes/sunglasses.jpg');
