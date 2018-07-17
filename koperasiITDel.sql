
CREATE DATABASE `koperasiITDel` ;

USE `koperasiITDel`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `id_account` INT(10) UNSIGNED NOT NULL  COMMENT 'ID_account',
  `username` VARCHAR(64) NOT NULL COMMENT 'Username',
  `password` VARCHAR(64) NOT NULL COMMENT 'Password',
  PRIMARY KEY (`id_account`)
) ENGINE=INNODB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `account` */

INSERT  INTO `account`(`id_account`,`username`,`password`) VALUES (1,'admin','admin'),(2,'kasir','kasir'),(3,'karyawan','karyawan'),(4,'petugas','petugas');



/*Table structure for table `del_flazz` */

DROP TABLE IF EXISTS `dell_flazz`;

CREATE TABLE `del_flazz` (
  `id_flazz` INT(10) UNSIGNED NOT NULL  COMMENT 'id_flazz',
  `Name` VARCHAR(64) DEFAULT NULL COMMENT 'Nama',
  `Jumlah_Saldo` INT(10) UNSIGNED DEFAULT NULL COMMENT 'Jumlah Saldo',
  PRIMARY KEY (`id_flazz`)
  
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `del_flazz` */

INSERT  INTO `del_flazz`(`id_flazz`,`Name`,`Jumlah_saldo`) VALUES (1,'otniel',100000);
INSERT  INTO `del_flazz`(`id_flazz`,`Name`,`Jumlah_saldo`) VALUES (2,'Triana',50000);
INSERT  INTO `del_flazz`(`id_flazz`,`Name`,`Jumlah_saldo`) VALUES (3,'Riki',120000);

/*Table structure for table `inventory` */

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `id_inventory` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID Inventory',
  `nama_barang` VARCHAR(64) NOT NULL COMMENT 'Nama Barang',
  `Harga` INT(10) UNSIGNED NULL COMMENT 'Harga',
  `Stock` INT(10) UNSIGNED NULL COMMENT 'Stock',
  PRIMARY KEY (`id_inventory`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;



/*Table structure for table `transaksi` */
DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` INT(10) UNSIGNED NOT NULL  AUTO_INCREMENT COMMENT 'ID Transaksi ',
  `id_inventory` INT(10) UNSIGNED DEFAULT NULL COMMENT 'ID Inventory',
  `jumlah_order` INT(11) DEFAULT NULL COMMENT 'Jumlah Order',
  `id_flazz` INT(10) UNSIGNED DEFAULT NULL COMMENT 'ID Flazz',
  `total_harga` DECIMAL(20,0) DEFAULT NULL COMMENT 'Total Harga',
   PRIMARY KEY (`id_transaksi`),
   KEY `constraint_inventory` (`id_inventory`),
   KEY `constraint_delflazz` (`id_flazz`),
   CONSTRAINT `constraint_inventory` FOREIGN KEY (`id_inventory`) REFERENCES `inventory` (`id_inventory`),
   CONSTRAINT `constraint_delflazz` FOREIGN KEY (`id_flazz`) REFERENCES `del_flazz` (`id_flazz`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `history`;

CREATE TABLE IF NOT EXISTS `history` (
  `id_history` INT(10) UNSIGNED NOT NULL  AUTO_INCREMENT COMMENT 'ID history ',
  `id_flazz` INT(10) UNSIGNED DEFAULT NULL COMMENT 'ID Flazz',
  `id_inventory` INT(10) UNSIGNED DEFAULT NULL COMMENT 'ID Inventory',
  `jumlah_order` INT(11) DEFAULT NULL COMMENT 'Jumlah Order',
  `total_harga` DECIMAL(20,0) DEFAULT NULL COMMENT 'Total Harga',
   PRIMARY KEY (`id_history`),
   KEY `constraint_id` (`id_inventory`),
   KEY `constraint_id_flazz` (`id_flazz`),
   CONSTRAINT `constraint_id` FOREIGN KEY (`id_inventory`) REFERENCES `inventory` (`id_inventory`),
   CONSTRAINT `constraint_id_flazz` FOREIGN KEY (`id_flazz`) REFERENCES `del_flazz` (`id_flazz`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


   



  
  
  
