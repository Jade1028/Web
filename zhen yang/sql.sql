CREATE DATABASE IF NOT EXISTS UserRegistrationDB;

USE UserRegistrationDB;

CREATE TABLE IF NOT EXISTS UserInfo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);