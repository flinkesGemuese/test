-- Struktur der Gewuerzheini.de Datenbank

CREATE DATABASE IF NOT EXISTS webshop
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

USE webshop;

CREATE TABLE IF NOT EXISTS shop_category (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL DEFAULT '',
  parent int(11) NOT NULL DEFAULT 0,
  description varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (id),
  UNIQUE INDEX UK_shop_category_id (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 103
AVG_ROW_LENGTH = 2048
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS users (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  password varchar(255) NOT NULL,
  email varchar(50) NOT NULL,
  permissions mediumint(9) NOT NULL COMMENT '-1 = all, 0 = user, 1 = salesman, 2 = admin',
  name varchar(50) NOT NULL,
  surname varchar(255) NOT NULL,
  street varchar(255) NOT NULL,
  zip int(11) NOT NULL,
  city varchar(255) NOT NULL,
  birthdate date NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 5461
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS orders (
  id int(10) UNSIGNED NOT NULL,
  userId int(10) UNSIGNED NOT NULL,
  date datetime NOT NULL,
  paid tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT FK_orders_users_id FOREIGN KEY (userId)
  REFERENCES users (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS shop_item (
  id int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  pictureURL varchar(255) DEFAULT '',
  description text DEFAULT NULL,
  descriptionShort text DEFAULT NULL,
  price float NOT NULL,
  categoryId int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT FK_shop_item_shop_category_id FOREIGN KEY (categoryId)
  REFERENCES shop_category (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS order_details (
  orderId int(10) UNSIGNED NOT NULL,
  itemId int(10) UNSIGNED NOT NULL,
  count int(11) NOT NULL,
  PRIMARY KEY (orderId, itemId),
  CONSTRAINT FK_order_details_orders_id FOREIGN KEY (orderId)
  REFERENCES orders (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_order_details_shop_item_id FOREIGN KEY (itemId)
  REFERENCES shop_item (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS shop_stock (
  itemId int(10) UNSIGNED NOT NULL DEFAULT 0,
  count int(10) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (itemId),
  CONSTRAINT FK_shop_stock_shop_item_id FOREIGN KEY (itemId)
  REFERENCES shop_item (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AVG_ROW_LENGTH = 8192
CHARACTER SET latin1
COLLATE latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS user_cart (
  userId int(10) UNSIGNED NOT NULL,
  itemId int(10) UNSIGNED NOT NULL,
  count mediumint(9) DEFAULT NULL,
  PRIMARY KEY (userId, itemId),
  CONSTRAINT FK_user_cart_shop_item_id FOREIGN KEY (itemId)
  REFERENCES shop_item (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT FK_user_cart_users_id FOREIGN KEY (userId)
  REFERENCES users (id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
CHARACTER SET latin1
COLLATE latin1_swedish_ci;