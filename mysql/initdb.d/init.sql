DROP DATABASE IF EXISTS quizy_db;
CREATE DATABASE quizy_db;
USE quizy_db;

DROP TABLE IF EXISTS big_questions;
CREATE TABLE big_questions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pref_name VARCHAR(4)
) CHARSET=utf8;

INSERT INTO big_questions(pref_name) VALUES ('東京'), ('広島');