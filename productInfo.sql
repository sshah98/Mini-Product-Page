CREATE TABLE IF NOT EXISTS 'productInfo' (
  'id' int(8) NOT NULL AUTO_INCREMENT,
  'name' varchar(50) NOT NULL,
  'code' varchar(50) NOT NULL,
  'price' Int NOT NULL, 
  'category' varchar(50) NOT NULL,
  PRIMARY KEY ('id'),
  UNIQUE KEY product_code ('code')
);

CREATE TABLE IF NOT EXISTS 'productPic' (
  
  'id' int(8) NOT NULL AUTO_INCREMENT,
  'name' varchar(50) NOT NULL,
  'image' text NOT NULL,
  PRIMARY KEY ('id'),
  FOREIGN KEY ('name') REFERENCES productInfo('name')
);

INSERT INTO

