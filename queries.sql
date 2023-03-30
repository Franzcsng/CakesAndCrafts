

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `user_id` int(8) unsigned NOT NULL auto_increment, 
  `user_lastname` varchar(180) NOT NULL default '',
  `user_firstname` varchar(180) NOT NULL default '',
  `user_email` varchar(180) NOT NULL default '',
  `user_phone` varchar(255) NOT NULL default '',
  `user_password` varchar(180) NOT NULL default '',
  `user_date_added` date NOT NULL,
  `user_time_added` time NOT NULL,	
  `user_date_updated` date NOT NULL,
  `user_time_updated` time NOT NULL,
  `user_status` int(1) NOT NULL default '0',
  `user_token` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`user_id`)  
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `product_id` int(4) unsigned NOT NULL auto_increment, 
  `product_name` varchar(180) NOT NULL default '',
  `product_price` int(255) NOT NULL default '',
  `product_desc` VARCHAR(300) NULL,
  `product_date_added` date NOT NULL,
  `product_time_added` time NOT NULL,	
  `product_date_updated` date NOT NULL,
  `product_time_updated` time NOT NULL,
  `product_status` int(1) NOT NULL default '0',
  `product_token` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1001;


DROP TABLE IF EXISTS `tbl_orders`;
CREATE TABLE `tbl_orders` (
  `order_id` int(8) unsigned NOT NULL auto_increment, 
  `client_lastname` varchar(180) NOT NULL default '',
  `client_firstname` varchar(180) NOT NULL default '',
  `client_email` varchar(180) NOT NULL default '',
  `client_phone` varchar(255) NOT NULL default '',
  `order_status` int(1) NOT NULL default '0',
  `order_date_added` date NOT NULL,
  `order_time_added` time NOT NULL,	
  `order_date_updated` date NOT NULL,
  `order_time_updated` time NOT NULL,
  `order_token` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_order_products`;
CREATE TABLE `tbl_order_products` (
  `order_id` int(8) unsigned NOT NULL, 
  `product_id` int(4) unsigned NOT NULL, 
  `product_qty` int(180) NOT NULL default '0',
  `amount` int(180) NOT NULL default '0',
  `product_date_added` date NOT NULL,
  `order_products_token` varchar(255) NOT NULL default '',
  `order_product_uniqid` varchar(200) NOT NULL,
  KEY  (`order_id`),
  KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_order_complete`;
CREATE TABLE `tbl_order_complete` (
  `order_id` int(8) unsigned NOT NULL, 
  `received_by` VARCHAR(180) NOT NULL DEFAULT 'Pick Up',  
  `courier_id` int(4) unsigned NOT NULL,
  `delivery_fee` INT(6) NOT NULL DEFAULT '0',
  `delivery_address` varchar(200) NOT NULL DEFAULT 'N/A',
  `completed_date_added` date NOT NULL,
  `completed_time_added` time NOT NULL,	
  `completed_token` varchar(255) NOT NULL default '',
  KEY  (`order_id`),
  KEY (`courier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

DROP TABLE IF EXISTS `tbl_courier`;
CREATE TABLE `tbl_courier` (
  `courier_id` int(4) unsigned NOT NULL auto_increment, 
  `courier_name` varchar(230) NOT NULL default 'Cakes&Crafts',
  `courier_contact` varchar(180) NOT NULL default 'none',
  `courier_date_added` date NOT NULL,
  `courier_time_added` time NOT NULL,	
  `courier_date_updated` date NOT NULL,
  `courier_time_updated` time NOT NULL,
  `courier_token` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`courier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1001;


