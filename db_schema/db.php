CREATE DATABASE IF NOT EXISTS test;

CREATE TABLE IF NOT EXISTS users (
user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(50),
password VARCHAR(100),

PRIMARY KEY (user_id)
);

CREATE TABLE IF NOT EXISTS roles (
role_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
role_name VARCHAR(50),

PRIMARY KEY (role_id)
);

CREATE TABLE IF NOT EXISTS permissions(
perm_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
perm_name VARCHAR(50),

PRIMARY KEY (perm_id)
);

CREATE TABLE IF NOT EXISTS role_perm (
role_id INT UNSIGNED NOT NULL,
perm_id INT UNSIGNED NOT NULL,

FOREIGN KEY (role_id) REFERENCES roles (role_id),
FOREIGN KEY (perm_id) REFERENCES permissions (perm_id)
);

CREATE TABLE IF NOT EXISTS user_role (
user_id INT UNSIGNED NOT NULL,
role_id INT UNSIGNED NOT NULL,

FOREIGN KEY (user_id) REFERENCES users (user_id),
FOREIGN KEY (role_id) REFERENCES roles (role_id)
);

ALTER TABLE users ADD deleted_at DATETIME;

CREATE TABLE topic (
topic_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
user_id INT UNSIGNED NOT NULL, name VARCHAR(50),
body TEXT,
PRIMARY KEY (topic_id),
FOREIGN KEY (user_id) REFERENCES users (user_id) );

ALTER TABLE topic ADD deleted_at DATETIME;