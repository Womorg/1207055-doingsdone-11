DROP DATABASE IF EXISTS doings_done;

CREATE DATABASE doings_done
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;
USE doings_done;

CREATE TABLE users(
id INT AUTO_INCREMENT PRIMARY KEY,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
email CHAR(255) UNIQUE NOT NULL,
name CHAR(64) NOT NULL,
password VARCHAR(64) NOT NULL
);

CREATE TABLE projects(
id INT AUTO_INCREMENT PRIMARY KEY,
name CHAR(64) UNIQUE NOT NULL,
user_id INT NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE tasks(
id INT PRIMARY KEY AUTO_INCREMENT,
task_crete TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
status INT DEFAULT 0,
title CHAR(255) NOT NULL,
file VARCHAR (255),
deadline TIMESTAMP NULL,
user_id INT NOT NULL,
project_id INT NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (project_id) REFERENCES projects(id)
);

