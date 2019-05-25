<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', '');
 
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($mysqli === false){
		  die("ERROR: Could not connect. " . $mysqli->connect_error);
}
  
		$sql = "CREATE DATABASE IF NOT EXISTS eclinic";
		$createDB = $mysqli-> query($sql);
		$mysqli = new mysqli("localhost", "root", "", "eclinic"); 

		$create1="CREATE TABLE IF NOT EXISTS users(
		id int(9) NOT NULL AUTO_INCREMENT,
		username varchar(255) NOT NULL, 
		password varchar(255) NOT NULL,
		firstname varchar(255) NOT NULL,
		middlename varchar(255) NOT NULL,
		lastname varchar(255) NOT NULL,
		email varchar(255) NOT NULL,
		contact varchar(255) NOT NULL,
		gender varchar(255) NOT NULL,
		birthdate DATE NOT NULL,
		occupation varchar(255) NOT NULL,
		address varchar(255) NOT NULL,
		remarks varchar(255) NOT NULL,
		checkup DATE NOT NULL,		
		created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY(id)
		)";
		if ($mysqli->query($create1) === TRUE) {

		} else {

		}

		$create2="CREATE TABLE IF NOT EXISTS developers(
			id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			name varchar(255) NOT NULL,
			title varchar(255) NOT NULL,
			images varchar(255) NOT NULL,
			phone varchar(255) NOT NULL,
			email varchar(255) NOT NULL,
			featured int(11) NOT NULL
			)";
			if ($mysqli->query($create2) === TRUE) {

			} else {

			}

			$insert = "INSERT IGNORE INTO developers(id,name,title,images,phone,email,featured)
			VALUES(1,'Christian Gene Rivera Balaquidan','Web Developer','../images/Jin.jpg','09562571761','jin24rivera@gmail.com',1)";
			if ($mysqli->query($insert) === TRUE) {

			} else {

			}

		$create3="CREATE TABLE IF NOT EXISTS records(
				id int(11) NOT NULL,
				remarks varchar(255) NOT NULL,		
				created_at DATETIME DEFAULT CURRENT_TIMESTAMP
				)";
				if ($mysqli->query($create3) === TRUE) {
		
				} else {
		
				}

?>