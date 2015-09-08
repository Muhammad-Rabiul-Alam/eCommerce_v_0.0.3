--
-- Create and Use Database
--

CREATE Database ecommerce_v_0_0_3;
USE eCommerce_v_0_0_3;
----------------------------------------------------------

--
-- Table structure for table shiper
--

CREATE TABLE admin(
  admin_id int(11) auto_increment ,
  admin_name varchar(32),
  admin_password varchar(32),
  PRIMARY KEY  (admin_id)
) ENGINE=InnoDB;



--
-- Table structure for table categories
--

CREATE TABLE category (
  category_id int(11) auto_increment,
  category_name varchar(32),
  PRIMARY KEY  (category_id)
) ENGINE=InnoDB;

----------------------------------------------------------

--
-- Table structure for table subcategory
--
CREATE TABLE subcategory (
  subcategory_id int(11) auto_increment,
  category_id int(11),
  subcategory_name varchar(32),
  PRIMARY KEY  (subcategory_id),
  INDEX (category_id),
  FOREIGN KEY  (category_id) REFERENCES category(category_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
----------------------------------------------------------

--
-- Table structure for table product type
--

CREATE TABLE product_type (
  product_type_id int(11) auto_increment,
  product_type_name varchar(32),
  subcategory_id int(11),
  PRIMARY KEY  (product_type_id),
  INDEX (subcategory_id),
  FOREIGN KEY  (subcategory_id) REFERENCES subcategory(subcategory_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table products
--

CREATE TABLE products (
  product_id int(6) unsigned auto_increment,
  product_name varchar(32),
  product_description text,
  unit_price varchar(15),
  product_type_id int(6),
  date_added TIMESTAMP NOT NULL,
  PRIMARY KEY  (product_id),
  INDEX (product_type_id),
  FOREIGN KEY  (product_type_id) REFERENCES product_type(product_type_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table customer
--

CREATE TABLE customer (
  customer_id int(9) unsigned auto_increment,
  customer_name  varchar(100),
  email varchar(50),
  phone int(16) ,
  postal_code int(6),
  address varchar(255),
  city varchar(32),
  country varchar(32),
  customer_password varchar(100),
  PRIMARY KEY  (customer_id)
  ) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table cart
--

CREATE TABLE cart (
  cart_id int(11) unsigned,
  product_id int(6) unsigned,
  quantity int(11) unsigned,
  INDEX (cart_id),
  INDEX (product_id),
  FOREIGN KEY (cart_id) REFERENCES customer(customer_id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(product_id)
) ENGINE=InnoDB;

